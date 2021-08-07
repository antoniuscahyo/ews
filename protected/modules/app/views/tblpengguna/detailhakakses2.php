<div class="row">
		<article class="col-xs-12 col-sm-12 col-sm-12 col-lg-12">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			    	<div class="alert alert-success">
					<i class="fa fa-gear"></i> 
					Setting Hak Akses Group <b><?php echo $judul['tblrole_code']; ?></b>
			        </div>
				</div>
			</div>
		</article>
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
						<h2>Form Setting Hak Akses Group <b><?php echo $judul['tblrole_code']; ?></b>
						</h2>

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
								<button type="button" onclick='simpan()' class='btn btn-labeled btn-primary btn-sm'>
								<span class='btn-label'>
									<i class='fa fa-save'></i></span>Simpan</button>&nbsp; &nbsp;
									<font id="pesan" style="font-size: 14px;">Menyimpan ... Silakan tunggu sampai selesai</font>
								<div class="pull-right">

									<button class="btn btn-success" onclick="checkall()">
										<i class="fa fa-check-square-o"></i> Pilih Semua
									</button>

									<button class="btn btn-danger" onclick="uncheckall()">
										<i class="fa fa-external-link"></i> Batal Pilih Semua
									</button>

								</div>
							</div>
							
							<table class="table table-striped table-bordered table-hover">
								
								<thead>
									<tr>
										<th>Form</th>
										<th>Show</th>
										
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
														
														<input <?php if ($datatbl['tblroleprivilege_isshow']=="T") {echo 'checked="checked"';} ?> id="<?php echo $datatbl['tblroleprivilege_id']; ?>" type="checkbox" name="checkdata" class="checkdata">
														<i data-swchon-text="Ya" data-swchoff-text="Tidak"></i>
														<input type="hidden" name="iddata" id="iddata" value="<?php echo $datatbl['tblrole_id']; ?>">

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
	$(function () {
		$("#pesan").fadeOut(0);
	});
	function notifikasi(title, msg, type) {
		if (type=='success') {
			var warna = '#296191';
			var icon = 'fa-save';
		} else {
			var warna = '#B61F1F;';
			var icon = 'fa-warning';
		}
		$.smallBox({
			title : title,
			content : "<i class='fa fa-clock-o'></i><i>"+msg+"</i>",
			color : warna, // warna background
			iconSmall : "fa "+ icon +" bounce animated", // dengan animasi bounce
			timeout : 4000 // lama alert ditampilkan
		});
	}

	function simpan () {

		$("#pesan").fadeIn('slow', function() {
			
		});


		var datain = $(":checkbox.checkdata").map(function(){
			return [{"id":$(this).attr('id'),"prop":$(this).prop('checked') ? "T":"F"}];
		});

		var options = {};

		for (var i=0; i < datain.length; i++){
			var key = datain[i].id;
			var val = datain[i].prop;
			options[key] = val;
		}

		var kirim=JSON.stringify(options);

        $.ajax({
        	url: 'app/tblpengguna/simpan',
        	type: 'post',
        	data: {
        		datacheck: kirim,
        		idgrup: $("#iddata").val()
        	},
        	success: function(data) {
        		$("#pesan").fadeOut('slow', function() {
			
				});
        		notifikasi('Sukses','Data Berhasil Disimpan', 'success');

        	}
        });
 
	}

	function checkall () {
		$(":checkbox.checkdata").prop("checked", true);
	}

	function uncheckall () {
		$(":checkbox.checkdata").prop('checked', false)
	}
</script>

