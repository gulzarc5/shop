<?php
	include_once "../../backend/admin/databaseConnection/connection.php"; 

	if (!empty($_POST['state'])) {
		$state = $_POST['state'];
		$sql = "SELECT * FROM `city` WHERE `state_id`='$state'";
		$data = "<option value='' selected>Select City...</option>";
		if ($result=$connection->query($sql)){
			while($row=$result->fetch_array()){
				$data = $data."<option value=".$row['city_id'].">".$row['name']."</option>";
			}
		}
	}
	// return $row;
	echo $data;

?>