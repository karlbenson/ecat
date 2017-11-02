<!DOCTYPE html>
<html>
<<<<<<< HEAD
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
  <div class="container-fluid" style="color: #ffffff;">
    <h4>Form Submission</h4> <br>
  </div>
<!-- TITLE -->
	
<?php  //CODE SECTION START

//ESTABLISHING MYSQL LINK (1)

include("dbconnect.php");

//ESTABLISHING MYSQL LINK END (1)

//FUNCTIONS (2)
$error = "Error. ";

  //INSERT INTO DATABASE 
    //(SAMPLE 1) STILL TO BE REVISED/TESTED....
function SUBMIT_DOCTOR($D_FNAME, $D_LNAME, $D_LICENSENUM, $D_ADDR, $D_SP){
  $D_query = "INSERT INTO DOCTOR VALUES ('".$D_LICENSENUM."','".$D_LNAME."','".$D_FNAME."','".$D_ADDR."','".$D_SP."')";
  if ($GLOBALS['mydatabase']->query($D_query) === TRUE) { echo "<div class='alert alert-success'>New doctor record successfully created.</div>"; }
  else { echo "<div class='alert alert-danger'> <strong>".$GLOBALS['error']."</strong>" . $GLOBALS['mydatabase']->error .".</div>"; }
}//END
    //(SAMPLE 2) STILL TO BE REVISED/TESTED....
function SUBMIT_EYEPATIENT($P_ID, $P_FNAME, $P_LNAME, $P_AGE, $P_PH, $P_SEX, $P_PHYLIC, $P_STAFFLIC, $P_VASL1, $P_VASL2, $P_VASR1, $P_VASR2, $P_VAL1, $P_VAL2, $P_VAR1, $P_VAR2, $P_VD, $P_DC, $P_DIAG, $P_PROC, $P_REA, $P_LEA){
  $P_query = "INSERT INTO EYEPATIENT VALUES ('".$P_ID."','".$P_FNAME."','".$P_LNAME."','".$P_AGE."','".$P_PH."','".$P_SEX."','".$P_PHYLIC."','".$P_STAFFLIC."','".$P_VASL1."','".$P_VASL2."','".$P_VASR1."','".$P_VASR2."','".$P_VAL1."','".$P_VAL2."','".$P_VAR1."','".$P_VAR2."','".$P_VD."','".$P_DC."','".$P_DIAG."','".$P_PROC."','".$P_REA."','".$P_LEA."')";
  if ($GLOBALS['mydatabase']->query($P_query) === TRUE) { echo "<div class='alert alert-success'>New patient record successfully created.</div>"; }
  else { echo "<div class='alert alert-danger'> <strong>".$GLOBALS['error']."</strong>" . $GLOBALS['mydatabase']->error .".</div>"; }
}//END
    //(SAMPLE 3) STILL TO BE REVISED/TESTED....
function SUBMIT_SURGERY($S_CASENUM, $S_SURGLIC, $S_PATID, $S_VISUALIM, $S_MEDHIST, $S_DIAG,$S_TANEST, $S_SURGADDR, $S_SURGDATE, $S_REMARK,  $S_INTERN, $S_ANESTHE, $S_IOLP,$SPC_IOL, $SPC_LAB, $SPC_PF, $SP_IOL, $CSF_HB, $CSF_SUPP, $CSF_L){
  $S_query = "INSERT INTO SURGERY VALUES ('".$S_CASENUM."','".$S_SURGLIC."','".$S_PATID."','".$S_VISUALIM."','".$S_MEDHIST."','".$S_DIAG."','".$S_TANEST."','".$S_SURGADDR."','".$S_SURGDATE."','".$S_REMARK."','".$S_INTERN."','".$S_ANESTHE."','".$S_IOLP."','".$SPC_IOL."','".$SPC_LAB."','".$SPC_PF."','".$SP_IOL."','".$CSF_HB."','".$CSF_SUPP."','".$CSF_L."')";
  if ($GLOBALS['mydatabase']->query($S_query) === TRUE) { echo "<div class='alert alert-success'>New surgery record successfully created.</div>"; }
  else { echo "<div class='alert alert-danger'> <strong>".$GLOBALS['error']."</strong>" . $GLOBALS['mydatabase']->error .".</div>"; }
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
     <div>
       
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
        		$P_FNAME = $_POST["P_FNAME"];
        		$P_LNAME = $_POST["P_LNAME"];
				$P_AGE = $_POST["P_AGE"];
				$P_PH = $_POST["P_PH"];
				$P_SEX = $_POST["P_SEX"];
				$PAT_LIST = explode("-",$_POST["P_PHY"]);
				$P_PHYLIC = $PAT_LIST[1];
				$P_STAFFLIC = $_POST["P_STAFFLIC"];
				$P_VASL1 = $_POST["P_VASL1"];
				$P_VASL2 = $_POST["P_VASL2"];
				$P_VASR1 = $_POST["P_VASR1"];
				$P_VASR2 = $_POST["P_VASR2"];
				$P_VAL1 = $_POST["P_VAL1"];
				$P_VAL2 = $_POST["P_VAL2"];
				$P_VAR1 = $_POST["P_VAR1"];
				$P_VAR2 = $_POST["P_VAR2"];
				$P_VD = $_POST["P_VD"];         
				$P_DC = $_POST["P_DC"];          
				$P_DIAG = $_POST["P_DIAG"];       
				$P_PROC = $_POST["P_PROC"];          
				$P_REA = $_POST["P_REA"];       
				$P_LEA = $_POST["P_LEA"];        
				  //PATIENT INFORMATION FIELDS END
			
          SUBMIT_EYEPATIENT($P_ID, $P_FNAME, $P_LNAME, $P_AGE, $P_PH, $P_SEX, $P_PHYLIC, $P_STAFFLIC, $P_VASL1, $P_VASL2, $P_VASR1, $P_VASR2, $P_VAL1, $P_VAL2, $P_VAR1, $P_VAR2, $P_VD, $P_DC, $P_DIAG, $P_PROC, $P_REA, $P_LEA);
        }else if (isset($_POST['surgery_info'])) {
			
			  //SURGERY INFORMATION FIELDS
				$CASE_NUM = $_POST["CASE_NUM"];
				$SURGEON = $_POST["SURG_NAME"];
				$S_LIST = explode("-",$SURGEON);
				$SURG_LICENSE_NUM = $S_LIST[1];
				$P_LIST = explode("-",$_POST["PAT_NAME"]);
				$PAT_ID_NUM2 = $P_LIST[1]; 
				$VISUAL_IMPARITY = $_POST["VI"];         
				$MED_HISTORY = $_POST["MED_HIST"];       
				$DIAGNOSIS = $_POST["DIAG"];             
				$SURG_ANESTHESIA = $_POST["TANES"];
				$SURG_ADDRESS = $_POST["SURG_ADD"];                      
				$SURG_DATE = $_POST["YY"]."-".$_POST["MM"]."-".$_POST["DD"];
				$REMARKS = $_POST["REM"]; 
				$INTER = $_POST["INTER"];
				$I_LIST = explode("-",$INTER);
				$INTERNIST = $I_LIST;
				$ANES = $_POST["ANEST"];
				$A_LIST = explode("-",$ANES);
				$ANESTHESIOLOGIST = $A_LIST[1];
				$IOLPOWER = $_POST["IOL"];
				$PC_IOL = $_POST["PCIOL"];
				$PC_LAB = $_POST["PCLAB"];
				$PC_PF =  $_POST["PCPF"];
				$SPO_IOL = $_POST["SPOIOL"];
				$CSF_HBILL = $_POST["CSFHBILL"];
				$CSF_SUPPLIES = $_POST["CSFSUP"];
				$CSF_LAB = $_POST["CSFLAB"];
				//SURGERY INFORMATION FIELDS END
			
          SUBMIT_SURGERY($CASE_NUM, $SURG_LICENSE_NUM, $PAT_ID_NUM2, $VISUAL_IMPARITY, $MED_HISTORY, $DIAGNOSIS, $SURG_ANESTHESIA,$SURG_ADDRESS, $SURG_DATE, $REMARKS,  $INTERNIST, $ANESTHESIOLOGIST, $IOLPOWER, $PC_IOL, $PC_LAB, $PC_PF, $SPO_IOL, $CSF_HBILL, $CSF_SUPPLIES, $CSF_LAB);
        }
        $mydatabase->close();

        $where = "'Home.php'";
        echo '<div ><button class="btn" id="go" onclick="location.href='.$where.'" style="float:right;" > Back-to-Home </button></div>';

     ?>

     </div>
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
=======
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
						$D_query = "INSERT INTO DOCTOR VALUES ('".$D_LICENSENUM."','".$D_LNAME."','".$D_FNAME."','".$D_ADDR."','".$D_SP."')";
						if ($GLOBALS['mydatabase']->query($D_query) === TRUE){
							echo "<div class='alert alert-success'>New doctor record successfully created.</div>";
							$GLOBALS['whereto'] = "doctors.php?profilepage=".$D_LICENSENUM;
						} else {
							echo "<div class='alert alert-danger'> <strong>".$GLOBALS['error']."</strong>" . $GLOBALS['mydatabase']->error .".</div>"; 
						}
					}//END
					//(SAMPLE 2) STILL TO BE REVISED/TESTED....
					function SUBMIT_EYEPATIENT($P_ID, $P_FNAME, $P_LNAME, $P_AGE, $P_PH, $P_SEX, $P_PHYLIC, $P_STAFFLIC, $P_VASL1, $P_VASR1, $P_VAL1, $P_VAR1, $P_VD, $P_DC, $P_DIAG, $P_PROC, $P_REA, $P_LEA){
						$P_query = "INSERT INTO EYEPATIENT VALUES ('".$P_ID."','".$P_FNAME."','".$P_LNAME."','".$P_AGE."','".$P_PH."','".$P_SEX."','".$P_PHYLIC."','".$P_STAFFLIC."','".$P_VASL1."','".''."','".$P_VASR1."','".''."','".$P_VAL1."','".''."','".$P_VAR1."','".''."','".$P_VD."','".$P_DC."','".$P_DIAG."','".$P_PROC."','".$P_REA."','".$P_LEA."')";
						if ($GLOBALS['mydatabase']->query($P_query) === TRUE) { 
							echo "<div class='alert alert-success'>New patient record successfully created.</div>";
							$GLOBALS['whereto'] = "patient.php?profilepage=".$P_ID;
						} else { 
							echo "<div class='alert alert-danger'> <strong>".$GLOBALS['error']."</strong>" . $GLOBALS['mydatabase']->error .".</div>";
						}
					}//END
					//(SAMPLE 3) STILL TO BE REVISED/TESTED....
					function SUBMIT_SURGERY($P_VASL2, $P_VASR2, $P_VAL2, $P_VAR2, $S_CASENUM, $S_SURGLIC, $S_PATID, $S_VISUALIM, $S_MEDHIST, $S_DIAG, $S_TANEST, $S_SURGADDR, $S_SURGDATE, $S_REMARK, $S_INTERN, $S_ANESTHE, $S_IOLP,$SPC_IOL, $SPC_LAB, $SPC_PF, $SP_IOL, $CSF_HB, $CSF_SUPP, $CSF_L){
						$S_query1 = "INSERT INTO SURGERY VALUES ('".$S_CASENUM."','".$S_SURGLIC."','".$S_PATID."','".$S_VISUALIM."','".$S_MEDHIST."','".$S_DIAG."','".$S_TANEST."','".$S_SURGADDR."','".$S_SURGDATE."','".$S_REMARK."','".$S_INTERN."','".$S_ANESTHE."','".$S_IOLP."','".$SPC_IOL."','".$SPC_LAB."','".$SPC_PF."','".$SP_IOL."','".$CSF_HB."','".$CSF_SUPP."','".$CSF_L."')";
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
										$P_FNAME = $_POST["P_FNAME"];
										$P_LNAME = $_POST["P_LNAME"];
										$P_AGE = $_POST["P_AGE"];
										$P_PH = $_POST["P_PH"];
										$P_SEX = $_POST["P_SEX"];
										$PHYSICIAN = $_POST["P_PHYLIC"];
										$PHY_LIST = explode("-",$PHYSICIAN);
										if(sizeof($PHY_LIST)==1){
											$P_PHYLIC = $PHY_LIST[0];
										}else{
											$P_PHYLIC = $PHY_LIST[1];
										}
										$STAFF_LIST = explode("-",$_POST["P_STAFFLIC"]);
										if(sizeof($STAFF_LIST)==1){
											$P_STAFFLIC = $STAFF_LIST[0];
										}else{
											$P_STAFFLIC = $STAFF_LIST[1];
										}
										$P_VASL1 = $_POST["P_VASL1"];
										$P_VASR1 = $_POST["P_VASR1"];
										$P_VAL1 = $_POST["P_VAL1"];
										$P_VAR1 = $_POST["P_VAR1"];
										$P_VD = $_POST["P_VD"];         
										$P_DC = $_POST["P_DC"];          
										$P_DIAG = $_POST["P_DIAG"];       
										$P_PROC = $_POST["P_PROC"];          
										$P_REA = $_POST["P_REA"];       
										$P_LEA = $_POST["P_LEA"];        
										//PATIENT INFORMATION FIELDS END
										SUBMIT_EYEPATIENT($P_ID, $P_FNAME, $P_LNAME, $P_AGE, $P_PH, $P_SEX, $P_PHYLIC, $P_STAFFLIC, $P_VASL1, $P_VASR1, $P_VAL1, $P_VAR1, $P_VD, $P_DC, $P_DIAG, $P_PROC, $P_REA, $P_LEA);
									}else if (isset($_POST['surgery_info'])) {
										//SURGERY INFORMATION FIELDS
										$CASE_NUM = $_POST["CASE_NUM"];
										$SURGEON = $_POST["SURG_NAME"];
										$S_LIST = explode("-",$SURGEON);
										if(sizeof($S_LIST)==1){
											$SURG_LICENSE_NUM = $S_LIST[0];
										}else{
											$SURG_LICENSE_NUM = $S_LIST[1];
										}
										$P_LIST = explode("-",$_POST["PAT_NAME"]);
										if(sizeof($P_LIST)==1){
											$PAT_ID_NUM2 = $P_LIST[0];
										}else{
											$PAT_ID_NUM2 = $P_LIST[1];
										}
										$VISUAL_IMPARITY = $_POST["VI"];         
										$MED_HISTORY = $_POST["MED_HIST"];       
										$DIAGNOSIS = $_POST["DIAG"];             
										$SURG_ANESTHESIA = $_POST["TANES"];
										$SURG_ADDRESS = $_POST["SURG_ADD"];                      
										$SURG_DATE1 = explode("/",$_POST["DATE"]);
										$SURG_DATE = $SURG_DATE1[2].'-'.$SURG_DATE1[0].'-'.$SURG_DATE1[1];
										$REMARKS = $_POST["REM"];  
										$INTERNIST = $_POST["INTER"];
										$ANESTHESIOLOGIST = $_POST["ANEST"];
										$IOLPOWER = $_POST["IOL"];
										$PC_IOL = $_POST["PCIOL"];
										$PC_LAB = $_POST["PCLAB"];
										$PC_PF =  $_POST["PCPF"];
										$SPO_IOL = $_POST["SPOIOL"];
										$CSF_HBILL = $_POST["CSFHBILL"];
										$CSF_SUPPLIES = $_POST["CSFSUP"];
										$CSF_LAB = $_POST["CSFLAB"];
										$P_VASL2 = $_POST["P_VASL2"];
										$P_VASR2 = $_POST["P_VASR2"];
										$P_VAL2 = $_POST["P_VAL2"];
										$P_VAR2 = $_POST["P_VAR2"];
										//SURGERY INFORMATION FIELDS END
										SUBMIT_SURGERY($P_VASL2, $P_VASR2, $P_VAL2, $P_VAR2, $CASE_NUM, $SURG_LICENSE_NUM, $PAT_ID_NUM2, $VISUAL_IMPARITY, $MED_HISTORY, $DIAGNOSIS, $SURG_ANESTHESIA, $SURG_ADDRESS, $SURG_DATE, $REMARKS, $INTERNIST, $ANESTHESIOLOGIST, $IOLPOWER, $PC_IOL, $PC_LAB, $PC_PF, $SPO_IOL, $CSF_HBILL, $CSF_SUPPLIES, $CSF_LAB);
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
>>>>>>> 90c6b721fea731b065cd73d4fe522570dc7bef1f
