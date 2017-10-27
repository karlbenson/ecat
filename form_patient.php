<!DOCTYPE html>
<html>
<head>

  <title>Luke Foundation Eye Program: Patient Form</title>
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
    <h4>Eye Program: Patient Form</h4> 
  </div>
<!-- TITLE -->

<?php //CODE SECTION START

//PATIENT INFORMATION FIELDS MAX CHAR VALUES
$ID_LENG = 15;
$PHYL_LENG = 7;
$MAX_NAME = 40;
$STAFFL_LENG = 7;
$VD_MAX = 15;
$DC_MAX = 30;
$REA_MAX = 12;
$LEA_MAX = 12;
$VA_choice = array(10, 12.5, 16, 20, 25, 32, 40, 50, 63, 80, 100, 125, 160, 200);
$VA_choice = array('20/10', '20/12.5', '20/16', '20/20', '20/25', '20/32', '20/40', '20/50', '20/63', '20/80',
					'20/100', '20/125', '20/160', '20/200',
					'CF 20', 'CF 19', 'CF 18', 'CF 17', 'CF 16', 'CF 15',
					'CF 14', 'CF 13', 'CF 12', 'CF 11', 'CF 10', 'CF 9',
					'CF 8', 'CF 7', 'CF 6', 'CF 5', 'CF 4', 'CF 3',
					'CF 2', 'CF 1', 'HM', '+LP', '-LP');
//PATIENT INFORMATION FIELDS END

//CODE SECTION END
?>

<!-- PATIENT'S FORM -->
<div class="container-fluid" id="basic" style="padding-top: 10px;">

  <div id="inner" style="background-color:;">
  <!-- CONTENT -->
		<div class="container-fluid" >
      
      <!-- FORMS -->
        <div class="container-fluid">
          <h3>Patient Information</h3>
          <hr>
          <p style="margin-bottom: 20px; color:#666666;">
            Please do not leave the required<span style="color: #d9534f">*</span> fields blank.
          </p>
              
          <form method="post" action="submit.php">
			
          <!-- PATIENT -->
            <div class="form-group row">
              <label class="control-label col-md-3" for="P_ID" style="float:left; width:170px;">Patient<span style="color: #d9534f">*</span> </label>
			  <div class="" style="width: 180px; float: left; margin-right:10px;">
                <input type="text" class="form-control" id="P_ID" placeholder="Patient ID" maxlength="<?php echo $ID_LENG; ?>" name="P_ID" required>
              </div>
			  
			  <div class="" style="width: 200px; float: left; margin-right:10px;">
                <input type="text" class="form-control" id="P_FNAME" placeholder="First Name" maxlength="20" name="P_FNAME" required>
              </div>
			  
			  <div class="" style="width: 200px; float: left; margin-right:10px;">
                <input type="text" class="form-control" id="P_LNAME" placeholder="Last Name" maxlength="20" name="P_LNAME" required>
              </div>
            </div>
          <!-- PATIENT END-->

          <!-- PHIL HEALTH -->
          	<div class="form-group row">
			  <label class="control-label col-md-3" for="P_PH" style="float:left; width:170px;">Has PhilHealth?<span style="color: #d9534f">*</span> </label>
			  <div class="col-md-4" style="width: 280px; float: left;">
				<label class="radio-inline" id="P_PH"><input name="P_PH" type="radio" value="Y">Yes</label>
				<label class="radio-inline" id="P_PH"><input name="P_PH" type="radio" value="N" required>No</label>
			  </div>
			</div>
			<!-- PHIL HEALTH END -->
		
		<div class="row">
			<!-- PATIENT AGE AND SEX -->
			<div class="container-fluid well col-md-5"  style="margin: 0px 15px;">
			<div class="form-group row">
			  <label class="control-label col-md-2" for="P_AGE" style="float:left; width:170px;">Age:<span style="color: #d9534f">*</span> </label>
			  <div class="col-md-3" style="width: 180px; float: left;">
				<input type="text" class="form-control" id="P_AGE" name="P_AGE" placeholder="Patient Age" maxlength="6" required>
			  </div>
			 </div>
			<div class="form-group row" style="margin-bottom:6px;">
			  <label class="control-label col-md-2" for="P_SEX" style="float:left; width:170px;">Sex:<span style="color: #d9534f">*</span> </label>
				  <div class="col-md-4" style="width: 180px; float: left;">
					<label class="radio-inline" id="P_SEX"><input name="P_SEX" type="radio" value="M" required>Male</label>
					<label class="radio-inline" id="P_SEX"><input name="P_SEX" type="radio" value="F">Female</label>
				  </div>
			 </div>
			</div>
			<!-- PATIENT AGE AND SEX END -->

		<div class="container-fluid well col-md-6" style="margin: 0px 15px;">
          <!-- PHYSICIAN LICENSE NUMBER -->
            <div class="form-group row">
              <label class="control-label col-md-2" for="P_PHYLIC" style="float:left; width:170px;">Examined by:<span style="color: #d9534f">*</span> </label>
              <div class="col-md-2" style="width: 180px; float: left;">
                <input pattern="\d{7}" title="License Number ranges from 0000000-9999999." class="form-control" id="P_PHYLIC" placeholder="Phys. Lic." maxlength="<?php echo $PHYL_LENG; ?>" name="P_PHYLIC" required>
              </div>
            </div>
          <!-- PHYSICIAN LICENSE NUMBER END -->

          <!-- STAFF LICENSE NUMBER -->
            <div class="form-group row" style="margin-bottom:0px;">
              <label class="control-label col-md-2" for="P_STAFFLIC" style="float:left; width:170px;">Screened by:<span style="color: #d9534f">*</span> </label>
              <div class="col-md-2" style="width: 180px; float: left;">
                <input pattern="\d{7}" title="License Number ranges from 0000000-9999999." class="form-control" id="P_STAFFLIC" placeholder="Staff Lic." maxlength="<?php echo $STAFFL_LENG; ?>" name="P_STAFFLIC" required>
              </div>
            </div>
          <!-- STAFF LICENSE NUMBER END -->
        </div>
        </div>
          <!-- VISUAL ACUITY -->
            <div class="panel-group" style="margin-top:25px; margin-bottom:0px;">
              <div class="panel panel-default" style="">
                <div class="panel-heading" id="panelh">Visual Acuity</div>
                  <div class="panel-body">
				  
				  <table class="table">
					<thead>
						<th></th>
						<th>Pre Surgery Visual Acuity<span style="color: #d9534f">*</span></th>
						<th>Post Surgery Visual Acuity</th>
					</thead>
					<tbody>
						<!-- LEFT EYE W/ SPECT -->
						<tr>
							<td><strong>Left Eye with Spectacles</strong></td>
							<td>
								<select class="form-control" id="P_VASL1"  name="P_VASL1" style="width: 200px;" required>
								  <?php for ($j=0; $j < count($VA_choice); $j++) { 
									echo "<option>".$VA_choice[$j]."</option>";
								   } ?>
							   </select>
							</td>
							<td>
								<select class="form-control" id="P_VASL2"  name="P_VASL2" style="width: 200px;" required>
								  <?php for ($j=0; $j < count($VA_choice); $j++) { 
									echo "<option>".$VA_choice[$j]."</option>";
								   } ?>
							   </select>
							</td>
						</tr>
						<!-- END -->
						<!-- RIGHT EYE W/ SPECT -->
						<tr>
							<td><strong>Right Eye with Spectacles</strong></td>
							<td>
								<select class="form-control" id="P_VASR1"  name="P_VASR1" style="width: 200px;" required>
								  <?php for ($j=0; $j < count($VA_choice); $j++) { 
									echo "<option>".$VA_choice[$j]."</option>";
								   } ?>
							   </select>
							</td>
							<td>
								<select class="form-control" id="P_VASR2"  name="P_VASR2" style="width: 200px;" required>
								  <?php for ($j=0; $j < count($VA_choice); $j++) { 
									echo "<option>".$VA_choice[$j]."</option>";
								   } ?>
							   </select>
							</td>
						</tr>
						<!-- END -->
						<!-- LEFT EYE W/OUT SPECT -->
						<tr>
							<td><strong>Left Eye without Spectacles</strong></td>
							<td>
								<select class="form-control" id="P_VAL1"  name="P_VAL1" style="width: 200px;" required>
								  <?php for ($j=0; $j < count($VA_choice); $j++) { 
									echo "<option>".$VA_choice[$j]."</option>";
								   } ?>
							   </select>
							</td>
							<td>
								<select class="form-control" id="P_VAL2"  name="P_VAL2" style="width: 200px;" required>
								  <?php for ($j=0; $j < count($VA_choice); $j++) { 
									echo "<option>".$VA_choice[$j]."</option>";
								   } ?>
							   </select>
							</td>
						</tr>
						<!-- END -->
						<!-- RIGHT EYE W/OUT SPECT -->
						<tr>
							<td><strong>Right Eye without Spectacles</strong></td>
							<td>
								<select class="form-control" id="P_VAR1"  name="P_VAR1" style="width: 200px;" required>
								  <?php for ($j=0; $j < count($VA_choice); $j++) { 
									echo "<option>".$VA_choice[$j]."</option>";
								   } ?>
							   </select>
							</td>
							<td>
								<select class="form-control" id="P_VAR2"  name="P_VAR2" style="width: 200px;" required>
								  <?php for ($j=0; $j < count($VA_choice); $j++) { 
									echo "<option>".$VA_choice[$j]."</option>";
								   } ?>
							   </select>
							</td>
						</tr>
						<!-- END -->
					</tbody>
				  </table>

                  </div>
                </div>
              </div>
            <!-- VISUAL ACUITY END -->

			<div class="row">
				<div class="col-md-7">
					<!-- DESCRIPTION OF VISUAL PROBLEM -->
					  <div class="panel-group" style="margin-top:25px;">
						<div class="panel panel-default" style="">
						  <div class="panel-heading" id="panelh">Description of Visual Problem</div>
							<div class="panel-body">

						  <!-- VISUAL DISABILITY -->
							<div class="form-group row">
							  <label class="control-label col-md-2" for="P_VD" style="float:left; width:170px;">Visual Disability </label>
							  <div class="col-md-4" style="width: 400px;">
								<input type="text" class="form-control" id="P_VD" placeholder="Enter the patient's eye disability..." maxlength="<?php echo $VD_MAX; ?>" name="P_VD">
							  </div>
							</div>
						  <!-- VISUAL DISABILITY -->

						  <!-- CAUSE OF DISABILITY -->
							<div class="form-group row">
							  <label class="control-label col-md-2" for="P_DC" style="float:left; width:170px;">Cause </label>
							  <div class="col-md-6" style="width: 400px;">
								<input type="text" class="form-control" id="P_DC" placeholder="Enter the cause of the patient's visual disability..." maxlength="<?php echo $DC_MAX; ?>" name="P_DC">
							  </div>
							</div>
						  <!-- CAUSE OF DISABILITY END -->
						  
						  <!-- DIAGNOSIS -->
							<div class="form-group row">
							  <label class="control-label col-md-2" for="P_DIAG" style="float:left; width:170px;">Diagnosis </label>
							  <div class="col-md-6" style="width: 400px;">
								<input type="text" class="form-control" id="P_DIAG" placeholder="Enter the doctor's diagnosis..." maxlength="15" name="P_DIAG">
							  </div>
							</div>
						  <!-- DIAGNOSIS END -->
						  
						  <!-- PROCEDURE -->
							<div class="form-group row">
							  <label class="control-label col-md-2" for="P_PROC" style="float:left; width:170px;">Procedure </label>
							  <div class="col-md-6" style="width: 400px;">
								<input type="text" class="form-control" id="P_PROC" placeholder="Enter the procedure to be done..." maxlength="15" name="P_PROC">
							  </div>
							</div>
						  <!-- PROCEDURE END -->

						  </div>
						</div>
					  </div>
					<!-- DESCRIPTION OF VISUAL PROBLEM END -->
				</div>
			
				<div class="col-md-5">
					<!-- AFFECTED EYE -->
					  <div class="panel-group" style="margin-top:25px;">
						<div class="panel panel-default" style="">
						  <div class="panel-heading" id="panelh">Affected Eye</div>
							<div class="panel-body">

						  <!-- AFFECTED PART OF RIGHT EYE -->
							<div class="form-group row">
							  <label class="control-label col-md-2" for="P_REA" style="float:left; width:170px;">Right Eye</label>
							  <div class="col-md-4" style="width: 200px;">
								<input type="" class="form-control" id="P_REA" placeholder="Affected Area of Eye" maxlength="<?php echo $REA_MAX; ?>" name="P_REA">
							  </div>
							</div>
						  <!-- AFFECTED PART OF RIGHT EYE END -->
							
						  <!-- AFFECTED PART OF LEFT EYE -->
							<div class="form-group row">
							  <label class="control-label col-md-2" for="P_LEA" style="float:left; width:170px;">Left Eye</label>
							  <div class="col-md-4" style="width: 200px;">
								<input type="" class="form-control" id="P_LEA" placeholder="Affected Area of Eye" maxlength="<?php echo $LEA_MAX; ?>" name="P_LEA">
							  </div>
							</div>
						  <!-- AFFECTED PART OF LEFT EYE END -->

						  </div>
						</div>
					  </div>
					<!-- AFFECTED EYE END -->
				</div>
			</div>

          <!-- ... -->
            
          <!-- ... -->

          <!-- ENTER -->
          <div class="text-center" style="margin-bottom: 20px;">
            <button type="submit" class="btn" id="go" name="patients_info">Submit</button>
          </div>
          <!-- ENTER END -->

          </form>
        </div>
      <!-- FORMS END -->
      
    </div>
  <!-- CONTENT END -->

  </div>
</div>
<?php
//ERROR CHECKING

//...code
?>

</div>
<!-- MAIN END -->
</div>

</body>
</html>
