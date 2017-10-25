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
    <h4>Eye Cataract Program</h4> <br>
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
					'CF 20&#39;', 'CF 19&#39;', 'CF 18&#39;', 'CF 17&#39;', 'CF 16&#39;', 'CF 15&#39;',
					'CF 14&#39;', 'CF 13&#39;', 'CF 12&#39;', 'CF 11&#39;', 'CF 10&#39;', 'CF 9&#39;',
					'CF 8&#39;', 'CF 7&#39;', 'CF 6&#39;', 'CF 5&#39;', 'CF 4&#39;', 'CF 3&#39;',
					'CF 2&#39;', 'CF 1&#39;', 'HM', '+LP', '-LP');
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
          <hr style=" border: solid 1px #2d4309;  width:100%; padding: 0px;">
              
          <form method="post" action="submit.php">
			
          <!-- PATIENT ID -->
            <div class="form-group row">
              <label class="control-label col-md-4 for="PAT_ID" style="float:left; width:170px;">Patient ID: </label>
			  <div class="col-md-2" style="width: 180px; float: left;">
                <input type="text" class="form-control" id="PAT_ID" placeholder="Patient ID" maxlength="<?php echo $ID_LENG; ?>" name="PAT_ID" required>
              </div>
			
              <!--<div class="col-md-3" style="width: 180px; float: left;">
                <input type="text" class="form-control" id="PAT_NAME" placeholder="Patient Name" maxlength="<?php echo $MAX_NAME; ?>" name="PAT_ID" required>
              </div> -->
            </div>
          <!-- PATIENT ID END -->
			
			<!-- PATIENT AGE -->
				<div class="form-group row">
				  <label class="control-label col-md-4" for="PAT_AGE" style="float:left; width:170px;">Age: </label>
				  <div class="col-md-4" style="width: 180px; float: left;">
					<input type="text" class="form-control" id="PAT_AGE" placeholder="Patient Age" maxlength="2" name="PAT_AGE" required>
				  </div>

				  <!--<div class="col-md-3" style="width: 180px; float: left;">
					<input type="text" class="form-control" id="PAT_NAME" placeholder="Patient Name" maxlength="<?php echo $MAX_NAME; ?>" name="PAT_ID" required>
				  </div> -->
				</div>
			<!-- PATIENT AGE END -->
			
			<!-- PATIENT SEX -->
				<div class="form-group row">
				  <label class="control-label col-md-4" for="PAT_SEX" style="float:left; width:170px;">Sex: </label>
				  <div class="col-md-4" style="width: 280px; float: left;">
					<label class="radio-inline" id="PAT_SEX"><input type="radio" name="sex">Male</label>
					<label class="radio-inline" id="PAT_SEX"><input type="radio" name="sex">Female</label>
					<label class="radio-inline" id="PAT_SEX"><input type="radio" name="sex">Chinese</label>
				</div>

				  <!--<div class="col-md-3" style="width: 180px; float: left;">
					<input type="text" class="form-control" id="PAT_NAME" placeholder="Patient Name" maxlength="<?php echo $MAX_NAME; ?>" name="PAT_ID" required>
				  </div> -->
				</div>
			<!-- PATIENT SEX END -->

          <!-- PHYSICIAN LICENSE NUMBER -->
            <div class="form-group row">
              <label class="control-label col-md-2" for="PHYS_LIC" style="float:left; width:170px;">Examined by: </label>
              <div class="col-md-2" style="width: 120px; float: left;">
                <input pattern="\d{7}" title="License Number ranges from 0000000-9999999." class="form-control" id="PHYS_LIC" placeholder="Phys. Lic." maxlength="<?php echo $PHYL_LENG; ?>" name="PHYS_LIC" required>
              </div>

			  <!--<div class="col-md-2" style="width: 180px; float: left;">
                <input pattern="\d{7}" title="Physician Name" class="form-control" id="PHYS_LIC" placeholder="Physician Name" maxlength="<?php echo $MAX_NAME; ?>" name="PHYS_LIC" required>
              </div>-->
            </div>
          <!-- PHYSICIAN LICENSE NUMBER END -->

          <!-- STAFF LICENSE NUMBER -->
            <div class="form-group row">
              <label class="control-label col-md-2" for="STAFF_LIC" style="float:left; width:170px;">Screened by: </label>
              <div class="col-md-2" style="width: 120px; float: left;">
                <input pattern="\d{7}" title="License Number ranges from 0000000-9999999." class="form-control" id="STAFF_LIC" placeholder="Staff Lic." maxlength="<?php echo $STAFFL_LENG; ?>" name="STAFF_LIC" required>
              </div>
			  <!--<div class="col-md-2" style="width: 180px; float: left;">
                <input pattern="\d{7}" title="Staff Name" class="form-control" id="STAFF_LIC" placeholder="Staff Name" maxlength="<?php echo $MAX_NAME; ?>" name="STAFF_NAME" required>
              </div>-->
            </div>
          <!-- STAFF LICENSE NUMBER END -->

          <!-- VISUAL ACUITY -->
            <div class="panel-group" style="margin-top:25px;">
              <div class="panel panel-default" style="">
                <div class="panel-heading" id="panelh">Visual Acuity</div>
                  <div class="panel-body">
				  
				  <table class="table">
					<thead>
						<th></th>
						<th>Pre Surgery Visual Acuity</th>
						<th>Post Surgery Visual Acuity</th>
					</thead>
					<tbody>
						<!-- LEFT EYE W/ SPECT -->
						<tr>
							<td><strong>Left Eye with Spectacles</strong></td>
							<td>
								<select class="form-control" id="VASL1"  name="VASL1" style="width: 200px;" required>
								  <?php for ($j=0; $j < count($VA_choice); $j++) { 
									echo "<option>".$VA_choice[$j]."</option>";
								   } ?>
							   </select>
							</td>
							<td>
								<select class="form-control" id="VASL2"  name="VASL2" style="width: 200px;" required>
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
								<select class="form-control" id="VASR1"  name="VASR1" style="width: 200px;" required>
								  <?php for ($j=0; $j < count($VA_choice); $j++) { 
									echo "<option>".$VA_choice[$j]."</option>";
								   } ?>
							   </select>
							</td>
							<td>
								<select class="form-control" id="VASR2"  name="VASR2" style="width: 200px;" required>
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
								<select class="form-control" id="VAL1"  name="VAL1" style="width: 200px;" required>
								  <?php for ($j=0; $j < count($VA_choice); $j++) { 
									echo "<option>".$VA_choice[$j]."</option>";
								   } ?>
							   </select>
							</td>
							<td>
								<select class="form-control" id="VAL2"  name="VAL2" style="width: 200px;" required>
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
								<select class="form-control" id="VAR1"  name="VAR1" style="width: 200px;" required>
								  <?php for ($j=0; $j < count($VA_choice); $j++) { 
									echo "<option>".$VA_choice[$j]."</option>";
								   } ?>
							   </select>
							</td>
							<td>
								<select class="form-control" id="VAR2"  name="VAR2" style="width: 200px;" required>
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
							  <label class="control-label col-md-2" for="VD" style="float:left; width:170px;">Visual Disability </label>
							  <div class="col-md-4" style="width: 400px;">
								<input type="text" class="form-control" id="VD" placeholder="Enter the patient's eye disability..." maxlength="<?php echo $VD_MAX; ?>" name="VD">
							  </div>
							</div>
						  <!-- VISUAL DISABILITY -->

						  <!-- CAUSE OF DISABILITY -->
							<div class="form-group row">
							  <label class="control-label col-md-2" for="DC" style="float:left; width:170px;">Cause </label>
							  <div class="col-md-6" style="width: 400px;">
								<input type="text" class="form-control" id="DC" placeholder="Enter the cause of the patient's visual disability..." maxlength="<?php echo $DC_MAX; ?>" name="DC">
							  </div>
							</div>
						  <!-- CAUSE OF DISABILITY END -->
						  
						  <!-- DIAGNOSIS -->
							<div class="form-group row">
							  <label class="control-label col-md-2" for="Diag" style="float:left; width:170px;">Diagnosis </label>
							  <div class="col-md-6" style="width: 400px;">
								<input type="text" class="form-control" id="Diag" placeholder="Enter the doctor's diagnosis..." maxlength="15" name="Diag">
							  </div>
							</div>
						  <!-- DIAGNOSIS END -->
						  
						  <!-- PROCEDURE -->
							<div class="form-group row">
							  <label class="control-label col-md-2" for="Proc" style="float:left; width:170px;">Procedure </label>
							  <div class="col-md-6" style="width: 400px;">
								<input type="text" class="form-control" id="Proc" placeholder="Enter the procedure to be done..." maxlength="15" name="Proc">
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
							  <label class="control-label col-md-2" for="REA" style="float:left; width:170px;">Right Eye</label>
							  <div class="col-md-4" style="width: 200px;">
								<input type="" class="form-control" id="REA" placeholder="Affected Area of Eye" maxlength="<?php echo $REA_MAX; ?>" name="REA">
							  </div>
							</div>
						  <!-- AFFECTED PART OF RIGHT EYE END -->
							
						  <!-- AFFECTED PART OF LEFT EYE -->
							<div class="form-group row">
							  <label class="control-label col-md-2" for="LEA" style="float:left; width:170px;">Left Eye</label>
							  <div class="col-md-4" style="width: 200px;">
								<input type="" class="form-control" id="LEA" placeholder="Affected Area of Eye" maxlength="<?php echo $LEA_MAX; ?>" name="LEA">
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
