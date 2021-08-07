<div class="row">
	<div id="edit-form">
		<article class="col-xs-12 col-sm-12 col-sm-12 col-lg-12">

				<!-- Widget ID (each widget will need unique ID)-->
				<div class="jarviswidget jarviswidget-color-greenDark" id="wid-id-1" data-widget-fullscreenbutton="false" data-widget-deletebutton="false" data-widget-editbutton="false">
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
							
							<table class="table table-striped table-bordered table-hover">
								
								<thead>
									<tr>
										<th>Form</th>
										<th>Show</th>
										<th>Create</th>
										<th>Update</th>
										<th>Delete</th>
										<th>Search</th>
										<th>Print</th>
									</tr>
								</thead>
								<tbody>
								<?php foreach ($datatblakses as $datatbl): ?>
									<tr>
										<td><?php echo $datatbl['tblmenu_title']; ?></td>
										<td>
											<form action="" class="smart-form">
												<div align="center">									
													<label class="toggle" style="left:-40px;">
														
														<input <?php if ($datatbl['tblroleprivilege_isshow']=="T") {echo 'checked="checked"';} ?> id="<?php echo $datatbl['tblroleprivilege_id']; ?>-show" type="checkbox" name="checkbox-toggle">
														<i data-swchon-text="Ya" data-swchoff-text="Tidak"></i>
													
													</label>
													
												</div>
											</form>
										</td>
										<td>
										<form action="" class="smart-form">
												<div align="center">									
													<label class="toggle" style="left:-40px;">									
														<input <?php if ($datatbl['tblroleprivilege_iscreate']=="T") {echo 'checked="checked"';} ?> id="<?php echo $datatbl['tblroleprivilege_id']; ?>-create" type="checkbox" name="checkbox-toggle">
														<i data-swchon-text="Ya" data-swchoff-text="Tidak"></i>
													</label>
													
												</div>
											</form>
										</td>
										<td>
											<form action="" class="smart-form">
												<div align="center">									
													<label class="toggle" style="left:-40px;">									
														<input <?php if ($datatbl['tblroleprivilege_isupdate']=="T") {echo 'checked="checked"';} ?> id="<?php echo $datatbl['tblroleprivilege_id']; ?>-update" type="checkbox" name="checkbox-toggle">
														<i data-swchon-text="Ya" data-swchoff-text="Tidak"></i>
													</label>
													
												</div>
											</form>
										</td>
										<td>
											<form action="" class="smart-form">
												<div align="center">									
													<label class="toggle" style="left:-40px;">									
														<input <?php if ($datatbl['tblroleprivilege_isdelete']=="T") {echo 'checked="checked"';} ?> id="<?php echo $datatbl['tblroleprivilege_id']; ?>-delete" type="checkbox" name="checkbox-toggle">
														<i data-swchon-text="Ya" data-swchoff-text="Tidak"></i>
													</label>
													
												</div>
											</form>
										</td>
										<td>
											<form action="" class="smart-form">
												<div align="center">									
													<label class="toggle" style="left:-40px;">									
														<input <?php if ($datatbl['tblroleprivilege_issearch']=="T") {echo 'checked="checked"';} ?> id="<?php echo $datatbl['tblroleprivilege_id']; ?>-search" type="checkbox" name="checkbox-toggle">
														<i data-swchon-text="Ya" data-swchoff-text="Tidak"></i>
													</label>
													
												</div>
											</form>
										</td>
										<td align="center">
											<form action="" class="smart-form">
												<div align="center">									
													<label class="toggle" style="left:-40px;">									
														<input <?php if ($datatbl['tblroleprivilege_isprint']=="T") {echo 'checked="checked"';} ?> id="<?php echo $datatbl['tblroleprivilege_id']; ?>-print" type="checkbox" name="checkbox-toggle">
														<i data-swchon-text="Ya" data-swchoff-text="Tidak"></i>
													</label>
													
												</div>
											</form>
										</td>
									</tr>
									<?php endforeach; ?>

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
</div>

<script type="text/javascript">
	function simpan () {
		
	}
</script>

