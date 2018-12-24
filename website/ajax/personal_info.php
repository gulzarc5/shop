<?php
include_once "../../backend/admin/databaseConnection/connection.php"; 
if (!empty($_POST['fname']) && !empty($_POST['lname']) && !empty($_POST['email']) && !empty($_POST['mobile'])) {
	$sql = "UPDATE `users` SET `first_name`='$_POST[fname]',`last_name`='$_POST[lname]',`mobile_no`='$_POST[mobile]',`email_id`='$_POST[email]' WHERE `user_id` = ''";
	if ($result = $connection->query($sql)) {
		# code...
	}else{

	}
}else{

}
?>