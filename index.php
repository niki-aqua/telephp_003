<?php

session_start();

require_once 'include/functions.php';
require_once 'include/config.php';

if(isset($_SESSION['user']['username'])){
	header("location: messages.php");
}
else{
	
	$message_string = "";
	
	if(isset($_POST['user'])){
		if(username_pwd_long_enough($_POST['user'])){
			$message_string = USER_PWD_MUSTBE_5SYMBOLS;
		}
//		check in database if user exists
		if(!valid_user($_POST['user'])){
			$message_string = USER_PWD_WRONG;
		}
		else{
			header("location: messages.php");
		}
	}
}

require_once("templates/display_login_form.php");

?>
