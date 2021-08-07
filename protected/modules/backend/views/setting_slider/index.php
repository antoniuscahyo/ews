
<?php define('ASSETS_URL', 'themes/smartadmin');
?>
<div class="row">
	<div class="col-sm-12">
		
		<div class="well">
			<button class="close" data-dismiss="alert">
				x
			</button>
			<h1 class="semi-bold">Pada submenu ini dipergunakan untuk melakukan pengaturan gambar pada slider</h1>
		</div>

		
	</div>
</div>


<div class="row">

	<!-- NEW WIDGET START -->
	<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

		<!-- Widget ID (each widget will need unique ID)-->
		<div class="jarviswidget" id="wid-id-4" data-widget-editbutton="false">
				<!-- widget options:
				usage: <div class="jarviswidget" id="wid-id-0" data-widget-editbutton="false">

				data-widget-colorbutton="false"
				data-widget-editbutton="false"
				data-widget-togglebutton="false"
				data-widget-deletebutton="false"
				data-widget-fullscreenbutton="false"
				data-widget-custombutton="false"
				data-widget-collapsed="true"
				data-widget-sortable="false"

			-->
			<header>
				<span class="widget-icon"> <i class="fa fa-table"></i> </span>
				<h2>&nbsp;Image Slider</h2>

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
					<div class="widget-body-toolbar">
						<button class="btn btn-primary" onclick="tambah()">
							<i class="fa fa-plus-square"></i>	Tambah
						</button>	
							<!-- <button class="btn btn-danger"  onclick='hapus()' data-toggle="modal" data-target="#hapus">
								<i class="glyphicon glyphicon-trash"></i>	Hapus
							</button> -->							
						</div>

						<div class="">

							<table id="dt_basic" class="table table-bordered table-striped table-condensed table-hover smart-form has-tickbox">
								<thead>
									<tr>
										<th width="15">No</th>
										<th width="70">Gambar</th>
										<th>Teks</th>
										<th>Status</th>
										<th width="15">Edit</th>
										<th width="15">Hapus</th>
									</tr>
								</thead>
								<tbody>
									<?php $no=1; foreach ($dataimageslider as $imageslider): ?>
									<tr>
										<td><?php echo $no++; ?></td>
										<td>
											<center>
												<a class="btn btn-xs bg-color-green txt-color-white pull-right"  target="_blank" href="<?php echo Yii::app()->baseUrl; ?>/upload/slider/<?php echo $imageslider['tblslider_gambar'];?>"><?php echo $imageslider['tblslider_gambar'];?></a></td>
											</center>
											<td>
												<?php /*
												<?php echo $imageslider['tblslider_text'];?>
												*/ ?>
												<a href="javascript:void(0);" class="btn btn-xs bg-color-magenta txt-color-white" onclick="inputteks(<?php echo $imageslider['tblslider_id']; ?>)"><i class="fa fa-edit"></i> Input Teks</a> 
											</td>
											<td><?php echo $imageslider['tblslider_status']=='T' ? '<a class="btn btn-xs bg-color-blue txt-color-white "  href="javascript:void(0);">Aktif</a>' : '<a class="btn btn-xs bg-color-red txt-color-white" href="javascript:void(0);">Tidak Aktif</a>';?></td>
											<td><a href="javascript:void(0);" class="btn btn-circle btn-xs bg-color-green txt-color-white "  onclick="edit(<?php echo $imageslider['tblslider_id']; ?>)"><i class="fa fa-edit"></i></a> </td>
											<td><a href="javascript:void(0);" class="btn btn-circle btn-xs bg-color-red txt-color-white "  onclick="hapus(<?php echo $imageslider['tblslider_id']; ?>)"><i class="glyphicon glyphicon-trash"></i></a> </td>
										</tr>
									<?php endforeach ?>
								</tbody>
							</table>
							
						</div>
						
					</div>
					<!-- end widget content -->

				</div>
				<!-- end widget div -->

			</div>
			<!-- end widget -->

		</article>
		<!-- WIDGET END -->

	</div>

	<!-- end row -->

</section>
<!-- end widget grid -->

<script type="text/javascript">

	pageSetUp();

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

	var pagefunction = function() {
		//console.log("cleared");
		
		/* // DOM Position key index //
		
			l - Length changing (dropdown)
			f - Filtering input (search)
			t - The Table! (datatable)
			i - Information (records)
			p - Pagination (paging)
			r - pRocessing 
			< and > - div elements
			<"#id" and > - div with an id
			<"class" and > - div with a class
			<"#id.class" and > - div with an id and class
			
			Also see: http://legacy.datatables.net/usage/features
			*/	

			/* BASIC ;*/
			var responsiveHelper_dt_basic = undefined;
			var responsiveHelper_datatable_fixed_column = undefined;
			var responsiveHelper_datatable_col_reorder = undefined;
			var responsiveHelper_datatable_tabletools = undefined;
			
			var breakpointDefinition = {
				tablet : 1024,
				phone : 480
			};

			$('#dt_basic').dataTable({
				"sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6'f><'col-sm-6 col-xs-12 hidden-xs'l>r>"+
				"t"+
				"<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-xs-12 col-sm-6'p>>",
				"autoWidth" : true,
				"preDrawCallback" : function() {
					// Initialize the responsive datatables helper once.
					if (!responsiveHelper_dt_basic) {
						responsiveHelper_dt_basic = new ResponsiveDatatablesHelper($('#dt_basic'), breakpointDefinition);
					}
				},
				"rowCallback" : function(nRow) {
					responsiveHelper_dt_basic.createExpandIcon(nRow);
				},
				"drawCallback" : function(oSettings) {
					responsiveHelper_dt_basic.respond();
				}
			});

			/* END BASIC */

			/* COLUMN FILTER  */
			var otable = $('#datatable_fixed_column').DataTable({
	    	//"bFilter": false,
	    	//"bInfo": false,
	    	//"bLengthChange": false
	    	//"bAutoWidth": false,
	    	//"bPaginate": false,
	    	//"bStateSave": true // saves sort state using localStorage
	    	"sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6 hidden-xs'f><'col-sm-6 col-xs-12 hidden-xs'<'toolbar'>>r>"+
	    	"t"+
	    	"<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-xs-12 col-sm-6'p>>",
	    	"autoWidth" : true,
	    	"preDrawCallback" : function() {
				// Initialize the responsive datatables helper once.
				if (!responsiveHelper_datatable_fixed_column) {
					responsiveHelper_datatable_fixed_column = new ResponsiveDatatablesHelper($('#datatable_fixed_column'), breakpointDefinition);
				}
			},
			"rowCallback" : function(nRow) {
				responsiveHelper_datatable_fixed_column.createExpandIcon(nRow);
			},
			"drawCallback" : function(oSettings) {
				responsiveHelper_datatable_fixed_column.respond();
			}		

		});

	    // custom toolbar
	    $("div.toolbar").html('<div class="text-right"><img src="img/logo.png" alt="SmartAdmin" style="width: 111px; margin-top: 3px; margin-right: 10px;"></div>');

	    // Apply the filter
	    $("#datatable_fixed_column thead th input[type=text]").on( 'keyup change', function () {
	    	
	    	otable
	    	.column( $(this).parent().index()+':visible' )
	    	.search( this.value )
	    	.draw();

	    } );
	    /* END COLUMN FILTER */   

	    /* COLUMN SHOW - HIDE */
	    $('#datatable_col_reorder').dataTable({
	    	"sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6'f><'col-sm-6 col-xs-6 hidden-xs'C>r>"+
	    	"t"+
	    	"<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-sm-6 col-xs-12'p>>",
	    	"autoWidth" : true,
	    	"preDrawCallback" : function() {
				// Initialize the responsive datatables helper once.
				if (!responsiveHelper_datatable_col_reorder) {
					responsiveHelper_datatable_col_reorder = new ResponsiveDatatablesHelper($('#datatable_col_reorder'), breakpointDefinition);
				}
			},
			"rowCallback" : function(nRow) {
				responsiveHelper_datatable_col_reorder.createExpandIcon(nRow);
			},
			"drawCallback" : function(oSettings) {
				responsiveHelper_datatable_col_reorder.respond();
			}			
		});

	    /* END COLUMN SHOW - HIDE */

	    /* TABLETOOLS */
	    $('#datatable_tabletools').dataTable({

			// Tabletools options: 
			//   https://datatables.net/extensions/tabletools/button_options
			"sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6'f><'col-sm-6 col-xs-6 hidden-xs'T>r>"+
			"t"+
			"<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-sm-6 col-xs-12'p>>",
			"oTableTools": {
				"aButtons": [
				"copy",
				"csv",
				"xls",
				{
					"sExtends": "pdf",
					"sTitle": "SmartAdmin_PDF",
					"sPdfMessage": "SmartAdmin PDF Export",
					"sPdfSize": "letter"
				},
				{
					"sExtends": "print",
					"sMessage": "Generated by SmartAdmin <i>(press Esc to close)</i>"
				}
				],
				"sSwfPath": "js/plugin/datatables/swf/copy_csv_xls_pdf.swf"
			},
			"autoWidth" : true,
			"preDrawCallback" : function() {
				// Initialize the responsive datatables helper once.
				if (!responsiveHelper_datatable_tabletools) {
					responsiveHelper_datatable_tabletools = new ResponsiveDatatablesHelper($('#datatable_tabletools'), breakpointDefinition);
				}
			},
			"rowCallback" : function(nRow) {
				responsiveHelper_datatable_tabletools.createExpandIcon(nRow);
			},
			"drawCallback" : function(oSettings) {
				responsiveHelper_datatable_tabletools.respond();
			}
		});

/* END TABLETOOLS */

};

	// load related plugins
	loadScript("<?php echo ASSETS_URL; ?>/ajs/datatables/jquery.dataTables.min.js", function(){
		loadScript("<?php echo ASSETS_URL; ?>/ajs/datatables/dataTables.colVis.min.js", function(){
			loadScript("<?php echo ASSETS_URL; ?>/ajs/datatables/dataTables.tableTools.min.js", function(){
				loadScript("<?php echo ASSETS_URL; ?>/ajs/datatables/dataTables.bootstrap.min.js", function(){
					loadScript("<?php echo ASSETS_URL; ?>/ajs/datatables/datatables.responsive.min.js", pagefunction)
				});
			});
		});
	});

		//MODAL
		$('#modal_link').click(function() {
			$('#dialog-message').dialog('open');
			return false;
		});	

		$('#datepicker').datepicker({
			dateFormat: 'dd/mm/yy',
			prevText: '<i class="fa fa-chevron-left"></i>',
			nextText: '<i class="fa fa-chevron-right"></i>',
			onSelect: function (selectedDate) {
				$('#finishdate').datepicker('option', 'minDate', selectedDate);
			}
		});	


function tambah() {
	window.cmd = "tambah";
	$("#modalform").modal("show");
	$("#tblslider_text").val("");
	$("#tblslider_status").select2("val","");
	$("#namafileimages").val("");
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
	$.ajax({
		url: 'backend/setting_slider/simpan',
		type: 'POST',
		data: {
			cmd: window.cmd,
			id: window.id,
			modalform : $('#modalform').val(),
			tblslider_text : $('#tblslider_text').val(),
			tblslider_status : $('#tblslider_status').val(),
			tblslider_gambar : window.file,
			
		}
		,success: function  (respon) {
			//$("#submit-file").click();
			
			if (respon=='success'){
				notifikasi("Sukses","Data berhasil disimpan","success");
			window.location.reload();
			} 
				else{
				notifikasi("Gagal","Data gagal disimpan","failed",0,0);
			}
		}
	})
	return false;
	
};

function edit(id) {
	window.id = id;
	window.cmd = "edit";
	$.ajax({
		url: 'backend/setting_slider/GetDataImageSlider',
		type: 'POST',
		dataType:'json',
		data: {id: id},
		success : function (respon) {
			$('#tblslider_text').val(respon.tblslider_text);
			$('#tblslider_status').select2('val', respon.tblslider_status);
			$('#namafileimages').val(respon.tblslider_gambar);
			window.file = respon.tblslider_gambar;
		}

	});

	$("#modalform").modal("show");
}



function hapus(id) {
	window.id = id;
	window.cmd = "hapus";
	$.SmartMessageBox({
		title : "Konfirmasi",
		content : "Apakah anda yakin akan menghapus Slider ini?",
		buttons : '[Tidak][Ya]'
	}, function(ButtonPressed) {
		if (ButtonPressed === "Ya") {
			$.ajax({
				url: 'backend/setting_slider/HapusDataImageSlider',
				type: 'POST',
				data: {id: id},
				success: function  (respon) {
					if (respon=='success') 
						notifikasi("Sukses","Data berhasil dihapus","success");
					else
						notifikasi("Gagal","Data gagal dihapus","failed",0,0);
				}
			});

		}

	});
	
}

function inputteks(id) {
	window.id = id;
	window.idteks = '';
	window.cmdteks = 'tambah';
	$.ajax({
		url: 'backend/setting_slider/GetDataTeksSlider',
		type: 'POST',
		data: {id: id},
		success : function (respon) {
			$('#tbodytext').html(respon);
		}
	});
	$('#teks').val('');
	$('#delay').val('');
	$("#modalformteks").modal("show");
}

function simpanteks () {
	$.ajax({
		url: 'backend/setting_slider/simpanteks',
		type: 'POST',
		data: {
			idslider: window.id,
			id: window.idteks,
			cmd: window.cmdteks,
			teks : $('#teks').val(),
			delay : $('#delay').val()
			
		}
		,success: function  (respon) {
			//$("#submit-file").click();
			
			if (respon=='success'){
				notifikasi("Sukses","Data berhasil disimpan","success",0,0);
				inputteks(window.id);
			}else{
				notifikasi("Gagal","Data gagal disimpan","failed",0,0);
			}
		}
	})
	return false;
	
};

function editteks(id) {
	window.idteks = id;
	window.cmdteks = "edit";
	$.ajax({
		url: 'backend/setting_slider/GetDataTeks',
		type: 'POST',
		dataType:'json',
		data: {id: id},
		success : function (respon) {
			$('#teks').val(respon.tblslidertext_teks);
			$('#delay').val(respon.tblslidertext_delay);
			window.id = respon.tblslider_id;
		}

	});

	$("#modalformteks").modal("show");
}



function hapusteks(id) {
	window.idteks = id;
	window.cmdteks = "hapus";
	$.SmartMessageBox({
		title : "Konfirmasi",
		content : "Apakah anda yakin akan menghapus Teks ini?",
		buttons : '[Tidak][Ya]'
	}, function(ButtonPressed) {
		if (ButtonPressed === "Ya") {
			$.ajax({
				url: 'backend/setting_slider/HapusTeks',
				type: 'POST',
				data: {id: id},
				success: function  (respon) {
					if (respon=='success') {
						notifikasi("Sukses","Data berhasil dihapus","success",0,0);
						inputteks(window.id);
					}
					else{
						notifikasi("Gagal","Data gagal dihapus","failed",0,0);
					}
				}
			});

		}

	});
	
}
</script>



<div class="modal fade" id="modalform" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					&times;
				</button>
				<h4 class="modal-title" id="myModalLabel">Form Setting slider</h4>
			</div>
			<form action="" id="order-form" class="smart-form" novalidate>
			</header>

			<fieldset>

				<div class="row hidden">
					<section class="col col-3">
						<label > 
							Keterangan									
						</label>
					</section>
					<section class="col col-8">
						<label class="input">
							<textarea class="form-control" placeholder="" rows="4" id="tblslider_text" name="tblslider_text"></textarea>
						</label>
					</section>
				</div>

				<div class="row">
					<section class="col col-3">
						<label > 
							Status										
						</label>
					</section>
					<section class="col col-8">
						<label class="select">
							<select class="select2" name="tblslider_status" id="tblslider_status">
								<option value="">==SILAHKAN PILIH STATUS==</option>
								<option value="T">Aktif</option>
								<option value="F">Tidak Aktif</option>
							</select>
						</label>
					</section>									
				</div>	

			</fieldset>
		</form>


		<form method="post" enctype="multipart/form-data" class="smart-form" action="backend/setting_slider/SimpanFileImageSlider" id="form-upload-temp">
			<fieldset>
				<div class="row">
					<section class="col col-3">
						<label > 
							Upload File										
						</label>
					</section>
					<section class="col col-8">
						<label for="file" class="input input-file">
							<div class="button">
								<input type="file" id="upload_file" name="upload_file" onchange="this.parentNode.nextSibling.value = this.value">Browse</div><input id="namafileimages" type="text" >
								<input type="hidden" name="namafileimage" id="namafileimage" value="">
							</label>
						</section>
					</div>
					<section><br><p>Ukuran File Upload Maksimal 1920 x 750 Pixels</p>
					</section>

					<section>
						<div class="progress progress-md progress-striped active" id="progress">
							<div class="progress-bar bg-color-blue"  id="bar"  role="progressbar" style="width: auto;"></div>
						</div>
					</section>

					<section>
						<button type="submit" id="submit-file" style="display: none;" class="btn btn-block bg-color-blue btn-success">
							<i class="fa fa-upload"></i> Upload File</button>
						</section>

					</fieldset>	
				</form>	


				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">
						Batal
					</button>
					<button type="button" onclick='simpan()' class="btn btn-primary" id="eg7" >
						Simpan
					</button>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div>


	<div class="modal fade" id="modalformteks" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
						&times;
					</button>
					<h4 class="modal-title" id="myModalLabelText">Form Setting Teks Slider</h4>
				</div>
				<form action="" id="order-form-text" class="smart-form" novalidate>
				</header>

				<fieldset>

					<div class="row">
						<section class="col col-3">
							<label > 
								Teks									
							</label>
						</section>
						<section class="col col-8">
							<label class="textarea">
								<textarea class="form-control" placeholder="Isikan Teks" rows="4" id="teks" name="teks"></textarea>
							</label>
						</section>
					</div>

					<div class="row">
						<section class="col col-3">
							<label > 
								Delay Animasi									
							</label>
						</section>
						<section class="col col-8">
							<label class="input">
								<input class="form-control" type="number" placeholder="Mohon Isikan Dalam Angka Saja" id="delay" name="delay">
							</label>
						</section>
					</section>
					</div>

					<div class="row">
						<section class="col col-12"><br><p>Isikan dalam ukuran milidetik (contoh : 1000 milidetik = 1 detik). Boleh tidak diisi (Rekomendasi : 100).</p>
					</div>

				</fieldset>
			</form>
			<font>
				<fieldset>
					<!-- <div class="row"> -->
						<div id="tbodytext"></div>
					<!-- </div> -->
				</fieldset>
			</font>

			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">
					Batal
				</button>
				<button type="button" onclick='simpanteks()' class="btn btn-primary" id="eg7" >
					Simpan
				</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div>

