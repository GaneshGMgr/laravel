<?php include 'header.php'; ?>

<!-- Page Title -->
    <section class="page-title" style="background-image: url(images/background/3.jpg)">
    	<div class="auto-container">
			<h1>Fixed Deposit</h1>
			<ul class="page-breadcrumb">
				<li><a href="index-2.html">home</a></li>
				<li>Calculator</li>
			</ul>
        </div>
    </section>
    <!-- End Page Title -->
	
	<!-- Contact Page Section -->
    <div class="contact-page-section" style="background-image: url(images/background/pattern-9.png)">
    	<div class="auto-container">
        	
			<!-- Lower Section -->
			<div class="lower-section">
				<div class="row clearfix">
					
					<!-- Content Column -->
					
					<!-- Form Column -->
					<div class="form-column col-lg-6 col-md-12 col-sm-12">
						<div class="inner-column">
							
							<div class="contact-page-form">
							
								<div class="row clearfix">
									
									<div class="form-group col-lg-12 col-md-12 col-sm-12">
										<span class="icon flaticon-money-bag"></span>
										<input type="text" name="principal" id="principal" placeholder="Principle Amount (Rs.)" required>
									</div>
										
									<div class="form-group col-lg-4 col-md-4 col-sm-12">
										<span class="icon flaticon-calculator"></span>
										<input type="text" name="rate" id="rate" placeholder="Interest Rate" required>
									</div>
										
									<div class="form-group col-lg-4 col-md-4 col-sm-12">
										<span class="icon flaticon-wall-clock"></span>
										<input type="email" name="time" id="time" placeholder="Time Period" required>
									</div>
										
									<div class="form-group col-lg-4 col-md-4 col-sm-12">
										<select class="form-control" id="type" name="type" data-placeholder="Type">
										    <option value="" selected="selected" disabled="disabled">--- SELECT ---</option>
            								<option value="days">days</option>
            								<option value="months">months</option>
            								<option value="years">years</option>
            							</select>
									</div>
									
									<div class="form-group col-lg-6 col-md-6 col-sm-12">
										<select class="form-control" id="frequency" name="frequency" data-placeholder="Frequency">
										    <option value="" selected="selected" disabled="disabled">--- SELECT ---</option>
            								<option value="12">Compound - Monthly</option>
            								<option value="4">Compound - Quarterly</option>
            								<option value="2">Compound - Falf-Yearly</option>
            								<option value="1">Compound - Annually</option>
            							</select>
									</div>
										
									<div class="form-group col-lg-12 col-md-12 col-sm-12">
										<button class="theme-btn submit-btn" id="calculateBtn" name="submit-form">Calculate <span class="arrow flaticon-right-arrow-1"></span></button>
									</div>
									
								</div>
								
							</div>
							
						</div>
					</div>
					
					<!-- Calculated -->

					<div class="content-column col-lg-6 col-md-12 col-sm-12">
						<div class="inner-column">
							<!-- Sec Title -->
							<div class="sec-title">
								<div class="title">Calucated Result</div>
								<div id="fdData"></div>
							</div>
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

		$('#calculateBtn').on('click', function(){
			var data = [];
			var url = "<?=base_url()?>Home/calculateFixedDeposit";
			var p = $('#principal').val();
			var t = $('#time').val();
			var r = $('#rate').val();
			var type = $('#type').val();
			var frequency = $('#frequency').val();

			data.push({name:'p', value:p});
			data.push({name:'t', value:t});
			data.push({name:'r', value:r});
			data.push({name:'type', value:type});
			data.push({name:'frequency', value:frequency});
			
			$.post(url, data, function(response, status){
			    
			    var responseData = JSON.parse(response);
			 
			    var html = '';
				html += '<hr style="border-style: dashed;"/>';

				html += '<tr>';
				html += '<td>Maturity Value:&nbsp;&nbsp;&nbsp;</td>';
				html += '<td>'+responseData.result.amount+'</td>';
				html += '</tr><br><br>';

				html += '<tr>';
				html += '<td>Interest Earned:&nbsp;&nbsp;&nbsp;</td>';
				html += '<td>'+responseData.result.interest+'</td>';
				html += '</tr>';

				html += '<hr style="border-style: dashed;"/>';


				$('#fdData').html('');
				$('#fdData').html(html);
				
                console.log('test');
            });

		});

	});

</script>