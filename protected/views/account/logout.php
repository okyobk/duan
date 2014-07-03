
<form method="post" action="<?php echo Yii::app()->getBaseUrl(true).'/index.php/user/user'?>" enctype="multipart/form-data">
<center>
<div class="row">
	<b>username:</b>
    <input type="text" name = "username"></br></br>
    <b>passwrod:</b>
    <input type="password" name = "password">
</div>
</center>
</br>
<center><?php  echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Sumbit'); ?></center>
</form>
  
