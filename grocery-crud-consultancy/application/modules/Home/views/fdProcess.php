<?php include 'header.php'; ?>

<!-- Page Title -->
    <section class="page-title" style="background-image: url(images/background/3.jpg)">
    	<div class="auto-container">
			<h1>Fixed Deposit Processing Form</h1>
			<ul class="page-breadcrumb">
				<li><a href="index-2.html">home</a></li>
				<li>Fixed Deposit Processing Form</li>
			</ul>
        </div>
    </section>
    <!-- End Page Title -->
    
    <!-- Contact Page Section -->
    <div class="contact-page-section" style="padding: 20px 0px 100px; background-image: url(<?php echo base_url('assets/frontend/'); ?>images/background/pattern-9.png)">
    	<div class="auto-container">

			<!-- Lower Section -->
			<div class="lower-section">
				<div class="row clearfix">
					
					<!-- Form Column -->
					<div class="form-column col-lg-12 col-md-12 col-sm-12">
						<div class="inner-column">
							
							<!-- Loan Processing Form -->
							<div class="contact-page-form">
								<form method="post" action="<?=base_url()?>Home/fixedDepositProcess" id="fixedDepositProcessForm">
									<div class="row clearfix">
									
										<div class="form-group col-lg-6 col-md-6 col-sm-12">
											<span class="icon flaticon-money-bag"></span>
											<input type="text" name="fd_amount" autocomplete="off" placeholder="Fixed Deposit Amount" required>
										</div>
										
										<div class="form-group col-lg-6 col-md-6 col-sm-12">
											<span class="icon flaticon-wall-clock"></span>
											<input type="text" name="time" autocomplete="off" placeholder="Time Period" required>
										</div>
										
										<div class="form-group col-lg-12 col-md-12 col-sm-12">
											<button class="theme-btn submit-btn" id="submitBtn" type="button">Submit Now <span class="arrow flaticon-right-arrow-1"></span></button>
										</div>
										
									</div>
								</form>
							</div>

							<div class="row clearfix"></div>
							
						</div>
					</div>

				</div>
			</div>
			
		</div>
	</div>
	<!-- End Contact Page Section -->

<?php include 'footer.php'; ?>

<script type="text/javascript">

    $(document).ready(function(){
        
        $("#submitBtn").on('click', function (e) {
            var url = $('#fixedDepositProcessForm').attr('action');
            var data = $('#fixedDepositProcessForm').serializeArray();
    
            $.post(url, data, function(response, status){
                var responseData = JSON.parse(response);
                alert(responseData.msg);
                location.reload();
            });
         
        });  
    });
  
 </script>
