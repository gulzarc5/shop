<?php
include_once "../../backend/admin/databaseConnection/connection.php"; 
if (!empty($_POST['fname']) && !empty($_POST['lname']) && !empty($_POST['email']) && !empty($_POST['mobile']) && !empty($_POST['u_id'])) {
	$sql = "UPDATE `users` SET `first_name`='$_POST[fname]',`last_name`='$_POST[lname]',`mobile_no`='$_POST[mobile]' WHERE `user_id` = '$_POST[u_id]'";
	if ($result = $connection->query($sql)) {
		echo "1";
		echo $_POST['u_id'];
	}else{
		echo "2";
		echo $_POST['u_id'];
	}
}else{
	echo "3";
	echo $_POST['u_id'];
}
?>