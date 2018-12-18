<?php
	//Database Connection included
	include_once "..\databaseConnection\connection.php";

	//If region add request comes then this portion will executed
	if ($_POST['add_region']) {
		$region_name = $_POST['region'];
		$region_name_array = str_split($region_name);

		//Function to Generate Region Code
		function generateRegion($start,$region_name_array){
			$count = 0;
			$region_code = null;
			for($i = $start ; $i < count($region_name_array); $i++){
				if ($count == 0) {
					$region_code = $region_name_array[0].$region_name_array[$i];
					$count++;
				}
				else{
					break;
				}				
			}
			return compact('region_code','i');
		}


		$regionCode = generateRegion(1,$region_name_array);
		
		// if generated region code found our database then again generate new region code
		$status=0;
		while($status == 0 && $regionCode['i'] != count($region_name_array)){
			$RCode = strtoupper($regionCode['region_code']);
			$sql = "SELECT * FROM `region` WHERE `region_code` = '$RCode'";
			
			if ($result = $connection->query($sql)) {
				if($result->num_rows > 0){
					$regionCode = generateRegion($regionCode['i'],$region_name_array);
				}else{
					$status = 1;
				}
			}
		}

		// After final generatioon of region code insert into database region with region code
		$RCode = strtoupper($regionCode['region_code']);
		$region_insert_query = "INSERT INTO `region`(`region_id`, `name`, `region_code`, `status`, `created_at`) VALUES (null,'$region_name','$RCode','1',null)";
		$runQuery1 = $connection->query($region_insert_query);
		if ($runQuery1) {
			 header("location:../add_region_form.php?msg=1");
		}else{
			echo "oops Something Went Wrong";
		}
	}
?>