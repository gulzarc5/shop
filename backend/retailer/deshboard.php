<?php
require_once('partials/header.php');
include_once "..\admin\databaseConnection\connection.php";
?>

<!--///////////////////////// Main Info Section /////////////////////////////-->
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Retailor Dashboard</h1>
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

<!--///////////////////////// Main Info Section End /////////////////////////////-->

<div class="content mt-3">

    <!--///////////////////////// Deshboard Card Section /////////////////////////////-->
    <div class="col-sm-6 col-lg-3">
        <div class="card text-white bg-flat-color-1">
            <div class="card-body pb-0">
                <h4 class="mb-0">
                    <span class="count">10468</span>
                </h4>
                <p class="text-light">Total Products</p>                   
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-lg-3">
        <div class="card text-white bg-flat-color-2">
            <div class="card-body pb-0">
                <h4 class="mb-0">
                    <span class="count">10468</span>
                </h4>
                <p class="text-light">Total Delivered Products</p>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-lg-3">
        <div class="card text-white bg-flat-color-3">
            <div class="card-body pb-0">
                <h4 class="mb-0">
                    <span class="count">10468</span>
                </h4>
                <p class="text-light">Total Pending Orders</p>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-lg-3">
        <div class="card text-white bg-flat-color-4">
            <div class="card-body pb-0">
                <h4 class="mb-0">
                    <span class="count">10468</span>
                </h4>
                <p class="text-light">Members online</p>
            </div>
        </div>
    </div>
    <!--///////////////////////// Deshboard Card Section End /////////////////////////////-->

    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Last 10 Orders</strong>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Order Id</th>
                            <th scope="col">Product Image</th>
                            <th scope="col">Product Name</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                        </tr>
                        </tr>
                            <td colspan="5"></td>
                            <td> <a href="" class="btn btn-primary btn-sm">show more<i class="fa fa-angle-double-right"></i> </a></td>
                        <tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Last 10 Added Products</strong>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Product Image</th>
                            <th scope="col">Product Name</th>
                            <th scope="col">Product Region</th>
                            <th scope="col">Product Type</th>
                            <th scope="col">Product Brand</th>
                        </tr>
                    </thead>
                    <tbody>              
                        <?php
                            $sql ="SELECT * FROM `products` WHERE `created_by_id` = '$_SESSION[user_id]' ORDER BY `product_id` DESC limit 10";
                            if($result=$connection->query($sql)){
                                $count = 1;
                                 while ($row=$result->fetch_assoc()){
                                    print "<tr>
                                    <th scope='row'>$count</th>
                                    <td><img src='../uploads/product_image/$row[product_main_image]' width='100'></td>
                                    <td>$row[title]</td>
                                    <td>";
                                    if (!empty($row['region_id'])) {
                                         $sql_region_name = "SELECT * FROM `region` WHERE `region_id`='$row[region_id]'"; 
                                         if ($result_region_name = $connection->query($sql_region_name)) {
                                             $region_name = $result_region_name->fetch_assoc();
                                             print "$region_name[name]";
                                         }
                                    }
                                    print "</td>
                                    <td>";
                                    $sql_product_type = "SELECT * FROM `type` WHERE `type_id` ='$row[product_type_id]'";
                                    if ($result_product_type = $connection->query($sql_product_type)) {
                                            if ($product_type = $result_product_type->fetch_assoc()) {
                                                print "$product_type[name]";
                                            }
                                        }
                                    print "</td>
                                    <td>$row[brand_name]</td>
                                    </tr>
                                    ";
                                $count++;
                                 }
                            }
                        ?>
                            <td colspan="5"></td>
                            <td> <a href="retailer_product_show.php" class="btn btn-primary btn-sm">show more<i class="fa fa-angle-double-right"></i> </a></td>
                        <tr>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div> 
    </div>
    <div class="col-xl-3 col-lg-6">

    </div>
    <div class="col-xl-3 col-lg-6">
    </div>

    <div class="col-xl-3 col-lg-6">
                
    </div>

    <div class="col-xl-6">
    </div>


    </div> <!-- .content -->
    </div><!-- /#right-panel -->

<?php
    require_once('partials/footer.php');
?>

 <script src="../../assets/js/dashboard.js"></script>
    <script src="../../assets/js/widgets.js"></script>