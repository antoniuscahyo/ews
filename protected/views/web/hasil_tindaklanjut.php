<div class="breadcumb-area bg-img" style="background-image: url(<?php echo Yii::app()->baseUrl; ?>/upload/kontent/header.jpg);">
    <div class="bradcumbContent">
        <h2>Hasil Tindak Lanjut</h2>
    </div>
</div>

<section class="about-us-area mt-50 section-padding-100">
	<div class="container">
		<div class="row">

			<!-- Single Top Popular Course -->
			<div class="col-12 col-lg-6">
				<div class="single-top-popular-course d-flex align-items-center flex-wrap mb-30 wow fadeInUp" data-wow-delay="400ms">
					<div class="row" style="padding: 16px;">
						<div class="col col-md-5">
							<img src="<?php echo Yii::app()->baseUrl; ?>/upload/pengaduan/komputer.jpg" style="min-height: 166px;">
							<p style="font-size: 12px;color: #6cbd58;margin-top: 3%;margin-bottom: 0px" align="center">7 Agustus 2021</p>
						</div>
						<div class="col col-md-7">
							<h5>PC All In One Acer Aspire AIO</h5>
							<p>Komputer Hidup kemudian bluescreen</p>
							<a href="detail" class="btn academy-btn btn-sm">Detail</a>
						</div>
					</div>
				</div>
			</div>

			<div class="col-12 col-lg-6">
				<div class="single-top-popular-course d-flex align-items-center flex-wrap mb-30 wow fadeInUp" data-wow-delay="400ms">
					<div class="row" style="padding: 16px;">
						<div class="col col-md-5">
							<img src="<?php echo Yii::app()->baseUrl; ?>/upload/pengaduan/Keyboard.jpg" style="min-height: 166px;">
							<p style="font-size: 12px;color: #6cbd58;margin-top: 3%;margin-bottom: 0px" align="center">8 Agustus 2021</p>
						</div>
						<div class="col col-md-7">
							<h5>Keyboard Votre Hitam</h5>
							<p>Kabel Keyboard Putus</p>
							<a href="detail" class="btn academy-btn btn-sm">Detail</a>
						</div>
					</div>
				</div>
			</div>

			 <br/>
                <div class="col-sm-12" style="margin-top: 20px">
                    <center>
                        <?php $this->widget('CLinkPager', array('pages' => $data['30'])); ?>
                    </center>
                </div>
            <br/>

		</div>
	</div>
</section>