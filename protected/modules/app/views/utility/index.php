<section id="widget-grid" class="">
	<!-- row -->
	<article class="col-sm-12 col-md-12 col-lg-12">
				<div class="jarviswidget jarviswidget-color-blueDark" id="wid-id-11" data-widget-fullscreenbutton="false" data-widget-sortable="false" data-widget-editbutton="false" data-widget-deletebutton="false">
					<header>
			            <span class="widget-icon"> <i class="fa fa-table"></i> </span>
			            <h2>Setting Username dan Password</h2>
			 </header>
			<div class="widget-body" style="overflow-y: scroll; height: 420px; overflow-x: hidden; padding: 0px;">

				<div class="alert alert-info" style="margin: 5px 13px 0px;">
					<p>Beberapa tips/saran dalam membuat Password : </p>
					<ol>
						<li>Panjang Password sebaiknya minimal 12 karakter</li>
						<li>Terdiri atas kombinasi huruf dan angka, misal p45sw0rd54y4am4n</li>
						<li>Jangan menggunakan informasi pribadi sebagai Password, <b>misal nama anak, nama orang tua, tempat tinggal dll</b></li>
						<li>Ubahlah Password anda secara berkala, <b>misal 6 bulan sekali</b></li>
						<li>Jangan membuat Password yang sama dengan Userid anda, <b>misal Userid="abcde", Password="abcde"</b></li>
					</ol>
				</div>
				<form class="smart-form" id="uname_change">

					<fieldset>			

					<legend>Username</legend>
						<section>
							<div class="row">										
								<label class="label col col-3">Nama <i class="txt-color-red"> * </i></label>
								<div class="col col-5">
									<label class="input"> <i class="icon-append fa fa-user"></i>
										<input name="nama" id="nama" type="text" value="<?php echo $data->tblpengguna_nama; ?>">
									</label>
								</div>
							</div>
						</section>
						<section>
							<div class="row">										
								<label class="label col col-3">Username <i class="txt-color-red"> * </i></label>
								<div class="col col-5">
									<label class="input"> <i class="icon-append fa fa-user"></i>
										<input name="username" id="username" type="text" value="<?php echo $data->tblpengguna_username; ?>">
									</label>
								</div>
							</div>
						</section>
						<section>
							<div class="row">										
								<label class="label col col-3">Email <i class="txt-color-red"> * </i></label>
								<div class="col col-5">
									<label class="input"> <i class="icon-append fa fa-envelope"></i>
										<input name="email" id="email" type="email" value="<?php echo $data->tblpengguna_email; ?>">
									</label>
								</div>
							</div>
						</section>
					</fieldset>

					<footer>
						<button type="submit" class="btn btn-success">
							<i class="fa fa-exchange"></i>&nbsp;
							Ubah
						</button>								
					</footer>

				</form>	
				<form action="" id="login-form" class="smart-form">

				<fieldset>			

				<legend>Mengganti password</legend>

					<section>
						<div class="row">										
							<label class="label col col-3">Password Lama<i class="txt-color-red"> * </i></label>
							<div class="col col-5">
								<label class="input"> <i class="icon-append fa fa-lock"></i>
									<input name="passlama" id="passlama" type="password">
								</label>
							</div>
						</div>
					</section>

					<section>
						<div class="row">										
							<label class="label col col-3">Password Baru<i class="txt-color-red"> * </i></label>
							<div class="col col-5">
								<label class="input"> <i class="icon-append fa fa-lock"></i>
									<input id="passbaru" name="passbaru" type="password">
								</label>
							</div>
						</div>
					</section>

					<section>
						<div class="row">										
							<label class="label col col-3">Ulangi Password Baru<i class="txt-color-red"> * </i></label>
							<div class="col col-5">
								<label class="input"> <i class="icon-append fa fa-lock"></i>
									<input name="ulangipass" id="ulangipass" type="password">
								</label>
							</div>
						</div>
					</section>


					
				</fieldset>

				<footer>
					<button type="submit" class="btn btn-primary">
						<i class="fa fa-exchange"></i>&nbsp;
						Ganti
					</button>								
				</footer>

			</form>	
			</div>
		</div>
	</article>
</section>

<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.form.js"></script>
<script type="text/javascript"> 
pageSetUp();
//window.location.reload();

// Load form valisation dependency
var $loginForm = $("#uname_change").validate({
	// Rules for form validation
	rules : {
		nama : {
			required : true,
			minlength : 3,
			maxlength : 30
		},
		username : {
			required : true,
			minlength : 3,
			maxlength : 20
		},
		email : {
			required : true,
			minlength : 3,
			maxlength : 50,
		}
	},

	// Messages for form validation
	messages : {
		nama : {
			required : 'Mohon isikan Nama'
		},
		username : {
			required : 'Mohon isikan username',
			minlength : 'Nama kurang dari 3 karakter',
			maxlength : 'USername maksimal 20 karakter'					
		},
		email : {
			required : 'Masukan Email',
			minlength : 'Email kurang dari 3 karakter',			
			maxlength : 'Email maksimal 50 karakter'			
		}
	},

	// Do not change code below
	errorPlacement : function(error, element) {
		error.insertAfter(element.parent());
	},
	submitHandler : function(form) {
		// saat validasi benar semua, jalankan simpan()
		return gantiuname();
	}
});

// Registration validation script
var $loginForm = $("#login-form").validate({
	// Rules for form validation
	rules : {
		passlama : {
			required : true,
			minlength : 3,
			maxlength : 20
		},
		passbaru : {
			required : true,
			minlength : 3,
			maxlength : 20
		},
		ulangipass : {
			required : true,
			minlength : 3,
			maxlength : 20,
			equalTo : '#passbaru'
		}
	},

	// Messages for form validation
	messages : {
		passlama : {
			required : 'Mohon isikan kata sandi lama'
		},
		passbaru : {
			required : 'Mohon isikan kata sandi baru',
			minlength : 'Kata sandi kurang dari 3 karakter'					
		},
		ulangipass : {
			required : 'Ulangi kata sandi baru',
			equalTo : 'Kata sandi tidak cocok'					
		}
	},

	// Do not change code below
	errorPlacement : function(error, element) {
		error.insertAfter(element.parent());
	},
	submitHandler : function(form) {
		// saat validasi benar semua, jalankan simpan()
		return gantipass();
	}
});
	function gantipass () {
		$.ajax({
			url: 'app/utility/gantipass',
			type: 'post',
			data: {
				passlama: $("#passlama").val(),
				pass: $("#passbaru").val(),
				repass: $("#ulangipass").val(),
			},
			success:function (respon) {
				if (respon=='success') {
					notifikasi("Berhasil", "Kata Sandi Berhasil diubah", 'success');					
				}
				else {
					notifikasi("Gagal", "Kata Sandi Gagal diubah, silakan cek kembali", 'fail', false, false);
				}
			}
		});
	}

	function gantiuname () {
		$.ajax({
			url: 'app/utility/gantiuname',
			type: 'post',
			data: {
				nama: $("#nama").val(),
				username: $("#username").val(),
				email: $("#email").val(),
			},
			success:function (respon) {
				if (respon=='success') {
					notifikasi("Berhasil", "Data Berhasil diubah", 'success');					
				}
				else if(respon=='sama') {
					notifikasi("Gagal", "Username yang anda masukan telah digunakan", 'fail', false, false);
				}
				else {
					notifikasi("Gagal", "Data Gagal diubah, silakan cek kembali", 'fail', false, false);
				}
			}
		});
	}
</script>