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


<!-- DOCTORS FORM -->
<div class="container-fluid" id="basic" style="padding-top: 10px;"">

  <div id="inner">
  <!-- CONTENT -->
		<div class="container-fluid" >
      
      <!-- FORMS -->
        <div class="container-fluid">
          <h3>Surgery Information</h3>
          <hr style=" border: solid 1px #2d4309;  width:100%; padding: 0px;">
              
          <form action="#">

          <!-- CASE NUMBER-->
            <div class="form-group row">
              <label class="control-label col-md-2" for="" style="float:left;">Case Number </label>
              <div class="col-md-4">
                <input type="" class="form-control" id="" placeholder="Enter Surgery Transaction Number" name="">
              </div>
            </div>
          <!-- CASER NUMBER END -->

          <!-- SURGEON LICENSE NUMBER -->
            <div class="form-group row">
              <label class="control-label col-md-2" for="" style="float:left;">Conducted by: </label>
              <div class="col-md-4">
                <input type="" class="form-control" id="" placeholder="Enter Surgeon License Number" name="">
              </div>
            </div>
          <!-- SURGEON LICENSE NUMBER END -->

          <!-- PATIENT INFORMATION -->
            <div class="panel-group" style="margin-top:25px;">
              <div class="panel panel-default" style="">
                <div class="panel-heading" id="panelh">Patient Information</div>
                  <div class="panel-body">

                  <!-- PATIENT ID -->
                    <div class="form-group row">
                      <label class="control-label col-md-2" for="" style="float:left;">Patient ID </label>
                      <div class="col-md-4">
                        <input type="" class="form-control" id="" placeholder="Enter Patient ID Number" name="">
                      </div>
                    </div>
                  <!-- PATIENT ID END -->

                  <!-- VISUAL IMPARITY -->
                    <div class="form-group row">
                      <label class="control-label col-md-2" for="" style="float:left;">Visual Imparity </label>
                      <div class="col-md-4">
                        <input type="" class="form-control" id="" placeholder="Description of visual imparity..." name="">
                      </div>
                    </div>
                  <!-- VISUAL IMPARITY END -->
                    
                  <!-- MEDICAL HISTORY -->
                    <div class="form-group row">
                      <label class="control-label col-md-2" for="" style="float:left;">Medical History </label>
                      <div class="col-md-4">
                        <input type="" class="form-control" id="" placeholder="Patient medical history..." name="">
                      </div>
                    </div>
                  <!-- MEDICAL HISTORY END -->

                  </div>
                </div>
              </div>
            <!-- VISUAL ACUITY END -->

            <!-- SURGERY DETAILS -->
              <div class="panel-group" style="margin-top:25px;">
                <div class="panel panel-default" style="">
                  <div class="panel-heading" id="panelh">Surgery Details</div>
                    <div class="panel-body">

                  <!-- CLEARANCE -->
                    <div class="form-group row">
                      <label class="control-label col-md-3" for="" style="float:left;">Clearance Number </label>
                      <div class="col-md-4">
                        <input type="" class="form-control" id="" placeholder="Enter Surgery Clearance Number" name="">
                      </div>
                    </div>
                  <!-- CLEARANCE END -->

                  <!-- SURGERY ADDRESS -->
                    <div class="form-group row">
                      <label class="control-label col-md-3" for="" style="float:left;">Surgery Address</label>
                      <div class="col-md-6">
                        <textarea type="" class="form-control" id="" placeholder="Enter Surgery Location" name="" rows="2"></textarea>
                      </div>
                    </div>
                  <!-- SURGERY ADDRESS END -->

                  <!-- DATE -->
                    <div class="form-group row">
                      <label class="control-label col-md-3" for="" style="float:left;">Date of Surgery </label>
                      <div class="input-group col-md-4">
                        <input type="text" class="form-control" placeholder="DD"/>
                        <span class="input-group-addon">-</span>
                        <input type="text" class="form-control" placeholder="MM"/>
                        <span class="input-group-addon">-</span>
                        <input type="text" class="form-control" placeholder="YYYY"/>
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
                      <label class="control-label col-md-2" for="" style="float:left;">Diagnosis </label>
                      <div class="col-md-6">
                        <input type="" class="form-control" id="" placeholder="Eye Surgery Diagnosis" name="">
                      </div>
                    </div>
                  <!-- DIAGNOSIS END -->
                    
                  <!-- SURGERY REMARKS -->
                    <div class="form-group row">
                      <label class="control-label col-md-2" for="" style="float:left;">Remarks</label>
                      <div class="col-md-6">
                        <input type="" class="form-control" id="" placeholder="Surgeon's Remarks" name="">
                      </div>
                    </div>
                  <!-- SURGERY REMARKS END -->

                  </div>
                </div>
              </div>
            <!-- SURGERY REPORT END -->


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