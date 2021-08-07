<div class="top-header">
  <div class="container h-100">
    <div class="row h-100">
      <div class="col-12 h-100">
        <div class="header-content h-100 d-flex align-items-center justify-content-between">
          <div class="academy-logo">
            <a href="index.html"><img src="<?php echo Yii::app()->baseUrl; ?>/images/logo3.png" alt=""></a>
          </div>
          <div class="login-content">
            <div class="blog-post-search-widget mb-30">
              <form action="<?php echo Yii::app()->getBaseUrl(1)  ?>/web/hasilpencarian" method="post">
                <input type="search" name="keyword" id="keyword" placeholder="Pencarian">
                <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Navbar Area -->
<div class="academy-main-menu">
  <div class="classy-nav-container breakpoint-off">
    <div class="container">
      <!-- Menu -->
      <nav class="classy-navbar justify-content-between" id="academyNav">

        <!-- Navbar Toggler -->
        <div class="classy-navbar-toggler">
          <span class="navbarToggler"><span></span><span></span><span></span></span>
        </div>

        <!-- Menu -->
        <div class="classy-menu">

          <!-- close btn -->
          <div class="classycloseIcon">
            <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
          </div>

          <!-- Nav Start -->
          <div class="classynav">
            <ul>
              <li><a href="<?php echo Yii::app()->baseUrl; ?>/web">BERANDA</a></li>
              <li><a href="<?php echo Yii::app()->baseUrl; ?>/web/Tentang_lapor">TENTANG LAPOR!</a></li>
              <li><a href="<?php echo Yii::app()->baseUrl; ?>/web/Hasil_tindaklanjut">HASIL TINDAK LANJUT</a></li>
              <li><a href="<?php echo Yii::app()->baseUrl; ?>/web/Kontak_kami">KONTAK KAMI</a></li>
              <li><a href="<?php echo Yii::app()->baseUrl; ?>/site/login">LOGIN</a></li>
            </ul>
          </div>
          <!-- Nav End -->
        </div>

        <!-- Calling Info -->
        <div class="calling-info">
          <div class="call-center">
            <a href="tel:+6282138389975"><i class="icon-telephone-2"></i> <span>082138389975</span></a>
          </div>
        </div>
      </nav>
    </div>
  </div>
</div>