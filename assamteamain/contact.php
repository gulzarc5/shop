<?php
    include "include/header.php"; 
?>

	<!-- Start the Homes lider here -->
	<section class="section-padding bg-overlay page-banner con-banner">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="section-header">
						<h2>Contact</h2>
					</div>
					<!-- Breadcrumb -->
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="index.html">Home</a></li>
						<li class="breadcrumb-item active">Contact</li>
					</ol>
					<!-- Breadcrumb -->
				</div>
			</div>
		</div>
	</section>

	<!-- Start Contact Here -->
	<section class="section-padding ">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<div class="section-header1 text-center">
						<h2>Get in touch <span><br>contact</span></h2>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<ul class="contact-info">
						<li>
							<i class="fa fa-map-marker"></i>
							Guwahati<br>
							Assam(India)
						</li>
						<li>
							<i class="fa fa-phone"></i>
							+8800 123 45 67 <br>
							+1 800 123 45 66
						</li>
						<li>
							<i class="fa fa-envelope"></i>
							<a href="mailto:example@gmail.com">example@gmail.com</a> <br>
							<a href="mailto:example@gmail.com">example@gmail.com</a>
						</li>
						<li>
							<i class="fa fa-globe"></i>
							<a href="#">www.yourwebsite.com</a>
						</li>
					</ul>
				</div>
				<div class="col-sm-6">
					<div class="contact-form">
						<form action="http://sobuj4u.com/themexone/teashop/teashop/process.php" id="contact_form" method="post">
							<div class="form_group" id="name_field">
								<div class="input_field">
									<input type="text" name="u_name" id="u_name" required="required" placeholder="Name..">
								</div>
							</div>
							<div class="form_group" id="email_field">
								<div class="input_field">
									<input type="email" name="u_email" id="u_email" required="required" placeholder="Email..">
								</div>
							</div>
							<div class="form_group" id="massage_field">
								<div class="input_field">
									<input type="text" name="u_massage" id="u_massage" required="required" placeholder="Massage..">
								</div>
							</div>
							<div class="form_group">
								<div class="input_field">
									<button class="teashop-btn" type="submit">Send Massage</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Ends Contact Here -->

	<!-- Start Google Map Here -->
	<div class="g-map cd-google-map">
		<div id="google-container"></div>
		<div id="cd-zoom-in"></div>
		<div id="cd-zoom-out"></div>
	</div>
	<!-- Ends Google Map Here -->

	<!-- Start The ScrollToTop Here -->
	<div class="ScrollToTop">
		<a href="#"><i class="fa fa-angle-up"></i></a>
	</div>
	<!-- ScrollToTop Ends Here -->

	<?php include "include/footer.php" ?>