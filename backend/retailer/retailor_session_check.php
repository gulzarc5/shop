<?php
	session_start();
	if (empty($_SESSION['email']) && $_SESSION['user_type'] != 3) {
		header("location:../user_login_system/login.php");
	}
?>