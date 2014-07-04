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
			if($user)
			{
				$model_user = new User;
				
				$check = $model_user->model()->find(array('condition'=>'facebook_id=:facebook_id','params'=>array('facebook_id'=>$user)));
				$accesstk = $facebook->getAccessToken();
				$info = $facebook->api('/me');
				Yii::app()->session['fusername'] = $info['name'];
				Yii::app()->session['fid'] = $user;
				if($check === null)
				{
					$model_user->facebook_id = $info['id'];
					$model_user->facebook_name = $info['name'];
					$model_user->facebook_link = $info['link'];
					$model_user->access_token = $accesstk;
					$model_user->save();
					$this->redirect(Yii::app()->homeUrl); 
				} 
				else 
				{
					$session=new CHttpSession;
					$session->open();
					$session['usename']=$info['name'];
					$session['fid']=$info['id'];				
					$this->redirect(Yii::app()->homeUrl);
				} 
			} 
			else 
			{	
				$this->redirect(Yii::app()->homeUrl);
			} 
		}

		
}
