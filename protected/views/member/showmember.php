
<ul class="list_member">

<?php
echo Yii::app()->params['defaultLanguage'];
foreach($list_member as $member)
{
?>	<li>
	<div>
		<h1><?php echo $member['name'];?></h1>
	</div>
	</li>
<?php
}
echo (isset($empty_member)&&$empty_member!='')?$empty_member:'';
?>
<ul>
