<?php
	session_start();
	if(isset($_SESSION['login_user1']))
	{
		unset($_SESSION['login_user1']);
	}
	header("location:../index.php");
?>