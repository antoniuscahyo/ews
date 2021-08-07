<?php

class Ref_tahunController extends Controller
{
	public function actionIndex()
	{
		$data['datatahun'] = Reftahun::model()->findAll();
		$this->renderPartial('index', array(
			'data'=>$data
			));
	}

	public function actionSimpan()
	{
		if(!Yii::app()->request->isPostRequest)
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
		$cmd = trim($_POST['cmd']); // tangkap perintah yg dikirim

		$reftahun_nama = trim($_POST['reftahun_nama']);
		$reftahun_status = trim($_POST['reftahun_status']);

		if ($cmd=="tambah") {
			$model = new Reftahun;
			$model->reftahun_sysinsert = date('Y-m-d H:i:s');
		}
		elseif($cmd=="edit") {
			$id = trim($_POST['id']); 
			$model = Reftahun::model()->findByPk($id);
		}
		else{
			echo "Invalid Command!";
			Yii::app()->end();
		}
		
		$model->reftahun_nama = $reftahun_nama;
		$model->reftahun_status = $reftahun_status;
		$model->reftahun_sysupdate = date('Y-m-d H:i:s');


		if($model->save()){	
			echo "success";
		} 
		else{
			print_r($model);
			echo "failed";
		}
	}

	public function actionGetData()
	{
		if(!Yii::app()->request->isPostRequest)
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
		$id = trim($_POST['id']);
		$model = Reftahun::model()->findByPk($id);
		echo CJSON::encode($model);
	}

	public function actionHapusData()
	{
		if(!Yii::app()->request->isPostRequest)
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
		$id = trim($_POST['id']);
		$model = Reftahun::model()->findByPk($id);
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