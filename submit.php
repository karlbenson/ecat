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
					$error = "Error. ";
					$whereto = "#";

					//INSERT INTO DATABASE 
					//(SAMPLE 1) STILL TO BE REVISED/TESTED....
					function SUBMIT_DOCTOR($D_FNAME, $D_LNAME, $D_LICENSENUM, $D_ADDR, $D_SP){
						$D_query = "INSERT INTO DOCTOR VALUES ('".$D_LICENSENUM."','".$D_LNAME."','".$D_FNAME."','".$D_ADDR."','".$D_SP."', '')";
						if ($GLOBALS['mydatabase']->query($D_query) === TRUE){
							echo "<div class='alert alert-success'>New doctor record successfully created.</div>";
							$GLOBALS['whereto'] = "doctors.php?profilepage=".$D_LICENSENUM;
						} else {
							echo "<div class='alert alert-danger'> <strong>".$GLOBALS['error']."</strong>" . $GLOBALS['mydatabase']->error .".</div>"; 
						}
					}//END
					//(SAMPLE 2) STILL TO BE REVISED/TESTED....
					function SUBMIT_EYEPATIENT($P_ID, $P_UNIVID, $P_FNAME, $P_LNAME, $P_AGE, $P_PH, $P_SEX, $P_PHYLIC, $P_STAFFLIC, $P_VASL1, $P_VASR1, $P_VAL1, $P_VAR1, $P_VD, $P_DC, $P_RDiag, $P_LDiag, $P_PROC){
						$P_query = "INSERT INTO EYEPATIENT VALUES ('".$P_ID."',".$P_UNIVID.",'".$P_FNAME."','".$P_LNAME."','".$P_AGE."','".$P_PH."','".$P_SEX."','".$P_PHYLIC."','".$P_STAFFLIC."','".$P_VASL1."','".''."','".$P_VASR1."','".''."','".$P_VAL1."','".''."','".$P_VAR1."','".''."','".$P_VD."','".$P_DC."','".$P_RDiag."','".$P_LDiag."','".$P_PROC."')";
						if ($GLOBALS['mydatabase']->query($P_query) === TRUE) { 
							echo "<div class='alert alert-success'>New patient record successfully created.</div>";
							$GLOBALS['whereto'] = "patient.php?profilepage=".$P_ID;
						} else { 
							echo "<div class='alert alert-danger'> <strong>".$GLOBALS['error']."</strong>" . $GLOBALS['mydatabase']->error .".</div>";
						}
					}//END
					//(SAMPLE 3) STILL TO BE REVISED/TESTED....
					function SUBMIT_SURGERY($P_VASL2, $P_VASR2, $P_VAL2, $P_VAR2, $S_CASENUM, $S_SURGLIC, $S_SURGLIC1, $S_SURGLIC2, $S_PATID, $S_VISUALIM, $S_MEDHIST, $S_RDIAG, $S_LDIAG, $S_TANEST, $S_SURGADDR, $S_SURGDATE, $S_REMARK, $S_INTERN, $S_INTERN1, $S_INTERN2, $S_ANESTHE, $S_IOLP, $SPC_IOL, $SPC_LAB, $SPC_PF, $SP_IOL,$SP_OTHERS, $CSF_HB, $CSF_SUPP, $CSF_L, $NDDCH_RA, $NDDCH_ZEISS, $NDDCH_SUPPLIES, $LF_PF, $LF_CPC){
						$S_query1 = "INSERT INTO SURGERY VALUES ('".$S_CASENUM."','".$S_SURGLIC."','".$S_SURGLIC1."','".$S_SURGLIC2."','".$S_PATID."','".$S_VISUALIM."','".$S_MEDHIST."','".$S_RDIAG."','".$S_LDIAG."','".$S_TANEST."','".$S_SURGADDR."','".$S_SURGDATE."','".$S_REMARK."','".$S_INTERN."','".$S_INTERN1."','".$S_INTERN2."','".$S_ANESTHE."','".$S_IOLP."','".$SPC_IOL."','".$SPC_LAB."','".$SPC_PF."','".$SP_IOL."','".$SP_OTHERS."','".$CSF_HB."','".$CSF_SUPP."','".$CSF_L."', '".$NDDCH_RA."','".$NDDCH_ZEISS."','".$NDDCH_SUPPLIES."','".$LF_PF."','".$LF_CPC."' ,'')";
						$S_query2 = "UPDATE EYEPATIENT SET POST_VA_WITH_SPECT_LEFT = '".$P_VASL2."', POST_VA_WITH_SPECT_RIGHT = '".$P_VASR2."', POST_VA_NO_SPECT_LEFT = '".$P_VAL2."', POST_VA_NO_SPECT_RIGHT = '".$P_VAR2."' WHERE EYEPATIENT.PAT_ID_NUM = '".$S_PATID."';";
						if ($GLOBALS['mydatabase']->query($S_query1) === TRUE) { 
							if ($GLOBALS['mydatabase']->query($S_query2) === TRUE) {
								echo "<div class='alert alert-success'>New surgery record successfully created.</div>";
								$GLOBALS['whereto'] = "surgery.php?profilepage=".$S_CASENUM;
							}
						}else { 
							echo "<div class='alert alert-danger'> <strong>".$GLOBALS['error']."</strong>" . $GLOBALS['mydatabase']->error .".</div>"; 
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
										$P_PROC = $_POST["P_PROC"];     
										//PATIENT INFORMATION FIELDS END
										SUBMIT_EYEPATIENT($P_ID, $P_UNIVID, $P_FNAME, $P_LNAME, $P_AGE, $P_PH, $P_SEX, $P_PHYLIC, $P_STAFFLIC, $P_VASL1, $P_VASR1, $P_VAL1, $P_VAR1, $P_VD, $P_DC, $P_RDiag, $P_LDiag, $P_PROC);
									}else if (isset($_POST['surgery_info'])) {
										//SURGERY INFORMATION FIELDS
										$CASE_NUM = $_POST["CASE_NUM"];
										$SURGEON = $_POST["SURG_NAME"];
										$S_LIST = explode(" - ",$SURGEON);
										if(sizeof($S_LIST)==1){
											$SURG_LICENSE_NUM = trim($S_LIST[0]);
										}else{
											$SURG_LICENSE_NUM = trim($S_LIST[1]);
										}
										$SURGEON1 = $_POST["SURG_NAME1"];
										$S_LIST1 = explode(" - ",$SURGEON1);
										if(sizeof($S_LIST1)==1){
											$SURG_LICENSE_NUM1 = trim($S_LIST1[0]);
										}else{
											$SURG_LICENSE_NUM1 = trim($S_LIST1[1]);
										}
										$SURGEON2 = $_POST["SURG_NAME2"];
										$S_LIST2 = explode(" - ",$SURGEON2);
										if(sizeof($S_LIST2)==1){
											$SURG_LICENSE_NUM2 = trim($S_LIST2[0]);
										}else{
											$SURG_LICENSE_NUM2 = trim($S_LIST2[1]);
										}
										$P_LIST = explode(" - ",$_POST["PAT_NAME"]);
										if(sizeof($P_LIST)==1){
											$PAT_ID_NUM2 = trim($P_LIST[0]);
										}else{
											$PAT_ID_NUM2 = trim($P_LIST[1]);
										}
										$VISUAL_IMPARITY = $_POST["VI"];         
										$MED_HISTORY = $_POST["MED_HIST"];       
										$RDIAGNOSIS = $_POST["RDIAG"];           
										$LDIAGNOSIS = $_POST["LDIAG"];             
										$SURG_ANESTHESIA = $_POST["TANES"];
										$SURG_ADDRESS = $_POST["SURG_ADD"];                      
										$SURG_DATE1 = explode("/",$_POST["DATE"]);
										$SURG_DATE = $SURG_DATE1[2].'-'.$SURG_DATE1[0].'-'.$SURG_DATE1[1];
										$REMARKS = $_POST["REM"];  
										$INTER = $_POST["INTER"];
										$I_LIST = explode(" - ",$INTER);
										if(sizeof($I_LIST)==1){
											$INTERNIST = trim($I_LIST[0]);
										}else{
											$INTERNIST = trim($I_LIST[1]);
										}
										$INTER1 = $_POST["INTER1"];
										$I_LIST1 = explode(" - ",$INTER1);
										if(sizeof($I_LIST1)==1){
											$INTERNIST1 = trim($I_LIST1[0]);
										}else{
											$INTERNIST1 = trim($I_LIST1[1]);
										}
										$INTER2 = $_POST["INTER2"];
										$I_LIST2 = explode(" - ",$INTER2);
										if(sizeof($I_LIST2)==1){
											$INTERNIST2 = trim($I_LIST2[0]);
										}else{
											$INTERNIST2 = trim($I_LIST2[1]);
										}
										$ANEST = $_POST["ANEST"];
										$A_LIST = explode(" - ",$ANEST);
										if(sizeof($I_LIST)==1){
											$ANESTHESIOLOGIST = trim($A_LIST[0]);
										}else{
											$ANESTHESIOLOGIST = trim($A_LIST[1]);
										}
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
										
										//SURGERY INFORMATION FIELDS END
										SUBMIT_SURGERY($P_VASL2, $P_VASR2, $P_VAL2, $P_VAR2, $CASE_NUM, $SURG_LICENSE_NUM, $SURG_LICENSE_NUM1, $SURG_LICENSE_NUM2, $PAT_ID_NUM2, $VISUAL_IMPARITY, $MED_HISTORY, $RDIAGNOSIS, $LDIAGNOSIS, $SURG_ANESTHESIA, $SURG_ADDRESS, $SURG_DATE, $REMARKS, $INTERNIST, $INTERNIST1, $INTERNIST2, $ANESTHESIOLOGIST, $IOLPOWER, $PC_IOL, $PC_LAB, $PC_PF, $SPO_IOL,$SPO_OTHERS, $CSF_HBILL, $CSF_SUPPLIES, $CSF_LAB, $NDDCH_RA, $NDDCH_ZEISS, $NDDCH_SUPPLIES, $LF_PF, $LF_CPC);
									}
									$mydatabase->close();
									$where = "'Home.php'";
									echo '<div><button class="btn" id="go" onclick="location.href='.$where.'" style="float:right; margin-left:10px;" > Back-to-Home </button></div>';
									echo '<div><a role="button" class="btn" id="go" href="'.$whereto.'" style="float:right; margin-left:10px;" > View Information </a></div>';
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
