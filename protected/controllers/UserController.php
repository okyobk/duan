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
        $model -> login();  

        $criteria = new CDbCriteria();
        $criteria->alias = 'tbl_share';
        $criteria->condition = 'use_recive=:username';
        $criteria->params = array('username'=>$username);
        $criteria->select = array('id_image','use_share','tbl_image.link_image as link_image');

        $criteria->join = "INNER JOIN tbl_image ON tbl_image.id = tbl_share.id_image";
         

        $user = share::model()->findAll($criteria);
        $this->render('user', array('users' => $user));    
	}

    public function actionDisplayshare()
    {
 
        $session = new CHttpSession;
        $session->open();
        $username=$session['usename'];

        $criteria = new CDbCriteria();
        $criteria->alias = 'tbl_share';
        $criteria->condition = 'use_recive=:username';
        $criteria->params = array('username'=>$username);
        $criteria->select = array('id_image','use_share','tbl_image.link_image as link_image');

        $criteria->join = "INNER JOIN tbl_image ON tbl_image.id = tbl_share.id_image";
        $user = share::model()->findAll($criteria);
        $this->render('displayshare', array('users' => $user));   
    }
		
}
