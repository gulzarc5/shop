<?php
	session_start();
	if (empty($_SESSION['email']) && $_SESSION['user_type'] != 3 && empty($_SESSION['business_code'])) {
		header("location:../user_login_system/login.php");
	}
?>