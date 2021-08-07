<?php
/* @var $this TblroleController */
/* @var $data Tblrole */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('tblrole_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->tblrole_id), array('view', 'id'=>$data->tblrole_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tblrole_code')); ?>:</b>
	<?php echo CHtml::encode($data->tblrole_code); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tblrole_desc')); ?>:</b>
	<?php echo CHtml::encode($data->tblrole_desc); ?>
	<br />


</div>