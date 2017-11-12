<!DOCTYPE html>
<html>
	<head>
		<title>Luke Foundation Eye Program: Home</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="references/bootstrap.min.css">
		<link rel="stylesheet" href="references/font-awesome.min.css">
		<script src="references/jquery.min.js"></script>
		<script src="references/bootstrap.min.js"></script>
		<link rel="stylesheet" type="text/css" href="theme2.css">
	</head>
	<body style="justify-content: center;">

		<!-- HEAD AND NAVIGATION -->
		<?php include("nav.php"); ?>
		<!-- HEAD AND NAVIGATION END -->

		<div id="body">
			<!-- MAIN -->
			<div class="container-fluid" id="outer">
				<!-- TITLE -->
				<div class="container-fluid" style="color: #337ab7; text-shadow: 0px 0px 10px #ffffff;padding-bottom:15px;">
					<h1>Welcome to Luke Foundation Eye Program</h1> 
				</div>
				<!-- TITLE END -->

				<?php
					include("dbconnect.php");	
					//MYSQL SECTION
					$currmonth = date("m");
					$S_query = "SELECT * FROM SURGERY s, DOCTOR d where s.SURG_LICENSE_NUM = d.DOC_LICENSE_NUM order by s.SURG_DATE desc";
					$output = $mydatabase->query($S_query);	
					//MYSQL SECTION END
					//CONTENT
					$prearray = array();
					$PC_PF_SUM=0;
					$PC_LAB_SUM=0;
					$PC_IOL_SUM=0;
					$SPO_IOL_SUM=0;
					$CSF_HBILL_SUM=0;
					$CSF_SUPP_SUM=0;
					$CSF_LAB_SUM=0;
					while($dataline = $output->fetch_assoc()) {
						
						$PC_PF_SUM=$PC_PF_SUM+$dataline["PC_PF"];
						$PC_LAB_SUM=$PC_LAB_SUM+$dataline["PC_LAB"];
						$PC_IOL_SUM=$PC_IOL_SUM+$dataline["PC_IOL"];
						$SPO_IOL_SUM=$SPO_IOL_SUM+$dataline["SPO_IOL"];
						$CSF_HBILL_SUM=$CSF_HBILL_SUM+$dataline["CSF_HBILL"];
						$CSF_SUPP_SUM=$CSF_SUPP_SUM+$dataline["CSF_SUPPLIES"];
						$CSF_LAB_SUM=$CSF_LAB_SUM+$dataline["CSF_LAB"];
					}
					//CONTENT END
					$PC_TOT=$PC_PF_SUM+$PC_LAB_SUM+$PC_IOL_SUM;
					$CSF_TOT=$CSF_HBILL_SUM+$CSF_LAB_SUM+$CSF_SUPP_SUM;
					$GRAND = $PC_TOT+$CSF_TOT+$SPO_IOL_SUM;
					$pesos = "₱ ";

					//COMMA PORTION
					$PC_PF_SUM=number_format($PC_PF_SUM, 2, ".", ",");
					$PC_LAB_SUM=number_format($PC_LAB_SUM, 2, ".", ",");
					$PC_IOL_SUM=number_format($PC_IOL_SUM, 2, ".", ",");
					$SPO_IOL_SUM=number_format($SPO_IOL_SUM, 2, ".", ",");
					$CSF_HBILL_SUM=number_format($CSF_HBILL_SUM, 2, ".", ",");
					$CSF_SUPP_SUM=number_format($CSF_SUPP_SUM, 2, ".", ",");
					$CSF_LAB_SUM=number_format($CSF_LAB_SUM, 2, ".", ",");
					$PC_TOT=number_format($PC_TOT, 2, ".", ",");
					$CSF_TOT=number_format($CSF_TOT, 2, ".", ",");
					$GRAND=number_format($GRAND, 2, ".", ",");

					//END COMMA
				?>

<script type="text/javascript">
	$( document ).ready(function() {
    $(".tile").height($("#tile1").width());
    $(".carousel").height($("#tile1").width());
     $(".item").height($("#tile1").width());
     
    $(window).resize(function() {
    if(this.resizeTO) clearTimeout(this.resizeTO);
	this.resizeTO = setTimeout(function() {
		$(this).trigger('resizeEnd');
	}, 10);
    });
    
    $(window).bind('resizeEnd', function() {
    	$(".tile").height($("#tile1").width());
        $(".carousel").height($("#tile1").width());
        $(".item").height($("#tile1").width());
    });

});



</script>
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
		<a id="tile7" class="tile" href="form_doctor.php">
    	 
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
			</div>
			<!-- MAIN END -->
		</div>
	</body>
</html>
