<div class="row">
	<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="jarviswidget jarviswidget-color-red" id="wid-id-data_aduanmasuk" data-widget-editbutton="false" data-widget-deletebutton="false" data-widget-fullscreenbutton="false">
			<header style="border-radius: 5px 5px 0px 0px;">
				<span class="widget-icon"> <i class="fa fa-table"></i> </span>
				<h2>Data Aduan</h2>
			</header>
			<div>
				<div class="jarviswidget-editbox">
				</div>
				<div class="widget-body no-padding">
					<div class="" style="width: auto;overflow-x: auto">
						<table id="dt_basic" class="table table-bordered table-striped table-condensed table-hover smart-form has-tickbox">
							<thead>
								<tr>
									<th width="30">No</th>
									<th>Nomor Inventaris</th>
									<th>Nama Barang</th>
									<th>Detail Barang</th>
									<th>Nama Pelapor</th>
									<th>Tanggal Aduan</th>
									<th>Keterangan Aduan</th>
									<th>Gambar Pendukung</th>
									<th>Status</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>1</td>
									<td>
										<strong>121/FST/2019</strong>
									</td>
									<td>PC All In One Acer Aspire AIO <br> [Aset Elektronik]</td>
									<td align="center">
										<button onclick="detailbarang()" class="btn btn-sm btn-success" data-toggle="tooltip" data-placement="bottom" title="Detail Barang"><i class="fa fa-eye"> Detail Barang</i> </button>
									</td>
									<td>Rohman</td>
									<td>31 Juli 2021</td>
									<td>Komputer Hidup kemudian bluescreen</td>
									<td>
										<center>
											<a class="btn btn-xs bg-color-green txt-color-white"  target="_blank" href="<?php echo Yii::app()->getBaseUrl(1) ?>/upload/aset/komputer.jpg">Lihat File</a>
										</center>
									</td>	
									<td>
										<button onclick="diterima()" class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="bottom" title="Klik Untuk Menerima Pengaduan"><i class="fa fa-edit"> Diterima </i> </button>
									</td>
								</tr>
								<tr>
									<td>2</td>
									<td>
										<strong>123/FST/2020</strong>
									</td>
									<td>Mouse Limeide <br> [Aset Elektronik]</td>
									<td align="center">
										<button onclick="detailbarang()" class="btn btn-sm btn-success" data-toggle="tooltip" data-placement="bottom" title="Detail Barang"><i class="fa fa-eye"> Detail Barang</i> </button>
									</td>
									<td>Budi</td>
									<td>29 Juli 2021</td>
									<td>Keyboard tombol A dan H tidak bisa</td>
									<td>
										<center>
											<a class="btn btn-xs bg-color-green txt-color-white"  target="_blank" href="<?php echo Yii::app()->getBaseUrl(1) ?>/upload/aset/komputer.jpg">Lihat File</a>
										</center>
									</td>	
									<td>
										<div id="status">
											<label style="font-weight: 800;color: #3276b1;">DI TERIMA</label>
										</div>
										<button onclick="proses()" class="btn btn-sm btn-warning" data-toggle="tooltip" data-placement="bottom" title="Proses"><i class="fa fa-edit"> Proses</i> </button>
									</td>
								</tr>
								<tr>
									<td>2</td>
									<td>
										<strong>144/FST/2020</strong>
									</td>
									<td>Keyboard <br> [Aset Elektronik]</td>
									<td align="center">
										<button onclick="detailbarang()" class="btn btn-sm btn-success" data-toggle="tooltip" data-placement="bottom" title="Detail Barang"><i class="fa fa-eye"> Detail Barang</i> </button>
									</td>
									<td>Nur</td>
									<td>6 Agustus 2021</td>
									<td>Kabel Keyboard Putus</td>
									<td>
										<center>
											<a class="btn btn-xs bg-color-green txt-color-white"  target="_blank" href="<?php echo Yii::app()->getBaseUrl(1) ?>/upload/aset/komputer.jpg">Lihat File</a>
										</center>
									</td>	
									<td>
										<div id="status">
											<label style="font-weight: 800;color: #b98822;">DI PROSES</label>
										</div>
										<button onclick="selesai()" class="btn btn-sm btn-success" data-toggle="tooltip" data-placement="bottom" title="Selesai"><i class="fa fa-check"> Selesai</i> </button>
									</td>
								</tr>
								<tr>
									<td>2</td>
									<td>
										<strong>176/FST/2021</strong>
									</td>
									<td>AC <br> [Aset Elektronik]</td>
									<td align="center">
										<button onclick="detailbarang()" class="btn btn-sm btn-success" data-toggle="tooltip" data-placement="bottom" title="Detail Barang"><i class="fa fa-eye"> Detail Barang</i> </button>
									</td>
									<td>Rohman</td>
									<td>8 Agustus 2021</td>
									<td>AC Tidak Mau Hidup</td>
									<td>
										<center>
											<a class="btn btn-xs bg-color-green txt-color-white"  target="_blank" href="<?php echo Yii::app()->getBaseUrl(1) ?>/upload/aset/komputer.jpg">Lihat File</a>
										</center>
									</td>	
									<td>
										<div id="status">
											<label style="font-weight: 800;color: #197d19;">SELESAI</label>
										</div>
									</td>
								</tr>		
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</article>
</div>


<!-- Modal detail barang -->
<div class="modal fade" id="modal_detailbarang" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
	<div class="modal-dialog modal-md">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					&times;
				</button>
				<h4 class="modal-title">
					Detail Barang
				</h4>
			</div>
			<div class="modal-body no-padding">

				<form id="form-data" class="smart-form">
					<fieldset style="padding-top: 15px !important;">

						<div class="row">
							<section class="col col-3">
								<label > 
									<strong>Spesifikasi	: </strong>						
								</label>
							</section>
							<section class="col col-9">
								<label > 
									Processor Intel Celeron J3060 Dual Core, Memori RAM 2 GB, Harddisk 500 GB							
								</label>
							</section>
						</div>

						<div class="row">
							<section class="col col-3">
								<label > 
									<strong>Tahun Perolehan : </strong>								
								</label>
							</section>
							<section class="col col-9">
								<label > 
									2019							
								</label>
							</section>									
						</div>

						<div class="row">
							<section class="col col-3">
								<label > 
									<strong>Ruang : </strong>										
								</label>
							</section>
							<section class="col col-9">
								<label > 
									Ruang 307 A							
								</label>
							</section>									
						</div>

						<div class="row">
							<section class="col col-3">
								<label > 
									<strong>File : </strong>										
								</label>
							</section>
							<section class="col col-9">
								<img style="width: 100%" src="<?php echo Yii::app()->baseUrl; ?>/upload/aset/komputer.jpg">
							</section>									
						</div>


					</fieldset>
					<footer>
						<button type="reset" class="btn btn-default" data-dismiss="modal">
							Tutup
						</button>
					</footer>
				</form>
			</div>

		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div>
<!-- Modal detail barang -->

<!-- Modal proses -->
<div class="modal fade" id="modal_proses" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
	<div class="modal-dialog modal-md">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					&times;
				</button>
				<h4 class="modal-title">
					Form Proses
				</h4>
			</div>
			<div class="modal-body no-padding">

				<form id="form-data" class="smart-form">
					<fieldset style="padding-top: 15px !important;">

						<div class="row">
							<section class="col col-3">
								<label > 
									Keterangan Tanggapan Proses								
								</label>
							</section>
							<section class="col col-9">
								<label class="input">
									<textarea class="form-control" placeholder="" rows="4" id="ket_tanggapan" name="ket_tanggapan"></textarea>
								</label>
							</section>
						</div>

						<div id="formuploadnya" style="display: none;">
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
							</div>

					</fieldset>
					<footer>
						<a onclick="simpan()" id="btnSewaAset" type="button" data-dismiss="modal" class="btn btn-primary">
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
<!-- Modal proses -->

<!-- Modal Selesai -->
<div class="modal fade" id="modal_selesai" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
	<div class="modal-dialog modal-md">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					&times;
				</button>
				<h4 class="modal-title">
					Form Selesai
				</h4>
			</div>
			<div class="modal-body no-padding">

				<form id="form-data" class="smart-form">
					<fieldset style="padding-top: 15px !important;">

						<div class="row">
							<section class="col col-3">
								<label > 
									Keterangan Tanggapan Selesai								
								</label>
							</section>
							<section class="col col-9">
								<label class="input">
									<textarea class="form-control" placeholder="" rows="4" id="ket_tanggapan" name="ket_tanggapan"></textarea>
								</label>
							</section>
						</div>

						<div id="formuploadnya">
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
							</div>

					</fieldset>
					<footer>
						<a onclick="simpan()" id="btnSewaAset" type="button" data-dismiss="modal" class="btn btn-primary">
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
<!-- Modal Selesai -->

<script type="text/javascript">	
	pageSetUp();

	jQuery(document).ready(function($) {
		reloadDT('dt_basic');
	});

	function detailbarang() {
		$('#modal_detailbarang').modal('show');
	}

	function proses() {
		$('#modal_proses').modal('show');
	}

	function selesai() {
		$('#modal_selesai').modal('show');
	}

	function diterima(id) {
		window.id = id;
		window.cmd = "diterima";
		$.SmartMessageBox({
			title : "Konfirmasi",
			content : "Apakah anda yakin akan Menerima Pengaduan ini?",
			buttons : '[Tidak][Ya]'
		}, function(ButtonPressed) {
			if (ButtonPressed === "Ya") {
				$.ajax({
					url: '',
					type: 'POST',
					data: {id: id},
					success: function  (respon) {
						if (respon=='success') 
							notifikasi("Sukses","Data berhasil diterima","success");
						else
							notifikasi("Gagal","Data gagal diterima","failed");
					}
				});

			}
		});
	}

</script>
