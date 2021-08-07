<?php define('ASSETS_URL',$data['theme_baseurl']); ?>
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    	<div class="well well-sm well-light">
		<h1 id="TITLE_PAGE"  align="center" class="page-title txt-color-blueDark"><i class="fa fa-list"></i> </h1>
        </div>
	</div>
</div>

<!-- widget grid -->
<section id="widget-grid" class="">

	<!-- row -->
	<div class="row">

		<!-- NEW WIDGET START -->
		<article class="col-sm-12">

			<!-- Widget ID (each widget will need unique ID)-->
			<div class="jarviswidget well" id="wid-skdhsldlksbd">
				<header>
					<span class="widget-icon"> <i class="fa fa-comments"></i> </span>
					<h2>My Data </h2>

				</header>

				<!-- widget div-->
				<div>

					<!-- widget edit box -->
					<div class="jarviswidget-editbox">
						<!-- This area used as dropdown edit box -->

					</div>
					<!-- end widget edit box -->

					<!-- widget content -->
					<div class="widget-body">

						<div id="nestable-menu">
							<button type="button" class="btn btn-default" data-action="expand-all">
								Tampilkan semua sub menu
							</button>
							<button type="button" class="btn btn-default" data-action="collapse-all">
								Tutup semua sub menu
							</button>
						</div>

						<div class="row">
							<div class="col-sm-12 col-lg-6 col-xs-12">
								<div class="pull-left">
									<h6>Daftar menu disusun bertingkat</h6>
								</div>
								<div class="pull-right">
									<button id="btn_defrag" type="button" onclick="defragMenu()" class="btn btn-success">
										<i class="fa fa-check"></i> Update susunan menu
									</button>
								</div>
							</div>
							<div class="col-sm-12 col-lg-6 col-xs-12">
								<div style="display:none" id="notifOK" class="alert alert-info fade in">
									<button class="close" data-dismiss="alert">
										x
									</button>
									<i class="fa-fw fa fa-gear fa-spin"></i>
									<strong>Memproses</strong> Sedang Melakukan Penyusunan Menu. 
								</div>
							</div>
						</div>

						<div class="row"> <!-- row -->
							<div class="col-sm-12 col-lg-6 col-xs-12" style="overflow-y: auto;height: 500px;">

								<div id="div_treemenu">
									<!-- content ajax set here -->
								</div>

							</div>

							<div  class="col-sm-12 col-lg-6">

								<form id="form_data" class="smart-form">
									<fieldset>
										<legend>Update data menu</legend>
										<section>
											<div class="row">
												<label class="label col col-4">Judul Menu</label>
												<div class="col col-10">
													<label class="input"> <i class="icon-append fa fa-align-justify"></i>
														<input value="" type="text" name="tblmenu_title" id="tblmenu_title">
													</label>
												</div>
											</div>
										</section>

										<section>
											<div class="row">
												<label class="label col col-4">Kode Menu</label>
												<div class="col col-10">
													<label class="input"> <i class="icon-append fa fa-sort"></i>
														<input value="" type="text" name="tblmenu_kode" id="tblmenu_kode">
													</label>
												</div>
											</div>
										</section>

										<section>
											<div class="row">
												<label class="label col col-4">Link</label>
												<div class="col col-10">
													<label class="input"> <i class="icon-append fa fa-link"></i>
														<input value="" type="text" name="tblmenu_link" id="tblmenu_link">
													</label>
												</div>
											</div>
										</section>

										<section>
											<div class="row">
												<label class="label col col-4">Icon</label>
												<div class="col col-10">
													<label class="input"> <i class="icon-append fa fa-picture-o"></i>
														<input value="" type="text" name="tblmenu_icon" id="tblmenu_icon">
													</label>
												</div>
											</div>
										</section>

										<section>
											<div class="row">
												<label class="label col col-4">Menu Induk</label>
												<div class="col col-10">
													<label class="select">
														<select name="tblmenu_idparent" id="tblmenu_idparent" class="select2">
															<option value="">== Pilih Menu Induk ==</option>
														</select>
													</label>
												</div>
											</div>
										</section>

									</fieldset>

									<footer>
										<button type="button" onclick="return simpan()" class="btn btn-primary">
											<i class="fa fa-save"></i> Simpan
										</button>
										<button type="reset" class="btn btn-default">
											<i class="fa fa-times"></i> Batal
										</button>
									</footer>
								</form>
							</div>
						</div> <!-- //row -->
					</div>
					<!-- //widget content -->
				</div>
				<!-- //widget div-->
			</div>
			<!-- Widget ID (each widget will need unique ID)-->
		</article>
		<!-- NEW WIDGET START -->
	</div>
	<!-- row -->

	<!-- row -->

	<div style="display:none" class="row">
		<div class="col-sm-12">
			<div class="well well-sm well-light">
				<p>
					<strong>Serialised Output (per list)</strong>
				</p>
				<p class="alert alert-info">
					Preview of the lists update DB input.
				</p>
				<textarea id="nestable-output" rows="3" class="form-control font-md"></textarea>
				<br>
				<textarea id="nestable2-output" rows="3" class="form-control font-md"></textarea>
			</div>
		</div>
	</div>
	<!-- end row -->
</section>
<script type="text/javascript">
// DO NOT REMOVE : GLOBAL FUNCTIONS!
	jQuery(document).ready(function($) {
		window.cmd = 'tambah';
		loadTreeMenu();
		loadAllMenu();
	});
	pageSetUp();

	// PAGE RELATED SCRIPTS
	loadScript("<?php echo ASSETS_URL; ?>/js/plugin/jquery-nestable/jquery.nestable.js");

	function runNestables() {

		var updateOutput = function(e) {
			var list = e.length ? e : $(e.target), output = list.data('output');
			if (window.JSON) {
				output.val(window.JSON.stringify(list.nestable('serialize')));
				window.output_val = (window.JSON.stringify(list.nestable('serialize')));
				//, null, 2));
			} else {
				output.val('JSON browser support required for this module.');
			}
		};

		// activate Nestable for list 1
		$('#nestable').nestable({
			group : 1
		}).on('change', updateOutput);

		// output initial serialised data
		updateOutput($('#nestable').data('output', $('#nestable-output')));

		$('#nestable-menu').on('click', function(e) {
			var target = $(e.target), action = target.data('action');
			if (action === 'expand-all') {
				$('.dd').nestable('expandAll');
			}
			if (action === 'collapse-all') {
				$('.dd').nestable('collapseAll');
			}
		});

	}

	/*$('.button-control').on('click', function(e) {
		var target = $(e.target), action = target.data('action'), id = target.data('id');
		if (action === 'edit') {
			edit(id);
		}
		if (action === 'hapus') {
			alert('want to delete id '+id);
		}
	});*/

	function loadTreeMenu() {
		$.post('app/menu/TreeMenu', {}, function(respon) {
			$("#div_treemenu").html(respon);
		});
	}

	function loadAllMenu(id, tblmenu_idparent) {
		id = id!=null ? id : "";
		$("#tblmenu_idparent").select2('val','');
		$.getJSON('app/menu/AllMenu', {id: id}, function(json) {
			setSelectList('tblmenu_idparent', 'Menu Induk', json);
			setTimeout(function() {}, 500);
			if (tblmenu_idparent!=null) {
				$("#tblmenu_idparent").select2('val',tblmenu_idparent!="0" ? tblmenu_idparent : "" ); // set menu Parent
			}
		});
	}

	function tambahSub(id) {
		window.cmd = 'tambah';
		window.id_data = id;
		$("#form_data")[0].reset(); // reset form
		$.ajax({
			url: 'app/menu/getKodeMenu',
			type: 'POST',
			dataType: 'json',
			data: {id: id},
			success: function(respon) {
				$("#tblmenu_kode").val(respon.tblmenu_kode);
				$("#tblmenu_idparent").select2('val',id); // set menu Parent
			}
		});
		
	}

	function edit(id) {
		window.cmd = 'edit';
		window.id_data = id;
		$("#form_data")[0].reset(); // reset form
		$("#tblmenu_idparent").select2('val',''); // menu Parent
		// loadAllMenu(id);
		$.ajax({
			url: 'app/menu/getData',
			type: 'POST',
			dataType: 'json',
			data: {id: id},
			success: function(respon) {
				$("#tblmenu_title").val(respon.tblmenu_title);
				$("#tblmenu_kode").val(respon.tblmenu_kode);
				$("#tblmenu_icon").val(respon.tblmenu_icon);
				$("#tblmenu_link").val(respon.tblmenu_link);
				// $("#tblmenu_idparent").select2('val',respon.tblmenu_idparent!="0" ? respon.tblmenu_idparent : "" ); // set menu Parent
				loadAllMenu(id, respon.tblmenu_idparent)
			}
		});
		
	}

	function hapus(id) {
		$.SmartMessageBox({
			title : "Anda yakin ingin menghapus menu ini?",
			content : "Tindakan ini akan menghapus semua sub menu didalamnya",
			buttons : '[Tidak][Ya]'
		},

		function(ButtonPressed) {
			if (ButtonPressed === "Ya") {
				$.SmartMessageBox({
					title : "Apakah Anda sangat yakin ingin menghapus menu ini?",
					content : "Tindakan ini akan menghapus semua sub menu didalamnya",
					buttons : '[Tidak][Ya]'
				},

				function(ButtonPressed) {
					if (ButtonPressed === "Ya") {
						$.ajax({
							url: 'app/menu/hapus',
							type: 'POST',
							data: {
								id: id
							},
							success:function  (respon) {
								if (respon.status=='success') {
									notifikasi('Sukses',respon.data.message,'success',1,0);
									loadTreeMenu();
									loadAllMenu();
									window.cmd = 'tambah';
								} else {
									notifikasi('Gagal',respon.data.message,'fail',1,0);
								}
							}
						});
					}

				});
			}

		});

		
	}

	function simpan() {
		var data = 'cmd='+window.cmd+'&id='+window.id_data+'&'+$("#form_data").serialize();
		$.ajax({
			url: 'app/menu/simpan',
			type: 'POST',
			dataType: 'json',
			data: data,
			success: function(respon) {
				if (respon.status=='success') {
					notifikasi('Sukses',respon.data.message,'success',1,0);
					loadTreeMenu();
					loadAllMenu();
				} else {
					notifikasi('Gagal',respon.data.message,'failed',1,0);
				}

				$("#form_data")[0].reset(); // reset form
				$("#tblmenu_idparent").select2('val',''); // menu Parent
			}
		});
	}

	function defragMenu() {
		$("#notifOK").show(400);
		$("#btn_defrag").attr('disabled', true);
		var dataMenu = $("#nestable-output").val();
		$.ajax({
			url: 'app/menu/defragMenu',
			type: 'POST',
			dataType: 'json',
			data: {data:dataMenu},
			success: function(respon) {
				if (respon.status=='success') {
					notifikasi('Sukses',respon.data.message,'success',1,0);
					loadAllMenu();
				} else {
					notifikasi('Gagal',respon.data.message,'failed',1,0);
				}
				$("#notifOK").hide(400);
				$("#btn_defrag").attr('disabled', false);
			}
		});
	}
</script>
<style type="text/css">
	/*.onoffswitch-switch {
		right: 40px !important; 
	}*/
	.mrg-top-min-5 {
		margin-top: -5px;
	}
</style>