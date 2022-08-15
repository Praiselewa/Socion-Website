<?php

session_start();

if(isset($_SESSION['socion_user_id']))
{
	$_SESSION['socion_user_id'] = NULL;
	unset($_SESSION['socion_user_id']);

}

header("Location: login.php");
die;




























?>