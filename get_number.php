<?php
	session_start();
	if(isset($_SESSION['number'])){
		echo $_SESSION['number'];
	}else{
		echo 0;
	}
?>