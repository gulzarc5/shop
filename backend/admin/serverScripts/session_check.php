<?php
	session_start();
	if (empty($_SESSION['email'])) {
		header("location:login.php");
	}
?>