<!DOCTYPE html>
<html>
<head>
	<title>Prototype</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--	<link rel="stylesheet" href="bootstrap.min.css">	-->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<!-- 	<script src="jquery.min.js"></script>	-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  	<!--	<script src="bootstrap.min.js"></script>	-->
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
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navi" style="border-color:rgba(255, 255, 255,0.5); background-color:rgba(255, 255, 255,0.7);">
            <?php for($i=0; $i<count($page);$i++){ ?>
              <span class="icon-bar"></span>
            <?php } ?>
          </button>
          <a class="navbar-brand" href="Home.php" id="navlink" style="font-size: 12pt; color:#2d4309;">Home</a>
        </div>
      <div class="collapse navbar-collapse" id="navi">
        <ul class="nav navbar-nav" >
          <?php for ($i=0; $i < count($page); $i++) { echo '<li><a href="'.$link[$i].'" id="navlink" style="color:#4a6a15;">'.$page[$i].'</a></li>'; } ?> </ul>
      </div>

      </div>
    </div>
  </nav>
</div>
<!-- HEAD AND NAVIGATION END -->

<!--

TABLE INFORMATION
	-	Date
	-	Case_number
	-	Surgeon
	-	Patient
	-	Visual_imparity
	-	Medical_history
	- Diagnosis
	-	Location
	-	Remarks

-->

<?php //CODE SECTION STARTS HERE

//ESTABLISHING MYSQL LINK (1)

  //INITIALIZE
$server = "localhost";  //own database server name
$username = "root"; //own database username
$password = "...";  //own database password
$database = "database_sample";  //own database name

  //CONNECT TO SERVER
$mydatabase = new mysqli($localhost, $username, $password, $database);

  //IF CONNECTION FAILED
if (!$mydatabase) {
  die( '<div style="color: #ffffff; font-size: 12pt; text-align:center;">'.'Error: Unable to connect to database.'.'</div');
}//END

//ESTABLISHING MYSQL LINK END (1)

//CODE SECTION ENDS HERE
?>

<!-- SURGERIES -->
<div class="container-fluid" id="basic" >
	<div id="inner">
		
	<!-- TITLE -->
		<div class="container-fluid" >
			<h4>Eye Cataract Surgeries</h4>
			<br>
		</div>
	<!-- TITLE -->

<!-- CONTENT -->
		<div class="container-fluid" >
      <div>

      <!-- MODIFIABLE CODE STARTS HERE -->

      <!-- PROFILES -->
        <div class="container-fluid">
          <ul class="list-group">

      <?php
      $DEFAULT = 0;
      if (isset($_GET["currentpage"])) { $current_p = $_GET["currentpage"]; } else { $current_p = 1; };
      if (isset($_GET["profilepage"])) { $profile_p = $_GET["profilepage"]; $DEFAULT=1; } else { };

      $limit = 20;
      $begin = ($current_p-1)*$limit;
      $S_query_list = "SELECT * FROM SURGERY s, DOCTOR d where s.SURG_LICENSE_NUM = d.DOC_LICENSE_NUM order by SURG_DATE desc limit $begin";
      $S_query = $S_query_list.$limit;
      $output = $mydatabase->query($S_query);
        
      if($DEFAULT==0){
        if ($output->num_rows > 0) {

          //HEADER
          echo '<li class="list-group-item" id="tophead">';
          echo '<div class="container-fluid row">';
          echo '<div class="col-md-2" style="width:150px; float:left;"><b>'.'Date'.'</b></div>';
          echo '<div class="col-md-2" style="width:180px; float:left;"><b>'.'Case No.'.'</b></div>';
          echo '<div class="col-md-3" style="width:230px; float:left;"><b>'.'Conducted by'.'</b></div>';
          echo '<div class="col-md-3" style="width:200px; float:left;"><b>'.'Clearance No.'.'</b></div>';
          echo '</div>';
          echo '</li>';
          //HEADER END

          //CONTENT
          while($dataline = $output->fetch_assoc()) { 

            echo '<li class="list-group-item">';
            echo '<div class="row">';

                echo '<div class="col-md-2" style="width:150px; float:left;">'.$dataline["SURG_DATE"].'</div>';
                $s_primary = $dataline["CASE_NUM"];
                echo '<div class="col-md-2" style="width:180px; float:left;">'.$s_primary.'</div>';
                echo '<div class="col-md-3" style="width:230px; float:left;">'.$dataline["LAST_NAME"].' '.$dataline["FIRST_NAME"].'</div>';
                echo '<div class="col-md-3" style="width:200px; float:left;">'.$dataline["CLEARANCE_NUM"].'</div>';
                echo '<div class="col-md-2" style="width:150px; float:right;">'.'<a href="'.'surgery.php'.'?profilepage='.$dataline["CASE_NUM"].'">'.'see full details'.'</a>'.'</div>';
              
            echo '<div>';
            echo '</li>';
            //CONTENT END

          } 
      

      echo '<div style="text-align:center;">';
      echo '<ul class="pagination" style="margin:auto;">';
      echo '<br>';
          
          $check = "SELECT CASE_NUM FROM SURGERY";
          $check2 = $mydatabase->query($check);
          $item_no = $check2->num_rows;
          $page_no = ceil($item_no/$limit);
          
          if($page_no>1){
          for ($p_no=0; $p_no < $page_no; $p_no++) { 
            echo '<li><a style="color:#4a6a15;" href="'.'surgery.php'.'?currentpage='.($p_no+1).'">'.($p_no+1).'</a> </li>';
          } } 

      echo '</ul>';
      echo '</div>';

      } else { echo "No Records."; }

    }else if ($DEFAULT==1) {

      $output1 = $mydatabase->prepare("SELECT s.*, d.LAST_NAME, d.FIRST_NAME FROM SURGERY s, DOCTOR d where s.SURG_LICENSE_NUM = d.DOC_LICENSE_NUM and CASE_NUM = '$profile_p' ");      
      $output1->execute();
      $line = $output1->get_result();
      $dataline = $line->fetch_assoc();

      echo '<div>
        <div class="container-fluid">
          <h3>Case No.: '.$dataline["CASE_NUM"].'</h3>
          <div class="panel panel-default">
            <div class="panel-heading" style="background-color:#2d4309; color:#ffffff;">Surgery Details</div style="padding-bottom:10px;">
            <div class="panel-body row" style="margin:0px; padding:5px 10px;">
              <div class="col-md-3" >'.'Clearance Number'.'</div>
              <div class="col-md-9">'.$dataline["CLEARANCE_NUM"].'</div>
            </div>
            <div class="panel-body row" style="margin:0px; padding:5px 10px;">
              <div class="col-md-3" >'.'Surgery Address'.'</div>
              <div class="col-md-9">'.$dataline["SURG_ADDRESS"].'</div>
            </div>
          </div>
          <div class="panel panel-default" style="padding-bottom:10px;">
            <div class="panel-heading" style="border: 0px; font-weight:bold;">Conducting Surgeon</div>
            <div class="panel-body row" style="margin:0px; padding:5px 10px;">
              <div class="col-md-3" >'.'Name'.'</div>
              <div class="col-md-9">'.$dataline["FIRST_NAME"].' '.$dataline["LAST_NAME"].'</div>
            </div>
            <div class="panel-body row" style="margin:0px; padding:5px 10px;">
              <div class="col-md-3" >'.'License No.'.'</div>
              <div class="col-md-9">'.$dataline["SURG_LICENSE_NUM"].'</div>
            </div>
          </div>
          <div class="panel panel-default" style="padding-bottom:10px;">
            <div class="panel-heading" style="border: 0px; font-weight:bold;">Patient Information</div>
            <div class="panel-body row" style="margin:0px; padding:5px 10px;">
              <div class="col-md-3" >'.'Patient ID'.'</div>
              <div class="col-md-9">'.$dataline["PAT_ID_NUM"].'</div>
            </div>
            <div class="panel-body row" style="margin:0px; padding:5px 10px;">
              <div class="col-md-3" >'.'Visual Imparity'.'</div>
              <div class="col-md-9">'.$dataline["VISUAL_IMPARITY"].'</div>
            </div>
            <div class="panel-body row" style="margin:0px; padding:5px 10px;">
              <div class="col-md-3" >'.'Medical History'.'</div>
              <div class="col-md-9">'.$dataline["MED_HISTORY"].'</div>
            </div>
          </div>
          <div class="panel panel-default" style="padding-bottom:10px;">
            <div class="panel-heading" style="border: 0px; font-weight:bold;">Surgeon Remarks</div>
            <div class="panel-body row" style="margin:0px; padding:5px 10px;">
              <div class="col-md-3" >'.'Diagnosis'.'</div>
              <div class="col-md-9">'.$dataline["DIAGNOSIS"].'</div>
            </div>
            <div class="panel-body row" style="margin:0px; padding:5px 10px;">
              <div class="col-md-3" >'.'Remarks'.'</div>
              <div class="col-md-9">'.$dataline["REMARKS"].'</div>
            </div>
          </div>
        </div>
      </div>';
      echo '<div style="text-align:right;"><a href="'.'surgery.php'.'" onclick="back()">Back</a></div>';

      function back(){ window.history.back(); }

    }

      ?>
      <!-- PROFILES END -->

      <!-- MODIFIABLE CODE ENDS HERE -->

      </div>
    </div>
  <!-- CONTENT END -->

	<?php $mydatabase->close(); ?>

	</div>
</div>
<!-- SURGERIES END -->

</body>
</html>