<?php

class TblroleController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view','Grup','GetGrup','SimpanGrup','HapusGrup'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Tblrole;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Tblrole']))
		{
			$model->attributes=$_POST['Tblrole'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->tblrole_id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Tblrole']))
		{
			$model->attributes=$_POST['Tblrole'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->tblrole_id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Tblrole');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Tblrole('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Tblrole']))
			$model->attributes=$_GET['Tblrole'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Tblrole the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Tblrole::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Tblrole $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='tblrole-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function actionGrup()
	{
		$data['theme_baseurl'] = Yii::app()->theme->baseUrl;
		$model = Tblrole::model()->findAll();
		
		$this->renderPartial('grup', array('datagrup'=>$model, 'data'=>$data));
	}

	public function actionGetGrup()
	{
		if(!Yii::app()->request->isPostRequest)
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
		$id = trim($_POST['id']);
		$model = Tblrole::model()->findByPk($id);
		foreach ($model as $data) {
			echo $data."||";
		}

	}

	public function actionSimpanGrup()
	{
		if(!Yii::app()->request->isPostRequest)
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
		$cmd = trim($_POST['cmd']); // tangkap perintah yg dikirim
		

		if ($cmd=="tambah") {
			$model = new Tblrole;
			$model->tblrole_id = "";			
		}
		elseif($cmd=="edit") {
			$id = trim($_POST['id']);
			$model = Tblrole::model()->findByPk($id);
		}
		else {
			echo "Invalid Command!";
			Yii::app()->end();
		}

		$model->tblrole_code = trim($_POST['nama']);
		$model->tblrole_desc = trim($_POST['deskripsi']);

		if ($model->save()) {
			echo "success";
		}
		else {
			echo "failed";
		}
	}

	public function actionHapusGrup()
	{
		if(!Yii::app()->request->isPostRequest)
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
		
		$id = trim($_POST['id']);
		$model = Tblrole::model()->findByPk($id);
		if ($model->delete()) {
			echo "success";
		}
		else {
			echo "failed";
		}
	}
}
