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

<?php
$organization = "Luke Foundation (photo)";
$page = array("Page1", "Page2", "Page3", "Eye Cataract Program");
$i = 0;
?>

<!--  -->

<div class="container-fluid" id="outer">

<!-- HEAD AND NAVIGATION -->

<div>
    <nav class="navbar navbar-default">
    <div class="container-fluid" style="padding: 0px;">
      <div id="banner" style="background-image: url(p_holder.jpg);">
          <?php echo $organization; ?>
        </div>
    </div>
      <div class="container-fluid">
        <div>
          <ul class="nav navbar-nav">
              <li><a href="#"> <?php echo $page[0]; ?> </a></li>
              <li><a href="#"> <?php echo $page[1]; ?> </a></li>
              <li><a href="#"> <?php echo $page[2]; ?> </a></li>
              <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#"><?php echo $page[3]; ?>
                <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href=doctors.php>Doctors</a></li>
                    <li><a href="patient.php">Patient</a></li>
                    <li><a href="surgery.php">Surgeries</a></li>
                </ul>
              </li>
          </ul>
        </div>
      </div>
    </nav>
  </div>

<!-- HEAD AND NAVIGATION END -->

<!-- PATIENTS -->

	<div class="container-fluid" id="basic" >
		<div id="inner" data-target="list" data-spy="scroll" data-offset="15" >
			
		<div class="container-fluid" >
  			<h4>Eye Cataract Patients</h4>
  			<br>
		</div>

		<div class="container-fluid">

    			<!-- PROFILES -->
    			
      				<div>
      					<?php for($i = 0; $i < 3; $i++){	?>
      					<div style="margin-bottom: 20px;">
        				<div class="row" id="box" style="background-color: rgba(255, 204, 0, 0.3); ;">
        					<div class="col-sm-2" style="padding:0px;">
        						<img class="container-fluid" id="picture" src="id.jpg">
        					</div>
        					<div class="col-sm-10" id="profile">
        						<?php 	echo "Patient ID ".($i+1)."<br>"; ?>
        						<hr style=" border: solid 1px #004d4d;  width:100%; padding: 0px;">
        						<?php
        							echo "Examined by: "."Physician License #"."<br>";
        							echo "Screened by: "."Staff License #"."<br>";
        						?>
        					</div>
        				</div>
                <div class="row" id="box" style="background-color: rgba(20, 82, 20, 0.5); min-height:0px; padding: 5px 20px; color: #ffffff;">
                    <h4>Medical Eye Record</h4>
                </div>
        				<div class="row" id="box" style="background-color: rgba(225, 225, 225, 0.5); min-height: 100px; padding: 20px;">
        						<?php
                    $eye = array("Visual Acuity of Left and Right Eye with Spectacles","Visual Acuity of Left and Right Eye without Spectacles","Visual Disability","Cause of Visual Disability","Affected part of the Left and/or Right Eye");

                    for($e=0; $e < 5; $e++){
                      echo $eye[$e]."<br>";
                    }
                     ?>
        				</div>
        				</div>    
        				<?php } ?>

      				</div>
    
	   	</div>

	 </div>
  </div>

</body>
</html>