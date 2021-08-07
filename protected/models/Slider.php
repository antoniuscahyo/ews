<?php

/**
 * This is the model class for table "tblslider".
 *
 * The followings are the available columns in table 'tblslider':
 * @property integer $tblslider_id
 * @property string $tblslider_gambar
 * @property integer $tblslider_posisix
 * @property integer $tblslider_posisiy
 * @property string $tblslider_text
 * @property string $tblslider_animasi
 * @property string $tblslider_status
 */
class Slider extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tblslider';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tblslider_status', 'required'),
			array('tblslider_posisix, tblslider_posisiy', 'numerical', 'integerOnly'=>true),
			array('tblslider_gambar, tblslider_text', 'length', 'max'=>255),
			array('tblslider_status', 'length', 'max'=>1),
			array('tblslider_animasi', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('tblslider_id, tblslider_gambar, tblslider_posisix, tblslider_posisiy, tblslider_text, tblslider_animasi, tblslider_status', 'safe', 'on'=>'search'),
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
			'tblslider_id' => 'Tblslider',
			'tblslider_gambar' => 'Tblslider Gambar',
			'tblslider_posisix' => 'Tblslider Posisix',
			'tblslider_posisiy' => 'Tblslider Posisiy',
			'tblslider_text' => 'Tblslider Text',
			'tblslider_animasi' => 'Tblslider Animasi',
			'tblslider_status' => 'Tblslider Status',
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

		$criteria->compare('tblslider_id',$this->tblslider_id);
		$criteria->compare('tblslider_gambar',$this->tblslider_gambar,true);
		$criteria->compare('tblslider_posisix',$this->tblslider_posisix);
		$criteria->compare('tblslider_posisiy',$this->tblslider_posisiy);
		$criteria->compare('tblslider_text',$this->tblslider_text,true);
		$criteria->compare('tblslider_animasi',$this->tblslider_animasi,true);
		$criteria->compare('tblslider_status',$this->tblslider_status,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Slider the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	public function getAll()
	{
		$model = Slider::model()->findAll('tblslider_status=:stat', array(':stat'=>'T'));
		return $model;
	}
}
