<?php

/**
 * This is the model class for table "refruang".
 *
 * The followings are the available columns in table 'refruang':
 * @property integer $refruang_id
 * @property string $refruang_nama
 * @property string $refruang_status
 * @property string $refruang_sysinsert
 * @property string $refruang_sysupdate
 */
class Refruang extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'refruang';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('refruang_nama', 'length', 'max'=>255),
			array('refruang_status', 'length', 'max'=>1),
			array('refruang_sysinsert, refruang_sysupdate', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('refruang_id, refruang_nama, refruang_status, refruang_sysinsert, refruang_sysupdate', 'safe', 'on'=>'search'),
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
			'refruang_id' => 'Refruang',
			'refruang_nama' => 'Refruang Nama',
			'refruang_status' => 'Refruang Status',
			'refruang_sysinsert' => 'Refruang Sysinsert',
			'refruang_sysupdate' => 'Refruang Sysupdate',
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

		$criteria->compare('refruang_id',$this->refruang_id);
		$criteria->compare('refruang_nama',$this->refruang_nama,true);
		$criteria->compare('refruang_status',$this->refruang_status,true);
		$criteria->compare('refruang_sysinsert',$this->refruang_sysinsert,true);
		$criteria->compare('refruang_sysupdate',$this->refruang_sysupdate,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Refruang the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
