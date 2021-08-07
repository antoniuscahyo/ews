<?php

class AllFunction extends CActiveRecord
{
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	public function getAll()
	{
		$model = BukuTamu::model()->findAll('tblbtamu_aktif=:stat LIMIT 10', array(':stat'=>1));
		return $model;
	}
	public function getLinkTerkait()
	{
		$data = LinkTerkait::model()->findAll('reflinksitus_status=:stat AND reflinksitus_mode=:mode LIMIT 3', array(':stat'=>'T',':mode'=>'LINK_TERKAIT'));
		return $data;
	}
	public function getLinkSitus()
	{
		$data = LinkTerkait::model()->findAll('reflinksitus_status=:stat AND reflinksitus_mode=:mode LIMIT 5', array(':stat'=>'T',':mode'=>'LINK'));
		return $data;
	}
	public function getLinkKecamatan()
	{
		$data = LinkTerkait::model()->findAll('reflinksitus_status=:stat AND reflinksitus_mode=:mode ', array(':stat'=>'T',':mode'=>'KECAMATAN'));
		return $data;
	}
	public function getGrupGallery()
	{
		$model=new GrupGallery();
		$criteria=new CDbCriteria;
		$criteria->condition = 'tblwebgallerygrup_status=:stat';
		$criteria->params = array(':stat'=>'T');
		$total = $model->count($criteria);
		$data['pages_grupgallery']=new CPagination($total);
		$data['pages_grupgallery']->pageSize=8;
		$data['pages_grupgallery']->applyLimit($criteria);
		$data['grupgallery']= GrupGallery::model()->findAll($criteria);
		//$data = GrupGallery::model()->findAll('tblwebgallerygrup_status=:stat', array(':stat'=>'T'));
		return $data;
	}
	public function getVideo()
	{
		$model=new WebVideo();
		$criteria=new CDbCriteria;
		$criteria->condition = 'tblwebvideo_status=:stat';
		$criteria->params = array(':stat'=>'T');
		$total = $model->count($criteria);
		$data['pages_video']=new CPagination($total);
		$data['pages_video']->pageSize=5;
		$data['pages_video']->applyLimit($criteria);
		$data['video']= WebVideo::model()->findAll($criteria);
		//$data = GrupGallery::model()->findAll('tblwebgallerygrup_status=:stat', array(':stat'=>'T'));
		return $data;
	}
	public function getJumlahFotoByGrup($idgrup)
	{
		$model = WebGallery::model()->findAll('tblwebgallery_status=:stat AND tblwebgrupgallery_id=:idgrup', array(':stat'=>'T', ':idgrup'=>$idgrup));
		$data = count($model);
		return $data;
	}
	public function getFotoFooter()
	{
		$data = WebGallery::model()->findAll('tblwebgallery_status=:stat ORDER BY tblwebgallery_id DESC LIMIT 6', array(':stat'=>'T'));
		return $data;
	}
	public function getDataJamPelayanan()
	{
		$data = Jampelayanan::model()->findAll('tbljampelayanan_isaktif=:stat', array(':stat'=>'T'));
		return $data;
	}
	public function getAllGallery()
	{
		$data = WebGallery::model()->findAll('tblwebgallery_status=:stat', array(':stat'=>'T'));
		return $data;
	}
	public function getSlider()
	{
		$data = Tblslider::model()->findAll('tblslider_status=:stat', array(':stat'=>'T'));
		return $data;
	}
	public function getText()
	{
		$data = Runningtext::model()->find('tblrunningtext_status=:stat', array(':stat'=>'T'));
		return $data;
	}
	public function getBanner()
	{
		$data = Banner::model()->find('tblwebheader_status=:stat AND tblwebheader_mode', array(':stat'=>'T', ':mode'=>'BANNER'));
		return $data;
	}
	public function getLastGallery()
	{
		$data = WebGallery::model()->find('tblwebgallery_status=:stat ORDER BY tblwebgallery_id DESC', array(':stat'=>'T'));
		return $data;
	}
	public function getLastBerita()
	{
		$model=new WebKontent();
		$criteria=new CDbCriteria;
		$criteria->condition = 'tblwebkontent_status=:stat AND tblwebkontent_mode=:mode';
		$criteria->params = array(':stat'=>'T',':mode'=>'BERITA');
		$criteria->order = 'tblwebkontent_sysinsert DESC';
		$total = $model->count($criteria);
		$data['pages_berita']=new CPagination($total);
		$data['pages_berita']->pageSize=4;
		$data['pages_berita']->applyLimit($criteria);
		$data['berita']= WebKontent::model()->findAll($criteria);
		return $data;
	}
	public function getPopularBerita()
	{
		$model=new WebKontent();
		$criteria=new CDbCriteria;
		$criteria->condition = 'tblwebkontent_status=:stat AND tblwebkontent_mode=:mode';
		$criteria->params = array(':stat'=>'T',':mode'=>'BERITA');
		$criteria->order = 'tblwebkontent_klik DESC';
		$total = $model->count($criteria);
		$data['pages_berita']=new CPagination($total);
		$data['pages_berita']->pageSize=4;
		$data['pages_berita']->applyLimit($criteria);
		$data['berita']= WebKontent::model()->findAll($criteria);
		return $data;
	}
	public function getBeritaOpini()
	{
		$model=new WebKontent();
		$criteria=new CDbCriteria;
		$criteria->condition = 'tblwebkontent_status=:stat AND tblwebkontent_mode=:mode AND tblwebkontent_tipe=:tipe';
		$criteria->params = array(':stat'=>'T',':mode'=>'BERITA',':tipe'=>'OPINI');
		$criteria->order = 'tblwebkontent_sysinsert DESC';
		$total = $model->count($criteria);
		$data['pages_berita']=new CPagination($total);
		$data['pages_berita']->pageSize=5;
		$data['pages_berita']->applyLimit($criteria);
		$data['berita']= WebKontent::model()->findAll($criteria);
		return $data;
	}
	public function getBeritaUmum()
	{
		$model=new WebKontent();
		$criteria=new CDbCriteria;
		$criteria->condition = 'tblwebkontent_status=:stat AND tblwebkontent_mode=:mode AND tblwebkontent_tipe=:tipe';
		$criteria->params = array(':stat'=>'T',':mode'=>'BERITA',':tipe'=>'BERITAUMUM');
		$criteria->order = 'tblwebkontent_sysinsert DESC';
		$total = $model->count($criteria);
		$data['pages_berita']=new CPagination($total);
		$data['pages_berita']->pageSize=5;
		$data['pages_berita']->applyLimit($criteria);
		$data['berita']= WebKontent::model()->findAll($criteria);
		return $data;
	}
	public function getBeritaInternal()
	{
		$model=new WebKontent();
		$criteria=new CDbCriteria;
		$criteria->condition = 'tblwebkontent_status=:stat AND tblwebkontent_mode=:mode AND tblwebkontent_tipe=:tipe';
		$criteria->params = array(':stat'=>'T',':mode'=>'BERITA',':tipe'=>'BERITAINTERNAL');
		$criteria->order = 'tblwebkontent_sysinsert DESC';
		$total = $model->count($criteria);
		$data['pages_berita']=new CPagination($total);
		$data['pages_berita']->pageSize=5;
		$data['pages_berita']->applyLimit($criteria);
		$data['berita']= WebKontent::model()->findAll($criteria);
		return $data;
	}
	public function getBeritaPress()
	{
		$model=new WebKontent();
		$criteria=new CDbCriteria;
		$criteria->condition = 'tblwebkontent_status=:stat AND tblwebkontent_mode=:mode AND tblwebkontent_tipe=:tipe';
		$criteria->params = array(':stat'=>'T',':mode'=>'BERITA',':tipe'=>'PRESRL');
		$criteria->order = 'tblwebkontent_sysinsert DESC';
		$total = $model->count($criteria);
		$data['pages_berita']=new CPagination($total);
		$data['pages_berita']->pageSize=5;
		$data['pages_berita']->applyLimit($criteria);
		$data['berita']= WebKontent::model()->findAll($criteria);
		return $data;
	}
	public function getNomorPenting()
	{	
		$data = NomorPenting::model()->findAll('tblnomorpenting_isaktif=:stat', array(':stat'=>'T'));
		return $data;
	}
	public function getDataDownloadByMenu($idmenu)
	{
		$data = WebDownload::model()->findAll('tblwebmenu_id=:menu AND tblwebdownload_status=:stat', array(':menu'=>$idmenu, ':stat'=>'T'));
		return $data;
	}
	public function getMenuById($idmenu)
	{
		$data = Webmenu::model()->findByPk($idmenu);
		return $data;
	}
	public function getWebConfig()
	{
		$data = WebConfig::model()->find();
		return $data;
	}
	public function getAgendaKegiatan()
	{
		$data = WebKontent::model()->findAll('tblwebkontent_mode=:mode AND tblwebkontent_status=:stat ORDER BY tblwebkontent_sysinsert DESC LIMIT 5', array(':mode'=>'AGENDA',':stat'=>'T'));
		return $data;
	}
	public function getPameran()
	{
		$data = WebKontent::model()->findAll('tblwebkontent_mode=:mode AND tblwebkontent_status=:stat', array(':mode'=>'PAMERAN',':stat'=>'T'));
		return $data;
	}
	public function getDataPegawai()
	{
		$model=new Pegawai();
		$criteria=new CDbCriteria;
		$criteria->condition = 'tblpegawai_isaktif=:stat';
		$criteria->params = array(':stat'=>'T');
		$criteria->order = 'tblpegawai_urutan ASC';
		$total = $model->count($criteria);
		$data['pages']=new CPagination($total);
		$data['pages']->pageSize=12;
		$data['pages']->applyLimit($criteria);
		$data['pegawai']= Pegawai::model()->findAll($criteria);
		//$data['pegawai'] = Pegawai::model()->findAll('tblpegawai_isaktif=:stat', array(':stat'=>'T'));
		return $data;
	}
	public function getDataArtikel()
	{
		$model=new WebKontent();
		$criteria=new CDbCriteria;
		$criteria->condition = 'tblwebkontent_status=:stat AND tblwebkontent_mode=:mode';
		$criteria->params = array(':stat'=>'T',':mode'=>'ARTIKEL');
		$criteria->order = 'tblwebkontent_sysinsert DESC';
		$total = $model->count($criteria);
		$data['pages_artikel']=new CPagination($total);
		$data['pages_artikel']->pageSize=2;
		$data['pages_artikel']->applyLimit($criteria);
		$data['artikel']= WebKontent::model()->findAll($criteria);
		return $data;
	}
	public function getDataPenghargaan()
	{
		$model=new WebKontent();
		$criteria=new CDbCriteria;
		$criteria->condition = 'tblwebkontent_status=:stat AND tblwebkontent_mode=:mode';
		$criteria->params = array(':stat'=>'T',':mode'=>'PENGHARGAAN');
		$criteria->order = 'tblwebkontent_sysinsert DESC';
		$total = $model->count($criteria);
		$data['pages_penghargaan']=new CPagination($total);
		$data['pages_penghargaan']->pageSize=5;
		$data['pages_penghargaan']->applyLimit($criteria);
		$data['penghargaan']= WebKontent::model()->findAll($criteria);
		return $data;
	}
	public function getDataBerita()
	{
		$model=new WebKontent();
		$criteria=new CDbCriteria;
		$criteria->condition = 'tblwebkontent_status=:stat AND tblwebkontent_mode=:mode';
		$criteria->params = array(':stat'=>'T',':mode'=>'BERITA');
		$criteria->order = 'tblwebkontent_sysinsert DESC';
		$total = $model->count($criteria);
		$data['pages_berita']=new CPagination($total);
		$data['pages_berita']->pageSize=5;
		$data['pages_berita']->applyLimit($criteria);
		$data['berita']= WebKontent::model()->findAll($criteria);
		return $data;
	}
	public function getBeritaTerkini()
	{
		$$model=new WebKontent();
		$criteria=new CDbCriteria;
		$criteria->condition = 'tblwebkontent_status=:stat AND tblwebkontent_mode=:mode';
		$criteria->params = array(':stat'=>'T',':mode'=>'BERITA');
		$criteria->order = 'tblwebkontent_sysinsert DESC LIMIT 4';
		// $total = $model->count($criteria);
		// $data['pages_berita']=new CPagination($total);
		// $data['pages_berita']->pageSize=4;
		// $data['pages_berita']->applyLimit($criteria);
		$data['berita']= WebKontent::model()->findAll($criteria);
		return $data;
	}
	public function getArtikelFrontend()
	{
		$$model=new WebKontent();
		$criteria=new CDbCriteria;
		$criteria->condition = 'tblwebkontent_status=:stat AND tblwebkontent_mode=:mode';
		$criteria->params = array(':stat'=>'T',':mode'=>'ARTIKEL');
		$criteria->order = 'tblwebkontent_sysinsert DESC LIMIT 4';
		// $total = $model->count($criteria);
		// $data['pages_berita']=new CPagination($total);
		// $data['pages_berita']->pageSize=4;
		// $data['pages_berita']->applyLimit($criteria);
		$data['artikel']= WebKontent::model()->findAll($criteria);
		return $data;
	}
	public function getBeritaTerkiniFooter()
	{
		$model=new WebKontent();
		$criteria=new CDbCriteria;
		$criteria->condition = 'tblwebkontent_status=:stat AND tblwebkontent_mode=:mode';
		$criteria->params = array(':stat'=>'T',':mode'=>'BERITA');
		$criteria->order = 'tblwebkontent_sysinsert DESC';
		$total = $model->count($criteria);
		$data['pages_berita']=new CPagination($total);
		$data['pages_berita']->pageSize=3;
		$data['pages_berita']->applyLimit($criteria);
		$data['berita']= WebKontent::model()->findAll($criteria);
		return $data;
	}
	public function getPengumuman()
	{
		$model=new WebKontent();
		$criteria=new CDbCriteria;
		$criteria->condition = 'tblwebkontent_status=:stat AND tblwebmenu_id=:idmenu';
		$criteria->params = array(':stat'=>'T',':idmenu'=>8);
		$criteria->order = 'tblwebkontent_sysinsert DESC';
		$total = $model->count($criteria);
		$data['pages_pengumuman']=new CPagination($total);
		$data['pages_pengumuman']->pageSize=3;
		$data['pages_pengumuman']->applyLimit($criteria);
		$data['pengumuman']= WebKontent::model()->findAll($criteria);
		return $data;
	}
	public function getDataBeritaNasional()
	{
		$model=new WebKontent();
		$criteria=new CDbCriteria;
		$criteria->condition = 'tblwebkontent_status=:stat AND tblwebmenu_id=:id_menu';
		$criteria->params = array(':stat'=>'T',':id_menu'=>'69');
		$criteria->order = 'tblwebkontent_sysinsert DESC';
		$total = $model->count($criteria);
		$data['pages_berita']=new CPagination($total);
		$data['pages_berita']->pageSize=5;
		$data['pages_berita']->applyLimit($criteria);
		$data['berita']= WebKontent::model()->findAll($criteria);
		return $data;
	}
	public function getDataBeritaDaerah()
	{
		$model=new WebKontent();
		$criteria=new CDbCriteria;
		$criteria->condition = 'tblwebkontent_status=:stat AND tblwebmenu_id=:id_menu';
		$criteria->params = array(':stat'=>'T',':id_menu'=>'68');
		$criteria->order = 'tblwebkontent_sysinsert DESC';
		$total = $model->count($criteria);
		$data['pages_berita']=new CPagination($total);
		$data['pages_berita']->pageSize=5;
		$data['pages_berita']->applyLimit($criteria);
		$data['berita']= WebKontent::model()->findAll($criteria);
		return $data;
	}
	public function getDataKuliner()
	{
		$model=new WebKontent();
		$criteria=new CDbCriteria;
		$criteria->condition = 'tblwebkontent_status=:stat AND tblwebkontent_mode=:mode';
		$criteria->params = array(':stat'=>'T',':mode'=>'KULINER');
		$criteria->order = 'tblwebkontent_sysinsert DESC';
		$total = $model->count($criteria);
		$data['pages_kuliner']=new CPagination($total);
		$data['pages_kuliner']->pageSize=2;
		$data['pages_kuliner']->applyLimit($criteria);
		$data['kuliner']= WebKontent::model()->findAll($criteria);
		return $data;
	}
	public function getSambutan()
	{
		$data = WebKontent::model()->find('tblwebkontent_mode=:mode AND tblwebkontent_status=:stat', array(':mode'=>'SAMBUTAN',':stat'=>'T'));
		return $data;
	}
	public function getWidProfil()
	{
		$data = WebKontent::model()->findAll('tblwebkontent_tampilhome=:stat LIMIT 4', array(':stat'=>'T'));
		return $data; 
	}
	public function getDataKecamatan()
	{
		$data = Kecamatan::model()->findAll('tblkecamatan_status=:stat', array(':stat'=>'T'));
		return $data; 
	}
	public function getInfografisFrontend()
	{
		$data = Infografis::model()->findAll('tblinfografis_status=:stat', array(':stat'=>'T'));
		return $data; 
	}
	public function getNamaKecamatan($idkec)
	{
		$data = Kecamatan::model()->findByPk($idkec);
		$res = $data['tblkecamatan_nama'];
		return $res;
	}
	public function getDataBukuTamu()
	{
		$model=new BukuTamu();
		$criteria=new CDbCriteria;
		$criteria->condition = 'tblbtamu_aktif=:stat';
		$criteria->params = array(':stat'=>'1');
		$criteria->order = 'tblbtamu_tanggal DESC';
		$total = $model->count($criteria);
		$data['pages']=new CPagination($total);
		$data['pages']->pageSize=5;
		$data['pages']->applyLimit($criteria);
		$data['bukutamu']= BukuTamu::model()->findAll($criteria);
		return $data;
	}
	public function getDownloadKontent($id)
	{
		$data['model'] = WebKontentDownload::model()->findAll('tblwebkontent_id=:idkontent', array(':idkontent'=>$id));
		$data['jumlah_data'] = count($data['model']);
		return $data;
	}
	function TanggalIndo($date){
		$BulanIndo = array("Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Ags", "Sep", "Okt", "Nov", "Des");
		$BulanIndo_lengkap = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
	 
		$tahun = substr($date, 0, 4);
		$bulan = substr($date, 5, 2);
		$tgl   = substr($date, 8, 2);
	 
		$data['tglbulan'] = $tgl . " " . $BulanIndo[(int)$bulan-1] . " ". $tahun;		
		$data['tglbulan_lengkap'] = $tgl . " " . $BulanIndo_lengkap[(int)$bulan-1] . " ". $tahun;		
		$data['bulan'] = $BulanIndo[(int)$bulan-1];		
		return($data);
	}
	public function getPetaKabupaten()
	{
		$data = WebKontent::model()->findAll('tblwebkontent_status=:stat AND tblwebkontent_mode=:mode', array(':stat'=>'T', ':mode'=>'PETAKABUPATEN'));
		return $data;
	}
	public function getPerangkatDaerah()
	{
		$data = WebKontent::model()->findAll('tblwebkontent_status=:stat AND tblwebkontent_mode=:mode', array(':stat'=>'T', ':mode'=>'PERANGKATDAERAH'));
		return $data;
	}
	public function getPolling()
	{
		$data = Yii::app()->db->createCommand('SELECT
			tblisipolling.tblisipolling_id,
			tblisipolling.tblisipolling_isi,
			tblisipolling.tblisipolling_pil1,
			tblisipolling.tblisipolling_pil2,
			tblisipolling.tblisipolling_pil3,
			tblisipolling.tblisipolling_pil4,
			tblisipolling.tblisipolling_tanggalberlakuawal,
			tblisipolling.tblisipolling_tanggalberlakuakhir,
			tblisipolling.tblisipolling_isaktif
			FROM
			tblisipolling where tblisipolling_isaktif="Y" limit 1
			')->queryAll();
		return $data;
	}
	public function getHeader()
	{
		$data = Webheader::model()->find('refwebheader_isaktif=:stat', array(':stat'=>'T'));
		return $data;
	}
	public function getNamaPegawaiByStruktur($idstruktur)
	{
		$data['model'] = Pegawai::model()->find('refstrukturorganisasi_id=:idstruktur AND tblpegawai_isaktif=:stat', array(':idstruktur'=>$idstruktur,':stat'=>'T'));
		$data['namapegawai'] = $data['model']['tblpegawai_nama'];
		return $data;
	}
	public function getDataInstansi()
	{
		$model=new Instansi();
		$criteria=new CDbCriteria;
		$criteria->condition = 'refinstansi_status=:stat AND refinstansi_mode=:mode';
		$criteria->params = array(':stat'=>'T', ':mode'=>'MUSPIKA');
		$total = $model->count($criteria);
		$data['pages_instansi']=new CPagination($total);
		$data['pages_instansi']->pageSize=10;
		$data['pages_instansi']->applyLimit($criteria);
		$data['instansi']= Instansi::model()->findAll($criteria);
		return $data;
	}
	public function getDataUPT()
	{
		$model=new Instansi();
		$criteria=new CDbCriteria;
		$criteria->condition = 'refinstansi_status=:stat AND refinstansi_mode=:mode';
		$criteria->params = array(':stat'=>'T', ':mode'=>'UPT');
		$total = $model->count($criteria);
		$data['pages_instansi']=new CPagination($total);
		$data['pages_instansi']->pageSize=10;
		$data['pages_instansi']->applyLimit($criteria);
		$data['instansi']= Instansi::model()->findAll($criteria);
		return $data;
	}
	public function getJumlahDataUPT()
	{
		$model=new Instansi();
		$criteria=new CDbCriteria;
		$criteria->condition = 'refinstansi_status=:stat AND refinstansi_mode=:mode';
		$criteria->params = array(':stat'=>'T', ':mode'=>'UPT');
		$total = $model->count($criteria);
		$data['pages_instansi']=new CPagination($total);
		$data['pages_instansi']->pageSize=10;
		$data['pages_instansi']->applyLimit($criteria);
		$data['instansi']= Instansi::model()->findAll($criteria);
		return $data;
	}
	public function getJenisIzin()
	{
		$data = Izin::model()->findAll('tblizin_isaktif=:stat', array(':stat'=>'T'));
		return $data;
	}
	public function getDownloadPaten()
	{
		$data = WebDownload::model()->findAll('tblwebdownload_status=:stat AND tblwebmenu_id=:idmenu AND tblwebdownload_mode=:mode', array(':stat'=>'T',':idmenu'=>33,':mode'=>'PATEN'));
		return $data;
	}
	public function getDataProfil()
	{
		$data = WebKontent::model()->find('tblwebkontent_mode=:mode', array(':mode'=>'PROFIL'));
		return $data;
	}
}
