<?php define('ASSETS_URL',$data['theme_baseurl']); ?>
<style type="text/css">
	a {
		color: #5fb50a;
		cursor: pointer;

	}
	a:hover {
		text-decoration: none;
	}
	a.thumbnail {
		border: 1px solid #5fb50a;

	}
	a.thumbnail:hover {
		box-shadow: 1px 2px 2px #333;
		-moz-box-shadow: 1px 2px 2px #333;
		-webkit-box-shadow: 1px 2px 2px #333;
	}
</style>
<section>
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="well well-sm well-light">
				<h1 align="center" class="page-title txt-color-blueDark">
					<i class="fa fa-asterisk"></i> 
					Setting Hak Akses Group
				</h1>
			</div>
		</div>
	</div>
	<div class="row">
		<?php foreach ($data['dataakses'] as $hakakses): ?>
			<div class="col-xs-6 col-md-3" id="list-<?php echo $hakakses['id']; ?>">
				<div align="center">
					<a onclick="edit(<?php echo $hakakses['id']; ?>)" class="thumbnail" id="<?php echo $hakakses['id']; ?>" align="center" style="font-align: center;">
						<font style="font-size: 66px;" class="fa fa-group"></font> 
						<p><?php echo $hakakses['kode']; ?></p>
						<input style="display:none" type="text" name="namanya" id="namanya" value="<?php echo $hakakses['id']; ?>">
					</a>
				</div>
			</div>
		<?php endforeach; ?>
	</div>

	<div id="detailhakakses">

	</div>
</section>

<!-- widget grid -->
<section id="widget-grid" class="">

	<!-- row -->
	<div class="row">

		<!-- NEW WIDGET START -->
		<article id="edit-form" style="display:none" class="col-sm-12">

			<!-- Widget ID (each widget will need unique ID)-->
			<div class="jarviswidget well" id="wid-<?php echo md5(microtime()); ?>">
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

							<div class="pull-right">
								<div class="alert alert-warning fade in">
								<i class="fa-fw fa fa-warning"></i>
								<strong> Centang Semua ?</strong><span class="onoffswitch">
									<input type="checkbox" class="onoffswitch-checkbox" id="cbx-isCheckAll">
									<label class="onoffswitch-label" for="cbx-isCheckAll"> 
										<div class="onoffswitch-inner" data-swchon-text="YES" data-swchoff-text="NO"></div> 
										<div class="onoffswitch-switch"></div>
									</label> 
								</span></div>
							</div>
						</div>

						<div class="row">
							<div class="col-sm-12 col-lg-6 col-xs-12">
								<div class="pull-left">
									<h6>Daftar menu disusun bertingkat</h6>
								</div>
								<div class="pull-right">
									<button id="btn_defrag" type="button" onclick="AturHakAkses()" class="btn btn-success">
										<i class="fa fa-check"></i> Atur Hak Akses Group
									</button>
								</div>
							</div>
							<div class="col-sm-12 col-lg-6 col-xs-12">
								<div style="display:none" id="notifOK" class="alert alert-info fade in">
									<button class="close" data-dismiss="alert">
										x
									</button>
									<i class="fa-fw fa fa-gear fa-spin"></i>
									<strong>Memproses</strong> Sedang Melakukan Pengaturan Hak Akses Group. 
								</div>
							</div>
						</div>

						<div class="row"> <!-- row -->
							<div class="col-sm-12 col-lg-12 col-xs-12" style="overflow-y: auto;height: 500px;">

								<div id="div_treemenu">
									<!-- content ajax set here -->
								</div>

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
	pageSetUp();
	LOADER = '<div align="center" class="loader_img"><img src="<?php echo Yii::app()->getBaseUrl(1); ?>/images/loader.gif" alt="memuat data..."></div>';
	
	// PAGE RELATED SCRIPTS
	
	if($('.DTTT_dropdown.dropdown-menu').length){
		$('.DTTT_dropdown.dropdown-menu').remove();
	}

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

	//fungsi edit

	function edit (id) {
		$("#edit-form").slideDown(1000);
		$("#div_treemenu").html('');
		$("#div_treemenu").prepend('<div align="center">'+LOADER+'');
		$.ajax({
			url: 'app/privileges/listAkses',
			type: 'post',
			data: {id: id},
			success: function(data) {
				 // $("#detailhakakses").html(data);
				 $("#div_treemenu").html(data);
				 $("#div_treemenu").prepend('<div align="center">'+LOADER+'');
				$(".loader_img").fadeOut(1000);
			}
		});
	}

	//fungsi set pertama biar hidden

	$(function () {
		$("#edit-form").slideUp(500);
	});

	function AturHakAkses() {

		$("#notifOK").show(400);
		$("#btn_defrag").attr('disabled', true);


		var datain = $(":checkbox[name=cbxisTampil]").map(function(){
			return [{"id":$(this).val(),"prop":$(this).prop('checked') ? "T":"F"}];
		});

		var options = {};

		for (var i=0; i < datain.length; i++){
			var key = datain[i].id;
			var val = datain[i].prop;
			options[key] = val;
		}

		var kirim=JSON.stringify(options);

        $.ajax({
        	url: 'app/privileges/AturHakAkses',
        	type: 'post',
        	data: {
        		datacheck: kirim,
        		idgrup: window.idgrup
        	},
        	success: function(data) {
        		$("#notifOK").hide(400);
				$("#btn_defrag").attr('disabled', false);
        		notifikasi('Sukses','Data Berhasil Disimpan', 'success',1,0);

        	}
        });
 
	}

	$("#cbx-isCheckAll").click(function(event) {
		checked = $("#cbx-isCheckAll").prop("checked");
		if (checked) { checkall(); }
		else { uncheckall(); }
	});

	function checkall () {
		$(":checkbox[name=cbxisTampil]").prop("checked", true);
	}

	function uncheckall () {
		$(":checkbox[name=cbxisTampil]").prop('checked', false);
	}

	function toogleCheckChild(id_parent, elm) {
		var isChecked = $(elm).prop('checked');
		var child = $(":checkbox[name=cbxisTampil][data-parentId="+id_parent+"]");
		
		if (!isChecked) {
			child.prop("checked",isChecked);
		}
	
		window.child= child;

		$.each(child, function(index, val) {
			if (!isChecked) {
			 toogleCheckChild($(val).data('idmenu'),val);
			}
		});

	}

	function toogleCheckParent(id_parent, elm) {
		var isChecked = $(elm).prop('checked');
		var parent = $(":checkbox[name=cbxisTampil][data-idmenu="+id_parent+"]");

		window.parentMenu = parent;
		if (isChecked) {
			parent.prop("checked",isChecked);
			$.each(parentMenu, function(index, val) {
				 toogleCheckParent($(val).data('parentid'),val);
			});
		}
	}


</script>