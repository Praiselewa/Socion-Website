
	<div id="post">
		<div>
			<?php 

			$image = "images/user_male.jpg";
			if($ROW_USER['gender'] == "Female")
			{
				$image = "images/user_female.jpg";
			}
			?>
			<img src="<?php echo $image ?>" style="width: 75px; margin-right: 4px;">
		</div>
		<div>
			<div style="font-weight: bold; color: #4059db;"> 
				<?php echo $ROW_USER['first_name'] . " ". $ROW_USER['last_name']; ?></div>
			
			<?php echo $ROW['post']?>


			<br/><br/>

			<a href=""title="Like">Like<a/> . <a href=""title="Comment">Comment</a> . 

			<span style="color:#999;">
			
			<?php echo $ROW['date'] ?>

			</span>


		</div>
	</div>
