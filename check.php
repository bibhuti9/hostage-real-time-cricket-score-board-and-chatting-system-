<?php
	session_start();
	if(isset($_GET['number'])){
		$_SESSION['number']=$_GET['number'];
		echo 1;
	}else{
		echo 0;
	}
?>