<?php include 'header.php'; ?>

<!-- Page Title -->
    <section class="page-title" style="background-image: url()">
    	<div class="auto-container">
			<h1>Services</h1>
			<ul class="page-breadcrumb">
				<li><a href="<?php echo base_url(); ?>">Home</a></li>
				<li>Services</li>
			</ul>
        </div>
    </section>
    <!-- End Page Title -->
	
	<!-- Services Page Section -->
    <div class="services-page-section">
    	<div class="auto-container">
        	<div class="row clearfix">
				
				<!-- Service Block -->
				<?php foreach($service as $service) { ?>
				<div class="service-block col-lg-4 col-md-6 col-sm-12">
					<div class="inner-box wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
						<div class="color-layer">
							<span class="side-icon <?php echo $service->icon; ?>"></span>
						</div>
						<div class="icon-box">
							<span class="icon flaticon-bar-chart"></span>
						</div>
						<h4><a href="<?php echo base_url('uttam/').str_replace(' ','-',$service->title); ?>"><?php echo $service->title; ?></a></h4>
						<div class="text"><?php echo $service->description; ?></div>
						<!-- <a class="arrow" href="#"><span class="txt">More</span><span class="arrow-icon flaticon-right-arrow-1"></span></a> -->
					</div>
				</div>
				<?php } ?>

				
				
			</div>
		</div>
	</div>
	<!-- End Services Page Section -->
	
<?php include 'footer.php'; ?>