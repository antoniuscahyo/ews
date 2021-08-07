<div class="" style="width: auto;overflow-x: auto">
	<table id="dt_basic" class="table table-bordered table-striped table-condensed table-hover smart-form has-tickbox">
		<thead>
			<tr>
				<th width="30">No</th>
				<th>Nomor Inventaris</th>
				<th>Nama Barang</th>
				<th>Spesifikasi</th>
				<th>Tahun Perolehan</th>
				<th>Kondisi</th>
				<th>Ruang</th>
				<th>Gambar</th>
				<th width="10">Edit</th>
				<th width="10">Hapus</th>
			</tr>
		</thead>
		<tbody>
			<?php $no=1; foreach ($data['inventaris_list'] as $list_data): ?>
			<tr>
				<td><?php echo $no++; ?></td>
				<td>
					<strong><?php echo $list_data['tblinventaris_nomor']; ?></strong>
				</td>
				<td><?php echo $list_data['tblinventaris_namabarang']; ?> <br> [&nbsp;<?php echo Refjenisaset::model()->findByPk($list_data['refjenisaset_id'])->refjenisaset_nama; ?>&nbsp;]</td>
				<td><?php echo $list_data['tblinventaris_spesifikasi']; ?></td>
				<td><?php echo Reftahun::model()->findByPk($list_data['reftahun_id'])->reftahun_nama; ?></td>
				<td><?php echo $list_data['tblinventaris_kondisi']; ?></td>
				<td><?php echo Refruang::model()->findByPk($list_data['refruang_id'])->refruang_nama; ?></td>
				<td>
					<center>
						<a class="btn btn-xs bg-color-green txt-color-white"  target="_blank" href="<?php echo Yii::app()->baseUrl; ?>/upload/aset/<?php echo $list_data['tblinventaris_file'];?>">Lihat File</a>
					</center>
				</td>	
				<td>
					<a href="javascript:void(0);" class="btn btn-circle btn-xs bg-color-green txt-color-white " onclick="edit(<?php echo $list_data['tblinventaris_id'] ?>)"><i class="fa fa-edit"></i></a>
				</td>
				<td>
					<a href="javascript:void(0);" class="btn btn-circle btn-xs bg-color-red txt-color-white " onclick="hapus(<?php echo $list_data['tblinventaris_id'] ?>)"><i class="glyphicon glyphicon-trash"></i></a>
				</td>
			</tr>
		<?php endforeach ?>		
	</tbody>
</table>
</div>

<script type="text/javascript">
	jQuery(document).ready(function($) {
		reloadDT('dt_basic');
	});
</script>