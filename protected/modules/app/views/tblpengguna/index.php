<?php
/* @var $this TblpenggunaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tblpenggunas',
);

$this->menu=array(
	array('label'=>'Create Tblpengguna', 'url'=>array('create')),
	array('label'=>'Manage Tblpengguna', 'url'=>array('admin')),
);
?>

<h1>Tblpenggunas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
