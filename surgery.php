<!DOCTYPE html>
<html>
<head>
	<title>Prototype</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--	<link rel="stylesheet" href="bootstrap.min.css">	-->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<!-- 	<script src="jquery.min.js"></script>	-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  	<!--	<script src="bootstrap.min.js"></script>	-->
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="theme2.css">

</head>

<body style="justify-content: center;">

<!-- MAIN -->
<div class="container-fluid" id="outer">

<!-- HEAD AND NAVIGATION -->
<?php
  $placeholder = "Luke foundation (placeholder)";
  $page = array("Doctors", "Patient", "Surgery");
  $link = array("doctors.php", "patient.php", "surgery.php");
  $doctor = array("Physicians", "Surgeons");
  $i = 0;
?>
<div>
  <nav class="navbar navbar-default">
    <div class="container-fluid" style="padding: 0px;">
      <div id="banner" style="background-image: url(p_holder.jpg);">
        <?php echo $placeholder; ?> </div> </div>
    <div class="container-fluid">
    <div>
			<div class="navbar-header">
				<a class="navbar-brand" href="Home.php" style="font-size: 12pt;">Home</a>
    	</div>
      <ul class="nav navbar-nav">
          <?php for ($i=0; $i < count($page); $i++) { echo '<li><a href="'.$link[$i].'">'.$page[$i].'</a></li>'; } ?> </ul> </div> </div>
  </nav>
</div>
<!-- HEAD AND NAVIGATION END -->

<!--

TABLE INFORMATION
	-	Date
	-	Case_number
	-	Surgeon
	-	Patient
	-	Visual_imparity
	-	Medical_history
	- Diagnosis
	-	Location
	-	Remarks

-->

<?php
	$scase_num = 0;
	$sdate = 0;
	$s = 0;
	$surgtable = array("Date", "Case#", "Surgeon", "Patient", "Visual_Imparity", "Med_History", "Diagnosis", "Location", "Remarks");
?>

<!-- SURGERIES -->
<div class="container-fluid" id="basic" >
	<div id="inner">
		
	<!-- TITLE -->
		<div class="container-fluid" >
			<h4>Eye Cataract Surgeries</h4>
			<br>
		</div>
	<!-- TITLE -->

  <!-- CONTENT -->
		<div class="container-fluid">
		<?php for ($i=0; $i <3 ; $i++) { ?>
			<div class="record">
				
			<!-- SUMMARY -->
				<div class="month">
					<h4><?php echo "Month ".$i;	?></h4>
				</div>
			<!-- SUMMARY END -->

			<!-- TABLE -->
				<div class="container-fluid">
					<table class="table">

					<!-- TABLE HEADING -->
						<thead>
							<tr>
							<?php for ($j=0; $j < 9; $j++) { 
								echo "<th>".$surgtable[$j]."</th>";
							} ?>
							</tr>
						</thead>
					<!-- TABLE HEADING END -->

					<!-- TABLE BODY -->
						<tbody>

						<!-- ROW -->
						<?php for ($s=0; $s <5 ; $s++) {
								$sdate = $sdate + 2;
    				?>
						<tr>
							<td><?php echo $i."/".$sdate; ?> </td>
							<td><?php echo "00".$s; ?></td>
							<td><?php echo "Surg_License#"?></td>
        			<td><?php echo "Patient_ID#"?></td>
        			<td><?php echo "Eye_Prob.".($s+1) ?></td>
        			<td><?php echo "Med_Hist."?></td>
        			<td><?php echo "Diag_".($s+1) ?></td>
        			<td><?php echo "Surg_Addr.".($s+1) ?></td>
        			<td><?php echo "Surg_Remarks"?></td>
      			</tr>
      			<?php }?>
      			<!-- ROW END -->

    				</tbody>
    			<!-- TABLE BODY END -->

  				</table>
				</div>
				<!-- TABLE END -->

			</div>
		<?php } ?>
		</div>
	<!-- CONTENT END -->

	</div>
</div>
<!-- SURGERIES END -->

</body>
</html>