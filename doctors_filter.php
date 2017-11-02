<?php
	$leftmargin1 = 200;

	// BUTTION
	echo '<div class="row" id="criteria_buttons">';

	//REVERT
	$where = "'doctors.php'";
	echo '<div style="float: right; margin: 0px 30px 10px 0px;"><button type="button" class="btn" id="go" onclick="location.href='.$where.'" >Revert</button></div>'; //REVERT END

	// FILTER
	echo '<div style="float: right; margin: 0px 10px 10px 0px;"><button type="button" class="btn" data-toggle="collapse" data-target="#upper" id="go" >New Filter</button></div>'; //FILTER END

	// SEARCH
	echo '<div style="float: right; margin: 0px 10px 10px 0px;"><button type="button" class="btn" data-toggle="collapse" data-target="#upper1" id="go" >Search</button></div>'; //SEARCH END

	echo '</div>';
	// BUTTON END
	
	// SEARCH SECTION
	echo '<div class="container-fluid" style="margin-bottom: 0px;" id="search_record">';
	echo 	'<div class="panel panel-default collapse" style="padding: 0px;" id="upper1">
				<div class="panel-body">
					<form class="navbar-form navbar-center" role="search" style="text-align:center;">
						<div class="container-fluid" style="width:350px;">
							<div class="form-group" style="float:left;">
								<input type="text" class="form-control" style="width:200px;" placeholder="Type in a keyword..." maxlength="36" name="search_record">
							</div>
							<button type="submit" class="btn btn-default" id="go" style="float:left;">
								<span class="fa fa-search" style="font-size:15px;"></span> Search
							</button>
						</div>
					</form>
				</div>
			</div>
		</div>';
	// SEARCH END

	// FILTER SECTION
	echo 
		'<div class="container-fluid" style="margin-bottom: 10px;" id="filter">
			<form method="post" action="doctors.php">
				<div class="panel panel-default collapse" style="padding: 0px;" id="upper">
					<div class="panel-body" style="padding:10px;">';
	echo 'Some Other Filter';
	echo		 	'</div>
					<div class="panel-footer text-center" style="padding:0px;">
						<button class="btn" id="go" style="width:100%; height: 100%; padding: 10px; border-color:#f2f2f2;" name="filter_check" type="submit"> Filter Records </button>
					</div>
				</div>
			</form>
		</div>';
	// FILTER END

?>
