<?php

class Post
{
	private $error = "";
	public function create_post($user_id, $data)
	{

		if(!empty($data['post']))
		{

			$post = addslashes($data['post']);
			$post_id = $this->create_postid();

			$query = "insert into posts (user_id,post_id,post) values ('$user_id','$post_id','$post')";

			$DB = new Database();
			$DB->save($query);

		}else
		{
			$this->error .= "Please type something to post!<br>";
		}

		return $this->error;
	}

	public function get_post($id)
	{
		$query = "select * from posts where user_id = '$id' order by id desc limit 10";

		$DB = new Database();
		$result = $DB->read($query);

		if($result)
		{
			return $result;
		}else
		{
			return false;
		}
	}

		private function create_postid()
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