<?php

class Login
{

	private $error = "";

	public function evaluate($data)
	{
		
		$email = addslashes($data['email']); //adds slashes to escape special characters
		$password = addslashes($data['password']);


		$query = "select * from users where email = '$email' limit 1"; //read and limit to 1 row/user

		$DB = new Database();
		$result = $DB->read($query); //This reads the data from the already created user in the database 

		if($result)
		{

			$row = $result[0];

			if($password == $row['password'])
			{

				//create session data
				$_SESSION['socion_user_id'] = $row['user_id'];

			}else
			{
				$this->error .= "Wrong password<br>";
			}
		}else
		{

			$this->error .= "No such email was found<br>";
		}
		
		return $this->error;
		
	}

	public function check_login($id)
	{
		if(is_numeric($id))
		{

			$query = "select * from users where user_id = '$id' limit 1";

			$DB = new Database();
			$result = $DB->read($query);

			if($result)
			{

				$user_data = $result[0];
				return $user_data;
			}else
			{
				header("Location: login.php");
				die;
			}


			
		}else
		{
			header("Location: login.php");
			die;
		}
	}
}




















?>