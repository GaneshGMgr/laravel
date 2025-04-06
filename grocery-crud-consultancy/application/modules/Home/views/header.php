<!DOCTYPE html>
<html>

<head>
<meta charset="utf-8">
<?php $site_setting = $this->db->get_where('tbl_site_setting',array('id'=>1))->row() ?>




<title><?php echo $site_setting->site_name; ?></title>

<!-- Stylesheets -->
<link href="<?php echo base_url('assets/frontend/'); ?>css/bootstrap.css" rel="stylesheet">
<link href="<?php echo base_url('assets/frontend/'); ?>css/style.css" rel="stylesheet">
<link href="<?php echo base_url('assets/frontend/'); ?>css/responsive.css" rel="stylesheet">

<link href="<?php echo base_url('assets/frontend/'); ?>https://fonts.googleapis.com/css2?family=Cabin:wght@400;500;600;700&amp;family=Roboto:wght@100;300;400;500;700;900&amp;display=swap" rel="stylesheet">

<link rel="shortcut icon" href="<?php echo base_url('assets/frontend/'); ?>images/favicon.png" type="image/x-icon">
<link rel="icon" href="<?php echo base_url('assets/frontend/'); ?>images/favicon.png" type="image/x-icon">

<!-- Responsive -->
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

<!--[if lt IE 9]><script src="<?php echo base_url('assets/frontend/'); ?>https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script><![endif]-->
<!--[if lt IE 9]><script src="<?php echo base_url('assets/frontend/'); ?>js/respond.js"></script><![endif]-->

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-DTCPTHN6F6"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-DTCPTHN6F6');
</script>

</head>

<body class="hidden-bar-wrapper">

<div class="page-wrapper">
 	
    <!-- Preloader -->
    <div class="preloader"></div>
 	
 	<!-- Main Header-->
    <header class="main-header header-style-three">
    	
		<!-- Header Top Three -->
        <div class="header-top-three">
            <div class="auto-container">
				<div class="inner-container">
					<div class="text-center">WELCOME! <?php echo $site_setting->site_name; ?></div>
					<div class="clearfix">
						<!-- Top Left -->
						<div class="top-left clearfix">
							<!-- Info List -->
							<ul class="info-list">
								<li><a href="tel:<?php echo $site_setting->landline;?>"><span class="icon flaticon-phone-call"></span> <?php echo $site_setting->landline; ?></a></li>
								<li><a href="mailto:<?php echo $site_setting->landline; ?>"><span class="icon flaticon-email"></span> <?php echo $site_setting->email; ?></a></li>
							</ul>
						</div>

						<!-- Top Right -->
						<div class="top-right pull-right clearfix">
							<ul class="page-links">
								<li><a href="#">Online Account Opening</a></li>
							</ul>
							<!-- Social Nav -->
							<ul class="social-nav">
								<li><a href="<?php echo $site_setting->facebook; ?>"><span class="fa fa-facebook-f"></span></a></li>
								<li><a href="<?php echo $site_setting->linkedin; ?>"><span class="fa fa-linkedin"></span></a></li>
							</ul>
						</div>
					</div>
				</div>
            </div>
        </div>

		
		<!--Header-Upper-->
        <div class="header-upper">
        	<div class="auto-container clearfix">
				<!--Logo-->
                <div class="logo pull-left">
                    <a href="<?php echo base_url(''); ?>" title=""><img src="<?php echo base_url('assets/frontend/'); ?>images/uttam_logo.png" style="max-width: 78px;    " alt="" title=""></a>
                </div>
				<div class="nav-outer clearfix">
					<!--Mobile Navigation Toggler-->
					<div class="mobile-nav-toggler"><span class="icon flaticon-menu"></span></div>
					<!-- Main Menu -->
					<nav class="main-menu navbar-expand-md">
						<div class="navbar-header">
							<!-- Toggle Button -->    	
							<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						
						<div class="navbar-collapse collapse clearfix" id="navbarSupportedContent" style="">
							<ul class="navigation clearfix">
								<li><a href="<?php echo base_url(); ?>">Home</a></li>

								<li class="dropdown"><a href="#">About Us</a>
									<ul>
										<li><a href="<?php echo base_url('about');?>">About Us</a></li>
										<li><a href="<?php echo base_url('team');?>">Our Team</a></li>
										<li><a href="<?php echo base_url('gallery');?>">Gallery</a></li>
										<?php $about_list = $this->db->get('tbl_about_list')->result(); 
										foreach($about_list as $about_list) {
										?>
										<li> <a href="<?php ?>"> <?php echo $about_list->title; ?> </a> </li>

										<?php } ?>

									</ul>
								</li>

								<li class="dropdown"><a href="<?php echo base_url('assets/frontend/'); ?>#">Loan</a>
									<ul>
										<li><a href="<?php echo base_url('emicalculator'); ?>">Loan/EMI Calculator</a></li>
										<li><a href="<?php echo base_url('emiprocess'); ?>">Loan Processing Form</a></li>
									</ul>
								</li>

								<li class="dropdown"><a href="#">Fixed Deposit</a>
									<ul>
										<li><a href="<?php echo base_url('fdcalculator'); ?>">Interest Calculator</a></li>
										<li><a href="<?php echo base_url('fdprocess'); ?> ">FD Processing Form</a></li>
									</ul>
								</li>

								<li><a href="<?php echo base_url('savingtype'); ?>">Saving Plans</a></li>


								<li><a href="<?php echo base_url('service'); ?>">Our Services</a></li>

								<li><a href="<?php echo base_url('news'); ?>">News & Event</a></li>

								<!-- <li><a href="<?php echo base_url(); ?>">Gallery</a></li> -->

								<li><a href="<?php echo base_url('branches'); ?>">Our Branches</a></li>
								
							</ul>
						</div>
					</nav>
					
				
				</div>
				
            </div>
        </div>
        <!--End Header Upper-->
        
		<!-- Sticky Header  -->
        <div class="sticky-header">
            <div class="auto-container clearfix">
                <!--Logo-->
                <div class="logo pull-left">
                    <a href="<?php echo base_url('assets/frontend/'); ?>index-2.html" title=""><img src="<?php echo base_url('assets/frontend/'); ?>images/uttam_logo.png" style="max-width: 78px;    " alt="" title=""></a>
                </div>
                <!--Right Col-->
                <div class="pull-right">
                    <!-- Main Menu -->
                    <nav class="main-menu">
                        <!--Keep This Empty / Menu will come through Javascript-->
                    </nav><!-- Main Menu End-->
					
					
                </div>
            </div>
        </div><!-- End Sticky Menu -->
    
		<!-- Mobile Menu  -->
        <div class="mobile-menu">
            <div class="menu-backdrop"></div>
            <div class="close-btn"><span class="icon flaticon-multiply"></span></div>
            
            <nav class="menu-box">
                <div class="nav-logo"><a href="<?php echo base_url('assets/frontend/'); ?>index-2.html"><img src="<?php echo base_url('assets/frontend/'); ?>images/uttam_logo.png" style="max-width: 110px;" alt="" title=""></a></div>
                <div class="menu-outer"><!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header--></div>
            </nav>
        </div><!-- End Mobile Menu -->
	
    </header>
    <!-- End Main Header -->