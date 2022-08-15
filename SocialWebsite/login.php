<?php

session_start();
	
	include("classes/connect.php");
	include("classes/login.php");

	$email = "";
	$password = "";

	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
	
		$login = new Login(); //using Login class created
		$result = $login->evaluate($_POST); 

		if($result != "") //If result is not empty
		{
			echo "<div style='text-align: center; font-size: 12px;color:white;background-color: grey;'>";
			echo "<br> The following errors occured: <br><br>";
			echo $result;
			echo "</div>";
		}else
		{
			//to redirect 
	
			header("Location: profile.php");
			die;
		}
	
		$email = $_POST['email'];
		$password = $_POST['password'];
		
		
	}


?><!DOCTYPE html>
<html>
	<head>
	<meta charset="utf-8">
		<title>Socion | Log in</title>
	</head>

	<style>
		#top{
			height:100px;
			color: #d9dfeb;
			background-color: rgb(59,89,152);
			padding: 4px;
		}

		#signup_button{
			background-color: #42b72a;
			width: 70px; /*To make sure it doesn't extend to the extreme*/
			text-align: center;
			padding: 4px;
			border-radius: 4px;
			float: right;
		}

		#login_bar{
			background-color: white;
			width: 800px;
			margin: auto;
			margin-top: 50px;
			padding: 10px;
			padding-top: 50px;
			text-align: center;
			margin-bottom: 50px;
			font-weight: bold;
		}

		#text{

			height: 40px;
			width: 300px;
			border-radius: 4px;
			border: solid 1px #ccc;
			padding: 4px;
			font-size: 14px;
		}

		#button{

			width: 300px;
			height: 40px;
			border-radius: 4px;
			font-weight: bold;
			border: none;
			background-color: rgb(59, 89, 152);
			color: white;
			cursor: pointer;
		}
	</style>

	<body style="font-family: tahoma;background-color: #e9ebee;">

		<div id="top">
		
			<div style="font-size: 40px;">Socion</div> 
			<div id="signup_button">Sign Up</div>
		

		</div> <!-- Div for the blue bar-->

		<div id="login_bar">

			<form method="post">
			Log in to Socion<br><br>

				<input name="email" value="<?php echo $email ?>" type="text" id="text" placeholder="Email"><br><br>
				<input name="password" value="<?php echo $password ?>" type="password" id="text" placeholder="Password"><br><br>

				<input type="submit" id="button" value="Log in"><br><br><br>

			</form>
		</div>

	</body>


</html>