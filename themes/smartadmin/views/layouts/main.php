<?php $no_main_header = false; //set true for lock.php and login.php 
?>
<?php include_once 'header2.php'; 
?>
<?php /*-------------------------------------end header------------------------*/ ?>
<?php /*-------------------------------------load nav------------------------*/ ?>
<?php require_once 'nav.php'; ?>
<?php /*-----------------------------------end load nav------------------------*/ ?>

<!-- ==========================CONTENT STARTS HERE ========================== -->
<!-- MAIN PANEL -->
<div id="main" role="main">
	<?php
		include("ribbon.php");
	?>

	<!-- MAIN CONTENT -->
	<div id="content">

	</div>
	<!-- END MAIN CONTENT -->

</div>

<!-- END MAIN PANEL -->

<?php /*----------------------------------- load footer------------------------*/ ?>
<?php 
	//include required scripts
	include("scripts.php"); 
	//include footer
	include("footer.php"); 
?>
<?php /*----------------------------------- end load footer------------------------*/ ?>
<?php /*
<div class="container" id="page">

	<div id="header">
		<div id="logo"><?php echo CHtml::encode(Yii::app()->name); ?></div>
	</div><!-- header -->

	<div id="mainmenu">
		<?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'Home', 'url'=>array('/site/index')),
				array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about')),
				array('label'=>'Contact', 'url'=>array('/site/contact')),
				array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
			),
		)); ?>
	</div><!-- mainmenu -->
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->baseUrl
	<?php endif?>

	<?php echo $content; ?>

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by My Company.<br/>
		All Rights Reserved.<br/>
		<?php echo Yii::powered(); ?>baseUrl
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
*/ ?>