<?php
	$leftmargin1 = 200;
	$SPEC_choice = array('Select specialization', 'Pediatrician','Opthalmologist','Anesthesiologist','Surgeon','Internist');

	// BUTTION
	echo '<div class="row" id="criteria_buttons">';

	//REVERT
	$where = "'doctors.php'";
	echo '<div style="float: right; margin: 0px 30px 10px 0px;"><button type="button" class="btn" id="go" onclick="location.href='.$where.'" ><span class="fa fa-reply" style="font-size:16px; margin-right:5px;"></span>Revert</button></div>'; //REVERT END

	// FILTER
	echo '<div style="float: right; margin: 0px 10px 10px 0px;"><button type="button" class="btn" data-toggle="collapse" data-target="#upper" id="go" ><span class="fa fa-check-square-o" style="font-size:16px; margin-right:5px;"></span>New Filter</button></div>'; //FILTER END

	// SEARCH
	echo '<div style="float: right; margin: 0px 10px 10px 0px;"><button type="button" class="btn" data-toggle="collapse" data-target="#upper1" id="go" ><span class="fa fa-search" style="font-size:16px; margin-right:5px;"></span>Search</button></div>'; //SEARCH END


	echo '</div>';
	// BUTTON END
	
	// SEARCH SECTION
	echo '<div class="container-fluid" style="margin-bottom: 0px;" id="search_record">';
	echo 	'<div class="panel panel-default collapse" style="padding: 0px;" id="upper1">
				<div class="panel-body">
					
						<div class="container-fluid" style="width:350px;">
							<div class="form-group" style="float:left;">
								<input class="form-control" type="text" id="dataseek" placeholder="Type in a keyword..." maxlength="36" style="width: 300px; ">
								</input>
							</div>
						</div>
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

				// DOCTOR LICENSE FILTER
	echo			'<div class="form-group row" style="margin: 5px; margin-bottom:10px;">
						<label for="FSL" style="float:left; width:30%;">Specialization </label>
						<div>
							<div style="width:200px; float: left;">
							<label class="sr-only" for="FSC">Role</label>
							<select class="form-control" id="FSC" name="FSC" style="width: 100%; float: left; margin-right:10px;">';
							for ($spec=0; $spec < sizeof($SPEC_choice); $spec++) { 
								if($spec==0){
									echo '<option value = "">-Select specialization-</option>';
								}else{
									echo '<option value = "'.$SPEC_choice[$spec].'">'.$SPEC_choice[$spec].'</option>';
								}
							}
	echo '</select>
						</div>
						</div>
					</div>';
				// DOCTOR LICENSE FILTER END	

	echo		 	'</div>
					<div class="panel-footer text-center" style="padding:0px;">
						<button class="btn" id="go" style="width:100%; height: 100%; padding: 10px; border-color:#f2f2f2;" name="filter_check" type="submit"> Filter Records </button>
					</div>
				</div>
			</form>
		</div>';
	// FILTER END

?>
