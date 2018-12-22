<?php
require_once('partials/header.php');
include_once "../admin/databaseConnection/connection.php";
?>
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>My Bank Details</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li class="active">Dashboard/Edit Bank Details</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<!--///////////////////// Region Add form Section /////////////////////////-->
<div class="col-lg-3"></div>
<div class="col-lg-6">
    <div class="card">
        <div class="card-header">
            <strong>Edit</strong> Bank Details
        </div>  
        <?php
            if (!empty($_GET['id'])) {
                $sql_user_bank_detail = "SELECT * FROM `user_bank_details` WHERE `user_bank_id` = '$_GET[id]'";
                if ($result_user_bank_detail= $connection->query($sql_user_bank_detail)){
                    $user_bank = $result_user_bank_detail->fetch_assoc();
                    if ($user_bank) {
                        # code...
        ?> 
        <form action="serverScripts/retailer_bank_update.php" method="post" class="form-horizontal">
            <input type="hidden"  name="bank_id" value="<?php echo $user_bank['user_bank_id']; ?>">
	        <div class="card-body card-block">
	                <div class="row form-group">
	                    <div class="col col-md-4"><label for="bank_name" class=" form-control-label">Name of bank</label></div>
	                    <div class="col-12 col-md-8"><input type="text"  name="bank_name" placeholder="Enter Bank Name..." class="form-control" value="<?php echo $user_bank['name_of_bank']; ?>"><span class="help-block">Please Enter Bank Name</span></div>
	                </div>
                    <div class="row form-group">
                        <div class="col col-md-4"><label for="branch_address" class=" form-control-label">Branch Address</label></div>
                        <div class="col-12 col-md-8"><textarea name="branch_address"  rows="5" placeholder="Enter Branch Address" class="form-control"><?php echo $user_bank['branch_address']; ?></textarea><span class="help-block">Please Enter Branch Address</span></div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-4"><label for="ifsc" class=" form-control-label">IFSC Code</label></div>
                        <div class="col-12 col-md-8"><input type="text"  name="ifsc" placeholder="Enter IFSC Code..." class="form-control" value="<?php echo $user_bank['ifsc']; ?>"><span class="help-block">Please Enter IFSC Code</span></div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-4"><label for="micr" class=" form-control-label">MICR Code</label></div>
                        <div class="col-12 col-md-8"><input type="text"  name="micr" placeholder="Enter MICR Code..." class="form-control" value="<?php echo $user_bank['micr']; ?>"><span class="help-block">Please Enter MICR Code</span></div>
                    </div>
	           
	        </div>
	        <div class="card-footer">
	            <button type="submit" name="update_retailer_bank" value="update_retailer_bank" class="btn btn-primary btn-sm">
	                <i class="fa fa-dot-circle-o"></i> Submit
	            </button>
	           <!--  <button type="reset" class="btn btn-danger btn-sm">
	                <i class="fa fa-ban"></i> Reset
	            </button> -->
	        </div>
    	</form>
        <?php
                   }
                }
            }
        ?>
    </div>
</div>
<div class="col-lg-3"></div>
<!--///////////////////// Region Add form Section /////////////////////////-->

<?php
    require_once('../partials/footer.php');
?>