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

<?php
$organization = "Luke Foundation (photo)";
$page = array("Page1", "Page2", "Page3", "Eye Cataract Program");

$table = array("");
$i = 0;
?>

<!--  -->
<div class="container-fluid" id="outer">

	<div>
		<nav class="navbar navbar-default">
		<div class="container-fluid" style="padding: 0px;">
			<div id="banner" style="background-image: url(p_holder.jpg);">
    			<?php echo $organization; ?>
    		</div>
		</div>
  		<div class="container-fluid">
    		<div>
		    	<ul class="nav navbar-nav">
      				<li><a href="#"> <?php echo $page[0]; ?> </a></li>
      				<li><a href="#"> <?php echo $page[1]; ?> </a></li>
      				<li><a href="#"> <?php echo $page[2]; ?> </a></li>
      				<li class="dropdown">
        				<a class="dropdown-toggle" data-toggle="dropdown" href="#"><?php echo $page[3]; ?>
        				<span class="caret"></span></a>
        				<ul class="dropdown-menu">
          					<li><a href=doctors.php>Doctors</a></li>
          					<li><a href="surgery.php">Surgeries</a></li>
        				</ul>
      				</li>
	    		</ul>
	    	</div>
  		</div>
		</nav>
	</div>

	<div class="container-fluid" id="basic" >
		<div id="inner" data-target="list" data-spy="scroll" data-offset="15" >
			
		<div class="container-fluid" >
  			<h4>Eye Cataract Surgeries</h4>
  			<br>
		</div>

		<div class="container-fluid">

		<?php
			$scase_num = 0;
			$sdate = 0;
			$s = 0;
		?>

		<?php for ($i=0; $i <3 ; $i++) { ?>
			
			<div class="record">
				<div class="month">
				<h4><?php echo "Month ".$i;	?></h4>
				</div>
				<div>
				
					<table class="table">
    					<thead>
      					<tr>
        					<th>Date</th>
        					<th>Case no.</th>
        					<th>Surgeon</th>
        					<th>Patient</th>
      					</tr>
    					</thead>
    				<tbody>
    				<?php for ($s=0; $s <5 ; $s++) {
    					$sdate = $sdate + 2;
    				?>
      					<tr>
        					<td><?php echo $i."/".$sdate; ?> </td>
        					<td><?php echo "00".$s; ?></td>
	        				<td>Surgeon<?php echo $s ?></td>
        					<td>Patient<?php echo $s ?></td>
      					</tr>

      				<?php }?>
    				</tbody>
  					</table>
				</div>
			</div>
		<?php } ?>

		</div>
	</div>

</div>

</body>

</html>