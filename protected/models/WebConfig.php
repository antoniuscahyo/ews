<?php

/**
 * This is the model class for table "tblwebconfig".
 *
 * The followings are the available columns in table 'tblwebconfig':
 * @property integer $tblwebconfig_id
 * @property string $tblwebconfig_nama
 * @property string $tblwebconfig_instansi
 * @property string $tblwebconfig_pemerintah
 * @property string $tblwebconfig_logo
 * @property string $tblwebconfig_alamat
 * @property string $tblwebconfig_telp
 * @property string $tblwebconfig_fax
 * @property string $tblwebconfig_email
 * @property string $tblwebconfig_kodepos
 * @property string $tblwebconfig_barcode
 */
class WebConfig extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tblwebconfig';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tblwebconfig_nama, tblwebconfig_instansi, tblwebconfig_pemerintah, tblwebconfig_logo, tblwebconfig_alamat, tblwebconfig_telp, tblwebconfig_fax, tblwebconfig_email, tblwebconfig_kodepos, tblwebconfig_barcode', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('tblwebconfig_id, tblwebconfig_nama, tblwebconfig_instansi, tblwebconfig_pemerintah, tblwebconfig_logo, tblwebconfig_alamat, tblwebconfig_telp, tblwebconfig_fax, tblwebconfig_email, tblwebconfig_kodepos, tblwebconfig_barcode', 'safe', 'on'=>'search'),
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
			'tblwebconfig_id' => 'Tblwebconfig',
			'tblwebconfig_nama' => 'Tblwebconfig Nama',
			'tblwebconfig_instansi' => 'Tblwebconfig Instansi',
			'tblwebconfig_pemerintah' => 'Tblwebconfig Pemerintah',
			'tblwebconfig_logo' => 'Tblwebconfig Logo',
			'tblwebconfig_alamat' => 'Tblwebconfig Alamat',
			'tblwebconfig_telp' => 'Tblwebconfig Telp',
			'tblwebconfig_fax' => 'Tblwebconfig Fax',
			'tblwebconfig_email' => 'Tblwebconfig Email',
			'tblwebconfig_kodepos' => 'Tblwebconfig Kodepos',
			'tblwebconfig_barcode' => 'Tblwebconfig Barcode',
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

		$criteria->compare('tblwebconfig_id',$this->tblwebconfig_id);
		$criteria->compare('tblwebconfig_nama',$this->tblwebconfig_nama,true);
		$criteria->compare('tblwebconfig_instansi',$this->tblwebconfig_instansi,true);
		$criteria->compare('tblwebconfig_pemerintah',$this->tblwebconfig_pemerintah,true);
		$criteria->compare('tblwebconfig_logo',$this->tblwebconfig_logo,true);
		$criteria->compare('tblwebconfig_alamat',$this->tblwebconfig_alamat,true);
		$criteria->compare('tblwebconfig_telp',$this->tblwebconfig_telp,true);
		$criteria->compare('tblwebconfig_fax',$this->tblwebconfig_fax,true);
		$criteria->compare('tblwebconfig_email',$this->tblwebconfig_email,true);
		$criteria->compare('tblwebconfig_kodepos',$this->tblwebconfig_kodepos,true);
		$criteria->compare('tblwebconfig_barcode',$this->tblwebconfig_barcode,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return WebConfig the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
