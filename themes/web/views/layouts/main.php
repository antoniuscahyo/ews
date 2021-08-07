<!DOCTYPE html>
<html lang="id-ID">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
  <link href="images/favicon.png" rel="icon">
	<?php include 'layout_script.php'; ?>
	<title>LAPOR! - Layanan Pengaduan Online Inventarisasi Fakultas Sains & Teknologi</title>
</head>

<body>
<?php $nama_controlleraction = Yii::app()->controller->id.'/'.Yii::app()->controller->action->id; ?>

  <div id="preloader">
    <i class="circle-preloader"></i>
  </div>

  <header class="header-area">

   <?php include 'layout_menu.php'; ?>

  </header>


  <?php if ($nama_controlleraction=="web/index"): ?>


    <section class="hero-area">
      <?php include 'layout_slider.php'; ?>
    </section>

    <div class="top-features-area wow fadeInUp" data-wow-delay="300ms">
      <?php include 'layout_link.php'; ?>
    </div>

    <div class="top-popular-courses-area section-padding-100-70">
      <?php include 'layout_berita.php'; ?>
    </div>


  <?php else: ?>
    <?php echo $content; ?>
  <?php endif; ?>

    <?php include 'layout_footer.php'; ?>

    <a id="scroll-up"><i class="oslo-icon-up176"></i></a>

  	<?php include 'layout_script2.php'; ?>
</body>
</html>
