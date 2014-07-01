<div id = "list_rate">
<ul>
	<form method="post" action="<?php echo Yii::app()->getBaseUrl(true).'/index.php/site/create'?>" enctype="multipart/form-data">
	<!-- <input type="text" name = "test"> -->

<div class="row">
    <input type="file" name="profilepic"/><span><?php if(isset($error['profilepic'])) echo $error['profilepic'][0]; ?></span>
</div>
    <input type="hidden" value="No" name="flag"/>
<?php  echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
</form>
  

	</ul>


<!-- <ul>
	<form method="post" action="<?php echo Yii::app()->getBaseUrl(true).'/index.php/site/create'?>" enctype="multipart/form-data">
	<input type="text" name = "test">

<div class="row">
    <label>Profile pic</label><input type="file" name="profilepic"/><span><?php if(isset($error['profilepic'])) echo $error['profilepic'][0]; ?></span>
</div>
    <input type="hidden" value="No" name="flag"/>
<?php  echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
</form>
  

	</ul> -->

	<ul>
	   <?php 

		// print_r ($repost_rate);
	   foreach ($repost_rate as $img) {  
	   	?>
	   	
		   <li>
		   	<a href="<?php echo Yii::app()->request->baseUrl;?>/index.php/site/showimage?id=<?php echo $img->id;?>"><img src = <?php echo 'http://localhost/duan/'.$img->link_image; ?> width = "100" height = "100"/> 
		   	</a>
		   </li>
		   

	   <?php }?>	
	</ul>

</div>
