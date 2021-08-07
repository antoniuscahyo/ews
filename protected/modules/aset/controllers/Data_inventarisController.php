<?php

class Data_inventarisController extends Controller
{
	public function actionIndex()
	{
		$data['jenisaset_list'] = Refjenisaset::model()->findAll();
		$data['tahun_list'] = Reftahun::model()->findAll();
		$data['ruang_list'] = Refruang::model()->findAll();
		$data['inventaris_list'] = Tblinventaris::model()->findAll();
		$this->renderPartial('index', array('data' => $data));
	}

	public function actionCaridata()
	{
		$nomor = isset($_REQUEST['nomor']) ? $_REQUEST['nomor'] : '';
		if ($nomor=="") {
			$data['inventaris_list'] = Tblinventaris::model()->findAll();
		} else {
			$data['inventaris_list'] = Tblinventaris::model()->findAllByAttributes(['tblinventaris_nomor'=>$nomor]);
		}

		$this->renderPartial('tabeldata', array('data' => $data));
	}

	public function actionSimpan()
	{
		if(!Yii::app()->request->isPostRequest)
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
		$cmd = trim($_POST['cmd']); // tangkap perintah yg dikirim

		$tblinventaris_nomor = trim($_POST['tblinventaris_nomor']);
		$refjenisaset_id = trim($_POST['refjenisaset_id']);
		$tblinventaris_namabarang = trim($_POST['tblinventaris_namabarang']);
		$tblinventaris_spesifikasi = trim($_POST['tblinventaris_spesifikasi']);
		$tblinventaris_kondisi = trim($_POST['tblinventaris_kondisi']);
		$reftahun_id = trim($_POST['reftahun_id']);
		$refruang_id = trim($_POST['refruang_id']);
		$tblinventaris_file = trim($_POST['tblinventaris_file']);

		if ($cmd=="tambah") {
			$model = new Tblinventaris;
			$model->tblinventaris_created = date('Y-m-d H:i:s');
		}
		elseif($cmd=="edit") {
			$id = trim($_POST['id']); 
			$model = Tblinventaris::model()->findByPk($id);
		}
		else{
			echo "Invalid Command!";
			Yii::app()->end();
		}
		
		$model->tblinventaris_nomor = $tblinventaris_nomor;
		$model->refjenisaset_id = $refjenisaset_id;
		$model->tblinventaris_namabarang = $tblinventaris_namabarang;
		$model->tblinventaris_spesifikasi = $tblinventaris_spesifikasi;
		$model->tblinventaris_kondisi = $tblinventaris_kondisi;
		$model->reftahun_id = $reftahun_id;
		$model->refruang_id = $refruang_id;
		$model->tblinventaris_file = $tblinventaris_file;
		$model->tblinventaris_modified = date('Y-m-d H:i:s');


		if($model->save()){	
			echo "success";
		} 
		else{
			print_r($model);
			echo "failed";
		}
	}

	public function actionSimpanFile()
	{
		$folder = "upload/aset";
		$filertf = $_FILES['upload_file']['tmp_name']; 
		$namafileimage = md5(microtime()).'_'.$_FILES['upload_file']['name'];
		$target = dirname(Yii::app()->basePath) . '/'. $folder . '/' . $namafileimage;
		
		$allowed = array('jpg','jpeg','png','gif','bmp');
		$pecah = explode('.', $_FILES['upload_file']['name']);
		$getext = array_reverse($pecah);
		$ext = $getext[0];

		if(isset($_FILES["upload_file"]))
		{
			//Filter the file types , if you want.
			if (in_array(strtolower($ext), $allowed)) {

				if ($_FILES["upload_file"]["error"] > 0)
				{
				  echo "error ";
				}
				else
				{
					//move the uploaded file to uploads folder;
			    	//move_uploaded_file($filertf,$target);


					if (move_uploaded_file($filertf,$target)) {
						echo $namafileimage;
						chmod($target, 0777);
					}
					else {
						echo "failed";
					}
			    	
				}
			}else{
				echo "invalid_ext";
			}	

		}
	}

	public function actionGetDataInventaris()
	{
		if(!Yii::app()->request->isPostRequest)
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
		$id = trim($_POST['id']);
		$model = Tblinventaris::model()->findByPk($id);
		echo CJSON::encode($model);
	}

	public function actionHapusData()
	{
		if(!Yii::app()->request->isPostRequest)
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
		$id = trim($_POST['id']);
		$model = Tblinventaris::model()->findByPk($id);
		if ($model->delete()) {
			echo "success";
		}
		else {
			echo "failed";
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