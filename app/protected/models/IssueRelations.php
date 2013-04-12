<?php

/**
 * This is the model class for table "issue_relations".
 *
 * The followings are the available columns in table 'issue_relations':
 * @property integer $id
 * @property integer $issue_from_id
 * @property integer $issue_to_id
 * @property string $relation_type
 * @property integer $delay
 */
class IssueRelations extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'issue_relations';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('issue_from_id, issue_to_id', 'required'),
			array('issue_from_id, issue_to_id, delay', 'numerical', 'integerOnly'=>true),
			array('relation_type', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, issue_from_id, issue_to_id, relation_type, delay', 'safe', 'on'=>'search'),
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
			'issue_from_id' => 'Issue From',
			'issue_to_id' => 'Issue To',
			'relation_type' => 'Relation Type',
			'delay' => 'Delay',
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
		$criteria->compare('issue_from_id',$this->issue_from_id);
		$criteria->compare('issue_to_id',$this->issue_to_id);
		$criteria->compare('relation_type',$this->relation_type,true);
		$criteria->compare('delay',$this->delay);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return IssueRelations the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
