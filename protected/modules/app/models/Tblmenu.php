<?php

/**
 * This is the model class for table "tblmenu".
 *
 * The followings are the available columns in table 'tblmenu':
 * @property integer $tblmenu_id
 * @property integer $tblmenu_urutan
 * @property string $tblmenu_kode
 * @property string $tblmenu_title
 * @property string $tblmenu_icon
 * @property string $tblmenu_link
 * @property integer $tblmenu_idparent
 * @property string $tblmenu_status
 */
class Tblmenu extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tblmenu';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tblmenu_urutan, tblmenu_idparent', 'numerical', 'integerOnly'=>true),
			array('tblmenu_kode, tblmenu_title, tblmenu_icon, tblmenu_link', 'length', 'max'=>255),
			array('tblmenu_status', 'length', 'max'=>6),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('tblmenu_id, tblmenu_urutan, tblmenu_kode, tblmenu_title, tblmenu_icon, tblmenu_link, tblmenu_idparent, tblmenu_status', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'tblmenu_id' => 'Tblmenu',
			'tblmenu_urutan' => 'Tblmenu Urutan',
			'tblmenu_kode' => 'Tblmenu Kode',
			'tblmenu_title' => 'Tblmenu Title',
			'tblmenu_icon' => 'Tblmenu Icon',
			'tblmenu_link' => 'Tblmenu Link',
			'tblmenu_idparent' => 'Tblmenu Idparent',
			'tblmenu_status' => 'Tblmenu Status',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('tblmenu_id',$this->tblmenu_id);
		$criteria->compare('tblmenu_urutan',$this->tblmenu_urutan);
		$criteria->compare('tblmenu_kode',$this->tblmenu_kode,true);
		$criteria->compare('tblmenu_title',$this->tblmenu_title,true);
		$criteria->compare('tblmenu_icon',$this->tblmenu_icon,true);
		$criteria->compare('tblmenu_link',$this->tblmenu_link,true);
		$criteria->compare('tblmenu_idparent',$this->tblmenu_idparent);
		$criteria->compare('tblmenu_status',$this->tblmenu_status,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Tblmenu the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	function buildTree(array $elements, $parentId = 0) {
	    $branch = array();

	    foreach ($elements as $element) {
	    	//print_r($elements);die();
	        if ($element['tblmenu_idparent'] == $parentId) {
	        	//print_r($elements);die();
	        	//echo $element['tblmenu_id'];die();
	            $children = $this->buildTree($elements, $element['tblmenu_id']);
	            if ($children) {
	                $element['sub'] = $children;
	            }
	            $branch[ $element['tblmenu_kode'] ] = $element;
	        }
	    }

	    return $branch;
	}

	public function genMenu($role_id)
	{
		$data = Yii::app()->db->createCommand(
			"SELECT 
			tblmenu_id,
			tblmenu_kode,
			tblmenu_title AS title,
			tblmenu_link AS url,
			tblmenu_icon AS icon, 
			tblmenu_idparent
			FROM vtblrolemenu
			WHERE 
			tblrole_id=".$role_id." AND tblroleprivilege_isshow='T'
			ORDER BY tblmenu_kode
		")->queryAll();
		$hasil = $this->buildTree($data);
		//print_r($hasil);
		return $hasil;
	}
}
