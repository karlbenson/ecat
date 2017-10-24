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

<!-- TITLE -->
  <div class="container-fluid" style="color: #ffffff;">
    <h4>Eye Cataract Program</h4> <br>
  </div>
<!-- TITLE -->

<?php



?>

<!-- DOCTORS FORM -->
<div class="container-fluid" id="basic" style="padding-top: 10px;"">

  <div id="inner">
  <!-- CONTENT -->
		<div class="container-fluid" >
      
      <!-- FORMS -->
        <div class="container-fluid">
          <h3>Doctor Information</h3>
          <hr style=" border: solid 1px #2d4309;  width:100%; padding: 0px;">
              
          <form action="#">

          <!-- NAME -->
            <div class="form-group row">
              <label class="col-md-2" style="float:left;">Name</label>

            <!-- FIRST NAME -->
              <div class="col-md-2">
                <label class="sr-only" for="">First Name</label>
                <input type="" class="form-control" id="" placeholder="First Name" name="">
              </div>
            <!-- FIRST NAME END -->

            <!-- LAST NAME -->
              <div class="col-md-2">
                <label class="sr-only" for="">Last Name</label>
                <input type="" class="form-control" id="" placeholder="Last Name" name="">
              </div>
            <!-- LAST NAME END -->
            
            </div>
          <!-- NAME END -->

          <!-- LICENSE NUMBER -->
            <div class="form-group row">
              <label class="control-label col-md-2" for="" style="float:left;">License Number</label>
              <div class="col-md-4">
                <input type="" class="form-control" id="" placeholder="Enter License Number" name="">
              </div>
            </div>
          <!-- LICENSE NUMBER END -->

          <!-- ADDRESS -->
            <div class="form-group row">
              <label class="control-label col-md-2" for="address" style="float:left;">Address</label>
              <div class="col-md-6">
                <textarea type="address" class="form-control" id="" placeholder="Enter Home or Work Address" name="address" rows="3"></textarea>
              </div>
            </div>
          <!-- ADDRESS END -->

          <!-- ENTER -->
          <div class="text-center" style="margin-bottom: 20px;">
            <button type="submit" class="btn" id="go">Submit</button>
          </div>
          <!-- ENTER END -->

          </form>
        </div>
      <!-- FORMS END -->
      
    </div>
  <!-- CONTENT END -->

  </div>
</div>
<!-- DOCTORS FORM END -->

</div>
<!-- MAIN END -->

</body>
</html>