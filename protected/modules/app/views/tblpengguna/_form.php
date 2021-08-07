<?php
/* @var $this TblpenggunaController */
/* @var $model Tblpengguna */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tblpengguna-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'tblpengguna_nama'); ?>
		<?php echo $form->textField($model,'tblpengguna_nama',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'tblpengguna_nama'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tblpengguna_username'); ?>
		<?php echo $form->textField($model,'tblpengguna_username',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'tblpengguna_username'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tblpengguna_password'); ?>
		<?php echo $form->textField($model,'tblpengguna_password',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'tblpengguna_password'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tblrole_id'); ?>
		<?php echo $form->textField($model,'tblrole_id'); ?>
		<?php echo $form->error($model,'tblrole_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tblpengguna_idsubunit'); ?>
		<?php echo $form->textField($model,'tblpengguna_idsubunit',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'tblpengguna_idsubunit'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tblpengguna_status'); ?>
		<?php echo $form->textField($model,'tblpengguna_status',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'tblpengguna_status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tblpengguna_modified'); ?>
		<?php echo $form->textField($model,'tblpengguna_modified'); ?>
		<?php echo $form->error($model,'tblpengguna_modified'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tblpengguna_created'); ?>
		<?php echo $form->textField($model,'tblpengguna_created'); ?>
		<?php echo $form->error($model,'tblpengguna_created'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->