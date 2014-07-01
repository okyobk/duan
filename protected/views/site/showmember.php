
<ul class="list_member">
<?php
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
