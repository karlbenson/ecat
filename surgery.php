<!DOCTYPE html>

<html>
	<head>
		<title>Luke Foundation Eye Program: Surgery</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" media="screen" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" />
		<link rel="stylesheet" href="references/bootstrap.min.css">
		<link rel="stylesheet" href="references/typeahead.css">
		<link rel="stylesheet" href="references/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="theme2.css">
		<link rel="stylesheet" href="references/bootstrap-datetimepicker.css">
		<script src="references/jquery-2.1.1.min.js"></script>
		<script src="references/bootstrap.min.js"></script>
		<script src="references/moment-with-locales.js"></script>
		<script src="references/bootstrap-datetimepicker.js"></script>
		<script src="references/typeahead.bundle.js"></script>
	</head>
	<body style="justify-content: center;">
		<!-- HEAD AND NAVIGATION -->
		<?php include("nav.php"); ?>
		<!-- HEAD AND NAVIGATION END -->
		<div id="body">
			<!-- MAIN -->
			<div class="container-fluid" id="outer">
				<?php //CODE SECTION STARTS HERE
					//ESTABLISHING MYSQL LINK (1)
					include("dbconnect.php");
					//ESTABLISHING MYSQL LINK END (1)

					//MAX VAUES
					$CASE_LENG = 10;
					$SURG_LENG = 7;
					$ID_LENG = 15;
					$VI_MAX = 100;
					$HIST_MAX = 100;
					$TANES_MAX = 25;
					$DIAG_MAX = 100;
					$SURGADD_MAX = 50;
					$SURG_DATE_YY = 4; 
					$SURG_DATE_DD = 2;
					$REM_MAX = 100;
					$INTER_MAX = 40;
					$ANEST_MAX = 40;
					$IOL_MAX = 20;
					$PC_MAX = 10;
					$MONTH_choice = array("January","Febuary","March","April","May","June","July","August","September","October","November","December");
					//MAX VALUES END

					//CODE SECTION ENDS HERE
				?>

				<!-- SURGERIES -->
				<div class="container-fluid" id="basic" >
					<div id="inner">
						<!-- TITLE -->
						<div class="container-fluid" >
							<h4 style="color:#337ab7;">Eye Surgeries</h4>
						</div>

						<!-- TITLE -->

						<!-- CONTENT -->
						<div class="container-fluid" >
							<div>
								<!-- MODIFIABLE CODE STARTS HERE -->
								<!-- PROFILES -->
								<div class="container-fluid">
									<ul class="list-group">
										<?php //CODE SECTION STARTS HERE
											$DEFAULT = 0;
											if (isset($_GET["currentpage"])) { $current_p = $_GET["currentpage"]; } else { $current_p = 1; };
											if (isset($_GET["profilepage"])) { 
												$profile_p = $_GET["profilepage"]; $DEFAULT=1;
												//RECEIVE UPDATE
												if(isset($_POST['surgery_update'])){
													$S_CN = $_POST["CASE_NUM"];
													$S_LN = $_POST["SURG_LIC"];  
													$S_ID = $_POST["PAT_ID"];          
													$S_VI = $_POST["VI"];         
													$S_MH = $_POST["MED_HIST"];       
													$S_D = $_POST["DIAG"];
													$S_A = $_POST["SURG_ADDRESS"];                      
													$S_DATE = $_POST["YY"]."-".$_POST["MM"]."-".$_POST["DD"];
													$S_R = $_POST["REM"];                                 
													$S_TA = $_POST["SURG_ANESTHESIA"];	
													$S_I = $_POST["INTERNIST"];
													$S_AN = $_POST["ANESTHESIOLOGIST"];
													$S_IOL = $_POST["IOLPOWER"];
													$PC_IOL = $_POST["PC_IOL"];
													$PC_L = $_POST["PC_LAB"];
													$PC_PF = $_POST["PC_PF"];
													$SP_IOL = $_POST["SPO_IOL"];
													$C_HB = $_POST["CSF_HBILL"];
													$C_S = $_POST["CSF_SUPPLIES"];
													$C_L = $_POST["CSF_LAB"];
													$toupdate = $_POST["surgery_update"];
													$S_update = "UPDATE SURGERY SET CASE_NUM = '$S_CN', SURG_LICENSE_NUM = '$S_LN', 
													PAT_ID_NUM = '$S_ID', VISUAL_IMPARITY = '$S_VI', MED_HISTORY = '$S_MH', 
													DIAGNOSIS = '$S_D', SURG_ANESTHESIA = '$S_TA', SURG_ADDRESS ='$S_A', 
													SURG_DATE ='$S_DATE', REMARKS ='$S_R', INTERNIST = '$S_I', ANESTHESIOLOGIST = '$S_AN', 
													IOLPOWER = '$S_IOL', PC_IOL = '$PC_IOL', PC_LAB = '$PC_L', PC_PF = '$PC_PF', 
													SPO_IOL = '$SP_IOL', CSF_HBILL = '$C_HB', CSF_SUPPLIES = '$C_S', CSF_LAB = '$CSF_LAB' 
													WHERE CASE_NUM = '$toupdate' ";
		  
													if ($mydatabase->query($S_update) === TRUE) {
														//echo "Record updated successfully";
													} else {
														echo '
														<div class="alert alert-danger alert-dismissable">
															<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
															<strong>Error updating record: </strong>'.$mydatabase->error.
														'</div>';
													}
												}//RECIEVE UPDATE END
											} else {};
											if (isset($_GET["delete"])) {
												$delete_p=$_GET["delete"]; $DEFAULT=2;
											} else {};

											$limit = 20;
											$begin = ($current_p-1)*$limit;

											//FILTER ADD
											if(isset($_POST["filter_check"])){
												//var_dump($_POST);
												$F_DD = $F_MM = $F_YY = $F_LN = $F_ID = "";
												$D = 0;

												if(isset($_POST["FSS"])){
													$F_SS = $_POST["FSS"];
												}
												if(isset($_POST["FDD"])){
													if($_POST["FDD"]>0){
														$F_DD = ' AND DAY(s.SURG_DATE)'.$F_SS.trim($_POST["FDD"]);
														$D = 1;
													}
												}
												if(isset($_POST["FMM"])){
													if($_POST["FMM"]>0){
														if($D>0){
															if($F_SS==">"){
																$MARGIN = -1;
															}else if($F_SS=="<"){
																$MARGIN = 1;
															}
														}else{
															$MARGIN = 0; 
														}
														$F_MM = ' AND MONTH(s.SURG_DATE)'.$F_SS.(trim($_POST["FMM"])+$MARGIN);
														$D = 2;
													}
												}
												if(isset($_POST["FYY"])){
													if($_POST["FYY"]>0){
														if($D>0){
															if($F_SS==">"){
																$MARGIN = -1;
															}else if($F_SS=="<"){
																$MARGIN = 1;
															}
														}else{
															$MARGIN = 0; 
														}
														$F_YY = ' AND YEAR(s.SURG_DATE)'.$F_SS.(trim($_POST["FYY"])+$MARGIN);
													}
												}
												if(isset($_POST["FSL"])) {
													if(strlen($_POST["FSL"])>0){
														$F_LN = ' AND s.SURG_LICENSE_NUM='.trim($_POST["FSL"]);
													}
												}
												if(isset($_POST["FID"])) {
													if(strlen($_POST["FID"])>0){
														$F_ID = ' AND s.PAT_ID_NUM2='.trim($_POST["FID"]);
													}
												}

												$filter =  $F_DD.$F_MM.$F_YY.$F_LN.$F_ID;
											} else {
												$filter = "";
											}
											//FILTER ADD END

											//SEARCH
											if(isset($_GET["search_record"])){
												$search = "";
												$key = trim($_GET["search_record"]);
												if(strlen($key)>0){
													$search = '';
												}
											}else{
												$search = "";
											}
											//SEARCH END

											//MYSQL SECTION
											$S_query = "SELECT * FROM SURGERY s, DOCTOR d, EYEPATIENT p WHERE s.SURG_LICENSE_NUM = d.DOC_LICENSE_NUM AND p.PAT_ID_NUM = s.PAT_ID_NUM ORDER by s.SURG_DATE desc;";
											$output = $mydatabase->query($S_query);
											//MYSQL SECTION END
        
											if($DEFAULT==0){
												//FILTER
												include("surgery_filter.php");
												//FILTER END
												//MAIN PAGE
												if ($output->num_rows>0) {
													echo '<table id="example" class="table table-hover table-responsive">
															<thead style="background:#5cb85c">
																<th style="color:#ffffff">Date</th>
																<th style="color:#ffffff">Case No.</th>
																<th style="color:#ffffff">Patient</th>
																<th style="color:#ffffff">Surgeon</th>
																<th style="color:#ffffff">Action</th>
															</thead>
															<tbody>';
													while($dataline = $output->fetch_assoc()) { 
														echo 	'<tr>
																	<td>'.$dataline["SURG_DATE"].'</td>
																	<td>'.$dataline["CASE_NUM"].'</td>
																	<td><a href="patient.php?profilepage='.$dataline["PAT_ID_NUM"].'""><span class="fa fa-external-link"></span></a> '.$dataline["PAT_FNAME"].' '.$dataline["PAT_LNAME"].'</td>
																	<td><a href="doctors.php?profilepage='.$dataline["DOC_LICENSE_NUM"].'""><span class="fa fa-external-link"></span></a> '.$dataline["LAST_NAME"].' '.$dataline["FIRST_NAME"].'</td>
																	<td>
																		<a href=""><span class="fa fa-pencil" title="Edit"></span></a>
																		<a href=""><span class="fa fa-trash" title="Delete"></span></a>
																		<a href="'.'surgery.php'.'?profilepage='.$dataline["CASE_NUM"].'">'.'<span class="fa fa-eye" title="See full detail"></span></a>
																	</td>
																</tr>';
													}
													echo	'</tbody>
														</table>';
												} else {
													echo "No Records.";
												}
												//MAIN PAGE END
											}else if ($DEFAULT==1) {
												//FULL DETAILS PAGE
												//MYSQL SECTION
												$output1 = $mydatabase->prepare("SELECT s.*, d.LAST_NAME, d.FIRST_NAME FROM SURGERY s, DOCTOR d where s.SURG_LICENSE_NUM = d.DOC_LICENSE_NUM and CASE_NUM = '$profile_p' ");      
												$output1->execute();
												$line = $output1->get_result();
												$dataline = $line->fetch_assoc();
												//MYSQL SECTION END

												//VALUES
												$S_CN = $dataline["CASE_NUM"];
												$S_LN = $dataline["SURG_LICENSE_NUM"];
												$S_ID = $dataline["PAT_ID_NUM"];
												$S_VI = $dataline["VISUAL_IMPARITY"];
												$S_MH = $dataline["MED_HISTORY"];
												$S_D = $dataline["DIAGNOSIS"];
												$S_A = $dataline["SURG_ADDRESS"];
												$S_DATE = $dataline["SURG_DATE"];
												$S_R = $dataline["REMARKS"];
												$S_TA = $dataline["SURG_ANESTHESIA"];
												$S_I = $dataline["INTERNIST"];
												$S_AN = $dataline["ANESTHESIOLOGIST"];
												$S_IOL = $dataline["IOLPOWER"];
												$PC_IOL = $dataline["PC_IOL"];
												$PC_L = $dataline["PC_LAB"];
												$PC_PF = $dataline["PC_PF"];
												$SP_IOL = $dataline["SPO_IOL"];
												$C_HB = $dataline["CSF_HBILL"];
												$C_S = $dataline["CSF_SUPPLIES"];
												$C_L = $dataline["CSF_LAB"];
												$date = explode("-", $S_DATE);
												//VALUES END

												//CONTENT
												echo '<div>
														<div class="container-fluid">
															<h3>Case No. '.$S_CN.'</h3>
															<div class="panel panel-default" style="padding-bottom:10px;">
																<div class="panel-heading" id="tophead1">Surgery Details</div>
																<div class="panel-body row" style="margin:0px; padding:5px 10px;">
																	<div class="col-md-3" >'.'Internist'.'</div>
																	<div class="col-md-6">'.$S_I.' <a href="doctors.php?profilepage='.$S_I.'""><span class="fa fa-external-link"></span></a></div>
																</div>
																<div class="panel-body row" style="margin:0px; padding:5px 10px;">
																	<div class="col-md-3" >'.'Anesthesiologist'.'</div>
																	<div class="col-md-6">'.$S_AN.' <a href="doctors.php?profilepage='.$S_AN.'""><span class="fa fa-external-link"></span></a></div>
																</div>
																<div class="panel-body row" style="margin:0px; padding:5px 10px;">
																	<div class="col-md-3" >'.'IOL Power'.'</div>
																	<div class="col-md-6">'.$S_IOL.'</div>
																</div>
																<div class="panel-body row" style="margin:0px; padding:5px 10px;">
																	<div class="col-md-3" >'.'Type of Anesthesia'.'</div>
																	<div class="col-md-6">'.$S_TA.'</div>
																</div>
																<div class="panel-body row" style="margin:0px; padding:5px 10px;">
																	<div class="col-md-3" >'.'Surgery Address'.'</div>
																	<div class="col-md-6">'.$S_A.'</div>
																</div>
																<div class="panel-body row" style="margin:0px; padding:5px 10px;">
																	<div class="col-md-3" >'.'Surgery Date'.'</div>
																	<div class="col-md-6">'.$MONTH_choice[$date[1]-1].' '.$date[2].', '.$date[0].'</div>
																</div>
															</div>
															<div class="panel panel-default" style="padding-bottom:10px;">
																<div class="panel-heading" style="border: 0px; font-weight:bold;">Conducting Surgeon</div>
																<div class="panel-body row" style="margin:0px; padding:5px 10px;">
																	<div class="col-md-3" >'.'Name'.'</div>
																	<div class="col-md-6">'.$dataline["FIRST_NAME"].' '.$dataline["LAST_NAME"].' <a href="doctors.php?profilepage='.$S_LN.'""><span class="fa fa-external-link"></span></a></div>
																</div>
																<div class="panel-body row" style="margin:0px; padding:5px 10px;">
																	<div class="col-md-3" >'.'License No.'.'</div>
																	<div class="col-md-6">'.$S_LN.'</div>
																</div>
															</div>
															<div class="panel panel-default" style="padding-bottom:10px;">
																<div class="panel-heading" style="border: 0px; font-weight:bold;">Patient Information</div>
																<div class="panel-body row" style="margin:0px; padding:5px 10px;">
																	<div class="col-md-3" >'.'Patient ID'.'</div>
																	<div class="col-md-5">'.$S_ID.' <a href="patient.php?profilepage='.$S_ID.'""><span class="fa fa-external-link"></span></a></div>
																</div>
																<div class="panel-body row" style="margin:0px; padding:5px 10px;">
																	<div class="col-md-3" >'.'Visual Imparity'.'</div>
																	<div class="col-md-5">'.$S_VI.'</div>
																</div>
																<div class="panel-body row" style="margin:0px; padding:5px 10px;">
																	<div class="col-md-3" >'.'Medical History'.'</div>
																	<div class="col-md-5">'.$S_MH.'</div>
																</div>
															</div>
															<div class="panel panel-default" style="padding-bottom:10px;">
																<div class="panel-heading" style="border: 0px; font-weight:bold;">Surgeon Remarks</div>
																<div class="panel-body row" style="margin:0px; padding:5px 10px;">
																	<div class="col-md-3" >'.'Diagnosis'.'</div>
																	<div class="col-md-5">'.$S_D.'</div>
																</div>
																<div class="panel-body row" style="margin:0px; padding:5px 10px;">
																	<div class="col-md-3" >'.'Remarks'.'</div>
																	<div class="col-md-5">'.$S_R.'</div>
																</div>
																<div class="panel panel-default" style="padding-bottom:10px;">
																	<div class="panel-heading" style="border: 0px; font-weight:bold;">Financial Information</div>
																	<div class="panel-body row" style="margin:0px; padding:5px 10px;">
																		<div class="col-md-3" >'.'<b>Patient Counterpart</b>'.'</div>
																	</div>
																	<div class="panel-body row" style="margin:0px; padding:5px 10px;">
																		<div class="col-md-3" >'.'IOL'.'</div>
																		<div class="col-md-5">'.$PC_IOL.'</div>
																	</div>
																	<div class="panel-body row" style="margin:0px; padding:5px 10px;">
																		<div class="col-md-3" >'.'Lab'.'</div>
																		<div class="col-md-5">'.$PC_L.'</div>
																	</div>
																	<div class="panel-body row" style="margin:0px; padding:5px 10px;">
																		<div class="col-md-3" >'.'PF (Others)'.'</div>
																		<div class="col-md-5">'.$PC_PF.'</div>
																	</div>
																	<div class="panel-body row" style="margin:0px; padding:5px 10px;">
																		<div class="col-md-3" >'.'<b>SPONSORED IOL</b>'.'</div>
																		<div class="col-md-5">'.$SP_IOL.'</div>
																	</div>
																	<div class="panel-body row" style="margin:0px; padding:5px 10px;">
																		<div class="col-md-3" >'.'<b>CSF</b>'.'</div>
																	</div>
																	<div class="panel-body row" style="margin:0px; padding:5px 10px;">
																		<div class="col-md-3" >'.'HBILL'.'</div>
																		<div class="col-md-5">'.$C_HB.'</div>
																	</div>
																	<div class="panel-body row" style="margin:0px; padding:5px 10px;">
																		<div class="col-md-3" >'.'SUPPLIES'.'</div>
																		<div class="col-md-5">'.$C_S.'</div>
																	</div>
																	<div class="panel-body row" style="margin:0px; padding:5px 10px;">
																		<div class="col-md-3" >'.'LAB'.'</div>
																		<div class="col-md-5">'.$C_L.'</div>
																	</div>
																</div>
															</div>
														</div>
													</div>';
												//CONTENT END

												//BUTTONS AND LINKS
												echo '<div id="link_buttons">
														<a role="button" class="btn btn-default"'.'href="'.'doctors.php'.'?delete='.$profile_p.'" style="margin-left:15px;"> <span class="fa fa-trash" style="font-size:15px;"></span> Delete </a>
														<button type="button" class="btn btn-default" data-toggle="modal" data-target="#EditBox" style="margin-left:10px;"><span class="fa fa-edit" style="font-size:15px;"></span> Edit</button>
														<div style="text-align:right;"><button class="btn" id="go" style="margin-right:15px;" onclick="history.back();">Back</button></div>
													</div>';
												//BUTTONS AND LINKS END

												// POP-UP ALERT
												echo '<div class="modal fade" id="EditBox" role="dialog" style="">
														<div class="modal-dialog modal-lg">';
    
												//POP-UP CONTENT
												echo 		'<div class="modal-content">
																<div class="modal-header">
																	<button type="button" class="close" data-dismiss="modal">&times;</button>
																	<h4 class="modal-title">Edit Record</h4>
																</div>
																<div class="modal-body">';

												$leftmargin = 220;

												//EDIT FORM
												echo 				'<div class="container-fluid">
																		<form method="post" id="updating" action="#" >
																			<div class="container-fluid" style="margin-bottom: 10px;">
																				<label for="CASE_NUM" style="width: '.$leftmargin.'px; float: left; ">Patient ID No. </label>
																				<input pattern="20\d\d-\d\d\d\d\d" title="Case Numbers range from 2000-00000 to 2099-99999." type="text" class="form-control" id="CASE_NUM" maxlength="'.$CASE_LENG.'" name="CASE_NUM" value="'.$S_CN.'" style="width: 150px; float: left;" required >
																			</div>
																			<div class="container-fluid" style="margin-bottom: 10px;">
																				<label for="SURG_ADDRESS" style="width: '.$leftmargin.'px; float: left; ">Internist</label>
																				<input type="text" class="form-control" id="INTERNIST" maxlength="'.$INTER_MAX.'" name="INTERNIST" value="'.$S_I.'" style="max-width: 225px; float: left;">
																			</div>
																			<div class="container-fluid" style="margin-bottom: 10px;">
																				<label for="ANESTHESIOLOGIST" style="width: '.$leftmargin.'px; float: left; ">Anesthesiologist</label>
																				<input type="text" class="form-control" id="ANESTHESIOLOGIST" maxlength="'.$ANEST_MAX.'" name="ANESTHESIOLOGIST" value="'.$S_AN.'" style="max-width: 225px; float: left;">
																			</div>
																			<div class="container-fluid" style="margin-bottom: 10px;">
																				<label for="IOLPOWER" style="width: '.$leftmargin.'px; float: left; ">IOL Power</label>
																				<input type="text" class="form-control" id="IOLPOWER" maxlength="'.$IOL_MAX.'" name="IOLPOWER" value="'.$S_IOL.'" style="max-width: 225px; float: left;">
																			</div>
																			<div class="container-fluid" style="margin-bottom: 10px;">
																				<label for="SURG_ANESTHESIA" style="width: '.$leftmargin.'px; float: left; ">Type of Anesthesia</label>
																				<input type="text" class="form-control" id="SURG_ANESTHESIA" maxlength="'.$TANES_MAX.'" name="SURG_ANESTHESIA" value="'.$S_TA.'" style="max-width: 225px; float: left;">
																			</div>
																			<div class="container-fluid" style="margin-bottom: 10px;">
																				<label for="SURG_ADDRESS" style="width: '.$leftmargin.'px; float: left; ">Surgery Address </label>
																				<input type="text" class="form-control" id="SURG_ADDRESS" maxlength="'.$SURGADD_MAX.'" name="SURG_ADDRESS" value="'.$S_A.'" style="max-width: 450px; float: left;">
																			</div>
																			<div class="container-fluid" style="margin-bottom: 10px;">
																				<label class="control-label" style="float:left; width:'.$leftmargin.'px;">Date of Surgery </label>
																				<div class="form-group">
																					<div class="input-group date" id="datetimepicker3" style="float:left; width:250px;">
																						<input type="text" class="form-control" pattern="^\d{1,2}\/\d{1,2}\/\d{4}$" id="DATE" name="DATE" placeholder="MM/DD/YYYY" required>
																						<span class="input-group-addon">
																							<span class="fa fa-calendar" style="padding:0px; margin:0px; font-size:16px; color:#337ab7;"></span>
																						</span>
																					</div>
																				</div>
																				<script type="text/javascript">
																					$(function () {
																						$("#datetimepicker3").datetimepicker({
																							format: "L"
																						});
																					});
																				</script>
																			</div>
																			<div class="container-fluid" style="margin-bottom: 10px;">
																				<label for="SURG_LIC" style="float:left; width:'.$leftmargin.'px;">Surgeon License No. </label>
																				<input pattern="\d{7}" title="License Number ranges from 0000000-9999999." type="text" class="form-control id="SURG_LIC" maxlength="'.$SURG_LENG.'" name="SURG_LIC" value="'.$S_LN.'" style="width: 90px; float: left;" required>
																			</div>
																			<div class="container-fluid" style="margin-bottom: 10px;">
																				<label for="PAT_ID" style="width: '.$leftmargin.'px; float: left; ">Patient ID No. </label>
																				<input type="text" class="form-control" id="PAT_ID" maxlength="'.$ID_LENG.'" name="PAT_ID" value="'.$S_ID.'" style="width: 150px; float: left;" required >
																			</div>
																			<div class="container-fluid" style="margin-bottom: 10px;">
																				<label for="VI" style="width: '.$leftmargin.'px; float: left; ">Patient Visual Impairment </label>
																				<textarea type="text" class="form-control" id="VI" maxlength="'.$VI_MAX.'" name="VI" style="max-width: 550px; float: left;" rows="2" required>'.$S_VI.'</textarea>
																			</div>
																			<div class="container-fluid" style="margin-bottom: 10px;">
																				<label for="MED_HIST" style="width: '.$leftmargin.'px; float: left; ">Patient Medical History </label>
																				<textarea type="text" class="form-control" id="MED_HIST" maxlength="'.$HIST_MAX.'" name="MED_HIST" style="max-width: 550px; float: left;" rows="2" >'.$S_MH.'</textarea>
																			</div>
																			<div class="container-fluid" style="margin-bottom: 10px;">
																				<label for="DIAG" style="width: '.$leftmargin.'px; float: left; ">Surgeon Diagnosis </label>
																				<textarea type="text" class="form-control" id="DIAG" maxlength="'.$DIAG_MAX.'" name="DIAG" style="max-width: 550px; float: left;" rows="2" >'.$S_D.'</textarea>
																			</div>
																			<div class="container-fluid" style="margin-bottom: 10px;">
																				<label for="REM" style="width: '.$leftmargin.'px; float: left; ">Surgeon Remarks </label>
																				<textarea type="text" class="form-control" id="REM" maxlength="'.$REM_MAX.'" name="REM" style="max-width: 550px; float: left;" rows="2" >'.$S_R.'</textarea>
																			</div>
																			<div class="container-fluid" style="margin-bottom: 10px;">
																				<label for="PC" style="width: '.$leftmargin.'px; float: left; ">Patient Counterpart</label>
																			</div>
																			<div class="container-fluid" style="margin-bottom: 10px;">
																				<label for="PC_IOL" style="width: '.$leftmargin.'px; float: left; ">IOL</label>
																				<input type="text" class="form-control" id="PC_IOL" maxlength="'.$PC_MAX.'" name="PC_IOL" value="'.$PC_IOL.'" style="max-width: 225px; float: left;">
																			</div>		
																			<div class="container-fluid" style="margin-bottom: 10px;">
																				<label for="PC_LAB" style="width: '.$leftmargin.'px; float: left; ">LAB</label>
																				<input type="text" class="form-control" id="PC_LAB" maxlength="'.$PC_MAX.'" name="PC_LAB" value="'.$PC_L.'" style="max-width: 225px; float: left;">
																			</div>
																			<div class="container-fluid" style="margin-bottom: 10px;">
																				<label for="PC_PF" style="width: '.$leftmargin.'px; float: left; ">PF(Others)</label>
																				<input type="text" class="form-control" id="PC_PF" maxlength="'.$PC_MAX.'" name="PC_PF" value="'.$PC_PF.'" style="max-width: 225px; float: left;">
																			</div>
																			<div class="container-fluid" style="margin-bottom: 10px;">
																				<label for="SPO_IOL" style="width: '.$leftmargin.'px; float: left; ">Sponsored IOL</label>
																				<input type="text" class="form-control" id="SPO_IOL" maxlength="'.$PC_MAX.'" name="SPO_IOL" value="'.$SPO_IOL.'" style="max-width: 225px; float: left;">
																			</div>
																			<div class="container-fluid" style="margin-bottom: 10px;">
																				<label for="PC" style="width: '.$leftmargin.'px; float: left; ">CSF</label>
																			</div>
																			<div class="container-fluid" style="margin-bottom: 10px;">
																				<label for="CSF_HBILL" style="width: '.$leftmargin.'px; float: left; ">HBILL</label>
																				<input type="text" class="form-control" id="CSF_HBILL" maxlength="'.$PC_MAX.'" name="CSF_HBILL" value="'.$C_HB.'" style="max-width: 225px; float: left;">
																			</div>
																			<div class="container-fluid" style="margin-bottom: 10px;">
																				<label for="CSF_SUPPLIES" style="width: '.$leftmargin.'px; float: left; ">SUPPLIES</label>
																				<input type="text" class="form-control" id="CSF_SUPPLIES" maxlength="'.$PC_MAX.'" name="CSF_SUPPLIES" value="'.$C_S.'" style="max-width: 225px; float: left;">
																			</div>
																			<div class="container-fluid" style="margin-bottom: 10px;">
																				<label for="CSF_LAB" style="width: '.$leftmargin.'px; float: left; ">LAB</label>
																				<input type="text" class="form-control" id="CSF_LAB" maxlength="'.$PC_MAX.'" name="CSF_LAB" value="'.$C_L.'" style="max-width: 225px; float: left;">
																			</div>
																			<div class="text-center" style="margin-top: 20px;">
																				<button type="submit" onclick="update()" class="btn btn-default" value="'.$S_CN.'" name="surgery_update">Update</button>
																			</div>
																		</form>
																	</div>';
																	//EDIT FORM END
												echo 			'</div>
																<div class="modal-footer">
																	<button type="button" class="btn btn-default" data-dismiss="modal" >Cancel</button>
																</div>
															</div>';
															//POP-UP CONTENT END
												echo 		'<script>
																function update() {
																	var casenumber = document.getElementById("CASE_NUM").value;
																	document.getElementById("updating").action = "surgery.php?profilepage="+casenumber;
																}
															</script>
														</div>
													</div>';
													//POP-UP ALERT END
												//FULL DETAILS PAGE END
											}else if($DEFAULT==2){
												//DELETE PAGE
												//MYSQL SECTION
												$del = "DELETE FROM SURGERY WHERE CASE_NUM = '$delete_p' ";
												if ($mydatabase->query($del) === TRUE) {
													echo "Record deleted.";
													echo '<div style="text-align:right;"><a href="'.'surgery.php'.'">Back</a></div>';
												} else { 
													echo "Error deleting record: " . $mydatabase->error; 
												}
												//MYSQL SECTION
												//DELETE PAGE END
											}
											//CODE SECTION ENDS HERE
										?>
								<!-- PROFILES END -->
							<!-- MODIFIABLE CODE ENDS HERE -->
						</div>
					</div>
					<!-- CONTENT END -->
					<?php $mydatabase->close(); ?>
				</div>
			</div>
			<!-- SURGERIES END -->
		</div>
	</body>
</html>
