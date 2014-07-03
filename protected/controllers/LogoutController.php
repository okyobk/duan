<?php

class LogoutController extends Controller 
{
	
	
	public function actionlogout()
	{
		$session = new CHttpSession;
		$session->open();
		unset(Yii::app()->session['fid']);
		Yii::app()->session->destroy();
		$session->close();
   		$this->render('logout'); 
}
		
}
