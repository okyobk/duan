<?php

class AccountController extends Controller 
{
	
	
	public function actionlogin()
	{

  		 $this->render('login'); 
	}
	public function actionlogout()
	{
		$session = new CHttpSession;
		$session->open();

		$user = new User;

		Yii::app()->db->createCommand()->update(
  		'tbl_user',
  		array('language'=>$session['lang']),
  		'username = :username',
  		array(':username'=>$session['usename'])
			);
		
		unset(Yii::app()->session['fid']);
		Yii::app()->session->destroy();
		$session->close();
   		$this->render('logout'); 
	}
	public function actionshare()
	{
            $id_image = Yii::app()->request->getParam('id_image');
            $namemember = Yii::app()->request->getParam('namemember');
            $session = new CHttpSession;
		 	   $session->open();
            $name = $session['usename'];

            $share=new Share;
            $share->id_image=$id_image;
            $share->use_share=$name;
            $share->use_recive=$namemember;
            $share->save();
            $this->render('share'); 
	}

	protected $facebook;
	protected function getFaceBook() 
	{
		if ($this->facebook===null)
		{
              $this->facebook = new Facebook(array('appId'=>Yii::app()->params['appId'],
                        							'secret'=>Yii::app()->params['secret']));
        }
        return $this->facebook;
	}
	public function actionloginfacebook()
	{
			$facebook = $this->getFaceBook();
			
			$base_url = Yii::app()->request->getBaseUrl(true);
			
			$redirect_uri = $base_url."/index.php/account/FacebookCallback";
			$login_url = $facebook->getLoginUrl(array(
									'scope' => 'publish_actions,publish_stream,user_photos,user_likes,email',
									'display'=>'popup',
									'redirect_uri' => $redirect_uri));
			$this->redirect($login_url); 
	}

	public function actionFacebookCallback()
	{	
			$facebook = $this->getFaceBook();
			$user = $facebook->getUser();
			// print_r($facebook);die;
			if($user)
			{
				$model_user = new User;
				
				$check = $model_user->model()->find(array('condition'=>'password=:password','params'=>array('password'=>$user)));
				$accesstk = $facebook->getAccessToken();
				$info = $facebook->api('/me');
				Yii::app()->session['fusername'] = $info['name'];
				Yii::app()->session['fid'] = $user;
				// print_r($info) ;die;




				if($check === null)
				{
					$model_user->username = $info['email'];
					$model_user->password = $info['id'];
					$model_user->name = $info['name'];
					$model_user->user_Group='2';
					$model_user->save();
					$this->redirect(Yii::app()->homeUrl); 
				} 
				else 
				{
					$session=new CHttpSession;
					$session->open();
					$session['usename']=$info['name'];
					$session['fid']=$info['id'];	
					$session['bolen']='1';

        
			        $criteria = new CDbCriteria();
        			$criteria->condition = 'username=:username';
        			$criteria->params = array('username'=>$info['email']);
        			$criteria->select = array('language');
        			$lang = User::model()->findAll($criteria);
        			foreach ($lang as $language => $value) {
            			$session['language'] = $value->language;
        				}


					$this->redirect(Yii::app()->homeUrl);


				} 
			} 
			else 
			{	
				$this->redirect(Yii::app()->homeUrl);
			} 
		}

		
}

