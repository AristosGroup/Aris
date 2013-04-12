<?php

/**
 * This is the model class for table "issue_statuses".
 *
 * The followings are the available columns in table 'issue_statuses':
 * @property integer $id
 * @property string $name
 * @property integer $is_closed
 * @property integer $is_default
 * @property integer $position
 * @property integer $default_done_ratio
 * @property string $easy_color_scheme
 * @property string $easy_external_id
 */
class IssueStatus extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'issue_statuses';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('is_closed, is_default, position, default_done_ratio', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>30),
			array('easy_color_scheme, easy_external_id', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, is_closed, is_default, position, default_done_ratio, easy_color_scheme, easy_external_id', 'safe', 'on'=>'search'),
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
			'id' => 'ID',
			'name' => 'Name',
			'is_closed' => 'Is Closed',
			'is_default' => 'Is Default',
			'position' => 'Position',
			'default_done_ratio' => 'Default Done Ratio',
			'easy_color_scheme' => 'Easy Color Scheme',
			'easy_external_id' => 'Easy External',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('is_closed',$this->is_closed);
		$criteria->compare('is_default',$this->is_default);
		$criteria->compare('position',$this->position);
		$criteria->compare('default_done_ratio',$this->default_done_ratio);
		$criteria->compare('easy_color_scheme',$this->easy_color_scheme,true);
		$criteria->compare('easy_external_id',$this->easy_external_id,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return IssueStatus the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
