<?php
	$placeholder = "Luke foundation (placeholder)";
	$page = array(" Home ", " Doctors ", " Patient ", " Surgery ");
	$link = array("Home.php", "doctors.php", "patient.php", "surgery.php");
	$link_sym = array("home", "stethoscope", "id-card", "bed");
	$link1 = array("form_doctors.php","form_patient.php", "form_surgery.php", "form_report.php");
	$link1_label = array("Doctor Form", "Patient Form", "Surgery Form", "Report Form");
	$doctor = array("Physicians", "Surgeons");
	$i = 0;
	$s=0;

	//SIDE NAV
	echo '<div style="position: relative;"><div id="sider">
			<div style="padding: 20px;">';
	echo 		'<button class="btn" onclick="OSB()" id="OSB" value="0"  style="float: right; width: 54px;">
					<span class="fa fa-bars"></span>
				</button>';
	echo 	'</a>';
	for ($i=0; $i < sizeof($link); $i++) { 
		echo '<a  href="'.$link[$i].'">
				<button class="btn" id="OSB" style="float:right;">
					<span class=" fa fa-'.$link_sym[$i].'"></span>';
		echo		'<p class="collapse peeklabel" id="nav-label" style="font-size: 12pt; float:left; padding-top:5px; padding-left: 20px;">'.$page[$i].'</p>';
		echo 	'</button>
			</a>';
	}

	$forms = " Forms ";

	echo '<button class="btn" id="FSB" onclick="FSB()" style="float:right;">
			<span class=" fa fa-pencil" value="0"></span>
			<p class="collapse peeklabel" id="nav-label" style="font-size: 12pt; float:left; padding-top:5px; padding-left: 20px;">'.$forms.'</p>
		</button>

		<div id="subform">';
		for ($i=0; $i < sizeof($link1); $i++) { 
			echo '<a  href="'.$link1[$i].'">
					<button class="btn collapse peeksubform" style="float:right; margin: 5px 0px; padding: 5px; justify-content: center; font-size: 12pt;">
						'.$link1_label[$i].'
					</button>
				</a>'; 
		}
	echo '</div></div></div></div>'; 
	// SIDE NAV END

	// SCRIPT
	echo 
	'<script>
		function FSB() {
			if(document.getElementById("OSB").value == 0){
				OSB();
			}
			if(document.getElementById("FSB").value == 0){
				$(".peeksubform").collapse("show");
				document.getElementById("FSB").value = 1;
			} else {
				$(".peeksubform").collapse("hide");
				document.getElementById("FSB").value = 0;
			}
		}

		function OSB() {
			var command = document.getElementById("OSB").value;  
			if(command==0){
				document.getElementById("sider").style.width = "250px";
				document.getElementById("OSB").value = 1;
				setTimeout(show, 200);
			} else if (command==1) {
				if(document.getElementById("FSB").value == 1){
				setTimeout(delayform, 0);
				}
				$(".peeklabel").collapse("hide");
				setTimeout(delay, 300);
			}
		}

		function show(){
			$(".peeklabel").collapse("show");
		}

		function delay(){
			document.getElementById("sider").style.width = "100px";
			document.getElementById("OSB").value = 0;
		}

		function delayform(){
			$(".peeksubform").collapse("hide");
			document.getElementById("FSB").value = 0;
		}
	</script>';
	// SCRIPT END

		if(isset($_GET["profilepage"])){
			$redirect_print = $_SERVER['PHP_SELF'].'?printpage='.$_GET["profilepage"];
			$print_action = " Print Preview ";
		}else if(isset($_GET["printpage"])){
			$print_action = " Print ";
		}else{
			echo '<script>
			 $(document).ready(function () {
        $("#go_print").hide();
    }); </script>';
		}

	// HEADER
	echo
	'<div class="container" id="headlogo" style="transition: 0.5s; background: linear-gradient(to bottom right, rgba(92, 184, 92, 0.9) 40%, rgba(92, 184, 92, 0) 110%); padding: 10px; width: calc(100% - 100px); height:60px; margin-left:100px; margin-bottom: 10px; min-width: 950px;">
		<a href="Home.php">
		<div >
			<img style="float:left; height:40px; margin-left:15px; opacity:0.9;" src="images/luke_logo.bmp">
			<p style="float:left; font-size:16pt; color:#ffffff; margin: 5px 20px;"> LUKE FOUNDATION, INC. </p>
		</div>
		</a>
		<div style="float:right;">';

			echo'<button role="button" class="btn btn-default" id="go_print" style="margin-right:10px; border: none;"><span class="fa fa-print" style="font-size:20px;"></span>'.$print_action.'</button>';
		echo '</div>
	</div>';
	// HEADER END

	if(isset($_GET["profilepage"])){
			echo '<script>
						$("#go_print").click(function() {
	   		 document.location.href= "'.$redirect_print.'";
						}); </script>';
		}else	if(isset($_GET["printpage"])){
			echo '<script>
						$("#go_print").click(function() {
	   		 window.print();
						}); </script>';
		}

?>
