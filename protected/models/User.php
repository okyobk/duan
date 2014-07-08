<?php

class User extends CActiveRecord
{
	/**
	 * The followings are the available columns in table 'tbl_user':
	 * @var integer $id
	 * @var string $facebook_name
	 * @var string $facebook_id
	 * @var string $facebook_link
	 * @var string avatar
	 */
	public $facebook_name;
	public $access_token;
	public $facebook_id;
	public $facebook_link;
	public $avatar;
	public $language;
	/**
	 * Returns the static model of the specified AR class.
	 * @return CActiveRecord the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{user}}';
	}
	
}
