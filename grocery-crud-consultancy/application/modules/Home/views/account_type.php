<?php include 'header.php'; ?>
<!-- Page Title -->
    <section class="page-title" style="background-image: url(images/background/3.jpg)">
    	<div class="auto-container">
			<h1>UTTAM SAVING TYPE</h1>
			<ul class="page-breadcrumb">
			</ul>
        </div>
    </section>
    <!-- End Page Title -->
	
	<!-- Sidebar Page Container -->
    <div class="sidebar-page-container">
    	<div class="auto-container">
        	<div class="row clearfix">
				
				<!-- Content Side -->
                <div class="content-side col-lg-9 col-md-12 col-sm-12">
                	<div class="service-detail">
						<div class="inner-box">
							<div class="image">
								<img src="images/resource/service.jpg" alt="" />
							</div>
							<div class="lower-content">
								<h3>UTTAM SAVING TYPE</h3>
									<!-- Block -->
									<ul class="accordion-box">

									<?php  $i = 0; foreach($saving_type as $saving_type){  ?>
									<li class="accordion block active-block">
										<div class="acc-btn <?php if($i==0){echo "active"; $i++;} ?> "><div class="icon-outer"><span class="icon icon-plus fa fa-plus"></span> <span class="icon icon-minus fa fa-minus"></span></div><?php echo $saving_type->title;?></div>
										<div class="acc-content current">
											<div class="content">
												<div class="text"><?php echo $saving_type->description;?></div>
											</div>
										</div>
									</li>
									<?php } ?>
									

								</ul>
								
							</div>
						</div>
					</div>
				</div>
				
				<!-- Sidebar Side -->
                <div class="sidebar-side col-lg-3 col-md-12 col-sm-12">
                	<aside class="sidebar sticky-top">
						
						<!-- Categories Widget -->
						<div class="sidebar-widget categories-widget">
							<div class="widget-content">
								<div class="sidebar-title">
									<h5>Services</h5>
								</div>
								<ul class="blog-cat">
									<?php  foreach($service as $service) { ?>
									<li class="active"><a href="<?php echo base_url('service/').str_replace(' ','-',$service->title); ?>"><?php echo $service->title;?></a></li>
									<?php } ?>
								</ul>
							</div>
						</div>
						
						<!-- Faq Contact Widget -->
						<div class="faq-contact-widget">
							<div class="widget-content" style="background-image: url(images/background/4.jpg)">
								<h4>Contact Form</h4>
								<!-- Faq Widget Form -->
								<div class="faq-widget-form">
									
									<!-- Contact Form -->
									<form method="post" action="https://codexlayer.com/consejo/contact.html">
										
										<div class="form-group">
											<span class="icon flaticon-user-2"></span>
											<input type="text" name="username" placeholder="Enter Name" required>
										</div>
										
										<div class="form-group">
											<span class="icon flaticon-big-envelope"></span>
											<input type="email" name="email" placeholder="Enter Email" required>
										</div>
										
										<div class="form-group">
											<span class="icon flaticon-phone-call"></span>
											<input type="text" name="phone" placeholder="Enter Phone Number" required>
										</div>
										
										<div class="form-group">
											<button class="theme-btn submit-btn" type="submit" name="submit-form">Submit <span class="arrow flaticon-right-arrow-1"></span></button>
										</div>
										
									</form>
									
									<!-- Faq Widget Form -->
								</div>
							</div>
						</div>
						
					</aside>
				</div>
				
			</div>
		</div>
	</div>
	<!-- End Sidebar Page Container -->

<?php include 'footer.php'; ?>

