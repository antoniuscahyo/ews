<?php
/* @var $this TblpenggunaController */
/* @var $model Tblpengguna */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'tblpengguna_id'); ?>
		<?php echo $form->textField($model,'tblpengguna_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tblpengguna_nama'); ?>
		<?php echo $form->textField($model,'tblpengguna_nama',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tblpengguna_username'); ?>
		<?php echo $form->textField($model,'tblpengguna_username',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tblrole_id'); ?>
		<?php echo $form->textField($model,'tblrole_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tblpengguna_idsubunit'); ?>
		<?php echo $form->textField($model,'tblpengguna_idsubunit',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tblpengguna_status'); ?>
		<?php echo $form->textField($model,'tblpengguna_status',array('size'=>1,'maxlength'=>1)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tblpengguna_modified'); ?>
		<?php echo $form->textField($model,'tblpengguna_modified'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tblpengguna_created'); ?>
		<?php echo $form->textField($model,'tblpengguna_created'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->