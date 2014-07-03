<ul class="row">
<?php
// echo 'okyobk';
foreach($model as $id)
{
	// $image=$photo->link_image;
?>
	<li><a href="<?php echo Yii::app()->request->baseUrl;?>/index.php/image/showimage?id=<?php echo $img->id;?>"><img src = <?php echo Yii::app()->request->baseUrl.'/images/'.$id->image; ?> width = "100" height = "100" /> 
	</a>
	</br>
	<b>user share:<?php echo $id->use_share; ?></b>

	</li>
<?php
}
?>
<ul>