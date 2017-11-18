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
		<script src="charts/js/fusioncharts.js"></script>
		<script src="charts/js/fusioncharts.charts.js"></script>
		<script src="charts/js/themes/fusioncharts.theme.zune.js"></script>
		<!--<script src="charts/js/app.js"></script>-->
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

					<div style="display:none;">
						<form method="post" action="reportprev.php?printpage=print" id="reprep">
							<div class="form-group">
							<?php
							$reptype = $_POST['reptype'];
							$anestype = $_POST['anestype'];
							$phtype = $_POST['phtype'];
							$Year = $_POST['Year']
							?>
							
								<input name="reptype" value="<?php echo $reptype; ?>">
								<input name="anestype" value="<?php echo $anestype; ?>">
								<input name="phtype" value="<?php echo $phtype; ?>">
								<input name="Year" value="<?php echo $Year; ?>">
								<?php if(isset($_POST["Month"])){
									$Month_opt = $_POST['Month'];
									?>
									<input name="Month" value="<?php echo $Month_opt; ?>">
								<?php }
								if(isset($_POST["WO"])){
									$WO_opt = $_POST['WO'];
									?>
									<input name="WO" value="<?php echo $WO_opt; ?>">
								<?php }else{
									$W_opt = $_POST['W'];
									?>
									<input name="W" value="<?php echo $W_opt; ?>">
								<?php }
							?>
							</div>
						</form>
					</div>



				</div>
				<!-- TITLE END -->

				<?php
				
					include("dbconnect.php");	
					//MYSQL SECTION

					$curryear = $_POST['Year'];
					if($_POST['reptype']=="Yearly"){
						$selector=" OR";
						$currmonth = "1";
						$S_query = "SELECT * FROM SURGERY s, DOCTOR d where s.SURG_LICENSE_NUM = d.DOC_LICENSE_NUM  AND YEAR(SURG_DATE)=".$curryear." order by s.SURG_DATE desc";
					}else{
						$selector=" AND";
						$currmonth = $_POST['Month'];
						$S_query = "SELECT * FROM SURGERY s, DOCTOR d where s.SURG_LICENSE_NUM = d.DOC_LICENSE_NUM  AND YEAR(SURG_DATE)=".$curryear.$selector." MONTH(SURG_DATE)=".$currmonth." order by s.SURG_DATE desc";
					}

					//var_dump($_POST);

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
					$NDDCH_RA_SUM=0;
					$NDDCH_ZEISS_SUM=0;
					$NDDCH_SUPPLIES_SUM=0;
					$NDDCH_SUM=0;
					$LF_PF_SUM=0;
					$LF_CPC_SUM=0;
					$SPO_OTHERS_SUM=0;
					while($dataline = $output->fetch_assoc()) {
						$PC_PF_SUM=$PC_PF_SUM+$dataline["PC_PF"];
						$PC_LAB_SUM=$PC_LAB_SUM+$dataline["PC_LAB"];
						$PC_IOL_SUM=$PC_IOL_SUM+$dataline["PC_IOL"];
						$SPO_IOL_SUM=$SPO_IOL_SUM+$dataline["SPO_IOL"];
						$SPO_OTHERS_SUM=$SPO_OTHERS_SUM+$dataline["SPO_OTHERS"];
						$CSF_HBILL_SUM=$CSF_HBILL_SUM+$dataline["CSF_HBILL"];
						$CSF_SUPP_SUM=$CSF_SUPP_SUM+$dataline["CSF_SUPPLIES"];
						$CSF_LAB_SUM=$CSF_LAB_SUM+$dataline["CSF_LAB"];
						$NDDCH_RA_SUM=$NDDCH_RA_SUM+$dataline["NDDCH_RA"];
						$NDDCH_ZEISS_SUM=$NDDCH_ZEISS_SUM+$dataline["NDDCH_ZEISS"];
						$NDDCH_SUPPLIES_SUM=$NDDCH_SUPPLIES_SUM+$dataline["NDDCH_SUPPLIES"];
						$LF_PF_SUM=$LF_PF_SUM+$dataline["LF_PF"];
						$LF_CPC_SUM=$LF_CPC_SUM+$dataline["LF_CPC"];
					}
					//CONTENT END
					$PC_TOT=$PC_PF_SUM+$PC_LAB_SUM+$PC_IOL_SUM;
					$CSF_TOT=$CSF_HBILL_SUM+$CSF_LAB_SUM+$CSF_SUPP_SUM;
					$NDDCH_SUM = $NDDCH_RA_SUM+$NDDCH_ZEISS_SUM;
					$SPO_SUM = $SPO_IOL_SUM+$SPO_OTHERS_SUM;
					$GRAND = $PC_TOT+$CSF_TOT+$SPO_IOL_SUM;
					$pesos = "₱ ";
					$LF_SUM = $LF_CPC_SUM+$LF_PF_SUM;
					$DIFF =$NDDCH_SUPPLIES_SUM-$CSF_SUPP_SUM;
?>
					<div id="box" style="min-height:0px; margin:0px; background-color:#ffffff; float:left; width:100%;">
						<?php
					if(isset($_GET["printpage"])){
						echo '<div class="container-fluid" style="width:100%; float:left; margin:20px 0px 10px 0px;">
	<table class="table table-condensed table-bordered">
		<thead style="background-color:#f9f9f9;">
			<th colspan="7" style="text-align:center; padding:10px;">Financial Report</th>
		</thead>
  <tbody>
    <tr>
    		<th rowspan="2" colspan="2">PC</th>
      <th>Intraocular Lens</th>
      <th>Laboratory</th>
      <th>PF(Others)</th>
      <th colspan="2">Total</th>
    </tr>
    <tr>
      <td>₱ '.number_format($PC_IOL_SUM, "2").'</td>
      <td>₱ '.number_format($PC_LAB_SUM, "2").'</td>
      <td>₱ '.number_format($PC_PF_SUM, "2").'</td>
      <td colspan="2">'.number_format($PC_TOT, "2").'</td>
    </tr>
    <tr>
    		<th rowspan="2" colspan="2">CSF</th>
      <th>Hospital Bill</th>
      <th>Supplies</th>
      <th>Laboratory</th>
      <th colspan="2">Total</th>
    </tr>
    <tr>
      <td>₱ '.number_format($CSF_HBILL_SUM, "2").'</td>
      <td>₱ '.number_format($CSF_SUPP_SUM, "2").'</td>
      <td>₱ '.number_format($CSF_LAB_SUM, "2").'</td>
      <td colspan="2">'.number_format($CSF_TOT, "2").'</td>
    </tr>
    <tr>
    		<th rowspan="2" colspan="2">Sponsored</th>
      <th>Intraocular Lens</th>
      <th colspan="2">Others</th>
      <th colspan="2">Total</th>
    </tr>
    <tr>
      <td>₱ '.number_format($SPO_IOL_SUM, "2").'</td>
      <td colspan="2">₱ '.number_format($SPO_OTHERS_SUM, "2").'</td>
      <td colspan="2">'.number_format($SPO_SUM, "2").'</td>
    </tr>
    <tr>
    		<th rowspan="2" colspan="2">NDDCH</th>
      <th>RA</th>
      <th colspan="2">ZEISS</th>
      <th colspan="2">Total</th>
    </tr>
    <tr>
      <td>₱ '.number_format($NDDCH_RA_SUM, "2").'</td>
      <td colspan="2">₱ '.number_format($NDDCH_ZEISS_SUM, "2").'</td>
      <td colspan="2">'.number_format($NDDCH_SUM, "2").'</td>
    </tr>
    <tr>
    		<th rowspan="2" colspan="2">LF</th>
      <th>Professional Fee</th>
      <th colspan="2">CPC Fee</th>
      <th colspan="2">Total</th>
    </tr>
    <tr>
      <td>₱ '.number_format($LF_PF_SUM, "2").'</td>
      <td colspan="2">₱ '.number_format($LF_CPC_SUM, "2").'</td>
      <td colspan="2">'.number_format($LF_SUM, "2").'</td>
    </tr>
    <tr style="background-color:#f9f9f9;">
      <th colspan="5">Grand Total</th>
      <td colspan="2">'.number_format($GRAND, "2").'</td>
    </tr>
  </tbody>
 </table>
</div>

<div class="container-fluid" style="width:100%; float:left; margin:0px;">
	<table class="table table-condensed table-bordered">
		<thead style="background-color:#f9f9f9;">
			<th colspan="2" style="text-align:center; padding:10px;">Comparison</th>
		</thead>
  <tbody>
    <tr>
    		<th >NDDCH Supplies</th>
      <th >Difference</th>
    </tr>
    <tr>
      <td>₱ '.number_format($NDDCH_SUPPLIES_SUM, "2").'</td>
      <td>₱ '.number_format($DIFF, "2").'</td>

    </tr>
  </tbody>
 </table>
</div>


';

					}
					?>
						

<?php					//COMMA PORTION
					// $PC_PF_SUM=number_format($PC_PF_SUM, 2, ".", ",");
					// $PC_LAB_SUM=number_format($PC_LAB_SUM, 2, ".", ",");
					// $PC_IOL_SUM=number_format($PC_IOL_SUM, 2, ".", ",");
					// $SPO_IOL_SUM=number_format($SPO_IOL_SUM, 2, ".", ",");
					// $CSF_HBILL_SUM=number_format($CSF_HBILL_SUM, 2, ".", ",");
					// $CSF_SUPP_SUM=number_format($CSF_SUPP_SUM, 2, ".", ",");
					// $CSF_LAB_SUM=number_format($CSF_LAB_SUM, 2, ".", ",");
					// $PC_TOT=number_format($PC_TOT, 2, ".", ",");
					// $CSF_TOT=number_format($CSF_TOT, 2, ".", ",");
					// $GRAND=number_format($GRAND, 2, ".", ",");

					//END COMMA
				include("charts/fusioncharts.php");
				
				//PRELEFT
				
				$strQuery = "SELECT P.PRE_VA_NO_SPECT_LEFT, COUNT(*) AS freq FROM EYEPATIENT P,SURGERY S WHERE S.PAT_ID_NUM=P.PAT_ID_NUM AND YEAR(SURG_DATE)=".$curryear.$selector." MONTH(SURG_DATE)=".$currmonth." GROUP BY PRE_VA_NO_SPECT_LEFT";

				// Execute the query, or else return the error message.
				$result = $mydatabase->query($strQuery) or exit("Error code ({$mydatabase->errno}): {$mydatabase->error}");

				// If the query returns a valid response, prepare the JSON string
				if ($result) {
					// The `$arrData` array holds the chart attributes and data
					$arrData = array(
						"chart" => array(
						  "caption" => "Frequency of Pre Visual Acuity of Eye Patients (Left Eye)",
						  "showValues" => "1",
						  "theme" => "zune"
						)
					);

					$arrData["data"] = array();
					function takes_array($input){
						echo "$input[0] + $input[1] = ", $input[0]+$input[1];
					}
					// Push the data into the array
					while($row = mysqli_fetch_array($result)) {
						
						array_push($arrData["data"], array(
							"label" => $row[0],
							"value" => $row[1]
							)
						);
					}

					/*JSON Encode the data to retrieve the string containing the JSON representation of the data in the array. */

					$jsonEncodedData = json_encode($arrData);

					$columnChart = new FusionCharts("column2d", "myFirstChart" , 500, 300, "leftpre", "json", $jsonEncodedData);

					// Render the chart
					$columnChart->render();
				}
				
				//PRERIGHT
				
				$strQuery = "SELECT P.PRE_VA_NO_SPECT_RIGHT, COUNT(*) AS freq FROM EYEPATIENT P,SURGERY S WHERE S.PAT_ID_NUM=P.PAT_ID_NUM AND YEAR(SURG_DATE)=".$curryear.$selector." MONTH(SURG_DATE)=".$currmonth." GROUP BY PRE_VA_NO_SPECT_RIGHT";

				// Execute the query, or else return the error message.
				$result = $mydatabase->query($strQuery) or exit("Error code ({$mydatabase->errno}): {$mydatabase->error}");

				// If the query returns a valid response, prepare the JSON string
				if ($result) {
					// The `$arrData` array holds the chart attributes and data
					$arrData = array(
						"chart" => array(
						  "caption" => "Frequency of Pre Visual Acuity of Eye Patients (Right Eye)",
						  "showValues" => "1",
						  "theme" => "zune"
						)
					);

					$arrData["data"] = array();

					// Push the data into the array
					while($row = mysqli_fetch_array($result)) {
					array_push($arrData["data"], array(
						"label" => $row[0],
						"value" => $row[1]
						)
					);
					}

					/*JSON Encode the data to retrieve the string containing the JSON representation of the data in the array. */

					$jsonEncodedData = json_encode($arrData);

					$columnChart = new FusionCharts("column2d", "myFirstChart1" , 500, 300, "rightpre", "json", $jsonEncodedData);

					// Render the chart
					$columnChart->render();

				}
				
				//POSTLEFT
				
				$strQuery = "SELECT P.POST_VA_NO_SPECT_LEFT, COUNT(*) AS freq FROM EYEPATIENT P,SURGERY S WHERE S.PAT_ID_NUM=P.PAT_ID_NUM AND YEAR(SURG_DATE)=".$curryear.$selector." MONTH(SURG_DATE)=".$currmonth." GROUP BY POST_VA_NO_SPECT_LEFT";

				// Execute the query, or else return the error message.
				$result = $mydatabase->query($strQuery) or exit("Error code ({$mydatabase->errno}): {$mydatabase->error}");

				// If the query returns a valid response, prepare the JSON string
				if ($result) {
					// The `$arrData` array holds the chart attributes and data
					$arrData = array(
						"chart" => array(
						  "caption" => "Frequency of Post Visual Acuity of Eye Patients (Left Eye)",
						  "showValues" => "1",
						  "theme" => "zune"
						)
					);

					$arrData["data"] = array();

					// Push the data into the array
					while($row = mysqli_fetch_array($result)) {
					array_push($arrData["data"], array(
						"label" => $row[0],
						"value" => $row[1]
						)
					);
					}

					/*JSON Encode the data to retrieve the string containing the JSON representation of the data in the array. */

					$jsonEncodedData = json_encode($arrData);

					$columnChart = new FusionCharts("column2d", "myFirstChart2" , 500, 300, "leftpost", "json", $jsonEncodedData);

					// Render the chart
					$columnChart->render();
				}
				
				//POSTRIGHT
				
				$strQuery = "SELECT P.POST_VA_NO_SPECT_RIGHT, COUNT(*) AS freq FROM EYEPATIENT P,SURGERY S WHERE S.PAT_ID_NUM=P.PAT_ID_NUM AND YEAR(SURG_DATE)=".$curryear.$selector." MONTH(SURG_DATE)=".$currmonth." GROUP BY POST_VA_NO_SPECT_RIGHT";

				// Execute the query, or else return the error message.
				$result = $mydatabase->query($strQuery) or exit("Error code ({$mydatabase->errno}): {$mydatabase->error}");

				// If the query returns a valid response, prepare the JSON string
				if ($result) {
					// The `$arrData` array holds the chart attributes and data
					$arrData = array(
						"chart" => array(
						  "caption" => "Frequency of Post Visual Acuity of Eye Patients (Right Eye)",
						  "showValues" => "1",
						  "theme" => "zune"
						)
					);

					$arrData["data"] = array();

					// Push the data into the array
					while($row = mysqli_fetch_array($result)) {
					array_push($arrData["data"], array(
						"label" => $row[0],
						"value" => $row[1]
						)
					);
					}

					/*JSON Encode the data to retrieve the string containing the JSON representation of the data in the array. */

					$jsonEncodedData = json_encode($arrData);

					$columnChart = new FusionCharts("column2d", "myFirstChart3" , 500, 300, "rightpost", "json", $jsonEncodedData);

					// Render the chart
					$columnChart->render();
					
				}

				if(isset($_GET["printpage"])){
				?>
						
						<div  style="float:left; width:100%;">
							
							<div style="padding:20px;">
								<div><strong>I. </strong> Pre-Surgery Visual Acuity</div>
							</div>
								
									<div style="width:100%; float:left; text-align:center;">
									<div class="container-fluid" style="min-width: 750px;">
											<div id="leftpre" style="width:100%;"></div>
									</div>
									</div>

									<div class="page-break"></div>

									<div style="width:100%; float:left; text-align:center;">
									<div class="container-fluid" style="min-width: 750px; ">
											<div id="rightpre" style="width:100%;"></div>
									</div>
									</div>

							</div>



							<div  style="float:left; width:100%;">

							<div style="padding:20px;">
								<div><strong>II. </strong> Post-Surgery Visual Acuity</div>
							</div>
							
									
									<div style="width:100%; float:left; text-align:center;">
									<div class="container-fluid" style=" min-width: 750px; ">
										<div id="leftpost" style="width:100%;"></div>
									</div>
									</div>

									<div style="width:100%; float:left;  text-align:center;">
									<div class="container-fluid" style=" min-width: 750px; ">
										<div id="rightpost" style="width:100%;"></div>
									</div>
									</div>

							</div>
							
							

<?php
						echo '</div>';
				} else {
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

											<?php

											

												echo '<div class="container-fluid" style="padding:20px 20px;">

														<div class="well" style="width: 100%; float: left; color:#337ab7; font-weight:bold; text-align:center;">Financial Report as of ';
														 
														if($_POST['reptype']=="Yearly"){
															$dateName = date('Y', mktime(0, 0, 0, $currmonth,1, $curryear));
														}else{
															$dateName = date('M-Y', mktime(0, 0, 0, $currmonth,1, $curryear));
														}
														
														echo $dateName;
												echo 	'</div>';

											

												echo '<div style="width:100%;">
															<div style="width:50%; padding-right:20px; float:left;">
																<div class="well" style="background-color:#fefefe; float:left; padding:20px; width:100%;">
																	<div style="width:100%; float:left; padding:0px 0px;">

																		<table class="table table-condensed" style="margin-bottom:0px;">
																		<thead>
																			<tr>
																				<th>Patient Counterpart</th>
																				<th></th>
																			</tr>
																		</thead>
																		<tbody>
																			<tr>
																				<td>IOL</td>
																				<td>₱ '.number_format($PC_IOL_SUM, "2").'</td>
																			</tr>
																			<tr>
																				<td>LAB</td>
																				<td>₱ '.number_format($PC_LAB_SUM, "2").'</td>
																			</tr>
																			<tr>
																				<td>PF(others)</td>
																				<td>₱ '.number_format($PC_PF_SUM, "2").'</td>
																			</tr>
																			<tr>
																				<td>Total</td>
																				<td>₱ '.number_format($PC_TOT, "2").'</td>
																			</tr>
																		</tbody>
																	</table>

																	</div>
																</div>
															</div>
														

															<div style="width:50%; float:left;">
																<div class="well" style="background-color:#fefefe; float:left; padding:20px; width:100%;">

																	<div style="width:100%; float:left; padding:0px 0px;">
																	<table class="table table-condensed" style="margin-bottom:0px;">
																		<thead>
																			<tr>
																				<th>CSF</th>
																				<th></th>
																			</tr>
																		</thead>
																		<tbody>
																			<tr>
																				<td>Hospital Bill</td>
																				<td>₱ '.number_format($CSF_HBILL_SUM, "2").'</td>
																			</tr>
																			<tr>
																				<td>Supplies</td>
																				<td>₱ '.number_format($CSF_SUPP_SUM, "2").'</td>
																			</tr>
																			<tr>
																				<td>Laboratory</td>
																				<td>₱ '.number_format($CSF_LAB_SUM, "2").'</td>
																			</tr>
																			<tr>
																				<td>Total</td>
																				<td>₱ '.number_format($CSF_TOT, "2").'</td>
																			</tr>
																		</tbody>
																	</table>
																	</div>

																</div>
															</div>
														
														</div>

														<div style="width:50%; padding-right:20px; float:left;">
														
																<div class="well" style="background-color:#fefefe; float:left; padding:20px; width:100%;">
																	<div style="width:100%; float:left; padding:0px 0px;">

																		<table class="table table-condensed" style="margin-bottom:0px;">
																		<thead>
																			<tr>
																				<th>NDDCH</th>
																				<th></th>
																			</tr>
																		</thead>
																		<tbody>
																			<tr>
																				<td>RA</td>
																				<td>₱ '.number_format($NDDCH_RA_SUM, "2").'</td>
																			</tr>
																			<tr>
																				<td>ZEISS</td>
																				<td>₱ '.number_format($NDDCH_ZEISS_SUM, "2").'</td>
																			</tr>
																			<tr>
																				<td>Total</td>
																				<td>₱ '.number_format($NDDCH_SUM, "2").'</td>
																			</tr>
																		</tbody>
																	</table>

																	</div>
																</div>

																<div class="well" style="background-color:#fefefe; float:left; padding:20px; width:100%;">
																	<div style="width:100%; float:left; padding:0px 0px;">

																		<table class="table table-condensed" style="margin-bottom:0px;">
																		<thead>
																			<tr>
																				<th>Comparison</th>
																				<th></th>
																			</tr>
																		</thead>
																		<tbody>
																			<tr>
																				<td>NDDCH Supplies</td>
																				<td>₱ '.number_format($NDDCH_SUPPLIES_SUM, "2").'</td>
																			</tr>
																			<tr>
																				<td>Difference</td>
																				<td>₱ '.number_format($DIFF, "2").'</td>
																			</tr>
																		</tbody>
																	</table>

																	</div>
																</div>

															</div>
														

															<div style="width:50%; float:left;">

																<div class="well" style="background-color:#fefefe; width:100%; float:left; padding:10px;">
																	<div style="margin:0px; padding:0px 10px;">	
																		
																		<div style="width:100%; float:left; padding:0px 0px;">
																			<table class="table table-condensed" style="margin-bottom:0px;">
																				<thead>
																					<tr>
																						<th>Sponsored</th>
																						<th></th>
																					</tr>
																				</thead>
																				<tbody>
																					<tr>
																						<td>IOL</td>
																						<td>₱ '.number_format($SPO_IOL_SUM, "2").'</td>
																					</tr>
																					<tr>
																						<td>Others</td>
																						<td>₱ '.number_format($SPO_OTHERS_SUM, "2").'</td>
																					</tr>
																					<tr>
																						<td>Total</td>
																						<td>₱ '.number_format($SPO_SUM, "2").'</td>
																					</tr>
																				</tbody>
																			</table>
																		</div>

																	</div>
																</div>

																<div class="well" style="background-color:#fefefe; float:left; padding:20px; width:100%;">
																	<div style="width:100%; float:left; padding:0px 0px;">

																	<table class="table table-condensed" style="margin-bottom:0px;">
																		<thead>
																			<tr>
																				<th>LF</th>
																				<th></th>
																			</tr>
																		</thead>
																		<tbody>
																			<tr>
																				<td>Professional Fee</td>
																				<td>₱ '.number_format($LF_PF_SUM, "2").'</td>
																			</tr>
																			<tr>
																				<td>CPC Fee</td>
																				<td>₱ '.number_format($LF_CPC_SUM, "2").'</td>
																			</tr>
																			<tr>
																				<td>Total</td>
																				<td>₱ '.number_format($LF_SUM, "2").'</td>
																			</tr>
																		</tbody>
																	</table>

																	</div>
																</div>
																</div>

																<div class="well" style=" float:left; padding:20px; width:100%;">
																		<div style="width:100%; float:left; padding:4px 0px;">

																			<div style="float:left; width:50%; font-weight:bold;">Grand Total:</div>
																			<div style="float:left; width:50%;">₱ '.number_format($GRAND, "2").'</div>

																		</div>
																</div>';
													


													?>


													<div  style="float:left; width:100%;">
													<div class="panel panel-default" style="padding-bottom:10px; ">
														<div class="panel-heading" style="color:#337ab7;">Pre-Surgery Visual Acuity</div>
														<div class="panel-body" style="margin:0px; padding:5px 10px; width:100%;">
															
															<div style="padding-right:20px; float:left; text-align:center;">
															<div class="container-fluid" style="width: 450px;">
																	<div id="leftpre" style="width:100%;"></div>
															</div>
															</div>

															<div style="padding-right:10px; float:left; text-align:center; width:50%;">
															<div class="container-fluid" style="width: 450px; ">
																	<div id="rightpre" style="width:100%;"></div>
															</div>
															</div>
																	
														</div>
													</div>
													</div>

													<div  style="float:left; width:100%;">
													<div class="panel panel-default" style="padding-bottom:10px;">
														<div class="panel-heading " style="color:#337ab7;">Post-Surgery Visual Acuity</div>
														<div class="panel-body" style="margin:0px; padding:5px 10px; width:100%;">
															
															<div style="padding-right:20px; float:left; text-align:center;">
															<div class="container-fluid" style="width: 450px; ">
																<div id="leftpost" style="width:100%;"></div>
															</div>
															</div>

															<div style="padding-right:10px; float:left;  text-align:center; width:50%;">
															<div class="container-fluid" style="width: 450px; ">
																<div id="rightpost" style="width:100%;"></div>
															</div>
															</div>

														</div>
													</div>
													</div>

													

													<div style="float:left; width:100%; padding-top:10px;" id="hidethis">
													<div class="well" style="padding:15px; background-color:#337ab7; color:#ffffff; float:left; width:100%; margin:0px;"><strong>Financial Information by Type of Anesthesia and Philhealth</strong>
													</div>
													
													<div style="float:left; width:100%;">
													<?php
													
											//GENERAL ANESTHESIA
											//MYSQL SECTION
													echo '<div style="width:100%;">';
											if($_POST["anestype"]=="Gen"){
												$S_query = "SELECT * FROM SURGERY s, DOCTOR d, EYEPATIENT p WHERE s.SURG_LICENSE_NUM = d.DOC_LICENSE_NUM AND p.PAT_ID_NUM = s.PAT_ID_NUM AND s.SURG_ANESTHESIA='General' ORDER by s.SURG_DATE desc";
												echo '<br/><div class="panel panel-default" style="margin-top:0px width:100%;"><div class="panel-heading " style="color:#337ab7;">General Anesthesia (<a href="excel.php?gen=y&curryear='.$curryear.'&currmonth='.$currmonth.'">Download .xls</a>)</div>';
											}else{
												$S_query = "SELECT * FROM SURGERY s, DOCTOR d, EYEPATIENT p WHERE s.SURG_LICENSE_NUM = d.DOC_LICENSE_NUM AND p.PAT_ID_NUM = s.PAT_ID_NUM AND s.SURG_ANESTHESIA='Local' ORDER by s.SURG_DATE desc";
												echo '<br/><div class="panel panel-default" style="margin-top:0px; width:100%;"><div class="panel-heading " style="color:#337ab7;">Local Anesthesia (<a href="excel.php?gen=n&curryear='.$curryear.'&currmonth='.$currmonth.'">Download .xls</a>)</div>';
											}
											$output = $mydatabase->query($S_query);
											//MYSQL SECTION END
        
												//FILTER END
												//MAIN PAGE
												if ($output->num_rows>0) {
													echo '<div class="panel-body" style="margin:0px; padding:0px;">
														<table id="docdat" class="table table-striped row" style="float:left; width:100%;padding:0px;margin:0px;">
															<thead>
																<tr id="tophead">
																<td style="color:#ffffff">Case No.</td>
																<td style="color:#ffffff">Patient</td>
																<td style="color:#ffffff">IOL</td>
																<td style="color:#ffffff">Lab</td>
																<td style="color:#ffffff">Prof. Fee</td>
																<td style="color:#ffffff">Total PC</td>
																<td style="color:#ffffff">Spons. IOL</td>
																<td style="color:#ffffff">Other Spons.</td>
																<td style="color:#ffffff">Totals Spons.</td>
																<td style="color:#ffffff">Hosp. Bill</td>
																<td style="color:#ffffff">Suppl.</td>
																<td style="color:#ffffff">Lab</td>
																<td style="color:#ffffff">Total CSF</td>
																<td style="color:#ffffff">NDDCH RA</td>
																<td style="color:#ffffff">NDDCH ZEISS</td>
																<td style="color:#ffffff">NDDCH Total</td>
																<td style="color:#ffffff">Total</td>
																</tr>
															</thead>';
													$PC_COL_SUM = 0;
													$CSF_COL_SUM = 0;
													$ROW_COL_SUM = 0;
													$SPO_COL_SUM = 0;
													$NDDCH_COL_SUM = 0;
													while($dataline = $output->fetch_assoc()) { 
														$PC_SUM = $dataline["PC_IOL"]+$dataline["PC_LAB"]+$dataline["PC_PF"]+0.0;
														$CSF_SUM = $dataline["CSF_HBILL"]+$dataline["CSF_SUPPLIES"]+$dataline["CSF_LAB"]+0.0;
														$ROW_SUM = $CSF_SUM+$PC_SUM+$dataline["SPO_IOL"]+0.0;
														$SPO_SUM = $dataline["SPO_IOL"]+$dataline["SPO_OTHERS"];
														$NDDCH_SUM = $dataline["NDDCH_ZEISS"]+$dataline["NDDCH_RA"];
														$PC_COL_SUM = $PC_COL_SUM+$PC_SUM;
														$SPO_COL_SUM = $SPO_COL_SUM+$SPO_SUM;
														$CSF_COL_SUM = $CSF_COL_SUM+$CSF_SUM;
														$ROW_COL_SUM = $ROW_COL_SUM+$ROW_SUM;
														$NDDCH_COL_SUM = $NDDCH_COL_SUM+$NDDCH_SUM;
														echo 	'<tr>
																	<td>'.$dataline["CASE_NUM"].'</td>
																	<td>'.$dataline["PAT_FNAME"].' '.$dataline["PAT_LNAME"].'</td>
																	<td>'.$dataline["PC_IOL"].'</	td>
																	<td>'.$dataline["PC_LAB"].'</td>
																	<td>'.$dataline["PC_PF"].'</td>
																	<td>'.$PC_SUM.'</td>
																	<td>'.$dataline["SPO_IOL"].'</td>
																	<td>'.$dataline["SPO_OTHERS"].'</td>
																	<td>'.$SPO_SUM.'</td>
																	<td>'.$dataline["CSF_HBILL"].'</td>
																	<td>'.$dataline["CSF_SUPPLIES"].'</td>
																	<td>'.$dataline["CSF_LAB"].'</td>
																	<td>'.$CSF_SUM.'</td>
																	<td>'.$dataline["NDDCH_RA"].'</td>
																	<td>'.$dataline["NDDCH_ZEISS"].'</td>
																	<td>'.$NDDCH_SUM.'</td>
																	<td>'.$ROW_SUM.'</td>
																</tr>';
													}
													echo 	'<tr>
																<td colspan="5"><b>Total</b></td>
																<td><b>'.$PC_COL_SUM.'</b></td>
																<td><b>'.$dataline["SPO_IOL"].'</b></td>
																<td><b>'.$dataline["SPO_OTHERS"].'</b></td>
																<td><b>'.$SPO_COL_SUM.'</b></td>
																<td><b>'.$dataline["CSF_HBILL"].'</b></td>
																<td><b>'.$dataline["CSF_SUPPLIES"].'</b></td>
																<td><b>'.$dataline["CSF_LAB"].'</b></td>
																<td><b>'.$CSF_COL_SUM.'</b></td>
																<td colspan="2"></td>
																<td>'.$NDDCH_COL_SUM.'</td>
																<td><b>'.$ROW_COL_SUM.'</b></td>
															</tr>';
													echo	'</tbody>
														</table></div>
													</div></div>';
												} else {
													echo '<div class="container-fluid" style="padding:20px;">No Records.</div></div>';
												}
												//MAIN PAGE END

												
												if($_POST["phtype"]=="W"){
													$S_query = "SELECT * FROM SURGERY s, DOCTOR d, EYEPATIENT p WHERE s.SURG_LICENSE_NUM = d.DOC_LICENSE_NUM AND p.PAT_ID_NUM = s.PAT_ID_NUM AND p.PAT_PH='Y' ORDER by s.SURG_DATE desc";
													echo '<div class="panel panel-default" style="width:100%;"><div class="panel-heading " style="color:#337ab7;">With Philhealth (<a href="excel.php?ph=y&curryear='.$curryear.'&currmonth='.$currmonth.'">Download .xls</a>)</div>';
												}else if($_POST["phtype"]=="WO"){
													$S_query = "SELECT * FROM SURGERY s, DOCTOR d, EYEPATIENT p WHERE s.SURG_LICENSE_NUM = d.DOC_LICENSE_NUM AND p.PAT_ID_NUM = s.PAT_ID_NUM AND AND p.PAT_PH='N' ORDER by s.SURG_DATE desc";
													echo '<div class="panel panel-default" style="width:100%;"><div class="panel-heading " style="color:#337ab7;">Without Philhealth (<a href="excel.php?ph=n&curryear='.$curryear.'&currmonth='.$currmonth.'">Download .xls</a>)</div>';
												}

												//WITH PHILHEALTH
											//MYSQL SECTION
											$output = $mydatabase->query($S_query);
											//MYSQL SECTION END
        
												//FILTER END
												//MAIN PAGE
												if ($output->num_rows>0) {
													echo '<div class="panel-body" style="margin:0px; padding:0px;">
														<table id="docdat" class="table table-striped" style="float:left;width:100%;padding:0px; margin:0px;">
															<thead>
																<tr id="tophead">
																<td style="color:#ffffff">Case No.</td>
																<td style="color:#ffffff">Patient</td>
																<td style="color:#ffffff">IOL</td>
																<td style="color:#ffffff">Lab</td>
																<td style="color:#ffffff">Prof. Fee</td>
																<td style="color:#ffffff">Total PC</td>
																<td style="color:#ffffff">Spons. IOL</td>
																<td style="color:#ffffff">Other Spons.</td>
																<td style="color:#ffffff">Totals Spons.</td>
																<td style="color:#ffffff">Hosp. Bill</td>
																<td style="color:#ffffff">Suppl.</td>
																<td style="color:#ffffff">Lab</td>
																<td style="color:#ffffff">Total CSF</td>
																<td style="color:#ffffff">NDDCH RA</td>
																<td style="color:#ffffff">NDDCH ZEISS</td>
																<td style="color:#ffffff">NDDCH Total</td>
																<td style="color:#ffffff">Total</td>
																</tr>
															</thead>';
													$PC_COL_SUM = 0;
													$CSF_COL_SUM = 0;
													$ROW_COL_SUM = 0;
													$SPO_COL_SUM = 0;
													$NDDCH_COL_SUM = 0;
													while($dataline = $output->fetch_assoc()) { 
														$PC_SUM = $dataline["PC_IOL"]+$dataline["PC_LAB"]+$dataline["PC_PF"]+0.0;
														$CSF_SUM = $dataline["CSF_HBILL"]+$dataline["CSF_SUPPLIES"]+$dataline["CSF_LAB"]+0.0;
														$ROW_SUM = $CSF_SUM+$PC_SUM+$dataline["SPO_IOL"]+0.0;
														$SPO_SUM = $dataline["SPO_IOL"]+$dataline["SPO_OTHERS"];
														$NDDCH_SUM = $dataline["NDDCH_ZEISS"]+$dataline["NDDCH_RA"];
														$PC_COL_SUM = $PC_COL_SUM+$PC_SUM;
														$SPO_COL_SUM = $SPO_COL_SUM+$SPO_SUM;
														$CSF_COL_SUM = $CSF_COL_SUM+$CSF_SUM;
														$ROW_COL_SUM = $ROW_COL_SUM+$ROW_SUM;
														$NDDCH_COL_SUM = $NDDCH_COL_SUM+$NDDCH_SUM;
														echo 	'<tr>
																	<td>'.$dataline["CASE_NUM"].'</td>
																	<td>'.$dataline["PAT_FNAME"].' '.$dataline["PAT_LNAME"].'</td>
																	<td>'.$dataline["PC_IOL"].'</	td>
																	<td>'.$dataline["PC_LAB"].'</td>
																	<td>'.$dataline["PC_PF"].'</td>
																	<td>'.$PC_SUM.'</td>
																	<td>'.$dataline["SPO_IOL"].'</td>
																	<td>'.$dataline["SPO_OTHERS"].'</td>
																	<td>'.$SPO_SUM.'</td>
																	<td>'.$dataline["CSF_HBILL"].'</td>
																	<td>'.$dataline["CSF_SUPPLIES"].'</td>
																	<td>'.$dataline["CSF_LAB"].'</td>
																	<td>'.$CSF_SUM.'</td>
																	<td>'.$dataline["NDDCH_RA"].'</td>
																	<td>'.$dataline["NDDCH_ZEISS"].'</td>
																	<td>'.$NDDCH_SUM.'</td>
																	<td>'.$ROW_SUM.'</td>
																</tr>';
													}
													echo 	'<tr>
																<td colspan="5"><b>Total</b></td>
																<td><b>'.$PC_COL_SUM.'</b></td>
																<td><b>'.$dataline["SPO_IOL"].'</b></td>
																<td><b>'.$dataline["SPO_OTHERS"].'</b></td>
																<td><b>'.$SPO_COL_SUM.'</b></td>
																<td><b>'.$dataline["CSF_HBILL"].'</b></td>
																<td><b>'.$dataline["CSF_SUPPLIES"].'</b></td>
																<td><b>'.$dataline["CSF_LAB"].'</b></td>
																<td><b>'.$CSF_COL_SUM.'</b></td>
																<td colspan="2"></td>
																<td>'.$NDDCH_COL_SUM.'</td>
																<td><b>'.$ROW_COL_SUM.'</b></td>
															</tr>';
													echo	'</tbody>
														</table></div>
													</div>';

													

												} else {
													echo '<div class="container-fluid" style="padding:20px;">No Records.</div>';
												}
												//MAIN PAGE END

												

													$mydatabase->close();
													
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
					<?php } ?>
				</div>
				<!-- HOME END -->
			</div>
			<!-- MAIN END -->
		</div>
	</body>
</html>
