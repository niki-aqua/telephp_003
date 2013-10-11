<?php

session_start();
if(false)
	header('location: index.php');
require_once 'include/functions.php';
require_once 'include/config.php';


require_once 'include/header.php';
$message_string = '';
$user = array();
if(isset($_POST['user'])){
//	var_dump($_POST['user']);
	if(!username_pwd_long_enough($_POST['user'])){
		$message_string = "Потребителското име и паролата трябва да са по дълги от 5 символа.";
	}
	elseif($_POST['user']['name'] == '' || $_POST['user']['username'] == '' || $_POST['user']['password'] == ''){
		$message_string = "Моля попълнете данните на регистрационната форма.";
	}
	elseif(user_exists($_POST['user']['username'])){
		$message_string = "Вече съществува потребител с такова име.";
	}
//	elseif (!preg_match("^[a-zA-Z-_]*$", $message_string)) {
//		$message_string = "потребителското име трябва да е само 
//		от главни и малки латински букви и символите _ и -";	
//	}
	
	if($message_string == ''){
		$user = $_POST['user'];
		$user['role']='user';
		create_user($user);
		header("location: index.php");
		
	}
}


?>
<div id="content">
	<?php
		require_once("templates/display_register_form.php");

?>
	
</div>
<?php
require_once 'include/footer.php';

?>