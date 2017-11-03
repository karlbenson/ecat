<?php
	$surgeon = $mydatabase->query("SELECT FIRST_NAME,LAST_NAME,DOC_LICENSE_NUM from DOCTOR");
 $arr = array();
 
 while ($row = $surgeon->fetch_assoc()) {
  unset($id, $name1, $name2);
  $id = $row['FIRST_NAME']." ".$row['LAST_NAME']." - ".$row['DOC_LICENSE_NUM'];
  array_push($arr, $id);
 }

	echo '<script>
	$(document).ready(function(){
		var arrs='.json_encode($arr).';
		var arrs = new Bloodhound({
			datumTokenizer: Bloodhound.tokenizers.whitespace,
			queryTokenizer: Bloodhound.tokenizers.whitespace,
			local: arrs
	});
		
	$(".typeahead").typeahead(
		{	hint: true, highlight: true, minLength: 1	},
		{	name: "arrs", source: arrs });
	});

</script>';

?>

