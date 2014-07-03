<ul class="row">
<?php 
$session=new CHttpSession;
$session->open();

if(!$session['usename'])
{
	echo "Bạn cần phải đăng nhập để có thể thực hiện chức năng này!";

}
else{
foreach($users as $id_image)
{ 
?>
	<li><a href="<?php echo Yii::app()->request->baseUrl;?>/index.php/image/showimage?id=<?php echo $id_image->id_image;?>"><img src = <?php echo Yii::app()->request->baseUrl.'/images/'.$id_image->link_image; ?> width = "100" height = "100" /> 
	</a>
	</br>
	<b>user share:<?php echo $id_image->use_share; ?></b>

	</li>
<?php
}}
?>
<ul>