<?php

class UserController extends Controller 
{
	
	
	public function actionUser()
	{
		 $model=new User;

        $username = Yii::app()->request->getParam('username');
        $paswd = Yii::app()->request->getParam('password');

        $model -> username =$username;
        $model -> password = $paswd;
        $id=$model -> login();  


        $model=new User;

        $model ->name = Yii::app()->user->name;

         $criteria = new CDbCriteria();
         $criteria->condition = 'use_recive=:username';
         $criteria->params = array('username'=>$username);
         $criteria->select = array('image','use_share');


         $model = share::model()->findAll($criteria);
        $this->render('user', array('model' => $model));    
	}

    public function actionDisplayshare()
    {
         $model=new User;
 
        $session = new CHttpSession;
            $session->open();
        $username=$session['usename'];

        $model=new User;
        $model ->name = Yii::app()->user->name;

         $criteria = new CDbCriteria();
         $criteria->condition = 'use_recive=:username';
         $criteria->params = array('username'=>$username);
         $criteria->select = array('image','use_share');


         $model = share::model()->findAll($criteria);

        $this->render('user', array('model' => $model));    
    }


public function actionLogin() {
     if (!Yii::app()->user->isGuest)
         $this->redirect(Yii::app()->homeUrl);
 
     $model = new LoginForm('login');
 
     // if it is ajax validation request
     if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form') {
         echo CActiveForm::validate($model);
         Yii::app()->end();
     }
 
     // collect user input data
     if (isset($_POST['LoginForm'])) {
         $model->attributes = $_POST['LoginForm'];
 
         if ($model->validate('login') && $model->login()) {
             $this->redirect(Yii::app()->user->returnUrl);
         }
     }
 
     $this->render('login', array('model' => $model));
 }
		
}
