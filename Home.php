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

   <div class="container-fluid" id="outer" style="margin-bottom:20px;">

            <div class="container-fluid" style="text-align:center;">
              <h2 style="color: #337ab7; text-shadow: 0px 0px 10px #ffffff; margin-bottom: 10px;">Welcome to Luke Foundation Eye Program Database</h2>
            </div>
   </div>

			<div class="container-fluid" id="outer" style="width:100%; padding:50px 0px;">
				<!-- SURGERIES -->
				<div class="container-fluid" id="basic" style="background-color:transparent;">
					<div id="">
						<!-- TITLE -->
            
						
<div class="container dynamicTile " style="">
<div class="container-fluid" style="float:left; width:100%; padding-left:30px;" id="box_contain">

<!-- GROUP 1: TOP LEFT -->
<div style="width:50%; float:left;">
<div style="width:100%; float:left;">
    <div style="width: calc(33% - 20px); float:left; margin-right:20px;">
      <a id="tile1" class="tile" href="doctors.php">

         <div class="carousel slide" data-ride="carousel">
          <!-- Wrapper for slides -->
          <div class="carousel-inner" id="carousel">
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

  <div style="width: calc(33% - 20px); float:left; margin-right:20px;">
    <a id="tile2" class="tile" href="patient.php">
         <div class="carousel slide" data-ride="carousel">
          <!-- Wrapper for slides -->
          <div class="carousel-inner" id="carousel">
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
  <div style="width: calc(33% - 20px); float:left; margin-right:20px;">
    <a id="tile3" class="tile" href="surgery.php">
       
        <div class="carousel slide" data-ride="carousel">
          <!-- Wrapper for slides -->
          <div class="carousel-inner" id="carousel">
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
  </div>

  <!-- GROUP 3: BOTTOM-LEFT -->
<div style="width:100%; float:left; margin-top:20px;">
  <div style="width: calc(66% - 20px); float:left; margin-right:20px;">
    <a id="tile7" class="tile">
       
        <div class="carousel slide" data-ride="carousel">
          <!-- Wrapper for slides -->
          <div class="carousel-inner" id="carousel1">
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
  <div style="width: calc(33% - 20px); float:left; margin-right:20px;">
    <a id="tile8" class="tile" href="form_report.php">
       
         <div class="carousel slide" data-ride="carousel">
          <!-- Wrapper for slides -->
          <div class="carousel-inner" id="carousel2">
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
  </div>
<!-- GROUP 3: BOTTOM-LEFT END -->


 </div>
<!-- GROUP 1: TOP-LEFT END -->

<!-- GROUP 2: TOP-RIGHT -->
<div style="width:50%; float:left;">
<div style="width:100%; float:left;">
  <div style="width: calc(33% - 20px); float:left; margin-right:20px;">
    <a id="tile4" class="tile">
       
        <div class="carousel slide" data-ride="carousel">
          <!-- Wrapper for slides -->
          <div class="carousel-inner" id="carousel">
            <div class="item active">
              <img src="images/green_blank.png" class="img-responsive"/>
            </div>
          </div>
        </div>
         
    </a>
  </div>
  <div style="width: calc(33% - 20px); float:left; margin-right:20px;">
    <a id="tile3" class="tile"  href="form_surgery.php">
       
        <div class="carousel slide" data-ride="carousel">
          <!-- Wrapper for slides -->
          <div class="carousel-inner" id="carousel">
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
  <div style="width: calc(33% - 20px); float:left; margin-right:20px;">
    <a id="tile4" class="tile" href="form_patient.php">
       
        <div class="carousel slide" data-ride="carousel">
          <!-- Wrapper for slides -->
          <div class="carousel-inner" id="carousel">
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

<!-- GROUP 4: BOTTOM-RIGHT -->
<div style="width:100%; float:left; margin-top:20px;">
  <div style="width: calc(66% - 20px); float:left; margin-right:20px;">
    <a id="tile7" class="tile">
       
        <div class="carousel slide" data-ride="carousel">
          <!-- Wrapper for slides -->
          <div class="carousel-inner" id="carousel3">
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

  <div style="width: calc(33% - 20px); float:left; margin-right:20px;">
    <a id="tile9" class="tile" href="form_doctors.php">
       
          <div class="carousel slide" data-ride="carousel">
          <!-- Wrapper for slides -->
          <div class="carousel-inner" id="carousel4">
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
<!-- GROUP 4: BOTTOM-RIGHT END -->

</div>
<!-- GROUP 2: TOP-RIGHT END -->

</div>

					<!-- CONTENT END -->
				</div>
			</div>
			<!-- SURGERIES END -->
		</div>
	</body>
</html>

<script type="text/javascript">
window.onload = function() {
    if(!window.location.hash) {
        window.location = window.location + '#h';
        window.location.reload();
    }
}
$('#box_contain').each(function(){
    var inner = $(this).find('p');
    $(this).height(inner.outerHeight(true));
    $(this).width(inner.outerWidth(true)); 
});

$(document).ready(function(){
 var height1 = $("#carousel4").height();
 $("#carousel3").height(height1);
 var height1 = $("#carousel2").height();
 $("#carousel1").height(height1);
});

</script>
