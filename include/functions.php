<?php
/*
 * The app breathes with the two above included files.
 * 
 * If record_functions.php or config.php fail to load, 
 * most of the constants won't work :)
 */

require_once "record_functions.php";
require_once "config.php";

function username_pwd_long_enough($user){
	return (strlen($user['username'])>=5 && strlen($user['password'])>=5) ? 1:0;
}

function user_exists($username){
	return check_by_fieldname("user", "username", $username);
}

function valid_user($user){
	if(!isset($user['username']) || !isset($user['password'])){
		return FALSE;
	}
	$user_data = get_user_by_username_password($user['username'],$user['password']);
//	print_r($user_data);
	if(count($user_data)){
		$_SESSION['user'] = $user_data;
		return true;
	}
}

function get_user_by_username_password($username, $pass){
	$result = array();
	$sql = "select *
			from user 
			where username = \"$username\" 
			and password = \"$pass\"";
//	echo $sql;
	$result = mysql_fetch_assoc(mysql_query($sql));
	if(mysql_errno()){
		echo mysql_error();
	}
	return $result;
}

function register($user){
	$error = "";
	if(!is_array($user) || empty ($user))		$error = ERR_USER_EMPTY;
	if(check_by_fieldname('user','username',$user['username'])){
		$error = ERR_USER_EXISTS;
	}
	if(create_record("user", $user)){
		$error = USER_REGISTERED_OK;
	}
	return $error;
}

function create_user($user){
	return create_record('user', $user);
}

function delete_user($id){
	return delete_record('user',$id);
}

function create_message($post){
	return create_record('message', $post);
}

function update_message($post){
	return update_record('message', $post);
}

function delete_message($id){
	return delete_record('message',$id);
}


?>
