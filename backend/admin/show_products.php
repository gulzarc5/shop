<?php
require_once('../partials/header.php');
include_once "databaseConnection/connection.php";
?>
<script src="../../assets/datatable/jquery.dataTables.min.css"></script>
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>My Products</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li class="active">Dashboard/My Products</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<!--///////////////////// Region Add form Section /////////////////////////-->
<div class="content mt-3">
    <?php
        if (isset($_GET['msg'])) {
            $val = $_GET['msg'];
            if ($val == 1) {
               print "<div class='alert alert-success' role='alert'>Product Deleted Successfully</div>";
            }
             if ($val == 2) {
               print "<div class='alert alert-danger' role='alert'>Something Went Wrong Please Try Again</div>";
            }
            if ($val == 3) {
                print "<div class='alert alert-success' role='alert'>Product Updated Successfully</div>";
            }
        }
    ?>
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Region</strong>
                    </div>
                    <div class="card-body table-responsive">
                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered" style=" overflow: scroll;">
                            <thead>
                                <tr>
                                    <th>Sl</th>
                                    <th>Product Code</th>
                                    <th>Product Name</th>
                                    <th>Product Brand</th>
                                    <!-- <th>Product Type</th>
                                    <th>Product Category</th>
                                    <th>Grade Code</th>
                                    <th>Region</th> -->
                                    <th>Tea Type</th>
                                    <th>Available Sizes / Rate / Min Order Unit</th>
                                    <th>Added By</th>
                                    <th>Added Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $count = 1;
                                    $sql ="SELECT * FROM `products` limit 200";
                                    if($result=$connection->query($sql)){
                                        while ($row=$result->fetch_assoc()) {
                                            print" <tr>
                                                <td>";
                                            print   $count++;
                                            print   "</td>
                                            </td><td>$row[product_code]</td>
                                            <td>$row[title]</td>
                                            <td>$row[brand_name]</td>"; 
                                            if ($row['brand_name'] == 1) {
                                                 print "<td>Packet</td>";
                                             }else{
                                                print "<td>$row[brand_name]</td>";
                                             }
                                            $count++;
                                            print "";
                                    if (!empty($row['region_id'])) {
                                         $sql_region_name = "SELECT * FROM `region` WHERE `region_id`='$row[region_id]'"; 
                                         if ($result_region_name = $connection->query($sql_region_name)) {
                                             $region_name = $result_region_name->fetch_assoc();
                                             print "<td>$region_name[name]</td>";
                                         }else{
                                            print "<td></td>";
                                         }
                                    }else{
                                        print "<td></td>";
                                    }

                                    $sql_product_type = "SELECT * FROM `type` WHERE `type_id` ='$row[product_type_id]'";
                                    if ($result_product_type = $connection->query($sql_product_type)) {
                                            if ($product_type = $result_product_type->fetch_assoc()) {
                                                print "<td>$product_type[name]</td>";
                                            }else{
                                                print "<td></td>";
                                            }
                                        }else{
                                            print "<td></td>";
                                        }
                                    $sql_grade = "SELECT * FROM `grade_code` WHERE `grade_code_id`='$row[grade_code_id]'";
                                    if ($result_grade = $connection->query($sql_grade)) {
                                        if($grade_name = $result_grade->fetch_assoc()){
                                             print "<td>$grade_name[grade_code]</td>";
                                         }else{
                                            print "<td></td>";
                                         }
                                    }else{
                                        print "<td></td>";
                                    }
                                       
                                        print "";
                                        print "<td>
                                            <table>
                                            <tr>
                                                <td><a href='retailor_product_edit_form.php?pd_id=$row[product_id]' class='btn btn-info'>Edit</a></td>
                                                <td><a href='serverScripts/retailer_product_delete.php?pd_id=$row[product_id]' class='btn btn-danger'>Delete</a></td>
                                            <tr>
                                            </table>
                                        </td>";
                                        print "</tr>";
                                        }
                                    }
                                ?>
                               
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- .animated -->
</div><!-- .content -->
<!--///////////////////// Region Add form Section /////////////////////////-->

<?php
    require_once('../partials/footer.php');
?>

 <script src="../../assets/datatable/jquery-3.3.1.js"></script>
 <script src="../../assets/datatable/jquery.dataTables.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
    $('#region_table').DataTable();
} );
</script>