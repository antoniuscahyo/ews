<?php

class SiteController extends Controller
{
	public function init()
    {

        Yii::app()->theme = 'smartadmin'; // memanggil tema smartadmin saat controller nya web
    }
	public $menu;
	public $id_pengguna;
	public $username;
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'

		if( Yii::app()->user->isGuest) #jika masih belum login(tamu), arahkan ke login
			$this->redirect(array('/web'));

		#generate menu sesuai levelnya
		$this->menu = Tblmenu::model()->genMenu(Yii::app()->user->role_id);
		//die(print_r($this->menu));
		$this->id_pengguna = Yii::app()->user->getId();
		$this->render('index', 
			array(
				'menu'=>$this->menu,
				'id'=>$this->id_pengguna
				//'username'=>$this->username
			)
		);
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the login page
	 */
	/*public function actionLogin()
	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		$this->renderPartial('form-login',array('model'=>$model));
	}*/

	public function actionLogin()
    {
        $model = new LoginForm;

        // if it is ajax validation request
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form')
        {
            $errors = CActiveForm::validate($model);
            if ($errors != '[]')
            {
                echo $errors;
                Yii::app()->end();
            }
        }

        // collect user input data
        if (isset($_POST['LoginForm']))
        {
        	$captcha = strtolower(Yii::app()->request->getParam('captcha'));
			if ($captcha != strtolower(Yii::app()->session['captcha_text'])) {
	            echo CJSON::encode(array('pesan'=>'not_valid'));
	            Yii::app()->end();
	        }
            $model->attributes = $_POST['LoginForm'];
            //die(print_r($_POST['LoginForm']));
            // validate user input and redirect to the previous page if valid
            if ($model->validate() && $model->login())
            //if (true && true)
            {
                if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form')
                {
                    echo CJSON::encode(array(
                        'authenticated' => true,
                        'redirectUrl' => Yii::app()->user->returnUrl,
                        "param" => "Any additional param"
                    ));
                    Yii::app()->end();
                }
                $this->redirect(Yii::app()->user->returnUrl);
            }
        }
        // display the login form
        $this->renderPartial('form-login', array('model' => $model));
    }

        public function actioncaptchaverifikasi()
	{
		// error_reporting(-1);
		header ('Content-type: image/png');
		$path = dirname( Yii::app()->getBasePath() ).'/assets/';

		$chars = "23456789abcdefghkmnpqrstuvwxyzABCDEFGHJKLMNPQRSTUVWXYZ";

		$captcha_text = '';

		for ($i = 0; $i < 4; $i++) 
		{
			$captcha_text .= $chars[rand(0, strlen($chars)-1)];
		}	
		$captcha_bg = @imagecreatefrompng($path."captcha.png"); 

		// echo file_exists($path.'gm.ttf') ? 'ya' : 'no';	
		imagettftext( $captcha_bg, 40, 0, 40, 70, imagecolorallocate ($captcha_bg, 0, 0, 0),
			$path.'gm.ttf', $captcha_text );

		$_SESSION['captcha'] = $captcha_text;
		Yii::app()->session['captcha_text'] = $captcha_text;

		imagepng($captcha_bg, NULL, 0);
		imagedestroy($captcha_bg);
	}
	public function actionReloadCaptcha()
	{
		echo '<img style="width:150px; border-radius: 5px; padding: 5px; border:1px solid #ccc;" src="'.Yii::app()->baseUrl.'/site/captchaverifikasi">';
	}


   /* public function actionGetFp()
    {
    	$id = Yii::app()->user->getId();
    	$model = Yii::app()->db->createCommand('SELECT
    		tblpengguna_foto as foto FROM tblpengguna
    		WHERE tblpengguna_id = '.$id.'
    		')->queryRow();
    		die($model['foto']);
    		return $model['foto'];	

    }*/

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
}