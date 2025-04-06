<?php include 'header.php';?>

<!-- Page Title -->
    <section class="page-title" style="background-image: url(<?php echo base_url('assets/frontend/'); ?>images/background/3.jpg)">
    	<div class="auto-container">
			<h1>About Us</h1>
			<ul class="page-breadcrumb">
				<li><a href="<?php echo base_url(); ?>">Home</a></li>
				<li>Our Team</li>
				=
			</ul>
        </div>
    </section>
    <!-- End Page Title -->


<!-- Team Section -->
    <section class="team-section">
		<div class="pattern-layer" style="background-image: url(<?php echo base_url('assets/frontend/'); ?>images/background/pattern-3.png)"></div>
		<div class="auto-container">
			<!-- Sec Title -->
			<div class="sec-title centered">
				<div class="title">Our Team</div>
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

	<?php include 'footer.php'; ?>