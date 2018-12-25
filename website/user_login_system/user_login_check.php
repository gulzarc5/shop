<?php
session_start();
include_once "../../backend/admin/databaseConnection/connection.php";  


//Simple User Login Check
if(isset($_POST['Simple_user_login']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['user_type'])){
    $user_type =  $connection->real_escape_string(mysql_entities_fix_string($_POST['user_type']));
    $email = $connection->real_escape_string(mysql_entities_fix_string($_POST['email']));
    $password = $connection->real_escape_string(mysql_entities_fix_string($_POST['password']));
    $sql ="SELECT * FROM `users` WHERE `email_id`='$email' AND `user_type_id` = '4'";
    $result=$connection->query($sql);
       if($result->num_rows == 0) {
                header("location:../simple_user_login.php?msg=1");
        }else{
            $user=$result->fetch_assoc();
            print_r($user);
            print "password".password_verify('1234',$user['password']);
            if (password_verify($password,$user['password'])){
                $_SESSION['email'] = $user['email_id'];
                $_SESSION['user_id'] = $user['user_id'];
                $_SESSION['user_type'] = $user['user_type_id'];
                $_SESSION['name'] = $user['first_name']." ".$user['middle_name']." ".$user['last_name'];
                // header("location:../../backend/retailer/deshboard.php");
                header("location:../my-account.php");
            }
            else {
                header("location:../simple_user_login.php?msg=2");
            } 
        }
    }else{
        header("location:../simple_user_login.php?msg=1");
    }

function mysql_entities_fix_string($string){return htmlentities(mysql_fix_string($string));}
function mysql_fix_string($string){
    if (get_magic_quotes_gpc()) 
        $string = stripslashes($string);
    return $string;
}

?>