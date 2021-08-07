<?php

class Kontent_webController extends Controller
{
	public function actionIndex()
	{
		$data['theme_baseurl'] = Yii::app()->theme->baseUrl;
		$data['menu'] = Webmenu::model()->findAll('tblwebmenu_status=:stat', array(':stat'=>'T'));
		$data['kontent'] = WebKontent::model()->findAll('tblwebkontent_mode=:mode', array(':mode'=>'KONTENT'));
		$this->renderPartial('index', array('data'=>$data));
	}

	public function actionGetDataKontent()
	{
		if(!Yii::app()->request->isPostRequest)
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
		$id = trim($_POST['id']);
		$model = WebKontent::model()->findByPk($id);
		echo CJSON::encode($model);
		

	}


public function actionSimpan()
	{
		if(!Yii::app()->request->isPostRequest)
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
		$cmd = trim($_POST['cmd']); // tangkap perintah yg dikirim
		$tblwebmenu_id = trim($_POST['tblwebmenu_id']);
		$tblwebkontent_mode = trim($_POST['tblwebkontent_mode']);
		$tblwebkontent_sysinsert = trim($_POST['tblwebkontent_sysinsert']);
		$tblwebkontent_judul = trim($_POST['tblwebkontent_judul']);
		$tblwebkontent_isi = trim($_POST['tblwebkontent_isi']);
		$ada_upload = trim($_POST['ada_upload']);
		$tblwebkontent_status = trim($_POST['tblwebkontent_status']);
		$tblwebkontent_tampilhome = trim($_POST['tblwebkontent_tampilhome']);
		@$tblwebkontent_file = trim($_POST['tblwebkontent_file']);

		if ($cmd=="tambah") {
			$model = new WebKontent;
			$model->tblwebkontent_id = "";
			$model->tblwebkontent_file = $tblwebkontent_file;
		}
		elseif($cmd=="edit") {
			$id = trim($_POST['id']); 
			$model = WebKontent::model()->findByPk($id);
			$namafile = $model['tblwebkontent_file'] ;
			
			if ($ada_upload=='GAMBAR') {
				$model->tblwebkontent_file = $tblwebkontent_file;
			}elseif($ada_upload=='KOSONG'){
				$model->tblwebkontent_file = "";
			}
			

		}
		else{
			echo "Invalid Command!";
			Yii::app()->end();
		}
			$model->tblwebmenu_id = $tblwebmenu_id;
			$model->tblwebkontent_mode = 'KONTENT';
			$model->tblwebkontent_sysinsert = date('Y-m-d', strtotime($tblwebkontent_sysinsert));
			$model->tblwebkontent_judul = $tblwebkontent_judul;
			$model->tblwebkontent_isi = $tblwebkontent_isi;
			$model->tblwebkontent_status = $tblwebkontent_status;
			$model->tblwebkontent_tampilhome = $tblwebkontent_tampilhome;
			$model->tblwebkontent_isadafile = $ada_upload;
	
			if($model->save()){	
					echo "success";
				} 
			else{
					echo "failed";
				}
	}

	public function actionHapusDataKontent()
	{
		if(!Yii::app()->request->isPostRequest)
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
		$id = trim($_POST['id']);
		$model = WebKontent::model()->findByPk($id);
		if ($model->delete()) {
			echo "success";
		}
		else {
			echo "failed";
		}
	}


public function actionSimpanFileKontent()
	{
		$folder = "upload/kontent";
		@$filertf = $_FILES['upload_kontent']['tmp_name']; 
		@$namafilekontent = md5(microtime()).'_'.$_FILES['upload_kontent']['name'];
		@$target = dirname(Yii::app()->basePath) . '/'. $folder . '/' . $namafilekontent;
		
		if(isset($_FILES["upload_kontent"]))
		{
			//Filter the file types , if you want.
			if ($_FILES["upload_kontent"]["error"] > 0)
			{
			  echo "error ";
			}
			else
			{
				//move the uploaded file to uploads folder;
		    	//move_uploaded_file($filertf,$target);


				if (move_uploaded_file($filertf,$target)) {
					echo $namafilekontent;
					chmod($target, 0777);
				}
				else {
					echo "failed";
				}
		    	
			}

		}
	}

	public function actionGetMenuDetail()
	{
		if(!Yii::app()->request->isPostRequest)
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');

		$result = array();
		$row = array();
		$id = (int) trim($_POST['id']);
		$namamenu_detail = Yii::app()->db->createCommand('
			SELECT
			tblweblayoutmenudetil.tblweblayoutmenudetil_nama AS nama,
			tblweblayoutmenudetil.tblweblayoutmenudetil_induk AS induk,
			tblweblayoutmenudetil.tblweblayoutmenudetil_id AS id
			FROM
			tblweblayoutmenudetil

		')->queryAll();

		if (count($namamenu_detail)>0) {
			foreach($namamenu_detail as $list)
			{	
				$row[] = array(
					"id"=> $list['id'],
					'nama'=>$list['nama'],
					'induk'=>$list['induk']
				);
			}
			$result=array_merge($result,$row);
			echo CJSON::encode($result);
		}
		else {
			echo CJSON::encode($result);
		}
	}

	public function actioncekdatakontent()
	{
		$menu = trim($_POST['idmenu']);
		$modelii = WebKontent::model()->findAll('tblwebmenu_id=:cek', array(':cek'=>$menu));
		$model = Yii::app()->db->createCommand('SELECT COUNT(*) AS jmldata FROM tblwebkontent WHERE tblwebmenu_id='.$menu)->queryScalar();
		if ($model>0) {
			echo CJSON::encode(array('pesan'=>'ada'));
		}
		else{
			echo CJSON::encode(array('pesan'=>'tidak ada'));
		}
	}


	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}