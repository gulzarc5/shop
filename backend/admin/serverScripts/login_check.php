<?php
session_start();
include_once "..\databaseConnection\connection.php";
// include_once "..\functions\functions.php";
if(isset($_POST['Login']) && !empty($_POST['email']) && !empty($_POST['password'])){
    echo $_POST['email'];
    $email = $connection->real_escape_string(mysql_entities_fix_string($_POST['email']));
    $password = $connection->real_escape_string(mysql_entities_fix_string($_POST['password']));

    $sql ="SELECT * FROM `users` WHERE `email_id` = '$email' AND `password` = '$password' ";
  
   if ($result=$connection->query($sql)){
        if($result->num_rows == 0) {
            header("location:../login.php?msg=1");
        }else {
            $user=$result->fetch_assoc();
            // print_r($user);
            $_SESSION['email'] = $user['email_id'];
            $_SESSION['user_type'] = $user['user_type_id'];
            $_SESSION['business_code'] = $user['business_code'];
            header("location:../deshboard.php");
        }
    }
    else{
        echo "error";
    }
   
}

function mysql_entities_fix_string($string){return htmlentities(mysql_fix_string($string));}
function mysql_fix_string($string){
    if (get_magic_quotes_gpc()) 
        $string = stripslashes($string);
    return $string;
}

?>