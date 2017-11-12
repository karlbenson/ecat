<!DOCTYPE html>
<html>
	<head>
		<title>Luke Foundation Eye Program: Surgery</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" media="screen" href="references/3.3.1/bootstrap.min.css" />
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
					$SURG_LENG = 50;
					$ID_LENG = 15;
					$VI_MAX = 100;
					$HIST_MAX = 100;
					$DIAG_MAX = 100;
					$TANES_MAX = 50;
					$SURGADD_MAX = 50;
					$REM_MAX = 100;
					$MAX_NAME = 50;
					$INTER_MAX = 50;
					$ANEST_MAX = 50;
					$IOL_MAX = 20;
					$PC_MAX = 10;
					//SURGERY INFORMATION FIELDS END
					
					//DETERMINE NEXT CASE_NUM
					include('dbconnect.php');
					$current_year = getdate()['year'];
					$output = $mydatabase->prepare("select CASE_NUM from SURGERY where CASE_NUM like '".$current_year."-%' order by CASE_NUM DESC LIMIT 1");
					$output->execute();
					$line = $output->get_result();
					$dataline = $line->fetch_assoc();
					
					if(sizeof($dataline) == 0){
						$NEXT_CASE_NUM = $current_year."-00000";
					}else{
						$LAST_VAL = explode("-", $dataline["CASE_NUM"])[1];
						if(intval($LAST_VAL)+1 < 10){
							$NEXT_CASE_NUM = $current_year."-0000".( (string) intval($LAST_VAL)+1);
						}else if(intval($LAST_VAL)+1 < 100){
							$NEXT_CASE_NUM = $current_year."-000".( (string) intval($LAST_VAL)+1);
						}else if(intval($LAST_VAL)+1 < 1000){
							$NEXT_CASE_NUM = $current_year."-00".( (string) intval($LAST_VAL)+1);
						}else if(intval($LAST_VAL)+1 < 10000){
							$NEXT_CASE_NUM = $current_year."-0".( (string) intval($LAST_VAL)+1);
						}else{
							$NEXT_CASE_NUM = $current_year."-".( (string) intval($LAST_VAL)+1);
						}
					}
					//DETERMINE NEXT CASE_NUM END
					
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
											<input class="form-control" id="CASE_NUM" placeholder="20XX-XXXXX" maxlength="<?php echo $CASE_LENG; ?>" name="CASE_NUM" value="<?php echo $NEXT_CASE_NUM ?>" required readonly>
										</div>
									</div>
									<!-- CASE NUMBER END -->

									<div class="row">
									<!-- SURGEON LICENSE NUMBER -->
									<div class="form-group row" style="margin:0px;">
										<label class="control-label col-md-2" for="SURG_LIC" style="float:left; width:170px;">Surgeon<span style="color: #d9534f">*</span></label>
										<div class="col-md-8" style=" float:left;">
											<div style="margin:5px 5px 5px 0px; width: 320px; float:left;">
												<input pattern="^(([a-zA-Z]([a-zA-Z ]*)[ ][a-zA-Z]([a-zA-Z]*)[ ][-][ ])*)(\d{7}$)" title="License No. (0000000-9999999) or Name and License (Firstname Surname - License no.)" class="form-control typeahead tt-query" autocomplete="off" id="SURG_NAME" placeholder="Surgeon Name or License" maxlength="50" name="SURG_NAME" required>
											</div>
											<div class="add_s1" style="margin:5px 5px 5px 0px; width: 320px; float:left;">
												<input pattern="^(([a-zA-Z]([a-zA-Z ]*)[ ][a-zA-Z]([a-zA-Z]*)[ ][-][ ])*)(\d{7}$)" title="License No. (0000000-9999999) or Name and License (Firstname Surname - License no.)" class="form-control typeahead tt-query" autocomplete="off" id="SURG_NAME" placeholder="Surgeon Name or License (Optional)" maxlength="50" name="SURG_NAME1">
											</div>
											<div class="add_s2" style="margin:5px 5px 5px 0px; width: 320px; float:left;">
												<input pattern="^(([a-zA-Z]([a-zA-Z ]*)[ ][a-zA-Z]([a-zA-Z]*)[ ][-][ ])*)(\d{7}$)" title="License No. (0000000-9999999) or Name and License (Firstname Surname - License no.)" class="form-control typeahead tt-query" autocomplete="off" id="SURG_NAME" placeholder="Surgeon Name or License (Optional)" maxlength="50" name="SURG_NAME2">
											</div>
											<a role="button" id="add_surg" class="btn btn-default" title="Add another surgeon" style="font-size:14px; color:#337ab7; float:left; margin:5px 5px 5px 0px;"><span class="fa fa-plus"></span></a>
											<a role="button" id="minus_surg" class="btn btn-default" style="font-size:14px; color:#337ab7; float:left; margin:5px 5px 5px 0px;"><span class="fa fa-minus"></span></a>
										</div>
									</div>
									<!-- SURGEON LICENSE NUMBER END -->
              
									<!-- INTERNIST NAME -->
									<div class="form-group row" style="margin:0px;">
										<label class="control-label col-md-2" for="INTER" style="float:left; width:170px;">Internist<span style="color: #d9534f">*</span></label>
										<div class="col-md-8" style=" float: left;">

										<div style="margin:5px 5px 5px 0px; width: 320px; float:left;">
											<input pattern="^(([a-zA-Z]([a-zA-Z ]*)[ ][a-zA-Z]([a-zA-Z]*)[ ][-][ ])*)(\d{7}$)" title="License No. (0000000-9999999) or Name and License (Firstname Surname - License no.)" class="form-control typeahead tt-query" autocomplete="off" id="INTER" placeholder="Internist Name or License" maxlength="<?php echo $INTER_MAX; ?>" name="INTER" required>
										</div>
										<div class="add_i1" style="margin:5px 5px 5px 0px; width: 320px; float:left;">
											<input pattern="^(([a-zA-Z]([a-zA-Z ]*)[ ][a-zA-Z]([a-zA-Z]*)[ ][-][ ])*)(\d{7}$)" title="License No. (0000000-9999999) or Name and License (Firstname Surname - License no.)" class="form-control typeahead tt-query" autocomplete="off" id="INTER" placeholder="Internist Name or License (Optional)" maxlength="<?php echo $INTER_MAX; ?>" name="INTER1">
										</div>
										<div class="add_i2" style="margin:5px 5px 5px 0px; width: 320px; float:left;">
											<input pattern="^(([a-zA-Z]([a-zA-Z ]*)[ ][a-zA-Z]([a-zA-Z]*)[ ][-][ ])*)(\d{7}$)" title="License No. (0000000-9999999) or Name and License (Firstname Surname - License no.)" class="form-control typeahead tt-query" autocomplete="off" id="INTER" placeholder="Internist Name or License (Optional)" maxlength="<?php echo $INTER_MAX; ?>" name="INTER2">
										</div>
										<a role="button" id="add_inter" class="btn btn-default" title="Add another internist" style="font-size:14px; color:#337ab7; float:left; margin:5px 5px 5px 0px;"><span class="fa fa-plus"></span></a>
										<a role="button" id="minus_inter" class="btn btn-default" style="font-size:14px; color:#337ab7; float:left; margin:5px 5px 5px 0px;"><span class="fa fa-minus"></span></a>
										</div>
									</div>
									<!-- INTERNIST NAME END -->

									<!-- TYPE OF ANESTHESIOLOGIST -->
									<div class="form-group row" style="margin:0px;">
										<label class="control-label col-md-2" for="ANEST" style="float:left; width:170px;">Anesthesiologist<span style="color: #d9534f">*</span></label>
										<div class="col-md-6" style=" float: left;">
										<div style="margin:5px 5px 5px 0px; width: 320px; float:left;">
											<input pattern="^(([a-zA-Z]([a-zA-Z ]*)[ ][a-zA-Z]([a-zA-Z]*)[ ][-][ ])*)(\d{7}$)" title="License No. (0000000-9999999) or Name and License (Firstname Surname - License no.)" class="form-control typeahead tt-query" autocomplete="off" id="ANEST" placeholder="Anesthesiologist Name or License" maxlength="<?php echo $ANEST_MAX; ?>" name="ANEST" required>
										</div>
										</div>
										<div style="float:right; margin-right:20px;">
											<a role="button" id="add_doctor" onclick="add_on_d()" data-toggle="modal" data-target="#add_new" class="btn btn-default" style="font-size:14px; color:#337ab7; float:left; margin:5px 5px 5px 0px;" title="Add new doctor"><span class="fa fa-stethoscope" style="margin-right:5px;"></span>Add New Doctor</a>
										</div>
									</div>
									<!-- TYPE OF ANESTHESIOLOGIST END -->

									</div>
         
									<!-- PATIENT INFORMATION -->
									<div class="panel-group" style="margin-top:25px;">
										<div class="panel panel-default" style="">
											<div class="panel-heading" id="panelh">Patient Information</div>
											<div class="panel-body">

												<!-- PATIENT ID -->
												<div class="form-group row">
	            <label class="control-label col-md-3" for="PAT_NAME" style="float:left; width:200px;">Patient Name<span style="color: #d9534f">*</span></label>
             <div class="col-md-7" style=" float: left;">
             	<div style="width: 320px; float: left; margin-right:5px;" >
               <input pattern="^(([a-zA-Z]([a-zA-Z ]*)[ ][a-zA-Z]([a-zA-Z]*)[ ][-][ ])*)(([C][A][T]\d{4}[-]\d{3})$)" class="form-control typeahead1 tt-query" autocomplete="off" id="PAT_NAME" placeholder="Patient Name" maxlength="<?php echo $MAX_NAME; ?>" name="PAT_NAME" required>
              </div>
              <a role="button" id="add_patient" onclick="add_on_p()" data-toggle="modal" data-target="#add_new" class="btn btn-default" style="font-size:14px; color:#337ab7; float:left;" title="Add new patient"><span class="fa fa-id-card"></span></a>
	            </div>
	           </div>
												<!-- PATIENT ID END -->

												<!-- VISUAL IMPARITY -->
												<div class="form-group row">
													<label class="control-label col-md-3" for="VI" style="float:left; width:200px;">Visual Impairment<span style="color: #d9534f">*</span></label>
													<div class="col-md-6" style="width: 600px; float: left;">
														<input pattern="[a-zA-Z0-9 .,:;()*/-!_]*"  class="form-control" id="VI" placeholder="Description of visual impairment..." maxlength="<?php echo $VI_MAX; ?>" name="VI" required>
													</div>
												</div>
												<!-- VISUAL IMPARITY END -->
                    
												<!-- MEDICAL HISTORY -->
												<div class="form-group row">
													<label class="control-label col-md-3" for="MED_HIST" style="float:left; width:200px;">Medical History </label>
													<div class="col-md-6" style="width: 600px; float: left;">
														<input pattern="[a-zA-Z0-9 .,:;()*/-!_]*"  class="form-control" id="MED_HIST" placeholder="Patient medical history..." maxlength="<?php echo $HIST_MAX; ?>" name="MED_HIST">
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
              <input pattern="[a-zA-Z0-9 .,:;()*/-!_]*"  class="form-control" id="IOL" placeholder="IOL" maxlength="<?php echo $IOL_MAX; ?>" name="IOL" required>
             </div>
           	</div>
												<!-- IOL POWER END -->
      
												<!-- TYPE OF ANESTHESIA -->
												<div class="form-group row">
             <label class="control-label col-md-3" for="TANES" style="float:left; width:200px;">Type of Anesthesia<span style="color: #d9534f">*</span></label>
             <div class="col-md-6" style="width: 250px; float: left;">
															<label class="radio-inline" id="TANES"><input name="TANES" type="radio" value="General" required>General</label>
															<label class="radio-inline" id="TANES"><input name="TANES" type="radio" value="Local">Local</label>
             </div>
           </div>
												<!-- TYPE OF ANESTHESIA END -->
        
												<!-- SURGERY ADDRESS -->
												<div class="form-group row">
             <label class="control-label col-md-3" for="SURG_ADD" style="float:left; width:200px;">Surgery Address<span style="color: #d9534f">*</span></label>
             <div class="col-md-6" style="width: 550px; float: left;">
               <input pattern="[a-zA-Z0-9 .,:;()*/-!_]*"  class="form-control" id="SURG_ADD" placeholder="Enter address of where the sugery was conducted..." maxlength="<?php echo $SURGADD_MAX; ?>" name="SURG_ADD" required>
             </div>
           	</div>
												<!-- SURGERY ADDRESS END -->
  
												<!-- DATE -->
												<div class="form-group row">
													<label class="control-label col-md-3" style="float:left; width:200px;">Date of Surgery </label>
													<div  class="col-md-7"  style="float:left; width:250px;">
														<div class="form-group">
															<div class='input-group date' id='datetimepicker'>
																<input type='text' class='form-control' pattern='^\d{1,2}\/\d{1,2}\/\d{4}$' id='DATE' name='DATE' placeholder='MM/DD/YYYY' value= '<?php echo date("m/d/y"); ?>'>
																<span class="input-group-addon">
																	<span class="fa fa-calendar" style="padding:0px; margin:0px; font-size:16px; color:#337ab7;"></span>
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
									
									<!-- VISUAL ACUITY -->
									<div class="panel-group" style="margin-top:25px; margin-bottom:0px 15px;">
										<div class="panel panel-default" style="">
											<div class="panel-heading" id="panelh">Post Surgery Visual Acuity</div>
											<div class="panel-body">
												<?php
													$VA_choice = array("U", "20/10", "20/12.5", "20/16", "20/20", "20/25", "20/32", "20/40", "20/50", "20/63","20/70", "20/80", "20/100", "20/120", "20/160", "20/200", "CF 1'", "CF 2'", "CF 3'", "CF 4'", "CF 5'", "CF 6'", "CF 7'", "CF 8'", "CF 9'", "CF 10'", "CF 11'", "CF 12'", "CF 13'", "CF 14'", "CF 15'", "CF 16'", "CF 17'", "CF 18'", "CF 19'", "CF 20'", "HM", "+LP", "-LP");
												?>
												<table class="table">
													<thead>
														<th></th>
														<th>Left Eye Visual Acuity</th>
														<th>Right Eye Visual Acuity</th>
													</thead>
													<tbody>

														<tr>
															<td><strong>Without Spectacles</strong><span style="color: #d9534f">*</span></td>
															<!-- LEFT EYE W/OUT SPECT -->
															<td>
																<select class="form-control" id="P_VAL2"  name="P_VAL2" style="width: 200px;" required>
																  <?php for ($j=0; $j < count($VA_choice); $j++) { 
																	echo "<option>".$VA_choice[$j]."</option>";
																   } ?>
															   </select>
															</td>
															<!-- LEFT EYE W/OUT SPECT END-->
															
															<!-- RIGHT EYE W/OUT SPECT -->
															<td>
																<select class="form-control" id="P_VAR2"  name="P_VAR2" style="width: 200px;" required>
																  <?php for ($j=0; $j < count($VA_choice); $j++) { 
																	echo "<option>".$VA_choice[$j]."</option>";
																   } ?>
															   </select>
															</td>
															<!-- RIGHT EYE W/OUT SPECT END -->
														</tr>

														<tr>
															<td><strong>With Spectacles</strong><span style="color: #d9534f">*</span></td>

															<!-- LEFT EYE W/ SPECT -->
															<td>
																<select class="form-control" id="P_VASL2"  name="P_VASL2" style="width: 200px;" required>
																  <?php for ($j=0; $j < count($VA_choice); $j++) { 
																	echo "<option>".$VA_choice[$j]."</option>";
																   } ?>
																</select>
															</td>
															<!-- LEFT EYE W/ SPECT END-->
															
															<!-- RIGHT EYE W/ SPECT -->
															<td>
																<select class="form-control" id="P_VASR2"  name="P_VASR2" style="width: 200px;" required>
																  <?php for ($j=0; $j < count($VA_choice); $j++) { 
																	echo "<option>".$VA_choice[$j]."</option>";
																   } ?>
															   </select>
															</td>
															<!-- RIGHT EYE W/ SPECT END -->
														</tr>

													</tbody>
												</table>
											</div>
										</div>
									</div>
									<!-- VISUAL ACUITY END -->

									<!-- SURGEON REPORT -->
									<div class="panel-group" style="margin-top:25px;">
										<div class="panel panel-default" style="">
											<div class="panel-heading" id="panelh">Surgery Report</div>
											<div class="panel-body">
												<!-- DIAGNOSIS-->
												<div class="form-group row">
													<label class="control-label col-md-3" for="RDIAG" style="float:left; width:200px;">Right Eye Diagnosis </label>
													<div class="col-md-7" style="width: 600px; float: left;">
														<input pattern="[a-zA-Z0-9 .,:;()*/-!_]*"  class="form-control" id="RDIAG" placeholder="Right Eye Surgery Diagnosis" maxlength="30" name="RDIAG">
													</div>
												</div>
												<div class="form-group row">
													<label class="control-label col-md-3" for="LDIAG" style="float:left; width:200px;">Left Eye Diagnosis </label>
													<div class="col-md-7" style="width: 600px; float: left;">
														<input pattern="[a-zA-Z0-9 .,:;()*/-!_]*"  class="form-control" id="LDIAG" placeholder="Left Eye Surgery Diagnosis" maxlength="30" name="LDIAG">
													</div>
												</div>
												<!-- DIAGNOSIS END -->
                    
												<!-- SURGERY REMARKS -->
												<div class="form-group row">
													<label class="control-label col-md-2" for="REM" style="float:left; width:200px;">Remarks</label>
													<div class="col-md-7" style="width: 600px; float: left;">
														<input pattern="[a-zA-Z0-9 .,:;()*/-!_]*"  class="form-control" id="REM" placeholder="Surgeon's Remarks" maxlength="<?php echo $REM_MAX; ?>" name="REM">
													</div>
												</div>
												<!-- SURGERY REMARKS END -->
											</div>
										</div>
									</div>
									<!-- SURGERY REPORT END -->

									<!-- FINANCIAL INFORMATION -->
									<div class="row" style="padding: 10px 15px 0px 15px;">
										<div class="well" style="color:#337ab7; padding:10px 20px;">Financial Information</div>
									</div>

									<div class="row">

												<!-- PATIENT COUNTERPART -->
												<div style="float:left; width: 50%; padding:0px 10px 0px 15px;">

												<div class="well" style="background-color:#ffffff; padding-bottom:0px;">
												<div style="margin-bottom:20px; opacity: 0.7; font-weight:bold; color:#337ab7 ;">
													Patient Counterpart
													<hr style="margin-top:0px;">
												</div>

												<div class="form-group row">
														<div style="width:50%; float:left; font-weight:bold; padding-left:20px;">Intraocular Lens</div>
														<div class="input-group money" style="width:50%; float:left; padding:5px;">
															<span class="input-group-addon"><strong>₱</strong></span>
															<input type="text" class="form-control numberOnly" id="PCIOL" placeholder="IOL" maxlength="<?php echo $PC_MAX; ?>" name="PCIOL" style="width: 130px;">
														</div>
														<div style="width:50%; float:left; font-weight:bold; padding-left:20px;">Laboratory</div>
														<div class="input-group money" style="width:50%; float:left; padding:5px;">
															<span class="input-group-addon"><strong>₱</strong></span>
															<input type="text" class="form-control numberOnly" id="PCLAB" placeholder="LAB" maxlength="<?php echo $PC_MAX; ?>" name="PCLAB" style="width: 130px;">
														</div>
														<div style="width:50%; float:left; font-weight:bold; padding-left:20px;">Patient Fee</div>
														<div class="input-group money" style="width:50%; float:left; padding:5px;">
															<span class="input-group-addon"><strong>₱</strong></span>
															<input type="text" class="form-control numberOnly" id="PCPF" placeholder="PF(Other)" maxlength="<?php echo $PC_MAX; ?>" name="PCPF" style="width: 130px;">
														</div>
												</div>

												</div>
												</div>
												<!-- PATIENT COUNTERPART END -->
  
												<!-- CSF -->
												<div style="float:left; width: 50%; padding:0px 15px 0px 10px;">

												<div class="well" style="background-color:#ffffff; padding-bottom:0px;">
												<div style="margin-bottom:20px; opacity:0.7; font-weight:bold; color:#337ab7 ;">
													CSF
													<hr style="margin-top:0px;">
												</div>

												<div class="form-group row">

														<div style="width:50%; float:left; font-weight:bold; padding-left:20px;">Hospital Bill</div>
														<div class="input-group money" style="width:50%; float:left; padding:5px;">
															<span class="input-group-addon"><strong>₱</strong></span>
															<input type="text" class="form-control numberOnly" id="CSFHBILL" placeholder="HBILL" maxlength="<?php echo $PC_MAX; ?>" name="CSFHBILL" style="width:130px;">
														</div>
														<div style="width:50%; float:left; font-weight:bold; padding-left:20px;">Supplies</div>
														<div class="input-group money" style="width:50%; float:left; padding:5px;">
															<span class="input-group-addon"><strong>₱</strong></span>
															<input type="text" class="form-control numberOnly" id="CSFSUP" placeholder="SUPPLIES" maxlength="<?php echo $PC_MAX; ?>" name="CSFSUP" style="width:130px;">
														</div>
														<div style="width:50%; float:left; font-weight:bold; padding-left:20px;">Laboratory</div>
														<div class="input-group money" style="width:50%; float:left; padding:5px;">
															<span class="input-group-addon"><strong>₱</strong></span>
															<input type="text" class="form-control numberOnly" id="CSFLAB" placeholder="LAB" maxlength="<?php echo $PC_MAX; ?>" name="CSFLAB" style="width:130px;">
														</div>
													
												</div>

												</div>
												</div>
												<!-- CSF END -->

												<!-- NDDCH -->
												<div style="float:left; width:50%; padding:0px 10px 0px 15px;">

												<div class="well" style="background-color:#ffffff; padding-bottom:0px;">
												<div style="margin-bottom:20px; opacity: 0.7; font-weight:bold; color:#337ab7 ;">
													Notre Dame de Chartres Hospital Accounts
													<hr style="margin-top:0px;">
												</div>
												<div class="row">

												<!-- NDDCH DISC. -->
												<div style="width:100%; float:left; padding-left:15px;">
												<div class="form-group row">
													<div style="width:50%; float:left; font-weight:bold; padding-left:20px;">RA</div>
														<div class="input-group money" style="width:50%; float:left; padding:5px;">
															<span class="input-group-addon"><strong>₱</strong></span>
															<input type="text" class="form-control numberOnly" id="NDDCHRA" placeholder="RA" maxlength="<?php echo $PC_MAX; ?>" name="NDDCHRA"  style="width:130px;">
														</div>
														<div style="width:50%; float:left; font-weight:bold; padding-left:20px;">ZEISS</div>
														<div class="input-group money" style="width:50%; float:left; padding:5px;">
															<span class="input-group-addon"><strong>₱</strong></span>
															<input type="text" class="form-control numberOnly" id="NDDCHRAZEISS" placeholder="ZEISS" maxlength="<?php echo $PC_MAX; ?>" name="NDDCHRAZEISS" style="width:130px;">
														</div>
												</div>
												</div>
												<!-- NDDCH DISC. END -->

												<!-- NDDCH SUPP -->
												<div style="width:100%; float:left; padding:0px 15px;">
												<div class="well" style="background-color:#f9f9f9; padding-bottom:0px;">
												<div class="form-group row">
														<div style="width:40%; float:left; font-weight:bold; padding-left:20px;">Supplies</div>
														<div class="input-group money" style="width:60%; float:left; padding:5px;">
															<span class="input-group-addon"><strong>₱</strong></span>
															<input type="text" class="form-control numberOnly" id="NDDCHSUPP" placeholder="NDDCH SUPPLIES" maxlength="<?php echo $PC_MAX; ?>" name="NDDCHSUPP" style="width:150px;">
														</div>
														<div style="margin:12px; float:left; width:100%; color:#666666;">*Note: Not included in payment. For comparison.</div>
												</div>
												</div>
												</div>
												<!-- NDDCH SUPP END -->

												</div>
												</div>
												</div>
												<!-- NDDCH END -->

												<!-- LF -->
												<div style="float:left; width: 50%; padding:0px 15px 0px 10px;">

												<div class="well" style="background-color:#ffffff; padding-bottom:0px;">
												<div style="margin-bottom:20px; opacity: 0.7; font-weight:bold; color:#337ab7 ;">
													LF
													<hr style="margin-top:0px;">
												</div>

												<div class="form-group row">
														<div style="width:50%; float:left; font-weight:bold; padding-left:20px;">Professional Fee</div>
														<div class="input-group money" style="width:50%; float:left; padding:5px;">
															<span class="input-group-addon"><strong>₱</strong></span>
															<input type="text" class="form-control numberOnly" id="LFPF" placeholder="PF" maxlength="<?php echo $PC_MAX; ?>" name="LFPF" style="width:130px;">
														</div>
														<div style="width:50%; float:left; font-weight:bold; padding-left:20px;">CPC Fee</div>
														<div class="input-group money" style="width:50%; float:left; padding:5px;">
															<span class="input-group-addon"><strong>₱</strong></span>
															<input type="text" class="form-control numberOnly" id="LFCPCF" placeholder="CPC F" maxlength="<?php echo $PC_MAX; ?>" name="LFCPCF" style="width:130px;">
														</div>
												</div>

												</div>
												</div>
												<!-- LF END -->

												<!-- SPONSORED IOL -->
												<div style="float:left; width: 50%; padding:0px 15px 0px 10px;">

												<div class="well" style="background-color:#ffffff; padding-bottom:0px;">
												<div style="margin-bottom:20px; opacity: 0.7; font-weight:bold; color:#337ab7 ;">
													Sponsored Payment
													<hr style="margin-top:0px;">
												</div>

												<div class="form-group row">
														<div style="width:50%; float:left; font-weight:bold; padding-left:20px;">Intraocular Lens</div>
													<div class="input-group money" style="width:50%; float:left; padding:5px;">
														<span class="input-group-addon"><strong>₱</strong></span>
														<input type="text" class="form-control numberOnly" id="SPOIOL" placeholder="Sponsored IOL" maxlength="<?php echo $PC_MAX; ?>" name="SPOIOL" style="width:130px;">
													</div>
													</div>
												</div>

												</div>
												</div>
												<!-- SPONSORED IOL END -->												

											</div>

										<!-- FINANCIAL INFORMATION END -->
         
										<!-- ENTER -->
										<div class="text-center" style="margin: 10px 20px 20px 20px;">
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

<?php
include("confirm.php");
?>

<script>
	function add_on_d(){
		document.getElementById("add_head").innerHTML = "Add New Doctor";
		document.getElementById("add_para").innerHTML = "doctor";
	}
	function add_on_p(){
		document.getElementById("add_head").innerHTML = "Add New Patient";
		document.getElementById("add_para").innerHTML = "patient";
	}
</script>

<?php
    $surgeon = $mydatabase->query("SELECT FIRST_NAME,LAST_NAME,DOC_LICENSE_NUM from DOCTOR");
    $arr = array();
    
    while ($row = $surgeon->fetch_assoc()) {
        unset($id, $name1, $name2);
        $id = $row['FIRST_NAME']." ".$row['LAST_NAME']." - ".$row['DOC_LICENSE_NUM'];
        array_push($arr, $id/*.", ".$name2." ".$name1*/);
    }
				
	$patient = $mydatabase->query("SELECT PAT_FNAME,PAT_LNAME,PAT_ID_NUM from EYEPATIENT");
    $arr1 = array();
    
    while ($row = $patient->fetch_assoc()) {
		unset($id, $name1, $name2);
        $id = $row['PAT_FNAME']." ".$row['PAT_LNAME']." - ".$row['PAT_ID_NUM'];
        array_push($arr1, $id/*.", ".$name2." ".$name1*/);    
	}
?>

<script type="text/javascript">
	$(document).ready(function(){
		// Defining the local dataset
		var arrs= <?php echo json_encode($arr);?>;
		
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
	
	$('.money > div').click(function() {
    $('.money > input:eq('+$('.money > div').index(this)+')').focus();
});

	$('.numberOnly').on('keydown', function(e) {
		
	  if (this.selectionStart || this.selectionStart == 0) {
		// selectionStart won't work in IE < 9
		
		var key = e.which;
		var prevDefault = true;
		
		var thouSep = ",";  // your seperator for thousands
		var deciSep = ".";  // your seperator for decimals
		var deciNumber = 2; // how many numbers after the comma
		
		var thouReg = new RegExp(thouSep,"g");
		var deciReg = new RegExp(deciSep,"g");
		
		function spaceCaretPos(val, cPos) {
			/// get the right caret position without the spaces
			
			if (cPos > 0 && val.substring((cPos-1),cPos) == thouSep)
			  cPos = cPos-1;
			
			if (val.substring(0,cPos).indexOf(thouSep) >= 0) {
			  cPos = cPos - val.substring(0,cPos).match(thouReg).length;
			}
			
			return cPos;
		}
		
		function spaceFormat(val, pos) {
			/// add spaces for thousands
			
			if (val.indexOf(deciSep) >= 0) {
				var comPos = val.indexOf(deciSep);
				var int = val.substring(0,comPos);
				var dec = val.substring(comPos);
			} else{
				var int = val;
				var dec = "";
			}
			var ret = [val, pos];
			
			if (int.length > 3) {
				
				var newInt = "";
				var spaceIndex = int.length;
				
				while (spaceIndex > 3) {
					spaceIndex = spaceIndex - 3;
					newInt = thouSep+int.substring(spaceIndex,spaceIndex+3)+newInt;
					if (pos > spaceIndex) pos++;
				}
				ret = [int.substring(0,spaceIndex) + newInt + dec, pos];
			}
			return ret;
		}
		
		$(this).on('keyup', function(ev) {
			
			if (ev.which == 8) {
				// reformat the thousands after backspace keyup
				
				var value = this.value;
				var caretPos = this.selectionStart;
				
				caretPos = spaceCaretPos(value, caretPos);
				value = value.replace(thouReg, '');
				
				var newValues = spaceFormat(value, caretPos);
				this.value = newValues[0];
				this.selectionStart = newValues[1];
				this.selectionEnd   = newValues[1];
			}
		});
		
		if ((e.ctrlKey && (key == 65 || key == 67 || key == 86 || key == 88 || key == 89 || key == 90)) ||
		   (e.shiftKey && key == 9)) // You don't want to disable your shortcuts!
			prevDefault = false;
		
		if ((key < 37 || key > 40) && key != 8 && key != 9 && prevDefault) {
			e.preventDefault();
			
			if (!e.altKey && !e.shiftKey && !e.ctrlKey) {
			
				var value = this.value;
				if ((key > 95 && key < 106)||(key > 47 && key < 58) ||
				  (deciNumber > 0 && (key == 110 || key == 188 || key == 190))) {
					
					var keys = { // reformat the keyCode
			  48: 0, 49: 1, 50: 2, 51: 3,  52: 4,  53: 5,  54: 6,  55: 7,  56: 8,  57: 9,
			  96: 0, 97: 1, 98: 2, 99: 3, 100: 4, 101: 5, 102: 6, 103: 7, 104: 8, 105: 9,
			  110: deciSep, 188: deciSep, 190: deciSep
					};
					
					var caretPos = this.selectionStart;
					var caretEnd = this.selectionEnd;
					
					if (caretPos != caretEnd) // remove selected text
					value = value.substring(0,caretPos) + value.substring(caretEnd);
					
					caretPos = spaceCaretPos(value, caretPos);
					
					value = value.replace(thouReg, '');
					
					var before = value.substring(0,caretPos);
					var after = value.substring(caretPos);
					var newPos = caretPos+1;
					
					if (keys[key] == deciSep && value.indexOf(deciSep) >= 0) {
						if (before.indexOf(deciSep) >= 0) newPos--;
						before = before.replace(deciReg, '');
						after = after.replace(deciReg, '');
					}
					var newValue = before + keys[key] + after;
					
					if (newValue.substring(0,1) == deciSep) {
						newValue = "0"+newValue;
						newPos++;
					}
					
					while (newValue.length > 1 && newValue.substring(0,1) == "0" && newValue.substring(1,2) != deciSep) {
						newValue = newValue.substring(1);
						newPos--;
					}
					
					if (newValue.indexOf(deciSep) >= 0) {
						var newLength = newValue.indexOf(deciSep)+deciNumber+1;
						if (newValue.length > newLength) {
						  newValue = newValue.substring(0,newLength);
						}
					}
					
					newValues = spaceFormat(newValue, newPos);
					
					this.value = newValues[0];
					this.selectionStart = newValues[1];
					this.selectionEnd   = newValues[1];
				}
			}
		}
		
		$(this).on('blur', function(e) {
			
			if (deciNumber > 0) {
				var value = this.value;
				
				var noDec = "";
				for (var i = 0; i < deciNumber; i++) noDec += "0";
				
				if (value == "0" + deciSep + noDec) {
			this.value = ""; //<-- put your default value here
		  } else if(value.length > 0) {
					if (value.indexOf(deciSep) >= 0) {
						var newLength = value.indexOf(deciSep) + deciNumber + 1;
						if (value.length < newLength) {
						  while (value.length < newLength) value = value + "0";
						  this.value = value.substring(0,newLength);
						}
					}
					else this.value = value + deciSep + noDec;
				}
			}
		});
	  }
	});

	$('.price > input:eq(0)').focus();
</script>

