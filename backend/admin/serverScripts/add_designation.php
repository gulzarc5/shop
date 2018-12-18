<?php
include_once "..\databaseConnection\connection.php";
if ($_POST['add_designation'] && !empty($_POST['designation'])){
	$designation = $_POST['designation'];
	$sql = "INSERT INTO `designation`(`designation_id`, `designation_name`, `created_at`) VALUES (null,'$designation',null)";
	if ($connection->query($sql)) {
		 header("location:../add_designation_form.php?msg=1");
	}else{
		 header("location:../add_designation_form.php?msg=2");
	}

}else{
	 header("location:../add_designation_form.php?msg=3");
}