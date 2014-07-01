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
	public $id;
	public $username;
	public $password;
	public $name;
	public $userGroup;

	private $_identity;	
	// public $avatar;
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


// public function authenticate($attribute, $params) {
//          if (!$this->hasErrors()) {
//              $this->_identity = new UserIdentity($this->email, $this->password);
//              if (!$this->_identity->authenticate())
//                  $this->addError('password', Yii::t('default', 'Incorrect email or password !'));
//          }
//      }

     public function login() {
         if ($this->_identity === null) {
             $this->_identity = new UserIdentity($this->username, $this->password);
             $this->_identity->authenticate();
         }
         if ($this->_identity->errorCode === UserIdentity::ERROR_NONE) {
         	
		 		Yii::app()->user->login($this->_identity, 0);	
			
             return true;
         }
         else
             return false;
     }






public function hashPassword($password, $salt)
{
    return md5($salt.$password);
}
        
// password validation
public function validatePassword($password)
{
    return $this->hashPassword($password,$this->salt)===$this->password;
}
        
//generate salt
public function generateSalt()
{
    return uniqid('',true);
}
        
public function beforeValidate()
{
    $this->salt = $this->generateSalt();
    return parent::beforeValidate();
}
        
public function beforeSave()
{
    $this->password = $this->hashPassword($this->password, $this->salt);
    return parent::beforeSave();
}
	
}
