<?php

	session_start();
	
	
	include("classes/connect.php");
	include("classes/login.php");
	include("classes/user.php");
	include("classes/post.php");

	
	$login = new Login();
	$user_data = $login->check_login($_SESSION['socion_user_id']);

	//posting starts here 
	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		
		$post = new Post();
		$id = $_SESSION['socion_user_id'];
		$result = $post->create_post($id, $_POST);
		
		if($result == ""){

			header("Location: profile.php");
			die;
		}else
		{
			echo "<div style='text-align: center; font-size: 12px;color:white;background-color: grey;'>";
			echo "<br> The following errors occured: <br><br>";
			echo $result;
			echo "</div>";
		}
	}

	//collect posts
	$post = new Post();
	$id = $_SESSION['socion_user_id'];
	
	$posts = $post->get_post($id);

	//collect friends
	$user = new User();
	$id = $_SESSION['socion_user_id'];
	
	$friends = $user->get_friends($id);
?>


<!DOCTYPE html>
	<html>
	<head>
		<meta charset="utf-8">
		<title>Profile | Socion</title>
	</head>

	<style type="text/css">
		
	#blue_bar{

		height: 50px;
		background-color: #405d9b;
		color: #d9dfeb;
	}

	#search_box{

		width: 400px;
		height: 20px;
		border-radius: 5px;
		border: none;
		padding: 4px;
		font-size: 14px;
		background-image: url(search.png);
		background-repeat: no-repeat;
		background-position: right;
	}

	#profile_pic{

		width: 150px;
		margin-top: -200px; /*negative to go up instead of increasing margin space*/
		border-radius: 50%; /*This turns it to a circle*/
		border: solid 2px white;

	}

	#menu_buttons{
		width: 100px;
		display: inline-block; /*To put words in the same line and if they become too much, they start on a new liner*/
	}

	#friends_img{
		width: 75px;
		float: left; /*floats to left while image adjusts*/
		margin: 8px;

	}

	#friends_bar{
		background-color: white;
		min-height: 400px;
		margin-top: 20px;
		color: #aaa;
		padding: 8px;
	}

	#friends{
		clear: both;
		font-size: 12px;
		font-weight: bold;
		color: #405d9b;
	}

	textarea{
		width: 100%;
		border: none;
		font-family: tahoma;
		font-size: 14px;
		height: 50px;

	}

	#post_button{
		float: right;
		background-color: #405d9b;
		border: none;
		color: white;
		padding: 4px;
		font-size: 14px;
		border-radius: 2px;
		width: 60px;
		cursor: pointer;
	}

	#post_bar{

		margin-top: 20px;
		background-color: white;
		padding: 10px;
	}

	#post{

		padding: 4px;
		font-size: 13px;
		display: flex;
		margin-bottom: 20px;
	}


	</style>

	<body style="font-family: tahoma; background-color: #d0d8e4;">
		<br>
		<?php include ("header.php"); ?>

		<!--cover area-->
		<div style="width: 800px; margin: auto;min-height: 400px;">
			
			<div style="background-color: white; text-align: center; color: #405d9b;">

				<?php
						$image = "images/cover_image.jpg";
						if(file_exists($user_data['cover_image']))
						{
							$image = $user_data['cover_image'];
						}
					?>

				<img src="<?php echo $image?>" style="width: 100%;">

				<span style="font-size: 12px;">
					<?php
						
						$image = "images/user_male.jpg";
						if($user_data['gender'] == "Female")
						{
							$image = "images/user_female.jpg";
						}
						if(file_exists($user_data['profile_image']))
						{
							$image = $user_data['profile_image'];
						}
					?>
					<img id="profile_pic" src="<?php echo $image?>"><br> 
					<a style="text-decoration: none; color: #000;" href="change_profile_image.php?change=profile">Change Profile Image</a> |
					<a style="text-decoration: none; color: #000;" href="change_profile_image.php?change=cover">Change Cover</a> 
				</span>
				<br>
					<div style="font-size: 20px;"><?php echo $user_data['first_name'] . " " . $user_data['last_name']?></div>
				<br>

				<a href="index.php"><div id="menu_buttons">Timeline</div> </a>
				<div id="menu_buttons">About</div> 
				<div id="menu_buttons">Friends</div>
				<div id="menu_buttons">Photos</div> 
				<div id="menu_buttons">Settings</div>

			</div>

			<!--Below cover area-->
			<div style="display: flex;">

				<!-- friends area -->
				<div style="min-height: 400px; flex: 1;">
					
					<div id="friends_bar">
						
						Friends<br>

						<?php
							if($friends)
							{
								foreach ($friends as $FRIEND_ROW) {
									// code...

									include ("user.php");
								}
								
							}
							
						?>
						

					</div>
				</div>

				<!--posts area-->
				<div style="min-height: 400px; flex: 2.5;padding: 20px; padding-right: 0px;">
					

					<div style="border: solid thin #aaa; padding: 10px; background-color:white;">
						
						<form method="post">

							<textarea name="post" placeholder="What's on your mind?"></textarea>
							<input id="post_button" type="submit" value="Post">
							<br>
						</form>
				</div>
				

				
					<!--posts-->
					<div id="post_bar">
						
						<?php
							if($posts)
							{
								foreach ($posts as $ROW) {
									// code...
									$user = new User();
									$ROW_USER = $user->get_user($ROW['user_id']);

									include ("post.php");
								}
								
							}
							
						?>


					</div>

				</div>
			</div>

		</div>


	</body>
</html>