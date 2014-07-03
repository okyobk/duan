<?php

class ImageController extends Controller 
{
	
	
	public function actionShowImage($id = '')
	{
		if(isset($id))
		{
			$criteria = new CDbCriteria();

			$criteria->condition = 'id=:id';
			$criteria->params = array('id'=>$id);
			$criteria->select = array('link_image','id');
			$images = Image::model()->findAll($criteria);

			$session = new CHttpSession;
		 	$session->open();
			if($session['fid']){
			$members = User::model()->findAll(array('order' => 'id DESC'));

			}

			if($images !== NULL)
				{
				$this->render('showimage', array("list_photo" => $images, "list_member" => $members));
			}
			else {
				$empty_photo = "No photo";
				$this->render('showimage', array("empty_member" => $empty_photo));
			}
		}
		else {
			$this->redirect(Yii::app()->homeUrl); 
		}
	}
		
}
