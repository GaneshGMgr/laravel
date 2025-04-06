<?php include 'header.php'; ?>
<!-- Page Title -->
    <section class="page-title" style="background-image: url(images/background/3.jpg)">
    	<div class="auto-container">
			<h1>Contact Us</h1>
			<ul class="page-breadcrumb">
				<li><a href="index-2.html">home</a></li>
				<li>Contact Us</li>
			</ul>
        </div>
    </section>
    <!-- End Page Title -->
	
	<!-- Contact Page Section -->
    <div class="contact-page-section" style="background-image: url(<?php echo base_url('assets/frontend/'); ?>images/background/pattern-9.png)">
    	<div class="auto-container">
        	
    		<div class="row clearfix">
				

				<?php foreach($branches as $branches){ ?>

				<!-- Contact Info Block -->
				<div class="contact-info-block col-lg-4 col-md-6 col-sm-12">
					<div class="inner-box">
						<div class="color-layer"></div>
						<div class="icon-box">
							<span class="icon flaticon-map"></span>
						</div>
						<h6><?php echo $branches->branches_name;?></h6>
						<ul>
							<li><span>Landline : </span><?php echo $branches->landline;?></li>
							<li><span>Mobile : </span><?php echo $branches->mobile;?></a></li>
							<li><span>Email : </span><?php echo $branches->email;?></a></li>
							<li><span>Google Map : </span><a href="<?php echo $branches->google_map; ?>">Direction</a></li>

						</ul>
					</div>
				</div>
			   <?php } ?>

				

				
			</div>


			
			
			<!-- Lower Section -->
			<div class="lower-section">
				<div class="row clearfix">
					
					<!-- Content Column -->
					<div class="content-column col-lg-6 col-md-12 col-sm-12">
						<div class="inner-column">
							<!-- Sec Title -->
							<div class="sec-title">
								<div class="title">Get In Touch</div>
							</div>
						</div>
						<div class="text">
							
							<div class="contact-info-block col-lg-4 col-md-6 col-sm-12">
					<div class="inner-box">
						<div class="color-layer"></div>
						<div class="icon-box">
							<span class="icon flaticon-phone-call"></span>
						</div>
						<h6>For Quick Service</h6>
						<ul>
							<li><a href="tel%2b1-800-100-900"><?php echo $site_setting->quick_support_number;?></a></li>
						</ul>
					</div>
				</div>

						</div>
						<!-- Social Box -->
						<ul class="social-box">
							<li class="facebook"><a target="_blank" href="<?php echo $site_setting->facebook; ?>" class="fa fa-facebook-f"></a></li>
							<li class="linkedin"><a target="_blank" href="<?php echo $site_setting->facebook; ?>" class="fa fa-linkedin"></a></li>
						</ul>
					</div>
					
					<!-- Form Column -->
					<div class="form-column col-lg-6 col-md-12 col-sm-12">
						<div class="inner-column">
							
							<!-- Contact Form -->
							<div class="contact-page-form">
								<!-- Contact Form -->
								<form method="post" action="" id="">
									<div class="row clearfix">
									
										<div class="form-group col-lg-6 col-md-6 col-sm-12">
											<span class="icon flaticon-user-2"></span>
											<input type="text" name="username" placeholder="Name" required>
										</div>
										
										<div class="form-group col-lg-6 col-md-6 col-sm-12">
											<span class="icon flaticon-phone-call"></span>
											<input type="text" name="phone" placeholder="Phone" required>
										</div>
										
										<div class="form-group col-lg-6 col-md-6 col-sm-12">
											<span class="icon flaticon-big-envelope"></span>
											<input type="email" name="email" placeholder="Email" required>
										</div>
										
										<div class="form-group col-lg-6 col-md-6 col-sm-12">
											<span class="icon flaticon-user-2"></span>
											<input type="text" name="subject" placeholder="Subject" required>
										</div>
										
										<div class="form-group col-lg-12 col-md-12 col-sm-12">
											<span class="icon flaticon-user-2"></span>
											<textarea name="message" placeholder="Message"></textarea>
										</div>
										
										<div class="form-group col-lg-12 col-md-12 col-sm-12">
											<button class="theme-btn submit-btn" type="submit" name="submit-form">Submit Now <span class="arrow flaticon-right-arrow-1"></span></button>
										</div>
										
									</div>
								</form>
								<!-- Contact Form -->
							</div>

							<div class="row clearfix">
				
				<!-- Contact Info Block -->
				
				
			</div>

							
						</div>
					</div>
					

				</div>
			</div>
			
		</div>
	</div>
	<!-- End Contact Page Section -->
<?php include 'footer.php'; ?>
