<footer class="footer-area">
    <div class="main-footer-area section-padding-100-0">
        <div class="container">
            <div class="row">
                <!-- Footer Widget Area -->
                <div class="col-12 col-sm-6 col-lg-6">
                    <div class="footer-widget mb-100">
                        <div class="widget-title">
                            <a href="#"><img src="<?php echo Yii::app()->baseUrl; ?>/images/logo_putih.png" alt=""></a>
                        </div>
                        <p>LAPOR ! FST adalah Sistem sarana untuk menyampaikan laporan terhadap kerusakan barang inventaris khususnya pada lingkungan Fakultas Sains & Teknologi Universitas PGRI Yogyakarta.</p>
                        <div class="footer-social-info">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
                <!-- Footer Widget Area -->
                <?php Yii::app()->userCounter->refresh(); ?>
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="footer-widget mb-100">
                        <div class="widget-title">
                            <h6>Statistik Pengunjung</h6>
                        </div>
                        <nav>
                            <button class="btn btn-sm btn-success" style="margin-bottom: 5%;">Pengunjung Online
                                <b class="badge ng-binding bg-color-red bounceIn animated" style="background: crimson;font-size: 14px;"> <?php echo Yii::app()->userCounter->getOnline(); ?> </b>
                            </button>
                            <ul class="useful-links">
                                <li><a href="#"> <i class="fa fa-user"></i> Hari ini : <?php echo Yii::app()->userCounter->getToday(); ?></a></li>
                                <?php /*
                                    <li><a href="#"><i class="fa fa-user"></i> Minggu ini : 1548</a></li>
                                    */ ?>
                                <li><a href="#"><i class="fa fa-user"></i> Kemarin : <?php echo Yii::app()->userCounter->getYesterday(); ?></a></li>
                                <li><a href="#"><i class="fa fa-group"></i> Total : <?php echo Yii::app()->userCounter->getTotal(); ?></a></li>
                                <?php /*
                                    <li><a href="#"><i class="fa fa-group"></i> Bulan ini  : 15483</a></li>
                                    <li><a href="#"><i class="fa fa-group"></i> Tahun ini : 45483</a></li>
                                    */ ?>
                            </ul>
                        </nav>
                    </div>
                </div>
                <!-- Footer Widget Area -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="footer-widget mb-100">
                        <div class="widget-title">
                            <h6>Kontak Kami</h6>
                        </div>
                        <div class="single-contact d-flex mb-30">
                            <i class="icon-placeholder"></i>
                            <p>Jl. PGRI I Sonosewu No. 117 Daerah Istimewa Yogyakarta 55182 Indonesia</p>
                        </div>
                        <div class="single-contact d-flex mb-30">
                            <i class="icon-telephone-1"></i>
                            <p>Phone: (0274) 376808, 418077 <br>Email: info@upy.ac.id</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bottom-footer-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <p>Copyright &copy;<script>
                            document.write(new Date().getFullYear());
                        </script> Fakultas Sains dan Teknologi UPY </p>
                </div>
            </div>
        </div>
    </div>
</footer>