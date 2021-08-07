<?php

/**
 * This is the model class for table "tblslidertext".
 *
 * The followings are the available columns in table 'tblslidertext':
 * @property integer $tblslidertext_id
 * @property integer $tblslider_id
 * @property string $tblslidertext_teks
 * @property string $tblslidertext_delay
 */
class SliderText extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tblslidertext';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tblslider_id', 'required'),
			array('tblslider_id', 'numerical', 'integerOnly'=>true),
			array('tblslidertext_delay', 'length', 'max'=>255),
			array('tblslidertext_teks', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('tblslidertext_id, tblslider_id, tblslidertext_teks, tblslidertext_delay', 'safe', 'on'=>'search'),
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
			'tblslidertext_id' => 'Tblslidertext',
			'tblslider_id' => 'Tblslider',
			'tblslidertext_teks' => 'Tblslidertext Teks',
			'tblslidertext_delay' => 'Tblslidertext Delay',
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

		$criteria->compare('tblslidertext_id',$this->tblslidertext_id);
		$criteria->compare('tblslider_id',$this->tblslider_id);
		$criteria->compare('tblslidertext_teks',$this->tblslidertext_teks,true);
		$criteria->compare('tblslidertext_delay',$this->tblslidertext_delay,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return SliderText the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
