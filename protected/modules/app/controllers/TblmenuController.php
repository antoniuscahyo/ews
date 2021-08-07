<?php

class TblmenuController extends Controller
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
				'actions'=>array('
					index',
					'view',
					'Menu',
					'GetMenu',
					'HapusMenu',
					'SimpanMenu',
					'GenerateMenu'
				),
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
		$model=new Tblmenu;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Tblmenu']))
		{
			$model->attributes=$_POST['Tblmenu'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->tblmenu_id));
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

		if(isset($_POST['Tblmenu']))
		{
			$model->attributes=$_POST['Tblmenu'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->tblmenu_id));
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
		$dataProvider=new CActiveDataProvider('Tblmenu');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Tblmenu('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Tblmenu']))
			$model->attributes=$_GET['Tblmenu'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Tblmenu the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Tblmenu::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Tblmenu $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='tblmenu-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function actionMenu()
	{
		$data['theme_baseurl'] = Yii::app()->theme->baseUrl;
		$model =Yii::app()->db->createCommand('SELECT
			tblmenu_id AS id,
			tblmenu_title AS title,
			tblmenu_idparent AS parent,
			tblmenu_icon AS icon,
			tblmenu_link AS link
			FROM tblmenu ORDER BY tblmenu_id
			');
		$menu = $model->queryAll();

		$this->renderPartial('menu', array('datamenu'=>$menu, 'data'=>$data));
	}

	public function actionGetMenu()
	{
		if(!Yii::app()->request->isPostRequest)
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
		$id = trim($_POST['id']);
		$model = Tblmenu::model()->findByPk($id);

		foreach ($model as $datamenu) {
			echo $datamenu.'||';
		}
	}
	public function actionSimpanMenu()
	{
		if(!Yii::app()->request->isPostRequest)
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
		$cmd = trim($_POST['cmd']); // tangkap perintah yg dikirim
		

		if ($cmd=="tambah") {
			$model = new Tblmenu;
			$model->tblmenu_id = "";
			$model->tblmenu_idparent = trim($_POST['parent']);			
		}
		elseif($cmd=="edit") {
			$id = trim($_POST['id']);
			$model = Tblmenu::model()->findByPk($id);
		}
		else {
			echo "Invalid Command!";
			Yii::app()->end();
		}

		$model->tblmenu_title = trim($_POST['judul']);
		$model->tblmenu_icon = (trim($_POST['icon']) !="") ? trim($_POST['icon']) : null;
		$model->tblmenu_link = trim($_POST['link']);

		if ($model->save()) {
			echo "success";
		}
		else {
			echo "failed";
		}
	}

	public function actionHapusMenu()
	{
		if(!Yii::app()->request->isPostRequest)
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
		$id=trim($_POST['id']);
		$model = Tblmenu::model()->findByPk($id);

		if ($model->delete()) {
			echo "success";
		}
		else {
			echo "failed";
		}
	}

	public function actionGenerateMenu()
	{
		//Tblmenu::model()->buatMenu(1);
		Tblmenu::model()->genMenu(1);
	}
}
