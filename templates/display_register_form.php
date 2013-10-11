<?php
require_once 'include/header.php';
// Content part

?>
<h1>регистрация</h1>
<p><?php echo $message_string;
// echo USER_PWD_EMPTY;
?></p>
<!-- begin form -->
	<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
	<table>
		<tr>
			<td>Име: </td>
			<td><input type="text" name="user[name]"></td>
		</tr>
		<tr>
			<td>Потребителско име: </td>
			<td><input type="text" name="user[username]"></td>
		</tr>
		<tr>
			<td>Парола: </td>
			<td><input type="password"  name="user[password]"></td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit"  name="submit_me" value="вход"></td>
		</tr>
	</table>
</form>

<!-- end form -->

<?php
require_once 'include/footer.php';
?>
