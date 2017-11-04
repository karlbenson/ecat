<!DOCTYPE html>
<html>
	<head>
		<title>Luke Foundation Eye Program: Patient</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="references/bootstrap.min.css">
		<link rel="stylesheet" href="references/font-awesome.min.css">
		<link rel="stylesheet" href="references/typeahead.css">
		<script src="references/jquery-2.1.1.min.js"></script>
		<script src="references/bootstrap.min.js"></script>
		<link rel="stylesheet" type="text/css" href="theme2.css">
		<script src="references/typeahead.bundle.js"></script>
		<link rel="stylesheet" href="references/dataTables.bootstrap4.min.css"/>
		<script src="references/jquery.dataTables.min.js"></script>
		<script src="references/dataTables.bootstrap.min.js"></script>
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

					//MAX VALUES
					$ID_LENG = 15;
					$FN_LENG = 20;
					$LN_LENG = 20;
					$PHYL_LENG = 40;
					$STAFFL_LENG = 7;
					$REA_MAX = 12;
					$LEA_MAX = 12;
					$VA_choice = array("n/a","20/10", "20/12.5", "20/16", "20/20", "20/25", "20/32", "20/40", "20/50", "20/63","20/70", "20/80", "20/100", "20/120", "20/160", "20/200", "CF 1'", "CF 2'", "CF 3'", "CF 4'", "CF 5'", "CF 6'", "CF 7'", "CF 8'", "CF 9'", "CF 10'", "CF 11'", "CF 12'", "CF 13'", "CF 14'", "CF 15'", "CF 16'", "CF 17'", "CF 18'", "CF 19'", "CF 20'", "HM", "+LP", "-LP", "U");
					//MAX VALUES END

					include("auto_doc.php");

					//CODE SECTION ENDS HERE
				?>

				<!-- PATIENTS -->
				<div class="container-fluid" id="basic" >
					<div id="inner">
						<!-- TITLE -->
						<div class="container-fluid" >
							<h4 style="color:#337ab7;">Eye Patients</h4>
						</div>
						<!-- TITLE END -->

						<!-- CONTENT -->
						<div class="container-fluid" >
							<div>
								<!-- MODIFIABLE CODE STARTS HERE -->
								<!-- PROFILES -->
								<div class="container-fluid">
									<ul class="list-group">
										<?php //CODE SECTION STARTS HERE
											$DEFAULT = 0;
											if (isset($_GET["currentpage"])) { 
												$current_p = $_GET["currentpage"]; 
											} else { 
												$current_p = 1; 
											};
											if (isset($_GET["profilepage"])) { $profile_p = $_GET["profilepage"]; $DEFAULT=1;
												//RECEIVE UPDATE
												if(isset($_POST['patients_update'])){
													//var_dump($_POST);
													$PAT_ID = $_GET["profilepage"];
													$PAT_FNAME = $_POST["PAT_FNAME"];
													$PAT_LNAME = $_POST["PAT_LNAME"];
													$PAT_AGE = $_POST["P_AGE"];
													$PAT_PH = $_POST["P_PH"];
													$PAT_SEX = $_POST["P_SEX"];
													$PHYSICIAN = $_POST["P_PHYLIC"];
													$PHY_LIST = explode(" - ",$PHYSICIAN);
													if(sizeof($PHY_LIST)==1){
														$PHY_LICENSE_NUM = $PHY_LIST[0];	
													}else{
														$PHY_LICENSE_NUM = $PHY_LIST[1];
													}
													$STAFF_LIST = explode(" - ",$_POST["P_STAFFLIC"]);
													if(sizeof($STAFF_LIST)==1){
														$STAFF_LICENSE_NUM = $STAFF_LIST[0];
													}else{
														$STAFF_LICENSE_NUM = $STAFF_LIST[1];
													}
													$PRE_VA_WITH_SPECT_LEFT = $_POST["P_VASL1"];
													$POST_VA_WITH_SPECT_LEFT = $_POST["P_VASL2"];
													$PRE_VA_WITH_SPECT_RIGHT = $_POST["P_VASR1"];
													$POST_VA_WITH_SPECT_RIGHT = $_POST["P_VASR2"];
													$PRE_VA_NO_SPECT_LEFT = $_POST["P_VAL1"];
													$POST_VA_NO_SPECT_LEFT = $_POST["P_VAL2"];
													$PRE_VA_NO_SPECT_RIGHT = $_POST["P_VAR1"];
													$POST_VA_NO_SPECT_RIGHT = $_POST["P_VAR2"];
													$VISUAL_DISABILITY = $_POST["P_VD"];
													$DISABILITY_CAUSE = $_POST["P_DC"];
													$DIAGNOSIS = $_POST["P_DIAG"];
													$PROCEDURE_TO_DO = $_POST["P_PROC"];
													$RIGHT_EYE_AFFECTED = $_POST["P_REA"];
													$LEFT_EYE_AFFECTED = $_POST["P_LEA"];

													$P_update = "UPDATE EYEPATIENT SET
													PAT_FNAME = '$PAT_FNAME',
													PAT_LNAME = '$PAT_LNAME',
													PAT_AGE = '$PAT_AGE',
													PAT_PH = '$PAT_PH',
													PAT_SEX = '$PAT_SEX',
													PHY_LICENSE_NUM = '$PHY_LICENSE_NUM',
													STAFF_LICENSE_NUM = '$STAFF_LICENSE_NUM',
													PRE_VA_WITH_SPECT_LEFT = '$PRE_VA_WITH_SPECT_LEFT',
													POST_VA_WITH_SPECT_LEFT = '$POST_VA_WITH_SPECT_LEFT',
													PRE_VA_WITH_SPECT_RIGHT = '$PRE_VA_WITH_SPECT_RIGHT',
													POST_VA_WITH_SPECT_RIGHT = '$POST_VA_WITH_SPECT_RIGHT',
													PRE_VA_NO_SPECT_LEFT = '$PRE_VA_NO_SPECT_LEFT',
													POST_VA_NO_SPECT_LEFT = '$POST_VA_NO_SPECT_LEFT',
													PRE_VA_NO_SPECT_RIGHT = '$PRE_VA_NO_SPECT_RIGHT',
													POST_VA_NO_SPECT_RIGHT = '$POST_VA_NO_SPECT_RIGHT',
													VISUAL_DISABILITY = '$VISUAL_DISABILITY',
													DISABILITY_CAUSE = '$DISABILITY_CAUSE',
													DIAGNOSIS = '$DIAGNOSIS',
													PROCEDURE_TO_DO = '$PROCEDURE_TO_DO',
													RIGHT_EYE_AFFECTED = '$RIGHT_EYE_AFFECTED',
													LEFT_EYE_AFFECTED = '$LEFT_EYE_AFFECTED'
													WHERE PAT_ID_NUM = '$PAT_ID'
													";
											  
													if ($mydatabase->query($P_update) === TRUE) {
														//echo "Record updated successfully";
													} else {
														echo '<div class="alert alert-danger alert-dismissable">
																<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
																<strong>Error updating record: </strong>'.$mydatabase->error.
															'</div>';
													}
												}//RECIEVE UPDATE END
											} else {};
											if (isset($_GET["delete"])) { 
												$delete_p =$_GET["delete"]; 
												$DEFAULT=2; 
											} else {};

											//FILTER ADD
											if(isset($_POST["filter_check"])){
												//var_dump($_POST);

												$F_LN = $F_ID = "";
												$D = 0;

												if(isset($_POST["FPL"])) {
													if(strlen($_POST["FPL"])>0){
														$F_LN = ' AND p.PHY_LICENSE_NUM='.trim($_POST["FPL"]);
													}
												}
												if(isset($_POST["FID"])) {
													if(strlen($_POST["FID"])>0){
														$F_ID = ' AND p.PAT_ID_NUM2='.trim($_POST["FID"]);
													}
												}

												$filter =  $F_LN.$F_ID;
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
											$P_query = "SELECT * FROM EYEPATIENT p, DOCTOR d where p.PHY_LICENSE_NUM = d.DOC_LICENSE_NUM $filter $search order by p.PAT_LNAME";
											$output = $mydatabase->query($P_query);
											//MYSQL SECTION END

											if($DEFAULT==0){
												//FILTER
												include("patient_filter.php");
												//FILTER END
												
												if ($output->num_rows>0) {
													//MAIN PAGE
													//HEADER
													echo '<table id="docdat" class="table table-striped row">
															<thead>
																<tr id="tophead">
																	<td style="color:#ffffff">'.'Patient ID'.'</td>
																	<td style="color:#ffffff">'.'Last Name'.'</td>
																	<td style="color:#ffffff">'.'First Name'.'</td>
																	<td style="color:#ffffff">'.'Sex'.'</td>
																	<td style="color:#ffffff">'.'Age'.'</td>
																	<td style="color:#ffffff">Action</td>
																</tr>
															</thead>
															<tbody>';
													//HEADER END

													//CONTENT
													while($dataline = $output->fetch_assoc()) { 
														echo 	'<tr>
																	<td>'.$dataline["PAT_ID_NUM"].'</td>
																	<td>'.$dataline["PAT_LNAME"].'</td>
																	<td>'.$dataline["PAT_FNAME"].'</td>';
														if($dataline["PAT_SEX"]=='M'){
															echo '<td>Male</td>';
														}else{
															echo '<td>Female</td>';
														}
														echo		'<td>'.$dataline["PAT_AGE"].'</td>
																	<td>
																		<a href=""><span class="fa fa-pencil" title="Edit"></span></a>
																		<a href=""><span class="fa fa-trash" title="Delete"></span></a>
																		<a href="'.'patient.php'.'?profilepage='.$dataline["PAT_ID_NUM"].'">'.'<span class="fa fa-eye" title="See full detail"></span></a>
																	</td>
																</tr>';
													} //CONTENT END
													
													echo 	'</tbody>
														</table>';

												} else { echo "No Records."; }
												//MAIN PAGE END
											}else if ($DEFAULT==1) {
												//FULL DETAILS PAGE
												//MYSQL SECTION
												$output1 = $mydatabase->prepare("SELECT p.*, d.LAST_NAME, d.FIRST_NAME FROM EYEPATIENT p, DOCTOR d where p.PHY_LICENSE_NUM = d.DOC_LICENSE_NUM and PAT_ID_NUM = '$profile_p' ");      
												$output1->execute();
												$line = $output1->get_result();
												$dataline = $line->fetch_assoc();
												//MYSQL SECTION END

												$VA_LABEL = array("Left Eye with Spectacles", "Right Eye with Spectacles", "Left Eye without Spectacles", "Right Eye without Spectacles");
												$P_PREVA = array($dataline["PRE_VA_WITH_SPECT_LEFT"], $dataline["PRE_VA_WITH_SPECT_RIGHT"], $dataline["PRE_VA_NO_SPECT_LEFT"], $dataline["PRE_VA_NO_SPECT_RIGHT"]);
												$P_POSTVA = array($dataline["POST_VA_WITH_SPECT_LEFT"], $dataline["POST_VA_WITH_SPECT_RIGHT"], $dataline["POST_VA_NO_SPECT_LEFT"], $dataline["POST_VA_NO_SPECT_RIGHT"]);
												for($i=0; $i<sizeof($VA_LABEL); $i++){
													if(explode(" ",$P_PREVA[$i])[0]=="CF")
														$P_PREVA[$i] = $P_PREVA[$i]."'";
													if(explode(" ",$P_POSTVA[$i])[0]=="CF")
														$P_POSTVA[$i] = $P_POSTVA[$i]."'";
												}
												
												//VALUES
												$P_ID = $dataline["PAT_ID_NUM"];
												$P_PPFN = $dataline["PAT_FNAME"];
												$P_PPLN = $dataline["PAT_LNAME"];
												$P_LN = $dataline["PHY_LICENSE_NUM"];
												$P_SLN = $dataline["STAFF_LICENSE_NUM"];
												$P_VD = $dataline["VISUAL_DISABILITY"];
												$P_DC = $dataline["DISABILITY_CAUSE"];
												$P_REA = $dataline["RIGHT_EYE_AFFECTED"];
												$P_LEA = $dataline["LEFT_EYE_AFFECTED"];
												//VALUES END
												
												$margin0 = "20%";
												$margin00 = "80%";
												$margin000 = "50%";

												$E_link = '<span class="fa fa-external-link"></span>';
												$PHY_link = "doctors.php?profilepage=".$P_LN;
												$STAFF_link = "#";
												
												//CONTENT
												echo '<div>
														<div class="container-fluid">
															<h3>'.$P_PPFN.' '.$P_PPLN.'</h3>
																<div style="background-color: #bbb; margin-right:0px; width:100%;">
																	<div style="width:45%; float: left; margin:0px;">
																		<div class="panel panel-default"  style="padding-bottom:0px; margin-right:20px;">
																			<div class="panel-heading" id="tophead1">Patient Record</div>
																			<div class="panel-body">
																				<div class="row" style="margin:0px; padding:5px 10px;">
																					<div style="font-weight:bold; width:'.$margin0.'; float: left;">'.'ID:'.'</div>
																					<div style="width:'.$margin00.'; float: left;">'.$P_ID.'</div>
																				</div>
																				<div class="row" style="margin:0px; padding:5px 10px;">
																					<div style="font-weight:bold; width:'.$margin0.'; float: left;">'.'Age:'.'</div>
																					<div style="width:'.$margin00.'; float: left;">'.$dataline["PAT_AGE"].'</div>
																				</div>
																				<div class="row" style="margin:0px; padding:3px 10px;">
																					<div style="font-weight:bold; width:'.$margin0.'; float: left;">'.'Sex:'.'</div>
																					<div style="width:'.$margin00.'; float: left;">';
																						if($dataline["LEFT_EYE_AFFECTED"]=="M"){
																							echo 'Male';
																						}else{
																							echo 'Female';
																						}
															echo '</div>									
																				</div>
																			</div>
																		</div>
																	</div>

																	<div style="width:55%; float:left;">
																	<div class="well" style="width: 100%; float:left; margin-bottom:20px;">
																		<div>
																			<div style=" width:'.$margin000.'; float: left; font-weight:bold;">'.'Has Phil. Health? '.'</div>
																			<div style="width:'.$margin000.'; float: left;">';
																			if($dataline["PAT_PH"]=="Y"){ 
																				echo 'Yes'; 
																			}else{
																				echo 'No'; 
																			}
																			echo '</div>
																		</div>
																	</div>
																  
																	<div class="well" style="width: 100%; float:left; margin:0px;">
																		<div>
																			<div style=" width:'.$margin000.'; float: left; font-weight:bold;">'.'Examined by: '.'</div>
																			<div style="width:'.$margin000.'; float: left;"><a href="'.$PHY_link.'"><span style="color:#000000; float:left; margin-right:5px;">'.$dataline["FIRST_NAME"].' '.$dataline["LAST_NAME"].'</span>'.$E_link.'</a></div>
																		</div>
																		<div >
																			<div style="width:'.$margin000.'; float: left; font-weight:bold;">'.'Screened by: '.'</div>
																			<div style="width:'.$margin000.'; float: left;"><a href="'.$STAFF_link.'"><span style="color:#000000; float:left; margin-right:5px;">'.$P_SLN.'</span>'.$E_link.'</a></div>
																		</div>
																	</div>
																</div>
															</div>
															</div>
															<div class="panel panel-default" style="padding-bottom:0px;">
																<div class="panel-heading" style="border: 0px; color:#337ab7;">Visual Acuity</div>
																<div style="margin: 0px 50px;">
																	<table class="table table-condensed">
																		<thead>
																			<tr>
																				<th>Condition</th>
																				<th>Pre Surgery</th>
																				<th>Post Surgery</th>
																			</tr>
																		</thead>
																		<tbody>';
												for ($t=0; $t < sizeof($VA_LABEL); $t++) {
													echo 					'<tr>
																				<td>'.$VA_LABEL[$t].'</td>
																				<td>'.$P_PREVA[$t].'</td>
																				<td>'.$P_POSTVA[$t].'</td>
																			</tr>';
												}
												echo 					'</tbody>
																	</table>
																</div>
															</div>';

												$margin1 = "40%";
												$margin11 = "60%";

												echo 		'<div style="width:60%; float: left; margin:0px;">
																<div class="panel panel-default" style="padding-bottom:10px;  margin-right:20px;">
																	<div class="panel-heading" style="border: 0px; color:#337ab7;">Visual Problem</div>
																	<div class="panel-body">
																		<div class="row" style="margin:0px; padding:5px 10px;">
																			<div style="width:'.$margin1.'; float:left; font-weight:bold;">'.'Visual Disability'.'</div>
																			<div style="width:'.$margin11.'; float: left;">'.$P_VD.'</div>
																		</div>
																		<div class="row" style="margin:0px; padding:5px 10px;">
																			<div style="width:'.$margin1.'; float:left; font-weight:bold;">'.'Cause'.'</div>
																			<div style="width:'.$margin11.'; float: left;">'.$P_DC.'</div>
																		</div>
																		<div class="row" style="margin:0px; padding:5px 10px;">
																			<div style="width:'.$margin1.'; float:left; font-weight:bold;">'.'Diagnosis'.'</div>
																			<div style="width:'.$margin11.'; float: left;">'.$dataline["DIAGNOSIS"].'</div>
																		</div>
																		<div class="row" style="margin:0px; padding:5px 10px;">
																			<div style="width:'.$margin1.'; float:left;font-weight:bold;">'.'Procedure'.'</div>
																			<div style="width:'.$margin11.'; float: left;">'.$dataline["PROCEDURE_TO_DO"].'</div>
																		</div>
																	</div>
																</div>
															</div>
															<div style="width:40%; float: left; margin:0px;">
																<div class="panel panel-default" style="padding-bottom:10px;">
																	<div class="panel-heading" style="border: 0px; color:#337ab7;">Affected Area of Eye</div>
																	<div class="panel-body" style="margin:0px 50px; padding:0px;">
																		<table class="table table-condensed">
																			<thead>
																				<th>Eye</th>
																				<th>Affected Part</th>
																			</thead>
																			<tbody>
																				<tr>
																					<td>Left</td>
																					<td>'.$P_LEA.'</td>
																				</tr>
																				<tr>
																					<td>Right</td>
																					<td>'.$P_REA.'</td>
																				</tr>
																			</tbody>
																		</table>
																	</div>
																</div>
															</div>
														</div>
													</div>';
													//CONTENT END

												include("confirm.php");

												//BUTTONS AND LINKS
												$back = "'patient.php'";
												echo '<div id="link_buttons" style="margin:20px 0px;">';
												echo '<button class="btn btn-default" id="del_button" value="patient" data-toggle="modal" data-target="#confirm_this" style="margin-left:15px;"> <span class="fa fa-trash" style="font-size:15px;"></span> Delete </button>';
												echo '<button type="button" class="btn btn-default" data-toggle="modal" data-target="#EditBox" style="margin-left:10px;"><span class="fa fa-edit" style="font-size:15px;"></span> Edit</button>';
												echo '<div style="text-align:right;"><button class="btn" id="go" style="margin-right:15px;" onclick="window.location.href='.$back.'">Back</button></div>';
												echo '</div>';
												//BUTTONS AND LINKS END
												
												$VISUAL_ACUITY = array($dataline["PRE_VA_WITH_SPECT_LEFT"], $dataline["POST_VA_WITH_SPECT_LEFT"], $dataline["PRE_VA_WITH_SPECT_RIGHT"],
													$dataline["POST_VA_WITH_SPECT_RIGHT"], $dataline["PRE_VA_NO_SPECT_LEFT"], $dataline["POST_VA_NO_SPECT_LEFT"],
													$dataline["PRE_VA_NO_SPECT_RIGHT"], $dataline["POST_VA_NO_SPECT_RIGHT"]);
												for($i=0;$i<sizeof($VISUAL_ACUITY);$i++)
													if(explode(" ",$VISUAL_ACUITY[$i])[0]=="CF")
														$VISUAL_ACUITY[$i] = $VISUAL_ACUITY[$i]."'";

												$PRE_VA_WITH_SPECT_LEFT = $VISUAL_ACUITY[0];
												$POST_VA_WITH_SPECT_LEFT = $VISUAL_ACUITY[1];
												$PRE_VA_WITH_SPECT_RIGHT = $VISUAL_ACUITY[2];
												$POST_VA_WITH_SPECT_RIGHT = $VISUAL_ACUITY[3];
												$PRE_VA_NO_SPECT_LEFT = $VISUAL_ACUITY[4];
												$POST_VA_NO_SPECT_LEFT = $VISUAL_ACUITY[5];
												$PRE_VA_NO_SPECT_RIGHT = $VISUAL_ACUITY[6];
												$POST_VA_NO_SPECT_RIGHT = $VISUAL_ACUITY[7];
													
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

																	//EDIT FORM
												echo 				'<div class="container-fluid">
																		<form method="post" id="updating">

																			<p style="margin-bottom: 20px; color:#666666;">
																				Please do not leave the required<span style="color: #d9534f">*</span> fields blank.
																			</p>

																			<div style="width:50%; float: left;"> <div style="margin-right:20px; margin-top: 5px;">
																				<div class="container-fluid" style="margin-bottom: 20px;">
																					<label for="PAT_ID" style="width: 40%; float: left; ">Patient ID<span style="color: #d9534f">*</span></label>
																					<input placeholder="ID Number" class="form-control" id="PAT_ID" maxlength="'.$ID_LENG.'" name="PAT_ID" value="'.$dataline["PAT_ID_NUM"].'" style="width: 60%; float: left;" required readonly>
																				</div>
																				<div class="container-fluid" style="margin-bottom: 20px;">
																					<label for="PAT_FNAME" style="width: 40%; float: left; ">First Name<span style="color: #d9534f">*</span> </label>
																					<input placeholder="Patient Name" type="text" class="form-control" id="PAT_FNAME" maxlength="'.$FN_LENG.'" name="PAT_FNAME" value="'.$dataline["PAT_FNAME"].'" style="width: 60%; float: left;" required >
																				</div>
																				<div class="container-fluid" style="margin-bottom: 10px;">
																					<label for="PAT_LNAME" style="width: 40%; float: left; ">Last Name<span style="color: #d9534f">*</span> </label>
																					<input placeholder="Patient Surname" type="text" class="form-control" id="PAT_LNAME" maxlength="'.$LN_LENG.'" name="PAT_LNAME" value="'.$dataline["PAT_LNAME"].'" style="width: 60%; float: left;" required >
																				</div>
																			</div>
																		</div>

																		<div style="width:50%; float: left; margin: 0px; padding-right:0px;">
																			<div style="width:100%; float: left;">
																				
																					<div class="well"  style="float:left; padding: 20px 20px 0px 20px; width:100%; margin-bottom:0px;">
																					<div class="form-group" style="width:100%; float:left;">
																						<label class="control-label" for="P_AGE" style="float:left; width:50%;">Age:<span style="color: #d9534f">*</span></label>
																						<div  style="width: 40%; float: left;">
																							<input type="text" class="form-control" id="P_AGE" name="P_AGE" placeholder="Patient Age" maxlength="6" value="'.$dataline["PAT_AGE"].'" required>
																						</div>
																					</div>
																					<div class="form-group" style="width:100%; float:left;">
																						<label class="control-label" for="P_SEX" style="float:left; width:50%">Sex:<span style="color: #d9534f">*</span></label>
																						<div style="width: 50%; float: left; ">';

																							if($dataline["PAT_SEX"]=="M"){
																								$S_M = "selected";
																								$S_F = "";
																							}else{
																								$S_M = "";
																								$S_F = "selected";
																							}

																							echo '<label class="radio-inline"><input id="MALE" name="P_SEX" type="radio" value="M" '.$S_M.' '.$S_F.'>Male</label>';
																							echo '<label class="radio-inline"><input id="FEMALE" name="P_SEX" type="radio" value="F" '.$S_M.' '.$S_F.'>Female</label>';

																						echo '</div>
																					</div>
																					<div class="form-group" style="width:100%; float:left;">
																						<label class="control-label" for="P_PH" style="float:left; width:50%;">Has PhilHealth?<span style="color: #d9534f">*</span></label>
																						<div style="width: 50%; float: left;">';

																							if($dataline["PAT_PH"]=="Y"){ 
																								$P_Y = "selected";
																								$P_N = "";
																							}else{
																								$P_Y = "";
																								$P_N = "selected";
																							}

																							echo '<label class="radio-inline"><input id="P_PH_Y" name="P_PH" type="radio" value="Y" '.$P_Y.' '.$P_N.'>Yes</label>';
																							echo '<label class="radio-inline"><input id="P_PH_N" name="P_PH" type="radio" value="N" '.$P_Y.' '.$P_N.'>No</label>';

																						echo '</div>
																					</div>
																				
																			</div>

																			<script>
																				var sex = "'.$dataline["PAT_SEX"].'";
																				var philh = "'.$dataline["PAT_PH"].'";
																				if(sex=="M"){
																					document.getElementById("MALE").checked = true;
																				}else{
																					document.getElementById("FEMALE").checked = true;
																				}
																				if(philh=="Y"){
																					document.getElementById("P_PH_Y").checked = true;
																				}else{
																					document.getElementById("P_PH_N").checked = true;
																				}
																			</script>
																		</div>
																	</div>
																	<div class="container-fluid" style="float:left; width:100%; margin:0px; padding:10px 0px 0px 15px;">

																	<div class="container-fluid well" style="margin:10px 0px 0px 0px; width:100%; float:left;  padding-bottom:5px; background-color:#f9f9f9; border-color:#f2f2f2;">
																		<div class="form-group" style="width:100%; float:left;">
																			<label class="control-label" for="P_PHYLIC" style="float:left; width:175px; font-weight:bold;">Examined by:<span style="color: #d9534f">*</span></label>
																			<div style="width: 200px; float: left;">';

																		echo '<input pattern="^(([a-zA-Z](\w*)[ ][a-zA-Z](\w*)[ ][-][ ])*)(\d{5,7}$)" class="form-control typeahead tt-query" autocomplete="off" id="P_PHYLIC" placeholder="Physician Name or License" maxlength="'.$PHYL_LENG.'" name="P_PHYLIC" value="'.$P_LN.'" required>
																			</div>
																		</div>
																		<div class="form-group" style="width:100%; float:left;">
																			<label class="control-label" for="P_STAFFLIC" style="float:left; width:175px; font-weight:bold;">Screened by:<span style="color: #d9534f">*</span></label>
																			<div style="width: 200px; float: left;">
																				<input pattern="^(([a-zA-Z](\w*)[ ][a-zA-Z](\w*)[ ][-][ ])*)(\d{5,7}$)" class="form-control" id="P_STAFFLIC" placeholder="Staff Name or License" maxlength="'.$STAFFL_LENG.'" name="P_STAFFLIC" value="'.$P_SLN.'" required>
																			</div>
																		</div>
																	</div>
																</div>
																<div class="container-fluid" style="float:left; width: 65%; margin: 20px 0px 10px 0px;">
																	<div class="panel-group" style="margin:0px; margin-bottom:0px;">
																		<div class="panel panel-default" style="">
																			<div class="panel-heading" style="color:#999999;">Visual Acuity</div>
																			<div class="panel-body" style="padding-top:0px; padding-bottom:5px;">
																				<table class="table" style="margin-top:0px; ">
																					<thead>
																						<th></th>
																						<th>Pre Surgery<span style="color: #d9534f">*</span></th>
																						<th>Post Surgery</th>
																					</thead>
																					<tbody>
																						<!-- LEFT EYE W/ SPECT -->
																						<tr>
																							<td><strong>Left Eye with Spectacles</strong></td>
																							<td>
																								<select class="form-control" id="P_VASL1"  name="P_VASL1" style="width: 100px;" required>';
																								for ($j=0; $j < count($VA_choice); $j++) {
																									if($j==0){
																										echo "<option>"."n/a"."</option>";
																									}else{
																										if($PRE_VA_WITH_SPECT_LEFT==$VA_choice[$j]){
																											echo "<option selected>".$VA_choice[$j]."</option>";    
																										}else{
																											echo "<option>".$VA_choice[$j]."</option>";
																										}
																									}
																								}
																								echo '</select>
																							</td>
																							<td>
																								<select class="form-control" id="P_VASL2"  name="P_VASL2" style="width: 100px;">';
																								for ($j=0; $j < count($VA_choice); $j++) { 
																									if($j==0){
																										echo "<option>"."n/a"."</option>";
																									}else{
																										if($POST_VA_WITH_SPECT_LEFT==$VA_choice[$j]){
																											echo "<option selected>".$VA_choice[$j]."</option>";    
																										}else{
																											echo "<option>".$VA_choice[$j]."</option>";
																										}
																									}
																								}
																								echo '</select>
																							</td>
																						</tr>
																						<!-- END -->
																						<!-- RIGHT EYE W/ SPECT -->
																						<tr>
																							<td><strong>Right Eye with Spectacles</strong></td>
																							<td>
																								<select class="form-control" id="P_VASR1"  name="P_VASR1" style="width: 100px;" required>';
																								for ($j=0; $j < count($VA_choice); $j++) { 
																									if($j==0){
																										echo "<option>"."n/a"."</option>";
																									}else{
																										if($PRE_VA_WITH_SPECT_RIGHT==$VA_choice[$j]){
																											echo "<option selected>".$VA_choice[$j]."</option>";    
																										}else{
																											echo "<option>".$VA_choice[$j]."</option>";
																										}
																									}
																								}
																								echo '</select>
																							</td>
																							<td>
																								<select class="form-control" id="P_VASR2"  name="P_VASR2" style="width: 100px;" >';
																								for ($j=0; $j < count($VA_choice); $j++) { 
																									if($j==0){
																										echo "<option>"."n/a"."</option>";
																									}else{
																										if($POST_VA_WITH_SPECT_RIGHT==$VA_choice[$j]){
																											echo "<option selected>".$VA_choice[$j]."</option>";    
																										}else{
																											echo "<option>".$VA_choice[$j]."</option>";
																										}
																									}
																								}
																							echo '</select>
																							</td>
																						</tr>
																						<!-- END -->
																						<!-- LEFT EYE W/OUT SPECT -->
																						<tr>
																							<td><strong>Left Eye without Spectacles</strong></td>
																							<td>
																								<select class="form-control" id="P_VAL1"  name="P_VAL1" style="width: 100px;" required>';
																								for ($j=0; $j < count($VA_choice); $j++) { 
																									if($j==0){
																										echo "<option>"."n/a"."</option>";
																									}else{
																										if($PRE_VA_NO_SPECT_LEFT==$VA_choice[$j]){
																											echo "<option selected>".$VA_choice[$j]."</option>";    
																										}else{
																											echo "<option>".$VA_choice[$j]."</option>";
																										}
																									}
																								}
																								echo '</select>
																							</td>
																							<td>
																								<select class="form-control" id="P_VAL2"  name="P_VAL2" style="width: 100px;" >';
																								for ($j=0; $j < count($VA_choice); $j++) { 
																									if($j==0){
																										echo "<option>"."n/a"."</option>";
																									}else{
																										if($POST_VA_NO_SPECT_LEFT==$VA_choice[$j]){
																											echo "<option selected>".$VA_choice[$j]."</option>";    
																										}else{
																											echo "<option>".$VA_choice[$j]."</option>";
																										}
																									}
																								}
																								echo '</select>
																							 </td>
																						</tr>
																						<!-- END -->
																						<!-- RIGHT EYE W/OUT SPECT -->
																						<tr>
																							<td><strong>Right Eye without Spectacles</strong></td>
																							<td>
																								<select class="form-control" id="P_VAR1"  name="P_VAR1" style="width: 100px;" required>';
																								for ($j=0; $j < count($VA_choice); $j++) { 
																									if($j==0){
																										echo "<option>"."n/a"."</option>";
																									}else{
																										if($PRE_VA_NO_SPECT_RIGHT==$VA_choice[$j]){
																											echo "<option selected>".$VA_choice[$j]."</option>";    
																										}else{
																											echo "<option>".$VA_choice[$j]."</option>";
																										}
																									}
																								}
																								echo '</select>
																							</td>
																							<td>
																								<select class="form-control" id="P_VAR2"  name="P_VAR2" style="width: 100px;">';
																								for ($j=0; $j < count($VA_choice); $j++) { 
																									if($j==0){
																										echo "<option>"."n/a"."</option>";
																									}else{
																										if($POST_VA_NO_SPECT_RIGHT==$VA_choice[$j]){
																											echo "<option selected>".$VA_choice[$j]."</option>";    
																										}else{
																											echo "<option>".$VA_choice[$j]."</option>";
																										}
																									}
																								}
																								echo '</select>
																							</td>
																						</tr>
																						<!-- END -->
																					</tbody>
																				</table>
																			</div>
																		</div>
																	</div>
																	<!-- VISUAL ACUITY END -->
																</div>

																<div class="container-fluid" style="width:35%; float:left; padding:0px;">
																	<div class="panel panel-default" style="margin-top:20px; width:100%;">
																		<div class="panel-heading" style="color:#999999;">Affected Eye</div>
																		<div class="panel-body" style="">
																			<!-- AFFECTED PART OF LEFT EYE -->
																			<div class="form-group" style="width:100%; float:left;">
																				<label class="control-label" for="P_LEA" style="float:left; width:40%;">Left Eye</label>
																				<div style="width: 60%; float:left;">
																					<input class="form-control" id="P_LEA" placeholder="Affected Area" maxlength="'.$LEA_MAX.'" name="P_LEA" value="'.$P_LEA.'">
																				</div>
																			</div>
																			<!-- AFFECTED PART OF LEFT EYE END -->

																			<!-- AFFECTED PART OF RIGHT EYE -->
																			<div class="form-group" style="width:100%; float:left;">
																				<label class="control-label" for="P_REA" style="float:left; width:40%;">Right Eye</label>
																				<div style="width: 60%; float:left;">
																					<input class="form-control" id="P_REA" placeholder="Affected Area" maxlength="'.$REA_MAX.'" name="P_REA" value="'.$P_REA.'">
																				</div>
																			</div>
																			<!-- AFFECTED PART OF RIGHT EYE END -->
																		</div>
																	</div>
																</div>
																<div class="container-fluid" style="float:left; width:100%; margin:0px; padding:10px 0px 0px 15px;">
																	<div class="container-fluid well" style="margin:0px; width:100%; float:left;  padding-bottom:5px; background-color:#ffffff; border-color:#f2f2f2;">
																		<!-- VISUAL DISABILITY -->
																		<div class="form-group row">
																			<label class="control-label col-md-2" for="P_VD" style="float:left; width:170px;">Visual Disability </label>
																			<div class="col-md-4" style="width: 200px;">
																				<input type="text" class="form-control" id="P_VD" placeholder="Eye disability..." maxlength="15" name="P_VD" value="'.$dataline["VISUAL_DISABILITY"].'">
																			</div>
																		</div>
																		<!-- VISUAL DISABILITY -->

																		<!-- CAUSE OF DISABILITY -->
																		<div class="form-group row">
																			<label class="control-label col-md-2" for="P_DC" style="float:left; width:170px;">Cause </label>
																			<div class="col-md-6" style="width: 200px;">
																				<input type="text" class="form-control" id="P_DC" placeholder="Cause of disability..." maxlength="30" name="P_DC" value="'.$dataline["DISABILITY_CAUSE"].'">
																			</div>
																		</div>
																		<!-- CAUSE OF DISABILITY END -->
					  
																		<!-- DIAGNOSIS -->
																		  <div class="form-group row">
																			<label class="control-label col-md-2" for="P_DIAG" style="float:left; width:170px;">Diagnosis </label>
																			<div class="col-md-4" style="width: 200px;">
																				<input type="text" class="form-control" id="P_DIAG" placeholder="Diagnosis..." maxlength="15" name="P_DIAG" value="'.$dataline["DIAGNOSIS"].'">
																			</div>
																		</div>
																		<!-- DIAGNOSIS END -->
					  
																		<!-- PROCEDURE -->
																		<div class="form-group row">
																			<label class="control-label col-md-2" for="P_PROC" style="float:left; width:170px;">Procedure </label>
																			<div class="col-md-4" style="width: 200px;">
																				<input type="text" class="form-control" id="P_PROC" placeholder="Procedure to do..." maxlength="15" name="P_PROC" value="'.$dataline["PROCEDURE_TO_DO"].'">
																			</div>
																		</div>
																		<!-- PROCEDURE END -->
																	</div>
																</div>
															</div>';
															//EDIT FORM END
												echo 	'</div>
														<div class="modal-footer" style="text-align:center;">
															<button type="submit" onclick="update()" class="btn btn-default" value="'.$P_ID.'" name="patients_update">Update</button>
															<button type="button" class="btn btn-default" data-dismiss="modal" >Cancel</button>
														</div>
													</div>
												</form>';
												//POP-UP CONTENT END
												echo '<script>
														function update() {
															var license = document.getElementById("LICENSE_NUM").value;
															document.getElementById("updating").action = "doctors.php?profilepage="+license;
														}
													</script>
												</div></div>';
												//POP-UP ALERT END
											}else if($DEFAULT==2){
												//DELETE PAGE
												//MYSQL SECTION
												$del = "DELETE FROM EYEPATIENT WHERE PAT_ID_NUM = '$delete_p' ";
												if ($mydatabase->query($del) === TRUE) {
													echo "Record deleted.";
													echo '<div class="row" style="text-align:right;"><a role="btn" class="btn" id="go"  href="'.'patient.php'.'">Back</a></div>';
												} else { 
													echo "Error deleting record: " . $mydatabase->error; 
												}
												//MYSQL SECTION END
												//DELETE PAGE END
											}
											//CODE SECTION ENDS HERE 
										?>
									</ul>
								</div>
								<!-- PROFILES END -->
								<!-- MODIFIABLE CODE ENDS HERE -->
							</div>
						</div>
					<!-- CONTENT END -->
					<?php $mydatabase->close(); ?>
					</div>
				</div>
				<!-- PATIENTS END -->
			</div>
		</div>
	</body>
</html>
<script type="text/javascript">

	var myTable=$('#docdat').DataTable({
			"search":false,
			"sDom":"ltipr",
			"columns": [
						null,
		    null,
		    null,
		    null,
		    null,
		    { "orderable": false }
  			],
		});

	$('#dataseek').keyup(function(){
		myTable.search($(this).val()).draw();
	})
</script>
