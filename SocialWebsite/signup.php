<?php
	
	include("classes/connect.php");
	include("classes/signup.php");

	$first_name = "";
	$last_name = "";
	$gender = "";
	$email = "";

	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
	
		$signup = new Signup(); //using Signup class created
		$result = $signup->evaluate($_POST); //calling the evaluate function 

		if($result != "")
		{
			echo "<div style='text-align: center; font-size: 12px;color:white;background-color: grey;'>";
			echo "<br> The following errors occured: <br><br>";
			echo $result;
			echo "</div>";
		}else
		{
			//to redirect 
	
			header("Location: login.php");
			
		}
	
		$first_name = $_POST['first_name'];
		$last_name = $_POST['last_name'];
		$gender = $_POST['gender'];
		$email = $_POST['email'];
		
	}


?>

<!DOCTYPE html>
<html>
	<head>
	<meta charset="utf-8">
		<title>Socion | Sign up</title>
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
			<div id="signup_button">Log in</div>
		

		</div> <!-- Div for the blue bar-->

		<div id="login_bar">

			Sign up to Socion<br><br>

			<form method="post" action="">


				<input value="<?php echo $first_name ?>" name="first_name" type="text" id="text" placeholder="First Name"><br><br>
				<input value="<?php echo $last_name ?>" name="last_name" type="text" id="text" placeholder="Last Name"><br><br>

				<span style="font-weight: normal;">Gender:</span><br>
				<select id="text" name="gender">
					<option><?php echo $gender ?></option>
					<option>Male</option>
					<option>Female</option>

				</select>
				<br><br>

				
				<input value="<?php echo $email ?>" name="email" type="text" id="text" placeholder="Email"><br><br>

				<input name="password" type="password" id="text" placeholder="Password"><br><br>
				<input name="password2" type="password" id="text" placeholder="Confirm Password"><br><br>

				<input type="submit" id="button" value="Sign up"><br><br>

			</form>
		</div>

	</body>


</html>