<?php
	
	if (!(!empty($_SESSION['email']) && $_SESSION['user_type'] == 1)) {
		header("location:index.php");
	}
?>