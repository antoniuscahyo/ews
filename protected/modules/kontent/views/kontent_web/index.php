<?php define('ASSETS_URL', 'themes/smartadmin');
?>


<div class="row">
	<div class="col-sm-12">
		
		<div class="well">
			<button class="close" data-dismiss="alert">
				x
			</button>
			<h1 class="semi-bold">Pada submenu ini dipergunakan untuk melakukan pengaturan konten website</h1>
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
				<h2>&nbsp;Setting Kontent</h2>

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
					<div class="widget-body-toolbar" style="display: none;">
						<button class="btn btn-primary" onclick="tambah()">
							<i class="fa fa-plus-square"></i>	Tambah
						</button>							
					</div>

					<div class="">
						
						<table id="dt_basic" class="table table-bordered table-striped table-condensed table-hover smart-form has-tickbox">
							<thead>
								<tr>
									<th>No</th>
									<th >Menu</th>
									<th >Kategori</th>
									<th >Judul</th>
									<th >Tanggal Post</th>
									<th width="30">Ada Upload</th>
									<th width="30">Status Aktif</th>
									<th width="15">Edit</th>
									<th width="15">Hapus</th>

								</tr>
							</thead>
							<tbody>
								<?php $no=1; foreach ($data['kontent'] as $list_data): ?>
								<tr>
									<td><?php echo $no++; ?></td>
									<td><?php echo @Webmenu::model()->findByPk($list_data['tblwebmenu_id'])->tblwebmenu_nama; ?></td>
									<td><?php echo $list_data['tblwebkontent_mode']; ?></td>
									<td><?php echo $list_data['tblwebkontent_judul']; ?></td>
									<td><?php echo date('d-m-Y', strtotime($list_data['tblwebkontent_sysinsert'])); ?></td>
									<td align="center"> 
										<?php if ($list_data['tblwebkontent_file']=='' OR $list_data['tblwebkontent_file']==NULL): ?>
											<center>
												<a href="javascript:void(0);" class="btn btn-xs bg-color-red txt-color-white pull-right"  >Data Kosong</a> 
											</center>
										<?php else: ?>
											<center>
												<a target="_blank" class="btn btn-xs bg-color-blue txt-color-white pull-right" href="<?php echo Yii::app()->baseUrl; ?>/upload/kontent/<?php echo $list_data['tblwebkontent_file']; ?>" class="btn btn-xs bg-color-red txt-color-white pull-right"  >Lihat Data</a> 
											</center>
										<?php endif ?>
									</td>
									<td>
										<center>	
											<?php echo $list_data['tblwebkontent_status']=='T' ? '<a class="btn btn-xs bg-color-blue txt-color-white pull-right"> Aktif <a/>' : '<a class="btn btn-xs bg-color-red txt-color-white pull-right"> Tidak Aktif <a/>'; ?>
										</center>
									</td>
									<td align="center"><a href="javascript:void(0);" class="btn btn-circle btn-xs bg-color-green txt-color-white pull-right"  onclick="edit(<?php echo $list_data['tblwebkontent_id']; ?>)"><i class="fa fa-edit"></i></a> </td>
									<td align="center"><a href="javascript:void(0);" class="btn btn-circle btn-xs bg-color-red txt-color-white pull-right"  onclick="hapus(<?php echo $list_data['tblwebkontent_id']; ?>)"><i class="glyphicon glyphicon-trash "></i></a> </td>
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

	jQuery(document).ready(function($) {
		// run pagefunction on load
		loadScript("<?php echo ASSETS_URL; ?>/ajs/ckeditor/ckeditor.js", function(){
			CKEDITOR.replace( 'editor1', { height: '380px', startupFocus : true} );
		});
	});


	/*function myFunction() {
	    var x = document.getElementById("ada_upload").value;
	    document.getElementById("change").innerHTML = x;
	    $("#change").show();
	}*/



	loadScript("<?php echo ASSETS_URL; ?>/js/jquery.form.js",defineAjaxForm2);
	function defineAjaxForm2() {
		var options = { 
			beforeSend: function() 
			{
				$("#progress").show();
		    	//clear everything
		    	$("#bar").width('0%');

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
		    	window.file = response.responseText;
		    	simpandata ();
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


function berubah (val) {

	if (val=='KOSONG' || val=='') {
		$("#form-a").hide('fast');
	}else{
		$("#form-a").show('fast');
	}
	
}


function tambah() {
	window.cmd = "tambah";
	$("html, body").animate({ scrollTop: 800 }, "slow");
	$("#a").slideDown(300);
	$("#tblwebmenu_id").select2("val", "");
	$("#tblwebkontent_mode").select2("val", "");
	$("#tblwebkontent_sysinsert").val("");
	$("#tblwebkontent_judul").val("");
	CKEDITOR.instances['editor1'].setData('');
	$("#ada_upload").select2("val", "");
	$("#tblwebkontent_status").select2("val", "");
	$("#tblwebkontent_tampilhome").select2("val", "");
	$("#namafilekontent").val('');

}

function simpan () {
	if ($('#upload_kontent').val()=='') {
		simpandata()
	}else{
		$("#submit-file").click();
	};
}

function simpandata () {
	$.ajax({
		url: 'kontent/kontent_web/simpan',
		type: 'POST',
		data: {
			cmd: window.cmd,
			id: window.id,
			tblwebmenu_id : $("#tblwebmenu_id").select2('val'),
			tblwebkontent_mode : $("#tblwebkontent_mode").select2('val'),
			tblwebkontent_sysinsert : $("#tblwebkontent_sysinsert").val(),
			tblwebkontent_judul : $("#tblwebkontent_judul").val(),
			tblwebkontent_isi : CKEDITOR.instances['editor1'].getData(),
			ada_upload : $("#ada_upload").select2('val'),
			tblwebkontent_status : $("#tblwebkontent_status").select2('val'),
			tblwebkontent_tampilhome : $("#tblwebkontent_tampilhome").select2('val'),
			tblwebkontent_file: window.file,
}
,success: function  (respon) {

	if (respon=='success') {
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
	$("html, body").animate({ scrollTop: 800 }, "slow");
	$("#a").slideDown(300);
	
	$.ajax({
		url: 'kontent/kontent_web/GetDataKontent',
		type: 'POST',
		dataType : 'json',
		data: {id: id},
		success : function (respon) {
				window.file = respon.tblwebkontent_file;
				$('#tblwebmenu_id').select2('val', respon.tblwebmenu_id);
				$('#tblwebkontent_mode').select2('val', respon.tblwebkontent_mode);
				$('#tblwebkontent_sysinsert').val(respon.tblwebkontent_sysinsert);
				$('#tblwebkontent_judul').val(respon.tblwebkontent_judul);
				CKEDITOR.instances['editor1'].setData(respon.tblwebkontent_isi);
				$('#tblwebkontent_status').select2('val', respon.tblwebkontent_status);
				$('#tblwebkontent_tampilhome').select2('val', respon.tblwebkontent_tampilhome);
				setTimeout(function() {
					$('#ada_upload').select2('val', respon.tblwebkontent_isadafile);
					berubah (respon.tblwebkontent_isadafile);
				}, 100);
				$("#namafile").val(respon.tblwebkontent_file);
			}

	});

	$("#modalform").modal("show");
	

}


function batal () {
	$("html, body").animate({ scrollTop: 800 }, "slow");
	$("#a").slideUp(300);
}

function hapus(id) {
	window.id = id;
	window.cmd = "hapus";
	$.SmartMessageBox({
		title : "Konfirmasi",
		content : "Apakah anda yakin akan menghapus Kontent ini?",
		buttons : '[Tidak][Ya]'
	}, function(ButtonPressed) {
		if (ButtonPressed === "Ya") {
			$.ajax({
				url: 'kontent/kontent_web/HapusDataKontent',
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

$('#nama_modul').change(function() {
	var selectedCategory = $('#nama_modul option:selected').val();
	getMenuDetail(selectedCategory);
});

function ambilmenudetail () {       
	setTimeout(function () {    
		$("#menu_detail").val(window.datalist.split('||')[6]);        
	}, 500)
}


function getMenuDetail(induk) {
	$.ajax({
		type: 'POST',
		url: 'kontent/kontent_web/GetMenuDetail',
		dataType: 'html',
		data: {
			id: induk
		},
		success: function(txt){
                    //no action on success, its done in the next part
                }
            }).done(function(data){
                //get JSON
                data = $.parseJSON(data);
                //generate <options from JSON
                var list_html = '<option value="">===Pilih Menu Detail===</option>';
                if (data.length>0) {
                	$.each(data, function(i, item) {
                		list_html += '<option value='+data[i].id+'>'+data[i].nama+'</option>';
                	});
                	$('#menu_detail').html(list_html);
                }
                else {
                	$('#menu_detail').html('<option value="">===Pilih Menu Detail===</option>');
                }
                
                //replace <select2 with new options

                
            });
        }

function petunjuk (jenis) {
	if (jenis=='kategori') {
		$("#modalpetunjuk_kategori").modal("show");
	}else if(jenis=='ishome'){
		$("#modalpetunjuk_ishome").modal("show");
	};
}

function cekdatakontent(idmenu) {
	$.ajax({
		url: 'kontent/kontent_web/cekdatakontent',
		type: 'POST',
		dataType: 'json',
		data: {idmenu:idmenu},

		success: function  (respon) {
			if (respon.pesan=='ada') {
				$('#notif_menu').show('fast');
				$('#btn_simpan').attr('disabled', 'disabled');
			}else{
				$('#notif_menu').hide('fast');
				$('#btn_simpan').removeAttr('disabled');

			}
		}
	})
}
    </script>

    <div style="display:none" id="a">
    	<header>
	    	<h2>Form Kontent</h2>
	    </header>
    	<form action="" id="order-form" class="smart-form" novalidate>
    	</header>
    	<fieldset>
    		<div class="row">
    			<section class="col col-3">
    				<label > 
    					Pilih Menu							
    				</label>
    			</section>
    			<section class="col col-6">
    				<label class="select">
    					<select class="select2" name="tblwebmenu_id" id="tblwebmenu_id" onclick="cekdatakontent(this.value)">
    						<option value="">==PILIH MENU==</option>
    						<?php foreach ($data['menu'] as $combo_menu): ?>
    						<option value="<?php echo $combo_menu['tblwebmenu_id']; ?>"><?php echo $combo_menu['tblwebmenu_nama']; ?></option>
    						<?php endforeach ?>
    					</select>
    				</label>
    			</section>	
    			<section id="notif_menu" class="col col-3" style="display: none;">
    				<div style="color: #ff1141; ">	
    				<p>Maaf Menu Ini Telah Digunakan</p>		
    				</div>
    			</section>	
    		</div>

    		<div class="row">
    			<section class="col col-3">
    				<label > 
    					KATEGORI							
    				</label>
    			</section>
    			<section class="col col-6">
    				<label class="select">
    					<select class="select2" name="tblwebkontent_mode" id="tblwebkontent_mode">
    						<option value="">==PILIH KATEGORI==</option>
    						<option value="KONTENT">KONTENT</option>
    						<option value="BERITA">BERITA</option>
    						<option value="GALLERY">GALLERY</option>
    						<option value="ARTIKEL">ARTIKEL</option>
    					</select>
    				</label>
    			</section>
    			<section class="col col-2">
    				<!-- <a href="javascript:void(0);" onclick="petunjuk('kategori')" class="btn btn-primary btn-sm" rel="tooltip" data-placement="top" data-original-title="Tooltip Top"> -->
    				<!-- <a href="javascript:void(0);" class="btn btn-primary btn-sm" rel="tooltip" data-placement="top" data-original-title="Tooltip Top">
    					<i class="fa fa-lightbulb-o" ></i> Apa Maksudnya ?
    				</a> -->
    			</section>				
    		</div>
    		<div class="row" style="display:none">
    			<section class="col col-3">
    				<label > 
    					Pilih Modul							
    				</label>
    			</section>
    			<section class="col col-6">
    				<label class="select">
    					<select class="select2" name="tblwebmodul_id" id="tblwebmodul_id">
    						<option value="">==PILIH MODUL==</option>
    					</select>
    				</label>
    			</section>				
    		</div>
    		<div class="row">
    			<section class="col col-3">
    				<label > 
    					Tanggal Input							
    				</label>
    			</section>
    			<section class="col col-6">
    				<label class="input">
    					<input class="datepicker" data-dateformat="dd-mm-yy" name="tblwebkontent_sysinsert" type="text"  placeholder="Tanggal Input" id="tblwebkontent_sysinsert">
    				</label>
    			</section>				
    		</div>
    		<div class="row">
    			<section class="col col-3">
    				<label > 
    					Judul							
    				</label>
    			</section>
    			<section class="col col-6">
    				<label class="input">
    					<input name="tblwebkontent_judul" type="text"  placeholder="Judul Kontent" id="tblwebkontent_judul">
    				</label>
    			</section>				
    		</div>
    		<div class="row">
    			<section class="col col-3">
    				<label>Tampil Di Home</label>
    			</section>

    			<section class="col col-6">
    				<label class="select">
    					<select class="select2" name="tblwebkontent_tampilhome" id="tblwebkontent_tampilhome">
    						<option value="">==SILAHKAN PILIH==</option>
    						<option value="T">Tampil</option>
    						<option value="F">Tidak Tampil</option>
    					</select>
    				</label>
    			</section>
    			<section class="col col-2">
    				<!-- <a href="javascript:void(0);" onclick="petunjuk('ishome')" class="btn btn-primary btn-sm" rel="tooltip" data-placement="top" data-original-title="Tooltip Top"> -->
    				<!-- <a href="javascript:void(0);" class="btn btn-primary btn-sm" rel="tooltip" data-placement="top" data-original-title="Tooltip Top">
    					<i class="fa fa-lightbulb-o" ></i> Apa Maksudnya ?
    				</a> -->
    			</section>
    		</div>


    		<div class="row">
    			<section>
    				<textarea name="editor1" id="editor1">

    				</textarea>			
    			</section>	
    		</div>
    		<div class="row">
    			<section class="col col-3">
    				<label > 
    					Ada Upload ?										
    				</label>
    			</section>
    			<section class="col col-8">
    				<label class="select">
    					<select class="select2" name="ada_upload" id="ada_upload" onchange="berubah(this.value)">
    						<option value="">==SILAHKAN PILIH==</option>
    						<option value="KOSONG">KOSONG</option>
    						<option value="GAMBAR">GAMBAR</option>
    					</select>
    				</label>
    			</section>
    		</div>
    		<div class="row">
    			<section class="col col-3">
    				<label>Status Aktif</label>
    			</section>

    			<section class="col col-8">
    				<label class="select">
    					<select class="select2" name="tblwebkontent_status" id="tblwebkontent_status">
    						<option value="">==PILIH STATUS AKTIF==</option>
    						<option value="T">Aktif</option>
    						<option value="F">Tidak Aktif</option>
    					</select>
    				</label>
    			</section>
    		</div>
    	</fieldset>
    </form>

    <div id="form-a" style="display:none;">
    	<form method="post" enctype="multipart/form-data" class="smart-form" action="kontent/kontent_web/SimpanFileKontent" id="form-upload-temp">
    		<fieldset>
    			<section>
    				<div id="file-kontent">

    				</div>
    			</section>

    			<div class="row">
    				<section class="col col-3">
    					<label > 
    						Upload File 										
    					</label>
    				</section>
    				<section class="col col-8">
    					<label for="file" class="input input-file">
    						<div class="button">
    							<input type="file" id="upload_kontent" name="upload_kontent" onchange="this.parentNode.nextSibling.value = this.value">Browse</div><input type="text" placeholder="Upload File" readonly="" id="namafile">
    							<input type="hidden" name="namafilekontent" id="namafilekontent">
    						</label>
    					</section>
    				</div>

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
    		</div>


    		<div class="modal-footer">
    			<button type="button" class="btn btn-default" onclick="batal()">
    				Batal
    			</button>
    			<button type="button" id="btn_simpan" onclick='simpan()' class="btn btn-primary">
    				Simpan
    			</button>
    		</div>
    	</div>
<br><br>
<!-- iki modal nggo petunjuk penguinputan -->

<!-- petunjuk nggo form Tampil Di Home -->
<div class="modal fade" id="modalpetunjuk_ishome" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					&times;
				</button>
				<h4 class="modal-title" id="myModalLabel">Petunjuk</h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<section class="col col-12">
						<center>Digunakan untuk menentukan apakah kontent akan tampil di menu home (bagian awal halaman depan), tampilan maksimal hanya 4 kontent</center>
						<br />
						<img  style="width:100%; padding:10px; border-radius:10px;" ><br />
						<center>Contoh Gambar </center>
					</section>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- petunjuk nggo form KATEGORI -->
<div class="modal fade" id="modalpetunjuk_kategori" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					&times;
				</button>
				<h4 class="modal-title" id="myModalLabel">Petunjuk</h4>
			</div>
			<div class="modal-body" style="height:500px !important; overflow-y:auto;">
			
				<center><img  style="max-width:100%; max-height:300px; padding:10px; border-radius:10px;" ></center><br />
				<center>
					<b>Kategori "KONTENT" digunakan untuk menambahkan kontent di menu yang berisi hanya satu kontent, contohnya Visi dan Misi, Tupoksi</b> 
				</center><br />
				<center><img  style="max-width:100%; max-height:300px; padding:10px; border-radius:10px;" ></center><br />
				<center>
					<b>Kategori "BERITA" digunakan untuk menambahkan kontent di menu berita,</b> 
				</center><br />
				<img  style="max-width:100%; max-height:300px; padding:10px; border-radius:10px;" ><br />
				<center>
					<b>Kategori "KULINER" digunakan untuk menambahkan kontent kuliner yang nantinya akan tampil di halaman depan (Home),</b> 
				</center><br />
				<center><img  style="max-width:100%; max-height:300px; padding:10px; border-radius:10px;" ></center><br />
				<center>
					<b>Kategori "KULINER" digunakan untuk menambahkan kontent artikel yang nantinya akan tampil di halaman depan (Home),</b> 
				</center><br />
				<center><img  style="max-width:100%; max-height:300px; padding:10px; border-radius:10px;" ></center><br />
				<center>
					<b>Kategori "SAMBUTAN" digunakan untuk menambahkan kontent sambutan, dan hanya boleh satu kontent sambutan</b> 
				</center><br />

			</div>
		</div>
	</div>
</div>