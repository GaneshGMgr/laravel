<?php include 'header.php'; ?>

	<!-- Page Title -->
    <section class="page-title" style="background-image: url(images/background/3.jpg)">
    	<div class="auto-container">
			<h1>News & Events</h1>
        </div>
    </section>
    <!-- End Page Title -->
	
	<!-- Cases Page Section -->
    <div class="cases-page-section">
    	<div class="auto-container">
        	<div class="row clearfix">
				
				<?php  foreach($news as $news) {  ?>
				<!-- Case Block -->
				<div class="case-block-two col-lg-6 col-md-12 col-sm-12">
					<div class="inner-box">
						<div class="image">
							<img src="<?php echo base_url('uploads/news/').$news->featured_image; ?>" style="max-width: 170px;" />
							<div class="overlay-box">
								<a href="<?php echo base_url('news_finance/').str_replace(' ','-',$news->title);  ?>" class="search-icon"><span class="icon flaticon-link"></span></a>
							</div>
						</div>
						<div class="content">
							
							<h4><a href="<?php echo base_url('news_finance/').str_replace(' ','-',$news->title);  ?>"><?php echo $news->title; ?>
							</a>
							</h4>
						</div>
							<div class="lower-box">
								<a class="arrow" href="<?php echo base_url('news_finance/').str_replace(' ','-',$news->title);  ?>"><span class="txt">More</span><span class="arrow-icon flaticon-right-arrow-1"></span></a>
							</div>
						</div>
					</div>
				<?php } ?>
				
			
			
		</div>
	</div>
	</div>
	<!-- End Cases Page Section -->

	<?php include 'footer.php'; ?>