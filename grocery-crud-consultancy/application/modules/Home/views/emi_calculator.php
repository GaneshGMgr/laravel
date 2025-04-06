<?php include 'header.php'; ?>

<!-- Page Title -->
    <section class="page-title" style="background-image: url(images/background/3.jpg)">
    	<div class="auto-container">
			<h1>EMI</h1>
			<ul class="page-breadcrumb">
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
										<input type="text" name="loan" id="loan" autocomplete="off" placeholder="Loan Amount (Rs.)" required>
									</div>
										
									<div class="form-group col-lg-6 col-md-6 col-sm-12">
										<span class="icon flaticon-calculator"></span>
										<input type="text" name="rate" id="rate" autocomplete="off" placeholder="Interest Rate (%)" required>
									</div>
										
										<div class="form-group col-lg-6 col-md-6 col-sm-12">
											<span class="icon flaticon-clock"></span>
											<input type="text" autocomplete="off" name="time" id="time" placeholder="Loan Period (in months)" required>
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
								<div id="emi_data"></div>
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
			$('#emi_data').html('');

			var p = parseFloat(document.getElementById("loan").value);
			var t = parseInt(document.getElementById("time").value);
			var r = parseFloat(document.getElementById("rate").value/100.0);

			if (isNaN(p)) {
				alert("Kindly Insert Loan Amount");
			}

			if (isNaN(t)) {
				alert("Kindly Insert Time Period");
			}

			if (0==r) {
				alert("Kindly Insert Interest Rate");
			}

			if (!isNaN(p) && !isNaN(t) && 0!=r) {
				var data = amort(p, r, t);

				$('#emi_data').html(data);
			}


		});

		function amort(balance, interestRate, terms){
			var monthlyRate = interestRate/12;
			var payment = balance * (monthlyRate/(1-Math.pow(1+monthlyRate, - terms)));

			var result = '';
			
			result += '<br>';

			result += "Loan amount: Rs." + balance.toFixed(2) +  "<br />" + 
			"Interest rate: " + (interestRate*100).toFixed(2) +  "%<br />" +
			"Number of months: " + terms + "<br />" +
			"Monthly payment: Rs. " + payment.toFixed(2) + "<br />" +
			"Total paid: Rs. " + (payment * terms).toFixed(2) + "<br />";

			result += '<hr style="border-style: dashed;"/>';

			result += "<table class='table table-bordered' border='1'>\
			<tr align=center>\
			<th>Month #</th>\
			<th>Balance </th>\
			<th>Interest </th>\
			<th>Principal </th>";

			for (var count = 0; count < terms; ++count){ 
				var interest = 0;
				var monthlyPrincipal = 0;

				result += "<tr align=center>";
				result += "<td>" + (count + 1) + "</td>";
				result += "<td> Rs. " + balance.toFixed(2) + "</td>";
				interest = balance * monthlyRate;
				result += "<td> Rs. " + interest.toFixed(2) + "</td>";
				monthlyPrincipal = payment - interest;
				result += "<td> Rs. " + monthlyPrincipal.toFixed(2) + "</td>";
				result += "</tr>";

				balance = balance - monthlyPrincipal;		
			}

			result += "</table>";

			return result;
		}


	});

</script>
