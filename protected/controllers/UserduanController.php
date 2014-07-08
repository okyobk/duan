<?php

class UserduanController extends Controller 
{
	
	
	public function actionUserduan()
	{
		$model=new Userduan;


        $username = Yii::app()->request->getParam('username');
        $paswd = Yii::app()->request->getParam('password');

        $model -> username =$username;
        $model -> password = $paswd;
        $model -> login();  


        $session = new CHttpSession;
        $session->open();
        
        $criteria = new CDbCriteria();
        $criteria->condition = 'username=:username';
        $criteria->params = array('username'=>$username);
        $criteria->select = array('language');
        $lang = Userduan::model()->findAll($criteria);
        foreach ($lang as $language => $value) {
            $session['language'] = $value->language;
        }


        $criteria = new CDbCriteria();
        $criteria->alias = 'tbl_share';
        $criteria->condition = 'use_recive=:username';
        $criteria->params = array('username'=>$username);
        $criteria->select = array('id_image','use_share','tbl_imageduan.link_image as link_image');

        $criteria->join = "INNER JOIN tbl_imageduan ON tbl_imageduan.id = tbl_share.id_image";
         

        $user = share::model()->findAll($criteria);
        $this->render('userduan', array('users' => $user));    
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
        $criteria->select = array('id_image','use_share','tbl_imageduan.link_image as link_image');

        $criteria->join = "INNER JOIN tbl_imageduan ON tbl_imageduan.id = tbl_share.id_image";
        $user = share::model()->findAll($criteria);
        $this->render('displayshare', array('users' => $user));   
    }
		
}
