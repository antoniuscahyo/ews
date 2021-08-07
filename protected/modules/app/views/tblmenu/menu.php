<?php define('ASSETS_URL',$data['theme_baseurl']); ?>
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    	<div class="well well-sm well-light">
		<h1 align="center" class="page-title txt-color-blueDark"><i class="fa fa-list"></i> 
		Pada submenu setting menu ini, administrator dapat melakukan pengaturan menu, yaitu mengedit pengaturan menu pada aplikasi</h1>
        </div>
	</div>
</div>


<div class="row">
<div class="col-sm-12 col-md-12 col-lg-12">
<div class="well">
			<div class="jarviswidget jarviswidget-color-blueDark" id="wid-id-4" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-deletebutton="false" data-widget-togglebutton="false" data-widget-fullscreenbutton="false">
				<header>
					<span class="widget-icon"> <i class="fa fa-table"></i> </span>
					<h2>Setting Menu</h2>

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
						
					<!-- <div class="widget-body-toolbar">
					</div> -->
						
						<table width="100%" id="datatable_tabletools" class="table table-striped table-bordered table-hover">
							<thead>
								<tr>
									<th data-hide="phone">No</th>
									<th data-class="expand">Nama Menu </th>
									<th data-hide="phone,tablet">Menu Dari</th>
									<th data-hide="phone">Link</th>
									<th data-hide="phone,tablet">Icon</th>
									<th>&nbsp;</th>
									
								</tr>
							</thead>
							<tbody>
							<?php $no=1; $status=""; foreach ($datamenu as $menu): ?>
								<tr>
								
									<td><?php echo $no++; ?></td>
									<td><?php echo $menu['title']; ?></td>
									<td><?php echo $menu['parent']; ?></td>
									<td><?php echo $menu['link']; ?></td>
									<td><?php echo $menu['icon']; ?></td>
									
									<td>
									<a class="btn btn-default btn-sm" rel="popover" data-placement="left" data-content="
											<div class='row'>
												<div class='col-lg-12'>
													<div class='well'>
													<?php if ($menu["link"] != "#") : ?>

															<button style='margin-bottom: 5px;' class='btn btn-primary btn-block' onclick='tambah(<?php echo $menu["id"]; ?>)'>
																<i class='fa fa-plus-square'></i>	Tambah
															</button>

														<button onclick='edit(<?php echo $menu["id"]; ?>)' class='btn btn-labeled btn-success btn-sm'><span class='btn-label'>
														<i class='fa fa-pencil'></i></span>Edit</button>

														<button onclick='hapus(<?php echo $menu["id"]; ?>)' class='btn btn-labeled btn-danger btn-sm'><span class='btn-label'>
														<i class='fa fa-trash-o'></i></span>Hapus</button>
														
													<?php else: ?>
														
														<button onclick='tambah(<?php echo $menu["id"]; ?>)' class='btn btn-primary'><i class='fa fa-plus-square'></i> 
														Tambah
														</button>
														

														 <button onclick='edit(<?php echo $menu["id"]; ?>)' class='btn btn-labeled btn-success btn-sm'><span class='btn-label'>
														<i class='fa fa-pencil'></i></span>Edit</button>

													<?php endif; ?>                                                          
													</div>
												</div>
											</div>"
										data-html="true"><i class="fa fa-gear"></i></a>
									</td>
								
								</tr>
								<?php endforeach; ?>
							</tbody>
						</table>

			      </div>
					<!-- end widget content -->

				</div>
				<!-- end widget div -->
	</div>
	</div>
	</div>
</div>
<!-- Modal -->
<div class="modal fade" id="menu-form" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					&times;
				</button>
				<h4 class="modal-title">
					Form Menu<div id="tbljadwalsurvey_id"></div>
				</h4>
			</div>
			<div class="modal-body no-padding">

				<form class="smart-form">

					<fieldset>
						

						<section>
							<div class="row">
								<label class="label col col-4">Judul Menu</label>
								<div class="col col-10">
									<label class="input"> <i class="icon-append fa fa-align-justify"></i>
										<input value="" type="text" name="judul" id="judul">
									</label>

								</div>
							</div>
						</section>

						<section>
							<div class="row">
								<label class="label col col-4">Link</label>
								<div class="col col-10">
									<label class="input"> <i class="icon-append fa fa-link"></i>
										<input value="" type="text" name="link" id="link">
									</label>

								</div>
							</div>
						</section>

						<section>
							<div class="row">
								<label class="label col col-4">Icon</label>
								<div class="col col-10">
									<label class="input"> <i class="icon-append fa fa-picture-o"></i>
										<input value="" type="text" name="icon" id="icon">
									</label>

								</div>
							</div>
						</section>
					
					</fieldset>

					<input type="hidden" name="cmd" id="cmd" value="">
					<input type="hidden" name="id" id="id" value="">
					<input type="hidden" name="parent" id="parent" value="">

					<footer>
						<button onclick="return simpan()" class="btn btn-primary">
							Simpan
						</button>
						<button type="button" class="btn btn-default" data-dismiss="modal">
							Batal
						</button>

					</footer>
									
					

			</div></form>

		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<script type="text/javascript">
// DO NOT REMOVE : GLOBAL FUNCTIONS!
pageSetUp();

// PAGE RELATED SCRIPTS

// menu
$("#menu").menu();


/*datatable collapsible*/
// pagefunction	
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
			"sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6'f><'col-sm-6 col-xs-6 hidden-xs'>r>"+
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
	            "sSwfPath": "http://192.168.0.7/diklat/nur/perizinan/ajs/datatables/swf/copy_csv_xls_pdf.swf"
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
/*//datatable collapsible*/


function tambah (parent) {
	$("#cmd").val("tambah");
	$("#judul").val("");
	$("#link").val("");
	$("#icon").val("");
	$("#menu-form").modal("show");
	$("#parent").val(parent);

}

function edit (id) {
	$("#cmd").val("edit");
	$.ajax({
		url: 'app/tblmenu/getmenu',
		type: 'post',
		data: {
			id: id,
		},
		success:function(data) {
			$("#id").val(data.split("||")[0]);
 			$("#judul").val(data.split("||")[3]);
			$("#link").val(data.split("||")[5]);
			$("#icon").val(data.split("||")[4]);
		}
	});
					
	$("#menu-form").modal("show");
}

function simpan () {
	if ($("#cmd").val()=="edit") {

		$.ajax({
			url: 'app/tblmenu/simpanmenu',
			type: 'post',
			data: {
				cmd: $("#cmd").val(),
				id: $("#id").val(),
				judul: $("#judul").val(),
				link: $("#link").val(),
				icon: $("#icon").val(),
			},
			success: function(data) {
				if (data=="success") {
					$("#menu-form").modal("hide");
					$.smallBox({
						title : "Data Menu berhasil disimpan",
						content : "Data Menu berhasil disimpan, silakan refresh halaman <p class='text-align-right'><a onclick='refresh()' class='btn bg-color-orange txt-color-white btn-sm'>Klik Untuk Merefresh Halaman</a></p>",
						color : "#296191",
						//timeout: 8000,
						icon : "fa fa-save swing animated"
					});
				}
				else {
					alert("Data gagal Disimpan");
				}
			}
		}); 
	}

	else { //selain adalah fungsi tambah
		if ($("#judul").val() !="" && $("#link").val() != "" && $("#icon").val() !="") {
		$.ajax({
			url: 'app/tblmenu/simpanmenu',
			type: 'post',
			data: {
				cmd: $("#cmd").val(),
				judul: $("#judul").val(),
				link: $("#link").val(),
				icon: $("#icon").val(),
				parent: $("#parent").val()
			},

			success: function(data) {
				if (data=="success") {
					$("#menu-form").modal("hide");
					$.smallBox({
						title : "Data Menu berhasil disimpan",
						content : "Data Menu berhasil disimpan, silakan refresh halaman <p class='text-align-right'><a onclick='refresh()' class='btn bg-color-orange txt-color-white btn-sm'>Klik Untuk Merefresh Halaman</a></p>",
						color : "#296191",
						//timeout: 8000,
						icon : "fa fa-save swing animated"
					});
				}
				else {
					alert("Data gagal Disimpan");
				}
			}
		}); 
		}

		else {
			//alert("Password yang anda masukan tidak cocok atau Password Belum diisi, Silakan periksa kembali");
			$.SmartMessageBox({
					title : "Terjadi Kesalahan", // judul Smart Alert
					content : "Ada field yang belum terisi, Silakan periksa isian kembali", // konten dari smart alert
					buttons : '[Ok]' // pengaturan tombol
				}, function(ButtonPressed) {
					if (ButtonPressed === "Ok") {
						
					}
				});
		}
	}

	return false;
}

function hapus (id) {
	$.SmartMessageBox({
				title : "Konfirmasi Hapus", // judul Smart Alert
				content : "Apakah anda yakin akan menghapus data Menu ini", // konten dari smart alert
				buttons : '[Tidak][Ya]' // pengaturan tombol
			}, function(ButtonPressed) {
				if (ButtonPressed === "Ya") {
					$.ajax({
						url: 'app/tblmenu/hapusmenu',
						type: 'post',
						data: {
							id: id,
						},
						success: function (data) {
							if (data=="success") {
								$("#menu-form").modal("hide");
								$.smallBox({
									title : "Data Menu berhasil Dihapus",
									content : "Data Menu berhasil Dihapus, silakan refresh halaman <p class='text-align-right'><a onclick='refresh()' class='btn bg-color-orange txt-color-white btn-sm'>Klik Untuk Merefresh Halaman</a></p>",
									color : "#296191",
									//timeout: 8000,
									icon : "fa fa-save swing animated"
								});
							}
						}
					});

				}
				if (ButtonPressed === "Tidak") {
					
				}

			});
			e.preventDefault();
}

function refresh () {
	window.location.reload();
}
	
</script>