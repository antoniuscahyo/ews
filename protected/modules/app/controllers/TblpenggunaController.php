<?php

class TblpenggunaController extends Controller
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
				'actions'=>array('index','view','Pengguna',
					'SimpanPengguna','getdatapengguna',
					'HapusDataPengguna','HakAkses','HakAkses2',
					'EditHakAkses','EditHakAkses2','Simpan','GantiFp'),
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
		$model=new Tblpengguna;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Tblpengguna']))
		{
			$model->attributes=$_POST['Tblpengguna'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->tblpengguna_id));
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

		if(isset($_POST['Tblpengguna']))
		{
			$model->attributes=$_POST['Tblpengguna'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->tblpengguna_id));
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
		$dataProvider=new CActiveDataProvider('Tblpengguna');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
			));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Tblpengguna('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Tblpengguna']))
			$model->attributes=$_GET['Tblpengguna'];

		$this->render('admin',array(
			'model'=>$model,
			));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Tblpengguna the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Tblpengguna::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Tblpengguna $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='tblpengguna-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function actionPengguna()
	{	
		$data['theme_baseurl'] = Yii::app()->theme->baseUrl;
		$hakakseslist = Yii::app()->db->createCommand('SELECT
			tblrole_id AS id,
			tblrole_code AS code
			FROM tblrole
			');
		$datahakakses = $hakakseslist->queryAll();

		$model = Yii::app()->db->createCommand('SELECT 
			nama,
			username,
			pengguna_id,
			idsubunit,
			status,
			kode,
			deskripsi,
			email,
			notelp 
			FROM vtblpengguna
			');
		$datapengguna = $model->queryAll();

		$this->renderPartial('pengguna', array('datapengguna' => $datapengguna, 'data' => $data, 'hakakseslist' => $datahakakses));
	}

	public function actionSimpanPengguna()
	{
		if(!Yii::app()->request->isPostRequest)
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
		$cmd = trim($_POST['cmd']); // tangkap perintah yg dikirim
		
		if (Yii::app()->user->isGuest) {
			echo "anda tidak berhak";
			Yii::app()->end();
		}

		if ($cmd=="tambah") {
			$model = new Tblpengguna;
			$model->tblpengguna_id = "";
			$model->tblpengguna_created = "now()";
			$model->tblpengguna_password = md5(trim($_POST['pass']));
			$model->tblpengguna_foto = "foto.jpg";
			
		}
		elseif($cmd=="edit") {
			$id = trim($_POST['id']);
			$model = Pengguna::model()->findByPk($id);
			$model->tblpengguna_modified = "now()";

			if (trim($_POST['pass']) != "") {
				$model->tblpengguna_password = md5(trim($_POST['pass']));
			}
		}
		else {
			echo "Invalid Command!";
			Yii::app()->end();
		}

		$model->tblpengguna_nama = trim($_POST['nama']);
		$model->tblpengguna_username = trim($_POST['uname']);
		$model->tblpengguna_email = trim($_POST['email']);
		$model->tblpengguna_notelp = trim($_POST['phone']);
		$model->tblrole_id = trim($_POST['hakakses']);
		$model->tblpengguna_status = trim ($_POST['status']);

		if ($model->save()) {
			echo "success";
		}
		else {
			echo "failed";
		}
	}

	public function actionGetDataPengguna()
	{
		if(!Yii::app()->request->isPostRequest)
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
		$id = trim($_POST['id']);
		$model = Pengguna::model()->findByPk($id);

		foreach ($model as $data) {
			echo $data."||";
		}

	}

	public function actionHapusDataPengguna()
	{
		if(!Yii::app()->request->isPostRequest)
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
		$id = trim($_POST['id']);
		$model = Pengguna::model()->findByPk($id);
		if ($model->delete()) {
			echo "success";
		}
		else {
			echo "failed";
		}
	}

	public function actionHakAkses()
	{
		$data['theme_baseurl'] = Yii::app()->theme->baseUrl;

		$model=Yii::app()->db->createCommand('SELECT
			tblrole_id AS id,
			tblrole_code AS kode
			FROM tblrole 
			');
		$dataakses = $model->queryAll();

		$this->renderPartial('hakakses', array('data'=>$data, 'dataakses'=>$dataakses));
	}

	public function actionEditHakAkses()
	{
		if(!Yii::app()->request->isPostRequest)
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
		$id = trim($_POST['id']);
		$model = Yii::app()->db->createCommand('SELECT 
			tblroleprivilege_id,
			tblroleprivilege_iscreate,
			tblroleprivilege_isupdate,
			tblroleprivilege_isdelete,
			tblroleprivilege_issearch,
			tblroleprivilege_isprint,
			tblroleprivilege_isshow,
			tblmenu_idparent,
			tblmenu_title
			FROM vtblroleprivilege
			WHERE tblrole_id = '.$id.'
			');
		$datahak = $model->queryAll();
		$this->renderPartial('detailhakakses', array('datatblakses'=>$datahak));
	}

	//Version 2

	public function actionHakAkses2()
	{
		$data['theme_baseurl'] = Yii::app()->theme->baseUrl;

		$model=Yii::app()->db->createCommand('SELECT
			tblrole_id AS id,
			tblrole_code AS kode
			FROM tblrole 
			');
		$dataakses = $model->queryAll();

		$this->renderPartial('hakakses2', array('data'=>$data, 'dataakses'=>$dataakses));
	}

	public function actionEditHakAkses2()
	{
		if(!Yii::app()->request->isPostRequest)
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
		$id = trim($_POST['id']);

		$model = Yii::app()->db->createCommand('SELECT 
			tblroleprivilege_id,
			tblroleprivilege_isshow,
			tblmenu_idparent,
			tblmenu_title,
			tblrole_id
			FROM vtblroleprivilege
			WHERE tblrole_id = '.$id.'
			');
		$datahak = $model->queryAll();

		$getnama = Yii::app()->db->createCommand('SELECT
			tblrole_id,
			tblrole_code
			FROM tblrole
			WHERE tblrole_id = '.$id.'
			');
		$resnama = $getnama->queryRow();

		$this->renderPartial('detailhakakses2', array('datatblakses'=>$datahak, 'judul'=>$resnama));
	}

	public function actionSimpan()
	{
		$data = json_decode(stripslashes($_POST['datacheck']));
		$idgrup = trim($_POST['idgrup']);

		foreach ($data as $list => $val) {
			$model = Tblroleprivilege::model()->findByPk($list);
			$model->tblroleprivilege_isshow = $val;
			if ($model->save()) {
				echo "success";
			}
			else {

			}
		}
		
	}

	public function actionGantiFp()
	{
		$valid_ext = array('jpg','jpeg','png','gif','bmp');
		$ext = strtolower(end(explode('.', $_FILES['fotoprofil']['name'])));
		if (Yii::app()->user->isGuest || Yii::app()->user->role_id<>1) {
			echo 'anda tidak berhak';
			Yii::app()->end();
		}
		if(in_array($ext, $valid_ext)){
			date_default_timezone_set('Asia/Jakarta');
			$path_simpan = $this->GetAppPath().'/upload/pengguna/';
			@$id = trim($_POST['id']);
			if (!empty($_FILES)) {
			// jika ada file yg diupload
				$model = Tblpengguna::model()->findByPk($id);
				if ($model) {
				// jika benar idnya
					/*upload file*/
					$filelama = $model->tblpengguna_foto;
					$tempFile = $_FILES['fotoprofil']['tmp_name'];
					
					$targetPath = $path_simpan;
				    $namanya = md5(microtime()).'-'.$_FILES['fotoprofil']['name']; // gunakan nama yang unik
				    $targetFile =  $targetPath. $namanya;
				    
				    if( move_uploaded_file($tempFile,$targetFile) ) {
				    	// jika sukses upload gambar maka chmod 777 serta simpan namanya di database
				    	chmod( $targetFile, 0777);
				    	$ukuran = filesize( $targetFile );
				    	$model->tblpengguna_foto =  $namanya; // ganti datanya

				    	if($filelama != "foto.jpg") {
				    		if (file_exists($targetPath.$filelama)) {
				    			@unlink($targetPath.$filelama);
				    		}
				    	}
				    	
				    } else { echo "gagal upload"; Yii::app()->end(); }
				    /*end upload file*/

				    if( $model->save(false) ){
					$PK = $model->primaryKey; // ambil id yg terakhir diinsert
					echo $namanya."|||".$ukuran.$PK."|||success";
				} else {
					echo "gagal"; echo $model->save();
				}			
			}
		}else{
			echo "invalid_ext";
		}
	}
	}
	public function GetAppPath()
	{
		return dirname(Yii::app()->basePath);
	}
}
