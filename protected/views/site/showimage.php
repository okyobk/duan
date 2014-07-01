
<div class="windy-demo">
    <!-- <ul id="wi-el" class="wi-container"> -->

<?php
foreach($list_photo as $photo)
{
?>
	<li><img src = <?php echo 'http://localhost/duan/'.$photo->link_image; ?> /></br>
	</li>
<?php
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


	
