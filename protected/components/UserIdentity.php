<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	private $_id;
 
     public function __construct($username, $password) {
         $this->username = $username;
         $this->password = $password;
     }
     
     public function authenticate() {
        /* Sau khi có thể gửi mail chỉ cho phép login nếu status > 0 */
 	 	$user = User::model()->find('username=:username ', array(':username'=>$this->username));
         if ($user === null) {
             $this->errorCode = self::ERROR_USERNAME_INVALID;
         } else {
             $password = md5($this->password);
             if ($user->password !== $password) {
                 $this->errorCode = self::ERROR_PASSWORD_INVALID;


             } else {
 				$this->_id = $user->id;
				$userGroup = $user->userGroup;
				$authUser = Authuser::model()->find('ordering=:ordering', array(':ordering'=>$userGroup));

				$role = $authUser->name;
				$auth = Yii::app()->authManager;
                 // echo 'okyo';

				if (!$auth->isAssigned($role, $this->id)) {
					if ($auth->assign($role, $this->id)) {
						Yii::app()->authManager->save();
					}
				}
				// echo 'okyo';die;
                $session = new CHttpSession;
                $session->open();

                $session['fid']=$user->id;
                $session['usename']=$user->username;

                $this->setState('username', $user->username);
                // $this->setState($session['fid'], $user->id);
                $this->setState('name', $user->name);
                $this->errorCode = self::ERROR_NONE;

                // echo 'okyo';
             }
         }
         return !$this->errorCode;
     }
}