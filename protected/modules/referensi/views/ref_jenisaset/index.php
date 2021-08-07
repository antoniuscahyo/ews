<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="well well-sm well-light">
			<h1 align="center" class="txt-color-blueDark"><i class="fa fa-paste"></i>
			Setting Referensi Jenis Aset</h1>
		</div>
	</div>
</div>

<div class="row">
	<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="jarviswidget jarviswidget-color-blue" id="wid-id-data_jenisaset" data-widget-editbutton="false" data-widget-deletebutton="false" data-widget-fullscreenbutton="false">
			<header style="border-radius: 5px 5px 0px 0px;">
				<span class="widget-icon"> <i class="fa fa-table"></i> </span>
				<h2>Data Jenis Aset</h2>
			</header>
			<div>
				<div class="jarviswidget-editbox">
				</div>
				<div class="widget-body no-padding">
					<div class="widget-body-toolbar">
						<button class="btn btn-primary" onclick="tambah()">
							<i class="fa fa-plus-square"></i>	Tambah Jenis Aset
						</button>							
					</div>
					<div class="" style="width: auto;overflow-x: auto">
						<table id="dt_basic" class="table table-striped table-bordered table-hover" width="100%">
							<thead>
								<tr>
									<th width="2%" class="text-align-center">No</th>
									<th data-class="expand" class="text-align-center">Nama Jenis Aset</th>
									<th data-class="expand" class="text-align-center">Status</th>
									<th data-class="expand" width="20%" class="text-align-center">Aksi</th>
								</tr>
							</thead>
							<tbody id="listdata">
								<?php $no=1; foreach ($data['datajenisaset'] as $list_data): ?>
								<tr>
									<td><?php echo $no++; ?></td>
									<td><?php echo $list_data['refjenisaset_nama'];?></td>
									<td>
										<div style="text-align: center;">
											<?php echo $list_data['refjenisaset_status']=='T' ? '<a class="btn btn-xs bg-color-blue txt-color-white"> Aktif <a/>' : '<a class="btn btn-xs bg-color-red txt-color-white"> Tidak Aktif <a/>'; ?>
										</div>
									</td>
									<td align="center">
										<button onclick="edit(<?php echo $list_data['refjenisaset_id']?>)" class="btn btn-success" data-toggle="tooltip" data-placement="bottom" title="Edit"><i class="fa fa-edit"> Edit</i> </button>
										<button onclick="hapus(<?php echo $list_data['refjenisaset_id']?>)" class="btn btn-danger" data-toggle="tooltip" data-placement="bottom" title="Hapus"><i class="fa fa-trash-o"> Hapus</i> </button>
									</td>
								</tr>
								<?php endforeach ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</article>
</div>

<!-- Modal -->
<div class="modal fade" id="modal_tambahjenisaset" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
	<div class="modal-dialog modal-md">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					&times;
				</button>
				<h4 class="modal-title">
					Form Referensi Jenis Aset
				</h4>
			</div>
			<div class="modal-body no-padding">

				<form id="form-data" class="smart-form">
					<fieldset style="padding-top: 15px !important;">

						<section>
							<label class="label">Nama Jenis Aset</label>
							<label class="input">
								<input type="text" value="" id="refjenisaset_nama" name="refjenisaset_nama">
							</label>
						</section>

						<section>
							<label class="label">Status</label>
							<label class="select">
								<select class="select2" name="refjenisaset_status" id="refjenisaset_status">
									<option value="0">=== Pilih Status ===</option>
									<option value="T">AKTIF</option>
									<option value="F">TIDAK AKTIF</option>
								</select>
							</label>
						</section>

					</fieldset>
					<footer>
						<a onclick="simpan()" type="button" data-dismiss="modal" class="btn btn-primary">
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
<!-- Modal -->

<script type="text/javascript">	
	pageSetUp();

	jQuery(document).ready(function($) {
		reloadDT('dt_basic');
	});

	function tambah() {
		window.cmd = "tambah";
		$('#modal_tambahjenisaset').modal('show');
		$("#refjenisaset_nama").val("");
		$("#refjenisaset_status").select2("val","");
	}

	function simpan () {
		$.ajax({
			url: 'referensi/ref_jenisaset/simpan',
			type: 'POST',
			data: {
				cmd: window.cmd,
				id: window.id,
				modalform : $('#modal_tambahjenisaset').val(),
				refjenisaset_nama : $("#refjenisaset_nama").val(),
				refjenisaset_status : $("#refjenisaset_status").select2("val"),
			}
			,success: function  (respon) {

				if (respon=='success'){
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
		$.ajax({
			url: 'referensi/ref_jenisaset/GetData',
			type: 'POST',
			dataType:'json',
			data: {id: id},
			success : function (respon) {
				$('#refjenisaset_nama').val(respon.refjenisaset_nama);
				$('#refjenisaset_status').select2('val',respon.refjenisaset_status);
			}
		});
		$("#modal_tambahjenisaset").modal("show");
	}

	function hapus(id) {
		window.id = id;
		window.cmd = "hapus";
		$.SmartMessageBox({
			title : "Konfirmasi",
			content : "Apakah anda yakin akan menghapus Data ini?",
			buttons : '[Tidak][Ya]'
		}, function(ButtonPressed) {
			if (ButtonPressed === "Ya") {
				$.ajax({
					url: 'referensi/ref_jenisaset/HapusData',
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

</script>
