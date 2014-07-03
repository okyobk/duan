<ul class="row">
<?php
$session=new CHttpSession;
$session->open();

if(!$session['usename'])
{
	echo "Bạn cần phải đăng nhập để có thể thực hiện chức năng này!";

}
else{
foreach($model as $id)
{
?>
	<li><a href="<?php echo Yii::app()->request->baseUrl;?>/index.php/image/showimage?id=<?php echo $id->image;?>"><img src = <?php echo Yii::app()->request->baseUrl.'/images/'.$id->image; ?> width = "100" height = "100" /> 
	</a>
	</br>
	<b>user share:<?php echo $id->use_share; ?></b>
	</li>
<?php
}
}
?>
<ul>