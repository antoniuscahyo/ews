<div class="breadcumb-area bg-img" style="background-image: url(<?php echo Yii::app()->baseUrl; ?>/upload/kontent/header.jpg);">
    <div class="bradcumbContent">
        <h2>Hasil Pencarian</h2>
    </div>
</div>

<section class="about-us-area mt-50 section-padding-100">
	<div class="container">
		<div class="">
			<center><h3>Hasil Pencarian Untuk <b>"<?php echo $data['keyword'] ?>"</b></h3></center>
		</div>
		<br/>
		<br/>
		<div class="row">

			<?php $tanggalUmum = New TanggalIndonesia; ?>
            <?php foreach ($data['search'] as $list): ?>
            
            <?php  
            
            $judul = $list['header'];
            $file = Yii::app()->baseUrl.'/upload/kontent/'.$list['file'];
            
            if ($list['tipe']=='KONTEN') {
            	// $judul = str_replace('/','_', str_replace(' ', '_', $list['header']));
            	$link = Yii::app()->createUrl('web/detail/'.$list['kunci']);
            }
            if ($list['tipe']=='MENU') {
            	$file = Yii::app()->baseUrl.'/images/logo-dinas.png';
            	$link = Yii::app()->getBaseUrl(1).'/'.$list['link'];
            }
            if ($list['tipe']=='INFORMASI') {
            	$file = Yii::app()->baseUrl.'/images/informasi.png';
            	$link = Yii::app()->baseUrl.'/upload/informasi/'.$list['file'];
            }
            if ($list['tipe']=='REGULASI') {
            	$file = Yii::app()->baseUrl.'/images/informasi.png';
            	$link = Yii::app()->baseUrl.'/upload/regulasi/'.$list['file'];
            }
            if ($list['tipe']=='GALLERY') {
            	$file = Yii::app()->baseUrl.'/upload/gallery/'.$list['file'];
            	$link = Yii::app()->baseUrl.'/upload/gallery/'.$list['file'];
            }
            if ($list['tipe']=='VIDEO') {
            	// $file = Yii::app()->baseUrl.'/upload/video/'.$list['file'];
            	$file = Yii::app()->baseUrl.'/images/logo-dinas.png';
            	$link = $tipefile=='UPLOAD' ? Yii::app()->baseUrl.'/upload/video/'.$list['file'] : 'https://www.youtube.com/embed/'.$link;
            }
            ?>

			<!-- Single Top Popular Course -->
			<div class="col-12 col-lg-12">
				<div class="single-top-popular-course d-flex align-items-center flex-wrap mb-30 wow fadeInUp" data-wow-delay="400ms">
					<div class="row" style="padding: 16px;">
						<div class="col col-md-5">
						<img src="<?php echo $file; ?>" style="width:358px;height: 195px">
							<?php if ($list['tipe']!='MENU'):?>
							<p style="font-size: 12px;color: #6cbd58;margin-top: 3%;" align="center">By Admin   |  <?php echo $tanggalUmum->TanggalUmum($list['tanggal']); ?></p>
							<?php endif; ?>
						</div>
						<div class="col col-md-7">
							<h5><?php echo ucwords(strtolower($judul)) ?></h5>
							<p><?php echo substr(strip_tags($list['body']), 0,  150); ?><?php echo $point = strlen(strip_tags($list['body']))>=150 ? '...' : '' ?></p>
							<a href="<?php echo $link ?>" target="_blank" class="btn academy-btn btn-sm">Lihat</a>
						</div>
					</div>
				</div>
			</div>

			<?php endforeach; ?>
			 <br/>
			 <?php /*
                <div class="col-sm-12" style="margin-top: 20px">
                    <center>
                        <?php $this->widget('CLinkPager', array('pages' => $data['pages_berita'])); ?>
                    </center>
                </div>
			 */ ?>
            <br/>

		</div>
	</div>
</section>