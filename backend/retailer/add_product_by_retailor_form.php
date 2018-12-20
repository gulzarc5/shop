<?php
include_once "../admin/databaseConnection/connection.php";
require_once('partials/header.php');
?>
  <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Retailer Dashboard</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li class="active">Dashboard/Add Product</li>
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
    <form action="serverScripts/add_product_retailer.php" method="post" class="form-horizontal" enctype="multipart/form-data">
        <div class="card">
            <div class="card-header">
                <strong>Product </strong> Information
            </div>
            <?php
                if(!empty($_GET['msg'])){
                    $val = $_GET['msg'];
                        // echo $val;
                    if ($val == 1) {
                        print "<div class='alert alert-success' role='alert'>City Added Successfully</div>";
                    }
                    if ($val == 2) {
                        print "<div class='alert alert-danger' role='alert'>Something Went Wrong Please Try Again</div>";
                    }
                    if ($val == 3) {
                        print "<div class='alert alert-info' role='alert'>Please Enter City Name Properly</div>";
                    }                       
                }
            ?>   
	       <div class="card-body card-block">
                <div class="row form-group">
                   <div class="col col-md-3"><label for="product_title" class=" form-control-label"> Product Title</label></div>
                   <div class="col-12 col-md-9"><input type="text" name="product_title" placeholder="Enter Product Title..." class="form-control" required></div>
               </div>

               <div class="row form-group">
                    <div class="col col-md-3"><label for="description" class=" form-control-label">Description</label></div>
                    <div class="col-12 col-md-9"><textarea name="description"  rows="5" placeholder="Enter Description" class="form-control"></textarea></div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3"><label for="category" class=" form-control-label">Product Category</label></div>
                    <div class="col-12 col-md-9">
                        <select name="category"  class="form-control" required>
                            <option value="" selected>Select Product Category...</option>
                                <?php
                                    $category_sql ="SELECT * FROM `category` WHERE `status`='1'";
                                    if($category_result=$connection->query($category_sql)){
                                        while ($category_row=$category_result->fetch_assoc()) {
                                            print"<option value='$category_row[category_id]'>$category_row[category_code] - $category_row[name]</option>";
                                        }
                                    }
                                ?>                                
                        </select>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3"><label for="region" class=" form-control-label">Region </label></div>
                    <div class="col-12 col-md-9">
                        <select name="region"  class="form-control" required>
                            <option value="" selected>Select Region...</option>
                                <?php
                                    $region_sql ="SELECT * FROM `region` WHERE `status`='1'";
                                    if($region_result=$connection->query($region_sql)){
                                        while ($region_row=$region_result->fetch_assoc()) {
                                            print"<option value='$region_row[region_id]'>$region_row[region_code] - $region_row[name]</option>";
                                        }
                                    }
                                ?>                                
                        </select>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3"><label for="type" class=" form-control-label">Type </label></div>
                    <div class="col-12 col-md-9">
                        <select name="type"  class="form-control" required>
                            <option value="" selected>Select Type...</option>
                                <?php
                                    $type_sql ="SELECT * FROM `type` WHERE `status`='1'";
                                    if($type_result=$connection->query($type_sql)){
                                        while ($type_row=$type_result->fetch_assoc()) {
                                            print"<option value='$type_row[type_id]'>$type_row[type_code] - $type_row[name]</option>";
                                        }
                                    }
                                ?>                                
                        </select>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3"><label for="grade_code" class=" form-control-label">Grade Code </label></div>
                    <div class="col-12 col-md-9">
                        <select name="grade_code"  class="form-control" required>
                            <option value="" selected>Select Grade Code...</option>
                                <?php
                                    $grade_code_sql ="SELECT * FROM `grade_code` WHERE `status`='1'";
                                    if($grade_code_result=$connection->query($grade_code_sql)){
                                        while ($grade_code_row=$grade_code_result->fetch_assoc()) {
                                            print"<option value='$grade_code_row[grade_code_id]'>$grade_code_row[grade_code] </option>";
                                        }
                                    }
                                ?>                                
                        </select>
                    </div>
                </div>

                <div class="row form-group">
                   <div class="col col-md-3"><label for="in_house_code" class=" form-control-label"> In House Code</label></div>
                   <div class="col-12 col-md-9"><input type="text" name="in_house_code" placeholder="Mention if Any..." class="form-control" required></div>
               </div>

               <div class="row form-group">
                   <div class="col col-md-3"><label for="tea_name" class=" form-control-label"> Name of Tea</label></div>
                   <div class="col-12 col-md-9"><input type="text" name="tea_name" placeholder="Name of Tea..." class="form-control" required></div>
               </div> 

               <div class="row form-group">
                    <div class="col col-md-3"><label for="pack_description" class=" form-control-label">Pack Description</label></div>
                    <div class="col-12 col-md-9"><textarea name="pack_description"  rows="5" placeholder="Enter Pack Description" class="form-control"></textarea></div>
                </div>
                <div id="more_sizes">
                <div class="row form-group">
                   <div class="col col-md-3"><label for="product_size" class=" form-control-label"> Available Sizes </label></div>
                   <div class="col-12 col-md-2"><input type="text" name="product_size[]" placeholder="ex. 12" class="form-control" required></div>
                   <div class="col-12 col-md-5" >

                     <select name="product_size_type[]"  class="form-control" required id="images_select_box" required>
                            <option value="" selected>Select Type...</option>
                                <?php
                                    $grade_code_sql ="SELECT * FROM `weight_type`";
                                    if($grade_code_result=$connection->query($grade_code_sql)){
                                        while ($grade_code_row=$grade_code_result->fetch_assoc()) {
                                            print"<option value='$grade_code_row[weight_type_id]'>$grade_code_row[name] </option>";
                                        }
                                    }
                                ?>                                
                        </select>

                   </div>
                   <div class="col-12 col-md-2"><button type="button" class="btn btn-link" id="product_size_add_more" class="form-control"><i class="fa fa-link"></i>&nbsp;Add More</button></div>
               </div>
               </div>


              
                <div class="row form-group">
                   <div class="col col-md-3"><label for="weight" class=" form-control-label"> Weight Per Pack </label></div>
                   <div class="col-12 col-md-3"><input type="text" name="weight" placeholder="ex. 12" class="form-control" required></div>
                   <div class="col-12 col-md-6" >

                     <select name="weight_type"  class="form-control" required id="images_select_box">
                            <option value="" selected>Select Type...</option>
                                <?php
                                    $grade_code_sql ="SELECT * FROM `weight_type`";
                                    if($grade_code_result=$connection->query($grade_code_sql)){
                                        while ($grade_code_row=$grade_code_result->fetch_assoc()) {
                                            print"<option value='$grade_code_row[weight_type_id]'>$grade_code_row[name] </option>";
                                        }
                                    }
                                ?>                                
                        </select>

                   </div>
               </div>

                <div class="row form-group">
                   <div class="col col-md-3"><label for="rate" class=" form-control-label"> Rate / Unit </label></div>
                   <div class="col-12 col-md-3"><input type="text" name="rate" placeholder="ex. 12" class="form-control" required></div>
                   <div class="col-12 col-md-6" >

                     <select name="rate_currency"  class="form-control" required id="images_select_box">
                            <option value="" selected>Select Currency...</option>
                            <option value="1">INR</option>
                            <option value="2">USD</option>                                 
                        </select>

                   </div>
               </div>

               <div class="row form-group">
                   <div class="col col-md-3"><label for="min_order" class=" form-control-label"> Minimum Order </label></div>
                   <div class="col-12 col-md-3"><input type="text" name="min_order" placeholder="ex. 12" class="form-control" required></div>
                   <div class="col-12 col-md-6" >

                     <select name="min_order_unit"  class="form-control" required id="images_select_box">
                            <option value="" selected>Select Unit...</option>
                                <?php
                                    $grade_code_sql ="SELECT * FROM `weight_type`";
                                    if($grade_code_result=$connection->query($grade_code_sql)){
                                        while ($grade_code_row=$grade_code_result->fetch_assoc()) {
                                            print"<option value='$grade_code_row[weight_type_id]'>$grade_code_row[name] </option>";
                                        }
                                    }
                                ?>                                
                        </select>

                   </div>
               </div>

               <div id="image_more">
                <div class="row form-group">
                   <div class="col col-md-3"><label for="product_image" class=" form-control-label"> Upload Image</label></div>
                   <div class="col-12 col-md-7"><input type="file" name="product_image[]" placeholder="Enter Product Title..." class="form-control"></div>
                   <div class="col-12 col-md-2"><button type="button" class="btn btn-link" id="product_image_add_more" class="form-control"><i class="fa fa-link"></i>&nbsp;Add More</button></div>
               </div>
           </div>

            <div class="card-footer">
                <button type="submit" name="add_retailer_product" value="add_retailer_product" class="btn btn-primary btn-sm">
                    <i class="fa fa-dot-circle-o"></i> Submit
                </button>
               <!--  <button type="reset" class="btn btn-danger btn-sm">
                    <i class="fa fa-ban"></i> Reset
                </button> -->
            </div>
        </div>
    	</form>
  </div> 
<div class="col-lg-1"></div>
<!--///////////////////// Region Add form Section /////////////////////////-->

<?php
    require_once('../partials/footer.php');
?>
 <script src="../../assets/datatable/jquery-3.3.1.js"></script>
<script>
    // AJAX call for autocomplete 
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
     var image_id = "sz"+product_size_add_more_count;
        var product_size_add_more = "<div class='row form-group' id = '"+image_id+"'><div class='col col-md-3'></div><div class='col-12 col-md-2'><input type='text' name='product_size[]' placeholder='ex. 12' class='form-control'></div><div class='col-12 col-md-5'><select name='product_size_type[]'  class='form-control' required id='images_select_box'>"+images_select_box+"</select></div><div class='col-12 col-md-2'><button type='button' class='btn btn-link' id='"+image_id+"' onclick='removeDiv(this.id)'><i class='fa fa-link'></i>&nbsp;Remove</button></div></div>";
       $("#more_sizes").append(product_size_add_more);
       product_size_add_more_count = product_size_add_more_count+1;
    });
});

</script>
<script type="text/javascript">
     function removeDiv(elem) {
         alert(elem);
         $("#"+elem).remove();
    }
</script>

<script type="text/javascript">
    var product_image_add_more_count = 1;
     $("#product_image_add_more").click(function(){
// alert(product_size_add_more_count);
    var image_id = "img"+product_image_add_more_count;
        var product_image_add_more = "<div class='row form-group' id = '"+image_id+"'><div class='col col-md-3'><label for='product_image' class=' form-control-label'> </label></div>"+
                  "<div class='col-12 col-md-7'><input type='file' name='product_image[]'  class='form-control'></div>"+
                   "<div class='col-12 col-md-2'><button type='button' class='btn btn-link'  class='form-control' id='"+image_id+"' onclick='removeDiv(this.id)'><i class='fa fa-link'></i>&nbsp;Remove</button></div></div>";

       $("#image_more").append(product_image_add_more);
       product_image_add_more_count = product_image_add_more_count+1;
    });
</script>
  
                   
                   
                   