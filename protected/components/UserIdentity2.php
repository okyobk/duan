<?php

class UserIdentity extends CUserIdentity {

     private $_id;
 
     public function __construct($username, $password) {
         $this->username = $username;
         $this->password = $password;
     }
	 
 	 public function checkEmail($email) {
 	 	$users = Users::model()->find('email=:email', array(':email'=>$email));
		if ($users === null) {
			return true;
		}
		return false;
	 }
	 
     public function authenticate() {
        /* Sau khi có thể gửi mail chỉ cho phép login nếu status > 0 */
 	 	$user = Users::model()->find('email=:email AND status > 0', array(':email'=>$this->username));
         if ($user === null) {
             $this->errorCode = self::ERROR_USERNAME_INVALID;
         } else {
             $password = md5($this->password);
             if ($user->password !== $password) {
                 $this->errorCode = self::ERROR_PASSWORD_INVALID;
             } else {
 				$this->_id = $user->userId;
				$userGroup = $user->userGroup;
				$authUser = AuthUser::model()->find('ordering=:ordering', array(':ordering'=>$userGroup));
				$role = $authUser->name;
				$auth = Yii::app()->authManager;
				if (!$auth->isAssigned($role, $this->id)) {
					if ($auth->assign($role, $this->id)) {
						Yii::app()->authManager->save();
					}
				}
                $this->setState('email', $user->email);
                $this->setState('name', $user->name);
                $this->errorCode = self::ERROR_NONE;
             }
         }
         return !$this->errorCode;
     }
     
     public function loginByAdmin(){
 	 	$user = Users::model()->find('email=:email', array(':email'=>$this->username));
		$this->_id = $user->userId;
		$userGroup = $user->userGroup;
		$authUser = AuthUser::model()->find('ordering=:ordering', array(':ordering'=>$userGroup));
		$role = $authUser->name;
		$auth = Yii::app()->authManager;
		if (!$auth->isAssigned($role, $this->id)) {
			if ($auth->assign($role, $this->id)) {
				Yii::app()->authManager->save();
			}
		}
        $this->setState('email', $user->email);
        $this->setState('name', $user->name);
        $this->errorCode = self::ERROR_NONE;
        return !$this->errorCode;  	
     }
 
     public function getId() {
         return $this->_id;
     }        
 }