<?php
	/**
	* written by : Suryo Prasetyo W <the.oyrus@gmail.com>
	* description : Extension untuk membuilder query yg mengambil data dengan mudah
	*
	*/
	class DBFetch extends CApplicationComponent
	{
		public static function query( $arrayConfig = array() )
		{
			$default= array(
				'dbconnection' => Yii::app()->db
				, 'select' => '*'
				, 'from' => ''
				, 'filter' => array()
				, 'filter_AND' => array()
				, 'filterOR' => false
				, 'otherquery' => array()
				, 'mode' => 'DETAIL'
				);
		    $setting = array_merge($default,$arrayConfig);
		    extract($setting);

			$cmd = $dbconnection->createCommand();
			$result = $result = $cmd->select( $select )
				->from( $from );

			if ( count($filter)>0 ) { // jika ada filtering
				$condition = array();
				$cond_arg = array();

				foreach ($filter as $key => $value) {
					$pecah = explode('__', $key);
					$comparatorType = $pecah[0];
					$kolom = $pecah[1];
					if ( $comparatorType=='EQ') {
						$comparator = "=";
					} elseif ( $comparatorType=='LT') {
						$comparator = "<";
					} elseif ( $comparatorType=='GT') {
						$comparator = ">";
					} elseif ( $comparatorType=='LTEQ') {
						$comparator = "<=";
					} elseif ( $comparatorType=='GTEQ') {
						$comparator = ">=";
					} elseif ( $comparatorType=='NOTEQ') {
						$comparator = "<>";
					} elseif ( $comparatorType=='LK') {
						$comparator = " LIKE ";
					} elseif ( $comparatorType=='LKR') {
						$comparator = " LIKE ";
					} elseif ( $comparatorType=='LKL') {
						$comparator = " LIKE ";
					}

					$kolomaliasBaru = '';
					if ($filter[$key]!=='') { // jika mengandung namatabel.namakolom, maka kita pecah wherenya untuk :alias namakolom
						$pecah = explode('.', $kolom);
						$kolomalias = $kolom;
						if (count($pecah)>1) {
							$kolomalias = $pecah[1];
							$kolomaliasBarux = explode('_AS_', $kolomalias);
							if( count( $kolomaliasBarux ) >=2) {
								$kolom = $kolomaliasBarux[0];
								$kolomalias = $kolom;
								$kolomaliasBaru = $kolomaliasBarux[1];
							}
						}

						if ( $comparatorType=='LK') {//jika comparatornya LIKE maka beri prefix & suffix %
							$value = '%'.$value.'%';
						}
						if ( $comparatorType=='LKL') {//jika comparatornya LIKE Right maka beri suffix %
							$value = '%'.$value.'%';
						}
						if ( $comparatorType=='LKR') {//jika comparatornya LIKE Left maka beri prefix %
							$value = '%'.$value.'%';
						}

						$condition[] = $kolom.$comparator.":".$kolomalias.$kolomaliasBaru;
						$cond_arg[':'.$kolomalias.$kolomaliasBaru] = $value;
					}

				}

				if (count($condition) > 0) {
					/*var_dump( $kolom );
					var_dump( $kolomalias );
					var_dump( $kolomaliasBaru );*/
					$OR_AND = $filterOR ? 'OR' : 'AND';
					// $result->where(array('AND', implode(" AND ", $condition)), $cond_arg);
					$result->where(array($OR_AND, implode(" ".$OR_AND." ", $condition)), $cond_arg);
				}
			}

			if ( count($filter_AND)>0 ) { // jika ada filtering AND
				$condition_AND = array();
				$cond_arg_AND = array();

				foreach ($filter_AND as $key => $value) {
					$pecah = explode('__', $key);
					$comparatorType = $pecah[0];
					$kolom = $pecah[1];
					if ( $comparatorType=='EQ') {
						$comparator = "=";
					} elseif ( $comparatorType=='LT') {
						$comparator = "<";
					} elseif ( $comparatorType=='GT') {
						$comparator = ">";
					} elseif ( $comparatorType=='LTEQ') {
						$comparator = "<=";
					} elseif ( $comparatorType=='GTEQ') {
						$comparator = ">=";
					} elseif ( $comparatorType=='NOTEQ') {
						$comparator = "<>";
					} elseif ( $comparatorType=='LK') {
						$comparator = " LIKE ";
					} elseif ( $comparatorType=='LKR') {
						$comparator = " LIKE ";
					} elseif ( $comparatorType=='LKL') {
						$comparator = " LIKE ";
					}

					$kolomaliasBaru = '';
					if ($filter_AND[$key]!=='') { // jika mengandung namatabel.namakolom, maka kita pecah wherenya untuk :alias namakolom
						$pecah = explode('.', $kolom);
						$kolomalias = $kolom;
						if (count($pecah)>1) {
							$kolomalias = $pecah[1];
							$kolomaliasBarux = explode('_AS_', $kolomalias);
							if( count( $kolomaliasBarux ) >=2) {
								$kolom = $kolomaliasBarux[0];
								$kolomalias = $kolom;
								$kolomaliasBaru = $kolomaliasBarux[1];
							}
						}

						if ( $comparatorType=='LK') {//jika comparatornya LIKE maka beri prefix & suffix %
							$value = '%'.$value.'%';
						}
						if ( $comparatorType=='LKL') {//jika comparatornya LIKE Right maka beri suffix %
							$value = '%'.$value.'%';
						}
						if ( $comparatorType=='LKR') {//jika comparatornya LIKE Left maka beri prefix %
							$value = '%'.$value.'%';
						}


						$condition_AND[] = $kolom.$comparator.":".$kolomalias.$kolomaliasBaru;
						$cond_arg_AND[':'.$kolomalias.$kolomaliasBaru] = $value;
					}

				}

				if (count($condition_AND) > 0) {
					/*var_dump( $filter_AND );
					var_dump( $condition_AND );
					var_dump( $kolom );
					var_dump( $kolomalias );
					var_dump( $kolomaliasBaru );
					Yii::app()->end();*/
					$result->andWhere(array('AND', implode(" AND ", $condition_AND)), $cond_arg_AND);
				}
			}

			if ( count($otherquery)>0 ) {
				/* jika ada query lain
				{join|leftJoin|group|limit|order}
				EX :
				$otherquery = array(
					'JOIN'=>array('tbl', 'tbl.kolom = tbl2.id')
					,'LEFTJOIN'=>array('tbl', 'tbl.kolom = tbl2.id')
					,'GROUP'=>'tabel.kolom,tabel.kolom2'
					, 'LIMIT' => 1
					, 'ORDER' => 'tabel.kolom,tabel.kolom2'
				);
				*/
				foreach ($otherquery as $key => $value) {
					$pecahjoin = explode('_', $key);
					if (count($pecahjoin)>1) {
						$key = $pecahjoin[0];
					}
					$key = strtoupper($key);
					if ( $key=='JOIN') {
						$result->join($value[0],$value[1]);
					} else if ( $key=='LEFTJOIN') {
						$result->leftJoin($value[0],$value[1]);
					} else if ( $key=='RIGHTJOIN') {
						$result->rightJoin($value[0],$value[1]);
					} else if ( $key=='CROSSJOIN') {
						$result->crossJoin($value);
					} else if ( $key=='NATURALJOIN') {
						$result->naturalJoin($value);
					} else if ( $key=='UNION') {
						$result->union($value);
					} else if ( $key=='GROUP') {
						$result->group($value);
					} elseif ( $key=='LIMIT') {
						$result->limit($value);
					} elseif ( $key=='OFFSET') {
						$result->offset($value);
					} elseif ( $key=='ORDER') {
						$result->order($value);
					} elseif ( $key=='ANDWHERE') {
						/**
						* $value[0] ==> mixed conditions
						* $value[1] ==> array params
						*/
						if( isset($value[1]) && is_array($value[1]) )
							$result->andWhere($value[0], $value[1]);
						else
							$result->andWhere($value);
					} elseif ( $key=='HAVING') {
						/**
						* $value[0] ==> mixed conditions
						* $value[1] ==> array params
						*/
						if( isset($value[1]) && is_array($value[1]) )
							$result->having($value[0], $value[1]);
						else
							$result->having($value);
					}
				}
			}

			/* mode LIST untuk mereturn kumpulan data array
			mode DETAIL untuk mereturn 1 row data array*/
			if ($mode=='LIST') {
				return $result->queryAll();
			} elseif ($mode=='DETAIL') {
				return $result->queryRow();
			} elseif ($mode=='SCALAR') {
				return $result->queryScalar();
			} elseif ($mode=='DEBUG') {
				error_reporting(0);
				print_r( array('sql' => $result->text, 'params'=> $result->params, 'result'=> $result->queryAll() ) );
			}


		}

		public static function isFilterAND( $filter_AND=array() )
		{
			if ( count($filter_AND)>0 ) { // jika ada filtering AND
				$condition_AND = array();
				$cond_arg_AND = array();

				foreach ($filter_AND as $key => $value) {
					$pecah = explode('__', $key);
					$comparatorType = $pecah[0];
					$kolom = $pecah[1];
					if ( $comparatorType=='EQ') {
						$comparator = "=";
					} elseif ( $comparatorType=='LT') {
						$comparator = "<";
					} elseif ( $comparatorType=='GT') {
						$comparator = ">";
					} elseif ( $comparatorType=='LTEQ') {
						$comparator = "<=";
					} elseif ( $comparatorType=='GTEQ') {
						$comparator = ">=";
					} elseif ( $comparatorType=='NOTEQ') {
						$comparator = "<>";
					} elseif ( $comparatorType=='LK') {
						$comparator = " LIKE ";
					}

					$kolomaliasBaru = '';
					if ($filter_AND[$key]!=='') { // jika mengandung namatabel.namakolom, maka kita pecah wherenya untuk :alias namakolom
						$pecah = explode('.', $kolom);
						$kolomalias = $kolom;
						if (count($pecah)>1) {
							$kolomalias = $pecah[1];
							$kolomaliasBarux = explode('_AS_', $kolomalias);
							if( count( $kolomaliasBarux ) >=2) {
								$kolom = $kolomaliasBarux[0];
								$kolomalias = $kolom;
								$kolomaliasBaru = $kolomaliasBarux[1];
							}
						}

						if ( $comparatorType=='LK') {//jika comparatornya LIKE maka beri prefix & suffix %
							$value = '%'.$value.'%';
						}

						$condition_AND[] = $kolom.$comparator.":".$kolomalias.$kolomaliasBaru;
						$cond_arg_AND[':'.$kolomalias.$kolomaliasBaru] = $value;
					}

				}

				if (count($condition_AND) > 0) {
					return true;
				}
			}
			return false;
		}

		public static function queryOci( $arrayConfig = array() )
		{
			#sama tapi ketambah ` (petik aphosthrope)
			$default= array(
				'dbconnection' => Yii::app()->db
				, 'select' => ''
				, 'from' => ''
				, 'filter' => array()
				, 'filterOR' => false
				, 'otherquery' => array()
				, 'mode' => 'DETAIL'
				);
		    $setting = array_merge($default,$arrayConfig);
		    extract($setting);

			$cmd = $dbconnection->createCommand();
			$result = $result = $cmd->select( $select )
				->from(  $from  );

			if ( count($filter)>0 ) { // jika ada filtering
				$condition = array();
				$cond_arg = array();

				foreach ($filter as $key => $value) {
					$pecah = explode('__', $key);
					$comparatorType = $pecah[0];
					$kolom = $pecah[1];
					if ( $comparatorType=='EQ') {
						$comparator = "=";
					} elseif ( $comparatorType=='LT') {
						$comparator = "<";
					} elseif ( $comparatorType=='GT') {
						$comparator = ">";
					} elseif ( $comparatorType=='LTEQ') {
						$comparator = "<=";
					} elseif ( $comparatorType=='GTEQ') {
						$comparator = ">=";
					} elseif ( $comparatorType=='NOTEQ') {
						$comparator = "<>";
					} elseif ( $comparatorType=='LK') {
						$comparator = " LIKE ";
					}

					$kolomaliasBaru = '';
					if (($filter[$key])!=='') { // jika mengandung namatabel.namakolom, maka kita pecah wherenya untuk :alias namakolom
						$pecah = explode('.', $kolom);
						$kolomalias = $kolom;
						if (count($pecah)>1) {
							$kolomalias = $pecah[1];
							$kolomaliasBarux = explode('_AS_', $kolomalias);
							if( count( $kolomaliasBarux ) >=2) {
								$kolom = $kolomaliasBarux[0];
								$kolomalias = $kolom;
								$kolomaliasBaru = $kolomaliasBarux[1];
							}
						}

						if ( $comparatorType=='LK') {//jika comparatornya LIKE maka beri prefix & suffix %
							$value = '%'.$value.'%';
						}

						$kolom = str_replace(".", '"."', $kolom);

						$condition[] = '"'. $kolom . '"'. $comparator.":".$kolomalias.$kolomaliasBaru;
						$cond_arg[':'.$kolomalias.$kolomaliasBaru] = $value;
					}

				}

				if (count($condition) > 0) {
					/*var_dump( $kolom );
					var_dump( $kolomalias );
					var_dump( $kolomaliasBaru );*/
					$OR_AND = $filterOR ? 'OR' : 'AND';
					// $result->where(array('AND', implode(" AND ", $condition)), $cond_arg);
					$result->where(array($OR_AND, implode(" ".$OR_AND." ", $condition)), $cond_arg);
				}
			}

			if ( count($otherquery)>0 ) {
				/* jika ada query lain
				{join|leftJoin|group|limit|order}
				EX : 
				$otherquery = array(
					'JOIN'=>array('tbl', 'tbl.kolom = tbl2.id')
					,'LEFTJOIN'=>array('tbl', 'tbl.kolom = tbl2.id')
					,'GROUP'=>'tabel.kolom,tabel.kolom2'
					, 'LIMIT' => 1
					, 'ORDER' => 'tabel.kolom,tabel.kolom2'
				);
				*/
				foreach ($otherquery as $key => $value) {
					$pecahjoin = explode('_', $key);
					if (count($pecahjoin)>1) {
						$key = $pecahjoin[0];
					}
					$key = strtoupper($key);
					if ( $key=='JOIN') {
						$value[1] = str_replace('.', '"."', $value[1]);
						$value[1] = str_replace('=', '"="', $value[1]);
						$result->join($value[0],'"'.$value[1].'"');
					} else if ( $key=='LEFTJOIN') {
						$value[1] = str_replace('.', '"."', $value[1]);
						$value[1] = str_replace('=', '"="', $value[1]);
						$result->leftJoin($value[0],'"'.$value[1].'"');
					} else if ( $key=='GROUP') {
						$result->group($value);
					} elseif ( $key=='LIMIT') {
						$result->limit($value);
					} elseif ( $key=='OFFSET') {
						$result->offset($value);
					} elseif ( $key=='ORDER') {
						$result->order($value);
					} elseif ( $key=='ANDWHERE') {
						/**
						* $value[0] ==> mixed conditions
						* $value[1] ==> array params
						*/
						if( isset($value[1]) && is_array($value[1]) )
							$result->andWhere($value[0], $value[1]);
						else 
							$result->andWhere($value);
					}
				}
			}

			/* mode LIST untuk mereturn kumpulan data array
			mode DETAIL untuk mereturn 1 row data array*/
			if ($mode=='LIST') {
				return $result->queryAll();
			} elseif ($mode=='DETAIL') {
				return $result->queryRow();
			} elseif ($mode=='SCALAR') {
				return $result->queryScalar();
			} elseif ($mode=='DEBUG') {
				error_reporting(0);
				print_r( array('sql' => $result->text, 'params'=> $result->params, 'result'=> $result->queryAll() ) );
			}


		}
	}
