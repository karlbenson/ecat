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
		<script type="text/javascript">
			function toggleYear(){
				document.getElementById("year").removeAttribute("disabled"); 
				document.getElementById("month").setAttribute("disabled","");
			}
			function toggleMonth(){
				document.getElementById("month").removeAttribute("disabled"); 
			}
		</script>
	</head>
	<body style="justify-content: center;" onload="toggleYear()">
		<!-- HEAD AND NAVIGATION -->
		<?php include("nav.php"); ?>
		<!-- HEAD AND NAVIGATION END -->

		<div id="body">
			<!-- MAIN -->
			<div class="container-fluid" id="outer">
				<!-- TITLE -->
				<div class="container-fluid" style="color: #337ab7; text-shadow: 0px 0px 10px #ffffff; margin-bottom: 10px;">
					<h4>Eye Program: Report Generator</h4> 
				</div>
				<!-- TITLE -->

				<?php
$year = array("2017","2016","2015","2014","2013","2012");
$month = array("January","February","March","April","May","June","July","August","September","October","November","December");
?>

				<!-- DOCTORS FORM -->
				<div class="container-fluid" id="basic" style="padding-top: 10px;">
					<div id="inner">
						<!-- CONTENT -->
						<div class="container-fluid">
							<!-- FORMS -->
							<div class="container-fluid">
								<h3>Report Information</h3>
								<hr>
								<form method="post" action="reportprev.php" >
									
									<div class="form-group row">
										<label class="control-label col-md-2" style="float:left; width:170px;">Type of Report</label>
										<div class="col-md-7" style="float: left">
											<!-- YEARLY -->
											<div style="width: 175px; float: left; margin-right:10px;">
													<label  for="reptype" class="radio-inline" required ><input type="radio" name="reptype"  value="Yearly" onClick="toggleYear()" style="float: left;"> 
													Yearly</label>
													<label  for="reptype" class="radio-inline" required ><input type="radio" name="reptype" value="Monthly" onClick="toggleYear();toggleMonth()"> 
													Monthly</label><br>
											</div>
											<!-- YEARLY END -->
										</div>
									</div>
									<div class="form-group row">
										<label class="control-label col-md-2" for="Year" style="float:left; width:170px;">Year</label>
										<div class="col-md-4" style="width: 250px; float: left;">
											<select type="text" name="Year" class="form-control" id="year" disabled>
												<option value = "">Select Year</option>
												<?php
													for ($i=0; $i < 4; $i++){
														echo '<option value="'.$year[$i].'">'.$year[$i].'</option>';
													}
												 ?>
											</select>
										</div>
									</div>
									<div class="form-group row">
										<label class="control-label col-md-2" for="Month" style="float:left; width:170px;">Month</label>
										<div class="col-md-4" style="width: 250px; float: left;">
											<select type="text" name="Month" class="form-control" id="month" disabled>
												<option value = "">Select Month</option>
												 <?php
													for ($i=1; $i <= 12; $i++){
														echo '<option value="'.$i.'">'.$month[$i-1].'</option>';
													}
												 ?>
											</select>
										</div>
									</div>
										
										<select id="year" hidden>
										 <?php
											for ($i=0; $i < 4; $i++){
												echo '<option value="'.$year[$i].'">'.$year[$i].'</option>';
											}
										 ?>
										</select> 
										
										 <select id="month" hidden>
										 <?php
											for ($i=1; $i <= 12; $i++){
												echo '<option value="'.$i.'">'.$month[$i-1].'</option>';
											}
										 ?>
										</select> <br/>
				 
									<!-- ENTER -->
									<div style="margin-bottom: 20px;">
										<button type="submit" class="btn" id="go" name="doctors_info" onClick="toggleMonth()">Generate</button>
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
