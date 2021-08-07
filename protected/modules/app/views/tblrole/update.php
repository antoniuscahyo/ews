<?php
/* @var $this TblroleController */
/* @var $model Tblrole */

$this->breadcrumbs=array(
	'Tblroles'=>array('index'),
	$model->tblrole_id=>array('view','id'=>$model->tblrole_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Tblrole', 'url'=>array('index')),
	array('label'=>'Create Tblrole', 'url'=>array('create')),
	array('label'=>'View Tblrole', 'url'=>array('view', 'id'=>$model->tblrole_id)),
	array('label'=>'Manage Tblrole', 'url'=>array('admin')),
);
?>

<h1>Update Tblrole <?php echo $model->tblrole_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>