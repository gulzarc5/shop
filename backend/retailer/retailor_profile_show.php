<?php
require_once('partials/header.php');
include_once "../admin/databaseConnection/connection.php";

$user_id = $_SESSION['user_id'];
$user_email =  $_SESSION['email'];
$sql = "SELECT * FROM `users` WHERE `user_id`='$user_id' AND `email_id` = '$user_email'";
$result = $connection->query($sql);
?>
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>My Profile</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li class="active">Dashboard<b>/</b>Myprofile</li>
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
        if ($result) {
           $user = $result->fetch_assoc();
        

    ?>
    <form action="serverScripts/retailor_registration.php" method="post" class="form-horizontal">
        <div class="card">  
          <div class="card">
            <div class="card-header">
                <strong>Personal </strong> Details
            </div>
           <div class="card-body card-block">
               <div class="row form-group">
                   <div class="col col-md-3"><label for="first_name" class="form-control-label">First Name</label></div>
                    <div class="col-12 col-md-9">
                        <input type="text"  name="first_name" value="<?php echo $user['first_name'] ?>" class="form-control" disabled>
                    </div>
               </div>
               <?php
                    if (!empty($user['middle_name'])) {
                ?>

               <div class="row form-group">
                   <div class="col col-md-3"><label for="middle_name" class=" form-control-label">Middle Name</label></div>
                    <div class="col-12 col-md-9">
                        <input type="text"  name="middle_name" class="form-control" value="<?php echo $user['middle_name'] ?>" disabled>
                    </div>
               </div>
               <?php
                    }
               ?>
               <div class="row form-group">
                   <div class="col col-md-3"><label for="last_name" class=" form-control-label">Last Name </label></div>
                    <div class="col-12 col-md-9">
                        <input type="text"  name="last_name"  class="form-control" value="<?php echo $user['last_name'] ?>" disabled>
                    </div>
               </div>  
               <?php 
                    if (!empty($user['designation_id'])) {
                        $designation_sql = "SELECT * FROM `designation` WHERE `designation_id` = '$user[designation_id]'";
                        if ($result_designation = $connection->query($designation_sql)) {
                            $designation = $result_designation->fetch_assoc();
               ?>            
               <div class="row form-group">
                    <div class="col col-md-3"><label for="designation" class=" form-control-label">Designation </label></div>
                    <div class="col-12 col-md-9">
                        <input type="text"  name="designation"  class="form-control" value="<?php echo $designation['designation_name'];?>" disabled>
                    </div>
                </div>

                <?php
                        }
                    }
                ?>

                 <?php 
                    if (!empty($user['address_id'])) {
                        $address_sql = "SELECT state.name as state_name, city.name as city_name ,address.street as location FROM ((`address` INNER JOIN state ON address.state_id = state.id) INNER JOIN city ON address.city_id = city.city_id) WHERE `address_id` ='$user[address_id]'
";
                        if ($result_address = $connection->query($address_sql)) {
                            $address = $result_address->fetch_assoc();
               ?>  
                <div class="row form-group">
                    <div class="col col-md-3"><label for="state" class=" form-control-label">State </label></div>
                    <div class="col-12 col-md-9">
                        <input type="text"  name="state"  class="form-control" value="<?php echo $address ['state_name']?>" disabled>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3"><label for="city" class=" form-control-label">City</label></div>
                    <div class="col-12 col-md-9">
                         <input type="text"  name="city"  class="form-control" value="<?php echo $address ['city_name']?>" disabled>
                    </div>
                </div>   

                <div class="row form-group">
                   <div class="col col-md-3"><label for="locality" class=" form-control-label"> Locality</label></div>
                   <div class="col-12 col-md-9">
                    <input type="text" name="locality"  class="form-control" value="<?php echo $address ['location']?>" disabled>
                </div>
               </div>
                <?php
                        }
                    }
                ?>
               <div class="row form-group">
                   <div class="col col-md-3"><label for="mobile_number" class=" form-control-label"> Mobile No.</label></div>
                   <div class="col-12 col-md-9">
                        <input type="text" name="mobile_number" class="form-control" value="<?php echo $user ['mobile_no']?>" disabled>
                    </div>
               </div>

               <div class="row form-group">
                    <div class="col col-md-3"><label for="mobile_number_alternate" class=" form-control-label"> Mobile No.(Alternate )</label></div>
                    <div class="col-12 col-md-9">
                        <input type="text" name="mobile_number_alternate" class="form-control" disabled>
                    </div>
               </div>

                <div class="row form-group">
                   <div class="col col-md-3"><label for="email" class=" form-control-label"> Email </label></div>
                   <div class="col-12 col-md-9">
                        <input type="email" name="email" class="form-control" value="<?php echo $user ['email_id']?>" disabled>
                    </div>
               </div>

               <div class="row form-group">
                   <div class="col col-md-3"><label for="email_alternate" class=" form-control-label"> Email(Alternate )</label></div>
                   <div class="col-12 col-md-9">
                        <input type="email" name="email_alternate" class="form-control" disabled>
                    </div>
               </div>


            </div>
            <div class="card-footer">
                <!-- <button type="submit" name="add_city" value="add_city" class="btn btn-primary btn-sm">
                    <i class="fa fa-dot-circle-o"></i> Submit
                </button> -->
               <!--  <button type="reset" class="btn btn-danger btn-sm">
                    <i class="fa fa-ban"></i> Reset
                </button> -->
            </div>
        </div>
            <div class="card-header">
                <strong>Business </strong> Information
            </div>
           <div class="card-body card-block">
                <div class="row form-group">
                   <div class="col col-md-3"><label for="organization" class=" form-control-label"> Organization Name </label></div>
                   <div class="col-12 col-md-9">
                        <input type="text" name="organization"  class="form-control" value="<?php echo $user ['organization']?>" disabled>
                    </div>
               </div>                

               <div class="row form-group">
                   <div class="col col-md-3"><label for="trade_licence_number" class=" form-control-label"> Trade Licence Number </label></div>
                   <div class="col-12 col-md-9">
                        <input type="text" name="trade_licence_number"  class="form-control" value="<?php echo $user ['trade_licence_number']?>" disabled>
                    </div>
               </div>
            <?php
                if (!empty($user['trade_licence_using_authority'])) {
                    # code...
                    ?>
               <div class="row form-group">
                   <div class="col col-md-3"><label for="licence_issuing_authority" class=" form-control-label"> Licence Issuing Authority </label></div>
                   <div class="col-12 col-md-9">
                        <input type="text" name="licence_issuing_authority"  class="form-control" value="<?php echo $user ['trade_licence_using_authority']?>" disabled>
                    </div>
               </div>
               <?php
                 }
            ?>
               <div class="row form-group">
                   <div class="col col-md-3"><label for="pan" class=" form-control-label">PAN</label></div>
                   <div class="col-12 col-md-9">
                        <input type="text"  name="pan" class="form-control" value="<?php echo $user ['pan']?>" disabled>
                    </div>
               </div>

               <div class="row form-group">
                   <div class="col col-md-3"><label for="gstin" class=" form-control-label">GSTIN </label></div>
                    <div class="col-12 col-md-9">
                        <input type="text"  name="gstin" class="form-control" value="<?php 
                        if(!empty($user['GSTIN'])){
                            echo $user ['GSTIN'];
                        }?>
                        " disabled>
                    </div>
               </div>

               <div class="row form-group">
                    <div class="col col-md-3"><label for="gstin_category" class=" form-control-label">GSTIN Category</label></div>
                    <div class="col-12 col-md-9">
                       <input type="text"  name="gstin_category" class="form-control" value="<?php 
                        if(!empty($user['GSTIN_category_id'])){
                            $GSTIN_category_sql = "SELECT * FROM `gstin_category` WHERE `GSTIN_category_id` = '$user[GSTIN_category_id]'";
                        if ($result_GSTIN_category = $connection->query($GSTIN_category_sql)) {
                            $GSTIN_category = $result_GSTIN_category->fetch_assoc();
                            echo $GSTIN_category['name'];
                        }
                        }?>
                        " disabled>
                    </div>
                </div>

                <div class="row form-group">
                   <div class="col col-md-3"><label for="iec" class=" form-control-label">IEC</label></div>
                   <div class="col-12 col-md-9">
                        <input type="text"  name="iec" class="form-control" value="<?php 
                        if(!empty($user['IEC_code'])){
                            echo $user['IEC_code'];
                        }
                        ?>
                        " disabled>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3"><label for="membership" class=" form-control-label">Membership </label></div>
                    <div class="col-12 col-md-9">
                        <input type="text"  name="membership" class="form-control" value="<?php 
                        if(!empty($user['membership_id'])){
                            $membership_sql = "SELECT * FROM `membership` WHERE `membership_id` = '$user[membership_id]'";
                        if ($result_membership = $connection->query($membership_sql)) {
                            $membership = $result_membership->fetch_assoc();
                            echo $membership['organization_name'];
                        }
                        }?>
                        " disabled>
                    </div>
                </div>

                <div class="row form-group">
                   <div class="col col-md-3"><label for="membership_number" class=" form-control-label">Membership Number</label></div>
                   <div class="col-12 col-md-9">
                        <input type="text"  name="membership_number"  class="form-control" value="<?php 
                        if(!empty($user['membership_number'])){
                            echo $user['membership_number'];
                        }
                        ?>
                        " disabled>
                    </div>
                </div>

                <div class="row form-group">
                   <div class="col col-md-3"><label for="membership_location" class=" form-control-label">Membership Location</label></div>
                   <div class="col-12 col-md-9">
                        <input type="text"  name="membership_location" class="form-control" value="<?php 
                        if(!empty($user['membership_location'])){
                            echo $user['membership_location'];
                        }
                        ?>
                        " disabled>
                    </div>
                </div>
                </form>
                <div class="card-footer">
                  <a href="retailor_profile_edit_form.php" class="btn-primary btn-sm">
                        <i class="fa fa-dot-circle-o"></i> Edit Profile
                  </a>
                </div>                           
            </div>
        </div>
     <!--    <div class="card">
            <div class="card-footer">
                <button type="submit" name="add_retailor" value="add_retailor" class="btn btn-primary btn-sm">
                    <i class="fa fa-dot-circle-o"></i> Edit Profile
                </button>
            </div>
        </div> -->
        
        <?php
        }else{
             echo "<div class='alert alert-danger' role='alert'>Something Went Wrong Please Try Again</div>";
        }
        ?>
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
});

</script>