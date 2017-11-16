<?php
	$leftmargin1 = 200;

	// BUTTION
	echo '<div class="row" id="criteria_buttons">';
	
	// DOWNLOAD
	echo '<form method="post" action="excel.php?table=patient"><div style="float: right; margin: 0px 10px 10px 0px;"><button type="submit" class="btn" id="go" name="downloadPatients" ><span class="fa fa-download" style="font-size:16px;"></span></button></div></form>'; //DOWNLOAD END

	//REVERT
	$where = "'patient.php'";
	echo '<div style="float: right; margin: 0px 10px 10px 0px;"><button type="button" class="btn" id="go" onclick="location.href='.$where.'" ><span class="fa fa-reply" style="font-size:16px; margin-right:5px;"></span>Revert</button></div>'; //REVERT END

	// FILTER
	echo '<div style="float: right; margin: 0px 10px 10px 0px;"><button type="button" class="btn" data-toggle="collapse" data-target="#upper" id="go"><span class="fa fa-filter" style="font-size:16px; margin-right:5px;"></span>New Filter</button></div>'; //FILTER END

	// SEARCH
	echo '<div style="float: right; margin: 0px 10px 10px 0px;"><button type="button" class="btn" data-toggle="collapse" data-target="#upper1" id="go"><span class="fa fa-search" style="font-size:16px; margin-right:5px;"></span>Search</button></div>'; //SEARCH END

	echo '</div>';
	// BUTTON END
	
	// SEARCH SECTION
	echo '<div class="container-fluid" style="margin-bottom: 0px;" id="search_record">';
	echo 	'<div class="panel panel-default collapse" style="padding: 0px;" id="upper1">
				<div class="panel-body">
					<form class="navbar-form navbar-center" role="search" style="text-align:center;">
						<div class="container-fluid">
							<div class="form-group">
								<input class="form-control" type="text" id="dataseek" placeholder="Type in a keyword..." maxlength="36" style="width: 300px;">
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>';
	// SEARCH END

	// FILTER SECTION
	echo 
		'<div class="container-fluid" style="margin-bottom: 10px;" id="filter">
			<form method="post" action="patient.php">
				<div class="panel panel-default collapse" style="padding: 0px;" id="upper">
					<div class="panel-body" style="padding:10px;">';

 echo '<div class="">';
	echo '<div style="float: left; width:50%; padding-left:10px;">';

						// PHYSICIAN LICENSE FILTER
	echo				'<div class="form-group row" style="margin: 5px; margin-bottom:10px;">
							<label for="FPL" style="float:left; width:35%; ">Examined by: </label>
							<div>
							 <div style="width: 225px; float: left; margin-right:10px;">
								<input pattern="^(([a-zA-Z](\w*)[ ][a-zA-Z](\w*)[ ][-][ ])*)(\d{5,7}$)" title="License No. (0000000-9999999) or Name and License (Firstname Surname - License no.)" class="form-control typeahead tt-query" autocomplete="off" id="FPL" maxlength="50" name="FPL" placeholder="Physician Name or License">
								</div>
							</div>
						</div>';
						// PHYSICIAN LICENSE FILTER END

						// STAFF LICENSE FILTER
	echo				'<div class="form-group row" style="margin: 5px; margin-bottom:10px;">
							<label for="FSI" style="float:left; width:35%;">Screened by: </label>
							<div>
							 <div style="width: 225px; float: left; margin-right:10px;">
								<input pattern="^(([a-zA-Z](\w*)[ ][a-zA-Z](\w*)[ ][-][ ])*)(\d{5,7}$)" class="form-control" autocomplete="off" id="FSI" maxlength="50" name="FSI" placeholder="Staff Name or License/ID">
								</div>
							</div>
						</div>';
						// STAFF LICENSE FILTER END

	echo '</div>';
	echo '<div style="float: left; width:50%; padding: 0px 10px;">
								<div class="well" style="width:100%; float:left; padding:10px;">';

						// PHILHEALTH FILTER
	echo				'<div class="form-group row" style="margin: 5px;">
							<label for="FPH" style="float:left; width: 150px;">Has PhilHealth? </label>
							 <div style="width: 120px; float: left; margin-right:10px;">';
											echo '<label class="radio-inline"><input id="FPH" name="FPH" type="radio" value="Y" >Yes</label>';
											echo '<label class="radio-inline"><input id="FPH" name="FPH" type="radio" value="N" >No</label>';
									echo '</div>
							</div>';
						// PHILHEALTH FILTER END

						// PHILHEALTH FILTER
	echo				'<div class="form-group row" style="margin: 5px;">
							<label for="FSX" style="float:left; width: 150px;">Sex </label>
							 <div style="width: 150px; float: left; margin-right:10px;">';
											echo '<label class="radio-inline"><input id="FSX" name="FSX" type="radio" value="M" >Male</label>';
											echo '<label class="radio-inline"><input id="FSX" name="FSX" type="radio" value="F" >Female</label>';
									echo '</div>
							</div>';
						// PHILHEALTH FILTER END

	echo '</div></div>';
	echo '</div>';

	echo		 	'</div>
					<div class="panel-footer text-center" style="padding:0px;">
						<button class="btn" id="go" style="width:100%; height: 100%; padding: 10px; border-color:#f2f2f2;" name="filter_check" type="submit"> Filter Records </button>
					</div>
				</div>
			</form>
		</div>';
	// FILTER END

?>
