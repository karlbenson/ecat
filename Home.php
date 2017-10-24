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

<!-- TITLE -->
  <div class="container-fluid" style="color: #ffffff;">
    <h4>Eye Cataract Program</h4> <br>
  </div>
<!-- TITLE -->


<!-- HOME -->
<div class="container-fluid" id="basic" style="padding-top: 10px;"">

  <div id="inner">
  <!-- CONTENT -->
		<div class="container-fluid" >
      <div class="row" >

      <!-- LEFT COLUMN -->
        <div class="col-sm-2">
          <div class="row" id="menu">
          <div id="box" style="min-height:0px; color:#d9d9d9; text-align: center; padding: 10px 0px; background-color:#2d4309;">
            <h4>Forms</h4>
          </div>
        <!-- ITEM-->
        <?php
          $add = array("Doctor","Patient","Surgery");
          $add_link = array("form_doctors.php","form_patient.php","form_surgery.php");

          for($i=0;$i < count($add);$i++){ 
            echo '<a id="link" href="'.$add_link[$i].'">';
          ?>
          <div class="hover-forms" id="boxl">
          <?php echo "<h5>".$add[$i]."</h5>"; ?>
          </div></a>
        <?php } ?>
        <!-- ITEM END -->

          </div>
        </div>
      <!-- LEFT COLUMN END -->

      <!-- RIGHT COLUMN -->
        <div class="col-sm-10">	
          <div>

          <!-- CENTER SPACE: WHAT TO DO? -->
          <!-- TO BE CONSTRUCTED -->

            </div>
          </div>
        <!-- RIGHT COLUMN END -->

      </div>
    </div>
  <!-- CONTENT END -->

  </div>
</div>
<!-- HOME -->

</div>
<!-- MAIN END -->

</body>
</html>