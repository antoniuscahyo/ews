<?php

/*---------------- PHP Custom Scripts ---------

YOU CAN SET CONFIGURATION VARIABLES HERE BEFORE IT GOES TO NAV, RIBBON, ETC.
E.G. $page_title = "Custom Title" */

$page_title = "Login";

/* ---------------- END PHP Custom Scripts ------------- */

//include header
//you can add your custom css in $page_css array.
//Note: all css files are inside css/ folder
define('LOGIN', true);
/*$namaaplikasi = AppConfig::model()->find('tblappconfig_key=:key', array(':key'=>'APLIKASI_NAMA'));
$namainstansi = AppConfig::model()->find('tblappconfig_key=:key', array(':key'=>'APLIKASI_INSTANSI'));
$namapemerintah = AppConfig::model()->find('tblappconfig_key=:key', array(':key'=>'APLIKASI_PEMERINTAH'));
$namawilayah = AppConfig::model()->find('tblappconfig_key=:key', array(':key'=>'APLIKASI_WILAYAH'));*/

$page_css[] = "your_style.css";
$no_main_header = true;
$page_body_prop = array(
	"id" => "login",
	"class" => "animated fadeInDown bg",
	"style" => "min-height: 710px; background: url(<?php echo APP_URL; ?>/img/images/bg-header.jpg);background-size:cover;"
);
require_once("themes/smartadmin/views/layouts/header.php");

?>
<style type="text/css">
#login {
	/* min-height: 0px !important; */
}

.bg {
	background: url(<?php echo ASSETS_URL; ?>/img/images/bg-header.jpg) !important;
	background-size: cover !important;
	background-repeat: no-repeat !important;
	box-shadow: inset 0 0 0 2000px rgba(76, 76, 76, 0.3);
}

#login #header {
	border-bottom: 2px solid #4185FC !important;
}

#main {
	background: none !important;
}

	/*.redaksional-header
	{
		-ms-filter: "progid:DXImageTransform.Microsoft.Shadow(Strength=9, Direction=117, Color=#000000)";
		text-shadow: 3px 6px 9px rgba(0,0,0,0.7);
		filter: progid:DXImageTransform.Microsoft.Shadow(Strength=9, Direction=135, Color=#000000);
		}*/
		.blink_me {
			-webkit-animation-name: blinker;
			-webkit-animation-duration: 1s;
			-webkit-animation-timing-function: linear;
			-webkit-animation-iteration-count: infinite;

			-moz-animation-name: blinker;
			-moz-animation-duration: 1s;
			-moz-animation-timing-function: linear;
			-moz-animation-iteration-count: infinite;

			animation-name: blinker;
			animation-duration: 1s;
			animation-timing-function: linear;
			animation-iteration-count: infinite;
		}

		@-moz-keyframes blinker {
			0% {
				opacity: 1.0;
			}

			50% {
				opacity: 0.0;
			}

			100% {
				opacity: 1.0;
			}
		}

		@-webkit-keyframes blinker {
			0% {
				opacity: 1.0;
			}

			50% {
				opacity: 0.0;
			}

			100% {
				opacity: 1.0;
			}
		}

		@keyframes blinker {
			0% {
				opacity: 1.0;
			}

			50% {
				opacity: 0.0;
			}

			100% {
				opacity: 1.0;
			}
		}

	/*.col-sm-12
	{
		margin-left: 0px !important;
		margin-top: 20% !important;
		}*/
		.box-shadow {
			-ms-filter: "progid:DXImageTransform.Microsoft.Shadow(Strength=9, Direction=135, Color=#000000)";
			/*IE 8*/
			-moz-box-shadow: 8px 8px 9px 1px rgba(0, 0, 0, 0.7);
			/*FF 3.5+*/
			-webkit-box-shadow: 8px 8px 9px 1px rgba(0, 0, 0, 0.7);
			/*Saf3-4, Chrome, iOS 4.0.2-4.2, Android 2.3+*/
			box-shadow: 8px 8px 9px 1px rgba(0, 0, 0, 0.7);
			/* FF3.5+, Opera 9+, Saf1+, Chrome, IE10 */
			filter: progid:DXImageTransform.Microsoft.Shadow(Strength=9, Direction=135, Color=#000000);
			/*IE 5.5-7*/
		}

		.paragraph-header {
			color: #FFF !important
		}
	</style>
	<!-- ==========================CONTENT STARTS HERE ========================== -->
	<!-- possible classes: minified, no-right-panel, fixed-ribbon, fixed-header, fixed-width-->

	<link rel="stylesheet" href="<?php echo ASSETS_URL; ?>/css/kendocss/kendo.common-material.min.css" />
	<link rel="stylesheet" href="<?php echo ASSETS_URL; ?>/css/kendocss/kendo.material.min.css" />
	<link rel="stylesheet" href="<?php echo ASSETS_URL; ?>/css/kendocss/kendo.material.mobile.min.css" />

	<script src="<?php echo ASSETS_URL; ?>/js/kendojs/jquery.min.js"></script>
	<script src="<?php echo ASSETS_URL; ?>/js/kendojs/kendo.all.min.js"></script>
	<div id="main" role="main">


		<!-- MAIN CONTENT -->
		<div id="content" class="container">

			<div class="row">
				<div class="col col-md-4">
				</div>
				<div class="col col-md-4">
					<div>
						<form method="post" action="<?php echo APP_URL; ?>" id="login-form" class="smart-form client-form" style="margin-top: 0px;">
							<fieldset style="margin-top: 0px;background: linear-gradient(to bottom,rgb(255 255 255 / 62%),rgb(255, 255, 255));border-radius: 7px;">
								<div class="row">
									<section class="col col-md-12">
										<center><span id="logo"> <img src="<?php echo ASSETS_URL; ?>/img/images/logoupy.png" style="width: 100%;margin-bottom: -13%;"> </span></center>
									</section> 
									<section class="col col-md-12" style="margin-top: 12%;text-align: center; color: black;">
										<p class="text-center"style="font-size: 14px;"><strong style="font-size: 18px;">Early Warning System Inventaris </strong></p>
										<p class="text-center"style="font-size: 14px;"><strong style="font-size: 18px;">Fakultas Sains & Teknologi </strong></p>
										<p><strong style="font-size: 16px;">UNIVERSITAS PGRI YOGYAKARTA</strong></p>
										<p><i>Masukan Username dan Password</i></p>
										<div class="header-social wthree">
										</div>
										<label style="display:none" id="info" class="label txt-color-red blink_me text-center">Username atau Password salah.</label>
									</section>
								</div>

								<div class="row">
									<section class="col col-md-12">
										<label class="label" style="color: black;">Username</label>
										<label class="input"> <i class="icon-append fa fa-user"></i>
											<input type="text" name="LoginForm[username]" id="LoginForm_username" placeholder="">
										</label>
									</section>
								</div>

								<div class="row">
									<section class="col col-md-12">
										<label class="label" style="color: black;">Password</label>
										<label class="input"> <i class="icon-append fa fa-lock"></i>
											<input type="password" name="LoginForm[password]" id="LoginForm_password" placeholder="">
										</label>
									</section>
								</div>

								<div class="row" style="text-align: center;">
									<div class="form-group mb-lg">
										<div class="clearfix">
										</div>
										<label class="input">
											<div id="image_captcha">
												<img id="imgcaptcha" style="width:120px; border-radius: 5px; padding: 5px; border: 1px solid #295932;">
											</div>
											<div style="padding: 7px;">
												<a href="javascript:void(0)" onclick="refreshCaptcha()" style="color:blue;">Reload Captcha</a>
											</div>
										</label>
									</div>
								</div>

								<div class="row">
									<section class="col col-md-12" id="notifchapcha" style="display: none; padding: 0px">
										<label class="input">
											<center>
												<span style="color: red;animation: blinker 1s linear infinite;">Isian kode verifikasi Salah atau sudah Expire silahkan reload captcha Kembali</span>
											</center>
										</label>
									</section>
								</div>

								<div class="row">

									<section class="col col-md-12">
										<label class="input"> <i class="icon-append fa fa-lock"></i>
											<input type="text" name="captcha" id="captcha">
											<b class="tooltip tooltip-top-right"><i class="fa fa-lock txt-color-teal"></i> Masukan Captcha</b>
										</label>
									</section>
								</div>
								<hr style="border-top: 1px solid #4daa8f;">
								<div class="row" style="padding: 15px;">
									<section class="col-md-12">
										<button type="submit" id="btn-login" class="btn btn-sm btn-success btn-block" style="background-color: #2c3b71;height: 45px;font-size: 13px;border-radius: 5px;">
											<i class="fa fa-sign-in"></i> Masuk
										</button>
									</section>
								</div>
							</fieldset>
						</form>
					</div>
				</div>
				<div class="col col-md-4">
				</div>
			</div>
		</div>

	</div>



	<style type="text/css"></style>
	<!-- END MAIN PANEL -->
	<!-- ==========================CONTENT ENDS HERE ========================== -->

	<?php
//include required scripts
	require_once("themes/smartadmin/views/layouts/scripts.php");
	?>

	<!-- PAGE RELATED PLUGIN(S)-->

	<script type="text/javascript">
		pageSetUp();
		window.isLogin = false;
		runAllForms();

		$(function() {
		// Validation
		$("#login-form").validate({
			// Rules for form validation
			rules: {
				"LoginForm[username]": {
					required: true
				},
				"LoginForm[password]": {
					required: true,
					minlength: 3,
					maxlength: 20
				}
			},

			// Messages for form validation
			messages: {
				"LoginForm[username]": {
					required: 'Tolong masukkan nama pengguna Anda'
				},
				"LoginForm[password]": {
					required: 'Masukkan kata sandi Anda'
				}
			},

			// Do not change code below
			errorPlacement: function(error, element) {
				error.insertAfter(element.parent());
			},
			submitHandler: function(form) {
				// saat validasi benar semua, lakukan proses login
				doLogin();
			}
		});
	});
		jQuery(document).ready(function($) {
			$('#datepicker').datepicker({
				dateFormat: 'dd/mm/yy',
				prevText: '<i class="fa fa-chevron-left"></i>',
				nextText: '<i class="fa fa-chevron-right"></i>',
				onSelect: function(selectedDate) {
					$('#finishdate').datepicker('option', 'minDate', selectedDate);
				}
			});

			setTimeout(function() {
				refreshCaptcha();
			}, 500);


		});

		function refreshCaptcha() {
			$('#notifchapcha').hide();
			$('#imgcaptcha').removeAttr('src');
			$("#imgcaptcha").attr('src', '<?php echo Yii::app()->baseUrl; ?>/site/captchaverifikasi?_t=' + new Date().getTime());
		}

		function doLogin() {
			str = $("#login-form").serialize() + "&ajax=login-form";
			$.ajax({
				type: "POST",
				url: "",
				data: str,
				dataType: "json",
				beforeSend: function() {
				//$("#btn-login").attr("disabled",true);
			},
			success: function(data, status) {
				window.data = data;
				if (data.pesan == 'not_valid') {
					return $('#notifchapcha').show();
				}
				if (data.authenticated) {
					window.location = data.redirectUrl;
				} else {
					$.each(data, function(key, value) {
						/* var div = "#"+key+"_em_";
						 $(div).text(value);
						 $(div).show();*/
						 $("#info").show('slow');
						 $("#info").html(value);
						});
					// $("#btn-login").attr("disabled",false);
				}
			},
		});
		}

		function reset() {
			$("#formreset").modal('show');
		}
	</script>

	<script type="text/javascript">
		loadScript("<?= Yii::app()->getBaseUrl(1); ?>/themes/smartadmin/js/plugin/jquery-form/jquery-form.min.js", runFormValidation);

		function runFormValidation() {
			var $orderForm = $("#formresetakun").validate({
			// Rules for form validation
			rules: {
				username: {
					required: true
				},
				email: {
					required: true,
					email: true
				},
			},

			// Messages for form validation
			messages: {
				username: {
					required: 'Mohon isikan username anda'
				},
				email: {
					required: 'Mohon isikan email anda',
					email: 'Mohon isi dengan email'
				},
			},


			// Do not change code below
			errorPlacement: function(error, element) {
				error.insertAfter(element.parent());
			},
			submitHandler: function(form) {
				// saat validasi benar semua, jalankan simpan()
				return reset();
			}
		});

			$.validator.addMethod("pwcheck", function(value) {
			return /^[A-Za-z0-9\d=!\-@._*]*$/.test(value) // consists of only these
			&&
				/[a-z]/.test(value) // has a lowercase letter
				&&
				/\d/.test(value) // has a digit
			});

			function reset() {
				$("#tombolreset").prop('disabled', 1);
				$.ajax({
					url: '<?= Yii::app()->getBaseUrl(1); ?>/webv2/SendReset',
					type: 'POST',
					dataType: 'json',
					data: $("#formresetakun").serialize(),
				})
				.done(function(respon) {
					console.log("success");
					if (respon.status == 'success') {
						Swal.fire(
							'Berhasil!',
							'Silahkan cek email anda untuk melanjutkan proses reset password akun anda',
							'success'
							).then((result) => {
								if (result.isConfirmed) {
									window.location.reload()
								} else if (result.isDenied) {
								}
							})
						} else if (respon.status == 'not_allowed') {
							Swal.fire({
								icon: 'error',
								title: 'Maaf...',
								text: 'Akun yg anda isikan tidak terdaftar, silahkan cek kembali isian anda',
							// footer: '<a href>?</a>'
						})
						} else {
							Swal.fire({
								icon: 'error',
								title: 'Oops...',
								text: 'Ada kesalahan dengan server! Mohon ulangi lagi ya',
							// footer: '<a href>?</a>'
						})
						}
					})
				.fail(function() {
					console.log("error");
				})
				.always(function() {
					console.log("complete");
					$("#tombolreset").prop('disabled', false);
				});
			}

		}
	</script>