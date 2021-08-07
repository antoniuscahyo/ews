<?php define('ASSETS_URL',$data['theme_baseurl']); ?>
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    	<div class="well well-sm well-light">
		<h1 align="center" class="page-title txt-color-blueDark"><i class="fa fa-asterisk"></i> 
		Setting Previlage</h1>
        </div>
	</div>

<section id="widget-grid" class="">

	<!-- row -->
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<!-- NEW WIDGET START -->
		<article class="col-xs-12 col-sm-12 col-sm-12 col-lg-12">

			<!-- Widget ID (each widget will need unique ID)-->
			<div class="jarviswidget jarviswidget-color-darken" id="wid-id-1" data-widget-fullscreenbutton="false" data-widget-deletebutton="false" data-widget-editbutton="false">
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
					<h2>Setting Hak Akses Group</h2>

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

						</div>
						
						<table id="dt_basic" class="table table-striped table-bordered table-hover">
							
							<thead>
								<tr>
									<th>Admin</th>
									<th>Show</th>
									<th>Create</th>
									<th>Update</th>
									<th>Delete</th>
									<th>Search</th>
									<th>Print</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>Form Hasil Survey</td>
									<td>
									<form action="" class="smart-form">
									<div align="center">									
										<label class="toggle" style="left:-40px;">									
											<input type="checkbox" name="checkbox-toggle" checked="checked">
											<i data-swchon-text="ON" data-swchoff-text="OFF"></i>
										</label>
										
									</div></form></td>
									<td>
									<div align="center">									
											<input type="checkbox" name="checkbox-toggle" checked="checked" align="center">									
									</div></td>
									<td><div align="center">									
											<input type="checkbox" name="checkbox-toggle" checked="checked" align="center">									
									</div></td>
									<td><div align="center">									
											<input type="checkbox" name="checkbox-toggle" checked="checked" align="center">									
									</div></td>
									<td><div align="center">									
											<input type="checkbox" name="checkbox-toggle" checked="checked" align="center">									
									</div></td>
									<td><div align="center">									
											<input type="checkbox" name="checkbox-toggle" checked="checked" align="center">									
									</div></td>
								</tr>
								<tr>
									<td>Form SP 1</td>
									<td><div align="center">									
											<input type="checkbox" name="checkbox-toggle" checked="checked" align="center">									
									</div></td>
									<td><div align="center">									
											<input type="checkbox" name="checkbox-toggle" checked="checked" align="center">									
									</div></td>
									<td><div align="center">									
											<input type="checkbox" name="checkbox-toggle" checked="checked" align="center">									
									</div></td>
									<td><div align="center">									
											<input type="checkbox" name="checkbox-toggle" checked="checked" align="center">									
									</div></td>
									<td><div align="center">									
											<input type="checkbox" name="checkbox-toggle" checked="checked" align="center">									
									</div></td>
									<td><div align="center">									
											<input type="checkbox" name="checkbox-toggle" checked="checked" align="center">									
									</div></td>
								</tr>
								<tr>
									<td>Form SP 2</td>
									<td><div align="center">									
											<input type="checkbox" name="checkbox-toggle" checked="checked" align="center">									
									</div></td>
									<td><div align="center">									
											<input type="checkbox" name="checkbox-toggle" checked="checked" align="center">									
									</div></td>
									<td><div align="center">									
											<input type="checkbox" name="checkbox-toggle" checked="checked" align="center">									
									</div></td>
									<td><div align="center">									
											<input type="checkbox" name="checkbox-toggle" checked="checked" align="center">									
									</div></td>
									<td><div align="center">									
											<input type="checkbox" name="checkbox-toggle" checked="checked" align="center">									
									</div></td>
									<td><div align="center">									
											<input type="checkbox" name="checkbox-toggle" checked="checked" align="center">									
									</div></td>
								</tr>

								</tbody>
								
						</table>
						</label>
					</div>
					<!-- end widget content -->

				</div>
				<!-- end widget div -->

			</div>
		</article>
	</div>
</section>

<script type="text/javascript">

	// DO NOT REMOVE : GLOBAL FUNCTIONS!
	pageSetUp();
	
	// PAGE RELATED SCRIPTS

	/* remove previous elems */
	
	if($('.DTTT_dropdown.dropdown-menu').length){
		$('.DTTT_dropdown.dropdown-menu').remove();
	}

	loadDataTableScripts();
	function loadDataTableScripts() {

		loadScript("<?php echo ASSETS_URL; ?>/js/plugin/datatables/jquery.dataTables-cust.min.js", dt_2);

		function dt_2() {
			loadScript("<?php echo ASSETS_URL; ?>/js/plugin/datatables/ColReorder.min.js", dt_3);
		}

		function dt_3() {
			loadScript("<?php echo ASSETS_URL; ?>/js/plugin/datatables/FixedColumns.min.js", dt_4);
		}

		function dt_4() {
			loadScript("<?php echo ASSETS_URL; ?>/js/plugin/datatables/ColVis.min.js", dt_5);
		}

		function dt_5() {
			loadScript("<?php echo ASSETS_URL; ?>/js/plugin/datatables/ZeroClipboard.js", dt_6);
		}

		function dt_6() {
			loadScript("<?php echo ASSETS_URL; ?>/js/plugin/datatables/media/js/TableTools.min.js", dt_7);
		}

		function dt_7() {
			loadScript("<?php echo ASSETS_URL; ?>/js/plugin/datatables/DT_bootstrap.js", runDataTables);
		}

	}

	function runDataTables() {

		/*
		 * BASIC
		 */
		$('#dt_basic').dataTable({
			"sPaginationType" : "bootstrap_full"
		});

		/* END BASIC */

		/* Add the events etc before DataTables hides a column */
		$("#datatable_fixed_column thead input").keyup(function() {
			oTable.fnFilter(this.value, oTable.oApi._fnVisibleToColumnIndex(oTable.fnSettings(), $("thead input").index(this)));
		});

		$("#datatable_fixed_column thead input").each(function(i) {
			this.initVal = this.value;
		});
		$("#datatable_fixed_column thead input").focus(function() {
			if (this.className == "search_init") {
				this.className = "";
				this.value = "";
			}
		});
		$("#datatable_fixed_column thead input").blur(function(i) {
			if (this.value == "") {
				this.className = "search_init";
				this.value = this.initVal;
			}
		});		
		

		var oTable = $('#datatable_fixed_column').dataTable({
			"sDom" : "<'dt-top-row'><'dt-wrapper't><'dt-row dt-bottom-row'<'row'<'col-sm-6'i><'col-sm-6 text-right'p>>",
			//"sDom" : "t<'row dt-wrapper'<'col-sm-6'i><'dt-row dt-bottom-row'<'row'<'col-sm-6'i><'col-sm-6 text-right'>>",
			"oLanguage" : {
				"sSearch" : "Search all columns:"
			},
			"bSortCellsTop" : true
		});		
		


		/*
		 * COL ORDER
		 */
		$('#datatable_col_reorder').dataTable({
			"sPaginationType" : "bootstrap",
			"sDom" : "R<'dt-top-row'Clf>r<'dt-wrapper't><'dt-row dt-bottom-row'<'row'<'col-sm-6'i><'col-sm-6 text-right'p>>",
			"fnInitComplete" : function(oSettings, json) {
				$('.ColVis_Button').addClass('btn btn-default btn-sm').html('Columns <i class="icon-arrow-down"></i>');
			}
		});
		
		/* END COL ORDER */

		/* TABLE TOOLS */
		$('#datatable_tabletools').dataTable({
			"sDom" : "<'dt-top-row'Tlf>r<'dt-wrapper't><'dt-row dt-bottom-row'<'row'<'col-sm-6'i><'col-sm-6 text-right'p>>",
			"oTableTools" : {
				"aButtons" : ["copy", "print", {
					"sExtends" : "collection",
					"sButtonText" : 'Save <span class="caret" />',
					"aButtons" : ["csv", "xls", "pdf"]
				}],
				"sSwfPath" : "<?php echo ASSETS_URL; ?>/js/plugin/datatables/media/swf/copy_csv_xls_pdf.swf"
			},
			"fnInitComplete" : function(oSettings, json) {
				$(this).closest('#dt_table_tools_wrapper').find('.DTTT.btn-group').addClass('table_tools_group').children('a.btn').each(function() {
					$(this).addClass('btn-sm btn-default');
				});
			}
		});
		
		/* END TABLE TOOLS */

	}

</script>