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
                                    <input type="hidden" id="user_id" value="<?php echo $user_info['user_id'];?>">
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
                                                            <input type="email" value="<?php echo $user_info['email_id'] ;?>" id="email" disabled>
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
                                                        <button type="submit" id="personal_info_save">Save</button>
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
                                                            <input type="current_password" id="current_password">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 col-md-12">
                                                        <div class="billing-info">
                                                            <label>Password</label>
                                                            <input type="password" id="password">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 col-md-12">
                                                        <div class="billing-info">
                                                            <label>Password Confirm</label>
                                                            <input type="password" id="cnf_password">
                                                        </div>
                                                        <div id="err_msg_show"></div>
                                                    </div>
                                                </div>
                                                <div class="billing-back-btn">
                                                    <div class="billing-back">
                                                        <a href="#"><i class="ion-arrow-up-c"></i> back</a>
                                                    </div>
                                                    <div class="billing-btn">
                                                        <button type="submit" id="change_password_save">Save</button>
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

<?php include "include/footer.php" ?>

<!-- Script for save personal info -->
<script type="text/javascript">
    $(document).ready(function(){
        $("#personal_info_save").click(function(){
             $.ajax({
            type: "POST",
            url: "ajax/personal_info.php",
            data:{
                u_id : $("#user_id").val(),
                fname : $("#first_name").val(),
                lname : $("#last_name").val(),
                email : $("#email").val(),
                mobile : $("#mobile_no").val(),
            },
            success: function(data){
                console.log(data);
                $("#pinfo").html("<p class='alert alert-success'>You Personal Info Updated Successfully</p>");
            },
            });
        })
    })      

</script>

<!-- script for change password -->

<script type="text/javascript">
     $(document).ready(function(){
        $("#change_password_save").click(function(){
           var u_id = $("#user_id").val();
           var current_password = $("#current_password").val();
           var password = $("#password").val();
           var cnf_password = $("#cnf_password").val();
           if (u_id == null || u_id == '') {
                 $("#pinfo").html("<p class='alert alert-danger'>Please reload page and fill the form properly </p>");
           }else if(current_password == null || current_password == ''){
                alert(current_password);
                $( "#current_password" ).focus();
                $("#pinfo").html("<p class='alert alert-danger'>Please reload page and fill the form properly </p>");
           }else if(password==null || password == ''){
                $( "#password" ).focus();
                $("#pinfo").html("<p class='alert alert-danger'>Please reload page and fill the form properly </p>");
           }else if(cnf_password==null || cnf_password==''){
                 $( "#cnf_password" ).focus();
                $("#pinfo").html("<p class='alert alert-danger'>Please reload page and fill the form properly </p>");
           }
          else{
                if (cnf_password != password) {
                $("#cnf_password").val('');
                $("#err_msg_show").html("<p class='alert alert-danger' role='alert'>OOPS! Confirm Password Not Mached</p>");
                }else{
                    $.ajax({
                    type: "POST",
                    url: "ajax/change_password.php",
                    data:{
                        u_id : u_id,
                        current_password : current_password,
                        password : password,
                        cnf_password : cnf_password,
                    },
                    success: function(data){
                        console.log(data);
                        if (data == 1) {
                            $("#pinfo").html("<p class='alert alert-success'>You Personal Info Updated Successfully</p>");
                        }else{
                             $("#pinfo").html("<p class='alert alert-danger'>Something Went Wrong Please try again</p>");
                        }
                        
                    },
                    });
                }
           }
           
        });
    })
</script>