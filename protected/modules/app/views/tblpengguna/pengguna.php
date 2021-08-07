<?php define('ASSETS_URL',$data['theme_baseurl']); ?>
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    	<div class="well well-sm well-light">
		<h1 align="center" class="page-title txt-color-blueDark"><i class="fa fa-user"></i> 
		Pada submenu ini dipergunakan untuk melakukan pengaturan grup pengguna website</h1>
        </div>
	</div>
</div>


<div class="row">
<div class="col-sm-12 col-md-12 col-lg-12">
<div class="well">
			<div class="jarviswidget jarviswidget-color-greenDark" id="wid-id-4" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-deletebutton="false" data-widget-togglebutton="false" data-widget-fullscreenbutton="false">
				<header>
					<span class="widget-icon"> <i class="fa fa-table"></i> </span>
					<h2>Setting Pengguna</h2>

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
						</div>					
						
						<table id="dt_basic" class="table table-striped table-bordered table-hover" width="100%">
							<thead>
								<tr>
									<th data-hide="phone">No</th>
									<th data-class="expand">Nama Pengguna </th>
									<th data-hide="phone">Username</th>
									<th data-hide="phone">Group</th>
									<th data-hide="phone,tablet">Email</th>
									<th data-hide="phone,tablet">No. Telepon</th>
									<th data-hide="phone,tablet">Status</th>
									<th ></th>
								</tr>
							</thead>
							<tbody>
							<?php $no=1; $status=""; foreach ($datapengguna as $pengguna): ?>
								<tr>
								
									<td><?php echo $no++; ?></td>
									<td><?php echo $pengguna['nama']; ?></td>
									<td><?php echo $pengguna['username']; ?></td>
									<td><?php echo $pengguna['kode']; ?></td>
									<td><?php echo $pengguna['email']; ?></td>
									<td><?php echo $pengguna['notelp']; ?></td>
									<td><?php if($pengguna['status']== "T") {$status="Aktif";} else {$status ="Tidak Aktif";} ?>
									<?php echo $status; ?>
									</td>
									<td>
									<a class="btn btn-default btn-sm" rel="popover" data-placement="left" data-content="
											<div class='row'>
												<div class='col-md-12'>
													<div class='well'>
														<button onclick='edit(<?php echo $pengguna["pengguna_id"]; ?>)' class='btn btn-labeled btn-success btn-sm'><span class='btn-label'>
														<i class='fa fa-pencil'></i></span>Edit</button>
														<button onclick='hapus(<?php echo $pengguna["pengguna_id"]; ?>)' class='btn btn-labeled btn-danger btn-sm'><span class='btn-label'>
														<i class='fa fa-trash-o'></i></span>Hapus</button>                                                            
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
<div class="modal fade" id="pengguna-form" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					&times;
				</button>
				<h4 class="modal-title">
					Form Pengguna<div id="tbljadwalsurvey_id"></div>
				</h4>
			</div>
			<div class="modal-body no-padding">

				<form class="smart-form">

					<fieldset>
						

						<section>
							<div class="row">
								<label class="label col col-4">Nama</label>
								<div class="col col-10">
									<label class="input"> <i class="icon-append fa fa-user"></i>
										<input value="" type="text" name="nama" id="nama">
									</label>

								</div>
							</div>
						</section>

						<section>
							<div class="row">
								<label class="label col col-4">Username</label>
								<div class="col col-10">
									<label class="input"> <i class="icon-append fa fa-user"></i>
										<input value="" type="text" name="uname" id="uname">
									</label>

								</div>
							</div>
						</section>

						<section>
							<div class="row">
								<label class="label col col-4">Password</label>
								<div class="col col-10">
									<label class="input"> <i class="icon-append fa fa-qrcode"></i>
										<input value="" type="password" name="password" id="password">
									</label>

								</div>
							</div>
						</section>

						<section>
							<div class="row">
								<label class="label col col-4">Input Ulang Password</label>
								<div class="col col-10">
									<label class="input"> <i class="icon-append fa fa-qrcode"></i>
										<input value="" type="password" name="rpassword" id="rpassword">
									</label>

								</div>
							</div>
						</section>

						<section>
							<div class="row">
								<label class="label col col-4">Email</label>
								<div class="col col-10">
									<label class="input"> <i class="icon-append fa fa-user"></i>
										<input value="" type="email" name="email" id="email">
									</label>

								</div>
							</div>
						</section>

						<section>
							<div class="row">
								<label class="label col col-4">Nomor Telepone</label>
								<div class="col col-10">
									<label class="input"> <i class="icon-append fa fa-phone"></i>
										<input type="text" name="phone" id="phone" class="valid">
									</label>

								</div>
							</div>
						</section>

						<section>
							<div class="row">
								<label class="label col col-4">Group</label>
								<div class="col col-10">
									<label class="select"> <i class="icon-append fa fa-user"></i>
										<select name="hakakses" id="hakakses">
											<option value="">Pilih Group</option>
											<?php foreach ($hakakseslist as $hakakses): ?>
											<option value="<?php echo $hakakses['id']; ?>"><?php echo $hakakses['code']; ?></option>
											<?php endforeach; ?>
										</select>
									</label>

								</div>
							</div>
						</section>

						<section>
							<div class="row">
								<label class="label col col-4">Status</label>
								<div class="col col-10">
									<label class="select"> <i class="icon-append fa fa-user"></i>
										<select name="status" id="status">
											<option value="">Pilih Status</option>
											<option value="T">Aktif</option>
											<option value="F">Tidak Aktif</option>
										
										</select>
									</label>

								</div>
							</div>
						</section>
					
					</fieldset>

					<input type="hidden" name="cmd" id="cmd" value="">
					<input type="hidden" name="id" id="id" value="">

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
				desktop:1280,
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

function tambah () {
	$("#cmd").val("tambah");
	$("#nama").val("");
	$("#uname").val("");
	$("#hakakses").val("");
	$("#status").val("");
	$("#email").val("");
	$("#phone").val("");
	$("#password").val("");
	$("#rpassword").val("");
	$("#pengguna-form").modal("show");

}

function edit (id) {
	$("#cmd").val("edit");
	$.ajax({
		url: 'app/tblpengguna/getdatapengguna',
		type: 'post',
		data: {
			id: id,
		},
		success:function(data) {
			$("#id").val(data.split("||")[0]);
 			$("#nama").val(data.split("||")[1]);
			$("#uname").val(data.split("||")[2]);
			$("#hakakses").val(data.split("||")[6]);
			$("#email").val(data.split("||")[3]),
			$("#phone").val(data.split("||")[12]),
			$("#status").val(data.split("||")[8]);
			$("#password").val("");
			$("#rpassword").val("");
		}
	});
					
	$("#pengguna-form").modal("show");
}

function simpan () {
	if ($("#cmd").val()=="edit") {

		$.ajax({
			url: 'app/tblpengguna/simpanpengguna',
			type: 'post',
			data: {
				cmd: $("#cmd").val(),
				id: $("#id").val(),
				nama: $("#nama").val(),
				uname: $("#uname").val(),
				pass: $("#password").val(),
				hakakses: $("#hakakses").val(),
				email: $("#email").val(),
				phone: $("#phone").val(),
				status: $("#status").val()
			},
			success: function(data) {
				if (data=="success") {
					$("#pengguna-form").modal("hide");
					notifikasi('Sukses','Data Berhasil Disimpan', 'success');	
				}
				else {
					notifikasi('Gagal','Data Gagal Disimpan', 'fail');
				}
			}
		}); 
	}

	else { //selain adalah fungsi tambah
		if ($("#password").val() == $("#rpassword").val() && $("#password").val() != "") {
		$.ajax({
			url: 'app/tblpengguna/simpanpengguna',
			type: 'post',
			data: {
				cmd: $("#cmd").val(),
				nama: $("#nama").val(),
				uname: $("#uname").val(),
				pass: $("#password").val(),
				hakakses: $("#hakakses").val(),
				email: $("#email").val(),
				phone: $("#phone").val(),
				status: $("#status").val()
			},

			success: function(data) {
				if (data=="success") {
					$("#pengguna-form").modal("hide");
					notifikasi('Sukses','Data Berhasil Disimpan', 'success');
				}
				else {
					notifikasi('Gagal','Data Gagal Disimpan', 'fail');
				}
			}
		}); 
		}

		else {
			//alert("Password yang anda masukan tidak cocok atau Password Belum diisi, Silakan periksa kembali");
			$.SmartMessageBox({
					title : "Terjadi Kesalahan", // judul Smart Alert
					content : "Isian ada yang kosong atau Password yang anda masukan tidak cocok, Silakan periksa kembali", // konten dari smart alert
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
				content : "Apakah anda yakin akan menghapus data Pengguna ini", // konten dari smart alert
				buttons : '[Tidak][Ya]' // pengaturan tombol
			}, function(ButtonPressed) {
				if (ButtonPressed === "Ya") {
					$.ajax({
						url: 'app/tblpengguna/hapusdatapengguna',
						type: 'post',
						data: {
							id: id,
						},
						success: function (data) {
								if(data=='success') {
									notifikasi('Sukses','Data Berhasil Disimpan', 'success');
									//window.location.reload();
								} else {
									notifikasi('Gagal','Data Gagal Disimpan', 'fail');
								}
						}
					});

				}
				if (ButtonPressed === "Tidak") {
					
				}

			});
			e.preventDefault();
}

function notifikasi(title, msg, type) {
	if (type=='success') {
		var warna = '#296191';
		var icon = 'fa-save';
		var isrefresh = "<p class='text-align-right'><a onclick='refresh()' class='btn bg-color-orange txt-color-white btn-sm'>Klik Untuk Merefresh Halaman</a></p>";
	} else {
		var warna = '#B61F1F;';
		var icon = 'fa-warning';
		var isrefresh = "";
	}
	$.smallBox({
		title : title,
			//content : "<i class='fa fa-clock-o'></i><i>"+msg+"</i>",
			content : msg+isrefresh,
			color : warna, // warna background
			icon : "fa "+icon+" swing animated",
			//iconSmall : "fa "+ icon +" bounce animated", // dengan animasi bounce
			timeout : 4000 // lama alert ditampilkan
		});
	}

function refresh () {
	window.location.reload();
}
	
</script>