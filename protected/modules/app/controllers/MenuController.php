<?php

class MenuController extends Controller
{
	var $menuUrut = array();
	public function actionIndex()
	{
		$data['theme_baseurl'] = Yii::app()->theme->baseUrl;
		//$data['tree_menu'] = $this->genMenu();
		$this->renderPartial('index', array('data'=>$data));
	}

	public function actionTreeMenu()
	{
		$data['tree_menu'] = $this->genMenu();
		$this->renderPartial('tree_menu', array('data'=>$data));
	}

	public function genMenu()
	{
		$data = Yii::app()->db->createCommand()
		->select('tblmenu_id AS id,
			tblmenu_id,
			tblmenu_kode,
			tblmenu_kode AS kode,
			tblmenu_title AS title,
			tblmenu_link AS url,
			tblmenu_icon AS icon, 
			tblmenu_idparent')
		->from('tblmenu')
		->order('tblmenu_kode ASC')
		->queryAll();
		$hasil = Tblmenu::model()->buildTree($data);
		//print_r($hasil);
		return $hasil;
	}

	public function actiongetData()
	{
		if(!Yii::app()->request->isPostRequest)
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
		$id = intval($_REQUEST['id']);
		$model = Tblmenu::model()->findByPk($id);
		header('Content-Type: application/json');
		echo CJSON::encode($model);
	}

	public function actionHapus()
	{
		if(!Yii::app()->request->isPostRequest)
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');

		$id = intval($_REQUEST['id']);
		$model = Tblmenu::model()->findByPk($id);

		if ($model->delete()) {
			$status = 'success'; $message = 'Data sukses dihapus';
			$this->delAllChild($id);
		} else {
			$status = 'failed'; $message = 'Data gagal dihapus';
		}
		$return = array('status'=>$status,'data'=>array('message'=>$message));
		header('Content-Type: application/json');
		echo CJSON::encode($return);
	}

	public function delAllChild($idparent)
	{
		$childs = Tblmenu::model()->findAll('tblmenu_idparent=:idparent', array(':idparent'=>$idparent));
		Tblmenu::model()->deleteAll('tblmenu_idparent=:idparent', array(':idparent'=>$idparent));
		foreach ($childs as $menuChild) {
			$idchild = $menuChild['tblmenu_id'];
			$idparent = $idchild;
			$this->delAllChild($idparent);
		}
	}

	public function actionSimpan()
	{
		if(!Yii::app()->request->isPostRequest)
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');

		$id = intval($_REQUEST['id']);
		$cmd = strval($_REQUEST['cmd']);
		if ($cmd=='tambah') {
			$model = new Tblmenu;
		} elseif ($cmd=='edit') {
			$model = Tblmenu::model()->findByPk($id);
		} else {
			echo "not defined"; Yii::app()->end();
		}

		$model->tblmenu_icon = strval($_REQUEST['tblmenu_icon'])!='' ? strval($_REQUEST['tblmenu_icon']) : null; 
		$model->tblmenu_kode = strval($_REQUEST['tblmenu_kode'])!='' ? strval($_REQUEST['tblmenu_kode']) : null; 
		$model->tblmenu_link = strval($_REQUEST['tblmenu_link']);
		$model->tblmenu_title = strval($_REQUEST['tblmenu_title']);
		$model->tblmenu_idparent = (int)$_REQUEST['tblmenu_idparent'];

		if ($model->save()) {
			$status = 'success'; $message = 'Data sukses disimpan';
		} else {
			$status = 'failed'; $message = 'Data gagal disimpan';
		}
		$return = array('status'=>$status,'data'=>array('message'=>$message));
		header('Content-Type: application/json');
		echo CJSON::encode($return);
	}

	public function actiondefragMenu()
	{
		$obj = json_decode( $_REQUEST['data'] );
		/*** convert the array to object ***/
    	$susunan = $this->objectToArray( $obj );

		//print_r($susunan);
		// Yii::app()->end();
		$menuUrut = array();
		$urutan = 1;foreach ($susunan as $key => $value) {
			//var_dump($value);
			$this->genKode($value, "", $urutan++);
		}

		foreach ($this->menuUrut as $menu) {
			$model = Tblmenu::model()->findByPk($menu['id']);
			$model->tblmenu_kode = $menu['kode'];
			$model->tblmenu_idparent = $menu['parent'];
			$menuUrut[] = $model->save() ? array('id'=>$menu['id'],'status'=>'success') : array('id'=>$menu['id'],'status'=>'fail');
		}
		// print_r($this->menuUrut);Yii::app()->end();
		if (count($menuUrut)>0) {
			$status = 'success';
			$message = 'Susunan menu berhasil disesuaikan.';
		}
		$return = array('status'=>$status,'data'=>array('message'=>$message,'return_data'=>$menuUrut));
		header('Content-Type: application/json');
		echo CJSON::encode($return);
	}

	public function genKode($menu, $kode_parent="", $urutan=1, $parent=0)
	{
		
    	$kode_parent = $kode_parent . ($kode_parent!='' ? '.' : "") . sprintf("%03d", $urutan);

		array_push( $this->menuUrut, array('id'=>$menu['id'],'kode'=> $kode_parent,'parent'=>$parent) );
		if(isset($menu['children'])){
            //We need to loop through it.
    		$no=1; foreach ($menu['children'] as $anak) {
    			$parent = $menu['id'];
        		//array_push($this->menuUrut, $this->genKode($anak, $kode_parent, $no++));
        		$this->genKode($anak, $kode_parent, $no++, $parent);
    		}
        }
	}

	public function actionAllMenu()
	{
		$result = array();
		$row = array();

		header('Content-type: text/json');
		header('Content-type: application/json');
		$id = isset($_REQUEST['id']) ? (int)$_REQUEST['id'] : "";

		$data = Tblmenu::model()->findAll(array('order'=>'tblmenu_kode ASC'));

		if (count($data)>0) {
			foreach($data as $list)
			{	
				$row[] = array(
					"id"=> $list['tblmenu_id'],
					'value'=> $list['tblmenu_title'],
					'isDisabled'=> ($id==$list['tblmenu_id']) ? 'T' : 'F'
				);
			}
			$result=array_merge($result,$row);
			echo CJSON::encode($result);
		}
		else {
			echo CJSON::encode($result);
		}
	}

	public function actiongetKodeMenu()
	{
		$idparent = (int)$_REQUEST['id'];
		$jml_submenu = Tblmenu::model()->count('tblmenu_idparent=:idparent', array(':idparent'=>$idparent));
		$kode_parent = Tblmenu::model()->findByPk($idparent)->tblmenu_kode;
		$kode_menubaru = $kode_parent .'.'. sprintf("%03d", ($jml_submenu+1));
		header('Content-type: text/json');
		header('Content-type: application/json');
		echo CJSON::encode(array('tblmenu_kode'=>$kode_menubaru));
	}

	/**
    *
    * Convert an object to an array
    *
    * @param    object  $object The object to convert
    * @reeturn      array
    *
    */
    function objectToArray( $object )
    {
        if( !is_object( $object ) && !is_array( $object ) )
        {
            return $object;
        }
        if( is_object( $object ) )
        {
            $object = get_object_vars( $object );
        }
        return array_map( array($this,'objectToArray'), $object );
    }
}