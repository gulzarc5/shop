<?php include "include/header.php"; ?>
        <!-- Breadcrumb Area Start -->
        <div class="breadcrumb-area bg-image-8 ptb-150">
            <div class="container">
                <div class="breadcrumb-content text-center">
					<h3>LOGIN</h3>
                    <ul>
                        <li><a href="index.html">Home</a></li>
                        <li class="active">Login</li>
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
                                    <h4> login </h4>
                                </a>
                            </div>
                            <?php
                                if(!empty($_GET['msg'])){
                                    $val = $_GET['msg'];
                                    // echo $val;
                                    if ($val == 1) {
                                        print "<div class='alert alert-danger' role='alert'>Username or Password worng</div>";
                                    } 
                                    if ($val == 2) {
                                        print "<div class='alert alert-danger' role='alert'>Password Not Matched</div>";
                                    }
                                    if ($val == 3) {
                                        print "<div class='alert alert-success' role='alert'>Login Success</div>";
                                    }                       
                                }
                              ?>    
                            <div class="tab-content">
                                <div id="lg1" class="tab-pane active">
                                    <div class="login-form-container">
                                        <div class="login-register-form">
                                            <form action="user_login_system/user_login_check.php" method="post">
                                                <input type="email" name="email" placeholder="Enter Email" required>
                                                <input type="password" name="password" placeholder="Enter Password" required>
                                                <input type="hidden" name="user_type" value="4">
                                                <div class="button-box">
                                                    <div class="login-toggle-btn">
                                                        <input type="checkbox">
                                                        <label>Remember me</label>
                                                        <a href="#">Forgot Password?</a>
                                                    </div>
                                                    <button type="submit" name="Simple_user_login" value="Simple_user_login"><span>Login</span></button>
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
