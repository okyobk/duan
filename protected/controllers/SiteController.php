<?php

class SiteController extends Controller 
{
	
	
	public function actionIndex()
	{
		$criteria = new CDbCriteria();
		$criteria->select = array('link_image','id');
	
		$model = Image::model()->findAll($criteria);

		$this->render('index', array('repost_rate' => $model));

	}

	public function actionError()
	{
	    if($error=Yii::app()->errorHandler->error)
	    {
	    	if(Yii::app()->request->isAjaxRequest)
	    		echo $error['message'];
	    	else
	        	$this->render('error', array("error" => $error));
	    }
	}
		
}
