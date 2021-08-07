<?php
/* @var $this TblroleController */
/* @var $model Tblrole */

$this->breadcrumbs=array(
	'Tblroles'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Tblrole', 'url'=>array('index')),
	array('label'=>'Manage Tblrole', 'url'=>array('admin')),
);
?>

<h1>Create Tblrole</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>