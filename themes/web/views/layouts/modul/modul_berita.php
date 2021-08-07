<header class="page-header">
	<h1 class="page-title">BERITA</h1>			
</header>
<div class="blog-posts">
	<?php  
		$model=new WebKontent();
		$criteria=new CDbCriteria;
		$criteria->condition = 'tblwebkontent_mode=:kat AND tblwebkontent_status=:stat';
		$criteria->params = array(':kat'=>'BERITA', ':stat'=>'T');
		$criteria->order = 'tblwebkontent_sysinsert DESC';
		$total = $model->count($criteria);
		$pages=new CPagination($total);
		$pages->pageSize=5;
		$pages->applyLimit($criteria);
		$data_berita= WebKontent::model()->findAll($criteria);
	?>
	<?php foreach ($data_berita as $list_berita): ?>
		<?php  
			$judul = str_replace(' ', '_', $list_berita['tblwebkontent_judul']);
			$link_detail = Yii::app()->createUrl('web/detail/'.$list_berita['tblwebkontent_id'].'/'.strtolower($judul));
		?>

	<article class="post post-medium">
		<div class="row">
			<?php if ($list_berita['tblwebkontent_file']=='' OR $list_berita['tblwebkontent_file']==NULL): ?>
				<div class="col-md-12">	
			<?php else: ?>
			<div class="col-md-5">
				<div class="post-image">
					<div class="owl-carousel" data-plugin-options='{"items":1}'>
						<div>
							<a class="img-thumbnail lightbox pull-left"	href="<?php echo Yii::app()->baseUrl; ?>/upload/kontent/<?php echo $list_berita['tblwebkontent_file']; ?>" data-plugin-options='{"type":"image"}' style="border-radius: 0px;">
								<img class="img-responsive" width="215" src="<?php echo Yii::app()->baseUrl; ?>/upload/kontent/<?php echo $list_berita['tblwebkontent_file']; ?>" style="height: 130px;">
								<span class="zoom">
									<i class="icon icon-16 icon-white-shadowed icon-search"></i>
								</span>
							</a>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-7">
			<?php endif; ?>
				<div class="post-content">
					<b><h4><a href="<?php echo $link_detail; ?>"><?php echo $list_berita['tblwebkontent_judul']; ?></a></h4></b>
					<p><?php echo substr(strip_tags($list_berita['tblwebkontent_isi']), 0, 	250); ?> ...</p>
				</div>
			</div>

		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="post-meta">
					<span><i class="icon icon-calendar"></i> <?php echo date('d-m-Y', strtotime($list_berita['tblwebkontent_sysinsert'])); ?></span>
					<span><i class="icon icon-desktop"></i> <i>Dibaca <b><?php echo $list_berita['tblwebkontent_klik']; ?></b> Kali</i></span>

					<a href="<?php echo $link_detail; ?>" class="btn btn-xs btn-primary pull-right">Baca Selengkapnya...</a>
				</div>
			</div>
		</div>

	</article>
	<?php endforeach ?>
	<center> <center><?php $this->widget('CLinkPager', array('pages' => $pages)); ?></center></center>
</div>