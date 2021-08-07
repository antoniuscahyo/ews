<?php
/* @var $this TblpenggunaController */
/* @var $model Tblpengguna */

$this->breadcrumbs=array(
	'Tblpenggunas'=>array('index'),
	$model->tblpengguna_id,
);

$this->menu=array(
	array('label'=>'List Tblpengguna', 'url'=>array('index')),
	array('label'=>'Create Tblpengguna', 'url'=>array('create')),
	array('label'=>'Update Tblpengguna', 'url'=>array('update', 'id'=>$model->tblpengguna_id)),
	array('label'=>'Delete Tblpengguna', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->tblpengguna_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Tblpengguna', 'url'=>array('admin')),
);
?>

<h1>View Tblpengguna #<?php echo $model->tblpengguna_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'tblpengguna_id',
		'tblpengguna_nama',
		'tblpengguna_username',
		'tblpengguna_password',
		'tblrole_id',
		'tblpengguna_idsubunit',
		'tblpengguna_status',
		'tblpengguna_modified',
		'tblpengguna_created',
	),
)); ?>
