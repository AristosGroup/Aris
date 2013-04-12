<?php

/**
 * This is the model class for table "workflows".
 *
 * The followings are the available columns in table 'workflows':
 * @property integer $id
 * @property integer $tracker_id
 * @property integer $old_status_id
 * @property integer $new_status_id
 * @property integer $role_id
 * @property integer $assignee
 * @property integer $author
 * @property string $type
 * @property string $field_name
 * @property string $rule
 */
class Workflow extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'workflows';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tracker_id, old_status_id, new_status_id, role_id, assignee, author', 'numerical', 'integerOnly'=>true),
			array('type, field_name, rule', 'length', 'max'=>30),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, tracker_id, old_status_id, new_status_id, role_id, assignee, author, type, field_name, rule', 'safe', 'on'=>'search'),
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
			'tracker_id' => 'Tracker',
			'old_status_id' => 'Old Status',
			'new_status_id' => 'New Status',
			'role_id' => 'Role',
			'assignee' => 'Assignee',
			'author' => 'Author',
			'type' => 'Type',
			'field_name' => 'Field Name',
			'rule' => 'Rule',
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
		$criteria->compare('tracker_id',$this->tracker_id);
		$criteria->compare('old_status_id',$this->old_status_id);
		$criteria->compare('new_status_id',$this->new_status_id);
		$criteria->compare('role_id',$this->role_id);
		$criteria->compare('assignee',$this->assignee);
		$criteria->compare('author',$this->author);
		$criteria->compare('type',$this->type,true);
		$criteria->compare('field_name',$this->field_name,true);
		$criteria->compare('rule',$this->rule,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Workflow the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
