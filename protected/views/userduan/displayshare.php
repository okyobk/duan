<ul class="row">
<?php 
$session=new CHttpSession;
$session->open();

if(!$session['usename'])
{
	echo Yii::t('strings','You need to login to be able to perform this function').'!';

}
else{
foreach($users as $id_image)
{ 
?>
	<li><a href="<?php echo Yii::app()->request->baseUrl;?>/index.php/imageduan/showimage?id=<?php echo $id_image->id_image;?>"><img src = <?php echo Yii::app()->request->baseUrl.'/images/'.$id_image->link_image; ?> width = "100" height = "100" /> 
	</a>
	</br>
	<b><?php echo Yii::t('strings','user share'); ?>:<?php echo $id_image->use_share; ?></b>

	</li>
<?php
}}
?>
<ul>