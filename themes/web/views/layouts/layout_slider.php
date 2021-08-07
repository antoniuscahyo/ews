<div class="hero-slides owl-carousel">
   
    <!-- Single Hero Slide -->
    <?php $slider = Slider::model()->findAll('tblslider_status=:stat ORDER BY tblslider_id DESC',array(':stat'=>'T')); ?>
    <?php foreach ($slider as $list):?>
    <div class="single-hero-slide bg-img" style="background-image: url(<?php echo Yii::app()->baseUrl; ?>/upload/slider/<?php echo $list['tblslider_gambar'] ?>);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="hero-slides-content">
                        <?php foreach (SliderText::model()->findAll('tblslider_id=:id',array(':id'=>$list['tblslider_id'])) as $teks):?>
                        <?php $delay = !empty($teks['tblslidertext_delay']) ? $teks['tblslidertext_delay'].'ms' : '0ms' ?>
                        <h4 data-animation="fadeInUp" data-delay="<?php echo $delay ?>"><?php echo $teks['tblslidertext_teks'] ?></h4>
                        <?php endforeach; ?>
                        <!-- <h4 data-animation="fadeInUp" data-delay="100ms">Dinas Kesehatan Kabupaten Musi Banyuasin</h4> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endforeach; ?> 

</div>

<div id="mymodal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button class="close" type="button" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <div style="text-align: center;">
            <img style="width: 50%" src="<?php echo Yii::app()->baseUrl; ?>/upload/galeri/logoupy.png">
            <br><br>
            <h4>Layanan Pengaduan Online Inventarisasi</h4>
            <p>Sampaikan Laporan Anda langsung jika menemukan kerusakan terhadap barang inventaris dari Fakultas Sains & Teknologi</p>
        </div>
      </div>
    </div>
  </div>
</div>


<script type="text/javascript">

  $(document).ready(function () {
        $("#mymodal").modal("show");
    });

</script>