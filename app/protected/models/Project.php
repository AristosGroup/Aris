<?php

/**
 * This is the model class for table "projects".
 *
 * The followings are the available columns in table 'projects':
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property string $homepage
 * @property integer $is_public
 * @property integer $parent_id
 * @property string $created_on
 * @property string $updated_on
 * @property string $identifier
 * @property integer $status
 * @property integer $lft
 * @property integer $rgt
 * @property integer $easy_is_easy_template
 * @property string $easy_due_date
 * @property integer $author_id
 * @property string $easy_start_date
 * @property integer $easy_level
 * @property string $easy_external_id
 */
class Project extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'projects';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('is_public, parent_id, status, lft, rgt, easy_is_easy_template, author_id, easy_level', 'numerical', 'integerOnly'=>true),
			array('name, homepage, identifier, easy_external_id', 'length', 'max'=>255),
			array('description, created_on, updated_on, easy_due_date, easy_start_date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, description, homepage, is_public, parent_id, created_on, updated_on, identifier, status, lft, rgt, easy_is_easy_template, easy_due_date, author_id, easy_start_date, easy_level, easy_external_id', 'safe', 'on'=>'search'),
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
			'description' => 'Description',
			'homepage' => 'Homepage',
			'is_public' => 'Is Public',
			'parent_id' => 'Parent',
			'created_on' => 'Created On',
			'updated_on' => 'Updated On',
			'identifier' => 'Identifier',
			'status' => 'Status',
			'lft' => 'Lft',
			'rgt' => 'Rgt',
			'easy_is_easy_template' => 'Easy Is Easy Template',
			'easy_due_date' => 'Easy Due Date',
			'author_id' => 'Author',
			'easy_start_date' => 'Easy Start Date',
			'easy_level' => 'Easy Level',
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
		$criteria->compare('description',$this->description,true);
		$criteria->compare('homepage',$this->homepage,true);
		$criteria->compare('is_public',$this->is_public);
		$criteria->compare('parent_id',$this->parent_id);
		$criteria->compare('created_on',$this->created_on,true);
		$criteria->compare('updated_on',$this->updated_on,true);
		$criteria->compare('identifier',$this->identifier,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('lft',$this->lft);
		$criteria->compare('rgt',$this->rgt);
		$criteria->compare('easy_is_easy_template',$this->easy_is_easy_template);
		$criteria->compare('easy_due_date',$this->easy_due_date,true);
		$criteria->compare('author_id',$this->author_id);
		$criteria->compare('easy_start_date',$this->easy_start_date,true);
		$criteria->compare('easy_level',$this->easy_level);
		$criteria->compare('easy_external_id',$this->easy_external_id,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Project the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
