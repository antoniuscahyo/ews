<?php

class UtilityController extends Controller
{
	public function actionIndex()
	{
		$data = Pengguna::model()->findByPk(Yii::app()->user->getId());
		$this->renderPartial('index', array('data'=>$data));
	}

	public function actionGantiPass()
	{
		if(!Yii::app()->request->isPostRequest)
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
		$id = Yii::app()->user->getId();

		$model = Pengguna::model()->findByPk($id);
		//print_r($model);
		if (md5(trim($_POST['passlama']))==$model->tblpengguna_password) {
			$model->tblpengguna_password = md5(trim($_POST['pass']));
			$model->tblpengguna_passori = trim($_POST['pass']);
			$model->tblpengguna_modified = date("Y-m-d H:i:s");
			if($model->save()) {
				echo "success";
			}
			else {
				echo "fail";
			}
			//print_r($model);
		}
	}

	public function actionGantiUname()
	{
		if(!Yii::app()->request->isPostRequest)
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
		$id = Yii::app()->user->getId();

		$model = Pengguna::model()->findByPk($id);

		$model->tblpengguna_nama = trim($_POST['nama']);
		$model->tblpengguna_username = trim($_POST['username']);
		$model->tblpengguna_email = trim($_POST['email']);
		$model->tblpengguna_modified = date("Y-m-d H:i:s");
		if($model->save()) {
			echo "success";
		}
		else {
			print_r($model);
			echo "fail";
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