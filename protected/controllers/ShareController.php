<?php

class ShareController extends Controller 
{
	
	
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
		
}
