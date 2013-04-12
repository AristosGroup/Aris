<?php

/**
 * This is the model class for table "versions".
 *
 * The followings are the available columns in table 'versions':
 * @property integer $id
 * @property integer $project_id
 * @property string $name
 * @property string $description
 * @property string $effective_date
 * @property string $created_on
 * @property string $updated_on
 * @property string $wiki_page_title
 * @property string $status
 * @property string $sharing
 * @property integer $easy_version_category_id
 * @property string $easy_external_id
 * @property string $sprint_start_date
 */
class Version extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'versions';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('project_id, easy_version_category_id', 'numerical', 'integerOnly'=>true),
			array('name, wiki_page_title, status, sharing, easy_external_id', 'length', 'max'=>255),
			array('description, effective_date, created_on, updated_on, sprint_start_date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, project_id, name, description, effective_date, created_on, updated_on, wiki_page_title, status, sharing, easy_version_category_id, easy_external_id, sprint_start_date', 'safe', 'on'=>'search'),
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
			'project_id' => 'Project',
			'name' => 'Name',
			'description' => 'Description',
			'effective_date' => 'Effective Date',
			'created_on' => 'Created On',
			'updated_on' => 'Updated On',
			'wiki_page_title' => 'Wiki Page Title',
			'status' => 'Status',
			'sharing' => 'Sharing',
			'easy_version_category_id' => 'Easy Version Category',
			'easy_external_id' => 'Easy External',
			'sprint_start_date' => 'Sprint Start Date',
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
		$criteria->compare('project_id',$this->project_id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('effective_date',$this->effective_date,true);
		$criteria->compare('created_on',$this->created_on,true);
		$criteria->compare('updated_on',$this->updated_on,true);
		$criteria->compare('wiki_page_title',$this->wiki_page_title,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('sharing',$this->sharing,true);
		$criteria->compare('easy_version_category_id',$this->easy_version_category_id);
		$criteria->compare('easy_external_id',$this->easy_external_id,true);
		$criteria->compare('sprint_start_date',$this->sprint_start_date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Version the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
