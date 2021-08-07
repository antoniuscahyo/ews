<?php
/* @var $this TblpenggunaController */
/* @var $model Tblpengguna */

$this->breadcrumbs=array(
	'Tblpenggunas'=>array('index'),
	$model->tblpengguna_id=>array('view','id'=>$model->tblpengguna_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Tblpengguna', 'url'=>array('index')),
	array('label'=>'Create Tblpengguna', 'url'=>array('create')),
	array('label'=>'View Tblpengguna', 'url'=>array('view', 'id'=>$model->tblpengguna_id)),
	array('label'=>'Manage Tblpengguna', 'url'=>array('admin')),
);
?>

<h1>Update Tblpengguna <?php echo $model->tblpengguna_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>