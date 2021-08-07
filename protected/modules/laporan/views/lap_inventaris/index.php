<div class="col-xs-12 col-sm-7 col-md-7 col-lg-12">
	<h1 class="page-title txt-color-blue">
		<i class="fa fa-print fa-lg "></i> 
		<strong> Laporan Inventaris</strong>
	</h1>
</div>

<div class="row">       
	<section class="col-xs-12 col-sm-12 col-md-12 col-lg-12">   
		<div class="jarviswidget jarviswidget-color-green" id="wid-id-jefcari"  data-widget-sortable="false" data-widget-editbutton="false" data-widget-deletebutton="false" data-widget-fullscreenbutton="false" data-widget-collapsed="false" data-widget-togglebutton="false" data-widget-colorbutton="false">
			<header style="border-radius: 5px 5px 0px 0px;">
				<h2><strong> <i class="fa fa-search fa-fw "></i> Form Pencarian</strong></h2>        
			</header>

			<!-- widget div-->
			<div>

				<!-- widget edit box -->
				<div class="jarviswidget-editbox">
					<!-- This area used as dropdown edit box -->

				</div>
				<!-- end widget edit box -->

				<!-- widget content -->
				<div class="widget-body no-padding">
					<form action="" id="form" class="smart-form" novalidate>
						<fieldset>
							<div class="row">
								<section class="col col-md-2">Jenis Aset</section>
								<section class="col col-4">
									<label class="select">
										<select class="select2" name="jns_aset" id="jns_aset">
											<option value="">== Pilih Jenis Aset ==</option>
											<option value="E">Aset Elektronik</option>
											<option value="N">Aset Non Elektronik</option>
										</select>
									</label>
								</section>
							</div>
							<div class="row">
								<section class="col col-md-2">Pilih Ruang</section>
								<section class="col col-4">
									<label class="select">
										<select class="select2" name="jns_aset" id="jns_aset">
											<option value="">== Pilih Ruang ==</option>
											<option value="1">Ruang 307 A</option>
											<option value="2">Lab Multimedia</option>
										</select>
									</label>
								</section>
							</div>
							<div class="row">
								<section class="col col-md-2">Pilih Tahun Perolehan</section>
								<section class="col col-4">
									<label class="select">
										<select class="select2" name="jns_aset" id="jns_aset">
											<option value="">== Pilih Tahun Perolehan ==</option>
											<option value="2019">2019</option>
											<option value="2020">2020</option>
											<option value="2021">2021</option>
										</select>
									</label>
								</section>
							</div>
						</fieldset>
						<footer>
							<a onclick="caridata()" type="button" data-dismiss="modal" class="btn btn-primary">
								<i class="fa  fa-search"></i>&nbsp;Cari
							</a>
						</footer>                
					</form>
				</div>

				<!-- end widget content -->

			</div>
			<!-- end widget div -->

		</div>
		<!-- end widget -->                                                    
	</section>
</div>

<div class="row">       
	<section class="col-xs-12 col-sm-12 col-md-12 col-lg-12">   
		<div class="jarviswidget jarviswidget-color-pink" id="wid-id-jefcari"  data-widget-sortable="false" data-widget-editbutton="false" data-widget-deletebutton="false" data-widget-fullscreenbutton="false" data-widget-collapsed="false" data-widget-togglebutton="false" data-widget-colorbutton="false">
			<header style="border-radius: 5px 5px 0px 0px;">
				<h2><strong> <i class="fa fa-table fa-fw "></i> Laporan Inventaris</strong></h2>        
			</header>

			<!-- widget div-->
			<div>

				<!-- widget edit box -->
				<div class="jarviswidget-editbox">
					<!-- This area used as dropdown edit box -->

				</div>
				<!-- end widget edit box -->

				<!-- widget content -->
				<div class="widget-body no-padding">
					<div class="widget-body-toolbar" id="tombolcetak" style="display: none;">
						<a class="btn btn-success" onclick="cetak('html')">
							<i class="fa fa-print"></i>	Cetak (HTML)
						</a>							
					</div>
					<div id="body_pencarian">
						<h3 align="center">Silahkan lakukan pencarian data terlebih dahulu</h3>
					</div>
				</div>

				<!-- end widget content -->

			</div>
			<!-- end widget div -->

		</div>
		<!-- end widget -->                                                    
	</section>
</div>


<script type="text/javascript">	
	pageSetUp();

	LOADER = '<div align="center" class="loader_img"><img src="<?php echo Yii::app()->getBaseUrl(1) ?>/images/loader.gif" alt="memuat data..."></div>';

	function caridata() {
		$.ajax({
			url: 'laporan/lap_inventaris/caridata',
			type: 'POST',
			dataType: 'html',
			data :{

			},
			success:function (respon) {
				$("#body_pencarian").html(respon);
				$("#body_pencarian").show();
				$("#tombolcetak").show();
				$("#body_pencarian").prepend('<div align="center">'+LOADER+'');
				$(".loader_img").fadeOut(1000);
			}
		});
	}	

	function cetak(jenis) {
		window.open('<?php echo Yii::app()->baseUrl; ?>/laporan/lap_inventaris/Cetak?jenis='+jenis);
	}

</script>
