<?php
include_once "..\databaseConnection\connection.php";
if ($_POST['add_state'] && !empty($_POST['state'])){
	$state = $_POST['state'];
	$sql = "INSERT INTO `state`(`id`, `name`) VALUES (null,'$state')";
	if ($connection->query($sql)) {
		 header("location:../add_state_form.php?msg=1");
	}else{
		 header("location:../add_state_form.php?msg=2");
	}

}else{
	 header("location:../add_state_form.php?msg=3");
}