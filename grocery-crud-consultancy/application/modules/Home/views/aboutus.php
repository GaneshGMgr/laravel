<?php include 'header.php';?>

<!-- Page Title -->
    <section class="page-title" style="background-image: url(images/background/3.jpg)">
    	<div class="auto-container">
			<h1>About Us</h1>
			<ul class="page-breadcrumb">
				<li><a href="index-2.html">home</a></li>
				<li>About</li>
				<li>About us</li>
			</ul>
        </div>
    </section>
    <!-- End Page Title -->


<!-- About Section -->
    <section class="about-section">
		<div class="pattern-layer" style="background-image: url(images/background/pattern-1.png)"></div>
		<div class="auto-container">
            <div class="row clearfix">
			
				<!-- Image Column -->
				<div class="image-column col-lg-7 col-md-12 col-sm-12">
					<div class="inner-column">
						<div class="image">
							<img src="<?php echo base_url('uploads/site/').$site_setting->about_us_img; ?>" alt="" />
						</div>
					</div>
				</div>
				
				<!-- Content Column -->
				<div class="content-column col-lg-5 col-md-12 col-sm-12">
					<div class="inner-column">
						<div class="title"><?php echo $site_setting->about_title; ?></div>
						<h2><?php echo $site_setting->about_title_second; ?></h2>
						<p><?php echo $site_setting->about_desc; ?></p>
						<!-- Fact Counter -->
						<div class="fact-counter">
							<div class="row clearfix">

								<!-- Column -->
								<div class="column counter-column col-lg-4 col-md-4 col-sm-12">
									<div class="inner wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
										<div class="content">
											<div class="icon flaticon-soccer-cup"></div>
											<div class="count-outer count-box">
												<span class="count-text" data-speed="3500" data-stop="12000">0</span>+
											</div>
											<div class="counter-title">Valued </br>Customer</div>
										</div>
									</div>
								</div>

								<!--Column-->
								<div class="column counter-column col-lg-4 col-md-4 col-sm-12">
									<div class="inner wow fadeInLeft" data-wow-delay="300ms" data-wow-duration="1500ms">
										<div class="content">
											<div class="icon flaticon-flag"></div>
											<div class="count-outer count-box">
												<span class="count-text" data-speed="2500" data-stop="3">0</span>+
											</div>
											<div class="counter-title">Branches</div>
										</div>
									</div>
								</div>

								<!--Column-->
								<div class="column counter-column col-lg-4 col-md-4 col-sm-12">
									<div class="inner wow fadeInLeft" data-wow-delay="600ms" data-wow-duration="1500ms">
										<div class="content">
											<div class="icon flaticon-book"></div>
											<div class="count-outer count-box">
												<span class="count-text" data-speed="3000" data-stop="12000">0</span>+
											</div>
											<div class="counter-title">Happy Customer</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				
			</div>
		</div>
	</section>
	<!-- End About Section -->
	
	<!-- Feature Section -->
    <section class="feature-section">
		<div class="auto-container">
			<!-- Sec Title -->
			<div class="sec-title centered">
				<div class="title">Our Services!</div>
				<h2>We Are The Trusted <span>Organization</span></h2>
			</div>
            <div class="row clearfix">
				
				<!-- Blocks Column -->
				<div class="blocks-column col-lg-6 col-md-12 col-sm-12">
					<div class="inner-column">
						<div class="row clearfix">
						
						<?php foreach($service as $service) { ?>
							<!-- Feature Block -->
							<div class="feature-block col-lg-6 col-md-6 col-sm-12">
								<div class="inner-box">
									<div class="icon-box">
										<span class="icon flaticon-bar-chart"></span>
									</div>
									<h6><a href="service-detail.html"><?php echo $service->title; ?></a></h6>
									<div class="text"><?php echo $service->description; ?></div>
								</div>
							</div>
						<?php } ?>
							
							
							
						</div>
					</div>
				</div>
				
				<!-- Image Column -->
				<div class="image-column col-lg-6 col-md-12 col-sm-12">
					<div class="inner-column">
						<div class="image">
							<img src="<?php echo base_url('uploads/site/').$site_setting->about_second_image;?>" alt="" />
							<!-- Feature Block Two -->
							<div class="feature-block-two">
								<div class="inner-box">
									<div class="icon-box">
										<span class="icon flaticon-mission"></span>
									</div>
									<h6><a href="service-detail.html">Our Mission</a></h6>
									<div class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmo</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				
			</div>
		</div>
	</section>
	<!-- End Feature Section -->
	
	<!-- Business Section -->
    <section class="business-section">
		<div class="auto-container">
			<!-- Upper Section -->
			<div class="upper-section">
				<div class="row clearfix">
					
					<!-- Content Column -->
					<div class="content-column col-lg-7 col-md-12 col-sm-12">
						<div class="inner-column">
							<div class="title"><?php echo $site_setting->about_second_title; ?></div>
							<h2><?php echo $site_setting->about_second_title_second; ?></h2>
							<p><?php echo $site_setting->about_second_desc; ?></p>
							<!-- <ul class="list-style-one">
								<li>Duis consectetur feugiat auctor. Morbi nec enim luctus, feugiat arcu id, ultricies ante.</li>
								<li>Morbi nec enim luctus, feugiat arcu id, ultricies ante. Duis vel massa eleifend.</li>
								<li>Duis vel massa eleifend, porta est non, feugiat metus.</li>
							</ul> -->
						</div>
					</div>
					
					<!-- Image Column -->
					<div class="image-column col-lg-5 col-md-12 col-sm-12">
						<div class="inner-column">
							<div class="image titlt" data-tilt data-tilt-max="3">
								<img src="<?php echo base_url('uploads/site/').$site_setting->about_second_image; ?>" alt="" />
							</div>
						</div>
					</div>
					
				</div>
			</div>
		</div>
	</section>
	<!-- End Business Section -->
	
	<!-- Team Section -->
    <section class="team-section">
		<div class="pattern-layer" style="background-image: url(images/background/pattern-3.png)"></div>
		<div class="auto-container">
			<!-- Sec Title -->
			<div class="sec-title centered">
				<div class="title">Our Executive Team</div>
			</div>
			<div class="row clearfix">
				
            <?php foreach($team as $team){ ?>

				<!-- Team Block -->
				<div class="team-block col-lg-3 col-md-6 col-sm-12">
					<div class="inner-box wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
						<div class="image">
							<img src="<?php echo base_url('uploads/team/').$team->featured_image; ?>" alt="" />
							<!-- Overlay Box -->
							<div class="overlay-box">
								<div class="overlay-inner">
									<div class="content">
										<!-- Social Box -->
										<ul class="social-box">
											<li class="facebook"><a target="_blank" href="http://facebook.com/" class="fa fa-facebook-f"></a></li>
											<li class="linkedin"><a target="_blank" href="http://linkedin.com/" class="fa fa-linkedin"></a></li>
										</ul>
									</div>
								</div>
							</div>
						</div>
						<div class="lower-content">
							<h4><a href="#"><?php echo $team->name; ?></a></h4>
							<div class="designation"><?php echo $team->designation; ?></div>
						</div>
					</div>
				</div>
			<?php } ?>
				
				
			</div>
		</div>
	</section>
	<!-- End Team Section -->
	
<!-- Newsletter Section -->
    <section class="newsletter-section">
		<div class="auto-container">
			<div class="content-box">
				<div class="pattern-layer" style="background-image: url(<?php echo base_url('assets/frontend/'); ?>images/background/pattern-5.png)"></div>
				<div class="box-inner">
					<div class="title">Get In Touch</div>
					<h2>Subscribe To Newsletter</h2>
					<div class="text">Be the first to subscribe to our newsletter and get latest news from Consult. E-mail: Phone: Address:</div>
					<!-- Emailed Form -->
					<div class="emailed-form">
						<form method="post" action="https://codexlayer.com/consejo/contact.html">
							<div class="form-group">
								<input type="email" name="email" value="" placeholder="Enter Your Email" required>
								<button type="submit" class="theme-btn">Subscribe</button>
							</div>
						</form>
					</div>
				</div>
			</div>
			<!-- Map Outer -->
			<div class="map-outer">
				<div style="width: 100%"><iframe width="100%" height="600" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q=Uttam%20Mart+(UTTAM%20Multipurpose%20Savings)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe><a href="https://www.mapsdirections.info/en/measure-map-radius/">Map radius measure</a></div>
			</div>
		</div>
	</section>
	<!-- End Newsletter Section -->

	<?php include 'footer.php'; ?>