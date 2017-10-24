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

DOCTOR BASIC INFORMATION:
  - FIRST NAME
  - LAST NAME
  - LICENSE NUMBER
  - ADRESS

DOCTOR SECONDARY INFORMATION
  - ...

-->

<?php
  $d_fname= array();
  $d_lname= array();
  $d_license = array();
  $d_address = array();
?>

<!-- DOCTORS -->
<div class="container-fluid" id="basic" >
  <div id="inner" >

  <!-- TITLE -->
		<div class="container-fluid" >
  			<h4>Eye Doctors</h4> <br>
		</div>
  <!-- TITLE -->

  <!-- CONTENT -->
		<div class="container-fluid" >
      <div>

      <!-- MODIFIABLE CODE STARTS HERE -->

      <!-- PROFILES -->
      <?php for($i = 0; $i < 2; $i++){	?>
        <div style="margin-bottom: 20px;">

        <!-- PRIMARY -->
          <div class="media" id="box">

          <!--PHOTO-->
            <div class="media-left media-top" style="padding:0px;">
              <img class="media-object" id="picture" src="id.jpg">
            </div>
          <!--PHOTO END-->

          <!-- BASIC INFORMATION -->
            <div class="media-body" id="profile">
              <?php 	echo '<p class="media-heading">'.'First Name'.' & '.'Surname'.'<br>'; ?>
              <hr style=" border: solid 1px #2d4309;  width:100%; padding: 0px;">
              <?php
                echo "License Number: "."<br>";
                echo "Address: "."<br>";
               ?>
            </div>
          <!-- BASIC INFORMATION END -->

           </div>
        <!-- PRIMARY END -->

        <!-- SECONDARY -->
          <div class="row" id="box" style="background-color: rgba(225, 225, 225, 0.5); min-height: 50px; adding: 20px;">
          <?php
            echo "Other Details..."."<br>";
          ?>
  				</div>
        <!-- SECONDARY END -->

        </div>    
      <?php } ?>
      <!-- PROFILES END -->

      <!-- MODIFIABLE CODE ENDS HERE -->

      </div>
    </div>
  <!-- CONTENT END -->

  </div>
</div>
<!-- DOCTORS -->

</div>
<!-- MAIN END -->

</body>
</html>