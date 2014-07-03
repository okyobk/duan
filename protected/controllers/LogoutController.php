<?php

class LogoutController extends Controller 
{
	
	
	public function actionlogout()
	{
		// echo Yii::app()->session['fid'];
		$session = new CHttpSession;
		$session->open();
		unset(Yii::app()->session['fid']);
		Yii::app()->session->destroy();
		$session->close();
		// Yii::app()->user->isGuest=1;
		// echo Yii::app()->session['fid'];
   $this->render('logout'); 
}
		
}
