<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->getBaseUrl(1) ?>/themes/web/css/sweetalert2.min.css">
<style type="text/css">
	span.head {
    font-weight: bold;
    font-size: 16px;
}
span.isi {
    font-style: italic;
}
</style>
<div class="breadcumb-area bg-img" style="background-image: url(<?php echo Yii::app()->baseUrl; ?>/upload/kontent/header.jpg);">
	<div class="bradcumbContent">
		<h2>Form Pengaduan</h2>
	</div>
</div>
<!-- ##### Contact Area Start ##### -->
<section class="teachers-area section-padding-0-100" style="
padding-bottom: 0px;">
<div class="container" style="padding-top: 290px;">
	<div class="contact-content">
		<div class="row">
			<div class="col col-md-12">
				<div class="contact-form-area wow fadeInUp" data-wow-delay="500ms">
					<form id="form-saran" method="post" style="margin-bottom: 50px;">
						<div class="col col-md-12">
						<span>Contoh Nomor : (121/FST/2019)</span>
						<input name="NomorAset" type="text" class="form-control" id="NomorAset" placeholder="Cari Aset (Masukkan Nomor Aset)">
							<a href="#" onclick="cariAset()" style="background-image: linear-gradient(to right, #1b61ad 0%, #17a2b8 51%, #1b61ad 100%);height: 50px;padding: 0 40px;line-height: 50px;min-width: 100px;float: right;margin-bottom: 0px;" class="btn academy-btn" id="btnCariAset">Cari</a>
						</div>
						<div id="hasilcari" class="col col-md-12" style="margin-top: 80px;display: none;">
							<hr>
							<h5>Detail Aset :</h5>
							<div class="col col-md-12" style="text-align: center;">
								<img src="<?php echo Yii::app()->baseUrl; ?>/upload/aset/komputer.jpg">
							</div>
							<br>
							<div class="col col-md-12">
								<span class="head">Nama Barang :</span><br><span class="isi"><label id="nama_barang"></label></span>
								<br>
								<span class="head">Spesifikasi :</span><br><span class="isi"><label id="spesifikasi"></label></span>
								<br>
								<span class="head">Tahun Perolehan :</span><br><span class="isi"><label id="tahun_perolehan"></label></span>
							</div>
							<hr>	
						</div>
						<div id="isianaduan" class="col col-md-12" style="display: none;">
							<h5>Form Aduan :</h5>
							<input name="namapelapor" type="text" class="form-control" id="namapelapor" placeholder="Isikan Nama Pelapor">
							<textarea name="message" class="form-control" id="message" cols="30" rows="10" placeholder="Isikan Keterangan Kondisi Barang"></textarea>
							<div class="form-group">
								<label for="exampleFormControlFile1">Upload Foto Pendukung</label>
								<input type="file" class="form-control" id="exampleFormControlFile1">
							</div>

							<button class="btn academy-btn mt-30" id="btnSubmitSaran" type="submit">Kirim Aduan</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>		
</div>
</section>
<script src="<?php echo Yii::app()->getBaseUrl(1) ?>/themes/web/js/sweetalert2/sweetalert2.min.js"></script>
<script type="text/javascript">

	LOADER = '<div align="center" class="loader_img"><img src="<?php echo Yii::app()->getBaseUrl(1) ?>/images/loader.gif" alt="memuat data..."></div>';

	function cariAset() {
		$("#hasilcari").prepend('<div align="center">'+LOADER+'');
		$(".loader_img").fadeOut(2000);
		$("#hasilcari").show();
		$("#isianaduan").show();

		$.ajax({
			url: '<?= Yii::app()->getBaseUrl(1) ?>/web/cariaset',
			type: 'POST',
			dataType: 'json',
			data :{
				NomorAset: $("#NomorAset").val()
			},
			success:function (respon) {
				$("#nama_barang").text(respon.nama_barang);
				$("#spesifikasi").text(respon.spesifikasi);
				$("#tahun_perolehan").text(respon.tahun_perolehan);

				$("#body_pencarian").html(respon);
				$("#body_pencarian").show();
				$("#body_pencarian").prepend('<div align="center">'+LOADER+'');
				$(".loader_img").fadeOut(2000);		
			}
		});
	}

	setTimeout(function() {
		$(function(){
			$("#form-saran").submit(function(){
				$.ajax({
					url:'<?= Yii::app()->getBaseUrl(1) ?>/web/kirimsaran',
					data:$(this).serialize(),
					type:$(this).attr("method"),
					beforeSend: function() {
						if ($('#name').val().trim().length<1 || $('#telp').val().trim().length<1 || $('#message').val().trim().length<1) {
							Swal.fire(
								'Data Kosong',
								'Mohon isikan data dengan lengkap!',
								'warning'
								);
							return false;
						}
						$("textarea").attr("disabled",true);
						$("input").attr("disabled",true);
						$("#btnSubmitSaran").attr("disabled",true);
					},
					complete:function() {
						$("textarea").attr("disabled",false);
						$("input").attr("disabled",false);
						$("#btnSubmitSaran").attr("disabled",false);								
					},
					success:function(hasil) {
						if (hasil=='success') {
							Swal.fire(
								'Data Berhasil Terkirim',
								'Terima Kasih atas Saran dan Masukan anda',
								'success'
								).then(function(){
									$("#form-saran")[0].reset();
								});
							}else{
								Swal.fire(
									'Data Gagal Terkirim',
									'Mohon Maaf, silahkan ulangi beberapa saat lagi',
									'error'
									);
							}
						}
					})
				return false;
			});
		});
	}, 5000);
</script>