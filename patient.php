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

PATIENT INFORMATION:
  - PATIENT ID
  - STAFF ID
  - PHYSICIAN LICENSE NUMBER

SECONDARY INFORMATION
  - Visual Acuity of Left Eye with Spectacles
  - Visual Acuity of Right Eye with Spectacles
  - Visual Acuity of Left Eye without Spectacles
  - Visual Acuity of Right Eye without Spectacles
  - Visual Disability
  - Cause of Visual Disability
  - Affected part of the Left Eye
  - Affected part of the Right Eye

-->

<!-- PATIENTS -->
<div class="container-fluid" id="basic" >
  <div id="inner">

  <!-- TITLE -->
    <div class="container-fluid" >
        <h4>Eye Cataract Patients</h4> <br>
    </div>
  <!-- TITLE -->

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

  <!-- CONTENT -->
    <div class="container-fluid" >
      <div>

      <!-- MODIFIABLE CODE STARTS HERE -->

      <!-- PROFILES -->
        <div class="container-fluid">
          <ul class="list-group">

      <?php //CODE SECTION STARTS HERE
      $DEFAULT = 0;
      if (isset($_GET["currentpage"])) { $current_p  = $_GET["currentpage"]; } else { $current_p=1; };
      if (isset($_GET["profilepage"])) { $profile_p = $_GET["profilepage"]; $DEFAULT=1; } else { };
        $limit = 20;
        $begin = ($current_p-1)*$limit;
        $P_query_list = array("SELECT * FROM PATIENT p, DOCTOR d where p.PHY_LICENSE_NUM = d.DOC_LICENSE_NUM order by PAT_ID_NUM asc limit $begin, ");
        $P_query = $P_query_list[0].$limit;
        $output = $mydatabase->query($P_query);

      if($DEFAULT==0){
        if ($output->num_rows > 0) {

          //HEADER
          echo '<li class="list-group-item" id="tophead">';
          echo '<div class="container-fluid row">';
          echo '<div class="col-md-3" style="width:230px; float:left;"><b>'.'Patient ID'.'</b></div>';
          echo '<div class="col-md-3" style="width:230px; float:left;"><b>'.'Examined by'.'</b></div>';
          echo '<div class="col-md-3" style="width:230px; float:left;"><b>'.'Screened by'.'</b></div>';
          echo '</div>';
          echo '</li>';
          //HEADER END

          //CONTENT
          while($dataline = $output->fetch_assoc()) { 

            echo '<li class="list-group-item">';
            echo '<div class="row">';

                echo '<div class="col-md-3" style="width:230px; float:left;">'.$dataline["PAT_ID_NUM"].'</div>';
                echo '<div class="col-md-3" style="width:230px; float:left;">'.$dataline["LAST_NAME"].' '.$dataline["FIRST_NAME"].'</div>';
                echo '<div class="col-md-6" style="width:230px; float:left;">'.$dataline["STAFF_LICENSE_NUM"].'</div>';
                echo '<div class="col-md-2" style="width:150px; float:right;">'.'<a href="'.'patient.php'.'?profilepage='.$dataline["PAT_ID_NUM"].'">'.'see full details'.'</a>'.'</div>';
              
            echo '<div>';
            echo '</li>';
            //CONTENT END
          } 
      

      echo '<div style="text-align:center;">';
      echo '<ul class="pagination" style="margin:auto;"><br>';
          
          $check = "SELECT PAT_ID_NUM FROM PATIENT";
          $check2 = $mydatabase->query($check);
          $item_no = $check2->num_rows;
          $page_no = ceil($item_no/$limit);
          
          if($page_no>1){
          for ($p_no=0; $p_no < $page_no; $p_no++) { 
            echo '<li><a style="color:#4a6a15;" href="'.'patient.php'.'?currentpage='.($p_no+1).'">'.($p_no+1).'</a> </li>';
          } } 

      echo '</ul>';
      echo '</div>';

      //CODE SECTION ENDS HERE
      } else { echo "No Records."; }

    }else if ($DEFAULT==1) {

      $output1 = $mydatabase->prepare("SELECT p.*, d.LAST_NAME, d.FIRST_NAME FROM PATIENT p, DOCTOR d where p.PHY_LICENSE_NUM = d.DOC_LICENSE_NUM and PAT_ID_NUM = '$profile_p' ");      
      $output1->execute();
      $line = $output1->get_result();
      $dataline = $line->fetch_assoc();

      $VA_LABEL = array("Left Eye with Spectacles", "Right Eye with Spectacles", "Left Eye without Spectacles", "Right Eye without Spectacles");
      $VA = array($dataline["VA_WITH_SPECT_LEFT"], $dataline["VA_WITH_SPECT_RIGHT"], $dataline["VA_NO_SPECT_LEFT"], $dataline["VA_NO_SPECT_RIGHT"]);



      echo '<div>
        <div class="container-fluid">
          <h3>Patient ID No.: '.$dataline["PAT_ID_NUM"].'</h3>
          <div class="panel panel-default">
            <div class="panel-heading" style="background-color:#2d4309; color:#ffffff;">Patient Record</div style="padding-bottom:10px;">
            <div class="panel-body row" style="margin:0px; padding:5px 10px;">
              <div class="col-md-3" >'.'Examined by: '.'</div>
              <div class="col-md-9">'.$dataline["FIRST_NAME"].' '.$dataline["LAST_NAME"].'</div>
            </div>
            <div class="panel-body row" style="margin:0px; padding:5px 10px;">
              <div class="col-md-3" >'.'Screened by: '.'</div>
              <div class="col-md-9">'.$dataline["STAFF_LICENSE_NUM"].'</div>
            </div>
          </div>
          <div class="panel panel-default" style="padding-bottom:0px;">
            <div class="panel-heading" style="border: 0px; font-weight:bold;">Visual Acuity</div>
             
             <div style="margin: 0px 50px;">
             <table class="table table-condensed">
              <thead> <tr>
                <th>Condition</th>
                <th>Scale</th>
              </tr> </thead>
              <tbody>';
              for ($t=0; $t < sizeof($VA); $t++) {
                echo '<tr>
                  <td>'.$VA_LABEL[$t].'</td>
                  <td>'.$VA[$t].'</td>
                </tr>'; }
              echo '</tbody></table>';
            echo '</div>';
          echo '</div>';

          if((sizeof($dataline["VISUAL_DISABILITY"])>0)&&(sizeof($dataline["DISABILITY_CAUSE"])>4)){
             echo '
          <div class="panel panel-default" style="padding-bottom:10px;">
            <div class="panel-heading" style="border: 0px; font-weight:bold;">Visual Problem</div>
            <div class="panel-body row" style="margin:0px; padding:5px 10px;">
              <div class="col-md-3" >'.'Visual Disability'.'</div>
              <div class="col-md-9">'.$dataline["VISUAL_DISABILITY"].'</div>
            </div>
            <div class="panel-body row" style="margin:0px; padding:5px 10px;">
              <div class="col-md-3" >'.'Cause'.'</div>
              <div class="col-md-9">'.$dataline["DISABILITY_CAUSE"].'</div>
            </div>
          </div>
          <div class="panel panel-default" style="padding-bottom:10px;">
            <div class="panel-heading" style="border: 0px; font-weight:bold;">Affected Area of Eye</div>
            <div class="panel-body" style="margin:0px; padding:5px 10px;">
               <table class="table table-condensed">
                <thead>
                  <tr> <th>Eye</th> <th>Affected Part</th> </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Left</td>
                    <td>'.$dataline["LEFT_EYE_AFFECTED"].'</td>
                  </tr>
                  <tr>
                    <td>Right</td>
                    <td>'.$dataline["RIGHT_EYE_AFFECTED"].'</td>
                  </tr>
                </tbody>
              </table>
            </div>


          </div>';
          }

      echo'</div>
      </div>';
      echo '<div style="text-align:right;"><a href="'.'patient.php'.'" onclick="back()">Back</a></div>';

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
<!-- PATIENTS END -->

</body>
</html>