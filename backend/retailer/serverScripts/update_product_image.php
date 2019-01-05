<?php
//Database Connection included
session_start();
include_once "..\..\admin\databaseConnection\connection.php";

if ($_POST['update_retailer_product_image'] && !empty($_POST['update_retailer_product_image'])){
		$product_image = $_FILES['image'];  //array of image
		$product_id = $_POST['product_id'];
       
       if (isset($product_image)){
       		$product_main_image = null;
       		for($i = 0; $i < count($product_image['name']); $i++){
       			if (isset($product_image['name'][$i])) {
       				$product_image_name	  = $product_image['name'][$i];
	       			$product_image_tmp_name = $product_image['tmp_name'][$i];
	       			$ext_explode = explode(".",$product_image_name);
	       			$ext = strtolower(end($ext_explode));
	       			if( $ext=='jpg' || $ext=='jpeg' || $ext=='png' || $ext=='bmp' || $ext=='gif' ){
	       				$image_name = md5(uniqid()).date('now').".".$ext;
	       				$path = "../../uploads/product_image/".$image_name ;
	       				move_uploaded_file($product_image_tmp_name,$path);

	       				$sql_product_image ="INSERT INTO `product_image`(`product_image_id`, `product_id`, `image_name`) VALUES (null,'$product_id','$image_name')";
	       				if ($result=$connection->query($sql_product_image)) {
					 		
					 	}
	       			}else{
	       				header("location:../retailer_product_image_edit_form.php?pd_id=".$product_id."&msg=2");
	       			}
       			}
       			
	 		}
	 		header("location:../retailer_product_image_edit_form.php?pd_id=".$product_id."&msg=4");
       }else{
       		header("location:../retailer_product_image_edit_form.php?pd_id=".$product_id."&msg=2");
       }
	}else{
	 	header("location:../retailer_product_image_edit_form.php?pd_id=".$product_id."&msg=2");
	}
?>