<?php
// development
//error_reporting(E_ERROR | E_PARSE);
error_reporting(E_ALL);

//Production
//error_reporting(E_ALL ^ E_NOTICE);

ini_set('session.name','noveva');

if ($_SERVER["SERVER_NAME"] != "noveva.ianev.info") {
	// for dev
	define("HOST", "localhost");
	define("USER", "noveva");
	define("PASS", "noveva");
	define("DB", "noveva_003");
}
else 
{
	//for production
	define("HOST", "localhost");
	define("USER", "ianevin_noveva");
	define("PASS", "n0v5v@");
	define("DB", "ianevin_noveva");	
}
	
//	echo $_SERVER["SERVER_NAME"];
//	echo DB;
	
$db=mysql_pconnect(HOST,USER,PASS);
if (!mysql_select_db(DB,$db))
  { echo mysql_error(); exit; }
require_once("functions.php");
mysql_query("SET CHARACTER SET utf8");

// Login form Messages
define("USER_PWD_WRONG", "Грешно потребителско име или парола");
define("USER_PWD_EMPTY", "Моля, въведете потребителско име и парола");
define("USER_PWD_MUSTBE_5SYMBOLS", "Потребителското име и паролата трябва да са поне 5 символа.");

//	Register Messages
define("REG_FLD_EMPTY", "Моля, попълнете всички полета от формата. ");
define("REG_USR_PWD_EMPTY", "Моля, попълнете всички полета от формата. ");

//	General constants
define("HEADER_HELLO", "Здравейте, ");
define("NL", "<br />".  chr(10));
//define("USER_PWD_WRONG", "Грешно потребителско име или парола");


?>
