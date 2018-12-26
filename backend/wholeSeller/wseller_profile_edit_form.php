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
                <h1>My Profile Edit</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li class="active">Dashboard<b>/</b>My Profile Edit</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<!--///////////////////// Region Add form Section /////////////////////////-->
<div class="col-lg-1"></div>
<div class="col-lg-10">
    <?php
        if ($result) {
           $user = $result->fetch_assoc();       

    ?>
    <form action="serverScripts/wseller_profile_update.php" method="post" class="form-horizontal">
        <div class="card">  
          <div class="card">
               <?php
            if(!empty($_GET['msg'])){
                $val = $_GET['msg'];
                // echo $val;
                if ($val == 1) {
                    print "<div class='alert alert-danger' role='alert'>Something Went Wrong Please Try Again</div>";
                }
                if ($val == 2) {
                    print "<div class='alert alert-success' role='alert'>Your Profile Updated Successfully</div>";
                }                    
            }
        ?>  
            <div class="card-header">
                <strong>Personal </strong> Details
            </div>
           <div class="card-body card-block">
               <!-- <div class="row form-group">
                   <div class="col col-md-3"><label for="first_name" class="form-control-label">First Name</label></div>
                    <div class="col-12 col-md-9">
                        <input type="text"  name="first_name" value="<?php 
                        // echo $user['first_name'] 
                        ?>" class="form-control">
                    </div>
               </div>
               <?php
                   
                ?>

               <div class="row form-group">
                   <div class="col col-md-3"><label for="middle_name" class=" form-control-label">Middle Name</label></div>
                    <div class="col-12 col-md-9">
                        <input type="text"  name="middle_name" class="form-control" value="<?php

                         // if (!empty($user['middle_name'])) {
                         // echo $user['middle_name']; } 
                         ?>">
                    </div>
               </div>

               <div class="row form-group">
                   <div class="col col-md-3"><label for="last_name" class=" form-control-label">Last Name </label></div>
                    <div class="col-12 col-md-9">
                        // <input type="text"  name="last_name"  class="form-control" value="<?php 
                        // echo $user['last_name'] 
                        ?>" >
                    </div>
               </div>  
               <div class="row form-group">
                    <div class="col col-md-3"><label for="designation" class=" form-control-label">Designation <span class="redstar"> * </span></label></div>
                    <div class="col-12 col-md-9">
                        <select name="designation"  class="form-control" required>
                            <option value="" selected>Select Designation...</option>
                                <?php
                                    // $sql ="SELECT * FROM `designation`";
                                    // if($result=$connection->query($sql)){
                                    //     $count = 1;
                                    //     while ($row=$result->fetch_assoc()) {
                                    //         if ($user['designation_id'] == $row[designation_id]) {
                                    //           print"<option value='$row[designation_id]' selected>$row[designation_name]</option>";
                                    //         }else{
                                    //             print"<option value='$row[designation_id]'>$row[designation_name]</option>";
                                    //         }
                                    //     }
                                    // }
                                ?>                                
                        </select>
                    </div>
                </div>  -->
                <input type="hidden" name="address_id" value="<?php echo $user['address_id']; ?>">
                <?php
                $address =null;
                    if (!empty($user['address_id'])) {
                        $address_sql = "SELECT * FROM `address` WHERE `address_id` ='$user[address_id]'";
                        if ($result_address = $connection->query($address_sql)) {
                            $address = $result_address->fetch_assoc();
                          }
                    }
               ?>  
                <!-- <div class="row form-group">
                    <div class="col col-md-3"><label for="state" class=" form-control-label">State <span class="redstar"> * </span></label></div>
                    <div class="col-12 col-md-9">
                        <select name="state" id="state" class="form-control" required>
                            <option value="" selected>Select State...</option>
                                <?php
                                    // $sql_state ="SELECT * FROM `state`";
                                    // if($result_state=$connection->query($sql_state)){
                                    //     $count = 1;
                                    //     while ($row_state=$result_state->fetch_assoc()) {
                                    //       if ($address['state_id'] == $row_state['id']) {
                                    //            print"<option value='$row_state[id]' selected>$row_state[name]</option>";
                                    //       }else{
                                    //         print"<option value='$row_state[id]'>$row_state[name]</option>";
                                    //       }
                                    //     }
                                    // }
                                ?>                                
                        </select>
                    </div>
                </div> -->

              <!--     <div class="row form-group">
                    <div class="col col-md-3"><label for="city" class=" form-control-label">City <span class="redstar"> * </span></label></div>
                    <div class="col-12 col-md-9">
                        <select name="city" id="city" class="form-control" required>
                            <option value="" selected>Select City...</option>
                             <?php
                                    // $sql_city ="SELECT * FROM `city` WHERE `state_id`='$address[state_id]'";
                                    // if($result_city=$connection->query($sql_city)){
                                    //     while ($row_city=$result_city->fetch_assoc()) {
                                    //       if ($address['city_id'] == $row_city['city_id']) {
                                    //            print"<option value='$row_city[city_id]' selected>$row_city[name]</option>";
                                    //       }else{
                                    //         print"<option value='$row_city[city_id]'>$row_city[name]</option>";
                                    //       }
                                    //     }
                                    // }
                                ?>

                        </select>
                    </div>
                </div> -->    

                <div class="row form-group">
                   <div class="col col-md-3"><label for="locality" class=" form-control-label"> Locality</label></div>
                   <div class="col-12 col-md-9">
                    <input type="text" name="locality"  class="form-control" value="<?php echo $address ['street']?>">
                </div>
               </div>

               <div class="row form-group">
                   <div class="col col-md-3"><label for="mobile_number" class=" form-control-label"> Mobile No.</label></div>
                   <div class="col-12 col-md-9">
                        <input type="text" name="mobile_number" class="form-control" value="<?php echo $user ['mobile_no']?>">
                    </div>
               </div>

               <div class="row form-group">
                    <div class="col col-md-3"><label for="mobile_number_alternate" class=" form-control-label"> Mobile No.(Alternate )</label></div>
                    <div class="col-12 col-md-9">
                        <input type="text" name="mobile_number_alternate" class="form-control" >
                    </div>
               </div>

                <div class="row form-group">
                   <div class="col col-md-3"><label for="email" class=" form-control-label"> Email </label></div>
                   <div class="col-12 col-md-9">
                        <input type="email" name="email" class="form-control" value="<?php echo $user ['email_id']?>">
                    </div>
               </div>

               <div class="row form-group">
                   <div class="col col-md-3"><label for="email_alternate" class=" form-control-label"> Email(Alternate )</label></div>
                   <div class="col-12 col-md-9">
                        <input type="email" name="email_alternate" class="form-control">
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
                <!-- <div class="row form-group">
                   <div class="col col-md-3"><label for="organization" class=" form-control-label"> Organization Name </label></div>
                   <div class="col-12 col-md-9">
                        <input type="text" name="organization"  class="form-control" value="<?php 
                        // echo $user ['organization']
                        ?>">
                    </div>
               </div>  -->               

               <div class="row form-group">
                   <div class="col col-md-3"><label for="trade_licence_number" class=" form-control-label"> Trade Licence Number </label></div>
                   <div class="col-12 col-md-9">
                        <input type="text" name="trade_licence_number"  class="form-control" value="<?php echo $user ['trade_licence_number']?>" >
                    </div>
               </div>
            <?php
                if (!empty($user['trade_licence_using_authority'])) {
                    # code...
                    ?>
               <div class="row form-group">
                   <div class="col col-md-3"><label for="licence_issuing_authority" class=" form-control-label"> Licence Issuing Authority </label></div>
                   <div class="col-12 col-md-9">
                        <input type="text" name="licence_issuing_authority"  class="form-control" value="<?php echo $user ['trade_licence_using_authority']?>" >
                    </div>
               </div>
               <?php
                 }
            ?>
               <div class="row form-group">
                   <div class="col col-md-3"><label for="pan" class=" form-control-label">PAN</label></div>
                   <div class="col-12 col-md-9">
                        <input type="text"  name="pan" class="form-control" value="<?php echo $user ['pan'];?>">
                    </div>
               </div>

               <div class="row form-group">
                   <div class="col col-md-3"><label for="gstin" class=" form-control-label">GSTIN </label></div>
                    <div class="col-12 col-md-9">
                        <input type="text"  name="gstin" class="form-control" value="<?php 
                        if(!empty($user['GSTIN'])){
                            echo $user ['GSTIN'];
                        }?>
                        ">
                    </div>
               </div>

               <div class="row form-group">
                    <div class="col col-md-3"><label for="gstin_category" class=" form-control-label">GSTIN Category</label></div>
                    <div class="col-12 col-md-9">
                      <select name="gstin_category" id="gstin_category" class="form-control" required>
                            <option value="" selected>Select GSTIN Category...</option>
                                <?php
                                    $sql ="SELECT * FROM `gstin_category`";
                                    if($result=$connection->query($sql)){
                                        $count = 1;
                                        while ($row=$result->fetch_assoc()) {
                                          if ($user ['GSTIN_category_id'] == $row[GSTIN_category_id]) {
                                            print"<option value='$row[GSTIN_category_id]' selected>$row[name]</option>";
                                          }else{
                                            print"<option value='$row[GSTIN_category_id]'>$row[name]</option>";
                                          }
                                        }
                                    }
                                ?>                                
                        </select>
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
                        ">
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3"><label for="membership" class=" form-control-label">Membership </label></div>
                    <div class="col-12 col-md-9">
                        <select name="membership" id="membership" class="form-control">
                            <option value="" selected>Select Membership...</option>
                                <?php
                                    $sql ="SELECT * FROM `membership`";
                                    if($result=$connection->query($sql)){
                                        while ($row=$result->fetch_assoc()) {
                                          if ($user['membership_id'] == $row[membership_id]) {
                                            print"<option value='$row[membership_id]' selected>$row[organization_name]</option>";
                                          }else{
                                            print"<option value='$row[membership_id]'>$row[organization_name]</option>";
                                          }
                                        }
                                    }
                                ?>                                
                        </select>
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
                        ">
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
                        ">
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" name="retailor_profile_update" value="retailor_profile_update" class="btn btn-primary btn-sm">
                        <i class="fa fa-dot-circle-o"></i> Save
                    </button>
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
        </form>
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
<!-- <script>
    // AJAX call for autocomplete 
$(document).ready(function(){
    $("#state").change(function(){
        // alert($(this).val());
        $.ajax({
        type: "POST",
        url: "../admin/ajaxphp/city_fetch.php",
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

</script> -->