<?php
session_start();
unset($_SESSION['email']);
unset($_SESSION['user_type']);
unset($_SESSION['name']);
session_destroy();
header("Location:../index.php");
?>