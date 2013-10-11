<?php
require_once 'include/header.php';
// Content part

?>
<h1>Login форма</h1>
<!--<p>Моля, въведете потребителско име и парола.</p>-->
<p><?php echo $message_string;
// echo USER_PWD_EMPTY;
?></p>
<!-- begin form -->
	<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
	<table>
		<tr>
			<td>потребителско име: </td>
			<td><input type="text" name="user[username]"></td>
		</tr>
		<tr>
			<td>парола: </td>
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
