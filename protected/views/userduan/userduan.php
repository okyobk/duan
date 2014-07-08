<ul class="row">
<?php
$session=new CHttpSession;
$session->open();

if(!$session['usename'])
{
	echo Yii::t('strings','You need to login to be able to perform this function').'!';
}
else{

foreach($users as $id)
{
?>
	<li><a href="<?php echo Yii::app()->request->baseUrl;?>/index.php/imageduan/showimage?id=<?php echo $id->id_image;?>"><img src = <?php echo Yii::app()->request->baseUrl.'/images/'.$id->link_image; ?> width = "100" height = "100" /> 
	</a>
	</br>
	<b><?php echo Yii::t('strings','user share'); ?>:<?php echo $id->use_share; ?></b>
	</li>

<?php
$this->refresh();
}
}
?>

<ul>
