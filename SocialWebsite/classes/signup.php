<?php
//is_numeric checks if data is a number

class Signup
{

	private $error = "";

	public function evaluate($data) //for evaluation of data
	{

		foreach ($data as $key => $value) {
			// code...
			if(empty($value))
			{
				$this->error = $this->error . $key . " is empty!<br>"; //To display an error if no value 
			}

			if($key == "email")
			{
				if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $value)) {
			$this->error = $this->error . " invalid email address!<br>"; 
				}

			}
				
			if($key == "first_name")
			{
				if (is_numeric($value)) {

					$this->error = $this->error . "first name can't be a number!<br>";
				}
				if (strstr($value, " ")) {
					
					$this->error = $this->error . "first name can't have spaces<br>";
				}


			}

			if($key == "last_name")
			{
				if (is_numeric($value)) {

					$this->error = $this->error . "last name can't be a number!<br>"; 
				}
				if (strstr($value, " ")) {

					$this->error = $this->error . "last name can't have spaces<br>";
				}


			}



		}

		if($this->error == "")
		{

			//no error
			$this->create_user($data); //calling it this way because function is in the same class
		}else
		{
			return $this->error;
		}
	}

	 public function create_user($data)
	{
			
			$first_name = $data['first_name'];  
			$last_name = $data['last_name'];
			$gender = $data['gender'];
			$email = $data['email'];
			$password = $data['password'];

			//create these
			$url_address = strtolower($first_name) . "." .strtolower($last_name); //creating the urladdress
			$user_id = $this->create_userid();


		$query = "insert into users 
		(user_id,first_name,last_name,gender,email,password,url_address) 
		values 
		('$user_id','$first_name','$last_name','$gender','$email','$password','$url_address')";


		$DB = new Database();
		$DB->save($query);
	}

	private function create_userid() //creating a user_id
	{

		$length = rand(4,19);
		$number = "";

		for ($i=0; $i < $length; $i++) { 
			// code...
			$new_rand = rand(0,9);

			$number = $number . $new_rand;

		}

		return $number;
	}
}














?>