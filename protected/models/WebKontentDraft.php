<?php

/**
 * This is the model class for table "tblwebkontent_draft".
 *
 * The followings are the available columns in table 'tblwebkontent_draft':
 * @property integer $tblwebkontent_id
 * @property integer $tblwebmenu_id
 * @property integer $tblwebmodul_id
 * @property string $tblwebkontent_judul
 * @property string $tblwebkontent_isi
 * @property string $tblwebkontent_file
 * @property integer $tblwebkontent_klik
 * @property string $tblwebkontent_sysinsert
 * @property string $tblwebkontent_mode
 * @property integer $tblpengguna_id
 * @property string $tblwebkontent_status
 * @property string $tblwebkontent_isadafile
 * @property string $tblwebkontent_isditransfer
 */
class WebKontentDraft extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tblwebkontent_draft';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tblwebmenu_id, tblwebmodul_id, tblwebkontent_klik, tblpengguna_id', 'numerical', 'integerOnly'=>true),
			array('tblwebkontent_judul, tblwebkontent_file, tblwebkontent_mode, tblwebkontent_isadafile', 'length', 'max'=>255),
			array('tblwebkontent_status, tblwebkontent_isditransfer', 'length', 'max'=>1),
			array('tblwebkontent_isi, tblwebkontent_sysinsert', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('tblwebkontent_id, tblwebmenu_id, tblwebmodul_id, tblwebkontent_judul, tblwebkontent_isi, tblwebkontent_file, tblwebkontent_klik, tblwebkontent_sysinsert, tblwebkontent_mode, tblpengguna_id, tblwebkontent_status, tblwebkontent_isadafile, tblwebkontent_isditransfer', 'safe', 'on'=>'search'),
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
			'tblwebkontent_id' => 'Tblwebkontent',
			'tblwebmenu_id' => 'Tblwebmenu',
			'tblwebmodul_id' => 'Tblwebmodul',
			'tblwebkontent_judul' => 'Tblwebkontent Judul',
			'tblwebkontent_isi' => 'Tblwebkontent Isi',
			'tblwebkontent_file' => 'Tblwebkontent File',
			'tblwebkontent_klik' => 'Tblwebkontent Klik',
			'tblwebkontent_sysinsert' => 'Tblwebkontent Sysinsert',
			'tblwebkontent_mode' => 'Tblwebkontent Mode',
			'tblpengguna_id' => 'Tblpengguna',
			'tblwebkontent_status' => 'Tblwebkontent Status',
			'tblwebkontent_isadafile' => 'Tblwebkontent Isadafile',
			'tblwebkontent_isditransfer' => 'Tblwebkontent Isditransfer',
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

		$criteria->compare('tblwebkontent_id',$this->tblwebkontent_id);
		$criteria->compare('tblwebmenu_id',$this->tblwebmenu_id);
		$criteria->compare('tblwebmodul_id',$this->tblwebmodul_id);
		$criteria->compare('tblwebkontent_judul',$this->tblwebkontent_judul,true);
		$criteria->compare('tblwebkontent_isi',$this->tblwebkontent_isi,true);
		$criteria->compare('tblwebkontent_file',$this->tblwebkontent_file,true);
		$criteria->compare('tblwebkontent_klik',$this->tblwebkontent_klik);
		$criteria->compare('tblwebkontent_sysinsert',$this->tblwebkontent_sysinsert,true);
		$criteria->compare('tblwebkontent_mode',$this->tblwebkontent_mode,true);
		$criteria->compare('tblpengguna_id',$this->tblpengguna_id);
		$criteria->compare('tblwebkontent_status',$this->tblwebkontent_status,true);
		$criteria->compare('tblwebkontent_isadafile',$this->tblwebkontent_isadafile,true);
		$criteria->compare('tblwebkontent_isditransfer',$this->tblwebkontent_isditransfer,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return WebKontentDraft the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
