
<div class="windy-demo">
    <!-- <ul id="wi-el" class="wi-container"> -->

<?php
// echo 'okyobk';
foreach($list_photo as $photo)
{
	// $image=$photo->link_image;
?>
	<li><img src = <?php echo Yii::app()->request->baseUrl.'/images/'.$photo->link_image ; ?> /> </br>

	</li>
<?php
			$session = new CHttpSession;
		 	$session->open();
			if($session['fid']){
					?>

			<form action="<?php echo Yii::app()->getBaseUrl(true).'/index.php/share/share?image='?>" method="POST">
			<input type="text" value="<?php echo $photo->link_image;?>" style="" name="url"/>	
			<select name="namemember">
			<?php foreach($list_member as $member){ ?>
			<option value="<?php echo $member['username']; ?>"><?php echo $member['name']; ?>
			</option>	
			<?php } ?>
			</select>
			<input type="submit" value="SHARE" style="height: 20px;width: 60px; margin-top: 5px;"/>		
			</form>
					<?php
			}
}

?>
<!-- </ul> -->

</div>
<span class="share">
	<a href="http://www.facebook.com/sharer/sharer.php?u=<?php echo 'http://localhost/duan/'.$photo->link_image;?>">
	<img border="0" src="http://localhost/duan/shareicon/flickr.png">
	</a>
	
	<a href="http://twitter.com/home?status=<?php echo 'http://localhost/duan/'.$photo->link_image;?>">
	<img border="0" src="http://localhost/duan/shareicon/twitter.png">
	</a>
	
	<a href="http://www.google.com/bookmarks/mark?op=edit&bkmk=<?php echo 'http://localhost/duan/'.$photo->link_image;?>">
	<img border="0" src="http://localhost/duan/shareicon/google.png">
	</a>
	
	<a href="http://link.apps.zing.vn/pro/view/conn/share?u=<?php echo 'http://localhost/duan/'.$photo->link_image;?>">
	<img border="0" src="http://localhost/duan/shareicon/zing.png">
	</a>
	
	<a href="http://linkhay.com/submit?link_url=<?php echo 'http://localhost/duan/'.$photo->link_image;?>">
	<img border="0" src="http://localhost/duan/shareicon/linkhay.png">
	</a>
	
	<a href="http://my.go.vn/share.aspx?url=<?php echo 'http://localhost/duan/'.$photo->link_image;?>">
	<img border="0" src="http://localhost/duan/shareicon/govn.png">
	</a>
	
	</span>


	
