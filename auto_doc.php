
<?php
    $surgeon = $mydatabase->query("SELECT FIRST_NAME,LAST_NAME,DOC_LICENSE_NUM from DOCTOR");
    $arr = array();
    
    while ($row = $surgeon->fetch_assoc()) {
        unset($id, $name1, $name2);
        $id = $row['DOC_LICENSE_NUM']." - ".$row['FIRST_NAME']." ".$row['LAST_NAME'];
        array_push($arr, $id);
    }
				
	$patient = $mydatabase->query("SELECT PAT_FNAME,PAT_LNAME,PAT_ID_NUM from EYEPATIENT");
    $arr1 = array();
    
    while ($row = $patient->fetch_assoc()) {
		unset($id, $name1, $name2);
        $id = $row['PAT_ID_NUM']." - ".$row['PAT_FNAME']." ".$row['PAT_LNAME'];
        array_push($arr1, $id);    
	}

	$staff = $mydatabase->query("SELECT * from STAFF");
    $arr2 = array();
    
    while ($row = $staff->fetch_assoc()) {
        $id = $row["STAFF_LICENSE_NUM"]." - ".$row['STAFF_FNAME']." ".$row['STAFF_LNAME'];
        array_push($arr2, $id);    
	}


echo '<script type="text/javascript">
	$(document).ready(function(){
		var arrs='.json_encode($arr).';
		var arrs = new Bloodhound({
			datumTokenizer: Bloodhound.tokenizers.whitespace,
			queryTokenizer: Bloodhound.tokenizers.whitespace,
			local: arrs
		});
		
		$(".typeahead").typeahead({
			hint: true, highlight: true, minLength: 1 },
		{
			name: "arrs", source: arrs
		});
	});

	$(document).ready(function(){
		var arrs= '.json_encode($arr1).';
		var arrs = new Bloodhound({
			datumTokenizer: Bloodhound.tokenizers.whitespace,
			queryTokenizer: Bloodhound.tokenizers.whitespace,
			local: arrs
		});
		
		// Initializing the typeahead
		$(".typeahead1").typeahead({
			hint: true, highlight: true, minLength: 1 },
		{
			name: "arrs", source: arrs
		});
	});

	$(document).ready(function(){
		var arrs= '.json_encode($arr2).';
		var arrs = new Bloodhound({
			datumTokenizer: Bloodhound.tokenizers.whitespace,
			queryTokenizer: Bloodhound.tokenizers.whitespace,
			local: arrs
		});
		
		// Initializing the typeahead
		$(".typeahead2").typeahead({
			hint: true, highlight: true, minLength: 1 },
		{
			name: "arrs", source: arrs
		});
	});

</script>';

?>
