<?php

/**
 * This is the model class for table "refjenisaset".
 *
 * The followings are the available columns in table 'refjenisaset':
 * @property integer $refjenisaset_id
 * @property string $refjenisaset_nama
 * @property string $refjenisaset_status
 * @property string $refjenisaset_sysinsert
 * @property string $refjenisaset_sysupdate
 */
class Refjenisaset extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'refjenisaset';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('refjenisaset_nama', 'length', 'max'=>255),
			array('refjenisaset_status', 'length', 'max'=>1),
			array('refjenisaset_sysinsert, refjenisaset_sysupdate', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('refjenisaset_id, refjenisaset_nama, refjenisaset_status, refjenisaset_sysinsert, refjenisaset_sysupdate', 'safe', 'on'=>'search'),
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
			'refjenisaset_id' => 'Refjenisaset',
			'refjenisaset_nama' => 'Refjenisaset Nama',
			'refjenisaset_status' => 'Refjenisaset Status',
			'refjenisaset_sysinsert' => 'Refjenisaset Sysinsert',
			'refjenisaset_sysupdate' => 'Refjenisaset Sysupdate',
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

		$criteria->compare('refjenisaset_id',$this->refjenisaset_id);
		$criteria->compare('refjenisaset_nama',$this->refjenisaset_nama,true);
		$criteria->compare('refjenisaset_status',$this->refjenisaset_status,true);
		$criteria->compare('refjenisaset_sysinsert',$this->refjenisaset_sysinsert,true);
		$criteria->compare('refjenisaset_sysupdate',$this->refjenisaset_sysupdate,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Refjenisaset the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
