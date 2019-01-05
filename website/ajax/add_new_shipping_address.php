<?php
session_start();
	include_once "../../backend/admin/databaseConnection/connection.php"; 

	$shipping_fname = $connection->real_escape_string(mysql_entities_fix_string($_POST['shipping_fname']));
	$shipping_lname = $connection->real_escape_string(mysql_entities_fix_string($_POST['shipping_lname']));
	$shipping_email = $connection->real_escape_string(mysql_entities_fix_string($_POST['shipping_email']));
	$shipping_address_of = $connection->real_escape_string(mysql_entities_fix_string($_POST['shipping_address_of']));
	$shipping_state = $connection->real_escape_string(mysql_entities_fix_string($_POST['shipping_state']));
	$shipping_company = $connection->real_escape_string(mysql_entities_fix_string($_POST['shipping_company']));
	$shipping_city = $connection->real_escape_string(mysql_entities_fix_string($_POST['shipping_city']));
	$shipping_pin = $connection->real_escape_string(mysql_entities_fix_string($_POST['shipping_pin']));
	$shipping_mobile = $connection->real_escape_string(mysql_entities_fix_string($_POST['shipping_mobile']));

	$sql_shipping = "INSERT INTO `shipping_info`(`shipping_info_id`, `f_name`, `l_name`, `company`, `email`, `state`, `city`, `address`, `pin`, `mobile`,`user_id`, `date`) VALUES (null,'$shipping_fname','$shipping_lname','$shipping_company','$shipping_email','$shipping_state','$shipping_city','$shipping_address_of','$shipping_pin','$shipping_mobile','$_SESSION[user_id]',date('now'))";
	if ($res_shipping = $connection->query($sql_shipping)) {
		echo "1";
	}else{
		echo "2";
	}

////////////////////// To Check Sql Injection ////////////////////////////////////
function mysql_entities_fix_string($string){return htmlentities(mysql_fix_string($string));}
function mysql_fix_string($string){
    if (get_magic_quotes_gpc()) 
        $string = stripslashes($string);
    return $string;
}

?>




