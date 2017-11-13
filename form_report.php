<!DOCTYPE html>
<html>
	<head>
		<title>Luke Foundation Eye Program: Doctor Form</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="refresh" content="100000" > 
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
		<?php include("nav.php");?>
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


				include("dbconnect.php");	
					//MYSQL SECTION
				$S_query = "SELECT SURG_DATE FROM SURGERY order by SURG_DATE asc LIMIT 1";
				$output = $mydatabase->query($S_query);	
				$year= array();
				$month = array("January","February","March","April","May","June","July","August","September","October","November","December");
				$maxyear=0;
				$minyear=1980;
				$maxyear=date("Y");
				while($dataline = $output->fetch_assoc()) {
					$minyear = explode("-", $dataline["SURG_DATE"])[0];
				}
				//echo $minyear;
				while($minyear!=$maxyear){
					array_push($year, $minyear);
					$minyear++;
				}
				?>

				<!-- DOCTORS FORM -->
				<div class="container-fluid" id="basic" style="padding-top: 10px;">
					<div id="inner">
						<!-- CONTENT -->
						<div class="container-fluid">
							<!-- FORMS -->
							<div class="container-fluid">
								<h3>Report Information</h3>
								<hr style="">
								<form method="post" action="reportprev.php" >
									
									<div class="form-group row" style="width:100%; float:left; margin:5px;">
										<label class="control-label col-md-3" style="float:left; width:250px;">Type of Report</label>
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
									<div class="form-group row" style="width:100%; float:left; margin:5px;">
										<label class="control-label col-md-3" for="Year" style="float:left; width:250px;">Year</label>
										<div class="col-md-4" style="width: 250px; float: left;">
											<select type="text" name="Year" class="form-control" id="year" disabled>
												<option value = "">Select Year</option>
												<?php
													for ($i=0; $i < sizeof($year); $i++){
														echo '<option value="'.$year[$i].'">'.$year[$i].'</option>';
													}
												 ?>
											</select>
										</div>
									</div>
									<div class="form-group row" style="width:100%; float:left; margin:5px;">
										<label class="control-label col-md-3" for="Month" style="float:left; width:250px;">Month</label>
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
									
									<div class="form-group row" style="width:100%; float:left; margin:5px;">
										<label class="control-label col-md-3" style="float:left; width:250px;">Type of Anesthesia</label>
										<div class="col-md-7" style="float: left">
											<!-- YEARLY -->
											<div style="width: 175px; float: left; margin-right:10px;">
													<label  for="anestype" class="radio-inline" required ><input type="radio" name="anestype"  value="Gen" style="float: left;"> 
													General</label>
													<label  for="anestype" class="radio-inline" required ><input type="radio" name="anestype" value="Monthly" > 
													Local</label><br>
											</div>
											<!-- YEARLY END -->
										</div>
									</div>

									<div class="form-group row" style="width:100%; float:left; margin:5px;">
										<label class="control-label col-md-3" style="float:left; width:250px;">Patient Philhealth</label>
										<div class="col-md-7" style="float: left">
											<!-- YEARLY -->
											<div style="width: 500px; float: left; margin-right:10px;">
													<label  for="phtype" class="radio-inline" required ><input type="radio" name="phtype"  value="W" style="float: left;"> 
													With Philhealth</label>
													<label  for="phtype" class="radio-inline" required ><input type="radio" name="phtype" value="WO"> 
													Without Philhealth</label><br>
											</div>
											<!-- YEARLY END -->
										</div>
									</div>
				 
									<!-- ENTER -->
									<div style="padding:10px 20px 20px 20px; text-align:center; float:left; width:100%;">
									<button type="submit" class="btn" id="go" name="doctors_info">Generate</button>
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
