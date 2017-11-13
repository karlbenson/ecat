<!DOCTYPE html>

<!--UPDATE AND DELETE STILL TO BE FIXED-->

<html>
	<head>
		<title>Luke Foundation Eye Program: Surgery</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="references/bootstrap.min.css">
		<link rel="stylesheet" href="references/typeahead.css">
		<link rel="stylesheet" href="references/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="theme2.css">
		<link rel="stylesheet" href="references/bootstrap-datetimepicker.css">
		<link rel="stylesheet" href="references/dataTables.bootstrap4.min.css"/>
		<script src="references/jquery-2.1.1.min.js"></script>
		<script src="references/bootstrap.min.js"></script>
		<script src="references/moment-with-locales.js"></script>
		<script src="references/bootstrap-datetimepicker.js"></script>
		<script src="references/typeahead.bundle.js"></script>
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

					//MAX VAUES
					$CASE_LENG = 10;
					$SURG_LENG = 50;
					$ID_LENG = 50;
					$VI_MAX = 100;
					$HIST_MAX = 100;
					$TANES_MAX = 25;
					$DIAG_MAX = 100;
					$SURGADD_MAX = 50;
					$SURG_DATE_YY = 4; 
					$SURG_DATE_DD = 2;
					$REM_MAX = 100;
					$INTER_MAX = 50;
					$ANEST_MAX = 50;
					$IOL_MAX = 20;
					$PC_MAX = 10;
					$MONTH_choice = array("January","Febuary","March","April","May","June","July","August","September","October","November","December");
					//MAX VALUES END

					include("auto_doc.php");

					//CODE SECTION ENDS HERE
				?>

				<!-- SURGERIES -->
				<div class="container-fluid" id="basic" >
					<div id="inner">
						<!-- TITLE -->
            <div class="container-fluid" >
              <h2 style="color:#337ab7;">Welcome to Luke Foundation Eye Program Database</h2>
            </div>
						
<div class="container dynamicTile">
<div class="row ">
    <div class="col-sm-2 col-xs-4">
      <a id="tile1" class="tile" href="surgery.php">
         <div class="carousel slide" data-ride="carousel">
          <!-- Wrapper for slides -->
          <div class="carousel-inner">
            <div class="item active">
               <img src="images/doctor2.png" class="img-responsive"/>
            </div>
            <div class="item">
               <img src="images/doctor1.png" class="img-responsive"/>
            </div>
          </div>
        </div>
         
      </a>
  </div>
  <div class="col-sm-2 col-xs-4">
    <a id="tile2" class="tile" href="patient.php">
         <div class="carousel slide" data-ride="carousel">
          <!-- Wrapper for slides -->
          <div class="carousel-inner">
            <div class="item active">
              <img src="images/patient2.png" class="img-responsive"/>
            </div>
            <div class="item">
              <img src="images/patient1.png" class="img-responsive"/>
            </div>
            <div class="item">
              <img src="images/patient2.png" class="img-responsive"/>
            </div>
          </div>
        </div>
         
    </a>
  </div>
  <div class="col-sm-2 col-xs-4">
    <a id="tile3" class="tile" href="surgery.php">
       
        <div class="carousel slide" data-ride="carousel">
          <!-- Wrapper for slides -->
          <div class="carousel-inner">
            <div class="item active">
               <img src="images/surg2.png" class="img-responsive"/>
            </div>
            <div class="item">
               <img src="images/surg1.png" class="img-responsive"/>
            </div>
            </div>
         </div>
    </a>
  </div>
  <div class="col-sm-2 col-xs-4">
    <a id="tile4" class="tile">
       
        <div class="carousel slide" data-ride="carousel">
          <!-- Wrapper for slides -->
          <div class="carousel-inner">
            <div class="item active">
              <img src="images/green_blank.png" class="img-responsive"/>
            </div>
          </div>
        </div>
         
    </a>
  </div>
  <div class="col-sm-2 col-xs-4">
    <a id="tile3" class="tile"  href="form_surgery.php">
       
        <div class="carousel slide" data-ride="carousel">
          <!-- Wrapper for slides -->
          <div class="carousel-inner">
            <div class="item active">
               <img src="images/surgg2.png" class="img-responsive"/>
            </div>
            <div class="item">
               <img src="images/surgg1.png" class="img-responsive"/>
            </div>
            </div>
         </div>
    </a>
  </div>
  <div class="col-sm-2 col-xs-4">
    <a id="tile4" class="tile" href="form_patient.php">
       
        <div class="carousel slide" data-ride="carousel">
          <!-- Wrapper for slides -->
          <div class="carousel-inner">
            <div class="item active">
              <img src="images/patientg2.png" class="img-responsive"/>
            </div>
             <div class="item">
               <img src="images/patientg1.png" class="img-responsive"/>
            </div>
          </div>
        </div>
         
    </a>
  </div>
</div>

<div class="row">
  <div class="col-sm-4 col-xs-8">
    <a id="tile7" class="tile" href="form_doctors.php">
       
        <div class="carousel slide" data-ride="carousel">
          <!-- Wrapper for slides -->
          <div class="carousel-inner">
            <div class="item active">
              <img src="images/form2.png" class="img-responsive"/>
            </div>
            <div class="item">
              <img src="images/form2.png" class="img-responsive"/>
            </div>
            <div class="item">
              <img src="images/form2.png" class="img-responsive"/>
            </div>
          </div>
        </div>
         
    </a>
  </div>
  <div class="col-sm-2 col-xs-4">
    <a id="tile8" class="tile" href="form_report.php">
       
         <div class="carousel slide" data-ride="carousel">
          <!-- Wrapper for slides -->
          <div class="carousel-inner">
            <div class="item active">
               <img src="images/genrep1.png" class="img-responsive"/>
            </div>
             <div class="item">
               <img src="images/genrep2.png" class="img-responsive"/>
            </div>
            </div>
         </div>
         
    </a>
  </div>
  <div class="col-sm-4 col-xs-8">
    <a id="tile7" class="tile">
       
        <div class="carousel slide" data-ride="carousel">
          <!-- Wrapper for slides -->
          <div class="carousel-inner">
            <div class="item active">
              <img src="images/form1.png" class="img-responsive"/>
            </div>
            <div class="item">
              <img src="images/form1.png" class="img-responsive"/>
            </div>
            <div class="item">
              <img src="images/form1.png" class="img-responsive"/>
            </div>
          </div>
        </div>
         
    </a>
  </div>
  <div class="col-sm-2 col-xs-4">
    <a id="tile9" class="tile" href="form_doctors.php">
       
          <div class="carousel slide" data-ride="carousel">
          <!-- Wrapper for slides -->
          <div class="carousel-inner">
            <div class="item active">
              <img src="images/doctor2g.png" class="img-responsive"/>
            </div>
            <div class="item">
              <img src="images/doctor1g.png" class="img-responsive"/>
            </div>
          </div>
        </div>
         
    </a>
  </div>

            
					</div>
					<!-- CONTENT END -->
					<?php $mydatabase->close(); ?>
				</div>
			</div>
			<!-- SURGERIES END -->
		</div>
	</body>
</html>