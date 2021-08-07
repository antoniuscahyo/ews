<?php

/**
 * This is the model class for table "tblwebkontentdownload".
 *
 * The followings are the available columns in table 'tblwebkontentdownload':
 * @property integer $tblwebkontentdownload_id
 * @property integer $tblwebkontent_id
 * @property string $tblwebkontentdownload_nama
 * @property string $tblwebkontentdownload_keterangan
 * @property string $tblwebkontentdownload_status
 */
class WebKontentDownload extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tblwebkontentdownload';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tblwebkontent_id', 'numerical', 'integerOnly'=>true),
			array('tblwebkontentdownload_nama', 'length', 'max'=>255),
			array('tblwebkontentdownload_status', 'length', 'max'=>1),
			array('tblwebkontentdownload_keterangan', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('tblwebkontentdownload_id, tblwebkontent_id, tblwebkontentdownload_nama, tblwebkontentdownload_keterangan, tblwebkontentdownload_status', 'safe', 'on'=>'search'),
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
			'tblwebkontentdownload_id' => 'Tblwebkontentdownload',
			'tblwebkontent_id' => 'Tblwebkontent',
			'tblwebkontentdownload_nama' => 'Tblwebkontentdownload Nama',
			'tblwebkontentdownload_keterangan' => 'Tblwebkontentdownload Keterangan',
			'tblwebkontentdownload_status' => 'Tblwebkontentdownload Status',
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

		$criteria->compare('tblwebkontentdownload_id',$this->tblwebkontentdownload_id);
		$criteria->compare('tblwebkontent_id',$this->tblwebkontent_id);
		$criteria->compare('tblwebkontentdownload_nama',$this->tblwebkontentdownload_nama,true);
		$criteria->compare('tblwebkontentdownload_keterangan',$this->tblwebkontentdownload_keterangan,true);
		$criteria->compare('tblwebkontentdownload_status',$this->tblwebkontentdownload_status,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return WebKontentDownload the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
