<!DOCTYPE html>
<html>
	<head>
		<title>Luke Foundation Eye Program: Doctors</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="references/bootstrap.min.css" rel="stylesheet"/>
		<link rel="stylesheet" href="references/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="theme2.css">
		<link rel="stylesheet" href="references/dataTables.bootstrap4.min.css"/>
		<script src="references/jquery-2.1.1.min.js"></script>
		<script src="references/bootstrap.min.js"></script>
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

					//MAX VALUES
					$FN_MAX = 15;
					$LN_MAX = 20;
					$LIC_LENG = 7;
					$ADDR_MAX = 50;
					//MAX VALUES END

					//CODE SECTION ENDS HERE
				?>
				<!-- DOCTORS -->
				<div class="container-fluid" id="basic" >
					<div id="inner" >
						<!-- TITLE -->
						<div class="container-fluid" >
							<h4 style="color:#337ab7;">Doctors</h4>
						</div>
						<!-- TITLE -->

						<?php include("confirm.php"); ?>

						<!-- CONTENT -->
						<div class="container-fluid" >
							<div>
								<!-- MODIFIABLE CODE STARTS HERE -->
								<!-- PROFILES -->
								<div class="container-fluid">
									<ul class="list-group">
										<?php //CODE SECTION STARTS HERE
											$DEFAULT = 0;
											if (isset($_GET["currentpage"])) { 
												$current_p  = $_GET["currentpage"];
											} else {
												$current_p=1; 
											};
											if (isset($_GET["profilepage"])) { 
												$profile_p = $_GET["profilepage"]; 
												$DEFAULT=1;

												//RECEIVE UPDATE
												if(isset($_POST['doctors_update'])){
													$D_DLN = $_POST['LICENSE_NUM'];
													$D_LN = $_POST['L_NAME'];
													$D_FN = $_POST['F_NAME'];
													$D_A = $_POST['ADDRESS'];
													$D_S = $_POST['SPECIALIZATION'];
			 
													$toupdate = $_POST['doctors_update'];
													$D_update = "UPDATE DOCTOR SET DOC_LICENSE_NUM = '$D_DLN', LAST_NAME = '$D_LN', FIRST_NAME = '$D_FN', ADDRESS ='$D_A', SPECIALIZATION = '$D_S'  WHERE DOC_LICENSE_NUM = '$toupdate' ";
													if ($mydatabase->query($D_update) === TRUE) {
														//echo "Record updated successfully";
													} else {
														// echo '<script> window.location = "doctors.php?profilepage='.$_POST['doctors_update'].'"; </script>';
														echo '<div class="alert alert-danger alert-dismissable">
																<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
																<strong>Error!</strong> Cannot update record. License Number '.$D_DLN.' already exists.
															</div>';
														//echo "Error updating record: " . $mydatabase->error;
													}
												}//RECIEVE UPDATE END
											} else {};
											if (isset($_GET["delete"])) { 
												$delete_p =$_GET["delete"]; $DEFAULT=2; 
											} else {};

											//FILTER ADD
											if(isset($_POST["filter_check"])){
												$F_SC = "";
												if(isset($_POST["FSC"])){
													if(strlen($_POST["FSC"])>0){
														$F_SC1 = $_POST["FSC"];
													}
													if(strlen($F_SC1)>1){
														$F_SC = 'SPECIALIZATION="'.$F_SC1.'"';
														$filter = " WHERE ".$F_SC;
													}else {
														$filter = "";
													}
												}
											} else {
												$filter = "";
											}

											//MYSQL SECTION
											$D_query = "SELECT * FROM DOCTOR $filter order by LAST_NAME asc";
											$output = $mydatabase->query($D_query);
											//MYSQL SECTION END

											if($DEFAULT==0){
												include("doctors_filter.php");
												if ($output->num_rows > 0) {
													//MAIN PAGE
													//HEADER
													echo '<div id="tableCon"><table id="docdat" class="table table-striped row">
															<thead>
																<tr id="tophead">
																<td style="color:#ffffff">'.'Last Name'.'</th>
																<td style="color:#ffffff">'.'First Name'.'</th>
																<td style="color:#ffffff">'.'License No.'.'</th>
																<td style="color:#ffffff">'.'Specialization'.'</th>
																<td style="color:#ffffff">'.'Action'.'</th>
																<td></td>
																</tr>
															</thead>';
													//HEADER END

													//CONTENT
													while($row = $output->fetch_assoc()) { 
														echo 	'<tr id='.$row["DOC_LICENSE_NUM"].'>
																	<td>'.$row["LAST_NAME"].'</td>
																	<td>'.$row["FIRST_NAME"].'</td>
																	<td>'.$row["DOC_LICENSE_NUM"].'</td>
																	<td>'.$row["SPECIALIZATION"].'</td>
																	<td>
																		<a href=""><span class="fa fa-pencil" title="Edit"></span></a>
																		<a role="button" id="'.$row["DOC_LICENSE_NUM"].'" onclick="outer_close(this.id)"><span class="fa fa-trash" title="Delete"></span></a>
																		<a href="'.'doctors.php'.'?profilepage='.$row["DOC_LICENSE_NUM"].'">'.'<span class="fa fa-eye" title="See full detail"></span></a>
																	</td>
																	<td><input type="checkbox" name="id[]" class="muldel" value="'.$row["DOC_LICENSE_NUM"].'"></input></td>
																</tr>';
													} //CONTENT END
													
													echo 	'</table></div>';

													echo '<button style="display:none;" id="del_button" value="doctors"></button>';
													
												} else { echo "No Records."; }
												//MAIN PAGE END
											}else if ($DEFAULT==1) {
												//SEE MORE PAGE
												//MYSQL SECTION
												$query = "SELECT s.CASE_NUM, s.SURG_DATE, s.SURG_ADDRESS, p.PAT_ID_NUM, p.PAT_FNAME, p.PAT_LNAME FROM SURGERY s, EYEPATIENT p WHERE s.PAT_ID_NUM=p.PAT_ID_NUM ORDER BY SURG_DATE DESC";
												$output1 = $mydatabase->prepare("SELECT * FROM DOCTOR where DOC_LICENSE_NUM = '$profile_p' ");      
												$output1->execute();
												$line1 = $output1->get_result();
												$dataline = $line1->fetch_assoc();
												$output2 = $mydatabase->query($query);
												//MYSQL SECTION END

												//VALUES
												$D_NAME = $dataline["FIRST_NAME"].' '.$dataline["LAST_NAME"];
												$D_DLN = $dataline["DOC_LICENSE_NUM"];
												$D_LN = $dataline["LAST_NAME"];
												$D_FN = $dataline["FIRST_NAME"];
												$D_A = $dataline["ADDRESS"];
												$D_SP = $dataline["SPECIALIZATION"];
												$SPEC_choice = array('Select specialization', 'Pediatrician','Ophthalmologist','Anesthesiologist','Surgeon','Internist');
												//VALUES END

												//CONTENT
												echo '<div>
														<div class="container-fluid">
															<h3>Dr. '.$D_NAME.'</h3>
															<div class="panel panel-default" style="padding-bottom:10px;">
																<div class="panel-heading" id="tophead1">Doctor Information</div>
																<div class="panel-body row" style="margin:0px; padding:5px 10px;">
																	<div class="col-md-3" style="font-weight:bold;">License Number</div>
																	<div class="col-md-9">'.$D_DLN.'</div>
																</div>
																<div class="panel-body row" style="margin:0px; padding:5px 10px;">
																	<div class="col-md-3" style="font-weight:bold;">Address</div>
																	<div class="col-md-9">'.$D_A.'</div>
																</div>
																<div class="panel-body row" style="margin:0px; padding:5px 10px;">
																	<div class="col-md-3" style="font-weight:bold;">Specialization</div>
																	<div class="col-md-9">'.$D_SP.'</div>
																</div>
															</div>
															<div class="panel panel-default" style="padding-bottom:10px;">
																<div class="panel-heading" id="tophead1">Surgeries Attended</div>
																<div class="panel-body row" style="margin:0px; padding:5px 10px;">';
															if($output2->num_rows > 0){
																echo		'<table class="table table-striped row">
																		<thead>
																			<tr id="tophead">
																			<td style="color:#ffffff">'.'Date'.'</th>
																			<td style="color:#ffffff">'.'Patient'.'</th>
																			<td style="color:#ffffff">'.'Address'.'</th>
																			<td style="color:#ffffff">'.'Action'.'</th>
																			</tr>
																		</thead>';
																		while($dataline2 = $output2->fetch_assoc()) { 
																			echo 	'<tr>
																						<td>'.$dataline2["SURG_DATE"].'</td>
																						<td><a href="patient.php?profilepage='.$dataline2["PAT_ID_NUM"].'""><span class="fa fa-external-link" title="View patient"></span></a> '.$dataline2["PAT_FNAME"].' '.$dataline2["PAT_LNAME"].'</td>
																						<td>'.$dataline2["SURG_ADDRESS"].'</td>
																						<td>
																							<a href=""><span class="fa fa-pencil" title="Edit"></span></a>
																							<a href=""><span class="fa fa-trash" title="Delete"></span></a>
																							<a href="'.'surgery.php'.'?profilepage='.$dataline2["CASE_NUM"].'">'.'<span class="fa fa-eye" title="See full detail"></span></a>
																						</td>
																					</tr>';
																		}
																		echo				'</table>
																						</div>
																					</div>
																				</div>
																			</div>';
																		

															}else{
																echo "<div style='text-align:center; padding: 20px;'> No Records. </div>";
															}//CONTENT END
															

												//BUTTONS AND LINKS
												echo '<div id="link_buttons">
														<button class="btn btn-default" id="del_button" value="doctors" data-toggle="modal" data-target="#confirm_this" style="margin-left:15px;"> <span class="fa fa-trash" style="font-size:15px;"></span> Delete </button>
														<button type="button" class="btn btn-default" data-toggle="modal" data-target="#EditBox" style="margin-left:10px;"><span class="fa fa-edit" style="font-size:15px;"></span> Edit</button>
														<div style="text-align:right;"><a role="button" class="btn" id="go" style="margin-right:15px;" href="doctors.php">Back</a></div>
													</div>';
												//BUTTONS AND LINKS END

												// POP-UP ALERT
												echo '<div class="modal fade" id="EditBox" role="dialog" style="top:50px;">
														<div class="modal-dialog modal-lg">';
															//POP-UP CONTENT
												echo 		'<div class="modal-content">
																<div class="modal-header">
																	<button type="button" class="close" data-dismiss="modal">&times;</button>
																	<h4 class="modal-title">Edit Record</h4>
																</div>
																<div class="modal-body">';
																	//EDIT FORM
												echo 				'<div class="container-fluid">
																		<form method="post" id="updating">

																			<p style="margin-bottom: 20px; color:#666666;">
																				Please do not leave the required<span style="color: #d9534f">*</span> fields blank.
																			</p>

																			<div class="container-fluid" style="margin-bottom: 10px;">
																				<label for="F_NAME" style="width: 175px; float: left; ">First Name<span style="color: #d9534f">*</span> </label>
																				<input type="text" class="form-control" id="F_NAME" maxlength="'.$FN_MAX.'" name="F_NAME" value="'.$D_FN.'" style="width: 150px; float: left;" required >
																			</div>
																			<div class="container-fluid" style="margin-bottom: 10px;">
																				<label for="L_NAME" style="width: 175px; float: left; ">Last Name<span style="color: #d9534f">*</span> </label>
																				<input type="text" class="form-control" id="L_NAME" maxlength="'.$LN_MAX.'" name="L_NAME" value="'.$D_LN.'" style="width: 150px; float: left;" required >
																			</div>
																			<div class="container-fluid" style="margin-bottom: 10px;">
																				<label for="LICENSE_NUM" style="width: 175px; float: left; ">License Number<span style="color: #d9534f">*</span> </label>
																				<input pattern="\d{5,7}" type="text" class="form-control" id="LICENSE_NUM" maxlength="'.$LIC_LENG.'" name="LICENSE_NUM" value="'.$D_DLN.'" style="width: 90px; float: left;" required >
																			</div>
																			<div class="container-fluid" style="margin-bottom: 10px;">
																				<label for="ADDRESS" style="width: 175px; float: left; ">Address </label>
																				<input type="text" class="form-control" id="ADDRESS" maxlength="'.$ADDR_MAX.'" name="ADDRESS" value="'.$D_A.'" style="max-width: 450px; float: left;">
																			</div>
																				<div class="container-fluid" style="margin-bottom: 10px;">
																					<label for="SPECIALIZATION" style="width: 175px; float: left; ">Specialization</label>
																					<select class="form-control" id="SPECIALIZATION" name="SPECIALIZATION" style="max-width: 250px; float: left;">';
																					
																					for ($spec=0; $spec < sizeof($SPEC_choice); $spec++) { 
																						if($spec==0){
																							echo '<option value = "">-Select specialization-</option>';
																						}else{
																							if($D_SP==$SPEC_choice[$spec]){
																								echo '<option value = "'.$SPEC_choice[$spec].'" selected>'.$SPEC_choice[$spec].'</option>';
																							}else{
																								echo '<option value = "'.$SPEC_choice[$spec].'">'.$SPEC_choice[$spec].'</option>';
																							}
																						}
																					}
																					echo '</select>
																			</div>
																				<div class="text-center" style="margin-top: 20px;">
																				<button type="submit" onclick="update()" class="btn btn-default" value="'.$D_DLN.'" name="doctors_update">Update</button>
																			</div>
																		</form>
																	</div>';
																	//EDIT FORM END
												echo 			'</div>
																<div class="modal-footer">
																	<button type="button" class="btn btn-default" data-dismiss="modal" >Cancel</button>
																	</div>
																</div>';
																//POP-UP CONTENT END
												echo 			'<script>
																	function update() {
																		var license = document.getElementById("LICENSE_NUM").value;
																		document.getElementById("updating").action = "doctors.php?profilepage="+license;
																	}
																</script>
															</div>
														</div>';
													//POP-UP ALERT END
												//SEE MORE PAGE END
											}else if($DEFAULT==2){
												//DELETE PAGE
												$del = "DELETE FROM DOCTOR WHERE DOC_LICENSE_NUM = '$delete_p' ";
												if ($mydatabase->query($del) === TRUE) {
													echo "Record deleted.";
													echo '<div class="row" style="text-align:right;"><a role="btn" class="btn" id="go"  href="'.'doctors.php'.'">Back</a></div>';
												} else {
													echo '<div style="margin-top:10px;" class="alert alert-danger alert-dismissable"><a class="close" data-dismiss="alert" aria-label="close">&times;</a>
														<p><strong>Cannot Delete Record</strong></p>
														<p>Error deleting record: '.$mydatabase->error.'</p></div>'; 
													echo '<div class="row" style="text-align:right;"><a role="btn" class="btn" id="go"  href="'.'doctors.php'.'">Back</a></div>';
												}
												//DELETE PAGE END
											}
											//CODE SECTION ENDS HERE
										?>
									</ul>
								</div>
								<!-- PROFILES END -->
								<!-- MODIFIABLE CODE ENDS HERE -->
							</div>
						</div>
						<!-- CONTENT END -->
					</div>
				</div>
				<!-- DOCTORS END -->
				<?php $mydatabase->close(); ?>
			</div>
			<!-- MAIN END -->
		</div>
	</body>
</html>
<script type="text/javascript">

	var myTable=$('#docdat').DataTable({
			"search":false,
			"sDom":"ltipr",
			"columns": [
			null,
			null,
		    null,
		    null,
		    { "orderable": false },
		    { "orderable": false }
  			],
		});

	$('#dataseek').keyup(function(){
		myTable.search($(this).val()).draw();
	})
	
	$('#btn_delete').click(function(){
		if(confirm("Are you sure you want to delete these?")){
			var id=[];
			$(':checkbox:checked').each(function(i){
				id[i]=$(this).val();
			});

			if(id.length===0){
				alert("Please select at least two checkboxes");
			}else{
				$.ajax({
					url:'muldel.php',
					method: 'POST',
					data: {id:id},
					success: function(){
						for (var i=0; i<id.length; i++){
							$('tr#'+id[i]+'').css('background-color', '#ccc');
							$('tr#'+id[i]+'').fadeOut('slow');
						}
					}

				});
			}
		}else{
			return false;
		}
	});
	
</script>
