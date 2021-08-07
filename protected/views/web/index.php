<?php $model_lastberita = AllFunction::model()->getLastBerita(); ?>
<?php $model_popularberita = AllFunction::model()->getPopularBerita(); ?>
<?php $model_bertiaopini = AllFunction::model()->getBeritaOpini(); ?>
<?php $model_bertiaumum = AllFunction::model()->getBeritaUmum(); ?>
<?php $model_bertiainternal = AllFunction::model()->getBeritaInternal(); ?>
<?php $model_bertiapress = AllFunction::model()->getBeritaPress(); ?>
	<div class="row nopad">
		<div class="col-md-8">
			<?php $no_lastberita=1; foreach ($model_lastberita['berita'] as $list_lastberita): ?>
		<?php  
			$judul_lastberita = str_replace('/','_', str_replace(' ', '_', $list_lastberita['tblwebkontent_judul']));
			$link_detail_lastberita = Yii::app()->createUrl('web/detail/'.$list_lastberita['tblwebkontent_id'].'/'.strtolower($judul_lastberita));
			$nomor_lastberita = $no_lastberita++
		?>
		<?php if ($nomor_lastberita==1): ?>
			
			<div id="konten-8783" class="row block a1">
				<div class="col-md-12">
					<div class="image-cont">
						<a href="#">
							<?php if ($list_lastberita['tblwebkontent_file']=='' || $list_lastberita['tblwebkontent_file']==NULL): ?>
							<img style="width: 100%; max-height: 467px;" src="<?php echo Yii::app()->baseUrl; ?>/images/nophoto.jpg">
							<?php else: ?>
							<img style="width: 100%;max-height: 467px;" src="<?php echo Yii::app()->baseUrl; ?>/upload/kontent/<?php echo $list_lastberita['tblwebkontent_file'] ?>">
							<?php endif; ?>
						</a>
						<h3 class="text-center">Kabar Utama</h3>
					</div>
					<div class="entry-header">
						<h4 class="entry-title">
							<a href="<?php echo $link_detail_lastberita; ?>"><?php echo $list_lastberita['tblwebkontent_judul']; ?></a>
						</h4>	 
						<div class="entry-meta">
							<span class="posted-on">
								<i class="fa fa-calendar icon-meta"></i>
								<time class="entry-date published updated" datetime="2016-10-17T11:05:54+00:00"><?php echo date('d-m-Y', strtotime($list_lastberita['tblwebkontent_sysinsert'])); ?></time>
							</span>
							<span class="posted-on"><i class="fa fa-user icon-meta"></i>Admin</span>
							<span class="posted-on"><i class="fa fa-eye icon-meta"></i><?php echo $list_lastberita['tblwebkontent_klik']; ?> Dibaca</span>
						</div>
					</div>
					<div class="excerpt">	
						<?php echo substr(strip_tags($list_lastberita['tblwebkontent_isi']), 0, 	250); ?>...
					</div><br>
					<div class="text-right">
						<a href="<?php echo $link_detail_lastberita; ?>" class="btn btn-start readmore">Selengkapnya</a>	
						<div class="pull-right">
							  <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5b7294ee3e677b9d"></script> 
								<!-- Go to www.addthis.com/dashboard to customize your tools --> 
								<div class="addthis_inline_share_toolbox"></div> 
						</div>
					</div>

				</div>
			</div>
			<?php else: ?>
		<?php endif ?>
		<?php endforeach ?>
		</div>

		<div class="col-md-4 mb30">
			<div class="tabbable-panel row block a2 mb30">
				<div class="tabbable-line col-md-12">
					<ul class="nav nav-tabs nav-justified block a2">
						<li class="active">
							<a href="#tab_default_1" data-toggle="tab">
								Terbaru 
							</a>
						</li>
						<li>
							<a href="#tab2" data-toggle="tab">
								Terpopuler 
							</a>
						</li>
					</ul>
					<div class="tab-content">
						<div class="tab-pane active" id="tab_default_1">
						<?php $no_lastberita=1; foreach ($model_lastberita['berita'] as $terbaru): ?>
						<?php  
							$judul_lastberita = str_replace('/','_', str_replace(' ', '_', $list_lastberita['tblwebkontent_judul']));
							$link_detail_lastberita = Yii::app()->createUrl('web/detail/'.$list_lastberita['tblwebkontent_id'].'/'.strtolower($judul_lastberita));
							$nomor_lastberita = $no_lastberita++
						?>
							<div id="konten-8896" class="block block-list">
								<div class="arsip entry-header">
									<h5 class="entry-title">
										<a href="<?php echo $link_detail_lastberita; ?>" rel="bookmark"><?php echo $terbaru['tblwebkontent_judul']; ?></a>
									</h5>			
								</div>
							</div>
						<?php endforeach ?>
						</div>

						<div class="tab-pane" id="tab2">
						<?php $no_lastberita1=1; foreach ($model_popularberita['berita'] as $popular) : ?>
						<?php  
							$judul_lastberita = str_replace('/','_', str_replace(' ', '_', $popular['tblwebkontent_judul']));
							$link_detail_lastberita = Yii::app()->createUrl('web/detail/'.$popular['tblwebkontent_id'].'/'.strtolower($judul_lastberita));
							$nomor_lastberita = $no_lastberita++
						?>	
							<div id="konten-7403" class="block block-list">
								<div class="arsip entry-header">
									<h5 class="entry-title">
										<a href="<?php echo $link_detail_lastberita; ?>" rel="bookmark"><?php echo $popular['tblwebkontent_judul']; ?></a>
									</h5>			
								</div>
							</div>
						<?php endforeach ?>
						</div>
					</div>
				</div>
			</div>

			<div id="konten-8817" class="row block a3">
				<div class="col-md-12">
					<h3 class="text-center">Opini</h3>
					<div class="block-cont" style="min-height: inherit;">
						<?php $no_lastberita=1; foreach ($model_bertiaopini['berita'] as $list_lastberita): ?>
						<?php  
							$judul_lastberita = str_replace('/','_', str_replace(' ', '_', $list_lastberita['tblwebkontent_judul']));
							$link_detail_lastberita = Yii::app()->createUrl('web/detail/'.$list_lastberita['tblwebkontent_id'].'/'.strtolower($judul_lastberita));
							$nomor_lastberita = $no_lastberita++
						?>
						<div class="media">
							<a href="<?php echo $link_detail_lastberita; ?>">
							<?php if ($list_lastberita['tblwebkontent_file']=='' || $list_lastberita['tblwebkontent_file']==NULL): ?>
							<img style="max-width: 300px;max-height: 150px;min-width: 280px;" src="<?php echo Yii::app()->baseUrl; ?>/images/nophoto.jpg">
							<?php else: ?>
							<img style="max-width: 300px;max-height: 150px;min-width: 280px;" src="<?php echo Yii::app()->baseUrl; ?>/upload/kontent/<?php echo $list_lastberita['tblwebkontent_file'] ?>">
							<?php endif; ?>
							</a>
							<div class="entry-header media-body">
								<h4 class="entry-title">
									<a href="<?php echo $link_detail_lastberita; ?>"><?php echo $list_lastberita['tblwebkontent_judul']; ?></a>
								</h4>
								<div class="entry-meta">
									<span class="posted-on">
								<i class="fa fa-calendar icon-meta"></i>
								<time class="entry-date published updated" datetime="2016-10-17T11:05:54+00:00"><?php echo date('d-m-Y', strtotime($list_lastberita['tblwebkontent_sysinsert'])); ?></time>
							</span>
							<span class="posted-on"><i class="fa fa-user icon-meta"></i>Admin</span>
							<span class="posted-on"><i class="fa fa-eye icon-meta"></i><?php echo $list_lastberita['tblwebkontent_klik']; ?> Dibaca</span>
								</div>
							</div>
						</div>
						<?php endforeach ?>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- <div class="row nopad">
		<div class="col-md-4">
			<div id="konten-8896" class="row block a3">
				<div class="col-md-12">
					<h3 class="text-center">Berita Umum</h3>
					<div class="block-cont" style="min-height: inherit;">
						<?php $no_lastberita=1; foreach ($model_bertiaumum['berita'] as $list_lastberita): ?>
						<?php  
							$judul_lastberita = str_replace('/','_', str_replace(' ', '_', $list_lastberita['tblwebkontent_judul']));
							$link_detail_lastberita = Yii::app()->createUrl('web/detail/'.$list_lastberita['tblwebkontent_id'].'/'.strtolower($judul_lastberita));
							$nomor_lastberita = $no_lastberita++
						?>
						<div class="media" style="border-bottom: #e8e8e8 2px solid;">
							<a href="<?php echo $link_detail_lastberita; ?>">
							<?php if ($list_lastberita['tblwebkontent_file']=='' || $list_lastberita['tblwebkontent_file']==NULL): ?>
							<img style="max-width: 300px;max-height: 150px;min-width: 280px;" src="<?php echo Yii::app()->baseUrl; ?>/images/nophoto.jpg">
							<?php else: ?>
							<img style="max-width: 300px;max-height: 150px;min-width: 280px;" src="<?php echo Yii::app()->baseUrl; ?>/upload/kontent/<?php echo $list_lastberita['tblwebkontent_file'] ?>">
							<?php endif; ?>
							</a>
							<div class="entry-header media-body">
								<h4 class="entry-title">
									<a href="<?php echo $link_detail_lastberita; ?>"><?php echo $list_lastberita['tblwebkontent_judul']; ?></a>
								</h4>
								<div class="entry-meta">
									<span class="posted-on">
								<i class="fa fa-calendar icon-meta"></i>
								<time class="entry-date published updated" datetime="2016-10-17T11:05:54+00:00"><?php echo date('d-m-Y', strtotime($list_lastberita['tblwebkontent_sysinsert'])); ?></time>
							</span>
							<span class="posted-on"><i class="fa fa-user icon-meta"></i>Admin</span>
							<span class="posted-on"><i class="fa fa-eye icon-meta"></i><?php echo $list_lastberita['tblwebkontent_klik']; ?> Dibaca</span>
								</div>
							</div>
						</div>
						<?php endforeach ?>
					</div>
				</div>
			</div>

	
		
		</div>

		<div class="col-md-4">
			<div id="konten-8559" class="row block a3">
				<div class="col-md-12">
					<h3 class="text-center">Berita Internal</h3>
					<div class="block-cont" style="min-height: inherit;">
						<?php $no_lastberita=1; foreach ($model_bertiainternal['berita'] as $list_lastberita): ?>
						<?php  
							$judul_lastberita = str_replace('/','_', str_replace(' ', '_', $list_lastberita['tblwebkontent_judul']));
							$link_detail_lastberita = Yii::app()->createUrl('web/detail/'.$list_lastberita['tblwebkontent_id'].'/'.strtolower($judul_lastberita));
							$nomor_lastberita = $no_lastberita++
						?>
						<div class="media" style="border-bottom: #e8e8e8 2px solid;">
							<a href="<?php echo $link_detail_lastberita; ?>">
							<?php if ($list_lastberita['tblwebkontent_file']=='' || $list_lastberita['tblwebkontent_file']==NULL): ?>
							<img style="max-width: 300px;max-height: 150px;min-width: 280px;" src="<?php echo Yii::app()->baseUrl; ?>/images/nophoto.jpg">
							<?php else: ?>
							<img style="max-width: 300px;max-height: 150px;min-width: 280px;" src="<?php echo Yii::app()->baseUrl; ?>/upload/kontent/<?php echo $list_lastberita['tblwebkontent_file'] ?>">
							<?php endif; ?>
							</a>
							<div class="entry-header media-body">
								<h4 class="entry-title">
									<a href="<?php echo $link_detail_lastberita; ?>"><?php echo $list_lastberita['tblwebkontent_judul']; ?></a>
								</h4>
								<div class="entry-meta">
									<span class="posted-on">
								<i class="fa fa-calendar icon-meta"></i>
								<time class="entry-date published updated" datetime="2016-10-17T11:05:54+00:00"><?php echo date('d-m-Y', strtotime($list_lastberita['tblwebkontent_sysinsert'])); ?></time>
							</span>
							<span class="posted-on"><i class="fa fa-user icon-meta"></i>Admin</span>
							<span class="posted-on"><i class="fa fa-eye icon-meta"></i><?php echo $list_lastberita['tblwebkontent_klik']; ?> Dibaca</span>
								</div>
							</div>
						</div>
						<?php endforeach ?>
					</div>
				</div>
			</div>
		</div>

		<div class="col-md-4">
			<div id="konten-8852" class="row block a3">
				<div class="col-md-12">
					<h3 class="text-center">Press Release</h3>
					<div class="block-cont" style="min-height: inherit;">
						<?php $no_lastberita=1; foreach ($model_bertiapress['berita'] as $list_lastberita): ?>
						<?php  
							$judul_lastberita = str_replace('/','_', str_replace(' ', '_', $list_lastberita['tblwebkontent_judul']));
							$link_detail_lastberita = Yii::app()->createUrl('web/detail/'.$list_lastberita['tblwebkontent_id'].'/'.strtolower($judul_lastberita));
							$nomor_lastberita = $no_lastberita++
						?>
						<div class="media" style="border-bottom: #e8e8e8 2px solid;">
							<a href="<?php echo $link_detail_lastberita; ?>">
							<?php if ($list_lastberita['tblwebkontent_file']=='' || $list_lastberita['tblwebkontent_file']==NULL): ?>
							<img style="max-width: 300px;max-height: 150px;min-width: 280px;" src="<?php echo Yii::app()->baseUrl; ?>/images/nophoto.jpg">
							<?php else: ?>
							<img style="max-width: 300px;max-height: 150px;min-width: 280px;" src="<?php echo Yii::app()->baseUrl; ?>/upload/kontent/<?php echo $list_lastberita['tblwebkontent_file'] ?>">
							<?php endif; ?>
							</a>
							<div class="entry-header media-body">
								<h4 class="entry-title">
									<a href="<?php echo $link_detail_lastberita; ?>"><?php echo $list_lastberita['tblwebkontent_judul']; ?></a>
								</h4>
								<div class="entry-meta">
									<span class="posted-on">
								<i class="fa fa-calendar icon-meta"></i>
								<time class="entry-date published updated" datetime="2016-10-17T11:05:54+00:00"><?php echo date('d-m-Y', strtotime($list_lastberita['tblwebkontent_sysinsert'])); ?></time>
							</span>
							<span class="posted-on"><i class="fa fa-user icon-meta"></i>Admin</span>
							<span class="posted-on"><i class="fa fa-eye icon-meta"></i><?php echo $list_lastberita['tblwebkontent_klik']; ?> Dibaca</span>
								</div>
							</div>
						</div>
						<?php endforeach ?>
					</div>
				</div>
			</div>
		</div>
	</div>
 -->
	<!-- Go to www.addthis.com/dashboard to customize your tools --> <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5b7294ee3e677b9d"></script> 
	<!-- Go to www.addthis.com/dashboard to customize your tools --><!--  <div class="addthis_inline_share_toolbox"></div>  -->
