<!DOCTYPE html>
<html>
<head>

	<title>Prototype</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- <link rel="stylesheet" href="bootstrap.min.css">  -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <!--  <script src="jquery.min.js"></script> -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!--  <script src="bootstrap.min.js"></script>  -->
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

PATIENT INFORMATION:
  - PATIENT ID
  - STAFF ID
  - PHYSICIAN LICENSE NUMBER

SECONDARY INFORMATION
  - Visual Acuity of Left Eye with Spectacles
  - Visual Acuity of Right Eye with Spectacles
  - Visual Acuity of Left Eye without Spectacles
  - Visual Acuity of Right Eye without Spectacles
  - Visual Disability
  - Cause of Visual Disability
  - Affected part of the Left Eye
  - Affected part of the Right Eye

-->

<!-- PATIENTS -->
<div class="container-fluid" id="basic" >
  <div id="inner">

  <!-- TITLE -->
    <div class="container-fluid" >
        <h4>Eye Cataract Patients</h4> <br>
    </div>
  <!-- TITLE -->

  <!-- CONTENT -->
    <div class="container-fluid">
      <div>

      <!-- PROFILES -->
      <?php for($i = 0; $i < 3; $i++){	?>
        <div style="margin-bottom: 20px;">

        <!-- PRIMARY -->
          <div class="row" id="box" style="background-color: rgba(255, 204, 0, 0.3); ;">

          <!-- PHOTO (HIDE FOR NOW) -->
            <div class="col-sm-0" style="padding:0px;">
        			<!--		<img class="container-fluid" id="picture" src="id.jpg"> -->
            </div>
          <!-- PHOTO END -->

          <!-- PATIENT INFORMATION -->
            <div class="col-sm-12" id="profile">
              <?php 	echo "Patient ID ".($i+1)."<br>"; ?>
              <hr style=" border: solid 1px #2d4309;  width:100%; padding: 0px;">
              <?php
                echo "Examined by: "."Physician License #"."<br>";
                echo "Screened by: "."Staff License #"."<br>";
              ?>
            </div>
          <!-- PATIENT INFORMATION END -->

          </div>
        <!-- PRIMARY END -->

        <!-- SECONDARY TITLE -->
          <div class="row" id="box" style="background-color: rgba(20, 82, 20, 0.5); min-height:0px; padding: 5px 20px; color: #ffffff;">
            <h4>Medical Eye Record</h4>
          </div>
        <!-- SECONDARY TITLE END -->

        <!-- SECONDARY INFORMATION -->
          <div class="row" id="box" style="background-color: rgba(225, 225, 225, 0.5); min-height: 100px; padding: 20px;">
          <?php
            $eye = array("Visual Acuity of Left and Right Eye with Spectacles","Visual Acuity of Left and Right Eye without Spectacles","Visual Disability","Cause of Visual Disability","Affected part of the Left and/or Right Eye");

            for($e=0; $e < 5; $e++){
              echo $eye[$e]."<br>";
           } ?>
          </div>
        <!-- SECONDARY INFORMATION END -->

        </div>    
      <?php } ?>
      <!-- PROFILES END -->

      </div>
    </div>
  <!-- CONTENT END -->

  </div>
</div>
<!-- PATIENTS END -->

</body>
</html>