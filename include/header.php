<?php
$title = (isset($title) ? $title: "Homework 003 - Telerik PHP Course");

$logout = " | <a href=\"logout.php\">logout</a>";
$login = '<a href="index.php">login</a>';
$add_message = " | <a href=\"messages_add.php\">добави съобщение</a>";
$register_link = " | <a href=\"register.php\">регистрация</a>";

//echo "header";
echo '<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>'.$title.'</title>
	<link rel="stylesheet" type="text/css" href="css/site.css" />
</head>
<body>
'.chr(10);

echo '<div id="header">';
echo isset($_SESSION['user']['username']) ? 
(HEADER_HELLO.$_SESSION['user']['username'].$add_message.$logout): $login.$register_link;
echo NL;
$days = array(
	1 => 'Monday',
	2 => 'Tuesday',
	3 => 'Wednesday',
	4 => 'Thursday',
	5 => 'Friday',
	6 => 'Saturday',
	7 => 'Sunday');
echo '</div><!--  end header -->';
?>