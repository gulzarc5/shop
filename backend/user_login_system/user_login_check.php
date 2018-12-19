<?php
session_start();
include_once "../admin/databaseConnection/connection.php";  
// include_once "..\functions\functions.php";
if(isset($_POST['Login']) && !empty($_POST['membership']) && !empty($_POST['email']) && !empty($_POST['password'])){
    // echo $_POST['email'];
    $email = $connection->real_escape_string(mysql_entities_fix_string($_POST['email']));
    $password = $connection->real_escape_string(mysql_entities_fix_string($_POST['password']));

    if ($_POST['membership'] == 3) {
       $sql ="SELECT * FROM `users` WHERE `email_id` = '$email'";
       if ($result=$connection->query($sql)){
            if($result->num_rows == 0) {
                header("location:login.php?msg=1");
            }else {
                $user=$result->fetch_assoc();
                if (password_verify($password,$user['password'])) {
                    $_SESSION['email'] = $user['email_id'];
                    $_SESSION['user_type'] = $user['user_type_id'];
                    header("location:../retailer/deshboard.php");
                }
                else {
                   header("location:login.php?msg=2");
                }            
            }
        }
        else{
             header("location:login.php?msg=1");
        }

    }
    
  
   
   
}

function mysql_entities_fix_string($string){return htmlentities(mysql_fix_string($string));}
function mysql_fix_string($string){
    if (get_magic_quotes_gpc()) 
        $string = stripslashes($string);
    return $string;
}

?>