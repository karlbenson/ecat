<!DOCTYPE html>
<html>
	<head>
		<title>Luke Foundation Eye Program: Home</title>
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
				<div class="container-fluid" style="color: #ffffff;">
					<h4>Eye Program</h4>
				</div>
				<!-- TITLE END -->

				<?php
					include("dbconnect.php");	
					//MYSQL SECTION
					$currmonth = date("m");
					$S_query = "SELECT * FROM SURGERY s, DOCTOR d where s.SURG_LICENSE_NUM = d.DOC_LICENSE_NUM order by s.SURG_DATE desc";
					$output = $mydatabase->query($S_query);	
					//MYSQL SECTION END
					//CONTENT
					$prearray = array();
					$PC_PF_SUM=0;
					$PC_LAB_SUM=0;
					$PC_IOL_SUM=0;
					$SPO_IOL_SUM=0;
					$CSF_HBILL_SUM=0;
					$CSF_SUPP_SUM=0;
					$CSF_LAB_SUM=0;
					while($dataline = $output->fetch_assoc()) {
						echo '<li class="list-group-item">';
						echo '<div class="row">';
						$PC_PF_SUM=$PC_PF_SUM+$dataline["PC_PF"];
						$PC_LAB_SUM=$PC_LAB_SUM+$dataline["PC_LAB"];
						$PC_IOL_SUM=$PC_IOL_SUM+$dataline["PC_IOL"];
						$SPO_IOL_SUM=$SPO_IOL_SUM+$dataline["SPO_IOL"];
						$CSF_HBILL_SUM=$CSF_HBILL_SUM+$dataline["CSF_HBILL"];
						$CSF_SUPP_SUM=$CSF_SUPP_SUM+$dataline["CSF_SUPPLIES"];
						$CSF_LAB_SUM=$CSF_LAB_SUM+$dataline["CSF_LAB"];
					}
					//CONTENT END
					$PC_TOT=$PC_PF_SUM+$PC_LAB_SUM+$PC_IOL_SUM;
					$CSF_TOT=$CSF_HBILL_SUM+$CSF_LAB_SUM+$CSF_SUPP_SUM;
				?>

				<!-- HOME -->
				<div class="container-fluid" id="basic" style="padding-top: 10px; background-color: rgba(74, 106, 21  ,0);">
					<div id="inner">
						<!-- CONTENT -->
						<div class="container-fluid" >
							<div class="row" >
								<!-- RIGHT COLUMN -->
								<div class="container-fluid">
									<div style="min-width: 70%; max-width: 100%; float:left; margin:auto;">	
										<!-- CENTER SPACE: WHAT TO DO? -->
										<!-- TO BE CONSTRUCTED -->
										<div id="box" style="min-height:0px; margin:0px; background-color:#ffffff; float:left; width:100%; ">
											<div>
												<div class="container-fluid">
													<h3>Monthly Report (<?php echo date("M-Y"); ?>)</h3>
													<div class="panel panel-default" style="padding-bottom:10px;">
														<div class="panel-heading" id="tophead">Financial Information</div>
														&nbsp;
														<div class="panel-heading" id="tophead1">Patient Counterpart</div>
														<div class="panel-body row" style="margin:0px; padding:5px 10px;">
															<div class="col-md-3" >Misc. Expenses</div>
															<div class="col-md-3"><?php echo ' '.$PC_PF_SUM.'.00'; ?></div>
														</div>
														<div class="panel-body row" style="margin:0px; padding:5px 10px;">
															<div class="col-md-3" >Laboratory</div>
															<div class="col-md-3"><?php echo ' '.$PC_LAB_SUM.'.00'; ?></div>
														</div>
														<div class="panel-body row" style="margin:0px; padding:5px 10px;">															<div class="col-md-3" >Intra Ocular Lens</div>
															<div class="col-md-3"><?php echo ' '.$PC_IOL_SUM.'.00'; ?></div>
														</div>
														<div class="panel-body row" style="margin:0px; padding:5px 10px;">
															<div class="col-md-3" ><b>Total</b></div>
															<div class="col-md-3"><b><?php echo ' '.$PC_TOT.'.00'; ?></b></div>
														</div>
														&nbsp;
														<div class="panel-heading" id="tophead1">Sponsored</div>
														<div class="panel-body row" style="margin:0px; padding:5px 10px;">
															<div class="col-md-3" >Intra Ocular Lens</div>
															<div class="col-md-3"><?php echo ' '.$SPO_IOL_SUM.'.00'; ?></div>
														</div>
														&nbsp;
														<div class="panel-heading" id="tophead1">Luke Foundation Counterpart</div>
														<div class="panel-body row" style="margin:0px; padding:5px 10px;">
															<div class="col-md-3" >Hospital Bill</div>
															<div class="col-md-3"><?php echo ' '.$CSF_HBILL_SUM.'.00';?></div>
														</div>
														<div class="panel-body row" style="margin:0px; padding:5px 10px;">
															<div class="col-md-3" >Supplies</div>
															<div class="col-md-3"><?php echo ' '.$CSF_SUPP_SUM.'.00';?></div>
														</div>
														<div class="panel-body row" style="margin:0px; padding:5px 10px;">
															<div class="col-md-3" >Laboratory</div>
															<div class="col-md-3"><?php echo ' '.$CSF_LAB_SUM.'.00';?></div>
														</div>
														<div class="panel-body row" style="margin:0px; padding:5px 10px;">
															<div class="col-md-3" ><b>Total</b></div>
															<div class="col-md-3"><b><?php echo ' '.$CSF_TOT.'.00';?></b></div>
														</div>
													</div>
													<div class="panel panel-default" style="padding-bottom:10px;">
														<div class="panel-heading" id="tophead">Patient Information</div>
														&nbsp;
														<div class="panel-heading" id="tophead1">Pre-Surgery Visual Acuity</div>
														<div class="panel-body row" style="margin:0px; padding:5px 10px;">
															<?php
																$S_query = "SELECT PRE_VA_WITH_SPECT_LEFT, COUNT(*) AS freq FROM EYEPATIENT GROUP BY PRE_VA_WITH_SPECT_LEFT";
																$output = $mydatabase->query($S_query);	
																while($row = $output->fetch_row()){
																	echo ' <div class="col-md-2" >'.$row[0].'</div>';
																	echo ' <div class="col-md-2" >'.$row[1].'</div>';
																}
															?>
														</div>
														<div class="panel-heading " id="tophead1">Post-Surgery Visual Acuity</div>
														<div class="panel-body row" style="margin:0px; padding:5px 10px;">
															<?php
																$S_query = "SELECT POST_VA_WITH_SPECT_LEFT, COUNT(*) AS freq FROM EYEPATIENT GROUP BY POST_VA_WITH_SPECT_LEFT";
																$output = $mydatabase->query($S_query);	
																while($row = $output->fetch_row()){
																	echo ' <div class="col-md-2" >'.$row[0].'</div>';
																	echo ' <div class="col-md-2" >'.$row[1].'</div>';
																}
															?>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<!-- RIGHT COLUMN END -->
							</div>
						</div>
						<!-- CONTENT END -->
					</div>
				</div>
				<!-- HOME END -->
			</div>
			<!-- MAIN END -->
		</div>
	</body>
</html>