<?php
/* @var $this TblroleController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tblroles',
);

$this->menu=array(
	array('label'=>'Create Tblrole', 'url'=>array('create')),
	array('label'=>'Manage Tblrole', 'url'=>array('admin')),
);
?>

<h1>Tblroles</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
