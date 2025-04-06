<?php  include 'header.php'; ?>

<!-- Page Title -->
    <section class="page-title" style="background-image: url(images/background/3.jpg)">
    	<div class="auto-container">
			<h1>Gallery</h1>
			</ul>
        </div>
    </section>
    <!-- End Page Title -->
	
	<!-- Shop Page Section -->
    <div class="shop-page-section">
    	<div class="auto-container">
        	<div class="row clearfix">
				
				<!--Shop Item-->
				<?php foreach($gallery as $gallery) { ?>
				<div class="shop-item col-lg-3 col-md-4 col-sm-12">
					<div class="inner-box">
						<div class="image">
							<img src="<?php echo base_url('uploads/gallery/').$gallery->url; ?>" alt="" />
							<div class="overlay-box">
								<ul class="cart-option">
									<li><a href="<?php echo base_url('uploads/gallery/').$gallery->url; ?>" class="lightbox-image" data-fancybox-group="shop-gallery" data-caption=""><span class="flaticon-search"></span></a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<?php } ?>
				
				
			</div>
			
		</div>
	</div>
	<!-- End Shop Page Section -->

	<?php include 'footer.php'; ?>