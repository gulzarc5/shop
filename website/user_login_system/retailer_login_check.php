<?php
session_start();
include_once "../../backend/admin/databaseConnection/connection.php";  

if(isset($_POST['Login']) && !empty($_POST['user_type']) && !empty($_POST['email']) && !empty($_POST['password'])){

    $email = $connection->real_escape_string(mysql_entities_fix_string($_POST['email']));
    $password = $connection->real_escape_string(mysql_entities_fix_string($_POST['password']));

    if ($_POST['user_type'] == 3) {
       $sql ="SELECT * FROM `users` WHERE `email_id` = '$email'  AND `user_type_id` = '3' ";
       if ($result=$connection->query($sql)){
            if($result->num_rows == 0) {
                header("location:../login.php?msg=1");
            }else {
                $user=$result->fetch_assoc();
                if (password_verify($password,$user['password'])) {
                    $_SESSION['email'] = $user['email_id'];
                    $_SESSION['user_id'] = $user['user_id'];
                    $_SESSION['user_type'] = $user['user_type_id'];
                    $_SESSION['business_code'] = $user['business_code'];
                    $_SESSION['name'] = $user['first_name']." ".$user['middle_name']." ".$user['last_name'];
                    header("location:../../backend/retailer/deshboard.php");
                }
                else {
                   header("location:../login.php?msg=2");
                }            
            }
        }
        else{
             header("location:../login.php?msg=1");
        }
    }elseif ($_POST['user_type'] == 2) {
        $sql ="SELECT * FROM `users` WHERE `email_id` = '$email'  AND `user_type_id` = '2' ";
        if ($result=$connection->query($sql)){
            if($result->num_rows == 0) {
                header("location:../login.php?msg=1");
            }else {
                $user=$result->fetch_assoc();
                if (password_verify($password,$user['password'])) {
                    $_SESSION['email'] = $user['email_id'];
                    $_SESSION['user_id'] = $user['user_id'];
                    $_SESSION['user_type'] = $user['user_type_id'];
                    $_SESSION['business_code'] = $user['business_code'];
                    $_SESSION['name'] = $user['first_name']." ".$user['middle_name']." ".$user['last_name'];
                    header("location:../../backend/wholeSeller/deshboard.php");
                }
                else {
                   header("location:../login.php?msg=2");
                }            
            }
        }
        else{
             header("location:../login.php?msg=1");
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