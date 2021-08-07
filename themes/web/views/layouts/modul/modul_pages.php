<br />
<br />
<br />
<div class="row">
	<div class="col-md-12">
		<!-- Classic Heading -->
		<h4 class="classic-title"><span><?php echo $namamenu; ?></span></h4>

		<!-- Start Latest Posts -->
		<div class="latest-posts-classic">
			<?php  
				$model=new WebKontent();
				$criteria=new CDbCriteria;
				$criteria->condition = 'tblwebmenu_id=:id AND tblwebkontent_status=:stat';
				$criteria->params = array(':id'=>$idmenu, ':stat'=>'T');
				$criteria->order = 'tblwebkontent_sysinsert DESC';
				$total = $model->count($criteria);
				$pages=new CPagination($total);
				$pages->pageSize=8;
				$pages->applyLimit($criteria);
				$data_berita= WebKontent::model()->findAll($criteria);
			?>
			<?php foreach ($data_berita as $list_berita): ?>
				<?php  
					$judul = str_replace(' ', '_', $list_berita['tblwebkontent_judul']);
					$link_detail = Yii::app()->createUrl('web/detail/'.$list_berita['tblwebkontent_id'].'/'.strtolower($judul));
					$tanggal_berita = AllFunction::model()->TanggalIndo(date('Y-m-d', strtotime($list_berita['tblwebkontent_sysinsert'])));
				?>
			<!-- Post 1 -->
			<div class="row">
				<div class="col-md-1">
					<div class="left-meta-post">
						<div class="post-date"><span class="day"><?php echo date('d', strtotime($list_berita['tblwebkontent_sysinsert'])); ?></span><span class="month"><?php echo $tanggal_berita['bulan']; ?></span></div>
						<div class="post-type"><i class="fa fa-picture-o"></i></div>
					</div>
				</div>
				<div class="col-md-11">
					
					<h3 class="post-title"><a href="<?php echo $link_detail; ?>"><?php echo $list_berita['tblwebkontent_judul']; ?></a></h3>
					<div class="post-content">
						<div class="panel-body">
						<?php if ($list_berita['tblwebkontent_file']=='' OR $list_berita['tblwebkontent_file']==NULL): ?>
						<?php else: ?>
						<img class="img-thumbnail image-text" style="float:left; width:150px;" alt="" src="<?php echo Yii::app()->baseUrl; ?>/upload/kontent/<?php echo $list_berita['tblwebkontent_file']; ?>"> 
						<?php endif; ?>

						<?php echo substr(strip_tags($list_berita['tblwebkontent_isi']), 0, 	250); ?> ...
						</div>

						<a class="read-more" href="<?php echo $link_detail; ?>">Baca Selengkapnya...<i class="fa fa-angle-right"></i></a></p>
					</div>
				</div>
			</div>


			<h4 class="classic-title"><span></span></h4>
			<?php endforeach ?>
			<center> <center><?php $this->widget('CLinkPager', array('pages' => $pages)); ?></center></center>

		</div>
		<!-- End Latest Posts -->
	</div>
	<!-- .col-md-6 -->
</div>