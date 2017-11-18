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
					$STAFFL_LENG = 40;
					$REA_MAX = 12;
					$LEA_MAX = 12;
					$VA_choice = array("U", "20/10", "20/12.5", "20/16", "20/20", "20/25", "20/32", "20/40", "20/50", "20/63","20/70", "20/80", "20/100", "20/120", "20/160", "20/200", "CF 1'", "CF 2'", "CF 3'", "CF 4'", "CF 5'", "CF 6'", "CF 7'", "CF 8'", "CF 9'", "CF 10'", "CF 11'", "CF 12'", "CF 13'", "CF 14'", "CF 15'", "CF 16'", "CF 17'", "CF 18'", "CF 19'", "CF 20'", "HM", "+LP", "-LP");
					//MAX VALUES END

					include("auto_doc.php");

					//CODE SECTION ENDS HERE
				?>

				<!-- PATIENTS -->
				<div class="container-fluid" id="basic" >
					<div id="inner">
						<!-- TITLE -->
						<div class="container-fluid" >
							<h4 style="color:#337ab7;">Patient's Eye Record</h4>
						</div>
						<!-- TITLE END -->

						<?php include("confirm.php"); ?>

						<!-- CONTENT -->
						<div class="container-fluid" >
							<div>
								<!-- MODIFIABLE CODE STARTS HERE -->
								<!-- PROFILES -->
								<div class="container-fluid">
									<ul class="list-group">
										<?php //CODE SECTION STARTS HERE
											$DEFAULT = 0;
											if (isset($_GET["printpage"])) { $print_p = $_GET["printpage"]; $DEFAULT=4; }

											if (isset($_GET["currentpage"])) { 
												$current_p = $_GET["currentpage"]; 
											} else { $current_p = 1; };
											if (isset($_GET["profilepage"])) { $profile_p = $_GET["profilepage"];
												$DEFAULT=1;
												//RECEIVE UPDATE
												if(isset($_POST['patients_update'])){
													//var_dump($_POST);
													$PAT_ID = $_POST['patients_update'];
													$PAT_FNAME = $_POST["PAT_FNAME"];
													$PAT_LNAME = $_POST["PAT_LNAME"];
													$PAT_AGE = $_POST["P_AGE"];
													$PAT_PH = $_POST["P_PH"];
													$PAT_SEX = $_POST["P_SEX"];
													$PRE_VA_WITH_SPECT_LEFT = rtrim($_POST["P_VASL1"], "'");
													$POST_VA_WITH_SPECT_LEFT = rtrim($_POST["P_VASL2"], "'");
													$PRE_VA_WITH_SPECT_RIGHT = rtrim($_POST["P_VASR1"], "'");
													$POST_VA_WITH_SPECT_RIGHT = rtrim($_POST["P_VASR2"], "'");
													$PRE_VA_NO_SPECT_LEFT = rtrim($_POST["P_VAL1"], "'");
													$POST_VA_NO_SPECT_LEFT = rtrim($_POST["P_VAL2"], "'");
													$PRE_VA_NO_SPECT_RIGHT = rtrim($_POST["P_VAR1"], "'");
													$POST_VA_NO_SPECT_RIGHT = rtrim($_POST["P_VAR2"], "'");
													$VISUAL_DISABILITY = $_POST["P_VD"];
													$RIGHT_DIAGNOSIS = $_POST["P_RDiag"];
													$LEFT_DIAGNOSIS = $_POST["P_LDiag"];
													$DISABILITY_CAUSE = $_POST["P_DC"];
													$PROCEDURE_TO_DO = $_POST["P_PROC"];

													$SS_LIST = explode(" - ",$_POST["P_PHYLIC"]);
													if(sizeof($SS_LIST)==1){
														$PHY_LICENSE_NUM = trim($SS_LIST[0]);
													}else{
														$PHY_LICENSE_NUM = trim($SS_LIST[0]);
													}
													$SS_LIST1 = explode(" - ",$_POST["P_STAFFLIC"]);
													if(sizeof($SS_LIST1)==1){
														$STAFF_LICENSE_NUM = trim($SS_LIST1[0]);
													}else{
														$STAFF_LICENSE_NUM = trim($SS_LIST1[0]);
													}

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
													 RIGHT_DIAGNOSIS = '$RIGHT_DIAGNOSIS',
													 LEFT_DIAGNOSIS = '$LEFT_DIAGNOSIS',
													 PROCEDURE_TO_DO = '$PROCEDURE_TO_DO' WHERE PAT_ID_NUM = '$PAT_ID' ";
											  
													if ($mydatabase->query($P_update) === TRUE) {
														//echo "Record updated successfully";
													} else {
														echo '<div class="alert alert-danger alert-dismissable">
																<a class="close" data-dismiss="alert" aria-label="close">×</a>
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

												$F_LN = $F_SI = $F_PH = $F_SX = "";
												$D = 0;

												if(isset($_POST["FPL"])) {
													if(strlen($_POST["FPL"])>0){
																$FIL_DOC = $_POST["FPL"];
																$FD_LIST = explode(" - ",$FIL_DOC);
																if(sizeof($FD_LIST)==1){
																	$doc_lic = trim($FD_LIST[0]);
																}else{
																	$doc_lic = trim($FD_LIST[1]);
																}
																$F_LN = ' AND p.PHY_LICENSE_NUM='.$doc_lic.' ';
															}
												}

												if(isset($_POST["FSI"])) {
													if(strlen($_POST["FSI"])>0){
																$FIL_STA = $_POST["FSI"];
																$FS_LIST = explode(" - ",$FIL_STA);
																if(sizeof($FS_LIST)==1){
																	$sta_lic = trim($FS_LIST[0]);
																}else{
																	$sta_lic = trim($FS_LIST[1]);
																}
																$F_SI = ' AND p.STAFF_LICENSE_NUM='.$sta_lic.' ';
															}
												}

												if(isset($_POST["FPH"])) {
													if(strlen($_POST["FPH"])>0){
																$ph = $_POST["FPH"];
																$F_PH = ' AND p.PAT_PH="'.$ph.'" ';
														}
												}

												if(isset($_POST["FSX"])) {
													if(strlen($_POST["FSX"])>0){
																$sx = $_POST["FSX"];
																$F_SX = ' AND p.PAT_SEX="'.$sx.'" ';
														}
												}
												//


												$filter =  $F_LN.$F_SI.$F_PH.$F_SX;
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
																		
																		<a role="button" id="'.$dataline["PAT_ID_NUM"].'" onclick="outer_close(this.id)"><span class="fa fa-trash" title="Delete"></span></a>
																		<a href="'.'patient.php'.'?profilepage='.$dataline["PAT_ID_NUM"].'"><span class="fa fa-eye" title="See full detail"></span></a>
																	</td>
																</tr>';
													} //CONTENT END
													
													echo 	'</tbody>
														</table>';

													echo '<button style="display:none;" id="del_button" value="patient"></button>';

												} else { echo "No Records."; }
												//MAIN PAGE END
											}else if ($DEFAULT==1) {
												//FULL DETAILS PAGE
												//MYSQL SECTION
												$output1 = $mydatabase->prepare("SELECT p.*, d.LAST_NAME, d.FIRST_NAME, t.* FROM DOCTOR d, STAFF t, EYEPATIENT p where p.PHY_LICENSE_NUM = d.DOC_LICENSE_NUM and t.STAFF_LICENSE_NUM = p.STAFF_LICENSE_NUM and PAT_ID_NUM = '$profile_p' ");      
												$output1->execute();
												$line1 = $output1->get_result();
												$dataline = $line1->fetch_assoc();
												//MYSQL SECTION END

												$VA_LABEL = array("Left Eye without Spectacles", "Right Eye without Spectacles", "Left Eye with Spectacles", "Right Eye with Spectacles");
												$P_PREVA = array($dataline["PRE_VA_NO_SPECT_LEFT"], $dataline["PRE_VA_NO_SPECT_RIGHT"], $dataline["PRE_VA_WITH_SPECT_LEFT"], $dataline["PRE_VA_WITH_SPECT_RIGHT"]);
												$P_POSTVA = array($dataline["POST_VA_NO_SPECT_LEFT"], $dataline["POST_VA_NO_SPECT_RIGHT"], $dataline["POST_VA_WITH_SPECT_LEFT"], $dataline["POST_VA_WITH_SPECT_RIGHT"]);
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
												//VALUES END
												
												$margin0 = "20%";
												$margin00 = "80%";
												$margin000 = "50%";

												$E_link = '<span class="fa fa-external-link" style="margin-right:5px; "></span>';
												$PHY_link = "doctors.php?profilepage=".$P_LN;
												$STAFF_link = "#";
												
												//CONTENT
												echo '<div>
														<div class="container-fluid" style="padding:0px;">
															<h3>'.$P_PPFN.' '.$P_PPLN.'</h3>
																<div style="background-color: #bbb; margin-right:0px; width:100%;">
																	<div style="width:45%; float: left; margin:0px;">
																		<div class="panel panel-default"  style="padding-bottom:0px; margin-right:20px;">
																			<a href="../pat/LukePatient/pages/records.php">
																				<div class="panel-heading" id="tophead1">Patient Record<span class="pull-right fa fa-arrow-circle-right"></span></div>
																			</a>
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
																						if($dataline["PAT_SEX"]=="M"){
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
																			<div style="width:'.$margin000.'; float: left;"><a href="'.$PHY_link.'">'.$E_link.'<span style="color:#000000; text-decoration:none;">'.$dataline["FIRST_NAME"].' '.$dataline["LAST_NAME"].'</span></a></div>
																		</div>
																		<div >
																			<div style="width:'.$margin000.'; float: left; font-weight:bold;">'.'Screened by: '.'</div>
																			<div style="width:'.$margin000.'; float: left;"><a href="'.$STAFF_link.'">'.$E_link.'<span style="color:#000000; text-decoration:none;">'.$dataline["STAFF_FNAME"].' '.$dataline["STAFF_LNAME"].'</span></a></div>
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

												echo 		'<div style="width:50%; float: left; margin:0px;">
																<div class="panel panel-default" style="padding-bottom:10px;">
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
																			<div style="width:'.$margin1.'; float:left;font-weight:bold;">'.'Procedure'.'</div>
																			<div style="width:'.$margin11.'; float: left;">'.$dataline["PROCEDURE_TO_DO"].'</div>
																		</div>
																	</div>
																</div>
															</div>

															<div style="width:50%; float: left; margin:0px; padding-left:20px;">
																<div class="panel panel-default" style="padding-bottom:10px;">
																	<div class="panel-heading" style="border: 0px; color:#337ab7;">Eye Diagnosis</div>
																	<div class="panel-body" style="padding:15px;">
																		<div class="row" style="margin:0px; padding:5px 10px;">
																			<div style="width:30%; float:left; font-weight:bold;">'.'Right Eye'.'</div>
																			<div style="width:70%; float: left;">'.$dataline["RIGHT_DIAGNOSIS"].'</div>
																		</div>
																		<div class="row" style="margin:0px; padding:5px 10px;">
																			<div style="width:30%; float:left; font-weight:bold;">'.'Left Eye'.'</div>
																			<div style="width:70%; float: left;">'.$dataline["LEFT_DIAGNOSIS"].'</div>
																		</div>
																	</div>
																</div>
															</div>';

															$S_query = "SELECT * FROM SURGERY WHERE PAT_ID_NUM = '$P_ID' ORDER by SURG_DATE desc";
															$outsurg = $mydatabase->query($S_query);
															//echo $S_query;

															if ($outsurg->num_rows>0) {

																echo '<div class="row" style="margin:0px; padding: 0px 0px 20px 0px;"><hr style="border-color:#337ab7; float:left;"></div>';

																echo '<div class="container-fluid" style="padding:0px; float:left; width:100%;">
																<div class="well" style="width: 100%; float: left; color:#337ab7; font-weight:bold; text-align:center; margin-bottom:10px;">Surgery Transaction Record</div>

																<div class="well" style="width:100%; background-color:#fefefe; float:left; ">
																<div style="width:100%; float: left;">
																		<table class="table table-condensed" style="float:left; width:100%; padding-bottom:0px; margin-bottom:0px;">
															    <thead>
															      <tr>
															      		<th>Case Number</th>
															        <th>IOL</th>
															        <th>LAB</th>
															        <th>PF (Others)</th>
															        <th>Total</th>
															      </tr>
															    </thead>
															    <tbody>';

																		while($datasurg = $outsurg->fetch_assoc()) {

																			$PC_IOL = $datasurg["PC_IOL"];
																			$PC_LAB = $datasurg["PC_LAB"];
																			$PC_PF = $datasurg["PC_PF"];
																			$PC_TOTAL = $PC_IOL+$PC_LAB+$PC_PF;

																		echo '<tr>
												        <td><a href="surgery.php?profilepage='.$datasurg["CASE_NUM"].'" style="text-decoration:none;"><span class="fa fa-external-link"></span> <span style="color:#000000; margin-left:0px;">'.$datasurg["CASE_NUM"].'</span></a></td>
												        <td>'."₱ ".number_format($PC_IOL, 2).'</td>
												        <td>'."₱ ".number_format($PC_LAB, 2).'</td>
												        <td>'."₱ ".number_format($PC_PF, 2).'</td>
												        <td>'."₱ ".number_format($PC_TOTAL, 2).'</td>
													      </tr>';
																	}	    
																
																		echo '</tbody>
																	  </table>
																			
																	</div>
																</div>
																</div>';
															}
												
													echo	'</div>
													</div>';

													//CONTENT END

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
																					<input pattern="[a-zA-Z ]*" placeholder="Patient Name" class="form-control" id="PAT_FNAME" maxlength="'.$FN_LENG.'" name="PAT_FNAME" value="'.$dataline["PAT_FNAME"].'" style="width: 60%; float: left;" required >
																				</div>
																				<div class="container-fluid" style="margin-bottom: 10px;">
																					<label for="PAT_LNAME" style="width: 40%; float: left; ">Last Name<span style="color: #d9534f">*</span> </label>
																					<input pattern="[a-zA-Z ]*" placeholder="Patient Surname" class="form-control" id="PAT_LNAME" maxlength="'.$LN_LENG.'" name="PAT_LNAME" value="'.$dataline["PAT_LNAME"].'" style="width: 60%; float: left;" required >
																				</div>
																			</div>
																		</div>

																		<div style="width:50%; float: left; margin: 0px; padding-right:0px;">
																			<div style="width:100%; float: left;">
																				
																					<div class="well"  style="float:left; padding: 20px 20px 0px 20px; width:100%; margin-bottom:0px;">
																					<div class="form-group" style="width:100%; float:left;">
																						<label class="control-label" for="P_AGE" style="float:left; width:50%;">Age:<span style="color: #d9534f">*</span></label>
																						<div style="width: 40%; float: left;">
																							<input pattern="[a-zA-Z0-9 +-,.]*" class="form-control" id="P_AGE" name="P_AGE" placeholder="Patient Age" maxlength="6" value="'.$dataline["PAT_AGE"].'" required>
																						</div>
																					</div>
																					<div class="form-group" style="width:100%; float:left;">
																						<label class="control-label" for="P_SEX" style="float:left; width:50%">Sex:<span style="color: #d9534f">*</span></label>
																						<div style="width: 50%; float: left; ">';
																							echo '<label class="radio-inline"><input id="MALE" name="P_SEX" type="radio" value="M" required>Male</label>';
																							echo '<label class="radio-inline"><input id="FEMALE" name="P_SEX" type="radio" value="F" >Female</label>';

																						echo '</div>
																					</div>
																					<div class="form-group" style="width:100%; float:left;">
																						<label class="control-label" for="P_PH" style="float:left; width:50%;">Has PhilHealth?<span style="color: #d9534f">*</span></label>
																						<div style="width: 50%; float: left;">';
																							echo '<label class="radio-inline"><input id="P_PH_Y" name="P_PH" type="radio" value="Y" required>Yes</label>';
																							echo '<label class="radio-inline"><input id="P_PH_N" name="P_PH" type="radio" value="N" >No</label>';

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

																	<div class="container-fluid well" style="margin:10px 0px 0px 0px; width:100%; float:left; padding-bottom:5px; background-color:#f9f9f9;">
																		<div class="form-group" style="width:100%; float:left;">
																			<label class="control-label" for="P_PHYLIC" style="float:left; width:40%; font-weight:bold;">Examined by:<span style="color: #d9534f">*</span></label>
																			<div style=" width:60%; float: left;">';
																		echo '<input pattern="^(\d{7})(([ ][-][ ][a-zA-Z]([a-zA-Z ]*)[ ][a-zA-Z]([a-zA-Z]*))*)$" title="License No. (0000000-9999999) or Name and License (Firstname Surname - License no.)" class="form-control typeahead tt-query" autocomplete="off" id="P_PHYLIC" placeholder="Physician Name or License" maxlength="'.$PHYL_LENG.'" name="P_PHYLIC" value="'.$P_LN.'" style="width: 320px;" required>
																			</div>
																		</div>
																		<div class="form-group" style="width:100%; float:left;">
																			<label class="control-label" for="P_STAFFLIC" style="float:left; width:40%; font-weight:bold;">Screened by:<span style="color: #d9534f">*</span></label>
																			<div style="width: 60%; float: left;">
																				<input pattern="^(\d{7})(([ ][-][ ][a-zA-Z]([a-zA-Z ]*)[ ][a-zA-Z]([a-zA-Z]*))*)$" class="form-control typeahead2 tt-query" autocomplete="off" id="P_STAFFLIC" placeholder="Staff Name or License" maxlength="'.$STAFFL_LENG.'" name="P_STAFFLIC" value="'.$P_SLN.'" style="width: 320px;" required>
																			</div>
																		</div>
																	</div>
																</div>

																<div style="float:left; width: 100%; padding:20px 0px 10px 15px;">
																	<div class="panel-group" style="margin:0px;">
																		<div class="panel panel-default" style="margin:0px;">
																			<div class="panel-heading" style="color:#337ab7;">Visual Acuity</div>
																			<div class="panel-body" style="padding-top:0px; padding-bottom:5px;">
																				<table class="table" style="margin-top:0px; ">
																					<thead>
																						<th></th>
																						<th>Pre Surgery<span style="color: #d9534f">*</span></th>
																						<th>Post Surgery</th>
																					</thead>
																					<tbody>
																						<!-- LEFT EYE W/OUT SPECT -->
																						<tr>
																							<td><strong>Left Eye without Spectacles</strong></td>
																							<td>
																								<select class="form-control" id="P_VAL1"  name="P_VAL1" style="width: 120px;" required>';
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
																								<select class="form-control" id="P_VAL2"  name="P_VAL2" style="width: 120px;" >';
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
																								<select class="form-control" id="P_VAR1"  name="P_VAR1" style="width: 120px;" required>';
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
																								<select class="form-control" id="P_VAR2"  name="P_VAR2" style="width: 120px;">';
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
																						
																						<!-- LEFT EYE W/ SPECT -->
																						<tr>
																							<td><strong>Left Eye with Spectacles</strong></td>
																							<td>
																								<select class="form-control" id="P_VASL1"  name="P_VASL1" style="width: 120px;" required>';
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
																								<select class="form-control" id="P_VASL2"  name="P_VASL2" style="width: 120px;">';
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
																								<select class="form-control" id="P_VASR1"  name="P_VASR1" style="width: 120px;" required>';
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
																								<select class="form-control" id="P_VASR2"  name="P_VASR2" style="width: 120px;" >';
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
																					</tbody>
																				</table>
																			</div>
																		</div>
																	</div>
																	<!-- VISUAL ACUITY END -->
																</div>


																<div style="width:50%; float:left; padding-left:15px;">
																	<div class="panel panel-default" style="margin-top:10px; width:100%;">

																		<div class="panel-heading" style="color:#337ab7;">Eye Diagnosis</div>
																		<div class="panel-body" style="">
																			<!-- RIGHT EYE DIAGNOSIS -->
																			<div class="form-group" style="width:100%; float:left;">
																				<label class="control-label" for="P_RDiag" style="float:left; width:40%; padding-left:10px;">Right Eye</label>
																				<div style="width: 60%; float:left; padding-right:10px;">
																					<input pattern="[a-zA-Z0-9 .,:;()*/-!_]*" class="form-control" id="P_RDiag" placeholder="Right eye diagnosis" maxlength="30" name="P_RDiag" value="'.$dataline["RIGHT_DIAGNOSIS"].'">
																				</div>
																			</div>
																			<!-- RIGHT EYE DIAGNOSIS END -->

																			<!-- LEFT EYE DIAGNOSIS -->
																			<div class="form-group" style="width:100%; float:left;">
																				<label class="control-label" for="P_RDiag" style="float:left; width:40%; padding-left:10px;">Left Eye</label>
																				<div style="width: 60%; float:left; padding-right:10px;">
																					<input pattern="[a-zA-Z0-9 .,:;()*/-!_]*" class="form-control" id="P_LDiag" placeholder="Left eye diagnois" maxlength="30" name="P_LDiag" value="'.$dataline["LEFT_DIAGNOSIS"].'">
																				</div>
																			</div>
																			<!-- LEFT EYE DIAGNOSIS END -->
																		</div>

																	</div>
																</div>


																<div style="width:50%; float: left; ">
																<div class="container-fluid" style="float:left; width:100%; margin:0px; padding:10px 0px 0px 20px;">
																	<div class="container-fluid well" style="margin:0px; width:100%; float:left;  padding-bottom:5px; background-color:#f9f9f9;">

																		<!-- VISUAL DISABILITY -->
																		<div class="form-group row">
																			<label class="control-label col-md-2" for="P_VD" style="float:left; width:170px;">Visual Disability </label>
																			<div class="col-md-4" style="width: 200px;">
																				<input pattern="[a-zA-Z0-9 .,:;()*/-!_]*" type="text" class="form-control" id="P_VD" placeholder="Eye disability..." maxlength="15" name="P_VD" value="'.$dataline["VISUAL_DISABILITY"].'">
																			</div>
																		</div>
																		<!-- VISUAL DISABILITY -->

																		<!-- CAUSE OF DISABILITY -->
																		<div class="form-group row">
																			<label class="control-label col-md-2" for="P_DC" style="float:left; width:170px;">Cause </label>
																			<div class="col-md-6" style="width: 200px;">
																				<input pattern="[a-zA-Z0-9 .,:;()*/-!_]*" type="text" class="form-control" id="P_DC" placeholder="Cause of disability..." maxlength="30" name="P_DC" value="'.$dataline["DISABILITY_CAUSE"].'">
																			</div>
																		</div>
																		<!-- CAUSE OF DISABILITY END -->
					  
																		<!-- PROCEDURE -->
																		<div class="form-group row">
																			<label class="control-label col-md-2" for="P_PROC" style="float:left; width:170px;">Procedure </label>
																			<div class="col-md-4" style="width: 200px;">
																				<input pattern="[a-zA-Z0-9 .,:;()*/-!_]*" type="text" class="form-control" id="P_PROC" placeholder="Procedure to do..." maxlength="15" name="P_PROC" value="'.$dataline["PROCEDURE_TO_DO"].'">
																			</div>
																		</div>
																		<!-- PROCEDURE END -->

																	</div>
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
													echo '<div style="margin-top:10px;" class="alert alert-danger alert-dismissable"><a class="close" data-dismiss="alert" aria-label="close">&times;</a>
														<p><strong>Cannot Delete Record</strong></p>
														<p>Error deleting record: '.$mydatabase->error.'</p></div>'; 
													echo '<div class="row" style="text-align:right;"><a role="btn" class="btn" id="go"  href="'.'patient.php'.'">Back</a></div>';
												}
												//MYSQL SECTION END
												//DELETE PAGE END
											}else if($DEFAULT==4){
												if(strlen($print_p)>1){
													//PRINT PAGE

													echo '<div style="margin-top:20px;"></div>';

													//MYSQL SECTION
													$outputpage = $mydatabase->prepare("SELECT * FROM EYEPATIENT WHERE PAT_ID_NUM = '$print_p' ");
													$outputpage -> execute();
													$ppage = $outputpage->get_result();
													$printline = $ppage->fetch_assoc();
													//MYSQL SECTION END

													echo '<div>
													<div class="container-fluid" style="width:100%; float:left;">

													<div class="container-fluid" style="width: 70%; float:left; margin:0px;">
														<div style="width:100%; margin-bottom:10px;"><h4>'.$printline["PAT_FNAME"].' '.$printline["PAT_LNAME"].'</h5></div>
													</div>
														<hr>
													<div class="container-fluid" style="width: 50%; float:left; padding-right:20px;">
														<div id="pr_label">ID Number: </div>
														<div id="pr_body" >'.$printline["PAT_ID_NUM"].'</div>
														<div id="pr_label">Age: </div>
														<div id="pr_body" >'.$printline["PAT_AGE"].'</div>
														<div id="pr_label">Sex: </div>';
														if($printline["PAT_SEX"]=="M"){
															$print_sx = "Male";
														}else{
															$print_sx = "Female";
														}
														echo '<div id="pr_body" >'.$print_sx.'</div>
														<div id="pr_label">Has PhilHealth? </div>';
														if($printline["PAT_PH"]=="Y"){
															$print_ph = "Yes";
														}else{
															$print_ph = "No";
														}
														echo '<div id="pr_body" >'.$print_ph.'</div>
													</div>';

													$PHYS_P = $printline["PHY_LICENSE_NUM"];
													$STAFF_P = $printline["STAFF_LICENSE_NUM"];


													$DOC_GET = $mydatabase->prepare("SELECT LAST_NAME, FIRST_NAME FROM DOCTOR WHERE DOC_LICENSE_NUM = '$PHYS_P'");
																$DOC_GET->execute();
																$DOC_TAKE = $DOC_GET->get_result();
																$DOC_P = $DOC_TAKE->fetch_assoc();
																$DOC_NAME= $DOC_P["FIRST_NAME"]." ".$DOC_P["LAST_NAME"];

													$STAFF_GET = $mydatabase->prepare("SELECT STAFF_FNAME, STAFF_LNAME FROM STAFF WHERE STAFF_LICENSE_NUM = '$STAFF_P'");
																$STAFF_GET->execute();
																$STAFF_TAKE = $STAFF_GET->get_result();
																$STAFF_P = $STAFF_TAKE->fetch_assoc();
																$STAFF_NAME= $STAFF_P["STAFF_FNAME"]." ".$STAFF_P["STAFF_LNAME"];

													echo '<div class="container-fluid well" style="float:left; width:50%">
														<div id="pr_label">Examined by: </div>
														<div id="pr_body">'.$DOC_NAME.'</div>
														<div id="pr_label">Screened by: </div>
														<div id="pr_body" >'.$STAFF_NAME.'</div>
													</div>';
												
													echo '<div class="container-fluid" style="width:100%; float:left; padding:20px;">
														<div class="panel panel-default" >
											    <div class="panel-heading">Visual Condition</div>
											    <div class="panel-body">
														<div id="pr_label">Visual Disability</div>
														<div id="pr_body" >'.$printline["VISUAL_DISABILITY"].'</div>
														<div id="pr_label">Cause of Visual Disability</div>
														<div id="pr_body" >'.$printline["DISABILITY_CAUSE"].'</div>
														<div id="pr_label">Right Eye Diagnosis</div>
														<div id="pr_body" >'.$printline["RIGHT_DIAGNOSIS"].'</div>
														<div id="pr_label">Left Eye Diagnosis</div>
														<div id="pr_body" >'.$printline["LEFT_DIAGNOSIS"].'</div>
														<div></div></div><div>
													</div>';
													echo '</div>';

													echo '<div>
													<table class="table table-condensed table-bordered">
										    <thead style="background-color:#f0f0f0;">
										      <tr>
										      	<th colspan="5" style="text-align:center; padding:10px;">Visual Acuity</th>
										      </tr>
										    </thead>
										    <tbody>
										    		<tr>
										        <th></th>
										        <th>Right Eye w/o Spec</th>
										        <th>Left Eye w/o Spec</th>
										        <th>Right Eye w/ Spec</th>
										        <th>Left Eye w/ Spec</th>
										      </tr>
										      <tr>
										        <th>Pre Surgery</th>
										        <td>'.$printline["PRE_VA_NO_SPECT_RIGHT"].'</td>
										        <td>'.$printline["PRE_VA_NO_SPECT_LEFT"].'</td>
										        <td>'.$printline["PRE_VA_WITH_SPECT_RIGHT"].'</td>
										        <td>'.$printline["PRE_VA_WITH_SPECT_LEFT"].'</td>
										      </tr>
										      <tr>
										        <th>Post Surgery</th>
										        <td>'.$printline["POST_VA_NO_SPECT_RIGHT"].'</td>
										        <td>'.$printline["POST_VA_NO_SPECT_LEFT"].'</td>
										        <td>'.$printline["POST_VA_WITH_SPECT_RIGHT"].'</td>
										        <td>'.$printline["POST_VA_WITH_SPECT_LEFT"].'</td>
										      </tr>
										    </tbody>
										  </table>
													</div>';

													echo '</div>';

													//PRINT PAGE END
												}else{
													echo 'No print page available.';
												}
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
