<?php $jumlah_kontent = count($model_kontent); ?>
	<header class="page-header">
	<h4 class="classic-title"><span><?php echo $model_kontent['tblwebkontent_judul']; ?></span></h4>
	</header>
<?php if ($jumlah_kontent>0): ?>
	<?php if ($model_kontent['tblwebkontent_file']=='' OR $model_kontent['tblwebkontent_file']==NULL): ?>
	<?php else: ?>
		<center>
			<img style="max-height:300px; max-width:100%; padding: 10px; border: 1px solid #ccc; border-radius: 10px;" src="<?php echo Yii::app()->baseUrl; ?>/upload/kontent/<?php echo $model_kontent['tblwebkontent_file']; ?>">
		</center>
	<?php endif; ?>
	<?php echo $model_kontent['tblwebkontent_isi']; ?>
	<!-- Some Text -->
	
<?php else: ?>
	<center><h4><b><i>Maaf Data Masih Kosong</i></b></h4></center>
<?php endif; ?>

<br />
<br />
<br />


