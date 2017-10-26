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
function SUBMIT_EYEPATIENT($P_ID, $P_FNAME, $P_LNAME, $P_AGE, $P_PH, $P_SEX, $P_PHYLIC, $P_STAFFLIC, $P_VASL1, $P_VASL2, $P_VARL1, $P_VARL2, $P_VAL1, $P_VAL2, $P_VAR1, $P_VAR2, $P_VISUALDISAB, $P_DISABCAUSE, $P_DIAG, $P_PROC, $P_REA, $P_LEA){
  $P_query = "INSERT INTO EYEPATIENT VALUES ('".$P_ID."','".$P_FNAME."','".$P_LNAME.",'".$P_AGE."','".$P_PH.",'".$P_SEX.",'".$P_PHYLIC."','".$P_STAFFLIC."','".$P_VASL1."','".$P_VASL2."','".$P_VASR1."','".$P_VASR2."','".$P_VAL1."','".$P_VAL2."','".$P_VAR1."','".$P_VAR2."','".$P_VISUALDISAB."','".$P_DISABCAUSE."','".$P_DIAG."','".$P_PROC."','".$P_REA."','".$P_LEA."')";
  if ($GLOBALS['mydatabase']->query($P_query) === TRUE) { echo "<div class='alert alert-success'>New patient record successfully created.</div>"; }
  else { echo "<div class='alert alert-danger'> <strong>".$GLOBALS['error']."</strong>" . $GLOBALS['mydatabase']->error .".</div>"; }
}//END
    //(SAMPLE 3) STILL TO BE REVISED/TESTED....
function SUBMIT_SURGERY($S_CASENUM, $S_SURGLIC, $S_PATID, $S_VISUALIM, $S_MEDHIST, $S_DIAG, $S_SURGADDR, $S_SURGDATE, $S_REMARK, $S_TANEST, $S_INTERN, $S_ANESTHE, $S_IOLP,$SPC_IOL, $SPC_LAB, $SPC_PF, $SP_IOL, $CSF_HB, $CSF_SUPP, $CSF_L){
  $S_query = "INSERT INTO SURGERY VALUES ('".$S_CASENUM."','".$S_SURGLIC."','".$S_PATID."','".$S_VISUALIM."','".$S_MEDHIST."','".$S_DIAG."','".$S_SURGADDR."','".$S_SURGDATE."','".$S_REMARK."','".$S_TANEST."','".$S_INTERN."','".$S_ANESTHE."','".$S_IOLP."','".$SPC_IOL."','".$SPC_LAB."','".$SPC_PF."','".$SP_IOL."','".$CSF_HB."','".$CSF_SUPP."','".$CSF_L."')";
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
        		$PAT_FNAME = $_POST["PF_NAME"];	//...
        		$PAT_LNAME = $_POST["PL_NAME"]; //...
				$PAT_ID_NUM1 = $_POST["PAT_ID"];       
				$PHY_LICENSE_NUM = $_POST["PHYS_LIC"];
				$STAFF_LICENSE_NUM = $_POST["STAFF_LIC"];  
				$VA_WITH_SPECT_RIGHT = '20/'.$_POST["VASR"];     
				$VA_WITH_SPECT_LEFT = '20/'.$_POST["VASL"];     
				$VA_NO_SPECT_RIGHT = '20/'.$_POST["VAR"];
				$VA_NO_SPECT_LEFT = '20/'.$_POST["VAL"];
				$VISUAL_DISABILITY = $_POST["VD"];         
				$DISABILITY_CAUSE = $_POST["DC"];          
				$RIGHT_EYE_AFFECTED = $_POST["REA"];       
				$LEFT_EYE_AFFECTED = $_POST["LEA"];        
				  //PATIENT INFORMATION FIELDS END
			
          SUBMIT_EYEPATIENT($PAT_ID_NUM1, $PAT_FNAME, $PAT_LNAME, $PHY_LICENSE_NUM, $STAFF_LICENSE_NUM, $VA_WITH_SPECT_RIGHT, $VA_WITH_SPECT_LEFT, $VA_NO_SPECT_RIGHT, $VA_NO_SPECT_LEFT, $VISUAL_DISABILITY, $DISABILITY_CAUSE, $RIGHT_EYE_AFFECTED, $LEFT_EYE_AFFECTED);
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
				//SURGERY INFORMATION FIELDS END
			
          SUBMIT_SURGERY($CASE_NUM, $SURG_LICENSE_NUM, $PAT_ID_NUM2, $VISUAL_IMPARITY, $MED_HISTORY, $DIAGNOSIS, $SURG_ADDRESS, $SURG_DATE, $REMARKS, $SURG_ANESTHESIA, $INTERNIST, $ANESTHESIOLOGIST, $IOLPOWER, $PC_IOL, $PC_LAB, $PC_PF, $SPO_IOL, $CSF_HBILL, $CSF_SUPPLIES, $CSF_LAB);
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