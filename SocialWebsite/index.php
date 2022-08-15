<?php 


	session_start();
	
	
	include("classes/connect.php");
	include("classes/login.php");
	include("classes/user.php");
	include("classes/post.php");

	
	$login = new Login();
	$user_data = $login->check_login($_SESSION['socion_user_id']);

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
		min-height: 400px;
		margin-top: 20px;
		color: #aaa;
		padding: 8px;
		text-align: center;
		font-size: 20px;
		color: #4059db; /*CSS ignores the first colour and attends to the last */

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
			
			
			<!--Below cover area-->
			<div style="display: flex;">

				<!-- friends area -->
				<div style="min-height: 400px; flex: 1;">
					
					<div id="friends_bar">
						
						<img src="selfie.jpg" id="profile_pic"><br>

						<a href="profile.php" style="text-decoration: none;">
						<?php echo $user_data['first_name'] . "<br>" . $user_data['last_name'] ?>
						</a>
					</div>
				</div>

				<!--posts area-->
				<div style="min-height: 400px; flex: 2.5;padding: 20px; padding-right: 0px;">
					

					<div style="border: solid thin #aaa; padding: 10px; background-color:white;">
						
						<textarea placeholder="What's on your mind?"></textarea>
						<input id="post_button" type="submit" value="Post">
						<br>
				</div>
				

				
					<!--posts-->
					<div id="post_bar">
						
						<!--post 1-->
						<div id="post">
							<div>
								<img src="user1.jpg" style="width: 75px; margin-right: 4px;">
							</div>
							<div>
								<div style="font-weight: bold; color: #4059db;"> Adekola Olubukola</div>
								Why would the government ban twitter just because a tweet of theirs was deleted? The tweet didn't even make sense and then out of pain, they went to do something so unreasonable. This is already affecting businesses and they just don't know.	<br/><br/>	
								<a href=""title="Like">Like<a/> . <a href=""title="Comment">Comment</a> . <span style="color:#999;">June 7 2021</span>


							</div>
						</div>

						<!--post 2-->
						<div id="post">
							<div>
								<img src="user4.jpg" style="width: 75px; margin-right: 4px;">
							</div>
							<div>
								<div style="font-weight: bold; color: #4059db;"> Ololube Princely</div>
								Crypto is a new way of making large money. The government should be able to support the citizens of the federation and probably invest in it as it would yield great increase for the nation as a whole but instead they make up their minds to act this way. Ridiculous!	<br/><br/>	
								<a href=""title="Like">Like<a/> . <a href=""title="Comment">Comment</a> . <span style="color:#999;">June 7 2021</span>

													
							</div>
						</div>


					</div>

				</div>
			</div>

		</div>


	</body>
</html>