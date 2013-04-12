<?php

/**
 * This is the model class for table "trackers".
 *
 * The followings are the available columns in table 'trackers':
 * @property integer $id
 * @property string $name
 * @property integer $is_in_chlog
 * @property integer $position
 * @property integer $is_in_roadmap
 * @property integer $fields_bits
 * @property string $easy_color_scheme
 * @property string $internal_name
 * @property string $easy_external_id
 * @property integer $easy_send_invitation
 * @property integer $easy_do_not_allow_close_if_subtasks_opened
 * @property integer $easy_do_not_allow_close_if_no_attachments
 * @property string $easy_issue_prefix
 */
class Tracker extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'trackers';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('is_in_chlog, position, is_in_roadmap, fields_bits, easy_send_invitation, easy_do_not_allow_close_if_subtasks_opened, easy_do_not_allow_close_if_no_attachments', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>30),
			array('easy_color_scheme, internal_name, easy_external_id, easy_issue_prefix', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, is_in_chlog, position, is_in_roadmap, fields_bits, easy_color_scheme, internal_name, easy_external_id, easy_send_invitation, easy_do_not_allow_close_if_subtasks_opened, easy_do_not_allow_close_if_no_attachments, easy_issue_prefix', 'safe', 'on'=>'search'),
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
			'is_in_chlog' => 'Is In Chlog',
			'position' => 'Position',
			'is_in_roadmap' => 'Is In Roadmap',
			'fields_bits' => 'Fields Bits',
			'easy_color_scheme' => 'Easy Color Scheme',
			'internal_name' => 'Internal Name',
			'easy_external_id' => 'Easy External',
			'easy_send_invitation' => 'Easy Send Invitation',
			'easy_do_not_allow_close_if_subtasks_opened' => 'Easy Do Not Allow Close If Subtasks Opened',
			'easy_do_not_allow_close_if_no_attachments' => 'Easy Do Not Allow Close If No Attachments',
			'easy_issue_prefix' => 'Easy Issue Prefix',
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
		$criteria->compare('is_in_chlog',$this->is_in_chlog);
		$criteria->compare('position',$this->position);
		$criteria->compare('is_in_roadmap',$this->is_in_roadmap);
		$criteria->compare('fields_bits',$this->fields_bits);
		$criteria->compare('easy_color_scheme',$this->easy_color_scheme,true);
		$criteria->compare('internal_name',$this->internal_name,true);
		$criteria->compare('easy_external_id',$this->easy_external_id,true);
		$criteria->compare('easy_send_invitation',$this->easy_send_invitation);
		$criteria->compare('easy_do_not_allow_close_if_subtasks_opened',$this->easy_do_not_allow_close_if_subtasks_opened);
		$criteria->compare('easy_do_not_allow_close_if_no_attachments',$this->easy_do_not_allow_close_if_no_attachments);
		$criteria->compare('easy_issue_prefix',$this->easy_issue_prefix,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Tracker the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
