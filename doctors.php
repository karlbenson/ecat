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
          <a class="navbar-brand" href="Home.php" id="navlink" style="font-size: 12pt; color:#2d4309;"> <span class="glyphicon glyphicon-home"></span> Home </a>
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

DOCTOR BASIC INFORMATION:
  - FIRST NAME
  - LAST NAME
  - LICENSE NUMBER
  - ADRESS

DOCTOR SECONDARY INFORMATION
  - ...

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

<!-- DOCTORS -->
<div class="container-fluid" id="basic" >
  <div id="inner" >

  <!-- TITLE -->
		<div class="container-fluid" >
  			<h4>Doctors</h4> <br>
		</div>
  <!-- TITLE -->

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
      if (isset($_GET["profilepage"])) { $profile_p = $_GET["profilepage"]; $DEFAULT=1; } else {};
      if (isset($_GET["delete"])) { $delete_p =$_GET["delete"]; $DEFAULT=2; } else {};
        $limit = 20;
        $begin = ($current_p-1)*$limit;
        $D_query_list = array("SELECT * FROM DOCTOR order by LAST_NAME asc limit $begin, ");
        $D_query = $D_query_list[0].$limit;
        $output = $mydatabase->query($D_query);

      if($DEFAULT==0){
        if ($output->num_rows > 0) {

          //HEADER
          echo '<li class="list-group-item" id="tophead">';
          echo '<div class="container-fluid row">';
          echo '<div class="col-md-1" style="width:120px; float:left;"><b>'.'Last Name'.'</b></div>';
          echo '<div class="col-md-1" style="width:120px; float:left;"><b>'.'First Name'.'</b></div>';
          echo '<div class="col-md-1" style="width:120px; float:left;"><b>'.'License No.'.'</b></div>';
          echo '<div class="col-md-5" style="float:left;"><b>'.'Address'.'</b></div>';
          echo '</div>';
          echo '</li>';
          //HEADER END

          //CONTENT
          while($dataline = $output->fetch_assoc()) { 

            echo '<li class="list-group-item">';
            echo '<div class="row">';

                echo '<div class="col-md-1" style="width:120px; float:left;">'.$dataline["LAST_NAME"].'</div>';
                echo '<div class="col-md-1" style="width:120px; float:left;">'.$dataline["FIRST_NAME"].'</div>';
                echo '<div class="col-md-1" style="width:120px; float:left;">'.$dataline["DOC_LICENSE_NUM"].'</div>';
                echo '<div class="col-md-5" style="float:left;">'.$dataline["ADDRESS"].'</div>';
                echo '<div class="col-md-2" style="width:150px; float:right;"><a href="'.'doctors.php'.'?profilepage='.$dataline["DOC_LICENSE_NUM"].'">'.'see more'.'</a></div>';
              
            echo '<div>';
            echo '</li>';
            //CONTENT END
          } 

      echo '<div style="text-align:center;">';
      echo '<ul class="pagination" style="margin:auto;"><br>';
          
          $check = "SELECT DOC_LICENSE_NUM FROM DOCTOR";
          $check2 = $mydatabase->query($check);
          $item_no = $check2->num_rows;
          $page_no = ceil($item_no/$limit);
          
          if($page_no>1){
          for ($p_no=0; $p_no < $page_no; $p_no++) { 
            echo '<li><a style="color:#4a6a15;" href="'.'doctors.php'.'?currentpage='.($p_no+1).'">'.($p_no+1).'</a> </li>';
          } } 

      echo '</ul>';
      echo '</div>';

      //CODE SECTION ENDS HERE
      } else { echo "No Records."; }
    }else if ($DEFAULT==1) {

      $output1 = $mydatabase->prepare("SELECT * FROM DOCTOR where DOC_LICENSE_NUM = '$profile_p' ");      
      $output1->execute();
      $line = $output1->get_result();
      $dataline = $line->fetch_assoc();

      echo '<div>
        <div class="container-fluid">
          <h3>Dr. '.$dataline["LAST_NAME"].' '.$dataline["FIRST_NAME"].'</h3>
          <div class="panel panel-default" style="padding-bottom:10px;">
            <div class="panel-heading" style="background-color:#2d4309; color:#ffffff;">Doctor Information</div>
            <div class="panel-body row" style="margin:0px; padding:5px 10px;">
              <div class="col-md-3" >'.'License No.'.'</div>
              <div class="col-md-9">'.$dataline["DOC_LICENSE_NUM"].'</div>
            </div>
            <div class="panel-body row" style="margin:0px; padding:5px 10px;">
              <div class="col-md-3" >'.'Address'.'</div>
              <div class="col-md-9">'.$dataline["ADDRESS"].'</div>
            </div>
          </div>
          <div class="panel panel-default" style="padding-bottom:10px;">
            <div class="panel-heading" style="border: 0px; font-weight:bold;">Other Info.</div>
            <div class="panel-body row" style="margin:0px; padding:5px 10px;">
              <div class="col-md-3" >'.'Info1'.'</div>
              <div class="col-md-9">'.'$placeholder'.'</div>
            </div>
            <div class="panel-body row" style="margin:0px; padding:5px 10px;">
              <div class="col-md-3" >'.'Info2.'.'</div>
              <div class="col-md-9">'.'$placeholder'.'</div>
            </div>
          </div>
          
        </div>
      </div>';
      echo '<div style="text-align:right;"><a href="'.'doctors.php'.'">Back</a></div>';
      echo '<a role="button" class="btn btn-default"'.'href="'.'doctors.php'.'?delete='.$profile_p.'"> <span class="glyphicon glyphicon-trash"></span> Delete </a>';

    }else if($DEFAULT==2){

      //DELETE
      $del = "DELETE FROM DOCTOR WHERE DOC_LICENSE_NUM = '$delete_p' ";

      if ($mydatabase->query($del) === TRUE) {
        echo "Record deleted.";
        echo '<div style="text-align:right;"><a href="'.'doctors.php'.'">Back</a></div>';
      } else {
        echo "Error deleting record: " . $mydatabase->error;
      } //DELETE END

    }

      ?>

          </ul>
        </div>
      <!-- PROFILES END -->

      <!-- MODIFIABLE CODE ENDS HERE -->

      </div>
    </div>
  <!-- CONTENT END -->

  </div>
</div>
<!-- DOCTORS -->

<?php
  $mydatabase->close(); //END
?>

</div>
<!-- MAIN END -->

</body>
</html>