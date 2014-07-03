<?php

class UploadController extends Controller 
{

	public function actionCreate() {

		$model = new Image;
 $images_path=realpath(Yii::app()->basePath . '/../images');

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
    if ($_FILES["profilepic"]["name"] AND file_exists("$images_path" ."/".$_FILES["profilepic"]["name"]))
      {
      echo $_FILES["profilepic"]["name"] . " da ton tai file tren server.</br> "; 
	  ?>
	  
	  <?php
	  
	  exit();
      }
    else
      {	  
      move_uploaded_file($_FILES["profilepic"]["tmp_name"],
      "$images_path" ."/". $_FILES["profilepic"]["name"]);	  
	  $link = $_FILES["profilepic"]["name"];

                $model->link_image = $link;
                $id = $model->save();

                $this->render('create', array('model'=>$model));
      }
    }

        
    }
}
}
