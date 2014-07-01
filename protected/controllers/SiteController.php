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
	

	public function actionShowImage($id = '')
	{
		if(isset($id))
		{
			$criteria = new CDbCriteria();
			$criteria->condition = 'id=:id';
			$criteria->params = array('id'=>$id);
			$criteria->select = array('link_image','id');
			$model = Image::model()->findAll($criteria);
			if($model !== NULL)
			{
				$this->render('showimage', array("list_photo" => $model));
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

	public function actionCreate() {

		$model = new Image;

if ((($_FILES["profilepic"]["type"] == "image/gif")
|| ($_FILES["profilepic"]["type"] == "image/jpeg")
|| ($_FILES["profilepic"]["type"] == "image/png")
|| ($_FILES["profilepic"]["type"] == "application/pdf")
|| ($_FILES["profilepic"]["type"] == "application/octet-stream")
|| ($_FILES["profilepic"]["type"] == "application/vnd.openxmlformats-officedocument.wordprocessingml.document")
|| ($_FILES["profilepic"]["type"] == "image/pjpeg"))
&& ($_FILES["profilepic"]["size"] < 2000000))
{
	 
  if ($_FILES["profilepic"]["error"] > 0)
    {
    echo "upload bi loi, khong tim thay file upload";
    }
  else
    {
    if ($_FILES["profilepic"]["name"] AND file_exists("file:///Applications/XAMPP/xamppfiles/htdocs/duan/Images/" . $_FILES["profilepic"]["name"]))
      {
      echo $_FILES["profilepic"]["name"] . " da ton tai file tren server.</br> "; 
	  ?></br><a href="javascript: history.go(-1)">Quay lai</a>
	  
	  <?php
	  
	  exit();
      }
    else
      {	  
      move_uploaded_file($_FILES["profilepic"]["tmp_name"],
      "/Applications/XAMPP/xamppfiles/htdocs/duan/Images/" . $_FILES["profilepic"]["name"]);	  
	  
	  $link = "/Images/" . $_FILES["profilepic"]["name"];

                $model->link_image = $link;
                $id = $model->save();
      }
    }
}
        $this->render('create', array('model'=>$model));
	}


	
	public function actionShowMember()
	{
		$model = User::model()->findAll(array('order' => 'id DESC'));
		if($model !== NULL)
		{
			$this->render('showmember', array("list_member" => $model));
		}
		else {
			$empty_member = "No member";
			$this->render('showmember', array("empty_member" => $empty_member));
		}
	}

	public function actionlogin()
	{

   $this->render('login'); 
}

public function actionUser()
	{
		 $model=new User;

                $username = Yii::app()->request->getParam('username');
                $paswd = Yii::app()->request->getParam('password');

         $model -> username =$username;
         $model -> password = $paswd;
         $id=$model -> login();       
         echo $id;
                
			// $this->render('user', array("model"=>$model));
				


	}
		
}
