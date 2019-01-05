<?php
include_once "../admin/databaseConnection/connection.php";
require_once('partials/header.php');

?>
  <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Product Image Edit</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li class="active">Dashboard/Product Image Edit</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

<!--///////////////////// Region Add form Section /////////////////////////-->
<div class="col-lg-1"></div>
<div class="col-lg-10">
   <!--  <div class="card">
        <div class="card-header">
            <strong>Add</strong> New Retailor
        </div> -->
        <?php
                if(!empty($_GET['msg'])){
                    $val = $_GET['msg'];
                        // echo $val;
                    if ($val == 1) {
                        print "<div class='alert alert-success' role='alert'>Thumbnail Set Successfully</div>";
                    }
                    if ($val == 2) {
                        print "<div class='alert alert-danger' role='alert'>Something Went Wrong Please Try Again</div>";
                    }
                    if ($val == 3) {
                        print "<div class='alert alert-info' role='alert'>Image Deleted Successfully</div>";
                    } 
                    if ($val == 4) {
                        print "<div class='alert alert-success' role='alert'>Image Updated Successfully</div>";
                    }                        
                }
            ?> 
    <form action="serverScripts/update_product_image.php" method="post" class="form-horizontal" enctype="multipart/form-data">  
        <div class="card">
            <div class="card-header">
                <strong>Product </strong> Information
            </div>
            <?php
                if (isset($_GET['pd_id']) && !empty($_GET['pd_id'])) {
                    $product_id_update = $_GET['pd_id'];
                    
                            
            
            ?>
            <input type="hidden" name="product_id" value="<?php echo $product_id_update ?>">

           <table>
            <?php 
            $product_main_image = null;
            $count = 1;
              $product_thumb_image_sql = "SELECT `product_main_image` FROM `products` WHERE `product_id`='$product_id_update' AND `created_by_id`='$_SESSION[user_id]'";
              if ($res_thumb = $connection->query($product_thumb_image_sql)) {
                  $row_thumb = $res_thumb->fetch_assoc();
                  $product_main_image = $row_thumb['product_main_image'];
              }

              $sql_product_image = "SELECT * FROM `product_image` WHERE `product_id` ='$_GET[pd_id]'";
              if ($result_product_image = $connection->query($sql_product_image)) {
                
                while ($product_image = $result_product_image->fetch_assoc()) {
                  if ($count%2 != 0) {
                     print '<tr>';
                  }
                 
                  print '<td>
                  <img src="../uploads/product_image/'.$product_image['image_name'].'" height="200" width="250">
                  </td>';
                  if ($product_main_image == $product_image['image_name']) {
                    print '<td><b class="btn btn-success">Thumb Image</b></td>';
                  }else{
                     print '<td><a href="serverScripts/delete_product_image.php?product_id='.$_GET['pd_id'].'&image_id='.$product_image['product_image_id'].'" class="btn btn-danger">Delete</a> 
                     <a href="serverScripts/set_thumb_product_image.php?product_id='.$_GET['pd_id'].'&image_id='.$product_image['product_image_id'].'" class="btn btn-info">Set as Thumb</a></td>';
                  }
                  
                   if ($count%2 == 0) {
                     print ' </tr>';
                  }
                  $count ++;
                }
              }
            ?>
            
           </table>

	       <div class="card-body card-block">
          <?php
          $flag_button = false;
            while ($count <= 5) {
          ?>
            <div class="row form-group">
                   <div class="col col-md-3"><label for="product_title" class=" form-control-label"> Image</label></div>
                   <div class="col-12 col-md-9"><input type="file" name="image[]" class="form-control"></div>
               </div>
          <?php
          $count++;
          $flag_button = true;
            }
          ?>
          <?php
            if ( $flag_button == true) {
           ?>         
            <div class="card-footer">
                <button type="submit" name="update_wseller_product_image" value="update_wseller_product_image" class="btn btn-primary btn-sm">
                    <i class="fa fa-dot-circle-o"></i> Submit
                </button>
            </div>
          <?php
            }
          ?>
        </div>
        <?php
                    
            }
        ?>

    	</form>
  </div> 
<div class="col-lg-1"></div>
<!--///////////////////// Region Add form Section /////////////////////////-->

<?php
    require_once('../partials/footer.php');
?>
 <script src="../../assets/datatable/jquery-3.3.1.js"></script>
<script>
