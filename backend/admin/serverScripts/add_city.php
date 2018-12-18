<?php
include_once "..\databaseConnection\connection.php";
if ($_POST['add_city'] && !empty($_POST['city']) && !empty($_POST['state'])){
	$state = $_POST['state'];
	$city = $_POST['city'];
	$sql = "INSERT INTO `city`(`city_id`, `name`, `state_id`) VALUES (null,'$city','$state')";
	if ($connection->query($sql)) {
		 header("location:../add_city_form.php?msg=1");
	}else{
		 header("location:../add_city_form.php?msg=2");
	}
}else{
	 header("location:../add_city_form.php?msg=3");
}