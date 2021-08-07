<?php

/**
 * This is the model class for table "tblpengguna".
 *
 * The followings are the available columns in table 'tblpengguna':
 * @property integer $tblpengguna_id
 * @property string $tblpengguna_nama
 * @property string $tblpengguna_username
 * @property string $tblpengguna_email
 * @property string $tblpengguna_password
 * @property integer $tblrole_id
 * @property string $tblpengguna_idsubunit
 * @property string $tblpengguna_status
 * @property string $tblpengguna_modified
 * @property string $tblpengguna_created
 * @property string $tblpengguna_notelp
 */
class Tblpengguna extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tblpengguna';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	/*public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tblpengguna_nama, tblpengguna_username, tblpengguna_modified, tblpengguna_created', 'required'),
			array('tblrole_id', 'numerical', 'integerOnly'=>true),
			array('tblpengguna_nama, tblpengguna_username, tblpengguna_email, tblpengguna_password', 'length', 'max'=>255),
			array('tblpengguna_idsubunit', 'length', 'max'=>15),
			array('tblpengguna_status', 'length', 'max'=>1),
			array('tblpengguna_notelp', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('tblpengguna_id, tblpengguna_nama, tblpengguna_username, tblpengguna_email, tblpengguna_password, tblrole_id, tblpengguna_idsubunit, tblpengguna_status, tblpengguna_modified, tblpengguna_created, tblpengguna_notelp', 'safe', 'on'=>'search'),
		);
	}*/

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
			'tblpengguna_id' => 'Tblpengguna',
			'tblpengguna_nama' => 'Tblpengguna Nama',
			'tblpengguna_username' => 'Tblpengguna Username',
			'tblpengguna_email' => 'Tblpengguna Email',
			'tblpengguna_password' => 'Tblpengguna Password',
			'tblrole_id' => 'Tblrole',
			'tblpengguna_idsubunit' => 'Tblpengguna Idsubunit',
			'tblpengguna_status' => 'Tblpengguna Status',
			'tblpengguna_modified' => 'Tblpengguna Modified',
			'tblpengguna_created' => 'Tblpengguna Created',
			'tblpengguna_notelp' => 'Tblpengguna Notelp',
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

		$criteria->compare('tblpengguna_id',$this->tblpengguna_id);
		$criteria->compare('tblpengguna_nama',$this->tblpengguna_nama,true);
		$criteria->compare('tblpengguna_username',$this->tblpengguna_username,true);
		$criteria->compare('tblpengguna_email',$this->tblpengguna_email,true);
		$criteria->compare('tblpengguna_password',$this->tblpengguna_password,true);
		$criteria->compare('tblrole_id',$this->tblrole_id);
		$criteria->compare('tblpengguna_idsubunit',$this->tblpengguna_idsubunit,true);
		$criteria->compare('tblpengguna_status',$this->tblpengguna_status,true);
		$criteria->compare('tblpengguna_modified',$this->tblpengguna_modified,true);
		$criteria->compare('tblpengguna_created',$this->tblpengguna_created,true);
		$criteria->compare('tblpengguna_notelp',$this->tblpengguna_notelp,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Tblpengguna the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
