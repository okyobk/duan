<?php

class ImageController extends Controller 
{
	
	
	public function actionShowImage($id = '')
	{
		if(isset($id))
		{
			$criteria = new CDbCriteria();

			// echo $id;die;
			$criteria->condition = 'link_image=:link_image';
			$criteria->params = array('link_image'=>$id);
			$criteria->select = array('link_image','id');
			$model = Image::model()->findAll($criteria);

			$session = new CHttpSession;
		 	$session->open();
			if($session['fid']){
				$member = User::model()->findAll(array('order' => 'id DESC'));
				// print_r ($member);die;
			}

			if($model !== NULL)
			{
				$this->render('showimage', array("list_photo" => $model, "list_member" => $member));
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
