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
                    <li class="active">Dashboard/My Bank Details</li>
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
            <strong>Add</strong> New Bank Details
        </div>
        <?php
            if(!empty($_GET['msg'])){
                $val = $_GET['msg'];
                // echo $val;
                if ($val == 1) {
                    print "<div class='alert alert-danger' role='alert'>Something Went Wrong Please Try Again</div>";
                }
                if ($val == 2) {
                    print "<div class='alert alert-success' role='alert'>Bank Inserted Successfully</div>";
                }
                if ($val == 3) {
                    print "<div class='alert alert-danger' role='alert'>Something Went Wrong Please Try Again</div>";
                }  
                if ($val == 4) {
                    print "<div class='alert alert-success' role='alert'>Bank Details Updated Successfully</div>";
                }
                if ($val == 5) {
                    print "<div class='alert alert-danger' role='alert'>Something Went Wrong Please Try Again</div>";
                }
                if ($val == 6) {
                    print "<div class='alert alert-danger' role='alert'>Bank Details Deleted Successfully</div>";
                }                     
            }
        ?>   
        <form action="serverScripts/add_retailer_bank.php" method="post" class="form-horizontal">
	        <div class="card-body card-block">
	                <div class="row form-group">
	                    <div class="col col-md-4"><label for="bank_name" class=" form-control-label">Name of bank</label></div>
	                    <div class="col-12 col-md-8"><input type="text"  name="bank_name" placeholder="Enter Bank Name..." class="form-control"><span class="help-block">Please Enter Bank Name</span></div>
	                </div>
                    <div class="row form-group">
                        <div class="col col-md-4"><label for="branch_address" class=" form-control-label">Branch Address</label></div>
                        <div class="col-12 col-md-8"><textarea name="branch_address"  rows="5" placeholder="Enter Branch Address" class="form-control"></textarea><span class="help-block">Please Enter Branch Address</span></div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-4"><label for="ifsc" class=" form-control-label">IFSC Code</label></div>
                        <div class="col-12 col-md-8"><input type="text"  name="ifsc" placeholder="Enter IFSC Code..." class="form-control"><span class="help-block">Please Enter IFSC Code</span></div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-4"><label for="micr" class=" form-control-label">MICR Code</label></div>
                        <div class="col-12 col-md-8"><input type="text"  name="micr" placeholder="Enter MICR Code..." class="form-control"><span class="help-block">Please Enter MICR Code</span></div>
                    </div>
	           
	        </div>
	        <div class="card-footer">
	            <button type="submit" name="add_retailer_bank" value="add_retailer_bank" class="btn btn-primary btn-sm" onclick="this.form.submit()">
	                <i class="fa fa-dot-circle-o"></i> Submit
	            </button>
	           <!--  <button type="reset" class="btn btn-danger btn-sm">
	                <i class="fa fa-ban"></i> Reset
	            </button> -->
	        </div>
    	</form>
    </div>
</div>
<div class="col-lg-3"></div>
<!--///////////////////// Region Add form Section /////////////////////////-->

<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
			<div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Bank Details</strong>
                    </div>
                    <?php
                        $sql_user_bank_detail = "SELECT * FROM `user_bank_details` WHERE `user_id` = '$_SESSION[user_id]'";
                        if ($result_user_bank_detail= $connection->query($sql_user_bank_detail)) {
                     ?>
                    <div class="card-body">
                        <table id="region_table" class="table table-striped table-bordered">
	                        <thead>
	                            <tr>
	                                <th >Sl</th>                          
                                    <th>Details</th>                                    
	                            </tr>
	                        </thead>
                            <?php 
                            $count = 1;
                            while($bank_data = $result_user_bank_detail->fetch_assoc())
                            {
                            ?>
                            <tbody>
                                <tr>
                                    <td rowspan='4'><?php echo $count++;?></td>
                                    <td>
                                        <form action="" method="post" class="form-horizontal">
                                            <div class="card">  
                                                 <div class="card-body card-block">
                                                    <div class="row form-group">
                                                       <div class="col col-md-3"><label for="bank_name" class="form-control-label">Bank Name</label></div>
                                                        <div class="col-12 col-md-9">
                                                            <input type="text"  name="bank_name" value="<?php echo $bank_data['name_of_bank'];?>" class="form-control" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="row form-group">
                                                       <div class="col col-md-3"><label for="branch_address" class="form-control-label">Branch Address</label></div>
                                                        <div class="col-12 col-md-9"><textarea name="branch_address"  rows="5" placeholder="Enter Description" class="form-control" disabled>
                                                        <?php echo $bank_data['branch_address'];?>
                                                        </textarea>
                                                        </div>
                                                    </div>
                                                    <div class="row form-group">
                                                       <div class="col col-md-3"><label for="Ifsc_code" class="form-control-label">IFSC Code</label></div>
                                                        <div class="col-12 col-md-9">
                                                            <input type="text"  name="Ifsc_code" value="<?php echo $bank_data['ifsc'];?>" class="form-control" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="row form-group">
                                                       <div class="col col-md-3"><label for="micr_code" class="form-control-label">MICR Code</label></div>
                                                        <div class="col-12 col-md-9">
                                                            <input type="text"  name="micr_code" value="<?php echo $bank_data['micr'];?>" class="form-control" disabled>
                                                        </div>
                                                    </div>
                                                 </div>
                                            </div>
                                        </form>
                                    </td>
                                </tr>
                                <tr>
                                    
                                    <td>
                                        <a href="retailer_bank_edit_form.php?id=<?php echo $bank_data['user_bank_id'];?>">
                                        <button type="submit" name="add_retailer_bank"  class="btn btn-primary btn-sm">
                                            <i class="fa fa-dot-circle-o"></i> Edit
                                        </button>
                                        </a>
                                        <a  href="serverScripts/retailer_bank_delete.php?id=<?php echo $bank_data['user_bank_id'];?>">
                                        <button type="submit" name="add_retailer_bank"  class="btn btn-danger btn-sm" >
                                            <i class="fa fa-dot-circle-o"></i> Delete
                                        </button>
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                            <?php
                            }
                            ?>
                        </table>
                    </div>
                    <?php
                     }else{
                    ?>
                        <div class="card-body">

                        </div>
                    <?php
                     }
                    ?>
                </div>
            </div>
		</div>
    </div><!-- .animated -->
</div><!-- .content -->



<?php
    require_once('../partials/footer.php');
?>