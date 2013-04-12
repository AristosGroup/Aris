<?php

/**
 * This is the model class for table "users".
 *
 * The followings are the available columns in table 'users':
 * @property integer $id
 * @property string $login
 * @property string $hashed_password
 * @property string $firstname
 * @property string $lastname
 * @property string $mail
 * @property integer $admin
 * @property integer $status
 * @property string $last_login_on
 * @property string $language
 * @property integer $auth_source_id
 * @property string $created_on
 * @property string $updated_on
 * @property string $type
 * @property string $identity_url
 * @property string $mail_notification
 * @property string $salt
 * @property string $cached_group_names
 * @property integer $easy_system_flag
 * @property string $easy_avatar
 * @property string $easy_external_id
 */
class User extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'users';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('admin, status, auth_source_id, easy_system_flag', 'numerical', 'integerOnly'=>true),
			array('login, type, identity_url, mail_notification, cached_group_names, easy_avatar, easy_external_id', 'length', 'max'=>255),
			array('hashed_password', 'length', 'max'=>40),
			array('firstname, lastname', 'length', 'max'=>30),
			array('mail', 'length', 'max'=>60),
			array('language', 'length', 'max'=>5),
			array('salt', 'length', 'max'=>64),
			array('last_login_on, created_on, updated_on', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, login, hashed_password, firstname, lastname, mail, admin, status, last_login_on, language, auth_source_id, created_on, updated_on, type, identity_url, mail_notification, salt, cached_group_names, easy_system_flag, easy_avatar, easy_external_id', 'safe', 'on'=>'search'),
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
			'login' => 'Login',
			'hashed_password' => 'Hashed Password',
			'firstname' => 'Firstname',
			'lastname' => 'Lastname',
			'mail' => 'Mail',
			'admin' => 'Admin',
			'status' => 'Status',
			'last_login_on' => 'Last Login On',
			'language' => 'Language',
			'auth_source_id' => 'Auth Source',
			'created_on' => 'Created On',
			'updated_on' => 'Updated On',
			'type' => 'Type',
			'identity_url' => 'Identity Url',
			'mail_notification' => 'Mail Notification',
			'salt' => 'Salt',
			'cached_group_names' => 'Cached Group Names',
			'easy_system_flag' => 'Easy System Flag',
			'easy_avatar' => 'Easy Avatar',
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
		$criteria->compare('login',$this->login,true);
		$criteria->compare('hashed_password',$this->hashed_password,true);
		$criteria->compare('firstname',$this->firstname,true);
		$criteria->compare('lastname',$this->lastname,true);
		$criteria->compare('mail',$this->mail,true);
		$criteria->compare('admin',$this->admin);
		$criteria->compare('status',$this->status);
		$criteria->compare('last_login_on',$this->last_login_on,true);
		$criteria->compare('language',$this->language,true);
		$criteria->compare('auth_source_id',$this->auth_source_id);
		$criteria->compare('created_on',$this->created_on,true);
		$criteria->compare('updated_on',$this->updated_on,true);
		$criteria->compare('type',$this->type,true);
		$criteria->compare('identity_url',$this->identity_url,true);
		$criteria->compare('mail_notification',$this->mail_notification,true);
		$criteria->compare('salt',$this->salt,true);
		$criteria->compare('cached_group_names',$this->cached_group_names,true);
		$criteria->compare('easy_system_flag',$this->easy_system_flag);
		$criteria->compare('easy_avatar',$this->easy_avatar,true);
		$criteria->compare('easy_external_id',$this->easy_external_id,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return User the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
