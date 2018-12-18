<?php
	//Database Connection included
	include_once "..\databaseConnection\connection.php";

	//If region add request comes then this portion will executed
	if ($_POST['add_category'] && !empty($_POST['category'])) {
		$category_name = $_POST['category'];
		$category_name_array = str_split($category_name);
		//Function to Generate Region Code
		function generateRegion($start,$category_name_array){
			$count = 0;
			$category_code = null;
			for($i = $start ; $i < count($category_name_array); $i++){
				if ($count == 0) {
					$category_code = $category_name_array[0].$category_name_array[$i];
					$count++;
				}
				else{
					break;
				}				
			}
			return compact('category_code','i');
		}


		$categoryCode = generateRegion(1,$category_name_array);
		
		// if generated region code found our database then again generate new region code
		$status=0;
		while($status == 0 && $categoryCode['i'] != count($category_name_array)){
			$CatCode = strtoupper($categoryCode['category_code']);

			$sql = "SELECT * FROM `category` WHERE `category_code` = '$CatCode'";
			
			if ($result = $connection->query($sql)) {

				if($result->num_rows > 0){
					$categoryCode = generateRegion($categoryCode['i'],$category_name_array);
				}else{
					$status = 1;
				}
			}
		}
		// After final generatioon of region code insert into database region with region code
		$CatCode = strtoupper($categoryCode['category_code']);
		$category_insert_query = "INSERT INTO `category`(`category_id`, `name`, `category_code`, `status`, `created_at`) VALUES (null,'$category_name','$CatCode','1',null)";
		$runQuery1 = $connection->query($category_insert_query);
		if ($runQuery1) {
			 header("location:../add_category_form.php?msg=1");
		}else{
			header("location:../add_category_form.php?msg=2");
		}
	}
?>