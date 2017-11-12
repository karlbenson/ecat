<!DOCTYPE html>

<html>
    <head>
        <title>Download File</title>
    </head>
    <body>
		<?php
			include("dbconnect.php");
			
			if(isset($_POST["downloadDoctors"])){
				$D_query = "SELECT * FROM DOCTOR ORDER BY LAST_NAME ASC";
				$columns = array("Licence", "First Name", "Last Name", "Address", "Specialization");
				$output = $mydatabase->query($D_query);
				if ($output->num_rows > 0) {
					echo '<table hidden><tr>';
					
					foreach($columns as $item){
						echo '<th style="color:#ffffff">'.$item.'</th>';
					}
					echo '</tr>';
					
					while($row = $output->fetch_assoc()) { 
						echo 	'<tr>
									// <td>'.$row["DOC_LICENSE_NUM"].'</td>
									<td>'.$row["FIRST_NAME"].'</td>
									<td>'.$row["LAST_NAME"].'</td>
									<td>'.$row["ADDRESS"].'</td>
									<td>'.$row["SPECIALIZATION"].'</td>
								</tr>';
					}				
					echo 	'</table>';
				} else { echo "No Records."; }
			}else if(isset($_POST["downloadPatients"])){
				$D_query = "SELECT * FROM EYEPATIENT ORDER BY PAT_LNAME ASC";
				$columns = array("First Name", "Last Name", "Age", "Has PhilHealth?", "Sex",
					"Pre VA Right Eye w/o Spect",
					"Pre VA Right Eye w/ Spect",
					"Pre VA Left Eye w/o Spect",
					"Pre VA Left Eye w/ Spect",
					"Post VA Right Eye w/o Spect",
					"Post VA Right Eye w/ Spect",
					"Post VA Left Eye w/o Spect",
					"Post VA Left Eye w/ Spect",
					"Visual Disability", "Disability Cause", "Right Eye Diagnosis",
					"Left Eye Diagnosis","Procedure To do");
				$output = $mydatabase->query($D_query);
				if ($output->num_rows > 0) {
					echo '<table hidden><tr>';
					
					foreach($columns as $item){
						echo '<th style="color:#ffffff">'.$item.'</th>';
					}
					echo '</tr>';
					
					while($row = $output->fetch_assoc()) { 
						echo 	'<tr>
									<td>'.$row["PAT_FNAME"].'</td>
									<td>'.$row["PAT_LNAME"].'</td>
									<td>'.$row["PAT_AGE"].'</td>
									<td>'.$row["PAT_PH"].'</td>
									<td>'.$row["PAT_SEX"].'</td>
									<td>'.$row["PRE_VA_NO_SPECT_RIGHT"].'</td>
									<td>'.$row["PRE_VA_WITH_SPECT_RIGHT"].'</td>
									<td>'.$row["PRE_VA_NO_SPECT_LEFT"].'</td>
									<td>'.$row["PRE_VA_WITH_SPECT_LEFT"].'</td>
									<td>'.$row["POST_VA_NO_SPECT_RIGHT"].'</td>
									<td>'.$row["POST_VA_WITH_SPECT_RIGHT"].'</td>
									<td>'.$row["POST_VA_NO_SPECT_LEFT"].'</td>
									<td>'.$row["POST_VA_WITH_SPECT_LEFT"].'</td>
									<td>'.$row["VISUAL_DISABILITY"].'</td>
									<td>'.$row["DISABILITY_CAUSE"].'</td>
									<td>'.$row["RIGHT_DIAGNOSIS"].'</td>
									<td>'.$row["LEFT_DIAGNOSIS"].'</td>
									<td>'.$row["PROCEDURE_TO_DO"].'</td>
								</tr>';
					}				
					echo 	'</table>';
				} else { echo "No Records."; }
			}else if(isset($_POST["downloadSurgeries"])){
				$D_query = "SELECT s.*, p.PAT_FNAME, p.PAT_LNAME, d.LAST_NAME AS ANES
							FROM SURGERY s, EYEPATIENT p, DOCTOR d
							WHERE p.PAT_ID_NUM = s.PAT_ID_NUM
							AND s.ANESTHESIOLOGIST = d.DOC_LICENSE_NUM
							ORDER BY CASE_NUM ASC";
				$columns = array("Case No.", "Date", "Patient", "Surgeon", "Location", "Visual Imparity",
					"Medical History", "Right Eye Diagnosis", "Left Eye Diagnosis", "Type of Anesthesia",
					"Remarks", "Anesthesiologist", "Internist", "IOL Power", "PC IOL", "PC LAB", "PC PF",
					"SPONSORED IOL", "Other sponsor", "CSF Hospital Bill", "CSF Supplies", "CSF Lab",
					"NDDCH RA", "NDDCH ZEISS", "NDDCH Supplies", "LF Patient Fee", "LF CPC Fee");
				$output = $mydatabase->query($D_query);
				
			
				if ($output->num_rows > 0) {
					echo '<table hidden><tr>';
					
					foreach($columns as $item){
						echo '<th style="color:#ffffff">'.$item.'</th>';
					}
					echo '</tr>';
					
					while($row = $output->fetch_assoc()) { 
						echo 	'<tr>
									<td>'.$row["CASE_NUM"].'</td>
									<td>'.$row["SURG_DATE"].'</td>
									<td>'.$row["PAT_FNAME"].' '.$row["PAT_LNAME"].'</td>';
									
									$surg1 = $row["SURG_LICENSE_NUM"];
									$surg2 = $row["SURG_LICENSE_NUM1"];
									$surg3 = $row["SURG_LICENSE_NUM2"];
									$output1 = $mydatabase->prepare("SELECT LAST_NAME FROM DOCTOR
										WHERE DOC_LICENSE_NUM='$surg1'
										OR DOC_LICENSE_NUM='$surg2'
										OR DOC_LICENSE_NUM='$surg3'");
									$output1->execute();
									$line = $output1->get_result();
									
									echo '<td>';
									$count = 0;
									while($dataline = $line->fetch_assoc()){
										if($count > 0){
											echo '; ';
										}
										echo 'Dr. '.$dataline["LAST_NAME"];
										$count += 1;
									}
									echo '</td>';
									
						echo		'<td>'.$row["SURG_ADDRESS"].'</td>
									<td>'.$row["VISUAL_IMPARITY"].'</td>
									<td>'.$row["MED_HISTORY"].'</td>
									<td>'.$row["RIGHT_DIAGNOSIS"].'</td>
									<td>'.$row["LEFT_DIAGNOSIS"].'</td>
									<td>'.$row["SURG_ANESTHESIA"].'</td>
									<td>'.$row["REMARKS"].'</td>
									<td>Dr. '.$row["ANES"].'</td>';
									
									$inter1 = $row["INTERNIST"];
									$inter2 = $row["INTERNIST1"];
									$inter3 = $row["INTERNIST2"];
									$output1 = $mydatabase->prepare("SELECT LAST_NAME FROM DOCTOR
										WHERE DOC_LICENSE_NUM='$inter1'
										OR DOC_LICENSE_NUM='$inter2'
										OR DOC_LICENSE_NUM='$inter3'");
									$output1->execute();
									$line = $output1->get_result();
									
									echo '<td>';
									$count = 0;
									while($dataline = $line->fetch_assoc()){
										if($count > 0){
											echo '; ';
										}
										echo 'Dr. '.$dataline["LAST_NAME"];
										$count += 1;
									}
									echo '</td>';
									
						echo		'<td>'.$row["IOLPOWER"].'</td>
									<td>'.$row["PC_IOL"].'</td>
									<td>'.$row["PC_LAB"].'</td>
									<td>'.$row["PC_PF"].'</td>
									<td>'.$row["SPO_IOL"].'</td>
									<td>'.$row["SPO_OTHERS"].'</td>
									<td>'.$row["CSF_HBILL"].'</td>
									<td>'.$row["CSF_SUPPLIES"].'</td>
									<td>'.$row["CSF_LAB"].'</td>
									<td>'.$row["NDDCH_RA"].'</td>
									<td>'.$row["NDDCH_ZEISS"].'</td>
									<td>'.$row["NDDCH_SUPPLIES"].'</td>
									<td>'.$row["LF_PF"].'</td>
									<td>'.$row["LF_CPC"].'</td>
								</tr>';
					}				
					echo 	'</table>';
				} else { echo "No Records."; }
			}
			
			
			
			
		?>

<script>
	function downloadCSV(csv, filename) {
		var csvFile;
		var downloadLink;

		// CSV file
		csvFile = new Blob([csv], {type: "text/csv"});

		// Download link
		downloadLink = document.createElement("a");

		// File name
		downloadLink.download = filename;

		// Create a link to the file
		downloadLink.href = window.URL.createObjectURL(csvFile);

		// Hide download link
		downloadLink.style.display = "none";

		// Add the link to DOM
		document.body.appendChild(downloadLink);

		// Click download link
		downloadLink.click();
	}
	
		var csv = [];
		var rows = document.querySelectorAll("table tr");
		
		for (var i = 0; i < rows.length; i++) {
			var row = [], cols = rows[i].querySelectorAll("td, th");
			
			for (var j = 0; j < cols.length; j++) 
				row.push(cols[j].innerText);
			
			csv.push(row.join(","));        
		}
		// Download CSV file
		downloadCSV(csv.join("\n"), Math.floor((Math.random() * 9999999999) + 1000000000) + ".csv" );
		window.history.back();
</script> 

    </body>
</html>
