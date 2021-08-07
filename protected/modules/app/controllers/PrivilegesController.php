<?php

class PrivilegesController extends Controller
{
	public function actionIndex()
	{
		$data['theme_baseurl'] = Yii::app()->theme->baseUrl;

		$data['dataakses']=Yii::app()->db->createCommand()
		->select('tblrole_id AS id,
			tblrole_code AS kode')
		->from('tblrole')
		->queryAll();
		$this->renderPartial('index', array('data'=>$data));
	}

	public function actionAturHakAkses()
	{
		$data = json_decode(stripslashes($_POST['datacheck']));
		$idgrup = trim($_POST['idgrup']);

		foreach ($data as $list => $val) {
			// echo $list .'=>'.$val."\n";
			$model = Tblroleprivilege::model()->findByPk($list);
			$model->tblroleprivilege_isshow = $val;
			if ($model->save()) {
				echo "success";
			}
			else {

			}
		}
		
	}

	public function actionlistAkses()
	{
		if(!Yii::app()->request->isPostRequest)
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
		$id = (int) ($_POST['id']);


		$data['tree_menu'] = $this->genMenu($id);

		$role_info = Tblrole::model()->findByPk($id);

		$resnama = $role_info;

		$this->renderPartial('listhakakses', array('data'=>$data, 'judul'=>$resnama));
	}

	public function genMenu($role_id)
	{
		$data = Yii::app()->db->createCommand()
		->select('tblmenu.tblmenu_id AS menu_id,
			tblmenu.tblmenu_id,
			tblmenu_kode,
			tblmenu_kode AS kode,
			tblmenu_title AS title,
			tblmenu_link AS url,
			tblmenu_icon AS icon, 
			tblmenu_idparent,
			tblroleprivilege_id AS id,
			tblroleprivilege_isshow,
			tblrole_id
			')
		->from('tblroleprivilege')
		->join('tblmenu','tblroleprivilege.tblmenu_id = tblmenu.tblmenu_id')
		->where('tblrole_id = '.$role_id)
		->order('tblmenu_kode ASC')
		->queryAll();
		$hasil = Tblmenu::model()->buildTree($data);
		//print_r($hasil);
		return $hasil;
	}
}