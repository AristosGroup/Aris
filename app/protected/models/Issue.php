<?php

/**
 * This is the model class for table "issues".
 *
 * The followings are the available columns in table 'issues':
 * @property integer $id
 * @property integer $tracker_id
 * @property integer $project_id
 * @property string $subject
 * @property string $description
 * @property string $due_date
 * @property integer $category_id
 * @property integer $status_id
 * @property integer $assigned_to_id
 * @property integer $priority_id
 * @property integer $fixed_version_id
 * @property integer $author_id
 * @property integer $lock_version
 * @property string $created_on
 * @property string $updated_on
 * @property string $start_date
 * @property integer $done_ratio
 * @property double $estimated_hours
 * @property integer $parent_id
 * @property integer $root_id
 * @property integer $lft
 * @property integer $rgt
 * @property integer $is_private
 * @property integer $easy_is_easy_template
 * @property integer $activity_id
 * @property integer $easy_level
 * @property string $easy_external_id
 * @property string $easy_due_date_time
 * @property integer $position
 * @property double $remaining_hours
 * @property double $story_points
 */
class Issue extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'issues';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tracker_id, project_id, category_id, status_id, assigned_to_id, priority_id, fixed_version_id, author_id, lock_version, done_ratio, parent_id, root_id, lft, rgt, is_private, easy_is_easy_template, activity_id, easy_level, position', 'numerical', 'integerOnly'=>true),
			array('estimated_hours, remaining_hours, story_points', 'numerical'),
			array('subject, easy_external_id', 'length', 'max'=>255),
			array('description, due_date, created_on, updated_on, start_date, easy_due_date_time', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, tracker_id, project_id, subject, description, due_date, category_id, status_id, assigned_to_id, priority_id, fixed_version_id, author_id, lock_version, created_on, updated_on, start_date, done_ratio, estimated_hours, parent_id, root_id, lft, rgt, is_private, easy_is_easy_template, activity_id, easy_level, easy_external_id, easy_due_date_time, position, remaining_hours, story_points', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{

		return array(
            'project'   =>      array(self::BELONGS_TO, 'Project', 'project_id'),
            'tracker'   =>      array(self::BELONGS_TO, 'Tracker', 'tracker_id'),
            'status'    =>      array(self::BELONGS_TO, 'IssueStatus', 'status_id'),
            'author'        =>  array(self::BELONGS_TO, 'User', 'author_id'),
            'category'      =>  array(self::BELONGS_TO, 'IssueCategory', 'category_id'),
            'fixed_version'=>   array(self::BELONGS_TO, 'Version', 'fixed_version_id'),
            'assigned_to'  =>   array(self::BELONGS_TO, 'Principal', 'assigned_to_id'),
           // 'priority'  =>  array(self::BELONGS_TO, 'IssuePriority', 'priority_id'),
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
			'project_id' => 'Project',
			'subject' => 'Subject',
			'description' => 'Description',
			'due_date' => 'Due Date',
			'category_id' => 'Category',
			'status_id' => 'Status',
			'assigned_to_id' => 'Assigned To',
			'priority_id' => 'Priority',
			'fixed_version_id' => 'Fixed Version',
			'author_id' => 'Author',
			'lock_version' => 'Lock Version',
			'created_on' => 'Created On',
			'updated_on' => 'Updated On',
			'start_date' => 'Start Date',
			'done_ratio' => 'Done Ratio',
			'estimated_hours' => 'Estimated Hours',
			'parent_id' => 'Parent',
			'root_id' => 'Root',
			'lft' => 'Lft',
			'rgt' => 'Rgt',
			'is_private' => 'Is Private',
			'easy_is_easy_template' => 'Easy Is Easy Template',
			'activity_id' => 'Activity',
			'easy_level' => 'Easy Level',
			'easy_external_id' => 'Easy External',
			'easy_due_date_time' => 'Easy Due Date Time',
			'position' => 'Position',
			'remaining_hours' => 'Remaining Hours',
			'story_points' => 'Story Points',
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
		$criteria->compare('project_id',$this->project_id);
		$criteria->compare('subject',$this->subject,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('due_date',$this->due_date,true);
		$criteria->compare('category_id',$this->category_id);
		$criteria->compare('status_id',$this->status_id);
		$criteria->compare('assigned_to_id',$this->assigned_to_id);
		$criteria->compare('priority_id',$this->priority_id);
		$criteria->compare('fixed_version_id',$this->fixed_version_id);
		$criteria->compare('author_id',$this->author_id);
		$criteria->compare('lock_version',$this->lock_version);
		$criteria->compare('created_on',$this->created_on,true);
		$criteria->compare('updated_on',$this->updated_on,true);
		$criteria->compare('start_date',$this->start_date,true);
		$criteria->compare('done_ratio',$this->done_ratio);
		$criteria->compare('estimated_hours',$this->estimated_hours);
		$criteria->compare('parent_id',$this->parent_id);
		$criteria->compare('root_id',$this->root_id);
		$criteria->compare('lft',$this->lft);
		$criteria->compare('rgt',$this->rgt);
		$criteria->compare('is_private',$this->is_private);
		$criteria->compare('easy_is_easy_template',$this->easy_is_easy_template);
		$criteria->compare('activity_id',$this->activity_id);
		$criteria->compare('easy_level',$this->easy_level);
		$criteria->compare('easy_external_id',$this->easy_external_id,true);
		$criteria->compare('easy_due_date_time',$this->easy_due_date_time,true);
		$criteria->compare('position',$this->position);
		$criteria->compare('remaining_hours',$this->remaining_hours);
		$criteria->compare('story_points',$this->story_points);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Issue the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
