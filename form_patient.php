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
          <h3>Patient Information</h3>
          <hr style=" border: solid 1px #2d4309;  width:100%; padding: 0px;">
              
          <form action="#">

          <!-- PATIENT ID -->
            <div class="form-group row">
              <label class="control-label col-md-2" for="" style="float:left;">Patient ID </label>
              <div class="col-md-4">
                <input type="" class="form-control" id="" placeholder="Enter Patient ID" name="">
              </div>
            </div>
          <!-- PATIENT ID END -->

          <!-- PHYSICIAN LICENSE NUMBER -->
            <div class="form-group row">
              <label class="control-label col-md-2" for="" style="float:left;">Examined by: </label>
              <div class="col-md-4">
                <input type="" class="form-control" id="" placeholder="Enter Physician License Number" name="">
              </div>
            </div>
          <!-- PHYSICIAN LICENSE NUMBER END -->

          <!-- STAFF LICENSE NUMBER -->
            <div class="form-group row">
              <label class="control-label col-md-2" for="" style="float:left;">Screened by: </label>
              <div class="col-md-4">
                <input type="" class="form-control" id="" placeholder="Enter Staff License Number" name="">
              </div>
            </div>
          <!-- STAFF LICENSE NUMBER END -->

          <!-- VISUAL ACUITY -->
            <div class="panel-group" style="margin-top:25px;">
              <div class="panel panel-default" style="">
                <div class="panel-heading" id="panelh">Visual Acuity</div>
                  <div class="panel-body">

                    <div class="form-group row">
                      <label class="control-label col-md-4" for="" style="float:left;">Left Eye with Spectacles</label>
                      <div class="col-md-2">
                        <div class="input-group">
                          <span class="input-group-addon">20</span>
                          <span class="input-group-addon">/</span>
                          <input type="" class="form-control" id="" placeholder="" name="">
                        </div>
                      </div>
                    </div>
                    
                    <div class="form-group row">
                      <label class="control-label col-md-4" for="" style="float:left;">Right Eye with Spectacles</label>
                      <div class="col-md-2">
                        <div class="input-group">
                          <span class="input-group-addon">20</span>
                          <span class="input-group-addon">/</span>
                          <input type="" class="form-control" id="" placeholder="" name="">
                        </div>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="control-label col-md-4" for="" style="float:left;">Right Eye without Spectacles</label>
                      <div class="col-md-2">
                        <div class="input-group">
                          <span class="input-group-addon">20</span>
                          <span class="input-group-addon">/</span>
                          <input type="" class="form-control" id="" placeholder="" name="">
                        </div>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="control-label col-md-4" for="" style="float:left;">Left Eye withpout Spectacles</label>
                      <div class="col-md-2">
                        <div class="input-group">
                          <span class="input-group-addon">20</span>
                          <span class="input-group-addon">/</span>
                          <input type="" class="form-control" id="" placeholder="" name="">
                        </div>
                      </div>
                    </div>

                  </div>
                </div>
              </div>
            <!-- VISUAL ACUITY END -->

            <!-- DESCRIPTION OF VISUAL PROBLEM -->
              <div class="panel-group" style="margin-top:25px;">
                <div class="panel panel-default" style="">
                  <div class="panel-heading" id="panelh">Description of Visual Problem</div>
                    <div class="panel-body">

                  <!-- VISUAL DISABILITY -->
                    <div class="form-group row">
                      <label class="control-label col-md-2" for="" style="float:left;">Visual Disability </label>
                      <div class="col-md-6">
                        <input type="" class="form-control" id="" placeholder="Disability of the patient's eyes..." name="">
                      </div>
                    </div>
                  <!-- VISUAL DISABILITY -->

                  <!-- CAUSE OF DISABILITY -->
                    <div class="form-group row">
                      <label class="control-label col-md-2" for="" style="float:left;">Cause </label>
                      <div class="col-md-6">
                        <textarea type="" class="form-control" id="" placeholder="Enter the cause of the patient's visual disability..." name="" rows="2"></textarea>
                      </div>
                    </div>
                  <!-- CAUSE OF DISABILITY END -->

                  </div>
                </div>
              </div>
            <!-- DESCRIPTION OF VISUAL PROBLEM END -->

            <!-- AFFECTED EYE -->
              <div class="panel-group" style="margin-top:25px;">
                <div class="panel panel-default" style="">
                  <div class="panel-heading" id="panelh">Affected Eye</div>
                    <div class="panel-body">

                  <!-- AFFECTED PART OF RIGHT EYE -->
                    <div class="form-group row">
                      <label class="control-label col-md-2" for="" style="float:left;">Right Eye</label>
                      <div class="col-md-6">
                        <input type="" class="form-control" id="" placeholder="Affected Part of Right Eye" name="">
                      </div>
                    </div>
                  <!-- AFFECTED PART OF RIGHT EYE END -->
                    
                  <!-- AFFECTED PART OF LEFT EYE -->
                    <div class="form-group row">
                      <label class="control-label col-md-2" for="" style="float:left;">Left Eye</label>
                      <div class="col-md-6">
                        <input type="" class="form-control" id="" placeholder="Affected Part of Left Eye" name="">
                      </div>
                    </div>
                  <!-- AFFECTED PART OF LEFT EYE END -->

                  </div>
                </div>
              </div>
            <!-- DESCRIPTION OF VISUAL PROBLEM END -->


          <!-- ... -->
            
          <!-- ... -->

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