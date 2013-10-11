<?php

session_start();
if(!isset($_SESSION['user']['username']))
	header('location: index.php');
require_once 'include/functions.php';
require_once 'include/config.php';

$err = "";
if(isset($_GET['Delete']))
{
	$table = 'message';
	$delete = (0+$_GET['Delete']);
	$sql ="select * from $table where id = ".(int)$delete;
	$res = mysql_query($sql);
	if(mysql_num_rows($res))
	{
		$sql = "delete from $table where id=$delete";
		mysql_query($sql);
		if(mysql_errno())	$err .= "$sql <br>" . mysql_error();
		if('z'.$err == 'z') $err = 'Записът бе успешно изтрит.';
	}
	else $err = 'Няма тъкав запис.';
}


require_once 'include/header.php';

?>
<div id="content">
	
	
<?php 
if(strlen($err))
	echo "<span class='err'>$err</span>"; 
	?>

<br>
<br>
<table border="0" class="list">
<?php


$sql = "SELECT m.id, u.username, m.title, m.content, if( m.is_active, 'да', 'не' ) as active
FROM message m
INNER JOIN user u ON u.id = m.user_id";

	$result=mysql_query($sql);
//	echo $sql . '<br />';
	
	echo mysql_error();
	$i=1;
	if (mysql_num_rows($result)>0)
	{ 
		echo "<tr><th>#<th>Потребител<th>Заглавие<th>Съобщение<th>акт.<th colspan=''>действия</tr>".chr(13).chr(10);
		$t=true;
	    while ($row=mysql_fetch_assoc($result))
		{
//			print_r($row);
	     	$c=(($t=1-$t)?' class="list_even" ':' class="list_odd" ');
			echo '<tr><td align="left" '.$c.'>'.$row['id'].chr(10);
			echo '<td '.$c.'>'.$row['username'].chr(10);
			echo '<td '.$c.'>'.$row['title'].chr(10);
			echo '<td '.$c.'>'.$row['content'].chr(10);
			echo '<td '.$c.'>'.$row['active'].chr(10);
			echo '<td '.$c.'><a href="messages_add.php?id='.$row['id'].'">промени</a>'.chr(10);
			echo '<td '.$c.'><a href="messages.php?Delete='.$row['id'].'"
				onclick="return confirm(\'Сигурни ли сте, че искате \nда изтриете съобщението:'.$row['title'].'?\')">изтрий</a>'.chr(10);
			echo '</tr>'.chr(13).chr(10);
			$i++;
	     }
	 }
	 else echo "<tr><td>Няма въведени данни.</td></tr>";
?>
</table>
</div><!-- end content -->
<?php
	require_once 'include/footer.php';
?>
