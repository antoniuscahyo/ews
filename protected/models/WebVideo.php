<?php

/**
 * This is the model class for table "tblwebvideo".
 *
 * The followings are the available columns in table 'tblwebvideo':
 * @property integer $tblwebvideo_id
 * @property integer $tblwebgroupvideo_id
 * @property string $tblwebvideo_nama
 * @property string $tblwebvideo_keterangan
 * @property string $tblwebvideo_mode
 * @property string $tblwebvideo_link
 * @property string $tblwebvideo_file
 * @property string $tblwebvideo_status
 */
class WebVideo extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tblwebvideo';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tblwebgroupvideo_id', 'numerical', 'integerOnly'=>true),
			array('tblwebvideo_nama, tblwebvideo_link, tblwebvideo_file', 'length', 'max'=>255),
			array('tblwebvideo_mode', 'length', 'max'=>6),
			array('tblwebvideo_status', 'length', 'max'=>1),
			array('tblwebvideo_keterangan', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('tblwebvideo_id, tblwebgroupvideo_id, tblwebvideo_nama, tblwebvideo_keterangan, tblwebvideo_mode, tblwebvideo_link, tblwebvideo_file, tblwebvideo_status', 'safe', 'on'=>'search'),
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
			'tblwebvideo_id' => 'Tblwebvideo',
			'tblwebgroupvideo_id' => 'Tblwebgroupvideo',
			'tblwebvideo_nama' => 'Tblwebvideo Nama',
			'tblwebvideo_keterangan' => 'Tblwebvideo Keterangan',
			'tblwebvideo_mode' => 'Tblwebvideo Mode',
			'tblwebvideo_link' => 'Tblwebvideo Link',
			'tblwebvideo_file' => 'Tblwebvideo File',
			'tblwebvideo_status' => 'Tblwebvideo Status',
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

		$criteria->compare('tblwebvideo_id',$this->tblwebvideo_id);
		$criteria->compare('tblwebgroupvideo_id',$this->tblwebgroupvideo_id);
		$criteria->compare('tblwebvideo_nama',$this->tblwebvideo_nama,true);
		$criteria->compare('tblwebvideo_keterangan',$this->tblwebvideo_keterangan,true);
		$criteria->compare('tblwebvideo_mode',$this->tblwebvideo_mode,true);
		$criteria->compare('tblwebvideo_link',$this->tblwebvideo_link,true);
		$criteria->compare('tblwebvideo_file',$this->tblwebvideo_file,true);
		$criteria->compare('tblwebvideo_status',$this->tblwebvideo_status,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return WebVideo the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
