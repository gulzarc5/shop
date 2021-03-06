<?php
include_once "../admin/databaseConnection/connection.php";
require_once('partials/header.php');

?>
  <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Product Edit</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li class="active">Dashboard/Product Edit</li>
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
                        print "<div class='alert alert-danger' role='alert'>Please Check The Form And Try Again</div>";
                    }
                    if ($val == 2) {
                        print "<div class='alert alert-danger' role='alert'>Something Went Wrong Please Try Again</div>";
                    }
                    if ($val == 3) {
                        print "<div class='alert alert-info' role='alert'>Product Inserted Please Update Product Thumbnail</div>";
                    } 
                    if ($val == 4) {
                        print "<div class='alert alert-success' role='alert'>Product Inserted Successfully</div>";
                    }                        
                }
            ?> 
    <form action="serverScripts/update_product.php" method="post" class="form-horizontal" enctype="multipart/form-data">  
        <div class="card">
            <div class="card-header">
                <strong>Product </strong> Information
            </div>
            <?php
                if (isset($_GET['pd_id']) && !empty($_GET['pd_id'])) {
                    $product_id_update = $_GET['pd_id'];
                    $sql_product = "SELECT * FROM `products` WHERE `product_id`='$_GET[pd_id]' AND `created_by_id`='$_SESSION[user_id]'";
                    if ($result_product = $connection->query($sql_product)) {
                        if ($product = $result_product->fetch_assoc()) {
                            
            
            ?>
            <input type="hidden" name="product_id" value="<?php echo $product_id_update ?>">

	       <div class="card-body card-block">
                <div class="row form-group">
                   <div class="col col-md-3"><label for="product_title" class=" form-control-label"> Product Title</label></div>
                   <div class="col-12 col-md-9"><input type="text" name="product_title" placeholder="Enter Product Title..." class="form-control" value="<?php echo $product['title'];?>" required></div>
               </div>

               <div class="row form-group">
                    <div class="col col-md-3"><label for="description" class=" form-control-label">Description</label></div>
                    <div class="col-12 col-md-9"><textarea name="description"  rows="5" placeholder="Enter Description" class="form-control"><?php echo $product['description'];?></textarea></div>
                </div>

                <div class="row form-group">
                   <div class="col col-md-3"><label for="in_house_code" class=" form-control-label"> In House Code</label></div>
                   <div class="col-12 col-md-9"><input type="text" name="in_house_code" placeholder="Mention if Any..." class="form-control" value="<?php echo $product['inhouse_code'];?>" required></div>
               </div>

               <div class="row form-group">
                   <div class="col col-md-3"><label for="tea_name" class=" form-control-label"> Name of Tea</label></div>
                   <div class="col-12 col-md-9"><input type="text" name="tea_name" placeholder="Name of Tea..." class="form-control" value="<?php echo $product['brand_name'];?>" required></div>
               </div> 

               <div class="row form-group">
                    <div class="col col-md-3"><label for="pack_description" class=" form-control-label">Pack Description</label></div>
                    <div class="col-12 col-md-9"><textarea name="pack_description"  rows="5" placeholder="Enter Pack Description" class="form-control">
                        <?php echo $product['pack_description'];?>
                    </textarea></div>
                </div>
                <div id="more_sizes">
                  <?php
                  $flag = true;
                    $sql_product_size = "SELECT * FROM `product_sizes` WHERE `product_id`='$_GET[pd_id]'";
                    if ($result_product_size = $connection->query($sql_product_size)) {
                        $count = 1;
                      while ($product_size = $result_product_size->fetch_assoc()) {
                  ?>
                  <div class="row form-group">
                     <div class="col col-md-3"><label for="product_size" class=" form-control-label"> Available Sizes </label></div>
                     <div class="col-12 col-md-3"><input type="text" name="product_size[]" placeholder="Enter Size" class="form-control" value="<?php echo $product_size['size'];?>" required>
                      <span class="help-block">Product Size</span></div>
                     <div class="col-12 col-md-4" >

                       <select name="product_size_type[]"  class="form-control" required id="images_select_box" required>
                              <option value="" selected>Select Type...</option>
                                  <?php
                                      $grade_code_sql ="SELECT * FROM `weight_type`";
                                      if($grade_code_result=$connection->query($grade_code_sql)){
                                          while ($grade_code_row=$grade_code_result->fetch_assoc()) {
                                            if ($grade_code_row['weight_type_id'] == $product_size['weight_type_id']) {
                                               print"<option value='$grade_code_row[weight_type_id]' selected>$grade_code_row[name] </option>";
                                            }else{
                                              print"<option value='$grade_code_row[weight_type_id]'>$grade_code_row[name] </option>";
                                            }
                                          }
                                      }
                                  ?>                                
                          </select>
                          <span class="help-block">Weight Type</span>
                     </div>
                       <div class="col-12 col-md-2"><input type="text" name="min_order[]" value="<?php echo $product_size['min_order']; ?> " class="form-control" required>
                        <span class="help-block">Min Order</span></div>
                     <!-- Next Line of available size -->
                     <br><br>
                     <div class="col col-md-3"></div>
                     <div class="col-12 col-md-3"><input type="text" name="product_price[]" value="<?php echo $product_size['rate']; ?> " class="form-control" required>
                      <span class="help-block">Price</span></div>
                     <div class="col-12 col-md-4">
                          <select name="rate_currency[]"  class="form-control" required id="images_select_box">
                          <option value="" selected>Select Currency...</option>
                          <?php 
                            if ($product_size['currency_type'] == 1) {
                              print ' <option value="1" selected>INR</option>';
                            }else{
                              print ' <option value="2" selected>USD</option>';
                            }
                          ?>                              
                      </select>
                      <span class="help-block">Currency</span>
                     </div>
                    <?php
                      if ($flag == true) {
                    ?>

                     <div class="col-12 col-md-2"><button type="button" class="btn btn-link" id="product_size_add_more" class="form-control"><i class="fa fa-link"></i>&nbsp;Add More</button></div>

                     <?php
                        $flag = false;
                      }
                     ?>
                 </div>
                 <?php
                   }
                 }
                 ?>
               </div>

<!-- 
               <div id="image_more">
                <div class="row form-group">
                   <div class="col col-md-3"><label for="product_image" class=" form-control-label"> Upload Image</label></div>
                   <div class="col-12 col-md-7" id ="product_image" onclick="getImageBoxId(this.id)"><input type="file" name="product_image[]" placeholder="Enter Product Title..." class="form-control" id = 'inputproduct_image' onChange="validate(this.value)"></div>
                   <div class="col-12 col-md-2"><button type="button" class="btn btn-link" id="product_image_add_more" class="form-control"><i class="fa fa-link"></i>&nbsp;Add More</button></div>
               </div>
           </div> -->

            <div class="card-footer">
                <button type="submit" name="update_retailer_product" value="update_retailer_product" class="btn btn-primary btn-sm">
                    <i class="fa fa-dot-circle-o"></i> Submit
                </button>
               <!--  <button type="reset" class="btn btn-danger btn-sm">
                    <i class="fa fa-ban"></i> Reset
                </button> -->
            </div>
        </div>
        <?php
                    }
                }
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
// AJAX for
$(document).ready(function(){
    $("#state").change(function(){
        // alert($(this).val());
        $.ajax({
        type: "POST",
        url: "ajaxphp/city_fetch.php",
        data:'state='+$(this).val(),
        success: function(data){
            // console.log(data);
            // $("#suggesstion-box").show();
            $("#city").html(data);
            // $("#trnto").css("background","#FFF");
        }
        });
    });
    var product_size_add_more_count = 1;
    var images_select_box = $("#images_select_box").html();
    $("#product_size_add_more").click(function(){
// alert(product_size_add_more_count);
     var product_size_id = "sz"+product_size_add_more_count;
        var product_size_id = "sz"+product_size_add_more_count;
        var product_size_add_more = "<div class='row form-group' id = '"+product_size_id+"'><div class='col col-md-3'></div><div class='col-12 col-md-3'><input type='text' name='product_size[]' placeholder='Enter Size' class='form-control'></div><div class='col-12 col-md-4'><select name='product_size_type[]'  class='form-control' required id='images_select_box'>"+images_select_box+"</select></div><div class='col-12 col-md-2'><input type='text' name='min_order[]'' placeholder='Min Order' class='form-control' required></div><br><br><div class='col col-md-3'></div><div class='col-12 col-md-3'><input type='text' name='product_price[]' placeholder='Enter Price' class='form-control' required></div><div class='col-12 col-md-4'><select name='rate_currency[]'  class='form-control' required id='images_select_box'><option value='' selected>Select Currency...</option><option value='1'>INR</option><option value='2'>USD</option></select></div><div class='col-12 col-md-2'><button type='button' class='btn btn-link' id='"+product_size_id+"' onclick='removeDiv(this.id)'><i class='fa fa-link'></i>&nbsp;Remove</button></div></div>";
       $("#more_sizes").append(product_size_add_more);
       product_size_add_more_count = product_size_add_more_count+1;
    });
});

</script>
<script type="text/javascript">
     function removeDiv(elem) {
         // alert(elem);
         $("#"+elem).remove();
    }
</script>



<!-- Image Validation Script -->


<script type="text/javascript">
    var product_image_add_more_count = 1;
     $("#product_image_add_more").click(function(){
        if (product_image_add_more_count == 5) {
             $("#product_image_add_more").attr('disabled',true);
         }else{
            $("#product_image_add_more").attr('disabled',false);
         }
            var image_id = "img"+product_image_add_more_count;
            var product_image_add_more = "<div class='row form-group' id = '"+image_id+"'><div class='col col-md-3'><label for='product_image' class=' form-control-label'> </label></div>"+
                      "<div class='col-12 col-md-7' id = '"+image_id+"' onclick='getImageBoxId(this.id)'><input type='file' id = 'input"+image_id+"' name='product_image[]'  class='form-control' onChange='validate(this.value)'></div>"+
                       "<div class='col-12 col-md-2'><button type='button' class='btn btn-link'  class='form-control' id='"+image_id+"' onclick='removeImageDiv(this.id)'><i class='fa fa-link'></i>&nbsp;Remove</button></div></div>";

           $("#image_more").append(product_image_add_more);
           product_image_add_more_count = product_image_add_more_count+1;
        
    });
</script>
  
<script type="text/javascript">
    var Image_box_id = null;
    function getImageBoxId(id){
        Image_box_id = id;
    }

    function validate(file) {
        var ext = file.split(".");
        ext = ext[ext.length-1].toLowerCase();      
        var arrayExtensions = ["jpg" , "jpeg", "png", "bmp", "gif"];

        if (arrayExtensions.lastIndexOf(ext) == -1) {
            alert("Please Select Correct Image");
            $("#input"+Image_box_id).val('');            
        }
    }

</script> 
                   
<script type="text/javascript">
     function removeImageDiv(elem) {
         $("#"+elem).remove();
         product_image_add_more_count = product_image_add_more_count-1;
         if (product_image_add_more_count > 5) {
             $("#product_image_add_more").attr('disabled',true);
         }else{
            $("#product_image_add_more").attr('disabled',false);
         }
    }
</script>               