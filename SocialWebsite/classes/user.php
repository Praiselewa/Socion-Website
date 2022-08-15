<?php

class User
{

	public function get_data($id)
	{

		$query = "select * from users where user_id = '$id' limit 1";
		
		$DB = new Database();
		$result = $DB->read($query); //The result of the query is an array of results

		if($result)
		{
			$row = $result[0];
			$return = $result[0]; //because we just want the first row in the array
			return $row;
		}else
		{
			return false;
		}

	}

	public function get_user($id)
	{

		$query = "select * from users where user_id = '$id' limit 1";
		$DB = new Database();
		$result = $DB->read($query);

		if ($result)
		{
			return $result[0];
		}else
		{

			return false;
		}
	}


public function get_friends($id)
	{

		$query = "select * from users where user_id != '$id' ";
		$DB = new Database();
		$result = $DB->read($query);

		if ($result)
		{
			return $result;
		}else
		{

			return false;
		}
	}
}





























?>