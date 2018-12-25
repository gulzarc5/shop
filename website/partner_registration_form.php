<?php include "include/header.php"; 

include_once "../backend/admin/databaseConnection/connection.php";
?>
        <!-- Breadcrumb Area Start -->
        <div class="breadcrumb-area bg-image-11 ptb-150">
            <div class="container">
                <div class="breadcrumb-content text-center">
					<h3>PARTNER REGISTRATION</h3>
                    <ul>
                        <li><a href="index.html">Home</a></li>
                        <li class="active">Partner Registration</li>
                    </ul>
                </div>
            </div>
        </div>
		<!-- Breadcrumb Area End -->
<div class="login-register-area ptb-100">
  <div class="container">
    <div class="row">
      <div class="col-lg-10 col-md-12 ml-auto mr-auto">
        <div class="login-register-wrapper">
          <div class="login-register-tab-list nav">
            <a class="active" data-toggle="tab" href="#lg1">
              <h4> Partner Registration </h4>
            </a>
          </div>
          <!-- PRINTING ERROR MESAGE -->
          <?php
            if(!empty($_GET['msg'])){
              $val = $_GET['msg'];
              if ($val == 1) {
                print "<div class='alert alert-danger' role='alert'>Username or Password worng</div>";
              } 
              if ($val == 2) {
                print "<div class='alert alert-danger' role='alert'>Password Not Matched</div>";
              }                       
            }
          ?>    
          <div class="tab-content">
            <div id="lg1" class="tab-pane active">
              <div class="login-form-container">
                <div class="login-register-form">
                  <form action="partner_registration/partner_registration.php" method="post" class="form-horizontal">
                    <!-- <div class="card"> -->
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
                                print "<div class='alert alert-info' role='alert'>Please Fill the Form Properly</div>";
                            }                       
                        }
                      ?>  
                        <div class="card">
                          <div class="card-header">
                              <strong>Registration </strong> Type
                          </div>
                          <div class="card-body card-block">
                            <div class="row form-group">
                              <div class="col col-md-3">
                                <label for="designation" class=" form-control-label">Registration Type <span class="redstar"> * </span></label>
                              </div>
                              <div class="col-12 col-md-9">
                                <select name="registration_type" class="form-control" required>
                                  <option value="" selected>Please Select Registration Type</option>
                                  <option value="3" >Retailer</option>
                                  <option value="2" >Whole Seller</option>
                                </select>
                              </div>
                            </div>
                          </div>
                        </div> 
                        <div class="card">
                          <!--//////////////// Personal Details ////////////////////-->
                          <div class="card-header">
                              <strong>Personal </strong> Details
                          </div>
                          <div class="card-body card-block">
                            <div class="row form-group">
                              <div class="col col-md-3">
                                <label for="first_name" class=" form-control-label">First Name <span class="redstar"> * </span></label>
                              </div>
                              <div class="col-12 col-md-9">
                                <input type="text"  name="first_name" placeholder="Enter First Name..." class="form-control" required>
                              </div>
                            </div>
                            <div class="row form-group">
                              <div class="col col-md-3">
                                <label for="middle_name" class=" form-control-label">Middle Name</label>
                              </div>
                              <div class="col-12 col-md-9">
                                <input type="text"  name="middle_name" placeholder="Enter Middle Name..." class="form-control">
                              </div>
                            </div>
                            <div class="row form-group">
                              <div class="col col-md-3">
                                <label for="last_name" class=" form-control-label">Last Name <span class="redstar"> * </span></label>
                              </div>
                              <div class="col-12 col-md-9">
                                <input type="text"  name="last_name" placeholder="Enter Last Name..." class="form-control" required>
                              </div>
                            </div>              
                            <div class="row form-group">
                              <div class="col col-md-3">
                                <label for="designation" class=" form-control-label">Designation <span class="redstar"> * </span></label>
                              </div>
                              <div class="col-12 col-md-9">
                                <select name="designation"  class="form-control" required>
                                  <option value="" selected>Select Designation...</option>
                                  <?php
                                    $sql ="SELECT * FROM `designation`";
                                    if($result=$connection->query($sql)){
                                      $count = 1;
                                      while ($row=$result->fetch_assoc()) {
                                      print"<option value='$row[designation_id]'>$row[designation_name]</option>";
                                      }
                                    }
                                  ?>                                
                                </select>
                              </div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3"><label for="state" class=" form-control-label">State <span class="redstar"> * </span></label></div>
                                <div class="col-12 col-md-9">
                                    <select name="state" id="state" class="form-control" required>
                                        <option value="" selected>Select State...</option>
                                            <?php
                                                $sql ="SELECT * FROM `state`";
                                                if($result=$connection->query($sql)){
                                                    $count = 1;
                                                    while ($row=$result->fetch_assoc()) {
                                                        print"<option value='$row[id]'>$row[name]</option>";
                                                    }
                                                }
                                            ?>                                
                                    </select>
                                </div>
                            </div>
                            <div class="row form-group">
                              <div class="col col-md-3">
                                <label for="city" class=" form-control-label">City <span class="redstar"> * </span></label>
                              </div>
                              <div class="col-12 col-md-9">
                                <select name="city" id="city" class="form-control" required>
                                        <option value="" selected>Select City...</option>
                                </select>
                              </div>
                            </div>   

                            <div class="row form-group">
                               <div class="col col-md-3"><label for="locality" class=" form-control-label"> Locality <span class="redstar"> * </span></label></div>
                               <div class="col-12 col-md-9"><input type="text" name="locality" placeholder="Enter Locality..." class="form-control" required></div>
                            </div>

                            <div class="row form-group">
                              <div class="col col-md-3"><label for="mobile_number" class=" form-control-label"> Mobile No. <span class="redstar"> * </span></label></div>
                              <div class="col-12 col-md-9"><input type="text" name="mobile_number" placeholder="Enter Mobile Number.." class="form-control" required></div>
                            </div>

               <div class="row form-group">
                    <div class="col col-md-3"><label for="mobile_number_alternate" class=" form-control-label"> Mobile No.(Alternate )</label></div>
                   <div class="col-12 col-md-9"><input type="text" name="mobile_number_alternate" placeholder="Enter Email.." class="form-control"></div>
               </div>

                            <div class="row form-group">
                               <div class="col col-md-3"><label for="email" class=" form-control-label"> Email <span class="redstar"> * </span></label></div>
                               <div class="col-12 col-md-9"><input type="email" name="email" placeholder="Enter Email.." class="form-control" required></div>
                            </div>

                            <div class="row form-group">
                              <div class="col col-md-3"><label for="password" class=" form-control-label"> Password </label></div>
                              <div class="col-12 col-md-9"><input type="text" name="password" placeholder="Enter Password .." class="form-control"></div>
                            </div>

                            <div class="row form-group">
                              <div class="col col-md-3"><label for="confirm_password" class=" form-control-label"> Confirm Password</label></div>
                              <div class="col-12 col-md-9"><input type="text" name="confirm_password" placeholder="Enter Confirm Password .." class="form-control"></div>
                            </div>

                            <div class="row form-group">
                              <div class="col col-md-3"><label for="email_alternate" class=" form-control-label"> Email(Alternate )</label></div>
                              <div class="col-12 col-md-9"><input type="email" name="email_alternate" placeholder="Enter Email.." class="form-control"></div>
                            </div>            
                          </div>
                        </div>
                        <!--//////////////// Personal Details End ////////////////////-->
                        <div class="card">
                        <!--//////////////// Business Information ////////////////////-->
                        <div class="card-header">
                            <strong>Business </strong> Information
                        </div>
                        <div class="card-body card-block">
                          <div class="row form-group">
                            <div class="col col-md-3"><label for="organization" class=" form-control-label"> Organization Name <span class="redstar"> * </span></label></div>
                            <div class="col-12 col-md-9"><input type="text" name="organization" placeholder="Enter Organization Name..." class="form-control" required></div>
                          </div>
                          <div class="row form-group">
                            <div class="col col-md-3"><label for="trade_licence_number" class=" form-control-label"> Trade Licence Number <span class="redstar"> * </span></label></div>
                            <div class="col-12 col-md-9"><input type="text" name="trade_licence_number" placeholder="Enter Licence Number.." class="form-control" required></div>
                          </div>

                          <div class="row form-group">
                            <div class="col col-md-3"><label for="licence_issuing_authority" class=" form-control-label"> Licence Issuing Authority </label></div>
                            <div class="col-12 col-md-9"><input type="text" name="licence_issuing_authority" placeholder="Enter Licence Issuing Authority.." class="form-control"></div>
                          </div>

                          <div class="row form-group">
                            <div class="col col-md-3"><label for="pan" class=" form-control-label">PAN <span class="redstar"> * </span></label></div>
                            <div class="col-12 col-md-9"><input type="text"  name="pan" placeholder="Enter PAN Number..." class="form-control" required></div>
                          </div>

                          <div class="row form-group">
                            <div class="col col-md-3"><label for="gstin" class=" form-control-label">GSTIN </label></div>
                            <div class="col-12 col-md-9"><input type="text"  name="gstin" placeholder="Enter GSTIN..." class="form-control"></div>
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
                                        print"<option value='$row[GSTIN_category_id]'>$row[name]</option>";
                                      }
                                    }
                                  ?>                                
                              </select>
                            </div>
                          </div>

                          <div class="row form-group">
                            <div class="col col-md-3"><label for="iec" class=" form-control-label">IEC</label></div>
                            <div class="col-12 col-md-9"><input type="text"  name="iec" placeholder="Enter Import Export Code ..." class="form-control"></div>
                          </div>

                          <div class="row form-group">
                            <div class="col col-md-3"><label for="membership" class=" form-control-label">Membership </label></div>
                            <div class="col-12 col-md-9">
                              <select name="membership" id="membership" class="form-control">
                                <option value="" selected>Select Membership...</option>
                                  <?php
                                    $sql ="SELECT * FROM `membership`";
                                    if($result=$connection->query($sql)){
                                      $count = 1;
                                      while ($row=$result->fetch_assoc()) {
                                      print"<option value='$row[membership_id]'>$row[organization_name]</option>";
                                      }
                                    }
                                  ?>                                
                              </select>
                            </div>
                          </div>

                          <div class="row form-group">
                            <div class="col col-md-3"><label for="membership_number" class=" form-control-label">Membership Number</label></div>
                            <div class="col-12 col-md-9"><input type="text"  name="membership_number" placeholder="Enter Membership Number ..." class="form-control"></div>
                          </div>

                          <div class="row form-group">
                            <div class="col col-md-3"><label for="membership_location" class=" form-control-label">Membership Location</label></div>
                            <div class="col-12 col-md-9"><input type="text"  name="membership_location" placeholder="Enter Membership Location ..." class="form-control"></div>
                          </div>
                        </div>
                    </div>
                    <div class="card">
                      <div class="card-header">
                          <strong>Bank </strong> Details
                      </div>
                      <div class="card-body card-block">
                        <div class="row form-group">
                          <div class="col col-md-3"><label for="bank_name" class=" form-control-label">Name of Bank</label></div>
                          <div class="col-12 col-md-9">
                            <input type="text"  name="bank_name" placeholder="Enter Bank Name..." class="form-control">
                            </div>
                        </div>

                        <div class="row form-group">
                          <div class="col col-md-3"><label for="branch_address" class=" form-control-label">Branch Address</label></div>
                          <div class="col-12 col-md-9"><textarea name="branch_address"  rows="5" placeholder="Enter Branch Address" class="form-control"></textarea></div>
                        </div>

                        <div class="row form-group">
                          <div class="col col-md-3"><label for="ifsc_code" class=" form-control-label">IFSC Code</label></div>
                          <div class="col-12 col-md-9">
                            <input type="text"  name="ifsc_code" placeholder="Enter IFSC Code..." class="form-control">
                          </div>
                        </div>

                        <div class="row form-group">
                          <div class="col col-md-3"><label for="micr_code" class=" form-control-label">MICR Code</label></div>
                          <div class="col-12 col-md-9">
                            <input type="text"  name="micr_code" placeholder="Enter MICR Code..." class="form-control">
                          </div>
                        </div>
                      </div>
                      <div class="card-footer">
                        <button type="submit" name="add_partner" value="add_partner" class="btn btn-primary btn-sm">
                          <i class="fa fa-dot-circle-o"></i> Submit
                        </button>

                        <button class="btn btn-primary btn-sm">
                          <i class="fa fa-arrow-left" aria-hidden="true"></i>
                          <a href="login.php">Back
                        </button>
                         <!--  <button type="reset" class="btn btn-danger btn-sm">
                              <i class="fa fa-ban"></i> Reset
                          </button> -->
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
                               
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
        <!-- Footer style Start -->
<?php include "include/footer.php" ?>
<!-- <script src="../../assets/datatable/jquery-3.3.1.js"></script> -->
<script>
    // AJAX call for autocomplete 
$(document).ready(function(){
    $("#state").change(function(){
        // alert($(this).val());
        $.ajax({
        type: "POST",
        url: "ajax/city_fetch.php",
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