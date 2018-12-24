<?php include "include/header.php"; ?>
        <!-- Breadcrumb Area Start -->
        <div class="breadcrumb-area bg-image-9 ptb-150">
            <div class="container">
                <div class="breadcrumb-content text-center">
					<h3>REGISTER</h3>
                    <ul>
                        <li><a href="index.html">Home</a></li>
                        <li class="active">Register</li>
                    </ul>
                </div>
            </div>
        </div>
		<!-- Breadcrumb Area End -->
        <div class="login-register-area ptb-100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 col-md-12 ml-auto mr-auto">
                        <div class="login-register-wrapper">
                            <div class="login-register-tab-list nav">
                                <a class="active" data-toggle="tab" href="#lg1">
                                    <h4> register </h4>
                                </a>
                               
                            </div>
                            <div class="tab-content">
                                <div id="lg2" class="tab-pane active">
                                    <?php
                                    if (isset($_GET['msg'])) {
                                        if ($_GET['msg'] == 1) {
                                            print "<p class='alert alert-success' role='alert'>Your Account Registered Successfully</p>";
                                        }
                                        if ($_GET['msg'] == 2) {
                                            print "<p class='alert alert-danger' role='alert'>OOPS! Something Went Wrong Try Again</p>";
                                        }
                                        if ($_GET['msg'] == 3) {
                                            print "<p class='alert alert-danger' role='alert'>OOPS! Email Allready Exists Please Try Another Email</p>";
                                        }
                                    }
                                    ?>
                                    <div class="login-form-container">
                                        <div class="login-register-form">
                                            <form action="user_registration/user_registration.php" method="post">
                                                <input type="text" name="fname" placeholder="Enter Your First Name" required>
                                                <input type="text" name="mname" placeholder="Enter Your Middle Name">
                                                <input type="text" name="lname" placeholder="Enter Your Last Name" required>
                                                <input name="email" placeholder="Enter Email" type="email" required>
                                                <input type="password" name="password" id="password" placeholder="Password" required>
                                                <input type="password" name="cnf_password" placeholder="Confirm Password" id="cnf_password" required>
                                                <div id="err_msg_show"></div>
                                                <div class="button-box">
                                                    <button type="submit"><span>Register</span></button>
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
<?php include "include/footer.php"; ?>

<script type="text/javascript">
    $(document).ready(function(){
        $("#cnf_password").blur(function(){
             var pass = $("#password").val();
            var cnf_pass = $("#cnf_password").val();
            if (pass != cnf_pass) {
                $("#cnf_password").val('');
                $("#err_msg_show").html("<p class='alert alert-danger' role='alert'>OOPS! Confirm Password Not Mached</p>");
            }else{
                $("#err_msg_show").html('');
            }
        });
       
    });
</script>