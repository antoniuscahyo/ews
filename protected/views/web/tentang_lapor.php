<div class="breadcumb-area bg-img" style="background-image: url(<?php echo Yii::app()->baseUrl; ?>/upload/kontent/header.jpg);">
    <div class="bradcumbContent">
        <h2>Tentang LAPOR !</h2>
    </div>
</div>

<section class="about-us-area mt-50 section-padding-100">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-12">
                <?php echo $data['tblwebkontent_isi'] ?>
            </div>

            <div class="col-12 col-md-12" style="margin-top: 25px;">
                <div style="text-align: center;">
                    <?php if (!empty($data['tblwebkontent_file'])) : ?>
                        <img style="max-height:300px; max-width:100%; padding: 10px; border: 1px solid #ccc; border-radius: 10px;" src="<?php echo Yii::app()->baseUrl; ?>/upload/kontent/<?php echo $data['tblwebkontent_file']; ?>">
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>