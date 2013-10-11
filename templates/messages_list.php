<?php

require_once 'include/header.php';
echo "here messages list";
if(isset($messages)){
	foreach($messages as $msg_row){
		print_r($msg_row);
	}
}

require_once 'include/footer.php';
?>
