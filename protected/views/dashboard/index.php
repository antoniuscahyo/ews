<?php define('ASSETS_URL',$data['theme_baseurl']); ?>
<link rel="stylesheet" type="text/css" href="<?php echo ASSETS_URL; ?>/css/neon-core.css">
<style type="text/css">
.img-fp {
    cursor: pointer;
    border: 2px solid transparent;
}

.img-fp:hover {
    border: 2px solid #333;
    transition: all 0.5s;
}
.img-modal {
    width: 100%;
    height: auto;
    margin-bottom: 30px;
    text-align: center;
    box-shadow: 2px 3px 3px #333;
    -moz-box-shadow: 2px 3px 3px #333;
    -webkit-box-shadow: 2px 3px 3px #333;
    -ms-box-shadow: 2px 3px 3px #333;
    -o-box-shadow: 2px 3px 3px #333;
}
.anu {
    position: absolute;
    right: 32px;
    color: rgba(0, 0, 0, 0.2) !important;
    bottom: 100px;
    z-index: 1;
    font-size: 45px;
}
</style>
<section>
    <div class="row">

        <div class="col-sm-12">


            <div class="well well-sm">

                <div class="row">

                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <div class="well well-light well-sm no-margin no-padding">

                            <div class="row">

                                <div class="col-sm-12">
                                    <div id="myCarousel" class="carousel fade profile-carousel">

                                        <div class="air air-top-left padding-10">
                                            <h4 class="txt-color-blueDark font-md">
                                            	<?php 

                                                $hari=date('w');
                                                $tgl =date('d');
                                                $bln =date('m');
                                                $thn =date('Y');
                                                switch($hari){      
                                                    case 0 : {
                                                        $hari='Minggu';
                                                    }break;
                                                    case 1 : {
                                                        $hari='Senin';
                                                    }break;
                                                    case 2 : {
                                                        $hari='Selasa';
                                                    }break;
                                                    case 3 : {
                                                        $hari='Rabu';
                                                    }break;
                                                    case 4 : {
                                                        $hari='Kamis';
                                                    }break;
                                                    case 5 : {
                                                        $hari="Jumat";
                                                    }break;
                                                    case 6 : {
                                                        $hari='Sabtu';
                                                    }break;
                                                    default: {
                                                        $hari='Unknown';
                                                    }break;
                                                }

                                                switch($bln){       
                                                    case 1 : {
                                                        $bln='Januari';
                                                    }break;
                                                    case 2 : {
                                                        $bln='Februari';
                                                    }break;
                                                    case 3 : {
                                                        $bln='Maret';
                                                    }break;
                                                    case 4 : {
                                                        $bln='April';
                                                    }break;
                                                    case 5 : {
                                                        $bln='Mei';
                                                    }break;
                                                    case 6 : {
                                                        $bln="Juni";
                                                    }break;
                                                    case 7 : {
                                                        $bln='Juli';
                                                    }break;
                                                    case 8 : {
                                                        $bln='Agustus';
                                                    }break;
                                                    case 9 : {
                                                        $bln='September';
                                                    }break;
                                                    case 10 : {
                                                        $bln='Oktober';
                                                    }break;     
                                                    case 11 : {
                                                        $bln='November';
                                                    }break;
                                                    case 12 : {
                                                        $bln='Desember';
                                                    }break;
                                                    default: {
                                                        $bln='Unknown';
                                                    }break;
                                                }
                                                $tahun = date("Y");
                                                $tgl = date("d");
                                                $sekarang = $hari .', &nbsp;'. $tgl .'&nbsp;'. $bln .'&nbsp;'. $tahun;
                                                echo $sekarang;
                                                ?>
                                            </h4>
                                        </div>
                                        <ol class="carousel-indicators">
                                            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                                            <li data-target="#myCarousel" data-slide-to="1" class=""></li>
                                            <li data-target="#myCarousel" data-slide-to="2" class=""></li>
                                        </ol>
                                        <div class="carousel-inner">
                                            <!-- Slide 1 -->
                                            <div class="item active">
                                                <img src="images/gbr3.jpg" alt="">
                                            </div>
                                            <!-- Slide 2 -->
                                            <div class="item">
                                                <img src="images/gbr3.jpg" alt="">
                                            </div>
                                            <!-- Slide 3 -->
                                            <div class="item">
                                                <img src="images/gbr3.jpg" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12">

                                    <div class="row">

                                        <div class="col-sm-3 profile-pic">
                                            <img src="upload/pengguna/<?php echo $pengguna['foto']; ?>" onclick="editfp()" class="img-fp" title="Ganti Foto Profil"> 
                                        </div>
                                        <div class="col-sm-6">
                                            <h1><?php echo $pengguna['nama']; ?>
                                            <br>
                                            <small> <?php echo $level['tblrole_code']; ?></small></h1>

                                            <ul class="list-unstyled">
                                                <li>
                                                    <p class="text-muted">
                                                        <i class="fa fa-phone"></i> <?php echo $pengguna['telp']; ?>
                                                    </p>
                                                </li>
                                                <li>
                                                    <p class="text-muted">
                                                        <i class="fa fa-envelope"></i>&nbsp;&nbsp;<a href="mailto:<?php echo $pengguna['email']; ?>"><?php echo $pengguna['email']; ?></a>
                                                    </p>
                                                </li>

                                            </ul>
                                        </div>                                                                                            


                                    </div>

                                </div>

                            </div>
                            <!-- end row -->

                        </div>
              </div>


          </div>

          <!-- end row -->

      </section>
      <!-- end widget grid -->

    <section>
        <div class="row">
            <div class="col-sm-12">
                <div class="well well-sm">
                    <div style="text-align: center;">
                        <h2>Monitoring Pengaduan Inventaris</h2>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-4 col-xs-12">
                            <div onclick="detailpengaduan()" class="tile-progress tile-primary" style="background-color: #b50c32;cursor: pointer;"> 
                              <div class="tile-header"> 
                                <h3>Pengaduan Belum Di Tindak Lanjuti</h3> 
                                <h1 style="font-size: 35px;"><b>1</b></h1> 
                                <div class="icon"><i class="anu fa fa-user"></i></div>
                            </div> 
                            <div class="tile-progressbar"> 
                                <span data-fill="65.5%" style="width: 65.5%;"></span> 
                            </div> 
                            <div class="tile-footer"> 
                                <span>Jumlah Pengaduan Belum Di Tindak Lanjuti</span>
                            </div> 
                            </div> 
                        </div>
                        <div class="col-sm-12 col-md-4 col-xs-12">
                            <div class="tile-progress tile-primary" style="background-color: #cc9314;"> 
                              <div class="tile-header"> 
                                <h3>Pengaduan Di Proses</h3> 
                                <h1 style="font-size: 35px;"><b>2</b></h1> 
                                <div class="icon"><i class="anu fa fa-user"></i></div>
                            </div> 
                            <div class="tile-progressbar"> 
                                <span data-fill="65.5%" style="width: 65.5%;"></span> 
                            </div> 
                            <div class="tile-footer"> 
                                <span>Jumlah Pengaduan Di Proses</span>
                            </div> 
                        </div> 
                    </div>
                        <div class="col-sm-12 col-md-4 col-xs-12">
                            <div class="tile-progress tile-primary" style="background-color: #0cb50c;"> 
                              <div class="tile-header"> 
                                <h3>Pengaduan Selesai</h3> 
                                <h1 style="font-size: 35px;"><b>1</b></h1> 
                                <div class="icon"><i class="anu fa fa-user"></i></div>
                            </div> 
                            <div class="tile-progressbar"> 
                                <span data-fill="65.5%" style="width: 65.5%;"></span> 
                            </div> 
                            <div class="tile-footer"> 
                                <span>Jumlah Pengaduan Telah Selesai</span>
                            </div> 
                        </div> 
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </section>      

      <!-- Modal Upload -->
      <div class="modal fade" id="updatefoto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        &times;
                    </button>
                    <h4 class="modal-title" align="center">
                        Ganti Foto Profil
                    </h4>
                </div>
                <div class="modal-body no-padding">
                    <form method="post" enctype="multipart/form-data" class="smart-form" action="app/tblpengguna/gantifp" id="form-simpanfile">

                        <fieldset>
                            <section>
                                <div class="row">
                                    <div class="col col-10" align="center">
                                        <span>Foto Profil lama</span>
                                        <div align="center">
                                         <img src="upload/pengguna/<?php echo $pengguna['foto']; ?>" onclick="editfp()" style="width: 50%;" class="img-modal" title="Foto Profil Lama"> 
                                     </div>
                                 </div>

                                 <div class="col col-10">
                                    <input type="hidden" name="id" id="id" value="<?php echo Yii::app()->user->getId(); ?>">
                                    <label for="file" class="input input-file">
                                        <div class="button">
                                            <input type="file" name="fotoprofil" id="fotoprofil" onchange="this.parentNode.nextSibling.value = this.value">Browse</div><input type="text" placeholder="Pilih Foto" readonly="">

                                        </label>
                                    </div>
                                </div>
                            </section>
                            <section>
                                <div class="progress progress-lg progress-striped active" id="progress">
                                    <div class="progress-bar bg-color-green"  id="bar"  role="progressbar" style="width: 0%;"></div>
                                </div>
                            </section>  
                        </fieldset>

                        <footer>
                            <button type="submit" class="btn btn-success">
                                Simpan
                            </button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">
                                Batal
                            </button>

                        </footer>
                    </form>                     


                </div>

            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

    <script type="text/javascript">
// DO NOT REMOVE : GLOBAL FUNCTIONS!
pageSetUp();

loadScript("<?php echo ASSETS_URL; ?>/js/jquery.form.js",defineAjaxForm);
function defineAjaxForm() {
    var options = { 
        beforeSend: function() 
        {
            $("#progress").show();
            var cek = $("#fotoprofil").val();
            if (cek == "") {
                $("#updatefoto").modal("hide");
                notifikasi('Batal','Batal Upload Foto, foto kosong','cancel');
                complete.die();
            }

                //clear everything
                $("#bar").width('0%');

            },
            uploadProgress: function(event, position, total, percentComplete) 
            {
                $("#bar").width(percentComplete+'%');

            },
            success: function() 
            {
                $("#bar").width('100%');

            },
            complete: function(response) 
            {
                //alert("Sukses diupload");
                //window.responsefile = response.responseText;
                $("#updatefoto").modal("hide");

                notifikasi('Berhasil','Foto Profil berhasil diperbaharui','success');
                //window.location.reload();
            },
            error: function()
            {
                notifikasi('Error','File gagal diupload','fail');

            }

        }; 

        $("#form-simpanfile").ajaxForm(options);
    }

// PAGE RELATED SCRIPTS

function editfp () {
    $("#updatefoto").modal("show");
}

function notifikasi(title, msg, type) {
    if (type=='success') {
        var warna = '#296191';
        var icon = 'fa-save';
        var tombol = '<p><a onclick="refresh()" class="btn btn-warning">Refresh Halaman</a></p>';
    }

    else if(type=='cancel') {
        var warna = '#FEB00C;';
        var icon = 'fa-warning';
        var tombol = '';
    }

    else {
        var warna = '#B61F1F;';
        var icon = 'fa-warning';
        var tombol = '';
    }
    $.smallBox({
        title : title,
        content : "<i class='fa fa-clock-o'></i><i>"+msg+"</i>"+tombol+"",
            color : warna, // warna background
            iconSmall : "fa "+ icon +" bounce animated", // dengan animasi bounce
            timeout : 4000 // lama alert ditampilkan
        });

}
function refresh () {
    window.location.reload();
}

function detailpengaduan () {
    window.location.href = '#aset/pengaduan_masuk';
}

</script>
