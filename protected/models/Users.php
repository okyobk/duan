<?php

class Users extends AnlabActiveRecord {
	
	public $userId;
	public $userGroup;
	public $planId;
	public $planRegister;
	public $autoUpdatePlan;
	public $planBegin;
	public $planExpiredDate;
	public $phoneNumber;
	public $email;
	public $password;
	public $repassword;
	public $remember;
	public $name;
	public $legalPerson;
	public $legalPersonName;
	public $status;
	public $createdBy;
	public $lastLogin;
	public $created;
	public $updated;	
	public $planPaypal;
	public $planTimeBeginNow;
	public $planTimeEndNow;
	public $planHistory;
	public $billingId;
	private $_identity;	
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
	
	public function rules() {
         return array(
             array('email, password', 'required', 'on' => 'login'),
             array('password', 'authenticate', 'on' => 'login'),
             array('email', 'checkEmail', 'on' => 'register'),
             array('repassword', 'checkRePassword', 'on' => 'register'),
             array('email, password, repassword, name, phoneNumber', 'required', 'on' => 'register'),
         );
     }
     public function attributeLabels() {
         return array(
             'email' => Yii::t('default', 'Email'),
             'password' => Yii::t('default', 'Password'),
             'repassword' => Yii::t('default', 'Re-password'),
         );
     }
	 
     public function authenticate($attribute, $params) {
         if (!$this->hasErrors()) {
             $this->_identity = new UserIdentity($this->email, $this->password);
             if (!$this->_identity->authenticate())
                 $this->addError('password', Yii::t('default', 'Incorrect email or password !'));
         }
     }
	 
	 public function checkEmail($attribute, $params) {
         if (!$this->hasErrors()) {
             $this->_identity = new UserIdentity($this->email, '');
             if (!$this->_identity->checkEmail($this->email))
                 $this->addError('email', Yii::t('default', 'Email existed !'));
         }
     }
	 
	 public function checkRePassword($attribute, $params) {
	 	if (!$this->hasErrors()) {
	 		if ($this->password != $this->repassword) {
	 			$this->addError('repassword', Yii::t('default', 'Incorrect repassword !'));
	 		}
        }
	 }
	 
     public function login() {
         if ($this->_identity === null) {
             $this->_identity = new UserIdentity($this->email, $this->password);
             $this->_identity->authenticate();
         }
         if ($this->_identity->errorCode === UserIdentity::ERROR_NONE) {
         	if ($this->remember) {
            	Yii::app()->user->login($this->_identity,24*3600*7);
		 	} else {
		 		Yii::app()->user->login($this->_identity, 0);	
			}
             return true;
         }
         else
             return false;
     }
     
     public function loginByAdmin() {
             $this->_identity = new UserIdentity($this->email, $this->password);
             $this->_identity->loginByAdmin();
 		Yii::app()->user->login($this->_identity, 0);	
        return true;
     }
	
	
}