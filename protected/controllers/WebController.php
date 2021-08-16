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
		// $data['pengaduan'] = Tblpengaduan::model()->findAll(); data pengaduan

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
	
	public function actionCariAset()
	{
		$NomorAset = trim($_REQUEST['NomorAset']);
		$DataInventaris = Tblinventaris::model()->find('tblinventaris_nomor=:nomor', array(':nomor'=>$NomorAset));
		$ArrData = [
			'id' => $DataInventaris->tblinventaris_id,
			'nama_barang' => $DataInventaris->tblinventaris_namabarang,
			'spesifikasi' => $DataInventaris->tblinventaris_spesifikasi,
			'tahun_perolehan' => Reftahun::model()->findByPk($DataInventaris->reftahun_id)->reftahun_nama,
			'foto' => $DataInventaris->tblinventaris_file,
		];
		// print_r($DataInventaris);die();
		echo CJSON::encode($ArrData);
		// echo json_encode($DataInventaris);
	}

	public function actionKirimSaran()
	{
		$folder = "upload/pengaduan";
		$file = $_FILES['upload_file']['tmp_name']; 
		$namafileimage = md5(microtime()).'_'.$_FILES['upload_file']['name'];
		echo $namafileimage;die();
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
			    	//move_uploaded_file($file,$target);


					if (move_uploaded_file($file,$target)) {
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

		$model = new Tblpengaduan;
		$model->tblinventaris_id = trim($_POST['id_inventaris']);
		$model->tblpengaduan_namapelapor = trim($_POST['namapelapor']);
		$model->tblpengaduan_keterangan = trim($_POST['keteranganlapor']);
		$model->tblpengaduan_tanggal = date('Y-m-d h:i:s');
		$model->tblpengaduan_file = $file;
		if($model->save()) {
			echo "success";
		} else {
			echo "failed";
		}
	}
}