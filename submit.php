<!DOCTYPE html>
<html>
	<head>
		<title>Prototype</title>
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
					<h4>Form Submission</h4> 
				</div>
				<!-- TITLE -->
				<?php  //CODE SECTION START
					//ESTABLISHING MYSQL LINK (1)
					include("dbconnect.php");
					//ESTABLISHING MYSQL LINK END (1)

					//FUNCTIONS (2)

					//INSERT INTO DATABASE 
					//(SAMPLE 1) STILL TO BE REVISED/TESTED....
					function SUBMIT_DOCTOR($D_FNAME, $D_LNAME, $D_LICENSENUM, $D_ADDR, $D_SP){
						$D_query = "INSERT INTO DOCTOR VALUES ('".$D_LICENSENUM."','".$D_LNAME."','".$D_FNAME."','".$D_ADDR."','".$D_SP."', 'T')";
						if ($GLOBALS['mydatabase']->query($D_query) === TRUE){
							$where = "'Home.php'";
							echo "<div class='alert alert-success'>New doctor record successfully created.</div>";
							$whereto = "doctors.php?profilepage=".$D_LICENSENUM;
							echo '<div><button class="btn" id="go" onclick="location.href='.$where.'" style="float:right; margin-left:10px;" > Back-to-Home </button></div>';
							echo '<div><a role="button" class="btn" id="go" href="'.$whereto.'" style="float:right; margin-left:10px;" > View Information </a></div>';
						} else {
							echo "<div class='alert alert-danger'> <strong>Unable to add doctor. A doctor with license number ".$D_LICENSENUM." already exists</strong></div>"; 
						}
					}//END
					//(SAMPLE 2) STILL TO BE REVISED/TESTED....
					function SUBMIT_EYEPATIENT($P_ID, $P_UNIVID, $P_FNAME, $P_LNAME, $P_AGE, $P_PH, $P_SEX, $P_PHYLIC, $P_STAFFLIC, $P_VASL1, $P_VASR1, $P_VAL1, $P_VAR1, $P_VD, $P_DC, $P_RDiag, $P_LDiag){
						$P_query = "INSERT INTO EYEPATIENT VALUES ('".$P_ID."',".$P_UNIVID.",'".$P_FNAME."','".$P_LNAME."','".$P_AGE."','".$P_PH."','".$P_SEX."','".$P_PHYLIC."','".$P_STAFFLIC."','".$P_VASL1."','".''."','".$P_VASR1."','".''."','".$P_VAL1."','".''."','".$P_VAR1."','".''.	"','".$P_VD."','".$P_DC."','".$P_RDiag."','".$P_LDiag."')";
						if ($GLOBALS['mydatabase']->query($P_query) === TRUE) { 
							$where = "'Home.php'";
							echo "<div class='alert alert-success'>New patient record successfully created.</div>";
							$whereto = "patient.php?profilepage=".$P_ID;
							echo '<div><button class="btn" id="go" onclick="location.href='.$where.'" style="float:right; margin-left:10px;" > Back-to-Home </button></div>';
							echo '<div><a role="button" class="btn" id="go" href="'.$whereto.'" style="float:right; margin-left:10px;" > View Information </a></div>';
						} else {
							if(explode(" ", $GLOBALS['mydatabase']->error)[5] == "'PAT_UNIV_ID'"){
								echo "<div class='alert alert-danger'> <strong>Unable to add patient. ".$P_FNAME." ".$P_LNAME." already have a record in the Eye Cataract Program. </strong></div>";
							}else if(explode(" ", $GLOBALS['mydatabase']->error)[0] == "Cannot" and explode(" ", explode("FOREIGN KEY ", $GLOBALS['mydatabase']->error)[1])[0] == "(`PHY_LICENSE_NUM`)"){
								echo "<div class='alert alert-danger'> <strong>Unable to add patient. Physician with license number ".$P_PHYLIC." does not exist.
									Add a new doctor <a href='form_doctors.php'>here</a> </strong></div>";
							}else if(explode(" ", $GLOBALS['mydatabase']->error)[0] == "Cannot" and explode(" ", explode("FOREIGN KEY ", $GLOBALS['mydatabase']->error)[1])[0] == "(`STAFF_LICENSE_NUM`)"){
								echo "<div class='alert alert-danger'> <strong>Unable to add patient. Staff with license number ".$P_STAFFLIC." does not exist. </strong></div>";
							}
						}
					}//END
					//(SAMPLE 3) STILL TO BE REVISED/TESTED....
					function SUBMIT_SURGERY($P_VASL2, $P_VASR2, $P_VAL2, $P_VAR2, $S_CASENUM, $S_SURGLIC, $S_SURGLIC1, $S_SURGLIC2, $S_PATID, $S_VISUALIM, $S_MEDHIST, $S_RDIAG, $S_LDIAG, $S_TANEST, $S_SURGADDR, $S_SURGDATE, $S_REMARK, $S_INTERN, $S_INTERN1, $S_INTERN2, $S_ANESTHE, $S_PROC, $S_EYE_OP, $S_IOLP, $SPC_IOL, $SPC_LAB, $SPC_PF, $SP_IOL,$SP_OTHERS, $CSF_HB, $CSF_SUPP, $CSF_L, $NDDCH_RA, $NDDCH_ZEISS, $NDDCH_SUPPLIES, $LF_PF, $LF_CPC){

						if(strlen($S_SURGLIC1)<1){ $S_SURGLIC1 = "NULL"; } else {$S_SURGLIC1 = "'".$S_SURGLIC1."'"; }
						if(strlen($S_SURGLIC2)<1){ $S_SURGLIC2 = "NULL"; } else {$S_SURGLIC2 = "'".$S_SURGLIC2."'"; }
						if(strlen($S_INTERN1)<1){ $S_INTERN1 = "NULL"; } else {$S_INTERN1 = "'".$S_INTERN1."'"; }
						if(strlen($S_INTERN2)<1){ $S_INTERN2 = "NULL"; } else {$S_INTERN2 = "'".$S_INTERN2."'"; }


						$S_query1 = "INSERT INTO SURGERY VALUES ('".$S_CASENUM."','".$S_SURGLIC."',".$S_SURGLIC1.",".$S_SURGLIC2.",'".$S_PATID."','".$S_VISUALIM."','".$S_MEDHIST."','".$S_RDIAG."','".$S_LDIAG."','".$S_TANEST."','".$S_SURGADDR."','".$S_SURGDATE."','".$S_REMARK."','".$S_INTERN."',".$S_INTERN1.",".$S_INTERN2.",'".$S_ANESTHE."','".$S_PROC."','".$S_EYE_OP."','".$S_IOLP."','".$SPC_IOL."','".$SPC_LAB."','".$SPC_PF."','".$SP_IOL."','".$SP_OTHERS."','".$CSF_HB."','".$CSF_SUPP."','".$CSF_L."', '".$NDDCH_RA."','".$NDDCH_ZEISS."','".$NDDCH_SUPPLIES."','".$LF_PF."','".$LF_CPC."')";
						$S_query2 = "UPDATE EYEPATIENT SET POST_VA_WITH_SPECT_LEFT = '".$P_VASL2."', POST_VA_WITH_SPECT_RIGHT = '".$P_VASR2."', POST_VA_NO_SPECT_LEFT = '".$P_VAL2."', POST_VA_NO_SPECT_RIGHT = '".$P_VAR2."' WHERE EYEPATIENT.PAT_ID_NUM = '".$S_PATID."';";
						
						if ($GLOBALS['mydatabase']->query($S_query1) === TRUE && $GLOBALS['mydatabase']->query($S_query2) === TRUE) { 
							$where = "'Home.php'";
							echo "<div class='alert alert-success'>New surgery record successfully created.</div>";
							$whereto = "surgery.php?profilepage=".$S_CASENUM;
							echo '<div><button class="btn" id="go" onclick="location.href='.$where.'" style="float:right; margin-left:10px;" > Back-to-Home </button></div>';
							echo '<div><a role="button" class="btn" id="go" href="'.$whereto.'" style="float:right; margin-left:10px;" > View Information </a></div>';
						}else { 
							if(explode(" ", $GLOBALS['mydatabase']->error)[5] == "'CASE_NUM'"){
								echo "<div class='alert alert-danger'> <strong>Unable to add surgery record. Surgery with ".$S_CASENUM." already have a record in the Eye Cataract Program. 
									Do not go back, add a new surgery record through <a = href='form_surgery.php'>here</a>.</strong></div>";
							}else if(explode(" ", $GLOBALS['mydatabase']->error)[0] == "Cannot" and explode(" ", explode("FOREIGN KEY ", $GLOBALS['mydatabase']->error)[1])[0] == "(`PAT_ID_NUM`)"){
								echo "<div class='alert alert-danger'> <strong>Unable to add surgery record. Patient with ID number ".$S_PATID." does not exist.
									Add a new patient <a href='form_patient.php'>here</a> </strong></div>";
							}else if(explode(" ", $GLOBALS['mydatabase']->error)[0] == "PDF_create_annotation(pdfdoc, llx, lly, urx, ury, type, optlist)not"){
								echo "<div class='alert alert-danger'> <strong>Unable to add surgery record. An input doctor does not exist.
									Add a new doctor <a href='form_doctors.php'>here</a>. </strong></div>";
							}
						}
						
					}//END
					//FUNCTIONS END (2)
					//var_dump($_POST);
					//INFORMATION RECIEVED (3)
					//INFORMATION END (3)
					//CODE SECTION END
				?>

				<!-- SUBMIT -->
				<div class="container-fluid" id="basic" style="padding-top: 10px;">
					<div id="inner">
					<!-- CONTENT -->
						<div class="container-fluid" >
								<!-- CONTENT: TO BE CONSTRUCTED -->
								<?php
									if (isset($_POST['doctors_info'])) {
										//DOCTOR INFORMATION FIELDS
										$F_NAME = $_POST["F_NAME"];
										$L_NAME = $_POST["L_NAME"];
										$LICENSE_NUM = $_POST["LICENSE_NUM"];
										$ADDRESS = $_POST["ADDRESS"];
										$SPECIALIZATION = $_POST["SPECIALIZATION"];
										//DOCTOR INFORMATION END
										SUBMIT_DOCTOR($F_NAME, $L_NAME, $LICENSE_NUM, $ADDRESS, $SPECIALIZATION);
									}else if (isset($_POST['patients_info'])) {
										//PATIENT INFORMATION FIELDS
										$P_ID = $_POST["P_ID"];
										$P_UNIVID = intval(explode(" - ", $_POST["P_NAME"])[0]);
										$P_FNAME = explode(" ", explode(" - ", $_POST["P_NAME"])[1])[0];
										$P_LNAME = explode(" ", explode(" - ", $_POST["P_NAME"])[1])[2];
										$P_AGE = $_POST["P_AGE"];
										$P_PH = $_POST["P_PH"];
										$P_SEX = $_POST["P_SEX"];
										$P_PHYLIC = trim(explode(" - ",$_POST["P_PHYLIC"])[0]);
										$P_STAFFLIC = trim(explode(" - ",$_POST["P_STAFFLIC"])[0]);
										$P_VASL1 = rtrim($_POST["P_VASL1"], "'");
										$P_VASR1 = rtrim($_POST["P_VASR1"], "'");
										$P_VAL1 = rtrim($_POST["P_VAL1"], "'");
										$P_VAR1 = rtrim($_POST["P_VAR1"], "'");
										$P_VD = $_POST["P_VD"];         
										$P_DC = $_POST["P_DC"];          
										$P_RDiag = $_POST["P_RDiag"];           
										$P_LDiag = $_POST["P_LDiag"];       
										    
										//PATIENT INFORMATION FIELDS END
										SUBMIT_EYEPATIENT($P_ID, $P_UNIVID, $P_FNAME, $P_LNAME, $P_AGE, $P_PH, $P_SEX, $P_PHYLIC, $P_STAFFLIC, $P_VASL1, $P_VASR1, $P_VAL1, $P_VAR1, $P_VD, $P_DC, $P_RDiag, $P_LDiag);
									}else if (isset($_POST['surgery_info'])) {
										//SURGERY INFORMATION FIELDS
										$CASE_NUM = $_POST["CASE_NUM"];
										$SURG_LICENSE_NUM = trim(explode(" - ",$_POST["SURG_NAME"])[0]);
										$SURG_LICENSE_NUM1 = trim(explode(" - ", $_POST["SURG_NAME1"])[0]);
										$SURG_LICENSE_NUM2 = trim(explode(" - ", $_POST["SURG_NAME2"])[0]);
										$PAT_ID_NUM2 = trim(explode(" - ", $_POST["PAT_NAME"])[0]);
										$VISUAL_IMPARITY = $_POST["VI"];         
										$MED_HISTORY = $_POST["MED_HIST"];       
										$RDIAGNOSIS = $_POST["RDIAG"];           
										$LDIAGNOSIS = $_POST["LDIAG"];             
										$SURG_ANESTHESIA = $_POST["TANES"];
										$SURG_ADDRESS = $_POST["SURG_ADD"];                      
										$SURG_DATE1 = explode("/",$_POST["DATE"]);
										$SURG_DATE = $SURG_DATE1[2].'-'.$SURG_DATE1[0].'-'.$SURG_DATE1[1];
										$REMARKS = $_POST["REM"];
										$INTERNIST = trim(explode(" - ", $_POST["INTER"])[0]);
										$INTERNIST1 = trim(explode(" - ", $_POST["INTER1"])[0]);
										$INTERNIST2 = trim(explode(" - ", $_POST["INTER2"])[0]);
										$ANESTHESIOLOGIST = trim(explode(" - ", $_POST["ANEST"])[0]);
										$IOLPOWER = $_POST["IOL"];
										$PC_IOL = str_replace(",", "", $_POST["PCIOL"]);
										$PC_LAB = str_replace(",", "", $_POST["PCLAB"]);
										$PC_PF =  str_replace(",", "", $_POST["PCPF"]);
										$SPO_IOL = str_replace(",", "", $_POST["SPOIOL"]);
										$SPO_OTHERS = str_replace(",", "", $_POST["SPOOTHERS"]);
										$CSF_HBILL = str_replace(",", "", $_POST["CSFHBILL"]);
										$CSF_SUPPLIES = str_replace(",", "", $_POST["CSFSUP"]);
										$CSF_LAB = str_replace(",", "", $_POST["CSFLAB"]);
										$CSF_LAB = str_replace(",", "", $_POST["CSFLAB"]);
										$NDDCH_RA = str_replace(",", "", $_POST["NDDCHRA"]);
										$NDDCH_ZEISS = str_replace(",", "", $_POST["NDDCHRAZEISS"]);
										$NDDCH_SUPPLIES = str_replace(",", "", $_POST["NDDCHSUPP"]);
										$LF_PF = str_replace(",", "", $_POST["LFPF"]);
										$LF_CPC = str_replace(",", "", $_POST["LFCPCF"]);
										$P_VASL2 = rtrim($_POST["P_VASL2"], "'");
										$P_VASR2 = rtrim($_POST["P_VASR2"], "'");
										$P_VAL2 = rtrim($_POST["P_VAL2"], "'");
										$P_VAR2 = rtrim($_POST["P_VAR2"], "'");
										$PROC = $_POST["PROC"]; 
										$EYE_OP = $_POST["EYE_OP"];
										
										//SURGERY INFORMATION FIELDS END
										SUBMIT_SURGERY($P_VASL2, $P_VASR2, $P_VAL2, $P_VAR2, $CASE_NUM, $SURG_LICENSE_NUM, $SURG_LICENSE_NUM1, $SURG_LICENSE_NUM2, $PAT_ID_NUM2, $VISUAL_IMPARITY, $MED_HISTORY, $RDIAGNOSIS, $LDIAGNOSIS, $SURG_ANESTHESIA, $SURG_ADDRESS, $SURG_DATE, $REMARKS, $INTERNIST, $INTERNIST1, $INTERNIST2, $ANESTHESIOLOGIST, $PROC, $EYE_OP,$IOLPOWER, $PC_IOL, $PC_LAB, $PC_PF, $SPO_IOL,$SPO_OTHERS, $CSF_HBILL, $CSF_SUPPLIES, $CSF_LAB, $NDDCH_RA, $NDDCH_ZEISS, $NDDCH_SUPPLIES, $LF_PF, $LF_CPC);
									}
									$mydatabase->close();
								?>
						</div>
						<!-- CONTENT END -->
					</div>
				</div>
				<!-- SUBMIT END -->
			</div>
			<!-- MAIN END -->
		</div>
	</body>
</html>
