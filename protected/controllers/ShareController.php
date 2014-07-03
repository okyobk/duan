<?php

class ShareController extends Controller 
{
	
	
	public function actionshare()
	{
			$model=new User;

            $url = Yii::app()->request->getParam('url');
            $namemember = Yii::app()->request->getParam('namemember');

            $session = new CHttpSession;
		 	$session->open();
            $name = $session['usename'];

            $share=new Share;
            $share->image=$url;
            $share->use_share=$name;
            $share->use_recive=$namemember;
            $share->save();
            // echo $url;
            // echo $namemember;die;

   //          $criteria = new CDbCriteria();
   //          $criteria->condition = 'namemember=:namemember';
   //          $criteria->params = array('nammember'=>$nammember);
   //          $criteria->select = array('link_image','id');
			// $model = Image::model()->findAll($criteria);
   $this->render('share'); 
	}
		
}
