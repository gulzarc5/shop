<?php
defined("DB_HOST") ? null : define("DB_HOST", "localhost");

defined("DB_USER") ? null : define("DB_USER","root");


defined("DB_PASS") ? null : define("DB_PASS", "");

defined("DB_NAME") ? null : define("DB_NAME",  "newshopping");


$connection = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);
if($connection->connect_error)
	die("Could not connected".$conn->connect_error);

?>