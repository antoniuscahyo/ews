<table id="dt_basic" class="table table-bordered table-striped table-condensed table-hover smart-form has-tickbox">
	<thead>
		<tr>
			<th width="15">No</th>
			<th>Teks</th>
			<th width="50">Delay Animasi</th>
			<th width="15">Edit</th>
			<th width="15">Hapus</th>
		</tr>
	</thead>
	<tbody>
		<?php $no=1; foreach ($data as $imageslider): ?>
		<tr>
			<td><?php echo $no++; ?></td>
			<td>
				<center>
					<?php echo $imageslider['tblslidertext_teks'];?></td>
				</center>
				<td>
					<?php echo $imageslider['tblslidertext_delay'];?> ms
				</td>
				<td><a href="javascript:void(0);" class="btn btn-circle btn-xs bg-color-green txt-color-white "  onclick="editteks(<?php echo $imageslider['tblslidertext_id']; ?>)"><i class="fa fa-edit"></i></a> </td>
				<td><a href="javascript:void(0);" class="btn btn-circle btn-xs bg-color-red txt-color-white "  onclick="hapusteks(<?php echo $imageslider['tblslidertext_id']; ?>)"><i class="glyphicon glyphicon-trash"></i></a> </td>
			</tr>
		<?php endforeach ?>
	</tbody>
</table>