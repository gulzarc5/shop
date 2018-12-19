<?php
require_once('../partials/header.php');
include_once "databaseConnection/connection.php";
?>
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Dashboard</h1>
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
<div class="col-lg-3"></div>
<div class="col-lg-6">
    <div class="card">
        <div class="card-header">
            <strong>Add</strong> Category
        </div>
        <?php
            if(!empty($_GET['msg'])){
                $val = $_GET['msg'];
                // echo $val;
                if ($val == 1) {
                    print "<div class='alert alert-success' role='alert'>Category Added Successfully</div>";
                }
                if ($val == 2) {
                    print "<div class='alert alert-danger' role='alert'>Something Went Wrong Please Try Again</div>";
                }
                if ($val == 3) {
                    print "<div class='alert alert-info' role='alert'>Please Enter Category Name Properly</div>";
                }                       
            }
        ?>   
        <form action="serverScripts/add_category.php" method="post" class="form-horizontal">
	        <div class="card-body card-block">
	            
	                <div class="row form-group">
	                    <div class="col col-md-3"><label for="hf-email" class=" form-control-label">Category</label></div>
	                    <div class="col-12 col-md-9"><input type="text" id="hf-email" name="category" placeholder="Enter Category..." class="form-control"><span class="help-block">Please Enter Category Name</span></div>
	                </div>
	           
	        </div>
	        <div class="card-footer">
	            <button type="submit" name="add_category" value="add_category" class="btn btn-primary btn-sm">
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
                        <strong class="card-title">Category</strong>
                    </div>
                    <div class="card-body table-responsive">
                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
	                        <thead>
	                            <tr>
	                                <th>Sl</th>
	                                <th>Category Name</th>
                                    <th>Category Code</th>
                                    <th>Status</th>
	                                <th>Date Added</th>
	                            </tr>
	                        </thead>
                            <tbody>
                            	<?php
                            		$sql ="SELECT * FROM `category`";
                            		if($result=$connection->query($sql)){
                            			$count = 1;
                            			while ($row=$result->fetch_assoc()) {
                            				print" <tr>
                            					<td>";
                            				print	$count++;
                            				print	"</td>
                            					<td>$row[name]</td>
                                                <td>$row[category_code]</td>";
                                        if (!empty($row['status']) && $row['status'] == 1) {
                                            print "<td> <button type='button' class='btn btn-secondary' disabled>Approved</button></td>";
                                        }else{
                                            print "<td><button type='button' class='btn btn-success'>Not Approved</button></td>";
                                        }
                                                
			                                print    "<td>$row[created_at]</td>
			                                    </tr>";
                            			}
                            		}
                            	?>
                                <!-- <tr>
                                    <td>Tiger Nixon</td>
                                    <td>System Architect</td>
                                    <td>Edinburgh</td>
                                    <td>$320,800</td>
                                    <td>$320,800</td>
                                </tr> -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
		</div>
    </div><!-- .animated -->
</div><!-- .content -->



<?php
    require_once('../partials/footer.php');
?>
