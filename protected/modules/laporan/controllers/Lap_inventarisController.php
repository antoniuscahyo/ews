<?php

class Lap_inventarisController extends Controller
{
	public function actionIndex()
	{
		$this->renderPartial('index');
	}

	public function actionCaridata()
	{
		$this->renderPartial('tbldata');
	}

	public function actionCetak()
	{
		$jenis 	= isset($_REQUEST['jenis']) ? trim($_REQUEST['jenis']) : '';
		switch ($jenis) {
			case 'excel':
			header('Content-Type: application/vnd.ms-excel');
			header('Content-Disposition: attachment; filename=Laporan_inventaris.xls');
			break;
			case 'word':
			header('Content-Type: application/vnd.ms-word');
			header('Content-Disposition: attachment; filename=Laporan_inventaris.doc');
			break;
			default:
				# code...
			break;
		}
		$this->renderPartial('cetak',array('data'=>$data));
	}

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}