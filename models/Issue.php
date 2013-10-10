<?php

namespace app\models;

/**
 * This is the model class for table "issues".
 *
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
 * @property boolean $is_private
 * @property boolean $easy_is_easy_template
 * @property integer $activity_id
 * @property integer $easy_level
 * @property string $easy_external_id
 * @property string $easy_due_date_time
 * @property integer $position
 * @property double $remaining_hours
 * @property double $story_points
 */
class Issue extends \yii\db\ActiveRecord
{
	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return 'issues';
	}

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return array(
			array('tracker_id, project_id, category_id, status_id, assigned_to_id, priority_id, fixed_version_id, author_id, lock_version, done_ratio, parent_id, root_id, lft, rgt, activity_id, easy_level, position', 'integer'),
			array('description', 'string'),
			array('due_date, created_on, updated_on, start_date, easy_due_date_time', 'safe'),
			array('estimated_hours, remaining_hours, story_points', 'number'),
			array('is_private, easy_is_easy_template', 'boolean'),
			array('subject, easy_external_id', 'string', 'max' => 255)
		);
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'tracker_id' => 'Tracker ID',
			'project_id' => 'Project ID',
			'subject' => 'Subject',
			'description' => 'Description',
			'due_date' => 'Due Date',
			'category_id' => 'Category ID',
			'status_id' => 'Status ID',
			'assigned_to_id' => 'Assigned To ID',
			'priority_id' => 'Priority ID',
			'fixed_version_id' => 'Fixed Version ID',
			'author_id' => 'Author ID',
			'lock_version' => 'Lock Version',
			'created_on' => 'Created On',
			'updated_on' => 'Updated On',
			'start_date' => 'Start Date',
			'done_ratio' => 'Done Ratio',
			'estimated_hours' => 'Estimated Hours',
			'parent_id' => 'Parent ID',
			'root_id' => 'Root ID',
			'lft' => 'Lft',
			'rgt' => 'Rgt',
			'is_private' => 'Is Private',
			'easy_is_easy_template' => 'Easy Is Easy Template',
			'activity_id' => 'Activity ID',
			'easy_level' => 'Easy Level',
			'easy_external_id' => 'Easy External ID',
			'easy_due_date_time' => 'Easy Due Date Time',
			'position' => 'Position',
			'remaining_hours' => 'Remaining Hours',
			'story_points' => 'Story Points',
		);
	}
}
