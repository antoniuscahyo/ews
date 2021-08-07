<?php
/* @var $this TblpenggunaController */
/* @var $model Tblpengguna */

$this->breadcrumbs=array(
	'Tblpenggunas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Tblpengguna', 'url'=>array('index')),
	array('label'=>'Manage Tblpengguna', 'url'=>array('admin')),
);
?>

<h1>Create Tblpengguna</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>