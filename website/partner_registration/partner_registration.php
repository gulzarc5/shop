<?php
include_once "../../backend/admin/databaseConnection/connection.php"; 

///////////////////// If form is submitted ///////////////////////
if (!empty($_POST['add_partner']) && $_POST['add_partner'] == 'add_partner') {
	
	////////////////// To check Important input fields filled or not ///////////////////
	if (!empty($_POST['organization']) && !empty($_POST['first_name'])  && !empty($_POST['city'])) {
		$organization = $connection->real_escape_string(mysql_entities_fix_string($_POST['organization']));
		$first_name = $connection->real_escape_string(mysql_entities_fix_string($_POST['first_name']));
		$city = $connection->real_escape_string(mysql_entities_fix_string($_POST['city']));

		///// Generate Business Code with this input fields //////////////////////
		$businessCode = strtoupper(generateBusinessCode($organization,$first_name,$city,$connection));
		// echo $businessCode;
	}else{
		header("location:../partner_registration_form.php?msg=2");
	}
	////////////////  Take all input fields in variable after checking sql injection /////////
	$middle_name = $connection->real_escape_string(mysql_entities_fix_string($_POST['middle_name']));
	$last_name = $connection->real_escape_string(mysql_entities_fix_string($_POST['last_name']));
	$designation = $connection->real_escape_string(mysql_entities_fix_string($_POST['designation']));
	$state = $connection->real_escape_string(mysql_entities_fix_string($_POST['state']));
	$locality = $connection->real_escape_string(mysql_entities_fix_string($_POST['locality']));
	$mobile_number = $connection->real_escape_string(mysql_entities_fix_string($_POST['mobile_number']));
	$mobile_number_alternate = $connection->real_escape_string(mysql_entities_fix_string($_POST['mobile_number_alternate']));
	$email = $connection->real_escape_string(mysql_entities_fix_string($_POST['email']));
	$email_alternate = $connection->real_escape_string(mysql_entities_fix_string($_POST['email_alternate']));
	$confirm_password = $connection->real_escape_string(mysql_entities_fix_string($_POST['confirm_password']));

	$trade_licence_number = $connection->real_escape_string(mysql_entities_fix_string($_POST['trade_licence_number']));
	$licence_issuing_authority = $connection->real_escape_string(mysql_entities_fix_string($_POST['licence_issuing_authority']));
	$pan = $connection->real_escape_string(mysql_entities_fix_string($_POST['pan']));
	$gstin = $connection->real_escape_string(mysql_entities_fix_string($_POST['gstin']));
	$gstin_category = $connection->real_escape_string(mysql_entities_fix_string($_POST['gstin_category']));
	$iec = $connection->real_escape_string(mysql_entities_fix_string($_POST['iec']));
	$membership = $connection->real_escape_string(mysql_entities_fix_string($_POST['membership']));

	$membership_number = $connection->real_escape_string(mysql_entities_fix_string($_POST['membership_number']));
	$membership_location = $connection->real_escape_string(mysql_entities_fix_string($_POST['membership_location']));

	/////////////////// Hash user password after hashing ////////////////////////
	$password = password_hash($confirm_password, PASSWORD_BCRYPT);

	$bank_name = $connection->real_escape_string(mysql_entities_fix_string($_POST['bank_name']));
	$branch_address = $connection->real_escape_string(mysql_entities_fix_string($_POST['branch_address']));
	$ifsc = $connection->real_escape_string(mysql_entities_fix_string($_POST['ifsc_code']));
	$micr = $connection->real_escape_string(mysql_entities_fix_string($_POST['micr_code']));

	$user_type_id = $connection->real_escape_string(mysql_entities_fix_string($_POST['registration_type']));

	//////////////////   if email and user type not empty start insert process /////////////
	if (!empty($email) && !empty($user_type_id)) {	
		$sql_email_unique_check = "SELECT * FROM `users` WHERE `email_id`='$email' AND `user_type_id`='$user_type_id'";
		$user_count = null;
		if ($res_email_unique_check = $connection->query($sql_email_unique_check)) {
			$user_count = $res_email_unique_check->num_rows;
		}

		/////////////// if user is not registered before insert user ////////////////////
		if ($user_count < 1) {
			//////////// Insert user address into address table /////////////////
			$sql_address = "INSERT INTO `address`(`address_id`, `state_id`, `city_id`, `street`) VALUES (null,'$state','$city','$locality')";
			////////////// If user address inserted insert user data in user table ////////
			if ($result_address = $connection->query($sql_address)){
				$address_id = $connection->insert_id;

				$sql_retailor_registration = "INSERT INTO `users`(`user_id`, `organization`, `first_name`, `middle_name`, `last_name`, `designation_id`, `address_id`, `business_code`, `mobile_no`, `email_id`, `trade_licence_number`, `trade_licence_using_authority`, `pan`, `GSTIN`, `GSTIN_category_id`, `membership_id`, `membership_number`, `membership_location`, `IEC_code`, `user_type_id`, `created_at`, `password`) VALUES (null,'$organization','$first_name','$middle_name','$last_name','$designation','$address_id','$businessCode','$mobile_number','$email','$trade_licence_number','$licence_issuing_authority','$pan','$gstin','$gstin_category','$membership','$membership_number','$membership_location','$iec','$user_type_id', CURRENT_TIMESTAMP,'$password')";

				/////////////// if User data inserted start next processs //////////////
				if ($result_retailor_registration = $connection->query($sql_retailor_registration)) {

					//////////////// if bank detailes entered insert bank details //////////
					if (!empty($branch_address) || !empty($_POST['branch_address']) || !empty($_POST['ifsc_code']) || !empty($_POST['micr_code'])) {
						$user_id = $connection->insert_id;
						$sql_user_bank_details = "INSERT INTO `user_bank_details`(`user_bank_id`, `user_id`, `name_of_bank`, `branch_address`, `ifsc`, `micr`) VALUES (null,'$user_id','$bank_name','$branch_address','$ifsc','$micr')";

					///////////////// finally redirect page with message /////////////
						if ($result_user_bank_details = $connection->query($sql_user_bank_details)){
							header("location:../partner_registration_form.php?msg=1");
						}else{
							header("location:../partner_registration_form.php?msg=1");
						}
					}
					///////////////// finally redirect page with message /////////////
					header("location:../partner_registration_form.php?msg=1");
				}else{
					//////////  If User data Not Inserted Redirect with error Message ///////
					header("location:../partner_registration_form.php?msg=2");
				}
			}else{
				//////////  If User Address Not Inserted Redirect with error Message ///////
				header("location:../partner_registration_form.php?msg=2");
			}
		
		}else{
			//////// if user already in database redirect with error message /////////////
			header("location:../partner_registration_form.php?msg=3");
		}
	}else{
		///////// if email and user type id empty redirect with error message /////////
		header("location:../partner_registration_form.php?msg=2");
	}
}else{
	///////////////////// If form Not submitted ///////////////////////
	header("location:../partner_registration_form.php?msg=2");
}






//Function to generate business code
function generateBusinessCode($organization,$first_name,$city,$connection){
	$businessCode = null;
	$organizationArray = explode(" ",$organization);
	if (count($organizationArray)>1 && strlen($organization)>1) {
		$businessCode = $businessCode.substr($organizationArray[0], 0, 1).substr($organizationArray[1], 0, 1);
		// print $organizationArray[1]."<br>";
	}else{
		$businessCode = $businessCode.substr($organizationArray[0], 0, 2);
	}
	$businessCode = $businessCode.substr($first_name, 0, 1);


	$sql_city ="SELECT `name` FROM `city` WHERE `city_id` = '$city'";
	if ($result_city=$connection->query($sql_city)){
		$row_city=$result_city->fetch_assoc();
		$city_name = $row_city['name'];
		$businessCode = $businessCode.substr($city_name, 0, 1);
	}else{
		header("location:../login.php?msg=3");
	}
	
	return $businessCode;
}

//fUNCTION fOR PREVENTING SQL INJECTION THROUGH INPUT
function mysql_entities_fix_string($string){return htmlentities(mysql_fix_string($string));}
function mysql_fix_string($string){
    if (get_magic_quotes_gpc()) 
        $string = stripslashes($string);
    return $string;
}
?>

