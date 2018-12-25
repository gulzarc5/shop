<?php
include_once "../../backend/admin/databaseConnection/connection.php"; 
if (!empty($_POST['u_id']) && !empty($_POST['current_password']) && !empty($_POST['password']) && !empty($_POST['cnf_password'])) {

	$u_id = $connection->real_escape_string(mysql_entities_fix_string($_POST['u_id']));
	$current_password = $connection->real_escape_string(mysql_entities_fix_string($_POST['current_password']));
	$cnf_password = $connection->real_escape_string(mysql_entities_fix_string($_POST['cnf_password']));
	$password = password_hash($cnf_password, PASSWORD_BCRYPT);
	$sql_user ="SELECT * FROM `users` WHERE `user_id` = '$u_id'";
	if ($result_user=$connection->query($sql_user)){
		if($result_user->num_rows == 0){
			echo "2";
		}else{
			$user=$result_user->fetch_assoc();
            if (password_verify($current_password,$user['password'])){
            	$sql = "UPDATE `users` SET `password`='$password' WHERE `user_id` = '$_POST[u_id]'";
				if ($result = $connection->query($sql)) {
					echo "1";
				}else{
					echo "2";
				}
            }else{
            	echo "3";
            }
		}
	}else{
		echo "4";
	}
}else{
	echo "5";
}


//fUNCTION fOR PREVENTING SQL INJECTION THROUGH INPUT
function mysql_entities_fix_string($string){return htmlentities(mysql_fix_string($string));}
function mysql_fix_string($string){
    if (get_magic_quotes_gpc()) 
        $string = stripslashes($string);
    return $string;
}

?>