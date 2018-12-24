<?php 
include "include/header.php" ;
include_once "../backend/admin/databaseConnection/connection.php"; 

$sql_user = "SELECT * FROM `users` WHERE `user_id`='$_SESSION[user_id]' AND `email_id` ='$_SESSION[email]'";
if ($result_user = $connection->query($sql_user)) {
    if ($user_info = $result_user->fetch_assoc()) { 
?>
        <!-- Breadcrumb Area Start -->
        <div class="breadcrumb-area bg-image-7 ptb-150">
            <div class="container">
                <div class="breadcrumb-content text-center">
					<h3>MY ACCOUNT</h3>
                    <ul>
                        <li><a href="index.html">Home</a></li>
                        <li class="active">My Account</li>
                    </ul>
                </div>
            </div>
        </div>
		<!-- Breadcrumb Area End -->
        <!-- my account start -->
        <div class="checkout-area pb-80 pt-100">
            <div class="container">
                <div class="row">
                    <div class="ml-auto mr-auto col-lg-9">
                        <div class="checkout-wrapper">
                            <div id="faq" class="panel-group">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h5 class="panel-title"><span>1</span> <a data-toggle="collapse" data-parent="#faq" href="#my-account-1">Edit your account information </a></h5>
                                    </div>
                                    <div id="my-account-1" class="panel-collapse collapse show">
                                        <div class="panel-body">
                                            <div class="billing-information-wrapper">
                                                <div class="account-info-wrapper">
                                                    <h4>My Account Information</h4>
                                                    <h5>Your Personal Details</h5>
                                                    <div id="pinfo"></div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6 col-md-6">
                                                        <div class="billing-info">
                                                            <label>First Name</label>
                                                            <input type="text" value="<?php echo $user_info['first_name'] ; ?>" id="first_name">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6">
                                                        <div class="billing-info">
                                                            <label>Last Name</label>
                                                            <input type="text" value="<?php echo $user_info['last_name'] ; ?>" id="last_name">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 col-md-12">
                                                        <div class="billing-info">
                                                            <label>Email Address</label>
                                                            <input type="email" value="<?php echo $user_info['email_id'] ; ?>" id="email">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6">
                                                        <div class="billing-info">
                                                            <label>Mobile No.</label>
                                                            <input type="text" value="<?php echo $user_info['mobile_no'] ; ?>" id="mobile_no">
                                                        </div>
                                                    </div>
                                                    <!-- <div class="col-lg-6 col-md-6">
                                                        <div class="billing-info">
                                                            <label>Fax</label>
                                                            <input type="text" value="">
                                                        </div>
                                                    </div> -->
                                                </div>
                                                <div class="billing-back-btn">
                                                    <div class="billing-back">
                                                        <a href="#"><i class="ion-arrow-up-c"></i> back</a>
                                                    </div>
                                                    <div class="billing-btn">
                                                        <button type="submit" onclick="personalInfo()">Save</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h5 class="panel-title"><span>2</span> <a data-toggle="collapse" data-parent="#faq" href="#my-account-2">Change your password </a></h5>
                                    </div>
                                    <div id="my-account-2" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <div class="billing-information-wrapper">
                                                <div class="account-info-wrapper">
                                                    <h4>Change Password</h4>
                                                    <h5>Your Password</h5>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-12 col-md-12">
                                                        <div class="billing-info">
                                                            <label>Current Password</label>
                                                            <input type="current_password">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 col-md-12">
                                                        <div class="billing-info">
                                                            <label>Password</label>
                                                            <input type="password">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 col-md-12">
                                                        <div class="billing-info">
                                                            <label>Password Confirm</label>
                                                            <input type="password">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="billing-back-btn">
                                                    <div class="billing-back">
                                                        <a href="#"><i class="ion-arrow-up-c"></i> back</a>
                                                    </div>
                                                    <div class="billing-btn">
                                                        <button type="submit">Continue</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h5 class="panel-title"><span>3</span> <a data-toggle="collapse" data-parent="#faq" href="#my-account-3">Modify your address book entries   </a></h5>
                                    </div>
                                    <div id="my-account-3" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <div class="billing-information-wrapper">
                                                <div class="account-info-wrapper">
                                                    <h4>Address Book Entries</h4>
                                                </div>
                                                <div class="entries-wrapper">
                                                    <div class="row">
                                                        <div class="col-lg-6 col-md-6 d-flex align-items-center justify-content-center">
                                                            <div class="entries-info text-center">
                                                                <p>Farhana hayder (shuvo) </p>
                                                                <p>hastech </p>
                                                                <p> Road#1 , Block#c </p>
                                                                <p> Rampura. </p>
                                                                <p>Dhaka </p>
                                                                <p>Bangladesh </p>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-6 d-flex align-items-center justify-content-center">
                                                            <div class="entries-edit-delete text-center">
                                                                <a class="edit" href="#">Edit</a>
                                                                <a href="#">Delete</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="billing-back-btn">
                                                    <div class="billing-back">
                                                        <a href="#"><i class="ion-arrow-up-c"></i> back</a>
                                                    </div>
                                                    <div class="billing-btn">
                                                        <button type="submit">Continue</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h5 class="panel-title"><span>4</span> <a href="wishlist.html">Modify your wish list   </a></h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		<!-- my account end -->

<?php
   }
}
?>
?>
<?php include "include/footer.php" ?>

<script type="text/javascript">
    personalInfo(){
        
        $.ajax({
        type: "POST",
        url: "ajaxphp/personal_info.php",
        data:{
             fname : $("#first_name").val(),
             lname : $("#last_name").val(),
             email : $("#email").val(),
             mobile : $("#mobile_no").val(),
        },
        success: function(data){
            $("#pinfo").html("<p>You Personal Info Updated Successfully</p>");
        }
        });
    }
</script>