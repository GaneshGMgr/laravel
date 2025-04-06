<!-- Main Footer -->
    <footer class="main-footer" style="background-image: url(images/background/2.jpg)">
		<div class="pattern-layer" style="background-image: url(images/background/pattern-6.png)"></div>
		<div class="auto-container">
        	<!--Widgets Section-->
            <div class="widgets-section">
            	<div class="row clearfix">
                	
					<!-- Footer Column -->
					<div class="footer-column col-lg-4 col-md-6 col-sm-12">
						<div class="footer-widget logo-widget">
							<div class="logo">
								<a href="#"><img src="<?php echo base_url('uploads/site/').$site_setting->site_logo; ?>" alt="UTTAM Savings" style="max-width: 100px;" /></a>
							</div>
							<div class="text"><?php echo $site_setting->slogan; ?></div>
							<!-- Social Box -->
							<ul class="social-box">
								<li class="share">Find Us Now</li>
								<li class="facebook"><a target="_blank" href="<?php echo $site_setting->facebook; ?>" class="fa fa-facebook-f"></a></li>
								<li class="linkedin"><a target="_blank" href="<?php echo $site_setting->linkedin; ?>" class="fa fa-linkedin"></a></li>
								
							</ul>
						</div>
					</div>
					
					<!-- Footer Column -->
					<div class="footer-column col-lg-3 col-md-6 col-sm-12">
						<div class="footer-widget links-widget">
							<h4>Useful Links</h4>
							<div class="row clearfix">
								<div class="column col-lg-12 col-md-12 col-sm-12">
									<ul class="list-link">
										<?php $footer_link = $this->db->get('tbl_footer_menu')->result();
										foreach($footer_link as $footer_link) {
										 ?>
										<li><a href="#">Service</a></li>
										<?php } ?>
										<!-- <li><a href="#">Online Account Opening</a></li>
										<li><a href="#">Loan Calculator</a></li>
										<li><a href="#">About us</a></li>
										<li><a href="#">Fixed Deposite Calculator</a></li>
										<li><a href="#">Our Branches</a></li> -->
									</ul>
								</div>
							</div>
						</div>
					</div>
					
                    <!-- Footer Column -->
					<div class="footer-column col-lg-5 col-md-6 col-sm-12">
						<div class="footer-widget contact-widget">
							<h4>Contact Information</h4>
							<h6>Get In Touch</h6>
							<ul class="list-style-two">
								<li><span class="icon flaticon-map"></span><?php echo $site_setting->contact_address; ?></li>
								<li><span class="icon flaticon-phone-call"></span><a href="tel:<?php echo $site_setting->landline; ?>"><?php echo $site_setting->landline; ?></a></li>
								<li><span class="icon flaticon-big-envelope"></span><a href="mailto:<?php echo $site_setting->email; ?>"><?php echo $site_setting->email; ?></a></li>
							</ul>
							<h6>Opening Hours</h6>
							<div class="timing">Sun - Fri 09:30am To 05:00pm Saturday: Off</div>
						</div>
					</div>
					
				</div>
			</div>
			
		</div>
		
		<!-- Footer Bottom -->
		<div class="footer-bottom">
			<div class="auto-container">
				<div class="row clearfix">
					<!-- Column -->
					<div class="column col-lg-6 col-md-12 col-sm-12">
						<div class="copyright">Copyright &copy; 2021, Designed with by UTECH IT PROFESSIONALS</div>
					</div>
					<!-- Column -->
					<div class="column col-lg-6 col-md-12 col-sm-12">
						<ul class="footer-nav">
							<li><a href="#">Privacy Policy</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		
	</footer>
	
</div>
<!--End pagewrapper-->



<!--Scroll to top-->
<div class="scroll-to-top scroll-to-target" data-target="html"><span class="fa fa-arrow-up"></span></div>

<script src="<?php echo base_url('assets/frontend/'); ?>js/jquery.js"></script>
<script src="<?php echo base_url('assets/frontend/'); ?>js/popper.min.js"></script>
<script src="<?php echo base_url('assets/frontend/'); ?>js/bootstrap.min.js"></script>
<script src="<?php echo base_url('assets/frontend/'); ?>js/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="<?php echo base_url('assets/frontend/'); ?>js/jquery.fancybox.js"></script>
<script src="<?php echo base_url('assets/frontend/'); ?>js/appear.js"></script>
<script src="<?php echo base_url('assets/frontend/'); ?>js/parallax.min.js"></script>
<script src="<?php echo base_url('assets/frontend/'); ?>js/tilt.jquery.min.js"></script>
<script src="<?php echo base_url('assets/frontend/'); ?>js/jquery.paroller.min.js"></script>
<script src="<?php echo base_url('assets/frontend/'); ?>js/owl.js"></script>
<script src="<?php echo base_url('assets/frontend/'); ?>js/wow.js"></script>
<script src="<?php echo base_url('assets/frontend/'); ?>js/nav-tool.js"></script>
<script src="<?php echo base_url('assets/frontend/'); ?>js/jquery-ui.js"></script>
<script src="<?php echo base_url('assets/frontend/'); ?>js/script.js"></script>

</body>

</html>