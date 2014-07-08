
<form method="post" action="<?php echo Yii::app()->getBaseUrl(true).'/index.php/userduan/userduan'?>" enctype="multipart/form-data">
<center>
<div class="row">
	<b><?php echo Yii::t('strings','username'); ?>:</b>
    <input type="text" name = "username"></br></br>
    <b><?php echo Yii::t('strings','password');?>:</b>
    <input type="password" name = "password">
</div>
</center>
</br>
<center><?php  echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Sumbit'); ?></center>
</form>
  
