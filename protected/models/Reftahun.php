<?php

/**
 * This is the model class for table "reftahun".
 *
 * The followings are the available columns in table 'reftahun':
 * @property integer $reftahun_id
 * @property string $reftahun_nama
 * @property string $reftahun_status
 * @property string $reftahun_sysinsert
 * @property string $reftahun_sysupdate
 */
class Reftahun extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'reftahun';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('reftahun_nama', 'length', 'max'=>255),
			array('reftahun_status', 'length', 'max'=>1),
			array('reftahun_sysinsert, reftahun_sysupdate', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('reftahun_id, reftahun_nama, reftahun_status, reftahun_sysinsert, reftahun_sysupdate', 'safe', 'on'=>'search'),
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
			'reftahun_id' => 'Reftahun',
			'reftahun_nama' => 'Reftahun Nama',
			'reftahun_status' => 'Reftahun Status',
			'reftahun_sysinsert' => 'Reftahun Sysinsert',
			'reftahun_sysupdate' => 'Reftahun Sysupdate',
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

		$criteria->compare('reftahun_id',$this->reftahun_id);
		$criteria->compare('reftahun_nama',$this->reftahun_nama,true);
		$criteria->compare('reftahun_status',$this->reftahun_status,true);
		$criteria->compare('reftahun_sysinsert',$this->reftahun_sysinsert,true);
		$criteria->compare('reftahun_sysupdate',$this->reftahun_sysupdate,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Reftahun the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
