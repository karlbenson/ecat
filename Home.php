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
				<div class="container-fluid" style="color: #337ab7; text-shadow: 0px 0px 10px #ffffff;padding-bottom:15px;">
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

					$GRAND = $PC_TOT+$CSF_TOT+$SPO_IOL_SUM;


					$pesos = "₱ ";
				?>


				<!-- HOME -->
				<div class="container-fluid" id="basic" style=" background-color: rgba(74, 106, 21  ,0);">
					<div id="inner" style="margin:0px; padding:0px;">
						<!-- CONTENT -->
						<div class="container-fluid" style="margin:0px; padding:0px;">
							<div class="row" >
								<!-- RIGHT COLUMN -->
								<div class="container-fluid">
									<div style="min-width: 70%; max-width: 100%; float:left; margin:auto;">	
										<!-- CENTER SPACE: WHAT TO DO? -->
										<!-- TO BE CONSTRUCTED -->
										<div id="box" style="min-height:0px; margin:0px; background-color:#ffffff; float:left; width:100%;">
											<div>

												<div class="container-fluid" style="padding:20px 20px;">
													<p>Space for Graphs, etc...</p>
													<!-- TO BE CONSTRUCTED... FOR GRAPH... etc. -->
												</div>

												<div class="container-fluid" style="padding:20px 20px;">

													<div class="well" style="padding:15px; background-color:#337ab7; color:#ffffff; "><strong>Financial Report</strong>
														<h5>Running Total as of <?php echo date("M-Y"); ?></h5>
													</div>

													<div style="float:left; width:50%; padding-right:20px;">
													<div class="panel panel-default" style="padding-bottom:10px;">
														<div class="panel-heading" style="color:#337ab7;">Patient Counterpart</div>
														<div class="panel-body row" style="margin:0px; padding:5px 10px;">
															<div class="col-md-6" >Misc. Expenses</div>
															<div class="col-md-6"><?php echo ' '.$pesos.$PC_PF_SUM; ?></div>
														</div>
														<div class="row" style="margin:0px; padding:5px 10px;">
															<div class="col-md-6" >Laboratory</div>
															<div class="col-md-6"><?php echo ' '.$pesos.$PC_LAB_SUM; ?></div>
														</div>
														<div class="panel-body row" style="margin:0px; padding:5px 10px;">										<div class="col-md-6" >Intra Ocular Lens</div>
															<div class="col-md-6"><?php echo ' '.$pesos.$PC_IOL_SUM; ?></div>
														</div>
														<div class="panel-body row" style="margin:0px; padding:5px 10px;">
															<div class="col-md-6" ><b>Total</b></div>
															<div class="col-md-6"><b><?php echo ' '.$pesos.$PC_TOT; ?></b></div>
														</div>
													</div>
													</div>

													<div style="float:left; width:50%;">
													<div class="panel panel-default" style="padding-bottom:10px;">
														<div class="panel-heading" style="color:#337ab7;">Luke Foundation Counterpart</div>
														<div class="panel-body row" style="margin:0px; padding:5px 10px;">
															<div class="col-md-6" >Hospital Bill</div>
															<div class="col-md-6"><?php echo ' '.$pesos.$CSF_HBILL_SUM;?></div>
														</div>
														<div class="panel-body row" style="margin:0px; padding:5px 10px;">
															<div class="col-md-6" >Supplies</div>
															<div class="col-md-6"><?php echo ' '.$pesos.$CSF_SUPP_SUM;?></div>
														</div>
														<div class="panel-body row" style="margin:0px; padding:5px 10px;">
															<div class="col-md-6" >Laboratory</div>
															<div class="col-md-6"><?php echo ' '.$pesos.$CSF_LAB_SUM;?></div>
														</div>
														<div class="panel-body row" style="margin:0px; padding:5px 10px;">
															<div class="col-md-6" ><b>Total</b></div>
															<div class="col-md-6"><b><?php echo ' '.$pesos.$CSF_TOT;?></b></div>
														</div>
													</div>
													</div>

													<div style="float:left; width:40%; padding-right:20px;">
													<div class="panel panel-default" style="padding-bottom:10px;">
														<div class="panel-heading" style="color:#337ab7;">Sponsored Payment</div>
														<div class="panel-body row" style="margin:0px; padding:5px 10px;">
															<div class="col-md-3" >Intra Ocular Lens</div>
															<div class="col-md-3"><?php echo ' '.$pesos.$SPO_IOL_SUM; ?></div>
														</div>
													</div>
													</div>

													<div class="well" style="float:left; width:60%; background:#f9f9f9;">
														<div  style="float:left; width:100%; padding:10px; font-weight:bold;">
															<div style="width:50%; float:left;">Grand Total</div>
															<div style="width:50%; float:left;"><?php echo ' '.$pesos.$GRAND; ?></div>
														</div>
													</div>

													<div class="well" style="padding:15px; background-color:#337ab7; color:#ffffff; float:left; width:100%;"><strong>Patient Information</strong>
													</div>

													<div style="float:left; width:100%;">
													<div class="panel panel-default" style="padding-bottom:10px;">
														<div class="panel-heading" style="color:#337ab7;">Pre-Surgery Visual Acuity</div>
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
													</div>
													</div>

													<div style="float:left; width:100%;">
													<div class="panel panel-default" style="padding-bottom:10px;">
														<div class="panel-heading " style="color:#337ab7;">Post-Surgery Visual Acuity</div>
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

												<div class="container-fluid" style="padding:20px 20px;">
													<p>Space for Graphs, etc...</p>
													<!-- TO BE CONSTRUCTED... FOR GRAPH... etc. -->
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
