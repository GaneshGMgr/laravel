<?php include 'header.php'; ?>
<!-- Page Title -->
    <section class="page-title" style="background-image: url(images/background/3.jpg)">
    	<div class="auto-container">
			<h1>News / <?php echo $news->title;?></h1>
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
								<img src="<?php echo base_url('uploads/news/').$news->featured_image; ?>" alt="" />
							</div>
							<h1><?php echo $news->title;?></h1>
							<div>
								<?php echo $news->optional_description;?>
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
									<?php foreach($services as $services){ ?>
									<li class="active"><a href="<?php echo base_url('uttam/').str_replace(' ','-',$services->title); ?>"> <?php echo $services->title; ?></a></li>
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