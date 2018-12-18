<?php
require_once('../partials/header.php');
include_once "databaseConnection/connection.php";
?>
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Retailor Registration</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li class="active">Dashboard</li>
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
    <form action="serverScripts/add_city.php" method="post" class="form-horizontal">
        <div class="card">
            <div class="card-header">
                <strong>Business </strong> Information
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
                   <div class="col col-md-3"><label for="organization" class=" form-control-label"> Organization Name</label></div>
                   <div class="col-12 col-md-9"><input type="text" name="organization" placeholder="Enter City..." class="form-control"></div>
               </div>

               <div class="row form-group">
                   <div class="col col-md-3"><label for="contact_person" class=" form-control-label"> Contact Person</label></div>
                   <div class="col-12 col-md-9"><input type="text" name="contact_person" placeholder="Enter City..." class="form-control"></div>
               </div> 

	           <div class="row form-group">
                    <div class="col col-md-3"><label for="hf-email" class=" form-control-label">Designation</label></div>
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
                    <div class="col col-md-3"><label for="hf-email" class=" form-control-label">State</label></div>
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
                    <div class="col col-md-3"><label for="hf-email" class=" form-control-label">City</label></div>
                    <div class="col-12 col-md-9">
                        <select name="city" id="city" class="form-control" required>
                            <option value="" selected>Select City...</option>
                        </select>
                    </div>
                </div>   

                <div class="row form-group">
                   <div class="col col-md-3"><label for="locality" class=" form-control-label"> Locality</label></div>
                   <div class="col-12 col-md-9"><input type="text" name="locality" placeholder="Enter Locality..." class="form-control"></div>
               </div>

               <div class="row form-group">
                   <div class="col col-md-3"><label for="mobile_number" class=" form-control-label"> Mobile No.</label></div>
                   <div class="col-12 col-md-9"><input type="text" name="mobile_number" placeholder="Enter Mobile Number.." class="form-control"></div>
               </div>

               <div class="row form-group">
                   <div class="col col-md-3"><label for="mobile_number_alternate" class=" form-control-label"> Mobile No.(Alternate )</label></div>
                   <div class="col-12 col-md-9"><input type="text" name="mobile_number_alternate" placeholder="Enter Mobile Number.." class="form-control"></div>
               </div>

                <div class="row form-group">
                   <div class="col col-md-3"><label for="email" class=" form-control-label"> Email</label></div>
                   <div class="col-12 col-md-9"><input type="email" name="email" placeholder="Enter Email.." class="form-control"></div>
               </div>

               <div class="row form-group">
                   <div class="col col-md-3"><label for="email_alternate" class=" form-control-label"> Email(Alternate )</label></div>
                   <div class="col-12 col-md-9"><input type="email" name="email_alternate" placeholder="Enter Email.." class="form-control"></div>
               </div>

               <div class="row form-group">
                   <div class="col col-md-3"><label for="trade_licence_number" class=" form-control-label"> Trade Licence Number</label></div>
                   <div class="col-12 col-md-9"><input type="text" name="trade_licence_number" placeholder="Enter Licence Number.." class="form-control"></div>
               </div>

               <div class="row form-group">
                   <div class="col col-md-3"><label for="licence_issuing_authority" class=" form-control-label"> Licence Issuing Authority</label></div>
                   <div class="col-12 col-md-9"><input type="text" name="licence_issuing_authority" placeholder="Enter Licence Issuing Authority.." class="form-control"></div>
               </div>

               <div class="row form-group">
                   <div class="col col-md-3"><label for="pan" class=" form-control-label">PAN</label></div>
                   <div class="col-12 col-md-9"><input type="text"  name="pan" placeholder="Enter PAN Number..." class="form-control"></div>
               </div>

	           <div class="row form-group">
	               <div class="col col-md-3"><label for="gstin" class=" form-control-label">GSTIN</label></div>
	               <div class="col-12 col-md-9"><input type="text"  name="gstin" placeholder="Enter GSTIN..." class="form-control"></div>
	           </div>

               <div class="row form-group">
                    <div class="col col-md-3"><label for="hf-email" class=" form-control-label">GSTIN Category</label></div>
                    <div class="col-12 col-md-9">
                        <select name="state" id="state" class="form-control" required>
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
                   <div class="col col-md-3"><label for="gstin" class=" form-control-label">IEC</label></div>
                   <div class="col-12 col-md-9"><input type="text"  name="gstin" placeholder="Enter Import Export Code ..." class="form-control"></div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3"><label for="hf-email" class=" form-control-label">Membership</label></div>
                    <div class="col-12 col-md-9">
                        <select name="state" id="state" class="form-control" required>
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
                <button type="submit" name="add_city" value="add_city" class="btn btn-primary btn-sm">
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
});

</script>