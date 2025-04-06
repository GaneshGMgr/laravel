<?php include 'header.php'; ?>

<!-- Banner Section -->
    <section class="banner-section">
		<div class="main-slider-carousel owl-carousel owl-theme">
            
            <?php foreach($slider as $slider) {?>
        <div class="slide" style="background-image: url(<?php echo base_url('uploads/slider/').$slider->featured_image; ?>)">
				<div class="color-layer-one"></div>
				<div class="color-layer-two" style="background-image: url(<?php echo base_url('assets/frontend/'); ?>images/main-slider/image-2.jpg)"></div>
				<div class="auto-container">
					<div class="row clearfix">
					
						<!-- Content Column -->
						<div class="content-column col-lg-6 col-md-12 col-sm-12">
							<div class="inner-column">
								<div class="title"><?php echo $slider->title; ?></div>
								<h1><?php echo $slider->description; ?></h1>
								<div class="text"><?php echo $slider->optional_description; ?></div>
								<div class="btns-box">
									
									<a href="<?php echo $slider->url; ?>" class="theme-btn btn-style-two"><span class="txt"><?php echo $slider->url_title; ?></span></a>
								</div>
							</div>
						</div>
						
						<!-- Image Column -->
						<div class="image-column col-lg-6 col-md-12 col-sm-12">
							<div class="inner-column">
								<div class="image">
									<img src="<?php echo base_url('assets/frontend/'); ?>images/main-slider/content-image-1.png" alt="" />
								</div>
							</div>
						</div>
						
					</div>
				</div>
			</div>
			<?php } ?>

			
		
			
		</div>
		
	</section>
	<!-- End Banner Section -->
	
	<!--Sponsors Section-->
	<section class="sponsors-section">
		<div class="outer-container">
			
			<div class="carousel-outer">
                <!--Sponsors Slider-->
                <ul class="sponsors-carousel owl-carousel owl-theme">
                	<?php  foreach($association as $association) {  ?>
                    <li><div class="image-box"><a href="#"><img src="<?php echo base_url('uploads/association/').$association->image; ?>" alt=""></a></div></li>
                	<?php } ?>
                    
                </ul>
            </div>
			
		</div>
	</section>
	<!--End Sponsors Section-->
	
	<!-- About Section -->
    <section class="about-section">
		<div class="pattern-layer" style="background-image: url(<?php echo base_url('assets/frontend/'); ?>images/background/pattern-1.png)"></div>
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
						
						
						<a href="<?php echo base_url('about'); ?>" class="theme-btn btn-style-two"><span class="txt">About UTTAM SAVING</span></a>
						
					</div>
				</div>
				
			</div>
		</div>
	</section>
	<!-- End About Section -->
	
	<!-- Services Section -->
    <section class="services-section">
		<div class="auto-container">
			<!-- Sec Title -->
			<div class="sec-title centered">
				<div class="title">OUR SERVICES</div>
			</div>
            <div class="row clearfix">

            	<?php foreach($service as $service) { ?>
				
				<!-- Service Block -->
				<div class="service-block col-lg-4 col-md-6 col-sm-12">
					<div class="inner-box wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
						<div class="color-layer">
							<span class="side-icon flaticon-line-graph"></span>
						</div>
						<div class="icon-box">
							<span class="icon flaticon-bar-chart"></span>
						</div>
						<h4><a href="#"><?php echo $service->title; ?></a></h4>
						<div class="text"><?php echo $service->description; ?></div>
					</div>
				</div>

				<?php } ?>
				
				
				
			</div>
		</div>
	</section>
	<!-- End Services Section -->
	
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
	
	<!-- Testimonial Section -->
    <section class="testimonial-section" style="background-image: url(images/background/pattern-2.png)">
		<div class="auto-container">
			<!-- Sec Title -->
			<div class="sec-title light centered">
				<div class="title">Client Testimonials</div>
				<h2>What People Say About <span>Us</span></h2> 
			</div>
			
			<div class="testimonial-outer">
            
            <?php foreach($testimonial as $testimonial){ ?>
            	<!--Client Testimonial Carousel-->
                <div class="client-testimonial-carousel owl-carousel owl-theme">
                    <!-- Testimonial Block -->
                    <div class="testimonial-block">
                        <div class="inner-box">
							<div class="row clearfix">
								<!-- Content Column -->
								<div class="content-column col-lg-5 col-md-12 col-sm-12">
									<div class="inner-column">
										<span class="quote-icon flaticon-quote"></span>
										<div class="text">"<?php echo $testimonial->testimonial; ?></div>
										<div class="author">
											<?php echo $testimonial->name; ?>
										</div>
									</div>
								</div>
								<!-- Image Column -->
								<div class="image-column col-lg-7 col-md-12 col-sm-12">
									<div class="inner-column">
										<div class="image">
											<img src="<?php echo base_url('uploads/testimonial/').$testimonial->featured_image; ?>" alt="<?php echo $testimonial->name; ?>" style="max-width: 277px; float: right;"/>
										</div>
									</div>
								</div>
							</div>
                        </div>
                    </div>
                    
                </div>
            <?php } ?>
				
				<!--Product Thumbs Carousel-->
                <div class="client-thumb-outer">
                    <div class="client-thumbs-carousel owl-carousel owl-theme">
                        
                        <div class="thumb-item">
                            <figure class="thumb-box"><img src="<?php echo base_url('assets/frontend/'); ?>images/resource/testimonial-thumb.jpg" alt=""></figure>
                        </div>
                        
                    </div>
                </div>
				
			</div>
			
		</div>
	</section>
	<!-- End Testimonial Section -->
	
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
