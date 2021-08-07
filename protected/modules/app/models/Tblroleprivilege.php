<?php

/**
 * This is the model class for table "tblroleprivilege".
 *
 * The followings are the available columns in table 'tblroleprivilege':
 * @property integer $tblroleprivilege_id
 * @property integer $tblrole_id
 * @property integer $tblmenu_id
 * @property string $tblroleprivilege_iscreate
 * @property string $tblroleprivilege_isupdate
 * @property string $tblroleprivilege_isdelete
 * @property string $tblroleprivilege_issearch
 * @property string $tblroleprivilege_isprint
 * @property string $tblroleprivilege_isshow
 */
class Tblroleprivilege extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tblroleprivilege';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tblrole_id, tblmenu_id', 'numerical', 'integerOnly'=>true),
			array('tblroleprivilege_iscreate, tblroleprivilege_isupdate, tblroleprivilege_isdelete, tblroleprivilege_issearch, tblroleprivilege_isprint, tblroleprivilege_isshow', 'length', 'max'=>1),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('tblroleprivilege_id, tblrole_id, tblmenu_id, tblroleprivilege_iscreate, tblroleprivilege_isupdate, tblroleprivilege_isdelete, tblroleprivilege_issearch, tblroleprivilege_isprint, tblroleprivilege_isshow', 'safe', 'on'=>'search'),
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
			'tblroleprivilege_id' => 'Tblroleprivilege',
			'tblrole_id' => 'Tblrole',
			'tblmenu_id' => 'Tblmenu',
			'tblroleprivilege_iscreate' => 'Tblroleprivilege Iscreate',
			'tblroleprivilege_isupdate' => 'Tblroleprivilege Isupdate',
			'tblroleprivilege_isdelete' => 'Tblroleprivilege Isdelete',
			'tblroleprivilege_issearch' => 'Tblroleprivilege Issearch',
			'tblroleprivilege_isprint' => 'Tblroleprivilege Isprint',
			'tblroleprivilege_isshow' => 'Tblroleprivilege Isshow',
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

		$criteria->compare('tblroleprivilege_id',$this->tblroleprivilege_id);
		$criteria->compare('tblrole_id',$this->tblrole_id);
		$criteria->compare('tblmenu_id',$this->tblmenu_id);
		$criteria->compare('tblroleprivilege_iscreate',$this->tblroleprivilege_iscreate,true);
		$criteria->compare('tblroleprivilege_isupdate',$this->tblroleprivilege_isupdate,true);
		$criteria->compare('tblroleprivilege_isdelete',$this->tblroleprivilege_isdelete,true);
		$criteria->compare('tblroleprivilege_issearch',$this->tblroleprivilege_issearch,true);
		$criteria->compare('tblroleprivilege_isprint',$this->tblroleprivilege_isprint,true);
		$criteria->compare('tblroleprivilege_isshow',$this->tblroleprivilege_isshow,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Tblroleprivilege the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
