<?php

/**
 * This is the model class for table "tblinventaris".
 *
 * The followings are the available columns in table 'tblinventaris':
 * @property integer $tblinventaris_id
 * @property string $tblinventaris_nomor
 * @property string $tblinventaris_namabarang
 * @property string $tblinventaris_spesifikasi
 * @property string $tblinventaris_kondisi
 * @property string $tblinventaris_file
 * @property integer $reftahun_id
 * @property integer $refruang_id
 * @property integer $refjenisaset_id
 * @property string $tblinventaris_modified
 * @property string $tblinventaris_created
 */
class Tblinventaris extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tblinventaris';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('reftahun_id, refruang_id, refjenisaset_id', 'numerical', 'integerOnly'=>true),
			array('tblinventaris_nomor, tblinventaris_namabarang, tblinventaris_kondisi, tblinventaris_file', 'length', 'max'=>255),
			array('tblinventaris_spesifikasi, tblinventaris_modified, tblinventaris_created', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('tblinventaris_id, tblinventaris_nomor, tblinventaris_namabarang, tblinventaris_spesifikasi, tblinventaris_kondisi, tblinventaris_file, reftahun_id, refruang_id, refjenisaset_id, tblinventaris_modified, tblinventaris_created', 'safe', 'on'=>'search'),
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
			'tblinventaris_id' => 'Tblinventaris',
			'tblinventaris_nomor' => 'Tblinventaris Nomor',
			'tblinventaris_namabarang' => 'Tblinventaris Namabarang',
			'tblinventaris_spesifikasi' => 'Tblinventaris Spesifikasi',
			'tblinventaris_kondisi' => 'Tblinventaris Kondisi',
			'tblinventaris_file' => 'Tblinventaris File',
			'reftahun_id' => 'Reftahun',
			'refruang_id' => 'Refruang',
			'refjenisaset_id' => 'Refjenisaset',
			'tblinventaris_modified' => 'Tblinventaris Modified',
			'tblinventaris_created' => 'Tblinventaris Created',
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

		$criteria->compare('tblinventaris_id',$this->tblinventaris_id);
		$criteria->compare('tblinventaris_nomor',$this->tblinventaris_nomor,true);
		$criteria->compare('tblinventaris_namabarang',$this->tblinventaris_namabarang,true);
		$criteria->compare('tblinventaris_spesifikasi',$this->tblinventaris_spesifikasi,true);
		$criteria->compare('tblinventaris_kondisi',$this->tblinventaris_kondisi,true);
		$criteria->compare('tblinventaris_file',$this->tblinventaris_file,true);
		$criteria->compare('reftahun_id',$this->reftahun_id);
		$criteria->compare('refruang_id',$this->refruang_id);
		$criteria->compare('refjenisaset_id',$this->refjenisaset_id);
		$criteria->compare('tblinventaris_modified',$this->tblinventaris_modified,true);
		$criteria->compare('tblinventaris_created',$this->tblinventaris_created,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Tblinventaris the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
