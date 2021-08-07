<?php

class WebController extends Controller
{

	public function init()
    {

        Yii::app()->theme = 'web'; // memanggil tema web saat controller nya web
        Yii::app()->userCounter->refresh();
    }

	public $berita;
	public $pages;
	public $webmenu_parent;
	public $webconfig;
	public $modemenu;
	public $idmodul;
	public $namamodul;

	

	public function actionIndex()
	{	

		$this->modemenu       = Yii::app()->request->getParam('dummy');
		$data['sambutan']     = WebKontent::model()->find('tblwebkontent_mode=:kat', array(':kat'=>'SAMBUTAN'));
		$this->webmenu_parent = Webmenu::model()->findAll('tblwebmenu_status=:stat AND tblwebmenu_parent=:parent', array(':stat'=>'T',':parent'=>0));
		$this->webconfig      = WebConfig::model()->find();

		//BERITA
		$model               = new WebKontent();
		$criteria            = new CDbCriteria;
		$criteria->condition = 'tblwebkontent_mode=:kat AND tblwebkontent_status=:stat';
		$criteria->params    = array(':kat'=>'BERITA', ':stat'=>'T');
		$criteria->order     = 'tblwebkontent_sysinsert DESC';
		$total               = $model->count($criteria);
		$pages               = new CPagination($total);
		$pages->pageSize     = 5;
		$pages->applyLimit($criteria);
		$data['berita'] = WebKontent::model()->findAll($criteria);

		$this->render('index', array('data'=>$data, 'pages'=>$pages));
	}

	public function actionPage()
	{		
		$this->webconfig = WebConfig::model()->find();
		$idmenu          = Yii::app()->request->getParam('id');
		$idmodul         = Webmenu::model()->findByPk($idmenu)->tblwebmodul_id;
		$model_modul     = WebModul::model()->findByPk($idmodul);
		$this->namamodul = $model_modul['tblwebmodul_file'];

		$this->render('page');
	}

	public function actionKontent()
	{
		$this->webconfig = WebConfig::model()->find();
		$this->modemenu  = $this->action->id; 
		$id              = Yii::app()->request->getParam('id');
		$model_kontent   = WebKontent::model()->find('tblwebmenu_id=:idmenu AND tblwebkontent_status=:stat', array(':idmenu'=>$id, ':stat'=>'T'));
		//$this->modemenu = Yii::app()->request->getParam('dummy');
		$this->render('kontent', array('model_kontent' =>$model_kontent));
	}

	public function actionDetail()
	{
		Yii::import('ext.TanggalIndonesia');
		$id            = Yii::app()->request->getParam('id');
		$model_kontent = WebKontent::model()->findByPk($id);
		// print_r($model_kontent);die();
		$this->render('detail', array('model_kontent' =>$model_kontent));
	}


	public function actionPencarian()
	{
		$q = trim($_REQUEST['q']);
		$this->render('hasil_pencarian', array('q'=>$q,'data'=>$data));


	}
	public function actionTentang_lapor()
	{
		$data = WebKontent::model()->find('tblwebkontent_mode=:kat', array(':kat'=>'KONTENT'));
		$this->render('tentang_lapor',array('data'=>$data));
	}
	public function actionHasil_tindaklanjut()
	{
		Yii::import('ext.TanggalIndonesia');

		$this->render('hasil_tindaklanjut',array('data'=>$data));
	}
	public function actionHasilPencarian()
	{
		Yii::import('ext.TanggalIndonesia');

		$data['keyword'] = trim($_REQUEST['keyword']);

		$this->render('hasilpencarian',array('data'=>$data));
	}

	public function actionKontak_kami()
	{
		$this->render('kontak_kami');
	}
	public function actionPengaduan()
	{
		$this->render('pengaduan');
	}
	public function actionKritik_saran()
	{
		$this->render('kritik_saran');
	}

}