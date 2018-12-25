<?php
	include_once "../../backend/admin/databaseConnection/connection.php"; 

	if (!empty($_POST['fname']) && !empty($_POST['lname']) && !empty($_POST['email']) && !empty($_POST['cnf_password'])) {
		$fname = $connection->real_escape_string(mysql_entities_fix_string($_POST['fname']));
		$mname = $connection->real_escape_string(mysql_entities_fix_string($_POST['mname']));
		$lname = $connection->real_escape_string(mysql_entities_fix_string($_POST['lname']));
		$email = $connection->real_escape_string(mysql_entities_fix_string($_POST['email']));
		$password = $connection->real_escape_string(mysql_entities_fix_string($_POST['cnf_password']));
		$password = password_hash($password, PASSWORD_BCRYPT);
		$sql_email_check ="SELECT * FROM `users` WHERE `email_id`='$email' AND `user_type_id` = '4'";
		$result_email_check = $connection->query($sql_email_check);
		if ($result_email_check->num_rows > 0 ) {
				header("location:../register.php?msg=3");
		}
		else{
			$sql = "INSERT INTO `users` (`user_id`, `organization`, `first_name`, `middle_name`, `last_name`, `designation_id`, `address_id`, `business_code`, `mobile_no`, `email_id`, `trade_licence_number`, `trade_licence_using_authority`, `pan`, `GSTIN`, `GSTIN_category_id`, `membership_id`, `membership_number`, `membership_location`, `IEC_code`, `user_type_id`, `created_at`, `password`) VALUES (NULL, NULL, '$fname', '$mname', '$lname', NULL, NULL, NULL, NULL, '$email', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4', CURRENT_TIMESTAMP, '$password')";
			if ($result = $connection->query($sql)) {
				header("location:../register.php?msg=1");
			}else{
				header("location:../register.php?msg=2");
			}
		}
	}else{
		header("location:../register.php?msg=2");
	}



//fUNCTION fOR PREVENTING SQL INJECTION THROUGH INPUT
function mysql_entities_fix_string($string){return htmlentities(mysql_fix_string($string));}
function mysql_fix_string($string){
    if (get_magic_quotes_gpc()) 
        $string = stripslashes($string);
    return $string;
}
?>