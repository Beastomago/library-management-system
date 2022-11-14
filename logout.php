<?php
	session_start();
	if(isset($_SESSION['login_user1']))
	{
		unset($_SESSION['login_user1']);
	}
	header("index.php");
?>
<?php
	
	if(isset($_SESSION['login_user']))
	{
		unset($_SESSION['login_user']);
	}
	header("index.php");
?>