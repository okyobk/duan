<div id = "list_rate">
<ul>
	<form method="post" action="<?php echo Yii::app()->getBaseUrl(true).'/index.php/upload/create'?>" enctype="multipart/form-data">

<div class="row">
    <input type="file" name="profilepic"/><span><?php if(isset($error['profilepic'])) echo $error['profilepic'][0]; ?></span>
</div>
    <input type="hidden" value="No" name="flag"/>
<?php  echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?></br>

	<a href="<?php echo Yii::app()->request->baseUrl;?>/index.php/user/displayshare"> infomation of share 
		   	</a>
</form>
  

	</ul>
	<ul>
	   <?php 

	   foreach ($repost_rate as $img) {  
	   	?>
	   	
		   <li>
		   	<a href="<?php echo Yii::app()->request->baseUrl;?>/index.php/image/showimage?id=<?php echo $img->link_image;?>"><img src = <?php echo Yii::app()->request->baseUrl.'/images/'.$img->link_image ; ?> width = "100" height = "100"/> 
		   	</a>
		   </li>
		   

	   <?php }?>	
	</ul>

</div>
