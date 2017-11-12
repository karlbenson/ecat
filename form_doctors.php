<!DOCTYPE html>
<html>
	<head>
		<title>Luke Foundation Eye Program: Doctor Form</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="references/bootstrap.min.css">
		<link rel="stylesheet" href="references/font-awesome.min.css">
		<script src="references/jquery.min.js"></script>
		<script src="references/bootstrap.min.js"></script>
		<link rel="stylesheet" type="text/css" href="theme2.css">
	</head>
	<body style="justify-content: center;">
		<!-- HEAD AND NAVIGATION -->
		<?php include("nav.php"); ?>
		<!-- HEAD AND NAVIGATION END -->

		<div id="body">
			<!-- MAIN -->
			<div class="container-fluid" id="outer">
				<!-- TITLE -->
				<div class="container-fluid" style="color: #337ab7; text-shadow: 0px 0px 10px #ffffff; margin-bottom: 10px;">
					<h4>Eye Program: Doctor Form</h4> 
				</div>
				<!-- TITLE -->

				<?php  //CODE SECTION START
					//DOCTOR INFORMATION FIELDS MAX CHAR VALUES
					$FN_MAX = 15;
					$LN_MAX = 20;
					$LIC_LENG = 7;
					$ADDR_MAX = 50;
					//DOCTOR INFORMATION END
					//CODE SECTION END
				?>

				<!-- DOCTORS FORM -->
				<div class="container-fluid" id="basic" style="padding-top: 10px;">
					<div id="inner">
						<!-- CONTENT -->
						<div class="container-fluid">
							<!-- FORMS -->
							<div class="container-fluid">
								<h3>Doctor Information</h3>
								<hr>
								<p style="margin-bottom: 20px; color:#666666;">
									Please do not leave the required<span style="color: #d9534f">*</span> fields blank.
								</p>
								<form method="post" action="submit.php" >
									<!-- NAME -->
									<div class="form-group row">
										<label class="control-label col-md-2" style="float:left; width:170px;">Name <span style="color: #d9534f">*</span></label>
										<div class="col-md-7" style="float: left">
											<!-- FIRST NAME -->
											<div style="width: 175px; float: left; margin-right:10px;">
												<label class="sr-only" for="F_NAME" required >First Name</label>
												<input pattern="[a-zA-Z ]*" class="form-control" id="F_NAME" placeholder="First Name"  maxlength="<?php echo $FN_MAX; ?>" name="F_NAME" style="float: left;" required >
											</div>
											<!-- FIRST NAME END -->

											<!-- LAST NAME -->
											<div style="width: 175px; float: left; margin-right:10px;">
												<label class="sr-only" for="L_NAME">Last Name</label>
												<input pattern="[a-zA-Z ]*" class="form-control" id="L_NAME" placeholder="Last Name"  maxlength="<?php echo $LN_MAX; ?>" name="L_NAME" required>
											</div>
											<!-- LAST NAME END -->
										</div>
									</div>
									<!-- NAME END -->

									<!-- LICENSE NUMBER -->
									<div class="form-group row">
										<label class="control-label col-md-2" for="LICENSE_NUM" style="float:left; width:170px;">License Number <span style="color: #d9534f">*</span></label>
										<div class="col-md-2" style="width: 115px; float: left;">
											<input pattern="\d{5,7}" class="form-control" id="LICENSE_NUM" placeholder="Lic. No." maxlength="<?php echo $LIC_LENG; ?>" name="LICENSE_NUM" required>
										</div>
									</div>
									<!-- LICENSE NUMBER END -->

									<!-- ADDRESS -->
									<div class="form-group row">
										<label class="control-label col-md-2" for="ADDRESS" style="float:left; width:170px;">Address</label>
										<div class="col-md-6" style="width: 500px; float: left;">
											<input pattern="[a-zA-Z0-9 .,:;()\*/-!_#]*" class="form-control" id="ADDRESS" placeholder="Enter Home or Work Address" maxlength="<?php echo $ADDR_MAX; ?>" name="ADDRESS">
										</div>
									</div>
									<!-- ADDRESS END -->
				
									<!-- SPECIALIZATION -->
									<div class="form-group row">
										<label class="control-label col-md-2" for="SPECIALIZATION" style="float:left; width:170px;">Specialization</label>
										<div class="col-md-4" style="width: 250px; float: left;">
											<select type="text" name="SPECIALIZATION" class="form-control" id="SPECIALIZATION">
												<option value = "">Select specialization</option>
												<option value = "Pediatrician">Pediatrician</option>
												<option value = "Ophthalmologist">Ophthalmologist</option>
												<option value = "Anesthesiologist">Anesthesiologist</option>
												<option value = "Surgeon">Surgeon</option>
												<option value = "Internist">Internist</option>
											</select>
										</div>
									</div>
									<!-- SPECIALIZATION END -->
				 
									<!-- ENTER -->
									<div class="text-center" style="margin-bottom: 20px;">
										<button type="submit" class="btn" id="go" name="doctors_info">Submit</button>
									</div>
									<!-- ENTER END -->
								</form>
							</div>
							<!-- FORMS END -->
						</div>
						<!-- CONTENT END -->
					</div>
				</div>
				<!-- DOCTORS FORM END -->
				<?php
					//ERROR CHECKING

					//...code
				?>
			</div>
		<!-- MAIN END -->
		</div>
	</body>
</html>
