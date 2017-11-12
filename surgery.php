<!DOCTYPE html>

<!--UPDATE AND DELETE STILL TO BE FIXED-->

<html>
	<head>
		<title>Luke Foundation Eye Program: Surgery</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="references/bootstrap.min.css">
		<link rel="stylesheet" href="references/typeahead.css">
		<link rel="stylesheet" href="references/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="theme2.css">
		<link rel="stylesheet" href="references/bootstrap-datetimepicker.css">
		<link rel="stylesheet" href="references/dataTables.bootstrap4.min.css"/>
		<script src="references/jquery-2.1.1.min.js"></script>
		<script src="references/bootstrap.min.js"></script>
		<script src="references/moment-with-locales.js"></script>
		<script src="references/bootstrap-datetimepicker.js"></script>
		<script src="references/typeahead.bundle.js"></script>
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

					//MAX VAUES
					$CASE_LENG = 10;
					$SURG_LENG = 50;
					$ID_LENG = 50;
					$VI_MAX = 100;
					$HIST_MAX = 100;
					$TANES_MAX = 25;
					$DIAG_MAX = 100;
					$SURGADD_MAX = 50;
					$SURG_DATE_YY = 4; 
					$SURG_DATE_DD = 2;
					$REM_MAX = 100;
					$INTER_MAX = 50;
					$ANEST_MAX = 50;
					$IOL_MAX = 20;
					$PC_MAX = 10;
					$MONTH_choice = array("January","Febuary","March","April","May","June","July","August","September","October","November","December");
					//MAX VALUES END

					include("auto_doc.php");

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

						<?php
							include("confirm.php");
							include("pass_verify.php");
						?>

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
													$S_VI = $_POST["VI"];         
													$S_MH = $_POST["MED_HIST"];       
													$S_RD = $_POST["DIAG_RIGHT"];
													$S_LD = $_POST["DIAG_LEFT"];
													$S_A = $_POST["SURG_ADDRESS"];                      
													$S_DATE1 = explode("/",$_POST["DATE"]);
													$S_DATE = $S_DATE1[2].'-'.$S_DATE1[0].'-'.$S_DATE1[1];
													$S_R = $_POST["REM"];                                 
													$S_TA = $_POST["TANES"];
													$S_IOL = $_POST["IOLPOWER"];
													$PC_IOL = $_POST["PC_IOL"];
													$PC_L = $_POST["PC_LAB"];
													$PC_PF = $_POST["PC_PF"];
													$SP_IOL = $_POST["SPO_IOL"];
													$C_HB = $_POST["CSF_HBILL"];
													$C_S = $_POST["CSF_SUPPLIES"];
													$C_L = $_POST["CSF_LAB"];
													$N_RA = $_POST["NDDCH_RA"];
													$N_ZEISS = $_POST["NDDCH_ZEISS"];
													$N_SUPP = $_POST["NDDCH_SUPPLIES"];
													$L_PF = $_POST["LF_PF"];
													$L_CPC = $_POST["LF_CPC"];

													$SS_ID = $_POST["PAT_ID"];
													$SP_LIST = explode(" - ",$SS_ID);
													if(sizeof($SP_LIST)==1){
														$S_ID = trim($SP_LIST[0]);
													}else{
														$S_ID = trim($SP_LIST[1]);
													}
													
													$SS_SURG = $_POST["SURG_LIC"];
													$SS_LIST = explode("-",$SS_SURG);
													if(sizeof($SS_LIST)==1){
														$S_LN = trim($SS_LIST[0]);
													}else{
														$S_LN = trim($SS_LIST[1]);
													}

													$SS_SURG1 = $_POST["SURG_LIC1"];
													$SS_LIST1 = explode("-",$SS_SURG1);
													if(sizeof($SS_LIST1)==1){
														$S_LN1 = trim($SS_LIST1[0]);
													}else{
														$S_LN1 = trim($SS_LIST1[1]);
													}

													$SS_SURG2 = $_POST["SURG_LIC2"];
													$SS_LIST2 = explode("-",$SS_SURG2);
													if(sizeof($SS_LIST2)==1){
														$S_LN2 = trim($SS_LIST2[0]);
													}else{
														$S_LN2 = trim($SS_LIST2[1]);
													}

													$SS_INTER = $_POST["INTERNIST"];
													$SI_LIST = explode("-",$SS_INTER);
													if(sizeof($SI_LIST)==1){
														$S_I = trim($SI_LIST[0]);
													}else{
														$S_I = trim($SI_LIST[1]);
													}

													$SS_INTER1 = $_POST["INTERNIST1"];
													$SI_LIST1 = explode("-",$SS_INTER1);
													if(sizeof($SI_LIST1)==1){
														$S_I1 = trim($SI_LIST1[0]);
													}else{
														$S_I1 = trim($SI_LIST1[1]);
													}

													$SS_INTER2 = $_POST["INTERNIST2"];
													$SI_LIST2 = explode("-",$SS_INTER2);
													if(sizeof($SI_LIST2)==1){
														$S_I2 = trim($SI_LIST2[0]);
													}else{
														$S_I2 = trim($SI_LIST2[1]);
													}

													$SS_ANES = $_POST["ANESTHESIOLOGIST"];
													$SA_LIST = explode("-",$SS_ANES);
													if(sizeof($SA_LIST)==1){
														$S_AN = trim($SA_LIST[0]);
													}else{
														$S_AN = trim($SA_LIST[1]);
													}

													$toupdate = $_POST["surgery_update"];
													$S_update = "UPDATE SURGERY SET CASE_NUM = '$S_CN', SURG_LICENSE_NUM = '$S_LN', SURG_LICENSE_NUM1 = '$S_LN1', SURG_LICENSE_NUM2 = '$S_LN2', PAT_ID_NUM = '$S_ID', VISUAL_IMPARITY = '$S_VI', MED_HISTORY = '$S_MH', RIGHT_DIAGNOSIS = '$S_RD', LEFT_DIAGNOSIS = '$S_LD', SURG_ANESTHESIA = '$S_TA', SURG_ADDRESS ='$S_A', SURG_DATE ='$S_DATE', REMARKS ='$S_R', INTERNIST = '$S_I', INTERNIST1 = '$S_I1', INTERNIST2 = '$S_I2', ANESTHESIOLOGIST = '$S_AN', IOLPOWER = '$S_IOL', PC_IOL = '$PC_IOL', PC_LAB = '$PC_L', PC_PF = '$PC_PF', SPO_IOL = '$SP_IOL', CSF_HBILL = '$C_HB', CSF_SUPPLIES = '$C_S', CSF_LAB = '$C_L', NDDCH_RA = '$N_RA', NDDCH_ZEISS = '$N_ZEISS', NDDCH_SUPPLIES = '$N_SUPP', LF_PF = '$L_PF', LF_CPC = '$L_CPC' WHERE CASE_NUM = '$toupdate' ";
													if ($mydatabase->query($S_update) === TRUE) {
														//echo "Record updated successfully";
													} else {
														echo '
														<div class="alert alert-danger alert-dismissable">
															<a class="close" data-dismiss="alert" aria-label="close">×</a>
															<strong>Error updating record: </strong>'.$mydatabase->error.
														'</div>';
													}
												}//RECIEVE UPDATE END
											} else {};
											if (isset($_GET["delete"])) {
												$delete_p=$_GET["delete"]; $DEFAULT=2;
											} else {};

											//FILTER ADD
											if(isset($_POST["filter_check"])){
												//var_dump($_POST);
												$F_DD = $F_MM = $F_YY = $F_LN = $F_CI = $F_DR = $F_AN = "";
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

													if(isset($_POST["DR"])){
														$F_DR = $_POST["DR"];

														if($F_DR=="any"){
															if(strlen($_POST["FSL"])>0){
																$FIL_DOC = $_POST["FSL"];
																$FD_LIST = explode(" - ",$FIL_DOC);
																if(sizeof($FD_LIST)==1){
																	$doc_lic = trim($FD_LIST[0]);
																}else{
																	$doc_lic = trim($FD_LIST[1]);
																}
																$F_LN = ' AND ( s.SURG_LICENSE_NUM='.$doc_lic.' OR s.SURG_LICENSE_NUM1='.$doc_lic.' OR s.SURG_LICENSE_NUM2='.$doc_lic.' OR s.ANESTHESIOLOGIST='.$doc_lic.' OR s.INTERNIST='.$doc_lic.' OR s.INTERNIST1='.$doc_lic.' OR s.INTERNIST2='.$doc_lic.' ) ';
															}
														}else{

															if(strlen($_POST["FSL"])>0){
																$FIL_DOC = $_POST["FSL"];
																$FD_LIST = explode(" - ",$FIL_DOC);
																if(sizeof($FD_LIST)==1){
																	$doc_lic = trim($FD_LIST[0]);
																}else{
																	$doc_lic = trim($FD_LIST[1]);
																}

																if($F_DR=="Surgeon"){
																	$F_DR = "s.SURG_LICENSE_NUM = ".$doc_lic." OR s.SURG_LICENSE_NUM = ".$doc_lic." OR s.SURG_LICENSE_NUM2 = ".$doc_lic;
																}elseif ($F_DR=="Internist") {
																	$F_DR = "s.INTERNIST = ".$doc_lic." OR s.INTERNIST1 = ".$doc_lic." OR s.INTERNIST2 = ".$doc_lic;
																}elseif ($F_DR=="Anesthesiologist") {
																	$F_DR = "s.ANESTHESIOLOGIST = ".$doc_lic;
																}

																$F_LN = ' AND ( '.$F_DR.' )';
																	
															}
														}
													}
												}
												if(isset($_POST["FCI"])) {
													if(strlen($_POST["FCI"])>0){
															$FIL_PAT = $_POST["FCI"];
															$FPI_LIST = explode(" - ",$FIL_PAT);
															if(sizeof($FP_LIST)==1){
																$patient_id = '"'.trim($FPI_LIST[0]).'"';
															}else{
																$patient_id = '"'.trim($FPI_LIST[1]).'"';
															}
															$F_CI = ' AND s.PAT_ID_NUM='.$patient_id;
														}
												}
												if(isset($_POST["FAN"])){
													if(strlen($_POST["FAN"])>0){
														$F_AN = 'AND SURG_ANESTHESIA="'.$_POST["FAN"].'" ';
													}
												}

												$filter = $F_DD.$F_MM.$F_YY.$F_CI.$F_LN.$F_AN;
											} else {
												$filter = "";
											}
											//FILTER ADD END

											//MYSQL SECTION
											$S_query = "SELECT * FROM SURGERY s, DOCTOR d, EYEPATIENT p WHERE s.SURG_LICENSE_NUM = d.DOC_LICENSE_NUM AND p.PAT_ID_NUM = s.PAT_ID_NUM AND s.VISIBLE != 'N' $filter ORDER by s.SURG_DATE desc";
											$output = $mydatabase->query($S_query);
											//MYSQL SECTION END
        
											if($DEFAULT==0){
												//FILTER
												include("surgery_filter.php");
												//FILTER END
												//MAIN PAGE
												if ($output->num_rows>0) {
													echo '<table id="docdat" class="table table-striped row">
															<thead>
																<tr id="tophead">
																<td style="color:#ffffff">Date</td>
																<td style="color:#ffffff">Case No.</td>
																<td style="color:#ffffff">Patient</td>
																<td style="color:#ffffff">Surgeon</td>
																<td style="color:#ffffff">Action</td>
																</tr>
															</thead>';
													while($dataline = $output->fetch_assoc()) { 
														echo 	'<tr>
																	<td>'.$dataline["SURG_DATE"].'</td>
																	<td>'.$dataline["CASE_NUM"].'</td>
																	<td><a href="patient.php?profilepage='.$dataline["PAT_ID_NUM"].'" style="text-decoration:none;"><span class="fa fa-external-link"></span> <span style="color:#000000; margin-left:5px;">'.$dataline["PAT_FNAME"].' '.$dataline["PAT_LNAME"].'</span></a></td>
																	<td><a href="doctors.php?profilepage='.$dataline["DOC_LICENSE_NUM"].'" style="text-decoration:none;"><span class="fa fa-external-link"></span><span style="color:#000000; margin-left:5px;">'.$dataline["LAST_NAME"].' '.$dataline["FIRST_NAME"].'</span></a></td>
																	<td>

																		<a href=""><span class="fa fa-pencil" title="Edit"></span></a>

																		<a role="button" id="del_out" onclick="'.'" ><span class="fa fa-trash" title="Delete"></span></a>
																		<a href="'.'surgery.php'.'?profilepage='.$dataline["CASE_NUM"].'">'.'<span class="fa fa-eye" title="See full details"></span></a>
																	</td>
																</tr>';
													}
													echo	'</tbody>
														</table>';

														echo '<button style="display:none;" id="del_button" value="surgery"></button>';

												} else {
													echo "No Records.";
												}
												//MAIN PAGE END
											}else if ($DEFAULT==1) {
												//FULL DETAILS PAGE
												//MYSQL SECTION
												$output1 = $mydatabase->prepare("SELECT s.*, d.LAST_NAME, d.FIRST_NAME, p.PAT_FNAME, p.PAT_LNAME FROM SURGERY s, DOCTOR d, EYEPATIENT p where s.SURG_LICENSE_NUM = d.DOC_LICENSE_NUM and p.PAT_ID_NUM = s.PAT_ID_NUM and CASE_NUM ='$profile_p' ");      
												$output1->execute();
												$line = $output1->get_result();
												$dataline = $line->fetch_assoc();
												
												//MYSQL SECTION END

												//VALUES
												$S_CN = $dataline["CASE_NUM"];
												$S_DATE = $dataline["SURG_DATE"];
												$S_A = $dataline["SURG_ADDRESS"];
												
												$S_LN = $dataline["SURG_LICENSE_NUM"];
												$S_LN1 = $dataline["SURG_LICENSE_NUM1"];
												$S_LN2 = $dataline["SURG_LICENSE_NUM2"];
												$S_I = $dataline["INTERNIST"];
												$S_I1 = $dataline["INTERNIST1"];
												$S_I2 = $dataline["INTERNIST2"];
												$S_AN = $dataline["ANESTHESIOLOGIST"];

												$S_ID = $dataline["PAT_ID_NUM"];
												$S_VI = $dataline["VISUAL_IMPARITY"];
												$S_MH = $dataline["MED_HISTORY"];
												$S_RD = $dataline["RIGHT_DIAGNOSIS"];
												$S_LD = $dataline["LEFT_DIAGNOSIS"];
												$S_R = $dataline["REMARKS"];

												$S_TA = $dataline["SURG_ANESTHESIA"];
												$S_IOL = $dataline["IOLPOWER"];
												$PC_IOL = "₱ ".number_format($dataline["PC_IOL"], 2);
												$PC_L = "₱ ".number_format($dataline["PC_LAB"], 2);
												$PC_PF = "₱ ".number_format($dataline["PC_PF"], 2);
												$SP_IOL = "₱ ".number_format($dataline["SPO_IOL"], 2);
												$C_HB = "₱ ".number_format($dataline["CSF_HBILL"], 2);
												$C_S = "₱ ".number_format($dataline["CSF_SUPPLIES"], 2);
												$C_L = "₱ ".number_format($dataline["CSF_LAB"], 2);

												$date = explode("-", $S_DATE);
												//VALUES END

												$val_date = $date[1]."/".$date[2]."/".$date[0];



												$output_1 = $mydatabase->prepare("SELECT LAST_NAME, FIRST_NAME FROM DOCTOR WHERE DOC_LICENSE_NUM='$S_LN1'");
												$output_1->execute();
												$line_1 = $output_1->get_result();
												$dataline_1 = $line_1->fetch_assoc();

												$output_2 = $mydatabase->prepare("SELECT LAST_NAME, FIRST_NAME FROM DOCTOR WHERE DOC_LICENSE_NUM='$S_LN2'");
												$output_2->execute();
												$line_2 = $output_2->get_result();
												$dataline_2 = $line_2->fetch_assoc();
												
												$output2 = $mydatabase->prepare("SELECT LAST_NAME, FIRST_NAME FROM DOCTOR WHERE DOC_LICENSE_NUM='$S_I'");
												$output2->execute();
												$line2 = $output2->get_result();
												$dataline2 = $line2->fetch_assoc();

												$output2 = $mydatabase->prepare("SELECT LAST_NAME, FIRST_NAME FROM DOCTOR WHERE DOC_LICENSE_NUM='$S_I'");
												$output2->execute();
												$line2 = $output2->get_result();
												$dataline2 = $line2->fetch_assoc();

												$output21 = $mydatabase->prepare("SELECT LAST_NAME, FIRST_NAME FROM DOCTOR WHERE DOC_LICENSE_NUM='$S_I1'");
												$output21->execute();
												$line21 = $output21->get_result();
												$dataline21 = $line21->fetch_assoc();

												$output22 = $mydatabase->prepare("SELECT LAST_NAME, FIRST_NAME FROM DOCTOR WHERE DOC_LICENSE_NUM='$S_I2'");
												$output22->execute();
												$line22 = $output22->get_result();
												$dataline22 = $line22->fetch_assoc();
												
												$output3 = $mydatabase->prepare("SELECT LAST_NAME, FIRST_NAME FROM DOCTOR WHERE DOC_LICENSE_NUM='$S_AN'");
												$output3->execute();
												$line3 = $output3->get_result();
												$dataline3 = $line3->fetch_assoc();
												
												$SURG_NAME = $dataline["FIRST_NAME"].' '.$dataline["LAST_NAME"];
												$SURG_NAME1 = $dataline_1["FIRST_NAME"].' '.$dataline_1["LAST_NAME"];
												$SURG_NAME2 = $dataline_2["FIRST_NAME"].' '.$dataline_2["LAST_NAME"];
												$INTER_NAME = $dataline2["FIRST_NAME"].' '.$dataline2["LAST_NAME"];
												$INTER_NAME1 = $dataline21["FIRST_NAME"].' '.$dataline21["LAST_NAME"];
												$INTER_NAME2 = $dataline22["FIRST_NAME"].' '.$dataline22["LAST_NAME"];
												$ANES_NAME = $dataline3["FIRST_NAME"].' '.$dataline3["LAST_NAME"];
												$PATIENT_NAME = $dataline["PAT_FNAME"].' '.$dataline["PAT_LNAME"];

												$DIFF = $dataline["NDDCH_SUPPLIES"]-$dataline["CSF_SUPPLIES"];
												$PC_SUM = $dataline["PC_IOL"]+$dataline["PC_LAB"]+$dataline["PC_PF"];
												$CSF_SUM = $dataline["CSF_HBILL"]+$dataline["CSF_SUPPLIES"]+$dataline["CSF_LAB"];
												$NDDCH_SUM = $dataline["NDDCH_RA"]+$dataline["NDDCH_ZEISS"]+$dataline["PC_PF"];
												$LF_SUM = $dataline["LF_PF"]+$dataline["LF_CPC"];
												$SPO_SUM = $dataline["SPO_IOL"]+$dataline["SPO_OTHERS"];
												$TOTAL_ALL = $dataline["PC_IOL"]+$dataline["PC_LAB"]+$dataline["PC_PF"]+$dataline["CSF_HBILL"]+$dataline["CSF_SUPPLIES"]+$dataline["CSF_LAB"]+$dataline["SPO_IOL"];

												$patient_link = "patient.php?profilepage=".$S_ID;
												$placeholder = "placeholder";

												$to_surg = "doctors.php?profilepage=".$S_LN;
												$to_surg1 = "doctors.php?profilepage=".$S_LN1;
												$to_surg2 = "doctors.php?profilepage=".$S_LN2;
												$to_intern = "doctors.php?profilepage=".$S_I;
												$to_intern1 = "doctors.php?profilepage=".$S_I1;
												$to_intern2 = "doctors.php?profilepage=".$S_I2;
												$to_anes = "doctors.php?profilepage=".$S_AN;

												$margin0 = "25%";
												$margin00 = "75%";
												$margin000 = "50%";

												$E_link = '<span class="fa fa-external-link"></span>';

												//CONTENT
												echo '<div>
													<div class="container-fluid">
														<h3>Case No. '.$S_CN.'</h3>

														<div class="row" style="">

														<div style="width:60%; float:left; margin:0px; padding-right:20px;">
														<div class="panel panel-default" style="padding-bottom:10px;">
															<div class="panel-heading" id="tophead1" >Surgery Details</div>
															<div class="panel-body" style="margin:0px; padding:5px 10px;">	

																<div class="row" style="margin:0px; padding:5px 10px;">
																	<div style="font-weight:bold; width:'.$margin0.'; float: left;">'.'Date:'.'</div>
																	<div style="width:'.$margin00.'; float: left;">'.$MONTH_choice[$date[1]-1].' '.$date[2].', '.$date[0].'</div>
																</div>
																<div class="row" style="margin:0px; padding:5px 10px;">
																	<div style="font-weight:bold; width:'.$margin0.'; float: left;">'.'Address:'.'</div>
																	<div style="width:'.$margin00.'; float: left;">'.$S_A.'</div>
																</div>

															</div>
														</div>
														</div>

														<div style="width:40%; float: left;">
														<div class="well">
															<div style="margin:0px; padding:10px 0px;">	

																<div class="row" style="margin:0px; padding:5px 10px;">
																	<div style="font-weight:bold; width:50%; float: left;">'.'IOL Power:'.'</div>
																	<div style="width:50%; float: left;">'.$dataline["IOLPOWER"].'</div>
																</div>
																<div class="row" style="margin:0px; padding:5px 10px;">
																	<div style="font-weight:bold; width:50%; float: left;">'.'Anesthesia:'.'</div>
																	<div style="width:50%; float: left;">'.$dataline["SURG_ANESTHESIA"].'</div>
																</div>
																<div style="padding-bottom:5px;"></div>

															</div>
														</div>
														</div>

														</div>

														<div class="row" style="">
														<div class="panel panel-default" style="padding-bottom:10px;">
															<div class="panel-heading" style="color:#337ab7;">Doctors</div>
															<div class="panel-body" style="margin:0px; padding:5px 10px;">	
																	
																<div class="row" style="margin:0px; padding:5px 10px;">
																	<div style="font-weight:bold; width:'.$margin0.'; float: left;">'.'Surgeon:'.'</div>
																	<div style="width:'.$margin00.'; float: left;">
																		<a href="'.$to_surg.'" style="float:left;">  <span style="color:#000000; float:left; margin-right:5px;">'.$SURG_NAME.' </span> '.$E_link.'</a>';

																	if(strlen($S_LN1)>1){
																		echo '<span style="float:left; margin-right:10px;">, </span>  <a href="'.$to_surg1.'" style="float:left;">  <span style="color:#000000; float:left; margin-right:5px;">'.$SURG_NAME1.' </span> '.$E_link.'</a>';
																	}

																	if(strlen($S_LN2)>1){
																		echo '<span style="float:left; margin-right:10px;">, </span>  <a href="'.$to_surg2.'" style="float:left;">  <span style="color:#000000; float:left; margin-right:5px;">'.$SURG_NAME2.' </span> '.$E_link.'</a>';
																	}

																echo '</div></div>

																<div class="row" style="margin:0px; padding:5px 10px;">
																	<div style="font-weight:bold; width:'.$margin0.'; float: left;">'.'Internist:'.'</div>
																	<div style="width:'.$margin00.'; float: left;">
																		<a href="'.$to_intern.'" style="float:left;"><span style="color:#000000; float:left; margin-right:5px;">'.$INTER_NAME.' </span> '.$E_link.'</a>';

																	if(strlen($S_I1)>1){
																		echo '<span style="float:left; margin-right:10px;">, </span> <a href="'.$to_intern1.'" style="float:left;">  <span style="color:#000000; float:left; margin-right:5px;">'.$INTER_NAME1.' </span> '.$E_link.'</a>';
																	}

																	if(strlen($S_I2)>1){
																		echo '<span style="float:left; margin-right:10px;">, </span> <a href="'.$to_intern2.'" style="float:left;">  <span style="color:#000000; float:left; margin-right:5px;">'.$INTER_NAME2.' </span> '.$E_link.'</a>';
																	}

																echo '</div></div>

																<div class="row" style="margin:0px; padding:5px 10px;">
																	<div style="font-weight:bold; width:'.$margin0.'; float: left;">'.'Anesthesiologist:'.'</div>
																	<div style="width:'.$margin00.'; float: left;"><a href="'.$to_anes.'"><span style="color:#000000; float:left; margin-right:5px;">'.$ANES_NAME.' </span> '.$E_link.'</a></div>
																</div>

															</div>
														</div>
														</div>

														<div class="row" style="">
														<div class="panel panel-default" style="padding-bottom:10px;">
															<div class="panel-heading" style="color:#337ab7;">Patient Information</div>
															<div class="panel-body" style="margin:0px; padding:5px 10px;">	
																	
																	<div class="row" style="margin:0px; padding:5px 10px;">
																	<div style="font-weight:bold; width:'.$margin0.'; float: left;">'.'Name:'.'</div>

																	<div style="width:'.$margin00.'; float: left;">'.$PATIENT_NAME.'</div>
																</div>
																<div class="row" style="margin:0px; padding:5px 10px;">
																	<div style="font-weight:bold; width:'.$margin0.'; float: left;">'.'Visual Impairment:'.'</div>
																	<div style="width:'.$margin00.'; float: left;">'.$S_VI.'</div>
																</div>
																<div class="row" style="margin:0px; padding:5px 10px;">
																	<div style="font-weight:bold; width:'.$margin0.'; float: left;">'.'Medical History:'.'</div>
																	<div style="width:'.$margin00.'; float: left;">'.$S_MH.'</div>
																</div>

																<div style="margin:0px; padding:5px 5px; float:right;"><a href="'.$patient_link.'">
																<span style="float:left; margin-right:5px;">see patient profile</span>'.$E_link.'</a></div>

															</div>
														</div>
														</div>

														<div class="row" style="">
														<div class="panel panel-default" style="padding-bottom:10px; margin:0px;">
															<div class="panel-heading" style="color:#337ab7;">Surgery Report</div>
															<div class="panel-body" style="margin:0px; padding:5px 10px;">	
																	
																<div class="row" style="margin:0px; padding:5px 10px;">
																	<div style="font-weight:bold; width:'.$margin0.'; float: left;">'.'Right Eye Diagnosis'.'</div>
																	<div style="width:'.$margin00.'; float: left;">'.$S_RD.'</div>
																</div>
																<div class="row" style="margin:0px; padding:5px 10px;">
																	<div style="font-weight:bold; width:'.$margin0.'; float: left;">'.'Left Eye Diagnosis'.'</div>
																	<div style="width:'.$margin00.'; float: left;">'.$S_LD.'</div>
																</div>
																<div class="row" style="margin:0px; padding:5px 10px;">
																	<div style="font-weight:bold; width:'.$margin0.'; float: left;">'.'Remarks'.'</div>
																	<div style="width:'.$margin00.'; float: left;">'.$S_R.'</div>
																</div>

															</div>
														</div>
														</div>

														<div class="row" style="margin:0px; padding: 10px 0px 20px 0px;"><hr style="border-color:#337ab7;"></div>

														<div class="well" style="width: 100%; float: left; color:#337ab7; font-weight:bold; text-align:center;">Financial Report</div>

														<div style="width:100%;">
														
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
																				<td>₱ '.number_format($dataline["PC_IOL"], "2").'</td>
																			</tr>
																			<tr>
																				<td>LAB</td>
																				<td>₱ '.number_format($dataline["PC_LAB"], "2").'</td>
																			</tr>
																			<tr>
																				<td>PF(others)</td>
																				<td>₱ '.number_format($dataline["PC_PF"], "2").'</td>
																			</tr>
																			<tr>
																				<td>Total</td>
																				<td>₱ '.number_format($PC_SUM, "2").'</td>
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
																				<td>₱ '.number_format($dataline["CSF_HBILL"], "2").'</td>
																			</tr>
																			<tr>
																				<td>Supplies</td>
																				<td>₱ '.number_format($dataline["CSF_SUPPLIES"], "2").'</td>
																			</tr>
																			<tr>
																				<td>Laboratory</td>
																				<td>₱ '.number_format($dataline["CSF_LAB"], "2").'</td>
																			</tr>
																			<tr>
																				<td>Total</td>
																				<td>₱ '.number_format($CSF_SUM, "2").'</td>
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
																				<td>₱ '.number_format($dataline["NDDCH_RA"], "2").'</td>
																			</tr>
																			<tr>
																				<td>ZEISS</td>
																				<td>₱ '.number_format($dataline["NDDCH_ZEISS"], "2").'</td>
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

																		<table class="table table-condensed" style="margin-bottom:10px;">
																		<thead>
																			<tr>
																				<th>Comparison</th>
																				<th></th>
																			</tr>
																		</thead>
																		<tbody>
																			<tr>
																				<td>NDDCH Supplies</td>
																				<td>₱ '.number_format($dataline["NDDCH_SUPPLIES"], "2").'</td>
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
																						<td>₱ '.number_format($dataline["SPO_IOL"], "2").'</td>
																					</tr>
																					<tr>
																						<td>Others</td>
																						<td>₱ '.number_format($dataline["SPO_OTHERS"], "2").'</td>
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
																				<td>₱ '.number_format($dataline["LF_PF"], "2").'</td>
																			</tr>
																			<tr>
																				<td>CPC Fee</td>
																				<td>₱ '.number_format($dataline["LF_CPC"], "2").'</td>
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

																			<div style="float:left; width:40%; font-weight:bold;">Grand Total:</div>
																			<div style="float:left; width:60%;">₱ '.number_format($TOTAL_ALL, "2").'</div>

																		</div>
																</div>

														</div>
													</div>
												</div>';
												//CONTENT END

												//BUTTONS AND LINKS
												$back = "'surgery.php'";
												echo '<div id="link_buttons" style="margin:20px 0px;">';
												echo '<button class="btn btn-default" id="del_button" value="surgery" data-toggle="modal" data-target="#confirm_this" style="margin-left:15px;" disabled> <span class="fa fa-trash" style="font-size:15px;"></span> Delete </button>';
												echo '<button type="button" class="btn btn-default" data-toggle="modal" data-target="#EditBox" style="margin-left:10px;"><span class="fa fa-edit" style="font-size:15px;"></span> Edit</button>';
												echo '<button type="button" class="btn btn-default" id="enable_disable" style="margin-left:10px;" onclick="pass()" title="Authorize delete and editing of accounts"><span class="fa fa-check" style="font-size:15px; margin-right:5px;"></span>Enable</button>';
												echo '<div style="text-align:right;"><button class="btn" id="go" style="margin-right:15px;" onclick="window.location.href='.$back.'">Back</button></div>';
												echo '</div>';
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
												echo '<div class="container-fluid">
																		<form method="post" id="updating" >

																			<div style="width:100%; float:left; margin-bottom: 10px;">

																			<p style="margin-bottom: 20px; color:#666666;">
										          Please do not leave the required<span style="color: #d9534f">*</span> fields blank. If there are no entries, use indicators (such as n/a or NA).
										        </p>

																			<div class="container-fluid" style="margin-bottom: 10px;">
																				<label for="CASE_NUM" style="width: '.$leftmargin.'px; float: left; ">Surgery Case Number<span style="color: #d9534f">*</span> </label>
																				<input pattern="20\d\d-\d\d\d\d\d" class="form-control" placeholder="20XX-XXXXX" id="CASE_NUM" maxlength="'.$CASE_LENG.'" name="CASE_NUM" value="'.$S_CN.'" style="width: 150px; float: left;" required readonly>
																			</div>

																			<div class="container-fluid" style="margin-bottom: 10px;">
																				<label class="control-label" style="float:left; width:'.$leftmargin.'px;">Date of Surgery </label>
																				<div class="form-group">
																					<div class="input-group date" id="datetimepicker3" style="float:left; width:250px;">
																						<input type="text" class="form-control" pattern="^\d{1,2}\/\d{1,2}\/\d{4}$" id="DATE" name="DATE" placeholder="MM/DD/YYYY" value="'.$val_date.'">
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
																				<label for="SURG_ADDRESS" style="width: '.$leftmargin.'px; float: left; ">Surgery Address<span style="color: #d9534f">*</span> </label>
																				<input pattern="[a-zA-Z0-9 .,:;()*/-!_]*" placeholder="Enter address of where the sugery was conducted..." type="text" class="form-control" id="SURG_ADDRESS" maxlength="'.$SURGADD_MAX.'" name="SURG_ADDRESS" value="'.$S_A.'" style="max-width: 450px; float: left;">
																			</div>

																			</div>

																			<div style="width:100%;">

																			<div style="width:100%; float:left;">
																			<div class="well" style="width:100%; float: left;  padding-left:10px;" >

																			<div class="container-fluid">
																				<label for="SURG_LIC" style="float:left; width:40%;">Surgeon<span style="color: #d9534f">*</span></label>
																				<div style="width: 60%; float: left;">
																				<div style="margin:5px 5px 5px 0px; width: 320px; float:left;">
																					<input pattern="^(([a-zA-Z](\w*)[ ][a-zA-Z](\w*)[ ][-][ ])*)(\d{5,7}$)" title="License No. (0000000-9999999) or Name and License (Firstname Surname - License no.)" class="form-control typeahead tt-query" autocomplete="off" id="SURG_LIC" maxlength="'.$SURG_LENG.'" name="SURG_LIC" placeholder="Surgeon Name or License" value="'.$S_LN.'" required>
																				</div>
																				<div class="add_s1" style="margin:5px 5px 5px 0px; width: 320px; float:left;">
																					<input pattern="^(([a-zA-Z](\w*)[ ][a-zA-Z](\w*)[ ][-][ ])*)(\d{5,7}$)" title="License No. (0000000-9999999) or Name and License (Firstname Surname - License no.)" class="form-control typeahead tt-query" autocomplete="off" id="SURG_LIC1" maxlength="'.$SURG_LENG.'" name="SURG_LIC1" placeholder="Surgeon Name or License (Optional)" value="'.$S_LN1.'">
																				</div>
																				<div class="add_s2" style="margin:5px 5px 5px 0px; width: 320px; float:left;">
																					<input pattern="^(([a-zA-Z](\w*)[ ][a-zA-Z](\w*)[ ][-][ ])*)(\d{5,7}$)" title="License No. (0000000-9999999) or Name and License (Firstname Surname - License no.)" class="form-control typeahead tt-query" autocomplete="off" id="SURG_LIC2" maxlength="'.$SURG_LENG.'" name="SURG_LIC2" placeholder="Surgeon Name or License (Optional)" value="'.$S_LN2.'">
																				</div>
																				<a role="button" id="add_surg" class="btn btn-default" title="Add another surgeon" style="font-size:14px; color:#337ab7; float:left; margin:5px 5px 5px 0px;"><span class="fa fa-plus"></span></a>
																				<a role="button" id="minus_surg" class="btn btn-default" style="font-size:14px; color:#337ab7; float:left; margin:5px 5px 5px 0px;"><span class="fa fa-minus"></span></a>
																				</div>
																			</div>

																			<div class="container-fluid">
																				<label for="INTERNIST" style="width: 40%; float: left; ">Internist<span style="color: #d9534f">*</span></label>
																				<div style="width: 60%; float: left;">
																				<div style="margin:5px 5px 5px 0px; width: 320px; float:left;">
																					<input pattern="^(([a-zA-Z](\w*)[ ][a-zA-Z](\w*)[ ][-][ ])*)(\d{5,7}$)" title="License No. (0000000-9999999) or Name and License (Firstname Surname - License no.)" class="form-control typeahead tt-query" autocomplete="off" id="INTERNIST" maxlength="'.$INTER_MAX.'" name="INTERNIST" placeholder="Internist Name or License" value="'.$S_I.'" required>
																				</div>
																				<div class="add_i1" style="margin:5px 5px 5px 0px; width: 320px; float:left;">
																				<input pattern="^(([a-zA-Z](\w*)[ ][a-zA-Z](\w*)[ ][-][ ])*)(\d{5,7}$)" title="License No. (0000000-9999999) or Name and License (Firstname Surname - License no.)" class="form-control typeahead tt-query" autocomplete="off" id="INTERNIST1" maxlength="'.$INTER_MAX.'" name="INTERNIST1" placeholder="Internist Name or License (Optional)" value="'.$S_I1.'">
																				</div>
																				<div class="add_i2" style="margin:5px 5px 5px 0px; width: 320px; float:left;">
																				<input pattern="^(([a-zA-Z](\w*)[ ][a-zA-Z](\w*)[ ][-][ ])*)(\d{5,7}$)" title="License No. (0000000-9999999) or Name and License (Firstname Surname - License no.)" class="form-control typeahead tt-query" autocomplete="off" id="INTERNIST2" maxlength="'.$INTER_MAX.'" name="INTERNIST2" placeholder="Internist Name or License (Optional)" value="'.$S_I2.'">
																				</div>
																				<a role="button" id="add_inter" class="btn btn-default" title="Add another internist" style="font-size:14px; color:#337ab7; float:left; margin:5px 5px 5px 0px;"><span class="fa fa-plus"></span></a>
																				<a role="button" id="minus_inter" class="btn btn-default" style="font-size:14px; color:#337ab7; float:left; margin:5px 5px 5px 0px;"><span class="fa fa-minus"></span></a>
																				</div>
																			</div>

																			<div class="container-fluid">
																				<label for="ANESTHESIOLOGIST" style="width: 40%; float: left; ">Anesthesiologist<span style="color: #d9534f">*</span></label>
																				<div style="width: 60%; float: left;">
																				<div style="margin:5px 5px 5px 0px; width: 320px; float:left;">
																					<input pattern="^(([a-zA-Z](\w*)[ ][a-zA-Z](\w*)[ ][-][ ])*)(\d{5,7}$)" title="License No. (0000000-9999999) or Name and License (Firstname Surname - License no.)" class="form-control typeahead tt-query" autocomplete="off" id="ANESTHESIOLOGIST" maxlength="'.$ANEST_MAX.'" name="ANESTHESIOLOGIST" placeholder="Anesthesiologist Name or License" value="'.$S_AN.'" required>
																				</div>
																				</div>
																			</div>

																			</div>
																			</div>

																			<div style="width:50%; float:left; padding-right: 20px;">
																			<div class="well" style="width:100%; float: left;  padding-left:10px;">
																			
																			<div class="container-fluid" style="margin-bottom: 10px;">
																				<label for="IOLPOWER" style="width: 40%; float: left; ">IOL Power<span style="color: #d9534f">*</span></label>
																				<input placeholder="IOL" type="text" class="form-control" id="IOLPOWER" maxlength="'.$IOL_MAX.'" name="IOLPOWER" value="'.$S_IOL.'" style="width: 60%; float: left;" required>
																			</div>

																			</div>
																			</div>

																			<div style="width:50%; float:left;">
																			<div class="well" style="width:100%; float: left;  padding-left:10px;">

																			<div class="container-fluid" style="margin-bottom: 10px;">
																				<label for="SURG_ANESTHESIA" style="width:40%; float: left; ">Anesthesia<span style="color: #d9534f">*</span></label>
																				<div style="width: 60%; float: left;" id="SURG_ANESTHESIA" name="SURG_ANESTHESIA">';

							             echo '<label class="radio-inline" id="TANES"><input id="ANES_GEN" name="TANES" type="radio" value="General" required>General</label>
																					<label class="radio-inline" id="TANES"><input ID="ANES_LOC" name="TANES" type="radio" value="Local">Local</label>
							             </div>
																			</div>

																			<script>
																				var anes = "'.$dataline["SURG_ANESTHESIA"].'";
																				if(anes=="General"){
																					document.getElementById("ANES_GEN").checked = true;
																				}else{
																					document.getElementById("ANES_LOC").checked = true;
																				}
																			</script>

																			</div>
																			</div>
																			
																			</div>
																			
																			<div style="width:100%; float:left;">
																				<div class="panel panel-default" style="padding-bottom:10px;">
																					<div class="panel-heading" style="color:#337ab7;">Patient Information</div>
																					<div class="panel-body" style="margin:0px; padding:5px 10px;">	

																					<div style="margin-bottom:10px;"></div>

																					<div class="container-fluid" style="margin-bottom: 10px;">
																						<label for="PAT_ID" style="width: 25%; float: left; ">Patient<span style="color: #d9534f">*</span></label>
																						<div style="width: 250px; float: left;">
																						<input pattern="^(([a-zA-Z]([a-zA-Z ]*)[ ][a-zA-Z]([a-zA-Z]*)[ ][-][ ])*)(([C][A][T]\d{4}[-]\d{3})$)" class="form-control typeahead1 tt-query" autocomplete="off" id="PAT_ID" placeholder="Patient Name or ID number" maxlength="'.$ID_LENG.'" name="PAT_ID" value="'.$S_ID.'" style="width:100%;" required>
																						</div>
																					</div>
																							
																					<div class="container-fluid" style="margin-bottom: 10px;">
																						<label for="VI" style="width: 25%; float: left; ">Visual Impairment<span style="color: #d9534f">*</span></label>
																						<div style="width: 75%; padding-right:20px; float:left;">
																						<input pattern="[a-zA-Z0-9 .,:;()*/-!_]*" placeholder="Patient Visual Impairment..." type="text" class="form-control" id="VI" maxlength="'.$VI_MAX.'" name="VI" style="float: left;" rows="2" value="'.$S_VI.'" required>
																						</div>
																					</div>
																					<div class="container-fluid" style="margin-bottom: 10px;">
																						<label for="MED_HIST" style="width: 25%; float: left; ">Medical History </label>
																						<div style="width: 75%; padding-right:20px; float:left;">
																						<input pattern="[a-zA-Z0-9 .,:;()*/-!_]*" placeholder="Patient Medical History..." type="text" class="form-control" id="MED_HIST" maxlength="'.$HIST_MAX.'" name="MED_HIST" style="float: left;" value="'.$S_MH.'">
																						</div>
																					</div>

																					</div>
																				</div>
																			</div>
																			
																			<div style="width:100%; float:left;">
																			<div class="well" style="width:100%; float: left;">
																			
																				<div class="container-fluid" style="margin-bottom: 10px;">
																					<label for="DIAG_RIGHT" style="width: 25%; float: left; ">Right Eye Diagnosis </label>
																					<input pattern="[a-zA-Z0-9 .,:;()*/-!_]*" placeholder="Right Eye Surgery Diagnosis..." type="text" class="form-control" id="DIAG" maxlength="'.$DIAG_MAX.'" name="DIAG_RIGHT" style="width: 75%; float: left;" value="'.$S_RD.'" >
																				</div>
																				<div class="container-fluid" style="margin-bottom: 10px;">
																					<label for="DIAG_LEFT" style="width: 25%; float: left; ">Left Eye Diagnosis </label>
																					<input pattern="[a-zA-Z0-9 .,:;()*/-!_]*" placeholder="Left Eye Surgery Diagnosis..." type="text" class="form-control" id="DIAG" maxlength="'.$DIAG_MAX.'" name="DIAG_LEFT" style="width: 75%; float: left;" value="'.$S_LD.'" >
																				</div>
																				<div class="container-fluid" style="margin-bottom: 10px;">
																					<label for="REM" style="width: 25%; float: left; ">Surgeon Remarks </label>
																					<input pattern="[a-zA-Z0-9 .,:;()*/-!_]*" placeholder="Remarks of Surgeon..." type="text" class="form-control" id="REM" maxlength="'.$REM_MAX.'" name="REM" style="width: 75%; float: left;" value="'.$S_R.'" >
																				</div>
																			
																			</div>
																			</div>

																			<div style="width:100%; float:left;">
																			<div class="well" style="width:100%; float:left; background-color:#fefefe;">

																			<div style="width:100%; float:left; font-weight:bold; color:#337ab7;">Financial Information</div>

																			<div style="width:100%; float:left"><hr style="border-color:#337ab7; margin-top:0px;"></div>

																			<div style="width:100%; margin-bottom:10px; float:left;"></div>
																			
																			<div style="width:100%; float:left;">

																			<div style="width:50%; float:left;">
																			<div style="width:100%; float:left; padding-right:20px;">
																				<div class="panel panel-default" style="padding-bottom:10px;">
																					<div class="panel-heading" style="color:#337ab7;">Patient Counterpart</div>
																					<div class="panel-body" style="margin:0px; padding:5px 10px;">	

																						<div style="margin-bottom:10px;"></div>

																						<div class="container-fluid" style="margin-bottom: 10px;">
																							<label for="PC_IOL" style="width: 50%; float: left; ">IOL</label>
																							<div class="input-group money" style="width:150px; float:left;">
																							<span class="input-group-addon"><strong>₱</strong></span>
																							<input placeholder="IOL" type="text" class="form-control numberOnly" id="PC_IOL" maxlength="'.$PC_MAX.'" name="PC_IOL" value="'.$dataline["PC_IOL"].'" readonly>
																							</div>
																						</div>		
																						<div class="container-fluid" style="margin-bottom: 10px;">
																							<label for="PC_LAB" style="width: 50%; float: left; ">LAB</label>
																							<div class="input-group money" style="width:150px; float:left;">
																							<span class="input-group-addon"><strong>₱</strong></span>
																							<input placeholder="LAB" type="text" class="form-control numberOnly" id="PC_LAB" maxlength="'.$PC_MAX.'" name="PC_LAB" value="'.$dataline["PC_LAB"].'" readonly>
																							</div>
																						</div>
																						<div class="container-fluid" style="margin-bottom: 10px;">
																							<label for="PC_PF" style="width: 50%; float: left; ">PF(Others)</label>
																							<div class="input-group money" style="width:150px; float:left;">
																							<span class="input-group-addon"><strong>₱</strong></span>
																							<input placeholder="PF" type="text" class="form-control numberOnly" id="PC_PF" maxlength="'.$PC_MAX.'" name="PC_PF" value="'.$dataline["PC_PF"].'" readonly>
																							</div>
																						</div>

																					</div>
																				</div>
																			</div>
																			</div>

																			<div style="width:50%; float:left;">
																			<div style="width:100%; float:left;">
																				<div class="panel panel-default" style="padding-bottom:10px;">
																					<div class="panel-heading" style="color:#337ab7;">CSF</div>
																					<div class="panel-body" style="margin:0px; padding:5px 10px;">	

																						<div style="margin-bottom:10px;"></div>

																						<div class="container-fluid" style="margin-bottom: 10px;">
																							<label for="CSF_HBILL" style="width: 50%; float: left; ">HBILL</label>
																							<div class="input-group money" style="width:150px; float:left;">
																							<span class="input-group-addon"><strong>₱</strong></span>
																							<input placeholder="Hospital Bill" type="text" class="form-control numberOnly" id="CSF_HBILL" maxlength="'.$PC_MAX.'" name="CSF_HBILL" value="'.$dataline["CSF_HBILL"].'" readonly>
																							</div>
																						</div>
																						<div class="container-fluid" style="margin-bottom: 10px;">
																							<label for="CSF_SUPPLIES" style="width: 50%; float: left; ">SUPPLIES</label>
																							<div class="input-group money" style="width:150px; float:left;">
																							<span class="input-group-addon"><strong>₱</strong></span>
																							<input placeholder="Supplies" type="text" class="form-control numberOnly" id="CSF_SUPPLIES" maxlength="'.$PC_MAX.'" name="CSF_SUPPLIES" value="'.$dataline["CSF_SUPPLIES"].'" readonly>
																							</div>
																						</div>
																						<div class="container-fluid" style="margin-bottom: 10px;">
																							<label for="CSF_LAB" style="width: 50%; float: left; ">LAB</label>
																							<div class="input-group money" style="width:150px; float:left;">
																							<span class="input-group-addon"><strong>₱</strong></span>
																							<input placeholder="Laboratory" type="text" class="form-control numberOnly" id="CSF_LAB" maxlength="'.$PC_MAX.'" name="CSF_LAB" value="'.$dataline["CSF_LAB"].'" readonly>
																							</div>
																						</div>

																					</div>
																				</div>
																			</div>
																			</div>

																			<div style="width:50%; float:left;">
																			<div style="width:100%; float:left; padding-right:20px;">
																				<div class="panel panel-default" style="padding-bottom:10px;">
																					<div class="panel-heading" style="color:#337ab7;">NDDCH</div>
																					<div class="panel-body" style="margin:0px; padding:5px 10px;">	

																						<div style="margin-bottom:10px;"></div>

																						<div class="container-fluid" style="margin-bottom: 10px;">
																							<label for="NDDCH_RA" style="width: 50%; float: left; ">RA</label>
																							<div class="input-group money" style="width:150px; float:left;">
																							<span class="input-group-addon"><strong>₱</strong></span>
																							<input placeholder="RA" type="text" class="form-control numberOnly" id="NDDCH_RA" maxlength="'.$PC_MAX.'" name="NDDCH_RA" value="'.$dataline["NDDCH_RA"].'" readonly>
																							</div>
																						</div>		
																						<div class="container-fluid" style="margin-bottom: 10px;">
																							<label for="NDDCH_ZEISS" style="width: 50%; float: left; ">ZEISS</label>
																							<div class="input-group money" style="width:150px; float:left;">
																							<span class="input-group-addon"><strong>₱</strong></span>
																							<input placeholder="ZEISS" type="text" class="form-control numberOnly" id="NDDCH_ZEISS" maxlength="'.$PC_MAX.'" name="NDDCH_ZEISS" value="'.$dataline["NDDCH_ZEISS"].'" readonly>
																							</div>
																						</div>

																					</div>
																				</div>
																			
																				<div class="well" style="width:100%; float:left; padding-right:20px;">
																					<label for="NDDCH_SUPPLIES" style="width: 50%; float: left; ">NDDCH SUPPLIES</label>
																					<div class="input-group money" style="width:150px; float:left;">
																					<span class="input-group-addon"><strong>₱</strong></span>
																					<input placeholder="Supplies" type="text" class="form-control numberOnly" id="NDDCH_SUPPLIES" maxlength="'.$PC_MAX.'" name="NDDCH_SUPPLIES" value="'.$dataline["NDDCH_SUPPLIES"].'" readonly>
																					</div>
																				</div>
																			
																			</div>
																			</div>

																			<div style="width:50%; float:left;">
																				<div class="well" style="width:100%; float:left;">
																					<label for="SPO_IOL" style="width: 50%; float: left; ">Sponsored IOL</label>
																					<div class="input-group money" style="width:150px; float:left;">
																					<span class="input-group-addon"><strong>₱</strong></span>
																					<input placeholder="Sponsored" type="text" class="form-control numberOnly" id="SPO_IOL" maxlength="'.$PC_MAX.'" name="SPO_IOL" value="'.$dataline["SPO_IOL"].'" readonly>
																					</div>
																				</div>
																			</div>

																			<div style="width:50%; float:left;">
																			<div style="width:100%; float:left;">

																				<div class="panel panel-default" style="padding-bottom:10px;">
																					<div class="panel-heading" style="color:#337ab7;">LF</div>
																					<div class="panel-body" style="margin:0px; padding:5px 10px;">	

																						<div style="margin-bottom:10px;"></div>

																						<div class="container-fluid" style="margin-bottom: 10px;">
																							<label for="LF_PF" style="width: 50%; float: left; ">Professional Fee</label>
																							<div class="input-group money" style="width:150px; float:left;">
																							<span class="input-group-addon"><strong>₱</strong></span>
																							<input placeholder="PF" type="text" class="form-control numberOnly" id="LF_PF" maxlength="'.$PC_MAX.'" name="LF_PF" value="'.$dataline["LF_PF"].'" readonly>
																							</div>
																						</div>		
																						<div class="container-fluid" style="margin-bottom: 10px;">
																							<label for="LF_CPC" style="width: 50%; float: left; ">CPC Fee</label>
																							<div class="input-group money" style="width:150px; float:left;">
																							<span class="input-group-addon"><strong>₱</strong></span>
																							<input placeholder="CPC" type="text" class="form-control numberOnly" id="LF_CPC" maxlength="'.$PC_MAX.'" name="LF_CPC" value="'.$dataline["LF_CPC"].'" readonly>
																							</div>
																						</div>
																						
																					</div>
																				</div>
																			</div>
																			</div>

																			</div>
																			</div>
																			
																	</div>';
																	//EDIT FORM END
												echo 			'</div>
																<div class="modal-footer" style="text-align:center;">
																		<button type="submit" class="btn btn-default" value="'.$S_CN.'" name="surgery_update">Update</button>
																	</form>
																	<button type="button" class="btn btn-default" data-dismiss="modal" >Cancel</button>
																</div>
															</div>';

															echo '<!-- SCRIPT -->
																<script>

						          	function pass(){
						          		$("#enter_pass").modal("toggle");
						          	}

						          	function go_on(){
						          			$("#enable_disable").attr("disabled", "disabled");
						          			$("#del_button").removeAttr("disabled"); 
						          		 $("#CASE_NUM").attr("readonly", false); 
						          		 $("#SPO_IOL").attr("readonly", false); 
						          		 $("#PC_IOL").attr("readonly", false); 
						          		 $("#PC_LAB").attr("readonly", false); 
						          		 $("#PC_PF").attr("readonly", false); 
						          		 $("#CSF_HBILL").attr("readonly", false); 
						          		 $("#CSF_SUPPLIES").attr("readonly", false); 
						          		 $("#CSF_LAB").attr("readonly", false); 
						          		 $("#NDDCH_RA").attr("readonly", false); 
						          		 $("#NDDCH_ZEISS").attr("readonly", false); 
						          		 $("#NDDCH_SUPPLIES").attr("readonly", false); 
						          		 $("#LF_PF").attr("readonly", false); 
						          		 $("#LF_CPC").attr("readonly", false); 
						          	}
						          	
																</script>
																<!-- SCRIPT END -->';

														// VERIFY PASSWORD

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

													include("pass_verify.php");

												//FULL DETAILS PAGE END
											}else if($DEFAULT==2){
												//DELETE PAGE
												//MYSQL SECTION
												$del = "UPDATE SURGERY SET VISIBLE = 'N' WHERE CASE_NUM = '$delete_p' ";
												if ($mydatabase->query($del) === TRUE) {
													echo "Record deleted.";
													echo '<div class="row" style="text-align:right;"><a role="btn" class="btn" id="go"  href="'.'surgery.php'.'">Back</a></div>';
												} else { 
													echo '<div style="margin-top:10px;" class="alert alert-danger alert-dismissable"><a class="close" data-dismiss="alert" aria-label="close">&times;</a>
														<p><strong>Cannot Delete Record</strong></p>
														<p>Error deleting record: '.$mydatabase->error.'</p></div>'; 
													echo '<div class="row" style="text-align:right;"><a role="btn" class="btn" id="go"  href="'.'surgery.php'.'">Back</a></div>';
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

<script >
//ADD INTERNIST AND SURGEON



$('.add_s1').hide();
$('.add_s2').hide();
$('.add_i1').hide();
$('.add_i2').hide();
$('#minus_surg').hide();
$('#minus_inter').hide();

$(document).ready(function(){
 $("#add_surg").click(function(){
  if($(".add_s1").is(':visible') === true){
  	$(".add_s2").show();
  	$("#add_surg").hide();
  }else{
  	$(".add_s1").show();
  	$("#minus_surg").show();
  }
 });
});

$(document).ready(function(){
 $("#add_inter").click(function(){
  if($(".add_i1").is(':visible') === true){
  	$(".add_i2").show();
  	$("#add_inter").hide();
  }else{
  	$(".add_i1").show();
  	$("#minus_inter").show();
  }
 });
});

$(document).ready(function(){
 $("#minus_inter").click(function(){
  if($(".add_i2").is(':visible') === true){
  	$(".add_i2").hide();
  	$("#add_inter").show();
  }else{
  	$(".add_i1").hide();
  	$("#minus_inter").hide();
  }
 });
});

$(document).ready(function(){
 $("#minus_surg").click(function(){
  if($(".add_s2").is(':visible') === true){
  	$(".add_s2").hide();
  	$("#add_surg").show();
  }else{
  	$(".add_s1").hide();
  	$("#minus_surg").hide();
  }
 });
});

</script>

<script>
	var myTable=$('#docdat').DataTable({
			"search":false,
			"sDom":"ltipr",
			"columns": [ null, null, null, null, { "orderable": false } ],
		});

	$('#dataseek').keyup(function(){
		myTable.search($(this).val()).draw();
	})
</script>

<?php  ?>
