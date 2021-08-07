<?php

class DashboardController extends Controller
{
	public function actionIndex()
	{
		$data['theme_baseurl'] = Yii::app()->theme->baseUrl;

		$id = Yii::app()->user->role_id;
		$level = Yii::app()->db->createCommand('SELECT tblrole_id, tblrole_code FROM tblrole WHERE tblrole_id='.$id.'');
		$datalevel = $level->queryRow();

		$iduser = Yii::app()->user->getId();
		$datauser = Yii::app()->db->createCommand('SELECT 
			tblpengguna_id,
			tblpengguna_nama AS nama,
			tblpengguna_username AS uname,
			tblpengguna_email AS email,
			tblpengguna_notelp AS telp,
			tblpengguna_foto AS foto

			FROM tblpengguna 
			WHERE tblpengguna_id='.$iduser.'');
		$user = $datauser->queryRow();

		$this->renderPartial('index', array('data'=>$data, 'level'=>$datalevel, 'pengguna'=>$user));
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