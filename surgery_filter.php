<?php
	$leftmargin1 = 200;

	// BUTTION
	echo '<div class="row" id="criteria_buttons">';
		//REVERT
		$where = "'surgery.php'";
		echo '<div style="float: right; margin: 0px 30px 10px 0px;"><button type="button" class="btn" id="go" onclick="location.href='.$where.'" ><span class="fa fa-reply" style="font-size:16px; margin-right:5px;"></span>Revert</button></div>'; //REVERT END

		// FILTER
		echo '<div style="float: right; margin: 0px 10px 10px 0px;"><button type="button" class="btn" data-toggle="collapse" data-target="#upper" id="go" ><span class="fa fa-filter" style="font-size:16px; margin-right:5px;"></span>New Filter</button></div>'; //FILTER END

		// SEARCH
		echo '<div style="float: right; margin: 0px 10px 10px 0px;"><button type="button" class="btn" data-toggle="collapse" data-target="#upper1" id="go" ><span class="fa fa-search" style="font-size:16px; margin-right:5px;"></span>Search</button></div>'; //SEARCH END

	echo '</div>';
	// BUTTON END

	// SEARCH SECTION
	echo '<div class="container-fluid" style="margin-bottom: 0px;" id="search_record">
			<div class="panel panel-default collapse" style="padding: 0px;" id="upper1">
				<div class="panel-body">
					<form class="navbar-form navbar-center" role="search" style="text-align:center;">
						<div class="container-fluid" >
							<div class="form-group">
								<input class="form-control" type="text" id="dataseek" placeholder="Type in a keyword..." maxlength="36" style="width: 300px; ">
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>';
	// SEARCH SECTION END

	// FILTER SECTION
	echo 
	'<div class="container-fluid" style="margin-bottom: 10px;" id="filter">
		<form method="post" action="surgery.php">
			<div class="panel panel-default collapse" style="padding: 0px;" id="upper">
				<div class="panel-body" style="padding:10px;">';
					// TIME FILTER
	echo			'<div class="form-group row" style="margin: 5px; margin-bottom:10px;">
						<label style="width: 20%; float:left;">Surgery Date</label>
						<div>
							<label class="sr-only" for="FSS">Sequence</label>
							<select class="form-control"  name="FSS" style="width: 90px; float: left; margin-right:20px;">
								<option value="<" > before </option>
								<option value="=" selected> on </option>
								<option value=">" > after </option>
							</select>
						</div>
						<div>
							<label class="sr-only" for="FMM">Month</label>
							<select class="form-control"  name="FMM" style="width: 120px; float: left; margin-right:10px;">
								<option value=""> -Month- </option>';
								for ($j=0; $j < count($MONTH_choice); $j++) {
									echo '<option value="'.($j+1).'">'.$MONTH_choice[$j].'</option>';
								}
	echo					'</select>
						</div>
						<div style="width: 50px; float: left; margin-right:10px;">
							<label class="sr-only" for="FDD">Day</label>
							<input pattern="\d||[0-2]\d|3[0-1]|" title="" class="form-control" placeholder="DD" maxlength="'.$SURG_DATE_DD.'" name="FDD">
						</div>
						<div style="width: 70px; float: left; margin-right:10px;">
							<label class="sr-only" for="FYY">Year</label>
							<input pattern="[1-2]\d\d\d" title="" class="form-control" placeholder="YYYY" maxlength="'.$SURG_DATE_YY.'" name="FYY">
						</div>
					</div>';
					// TIME FILTER END

					// DOCTOR LICENSE FILTER
	echo			'<div class="form-group row" style="margin: 5px; margin-bottom:10px;">
						<label for="FSL" style="float:left; width:20%;">Doctor </label>
						<div>
							<div style="width: 225px; float: left; margin-right:10px;">
							<input pattern="^(([a-zA-Z](\w*)[ ][a-zA-Z](\w*)[ ][-][ ])*)(\d{5,7}$)" title="License No. (0000000-9999999) or Name and License (Firstname Surname - License no.)" class="form-control typeahead tt-query" autocomplete="off" id="FSL" maxlength="50" name="FSL" placeholder="Doctor Name or License">
							</div>
							<div style="width: 20px; float: left; margin-right:10px;"><span> as </span></div>
							<div style="width:150px; float: left;">
							<label class="sr-only" for="doc_role">Role</label>
							<select class="form-control"  name="DR" style="width: 100%; float: left; margin-right:10px;">
								<option value="any"> any </option>
								<option value="Surgeon"> Surgeon </option>
								<option value="Internist"> Internist </option>
								<option value="Anesthesiologist"> Anesthesiologist </option>
							</select>
						</div>
						</div>
					</div>';
				// DOCTOR LICENSE FILTER END

				// PATIENT FILTER
					echo			'<div class="form-group row" style="margin: 5px; margin-bottom:10px;">
						<label for="FCI" style="float:left; width:20%;">Patient </label>
						<div>
							<div style="width: 225px; float: left; margin-right:10px;">
								<input class="form-control typeahead1 tt-query" autocomplete="off" id="FCI" maxlength="50" name="FCI" placeholder="Patient Name or ID">
							</div>
						</div>
						</div>
				</div>';
				//PATIENT FILTER END

	echo		'<div class="panel-footer text-center" style="padding:0px;">
					<button class="btn" id="go" style="width:100%; height: 100%; padding: 10px; border-color:#f2f2f2;" name="filter_check" type="submit">
						Filter Records
					</button>
				</div>
			</div>';
	echo '</form>
	</div>';
	// FILTER END
?>
