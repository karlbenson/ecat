<!DOCTYPE html>
<html>
	<head>
		<title>Luke Foundation Eye Program: Surgery</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" media="screen" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" />
		<link rel="stylesheet" href="references/bootstrap.min.css">
		<link rel="stylesheet" href="references/typeahead.css">
		<link rel="stylesheet" href="references/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="theme2.css">
  <link rel="stylesheet" href="references/bootstrap-datetimepicker.css">
		<script src="references/jquery-2.1.1.min.js"></script>
		<script src="references/bootstrap.min.js"></script>
		<script src="references/moment-with-locales.js"></script>
		<script src="references/bootstrap-datetimepicker.js"></script>
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
				<div class="container-fluid" style="color: #337ab7; text-shadow: 0px 0px 10px #ffffff; margin-bottom: 10px;">
					<h4>Eye Program: Surgery Form</h4> 
				</div>
				<!-- TITLE END -->
				<?php  //CODE SECTION START
					//SURGERY INFORMATION FIELDS MAX CHAR VALUES
					$CASE_LENG = 10;
					$SURG_LENG = 7;
					$ID_LENG = 15;
					$VI_MAX = 100;
					$HIST_MAX = 100;
					$DIAG_MAX = 100;
					$TANES_MAX = 25;
					$SURGADD_MAX = 50;
					$REM_MAX = 100;
					$MAX_NAME = 40;
					$INTER_MAX = 40;
					$ANEST_MAX = 40;
					$IOL_MAX = 20;
					$PC_MAX = 10;
					//SURGERY INFORMATION FIELDS END
					//CODE SECTION END
				?>
				<!-- SURGERY FORM -->
				<div class="container-fluid" id="basic" style="padding-top: 10px;">
					<div id="inner">
						<!-- CONTENT -->
						<div class="container-fluid" >

							<!-- FORMS -->
							<div class="container-fluid">
								<h3>Surgery Information</h3>
								<hr>
        <p style="margin-bottom: 20px; color:#666666;">
          Please do not leave the required<span style="color: #d9534f">*</span> fields blank. If there are no entries, use indicators (such as n/a or NA).
        </p>

								<form method="post" action="submit.php" id="surg_form">

									<!-- CASE NUMBER-->
									<div class="form-group row">
										<label class="control-label col-md-2" for="CASE_NUM" style="float:left; width:170px;">Case Number<span style="color: #d9534f">*</span></label>
										<div class="col-md-2" style="width: 150px; float: left;">
											<input pattern="20\d\d-\d\d\d\d\d" title="Case Numbers range from 2000-00000 to 2099-99999." class="form-control" id="CASE_NUM" placeholder="20XX-XXXXX" maxlength="<?php echo $CASE_LENG; ?>" name="CASE_NUM" required>
										</div>
									</div>
									<!-- CASER NUMBER END -->

									<!-- SURGEON LICENSE NUMBER -->
									<div class="form-group row">
										<label class="control-label col-md-2" for="SURG_LIC" style="float:left; width:170px;">Surgeon<span style="color: #d9534f">*</span></label>
										<div class="col-md-6" style="float:left;">
											<div style="width: 200px; float: left; ">
												<input class="form-control typeahead tt-query" autocomplete="off" id="SURG_NAME" placeholder="Surgeon Name" maxlength="40" name="SURG_NAME" type="textbox" required>
											</div>
										</div>
									</div>
									<!-- SURGEON LICENSE NUMBER END -->
              
									<!-- INTERNIST NAME -->
									<div class="form-group row">
										<label class="control-label col-md-2" for="INTER" style="float:left; width:170px;">Internist<span style="color: #d9534f">*</span></label>
										<div class="col-md-6" style="width: 225px; float: left;">
											<input type="text" class="form-control typeahead tt-query" autocomplete="off" id="INTER" placeholder="Internist Name" maxlength="<?php echo $INTER_MAX; ?>" name="INTER" required>
										</div>
									</div>
									<!-- INTERNIST NAME END -->

									<!-- TYPE OF ANESTHESIOLOGIST -->
									<div class="form-group row">
										<label class="control-label col-md-2" for="ANEST" style="float:left; width:170px;">Anesthesiologist<span style="color: #d9534f">*</span></label>
										<div class="col-md-6" style="width: 225px; float: left;">
											<input type="text" class="form-control typeahead tt-query" autocomplete="off" id="ANEST" placeholder="Anesthesiologist" maxlength="<?php echo $ANEST_MAX; ?>" name="ANEST" required>
										</div>
									</div>
									<!-- TYPE OF ANESTHESIOLOGIST END -->
         
									<!-- PATIENT INFORMATION -->
									<div class="panel-group" style="margin-top:25px;">
										<div class="panel panel-default" style="">
											<div class="panel-heading" id="panelh">Patient Information</div>
											<div class="panel-body">

												<!-- PATIENT ID -->
												<div class="form-group row">
	            <label class="control-label col-md-3" for="PAT_NAME" style="float:left; width:200px;">Patient Name<span style="color: #d9534f">*</span></label>
             <div class="col-md-6" style="width: 250px; float: left; margin-right:10px;">
               <input type="text" class="form-control typeahead1 tt-query" autocomplete="off" id="PAT_NAME" placeholder="Patient Name" maxlength="<?php echo $MAX_NAME; ?>" name="PAT_NAME" required>
	            </div>
	           </div>
												<!-- PATIENT ID END -->

												<!-- VISUAL IMPARITY -->
												<div class="form-group row">
													<label class="control-label col-md-3" for="VI" style="float:left; width:200px;">Visual Impairment<span style="color: #d9534f">*</span></label>
													<div class="col-md-6" style="width: 600px; float: left;">
														<input type="text" class="form-control" id="VI" placeholder="Description of visual impairment..." maxlength="<?php echo $VI_MAX; ?>" name="VI" required>
													</div>
												</div>
												<!-- VISUAL IMPARITY END -->
                    
												<!-- MEDICAL HISTORY -->
												<div class="form-group row">
													<label class="control-label col-md-3" for="MED_HIST" style="float:left; width:200px;">Medical History </label>
													<div class="col-md-6" style="width: 600px; float: left;">
														<input type="text" class="form-control" id="MED_HIST" placeholder="Patient medical history..." maxlength="<?php echo $HIST_MAX; ?>" name="MED_HIST">
													</div>
												</div>
												<!-- MEDICAL HISTORY END -->
											</div>
										</div>
									</div>
									<!-- PATIENT INFORMATION END -->

									<!-- SURGERY DETAILS -->
									<div class="panel-group" style="margin-top:25px;">
										<div class="panel panel-default" style="">
											<div class="panel-heading" id="panelh">Surgery Details</div>
											<div class="panel-body">
        
												<!-- IOL POWER -->
												<div class="form-group row" >
             <label class="control-label col-md-3" for="IOL" style="float:left; width:200px;">IOL Power<span style="color: #d9534f">*</span></label>
             <div class="col-md-6" style="width: 150px; float: left;">
              <input type="text" class="form-control" id="IOL" placeholder="IOL" maxlength="<?php echo $IOL_MAX; ?>" name="IOL" required>
             </div>
           	</div>
												<!-- IOL POWER END -->
      
												<!-- TYPE OF ANESTHESIA -->
												<div class="form-group row">
             <label class="control-label col-md-3" for="TANES" style="float:left; width:200px;">Type of Anesthesia<span style="color: #d9534f">*</span></label>
             <div class="col-md-6" style="width: 150px; float: left;">
              <select class="form-control" id="TANES"  name="TANES" required>
               <option value="n/a" selected>--Select--</option>
               <option>General</option>
               <option>Local</option>
               <option>Topical</option>
              </select>
             </div>
           </div>
												<!-- TYPE OF ANESTHESIA END -->
        
												<!-- SURGERY ADDRESS -->
												<div class="form-group row">
             <label class="control-label col-md-3" for="SURG_ADD" style="float:left; width:200px;">Surgery Address<span style="color: #d9534f">*</span></label>
             <div class="col-md-6" style="width: 550px; float: left;">
               <input type="text" class="form-control" id="SURG_ADD" placeholder="Enter address of where the sugery was conducted..." maxlength="<?php echo $SURGADD_MAX; ?>" name="SURG_ADD" required>
             </div>
           	</div>
												<!-- SURGERY ADDRESS END -->
  
												<!-- DATE -->
												<div class="form-group row">
													<label class="control-label col-md-3" style="float:left; width:200px;">Date of Surgery </label>
													<div class="col-md-7"  style="float:left; width:250px;">
														<div class="form-group">
															<div class='input-group date' id='datetimepicker'>
																<input type='text' class='form-control' id='DATE' name='DATE' placeholder='MM/DD/YYYY' required>
																<span class="input-group-addon">
																	<span class="glyphicon glyphicon-calendar"></span>
																</span>
															</div>
														</div>
														<script type="text/javascript">
															$(function () {
																$('#datetimepicker').datetimepicker({
																	format: 'L'
																});
															});
														</script>
													</div>
												</div>
												<!-- DATE END -->
											</div>
										</div>
									</div>
									<!-- SURGERY DETAILS END -->

									<!-- SURGEON REPORT -->
									<div class="panel-group" style="margin-top:25px;">
										<div class="panel panel-default" style="">
											<div class="panel-heading" id="panelh">Surgery Report</div>
											<div class="panel-body">
												<!-- DIAGNOSIS-->
												<div class="form-group row">
													<label class="control-label col-md-2" for="DIAG" style="float:left; width:170px;">Diagnosis </label>
													<div class="col-md-7" style="width: 600px; float: left;">
														<input type="text" class="form-control" id="DIAG" placeholder="Eye Surgery Diagnosis" maxlength="<?php echo $DIAG_MAX; ?>" name="DIAG">
													</div>
												</div>
												<!-- DIAGNOSIS END -->
                    
												<!-- SURGERY REMARKS -->
												<div class="form-group row">
													<label class="control-label col-md-2" for="REM" style="float:left; width:170px;">Remarks</label>
													<div class="col-md-7" style="width: 600px; float: left;">
														<input type="text" class="form-control" id="REM" placeholder="Surgeon's Remarks" maxlength="<?php echo $REM_MAX; ?>" name="REM">
													</div>
												</div>
												<!-- SURGERY REMARKS END -->
											</div>
										</div>
									</div>
									<!-- SURGERY REPORT END -->

									<!-- FINANCIAL INFORMATION -->
									<div class="panel-group" style="margin-top:25px;">
										<div class="panel panel-default" style="">
											<div class="panel-heading" id="panelh">Financial Information</div>
											<div class="panel-body">
												<!-- PATIENT COUNTERPART -->
												<div class="form-group row">
													<label class="control-label col-md-3" style="float:left; width:200px;">Patient Counterpart </label>
													<div class="col-md-7"  style="float:left; min-width:400px;">
														<div style="width: 125px; float: left; margin-right:10px;">
															<input type="text" class="form-control" id="PCIOL" placeholder="IOL" maxlength="<?php echo $PC_MAX; ?>" name="PCIOL">
														</div>
														<div style="width: 125px; float: left; margin-right:10px;">
															<input type="text" class="form-control" id="PCLAB" placeholder="LAB" maxlength="<?php echo $PC_MAX; ?>" name="PCLAB">
														</div>
														<div style="width: 125px; float: left; margin-right:10px;">
															<input type="text" class="form-control" id="PCPF" placeholder="PF(Other)" maxlength="<?php echo $PC_MAX; ?>" name="PCPF">
														</div>
													</div>
												</div>
												<!-- PATIENT COUNTERPART END -->
          
												<!-- SPONSORED IOL -->
												<div class="form-group row">
													<label class="control-label col-md-3" for="SPOIOL" style="float:left; width:200px;">Sponsored IOL</label>
													<div class="col-md-6" style="width: 200px; float: left;">
														<input type="text" class="form-control" id="SPOIOL" placeholder="Sponsorship Amount" maxlength="<?php echo $PC_MAX; ?>" name="SPOIOL">
													</div>
												</div>
												<!-- SPONSORED IOL END -->
  
												<!-- CSF -->
												<div class="form-group row">
													<label class="control-label col-md-3" style="float:left; width:200px;"> CSF </label>
													<div class="col-md-7"  style="float:left; min-width:400px;">
														<div style="width: 125px; float: left; margin-right:10px;">
															<input type="text" class="form-control" id="CSFHBILL" placeholder="Hospital Bill" maxlength="<?php echo $PC_MAX; ?>" name="CSFHBILL">
														</div>
														<div style="width: 125px; float: left; margin-right:10px;">
															<input type="text" class="form-control" id="CSFSUP" placeholder="Supplies" maxlength="<?php echo $PC_MAX; ?>" name="CSFSUP">
														</div>
														<div style="width: 125px; float: left; margin-right:10px;">
															<input type="text" class="form-control" id="CSFLAB" placeholder="Laboratory" maxlength="<?php echo $PC_MAX; ?>" name="CSFLAB">
														</div>
													</div>
												</div>
												<!-- CSF END -->
											</div>
										</div>
										<!-- FINANCIAL INFORMATION END -->
         
										<!-- ENTER -->
										<div class="text-center" style="margin: 20px;">
           <button type="submit" class="btn" id="veracity" name="surgery_info">Submit</button>
          </div>
										<!-- ENTER END -->

										<!-- SCRIPT -->
										<?php include("pass_verify.php");?>
										<script>
											$("#surg_form").submit(function(e){
	        			e.preventDefault(pass());
	    						});

          	function pass(){
            $("#enter_pass").modal("toggle");
          	}

          	function go_on(){
          		document.getElementById("verity").name = "surgery_info";
          		$("#surg_form").unbind('submit').submit();
          	}
										</script>
										<!-- SCRIPT END -->
								</form>
							</div>
							<!-- FORMS END -->
						</div>
						<!-- CONTENT END -->
					</div>
				</div>
				<!-- SURGERY FORM END -->
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
				
	$patient = $mydatabase->query("SELECT PAT_FNAME,PAT_LNAME,PAT_ID_NUM from EYEPATIENT");
    $arr1 = array();
    
    while ($row = $patient->fetch_assoc()) {
		unset($id, $name1, $name2);
        $id = $row['PAT_FNAME']." ".$row['PAT_LNAME']."-".$row['PAT_ID_NUM'];
        //$name1 = $row['FIRST_NAME'];
		//$name2 = $row['LAST_NAME'];
        array_push($arr1, $id/*.", ".$name2." ".$name1*/);    
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

<script type="text/javascript">
	$(document).ready(function(){
		// Defining the local dataset
		var arrs= <?php echo json_encode($arr1);?>;
		//var cars = ['Audi', 'BMW', 'Bugatti', 'Ferrari', 'Ford', 'Lamborghini', 'Mercedes Benz', 'Porsche', 'Rolls-Royce', 'Volkswagen'];
		
		// Constructing the suggestion engine
		var arrs = new Bloodhound({
			datumTokenizer: Bloodhound.tokenizers.whitespace,
			queryTokenizer: Bloodhound.tokenizers.whitespace,
			local: arrs
		});
		
		// Initializing the typeahead
		$('.typeahead1').typeahead({
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

