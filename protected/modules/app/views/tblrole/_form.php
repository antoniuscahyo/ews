<?php
/* @var $this TblroleController */
/* @var $model Tblrole */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tblrole-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'tblrole_code'); ?>
		<?php echo $form->textField($model,'tblrole_code',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'tblrole_code'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tblrole_desc'); ?>
		<?php echo $form->textField($model,'tblrole_desc',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'tblrole_desc'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->