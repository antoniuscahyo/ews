<?php

/**
 * This is the model class for table "tblwebmenu".
 *
 * The followings are the available columns in table 'tblwebmenu':
 * @property integer $tblwebmenu_id
 * @property string $tblwebmenu_nama
 * @property string $tblwebmenu_kode
 * @property string $tblwebmenu_parent
 * @property string $tblwebmenu_icon
 * @property string $tblwebmenu_isparent
 * @property string $tblwebmenu_mode
 * @property integer $tblwebmodul_id
 * @property string $tblwebmenu_link
 * @property string $tblwebmenu_status
 */
class Webmenu extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tblwebmenu';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tblwebmodul_id', 'numerical', 'integerOnly'=>true),
			array('tblwebmenu_nama, tblwebmenu_kode, tblwebmenu_parent, tblwebmenu_icon, tblwebmenu_mode, tblwebmenu_link', 'length', 'max'=>255),
			array('tblwebmenu_isparent, tblwebmenu_status', 'length', 'max'=>1),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('tblwebmenu_id, tblwebmenu_nama, tblwebmenu_kode, tblwebmenu_parent, tblwebmenu_icon, tblwebmenu_isparent, tblwebmenu_mode, tblwebmodul_id, tblwebmenu_link, tblwebmenu_status', 'safe', 'on'=>'search'),
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
			'tblwebmenu_id' => 'Tblwebmenu',
			'tblwebmenu_nama' => 'Tblwebmenu Nama',
			'tblwebmenu_kode' => 'Tblwebmenu Kode',
			'tblwebmenu_parent' => 'Tblwebmenu Parent',
			'tblwebmenu_icon' => 'Tblwebmenu Icon',
			'tblwebmenu_isparent' => 'Tblwebmenu Isparent',
			'tblwebmenu_mode' => 'Tblwebmenu Mode',
			'tblwebmodul_id' => 'Tblwebmodul',
			'tblwebmenu_link' => 'Tblwebmenu Link',
			'tblwebmenu_status' => 'Tblwebmenu Status',
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

		$criteria->compare('tblwebmenu_id',$this->tblwebmenu_id);
		$criteria->compare('tblwebmenu_nama',$this->tblwebmenu_nama,true);
		$criteria->compare('tblwebmenu_kode',$this->tblwebmenu_kode,true);
		$criteria->compare('tblwebmenu_parent',$this->tblwebmenu_parent,true);
		$criteria->compare('tblwebmenu_icon',$this->tblwebmenu_icon,true);
		$criteria->compare('tblwebmenu_isparent',$this->tblwebmenu_isparent,true);
		$criteria->compare('tblwebmenu_mode',$this->tblwebmenu_mode,true);
		$criteria->compare('tblwebmodul_id',$this->tblwebmodul_id);
		$criteria->compare('tblwebmenu_link',$this->tblwebmenu_link,true);
		$criteria->compare('tblwebmenu_status',$this->tblwebmenu_status,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Webmenu the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	public function getParent()
	{
		$model = Webmenu::model()->findAll('tblwebmenu_status=:stat AND tblwebmenu_parent=:parent ORDER BY tblwebmenu_urutan ASC', array(':stat'=>'T',':parent'=>0));
		return $model;
	}
}
