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

						<?php include("confirmdoc.php"); ?>

						<!-- CONTENT -->
						<div class="container-fluid" >
							<div>
								<!-- MODIFIABLE CODE STARTS HERE -->
								<!-- PROFILES -->
								<div class="container-fluid">
									<ul class="list-group">
										<?php //CODE SECTION STARTS HERE
											$DEFAULT = 0;

											if (isset($_GET["printpage"])) { $print_p = $_GET["printpage"]; $DEFAULT=4; }

											if (isset($_GET["currentpage"])) {  $current_p  = $_GET["currentpage"]; } else {
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
														$filter = " WHERE ".$F_SC." AND VISIBLE='T'";
													}else {
														$filter = "WHERE VISIBLE='T'";
													}
												}
											} else {
												$filter = "WHERE VISIBLE='T'";
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
																<td style="color:#ffffff">'.'Address'.'</th>
																<td style="color:#ffffff">'.'Action'.'</th>
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
																	<td>'.$row["ADDRESS"].'</td>
																	<td>
																		<a href="'.'doctors2.php'.'?profilepage='.$row["DOC_LICENSE_NUM"].'"><span class="fa fa-pencil" title="Edit"> </span></a>';

																		if ($row["VISIBLE"]=='T') {
																			echo '<a role="button" id="'.$row["DOC_LICENSE_NUM"].'" onclick="outer_close(this.id)"><span style="padding-left:25px;" class="fa fa-trash" title="Make Inactive"></span></a>';
																		}else{
																			echo '<a role="button" id="'.$row["DOC_LICENSE_NUM"].'" onclick="outer_close(this.id)"><span style="padding-left:25px;" class="fa fa-trash" title="Make Active"></span></a>';
																		}
														echo 		'</td>
																</tr>';
													} //CONTENT END
													
													echo 	'</table></div>';

													echo '<button style="display:none;" id="del_button" value="doctors"></button>';
													
												} else { echo "No Records."; }
												//MAIN PAGE END
											}else if($DEFAULT==2){
												//DELETE PAGE
												$vis='F';
												$del = "UPDATE DOCTOR SET VISIBLE='$vis' WHERE DOC_LICENSE_NUM = '$delete_p' ";
												if ($mydatabase->query($del) === TRUE) {
													echo "Record Inactivated.";
													echo '<div class="row" style="text-align:right;"><a role="btn" class="btn" id="go"  href="'.'doctors.php'.'">Back</a></div>';
												} else {
													echo '<div style="margin-top:10px;" class="alert alert-danger alert-dismissable"><a class="close" data-dismiss="alert" aria-label="close">&times;</a>
														<p><strong>Cannot Inactivate Record</strong></p>
														<p>Error Inactivating record: '.$mydatabase->error.'</p></div>'; 
													echo '<div class="row" style="text-align:right;"><a role="btn" class="btn" id="go"  href="'.'doctors.php'.'">Back</a></div>';
												}
												//DELETE PAGE END
											}else if($DEFAULT==4){
												if(strlen($print_p)>1){
													//PRINT PAGE

													echo '<div style="margin-top:20px;"></div>';

													//MYSQL SECTION
													$outputpage = $mydatabase->prepare("SELECT * FROM DOCTOR WHERE DOC_LICENSE_NUM = '$print_p' ");

													$outputpage -> execute();
													$ppage = $outputpage->get_result();
													$printline = $ppage->fetch_assoc();
													//MYSQL SECTION END

													echo '<div>

													<div class="container-fluid" style="width:100%; float:left;">

													<div class="container-fluid" style="width: 70%; float:left; margin:0px;">
														<div style="width:100%; margin-bottom:10px;"><h4> Dr. '.$printline["FIRST_NAME"].' '.$printline["LAST_NAME"].'</h5></div>
													</div>
														<hr>
													<div class="container-fluid" style="width: 70%; float:left; margin:0px;">
														<div id="pr_label">License Number: </div>
														<div id="pr_body" >'.$printline["DOC_LICENSE_NUM"].'</div>
														<div id="pr_label">Specialization: </div>
														<div id="pr_body" >'.$printline["SPECIALIZATION"].'</div>
														<div id="pr_label">Address: </div>
														<div id="pr_body" >'.$printline["ADDRESS"].'</div>
													</div>
													</div>';

													$Print_query = "SELECT * FROM SURGERY s WHERE SURG_LICENSE_NUM = '$print_p' OR SURG_LICENSE_NUM1 = '$print_p' OR SURG_LICENSE_NUM2 = '$print_p' OR INTERNIST = '$print_p' OR INTERNIST1 = '$print_p' OR INTERNIST2 = '$print_p' OR ANESTHESIOLOGIST = '$print_p' ORDER by SURG_DATE desc";
													$outprint = $mydatabase->query($Print_query);

													//echo $Print_query;
													if ($outprint->num_rows>0) {


														echo '<div class="container-fluid" style="width:100%; float:left; margin:20px 0px;">
															<table class="table table-condensed table-bordered">
																	<thead>
													      <tr style="background-color:#f9f9f9;">
													    			<th colspan="5" style="text-align:center; padding:10px;">Surgeries Attended</th>
													      </tr>
													    </thead>
													    <tbody>
													      <tr >
													      		<th>Date</th>
													        <th>Case Number</th>
													        <th>Patient</th>
													        <th>Visual Impairment</th>
													        <th>Address</th>
													      </tr>';

													      while($dataprint = $outprint->fetch_assoc()) {
													      	echo '<tr>
													      		<td>'.$dataprint["SURG_DATE"].'</td>
													        <td>'.$dataprint["CASE_NUM"].'</td>';
													        $PAT_ID_P = $dataprint["PAT_ID_NUM"];
																					$PAT_GET = $mydatabase->prepare("SELECT PAT_FNAME, PAT_LNAME FROM EYEPATIENT WHERE PAT_ID_NUM='$PAT_ID_P'");
																					$PAT_GET->execute();
																					$PAT_TAKE = $PAT_GET->get_result();
																					$PAT_P = $PAT_TAKE->fetch_assoc();
													        echo '<td>'.$PAT_P["PAT_FNAME"].' '.$PAT_P["PAT_LNAME"].'</td>
													        <td>'.$dataprint["VISUAL_IMPARITY"].'</td>
													        <td>'.$dataprint["SURG_ADDRESS"].'</td>
													      </tr>';
													      }
													    		
													    echo '</tbody>
													  </table>
														</div>

														<div style="float:left; width:100%; padding-bottom:20px;"></div>
														</div>';
												}
													//PRINT PAGE END
												}else{
													echo 'No print page available.';
												}
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
		    { "orderable": false }
  			],
		});

	$('#dataseek').keyup(function(){
		myTable.search($(this).val()).draw();
	});
	
</script>
