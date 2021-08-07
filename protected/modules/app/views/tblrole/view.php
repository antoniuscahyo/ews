<?php
/* @var $this TblroleController */
/* @var $model Tblrole */

$this->breadcrumbs=array(
	'Tblroles'=>array('index'),
	$model->tblrole_id,
);

$this->menu=array(
	array('label'=>'List Tblrole', 'url'=>array('index')),
	array('label'=>'Create Tblrole', 'url'=>array('create')),
	array('label'=>'Update Tblrole', 'url'=>array('update', 'id'=>$model->tblrole_id)),
	array('label'=>'Delete Tblrole', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->tblrole_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Tblrole', 'url'=>array('admin')),
);
?>

<h1>View Tblrole #<?php echo $model->tblrole_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'tblrole_id',
		'tblrole_code',
		'tblrole_desc',
	),
)); ?>
