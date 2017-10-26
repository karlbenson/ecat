<!DOCTYPE html>
<html>
<head>

	<title>Prototype</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="references/bootstrap.min.css">
  <link rel="stylesheet" href="references/typeahead.css">	
  <link rel="stylesheet" href="references/font-awesome.min.css">
  <script src="references/jquery.min.js"></script>
  <script src="references/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="theme2.css">
  <script src="references/typeahead.bundle.js"></script>

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
          <hr style=" border: solid 1px #2d4309;  width:100%; padding: 0px;">
              
          <form method="post" action="submit.php">
			
          <!-- PATIENT -->
            <div class="form-group row">
              <label class="control-label col-md-3 for="P_ID" style="float:left; width:170px;">Patient: </label>
			  <div class="col-md-3" style="width: 180px; float: left;">
                <input type="text" class="form-control" id="P_ID" placeholder="Patient ID" maxlength="<?php echo $ID_LENG; ?>" name="P_ID" required>
              </div>
			  
			  <div class="col-md-3" style="width: 250px; float: left;">
                <input type="text" class="form-control" id="P_FNAME" placeholder="First Name" maxlength="20" name="P_FNAME" required>
              </div>
			  
			  <div class="col-md-3" style="width: 250px; float: left;">
                <input type="text" class="form-control" id="P_LNAME" placeholder="Last Name" maxlength="20" name="P_LNAME" required>
              </div>
			
              <!--<div class="col-md-3" style="width: 180px; float: left;">
                <input type="text" class="form-control" id="PAT_NAME" placeholder="Patient Name" maxlength="<?php echo $MAX_NAME; ?>" name="PAT_ID" required>
              </div> -->
            </div>
          <!-- PATIENT END-->
			
			<!-- PATIENT AGE -->
				<div class="form-group row">
				  <label class="control-label col-md-3 for="P_AGE" style="float:left; width:170px;">Age: </label>
				  <div class="col-md-3" style="width: 180px; float: left;">
					<input type="text" class="form-control" id="P_AGE" name="P_AGE" placeholder="Patient Age" maxlength="6" required>
				  </div>
				  
				  <label class="control-label col-md-4" for="P_PH" style="float:left; width:170px;">Has PhilHealth? </label>
				  <div class="col-md-4" style="width: 280px; float: left;">
					<label class="radio-inline" id="P_PH"><input name="P_PH" type="radio" value="Y">Yes</label>
					<label class="radio-inline" id="P_PH"><input name="P_PH" type="radio" value="N" required>No</label>
				  </div>
				  
					<!--
				  <div class="col-md-3" style="width: 180px; float: left;">
					<input type="text" class="form-control" id="PAT_NAME" placeholder="Patient Name" maxlength="<?php echo $MAX_NAME; ?>" name="PAT_ID" required>
				  </div> -->
				</div>
			<!-- PATIENT AGE END -->
			
			<!-- PATIENT SEX -->
				<div class="form-group row">
				  <label class="control-label col-md-4" for="P_SEX" style="float:left; width:170px;">Sex: </label>
				  <div class="col-md-4" style="width: 280px; float: left;">
					<label class="radio-inline" id="P_SEX"><input name="P_SEX" type="radio" value="M" required>Male</label>
					<label class="radio-inline" id="P_SEX"><input name="P_SEX" type="radio" value="F">Female</label>
				  </div>

				  <!--<div class="col-md-3" style="width: 180px; float: left;">
					<input type="text" class="form-control" id="PAT_NAME" placeholder="Patient Name" maxlength="<?php echo $MAX_NAME; ?>" name="PAT_ID" required>
				  </div> -->
				</div>
			<!-- PATIENT SEX END -->

          <!-- PHYSICIAN LICENSE NUMBER -->
            <div class="form-group row">
              <label class="control-label col-md-2" for="P_PHY" style="float:left; width:170px;">Examined by: </label>
              <div class="col-md-2" style="width: 180px; float: left;">
				<input type="text" class="form-control typeahead tt-query" autocomplete="off" id="ANEST" placeholder="Physician" maxlength="<?php echo $ANEST_MAX; ?>" name="P_PHY">
              </div>

			  <!--<div class="col-md-2" style="width: 180px; float: left;">
                <input pattern="\d{7}" title="Physician Name" class="form-control" id="PHYS_LIC" placeholder="Physician Name" maxlength="<?php echo $MAX_NAME; ?>" name="PHYS_LIC" required>
              </div>-->
            </div>
          <!-- PHYSICIAN LICENSE NUMBER END -->

          <!-- STAFF LICENSE NUMBER -->
            <div class="form-group row">
              <label class="control-label col-md-2" for="P_STAFFLIC" style="float:left; width:170px;">Screened by: </label>
              <div class="col-md-2" style="width: 180px; float: left;">
                <input pattern="\d{7}" title="License Number ranges from 0000000-9999999." class="form-control" id="P_STAFFLIC" placeholder="Staff Lic." maxlength="<?php echo $STAFFL_LENG; ?>" name="P_STAFFLIC" required>
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

<?php
	include("dbconnect.php");

    $surgeon = $mydatabase->query("SELECT FIRST_NAME,LAST_NAME,DOC_LICENSE_NUM from DOCTOR");
                $arr = array();
    
                while ($row = $surgeon->fetch_assoc()) {

                        unset($id, $name1, $name2);
                        $id = $row['FIRST_NAME']." ".$row['LAST_NAME']."-".$row['DOC_LICENSE_NUM'];
                        //$name1 = $row['FIRST_NAME'];
                        //$name2 = $row['LAST_NAME'];
                        array_push($arr, $id/*.", ".$name2." ".$name1*/);
                       
                }
?>

<script type="text/javascript">
$(document).ready(function(){
    // Defining the local dataset
    var arrs= <?php echo json_encode($arr);?>;
    //var cars = ['Audi', 'BMW', 'Bugatti', 'Ferrari', 'Ford', 'Lamborghini', 'Mercedes Benz', 'Porsche', 'Rolls-Royce', 'Volkswagen'];
    
    // Constructing the suggestion engine
    var arrs = new Bloodhound({
        datumTokenizer: Bloodhound.tokenizers.whitespace,
        queryTokenizer: Bloodhound.tokenizers.whitespace,
        local: arrs
    });
    
    // Initializing the typeahead
    $('.typeahead').typeahead({
        hint: true,
        highlight: true, /* Enable substring highlighting */
        minLength: 1 /* Specify minimum characters required for showing result */
    },
    {
        name: 'arrs',
        source: arrs
    });
});  
</script>
