<?php define('ASSETS_URL', 'themes/smartadmin');
?>

<div class="col-xs-12 col-sm-7 col-md-7 col-lg-12">
	<h1 class="page-title txt-color-blueDark">
		<i class="fa fa-file-text fa-fw "></i> 
		Data Inventaris
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
								<section class="col col-md-2">Nomor Inventaris</section>
								<section class="col col-md-4">
									<label class="input">
										<input type="text" value="" id="nomor_inventaris" name="nomor_inventaris">
									</label>
								</section>
								<section class="col col-md-2">    
									<button type="button" class="btn btn-sm btn-primary" onclick="caridata()" style="background-color: #55acee;border-color: #55acee;">
										<i class="fa  fa-search"></i>&nbsp;Cari
									</button>
								</section>
							</div>
						</fieldset>                
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
	<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="jarviswidget jarviswidget-color-orange" id="wid-id-data_inventaris" data-widget-editbutton="false" data-widget-deletebutton="false" data-widget-fullscreenbutton="false">
			<header style="border-radius: 5px 5px 0px 0px;">
				<span class="widget-icon"> <i class="fa fa-table"></i> </span>
				<h2>Data Inventaris</h2>
			</header>
			<div>
				<div class="jarviswidget-editbox">
				</div>
				<div class="widget-body no-padding">
					<div class="widget-body-toolbar">
						<button class="btn btn-primary" onclick="tambah()">
							<i class="fa fa-plus-square"></i>	Tambah Data
						</button>							
					</div>
					<div id="body_pencarian">
						<h3 align="center">Silahkan lakukan pencarian data terlebih dahulu</h3>
					</div>
				</div>
			</div>
		</div>
	</article>
</div>


<!-- Modal -->
<div class="modal fade" id="modal_tambahinventaris" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
	<div class="modal-dialog modal-md">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					&times;
				</button>
				<h4 class="modal-title">
					Form Input Data Inventaris
				</h4>
			</div>
			<div class="modal-body no-padding">

				<form id="form-data" class="smart-form">
					<fieldset style="padding-top: 15px !important;">

						<div class="row">
							<section class="col col-3">
								<label > 
									Nomor Inventaris								
								</label>
							</section>
							<section class="col col-9">
								<label class="input">
									<input class="form-control" type="text" placeholder="Nomor Inventaris" id="tblinventaris_nomor" name="tblinventaris_nomor">
								</label>
							</section>
						</div>

						<div class="row">
							<section class="col col-3">
								<label > 
									Jenis Aset										
								</label>
							</section>
							<section class="col col-9">
								<label class="select">
									<select class="select2" id="refjenisaset_id" name="refjenisaset_id">
										<option value="">== Pilih Jenis Aset ==</option>
										<?php foreach ($data['jenisaset_list'] as $datajenisaset): ?>
											<option value="<?php echo $datajenisaset['refjenisaset_id']; ?>"><?php echo $datajenisaset['refjenisaset_nama']; ?></option>
										<?php endforeach; ?>
									</select>
								</label>
							</section>									
						</div>

						<div class="row">
							<section class="col col-3">
								<label > 
									Nama Barang								
								</label>
							</section>
							<section class="col col-9">
								<label class="input">
									<input class="form-control" type="text" placeholder="Nama Barang" id="tblinventaris_namabarang" name="tblinventaris_namabarang">
								</label>
							</section>
						</div>

						<div class="row">
							<section class="col col-3">
								<label > 
									Spesifikasi								
								</label>
							</section>
							<section class="col col-9">
								<label class="input">
									<textarea class="form-control" placeholder="" rows="4" id="tblinventaris_spesifikasi" name="tblinventaris_spesifikasi"></textarea>
								</label>
							</section>
						</div>

						<div class="row">
							<section class="col col-3">
								<label > 
									Kondisi							
								</label>
							</section>
							<section class="col col-9">
								<label class="input">
									<input class="form-control" type="text" placeholder="isikan Kondisi" id="tblinventaris_kondisi" name="tblinventaris_kondisi">
								</label>
							</section>
						</div>

						<div class="row">
							<section class="col col-3">
								<label > 
									Tahun Perolehan										
								</label>
							</section>
							<section class="col col-9">
								<label class="select">
									<select class="select2" id="reftahun_id" name="reftahun_id">
										<option value="">== Pilih Tahun Perolehan ==</option>
										<?php foreach ($data['tahun_list'] as $datatahun): ?>
											<option value="<?php echo $datatahun['reftahun_id']; ?>"><?php echo $datatahun['reftahun_nama']; ?></option>
										<?php endforeach; ?>
									</select>
								</label>
							</section>									
						</div>

						<div class="row">
							<section class="col col-3">
								<label > 
									Ruang										
								</label>
							</section>
							<section class="col col-9">
								<label class="select">
									<select class="select2" id="refruang_id" name="refruang_id">
										<option value="">== Pilih Ruang ==</option>
										<?php foreach ($data['ruang_list'] as $dataruang): ?>
											<option value="<?php echo $dataruang['refruang_id']; ?>"><?php echo $dataruang['refruang_nama']; ?></option>
										<?php endforeach; ?>
									</select>
								</label>
							</section>									
						</div>

					</fieldset>
				</form>

				<form method="post" enctype="multipart/form-data" class="smart-form" action="aset/data_inventaris/SimpanFile" id="form-upload-temp">
					<fieldset>
						<div class="row">
							<section class="col col-3">
								<label > 
									Upload File										
								</label>
							</section>
							<section class="col col-9">
								<label for="file" class="input input-file">
								<div class="button">
									<input type="file" id="upload_file" name="upload_file" onchange="this.parentNode.nextSibling.value = this.value">Browse</div><input id="namafileimages" type="text" >
									<input type="hidden" name="namafileimage" id="namafileimage" value="">
								</label>
							</section>									
						</div>

						<div class="row">
							<section class="col col-3">
								<label > 
									&nbsp;										
								</label>
							</section>
							<section class="col col-9">
								<div class="progress progress-md progress-striped active" id="progress">
									<div class="progress-bar bg-color-blue"  id="bar"  role="progressbar" style="width: auto;"></div>
								</div>
							</section>									
						</div>

						<div class="row">
							<section class="col col-3">
								<label > 
									&nbsp;										
								</label>
							</section>
							<section class="col col-9">
								<button type="submit" id="submit-file" style="display: none;" class="btn btn-sm btn-block bg-color-blue btn-success">
									<i class="fa fa-upload"></i> Upload File
								</button>
							</section>									
						</div>

					</fieldset>
					<footer>
						<a onclick="simpan()" id="btnSewaAset" type="button" class="btn btn-primary">
							Simpan
						</a>
						<button type="reset" class="btn btn-default" data-dismiss="modal">
							Batal
						</button>
					</footer>
				</form>
			</div>

		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div>
<!-- Modal -->


<script type="text/javascript">	
	pageSetUp();

	jQuery(document).ready(function($) {
		caridata();
	});

	LOADER = '<div align="center" class="loader_img"><img src="<?php echo Yii::app()->getBaseUrl(1) ?>/images/loader.gif" alt="memuat data..."></div>';

	function caridata() {
		$.ajax({
			url: 'aset/data_inventaris/caridata',
			type: 'POST',
			dataType: 'html',
			data :{
				nomor: $("#nomor_inventaris").val()
			},
			success:function (respon) {
				$("#body_pencarian").html(respon);
				$("#body_pencarian").show();
				$("#body_pencarian").prepend('<div align="center">'+LOADER+'');
				$(".loader_img").fadeOut(2000);		
			}
		});
	}

	loadScript("<?php echo ASSETS_URL; ?>/js/jquery.form.js",defineAjaxForm2);
	function defineAjaxForm2() {
		var allowed = ['jpg','jpeg','png','gif','bmp'];
		var options = { 
			beforeSend: function() 
			{
				$("#progress").show();
		    	//clear everything
		    	$("#bar").width('0%');

		    	filenya = document.getElementById("upload_file");
		    	ext = $("#upload_file").val().split('.').reverse()[0];
		    	if (!inArray(ext,allowed) && ext!='') {
		    		console.log(ext);
		    		$("#upload_file").parent().next().val('');
		    		notifikasi('Peringatan','File yang anda pilih tidak sesuai extensi yang diizinkan! Mohon pilih file berekstensi .jpg/jpeg, .png, .giv, dan .bmp ','false',1,0);
		    		xhr.abort();
		    		return false;
		    	}

		    },
		    uploadProgress: function(event, position, total, percentComplete) 
		    {
		    	$("#bar").width(percentComplete+'%');

		    },
		    success: function() 
		    {
		    	$("#bar").width('100%');

		    },
		    complete: function(response) 
		    {
		    	if (response.responseText=='invalid_ext') {
		    		notifikasi('Peringatan','File yang anda pilih tidak sesuai extensi yang diizinkan! Mohon pilih file berekstensi .jpg/jpeg, .png, .giv, dan .bmp ','false',1,0);
		    		return false;
		    	}else{
		    		window.file = response.responseText;
		    		simpandata();
		    	}
		    },
		    error: function()
		    {
		    	alert("error");

		    }

		}; 

		$("#form-upload-temp").ajaxForm(options);
	}


	function tambah() {
		window.cmd = "tambah";
		$('#modal_tambahinventaris').modal('show');
		$("#tblinventaris_nomor").val("");
		$("#refjenisaset_id").select2("val","");
		$("#tblinventaris_namabarang").val("");
		$("#tblinventaris_spesifikasi").val("");
		$("#tblinventaris_kondisi").val("");
		$("#reftahun_id").select2("val","");
		$("#refruang_id").select2("val","");
		$("#upload_file").val("");
	}

	function simpan () {
		if ($('#upload_file').val()=='') {
			simpandata()
		}else{
			$("#submit-file").click();
		};
	}

	function simpandata () {
		if ($("#tblinventaris_nomor").val()=="") {
			notifikasi('Informasi','Mohon Isikan Nomor Inventaris', 'failed',1,0,3000);
			return false;
		}
		if ($("#refjenisaset_id").val()=="") {
			notifikasi('Informasi','Mohon Pilih Jenis Aset', 'failed',1,0,3000);
			return false;
		}
		if ($("#tblinventaris_namabarang").val()=="") {
			notifikasi('Informasi','Mohon Isikan Nama Barang', 'failed',1,0,3000);
			return false;
		}
		if ($("#tblinventaris_spesifikasi").val()=="") {
			notifikasi('Informasi','Mohon Isikan Spesifikasi', 'failed',1,0,3000);
			return false;
		}
		if ($("#tblinventaris_kondisi").val()=="") {
			notifikasi('Informasi','Mohon Isikan Kondisi', 'failed',1,0,3000);
			return false;
		}
		if ($("#reftahun_id").val()=="") {
			notifikasi('Informasi','Mohon Pilih Tahun Perolehan', 'failed',1,0,3000);
			return false;
		}
		if ($("#refruang_id").val()=="") {
			notifikasi('Informasi','Mohon Pilih Ruang', 'failed',1,0,3000);
			return false;
		}
		/*if ($("#upload_file").val()=="") {
			notifikasi('Informasi','Mohon Upload File', 'failed',1,0,3000);
			return false;
		}*/
		$.ajax({
			url: 'aset/data_inventaris/simpan',
			type: 'POST',
			data: {
				cmd: window.cmd,
				id: window.id,
				modalform : $('#modal_tambahinventaris').val(),
				tblinventaris_nomor : $("#tblinventaris_nomor").val(),
				refjenisaset_id : $("#refjenisaset_id").select2("val"),
				tblinventaris_namabarang : $("#tblinventaris_namabarang").val(),
				tblinventaris_spesifikasi : $("#tblinventaris_spesifikasi").val(),
				tblinventaris_kondisi : $("#tblinventaris_kondisi").val(),
				reftahun_id : $("#reftahun_id").select2("val"),
				refruang_id : $("#refruang_id").select2("val"),
				tblinventaris_file : window.file,

			}
			,success: function  (respon) {
			//$("#submit-file").click();
			
			if (respon=='success'){
				notifikasi("Sukses","Data berhasil disimpan","success");
			} 
			else{
				notifikasi("Gagal","Data gagal disimpan","failed");
			}
		}
	})
		return false;

	};

	function edit(id) {
		window.id = id;
		window.cmd = "edit";
		$.ajax({
			url: 'aset/data_inventaris/GetDataInventaris',
			type: 'POST',
			dataType:'json',
			data: {id: id},
			success : function (respon) {
				$('#tblinventaris_nomor').val(respon.tblinventaris_nomor);
				$('#refjenisaset_id').select2('val', respon.refjenisaset_id);
				$('#tblinventaris_namabarang').val(respon.tblinventaris_namabarang);
				$('#tblinventaris_spesifikasi').val(respon.tblinventaris_spesifikasi);
				$('#tblinventaris_kondisi').val(respon.tblinventaris_kondisi);
				$('#reftahun_id').select2('val', respon.reftahun_id);
				$('#refruang_id').select2('val', respon.refruang_id);
				$('#namafileimages').val(respon.tblinventaris_file);
				window.file = respon.tblinventaris_file;
			}

		});

		$("#modal_tambahinventaris").modal("show");
	}

	function hapus(id) {
		window.id = id;
		window.cmd = "hapus";
		$.SmartMessageBox({
			title : "Konfirmasi",
			content : "Apakah anda yakin akan menghapus Data ini?",
			buttons : '[Tidak][Ya]'
		}, function(ButtonPressed) {
			if (ButtonPressed === "Ya") {
				$.ajax({
					url: 'aset/data_inventaris/HapusData',
					type: 'POST',
					data: {id: id},
					success: function  (respon) {
						if (respon=='success') 
							notifikasi("Sukses","Data berhasil dihapus","success");
						else
							notifikasi("Gagal","Data gagal dihapus","failed");
					}
				});

			}
		});
	}

</script>
