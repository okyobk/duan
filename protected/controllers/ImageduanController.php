<?php

class ImageduanController extends Controller 
{
	
	
	public function actionShowImage($id = '')
	{
		if(isset($id))
		{
			$criteria = new CDbCriteria();

			$criteria->condition = 'id=:id';
			$criteria->params = array('id'=>$id);
			$criteria->select = array('link_image','id');
			$images = Imageduan::model()->findAll($criteria);

			$session = new CHttpSession;
		 	$session->open();
		 	
			if($session['fid']){

			$members = Userduan::model()->findAll(array('order' => 'id DESC'));
			$members2 = User::model()->findAll(array('order' => 'id DESC'));
			}

			if($images !== NULL)
				{
				$this->render('showimage', array("list_photo" => $images, "list_member" => $members, "list_member2" => $members2));
				// echo "okyobk"; die;
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
