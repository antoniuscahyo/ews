<?php
/* @var $this TblpenggunaController */
/* @var $data Tblpengguna */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('tblpengguna_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->tblpengguna_id), array('view', 'id'=>$data->tblpengguna_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tblpengguna_nama')); ?>:</b>
	<?php echo CHtml::encode($data->tblpengguna_nama); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tblpengguna_username')); ?>:</b>
	<?php echo CHtml::encode($data->tblpengguna_username); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tblpengguna_password')); ?>:</b>
	<?php echo CHtml::encode($data->tblpengguna_password); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tblrole_id')); ?>:</b>
	<?php echo CHtml::encode($data->tblrole_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tblpengguna_idsubunit')); ?>:</b>
	<?php echo CHtml::encode($data->tblpengguna_idsubunit); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tblpengguna_status')); ?>:</b>
	<?php echo CHtml::encode($data->tblpengguna_status); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('tblpengguna_modified')); ?>:</b>
	<?php echo CHtml::encode($data->tblpengguna_modified); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tblpengguna_created')); ?>:</b>
	<?php echo CHtml::encode($data->tblpengguna_created); ?>
	<br />

	*/ ?>

</div>