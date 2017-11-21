<?php
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
date_default_timezone_set('Europe/London');
if (PHP_SAPI == 'cli')
	die('This example should only be run from a Web Browser');
/** Include PHPExcel */
require_once dirname(__FILE__) . '\PHPExcel.php';
// Create new PHPExcel object
$objPHPExcel = new PHPExcel();
// Set document properties
$objPHPExcel->getProperties()->setCreator("Luke Foundation Inc.")
							 ->setLastModifiedBy("Luke Foundation Inc.")
							 ->setTitle("Office 2007 XLSX Test Document")
							 ->setSubject("Office 2007 XLSX Test Document")
							 ->setDescription("Document for Office 2007 XLSX, generated using PHP classes.")
							 ->setKeywords("office 2007 openxml php")
							 ->setCategory("Test result file");
// Add some data
	include("dbconnect.php");
	if(isset($_GET["startdate"])&&isset($_GET["enddate"])){
		$currmonth=explode("-", $_GET["enddate"])[1];
		$curryear=explode("-", $_GET["enddate"])[0];
		$prevmonth=explode("-", $_GET["startdate"])[1];
		if(isset($_GET["gen"])){
			if($_GET["gen"]=="y"){
				$S_query = "SELECT * FROM SURGERY s, DOCTOR d, EYEPATIENT p WHERE s.SURG_LICENSE_NUM = d.DOC_LICENSE_NUM AND p.PAT_ID_NUM = s.PAT_ID_NUM AND s.SURG_ANESTHESIA='General' ORDER by s.SURG_DATE desc";
				$fname = "General";
			}else if($_GET["gen"]=="n"){
				$S_query = "SELECT * FROM SURGERY s, DOCTOR d, EYEPATIENT p WHERE s.SURG_LICENSE_NUM = d.DOC_LICENSE_NUM AND p.PAT_ID_NUM = s.PAT_ID_NUM AND s.SURG_ANESTHESIA='Local' ORDER by s.SURG_DATE desc";
				$fname = "Local";
			}
		}else if(isset($_GET["ph"])){
			if($_GET["ph"]=="y"){
				$S_query = "SELECT * FROM SURGERY s, DOCTOR d, EYEPATIENT p WHERE s.SURG_LICENSE_NUM = d.DOC_LICENSE_NUM AND p.PAT_ID_NUM = s.PAT_ID_NUM AND p.PAT_PH='Y' ORDER by s.SURG_DATE desc";
				$fname = "WPhilHealth";
			}else if($_GET["ph"]=="n"){
				$S_query = "SELECT * FROM SURGERY s, DOCTOR d, EYEPATIENT p WHERE s.SURG_LICENSE_NUM = d.DOC_LICENSE_NUM AND p.PAT_ID_NUM = s.PAT_ID_NUM AND p.PAT_PH='N' ORDER by s.SURG_DATE desc";
				$fname = "WOPhilHealth";
			}
		}else if(isset($_GET["proc"])){
				$S_query = "SELECT * FROM SURGERY s, DOCTOR d, EYEPATIENT p WHERE s.SURG_LICENSE_NUM = d.DOC_LICENSE_NUM AND p.PAT_ID_NUM = s.PAT_ID_NUM AND s.PROCEDURE_TO_DO='".$_GET["proc"]."' AND SURG_DATE BETWEEN '".$curryear."-".$prevmonth."-1' AND '".$curryear."-".$currmonth."-31' ORDER by s.SURG_DATE desc";
				$fname = $_GET["proc"];
		}
		$output = $mydatabase->query($S_query);
		$objPHPExcel->setActiveSheetIndex(0)
		            ->setCellValue('A1', 'Case No.')
		            ->setCellValue('B1', 'Patient')
		            ->setCellValue('C1', 'IOL')
		            ->setCellValue('D1', 'Lab')
		            ->setCellValue('E1', 'Prof. Fee')
		            ->setCellValue('F1', 'Total PC')
		            ->setCellValue('G1', 'Spons. IOL')
		            ->setCellValue('H1', 'Other Spons.')
		            ->setCellValue('I1', 'Total Spons.')
		            ->setCellValue('J1', 'Hosp. Bill')
		            ->setCellValue('K1', 'Supplies')
		            ->setCellValue('L1', 'Lab')
		            ->setCellValue('M1', 'Total CSF')
		            ->setCellValue('N1', 'NDDCH RA')
		            ->setCellValue('O1', 'NDDCH ZEISS')
		            ->setCellValue('P1', 'NDDCH Total')
		            ->setCellValue('Q1', 'Total');
		    $i=2;
		    $PC_COL_SUM = 0;
			$CSF_COL_SUM = 0;
			$ROW_COL_SUM = 0;
			$SPO_COL_SUM = 0;
			$NDDCH_COL_SUM = 0;
			while($dataline = $output->fetch_assoc()) { 
				$PC_SUM = $dataline["PC_IOL"]+$dataline["PC_LAB"]+$dataline["PC_PF"]+0.0;
				$CSF_SUM = $dataline["CSF_HBILL"]+$dataline["CSF_SUPPLIES"]+$dataline["CSF_LAB"]+0.0;
				$ROW_SUM = $CSF_SUM+$PC_SUM+$dataline["SPO_IOL"]+0.0;
				$SPO_SUM = $dataline["SPO_IOL"]+$dataline["SPO_OTHERS"];
				$NDDCH_SUM = $dataline["NDDCH_ZEISS"]+$dataline["NDDCH_RA"];
				$PC_COL_SUM = $PC_COL_SUM+$PC_SUM;
				$SPO_COL_SUM = $SPO_COL_SUM+$SPO_SUM;
				$CSF_COL_SUM = $CSF_COL_SUM+$CSF_SUM;
				$ROW_COL_SUM = $ROW_COL_SUM+$ROW_SUM;
				$NDDCH_COL_SUM = $NDDCH_COL_SUM+$NDDCH_SUM;	
				$objPHPExcel->setActiveSheetIndex(0)
		            ->setCellValue('A'.$i, ''.$dataline["CASE_NUM"])
		            ->setCellValue('B'.$i, ''.$dataline["PAT_FNAME"].' '.$dataline["PAT_LNAME"])	
		            ->setCellValue('C'.$i, ''.number_format($dataline["PC_IOL"], "2"))
		            ->setCellValue('D'.$i, ''.number_format($dataline["PC_LAB"], "2"))
		            ->setCellValue('E'.$i, ''.number_format($dataline["PC_PF"], "2"))
		            ->setCellValue('F'.$i, ''.number_format($PC_SUM, "2"))
		            ->setCellValue('G'.$i, ''.number_format($dataline["SPO_IOL"], "2"))
		            ->setCellValue('H'.$i, ''.number_format($dataline["SPO_OTHERS"], "2"))
		            ->setCellValue('I'.$i, ''.number_format($SPO_SUM, "2"))
		            ->setCellValue('J'.$i, ''.number_format($dataline["CSF_HBILL"], "2"))
		            ->setCellValue('K'.$i, ''.number_format($dataline["CSF_SUPPLIES"], "2"))
		            ->setCellValue('L'.$i, ''.number_format($dataline["CSF_LAB"], "2"))
		            ->setCellValue('M'.$i, ''.number_format($CSF_SUM, "2"))
		            ->setCellValue('N'.$i, ''.number_format($dataline["NDDCH_RA"], "2"))
		            ->setCellValue('O'.$i, ''.number_format($dataline["NDDCH_ZEISS"], "2"))
		            ->setCellValue('P'.$i, ''.number_format($NDDCH_SUM, "2"))
		            ->setCellValue('Q'.$i, ''.number_format($ROW_SUM, "2"));
		        $i++;
			}
			$objPHPExcel->setActiveSheetIndex(0)
		            ->setCellValue('F'.$i, ''.number_format($PC_COL_SUM, "2"))
		            ->setCellValue('I'.$i, ''.number_format($SPO_COL_SUM, "2"))
		            ->setCellValue('M'.$i, ''.number_format($CSF_COL_SUM, "2"))
		            ->setCellValue('P'.$i, ''.number_format($NDDCH_COL_SUM, "2"))
		            ->setCellValue('Q'.$i, ''.number_format($ROW_COL_SUM, "2"));


	}else if(isset($_GET["table"])){
		if($_GET["table"]=="doctor"){
			$S_query = "SELECT * FROM DOCTOR";
			$output = $mydatabase->query($S_query);
			$objPHPExcel->setActiveSheetIndex(0)
			            ->setCellValue('A1', 'License Number')
			            ->setCellValue('B1', 'First Name')
			            ->setCellValue('C1', 'Last Name')
			            ->setCellValue('D1', 'Address')
			            ->setCellValue('E1', 'Specialization');
				    $i=2;
				while($dataline = $output->fetch_assoc()) { 
					$objPHPExcel->setActiveSheetIndex(0)
			            ->setCellValue('A'.$i, ''.$dataline["DOC_LICENSE_NUM"])
			            ->setCellValue('B'.$i, ''.$dataline["FIRST_NAME"])	
			            ->setCellValue('C'.$i, ''.$dataline["LAST_NAME"])
			            ->setCellValue('D'.$i, ''.$dataline["ADDRESS"])
			            ->setCellValue('E'.$i, ''.$dataline["SPECIALIZATION"]);
		        	$i++;
				}



		}else if($_GET["table"]=="patient"){
			$S_query = "SELECT * FROM DOCTOR d, EYEPATIENT p, STAFF f WHERE p.PHY_LICENSE_NUM = d.DOC_LICENSE_NUM AND p.STAFF_LICENSE_NUM = f.STAFF_LICENSE_NUM ORDER by p.PAT_LNAME desc";
			$output = $mydatabase->query($S_query);
			$objPHPExcel->setActiveSheetIndex(0)
			            ->setCellValue('A1', 'ID Number')
			            ->setCellValue('B1', 'First Name')
			            ->setCellValue('C1', 'Last Name')
			            ->setCellValue('D1', 'Age')
			            ->setCellValue('E1', 'Has Philhealth')
			            ->setCellValue('F1', 'Sex')
			            ->setCellValue('G1', 'Examined by')
			            ->setCellValue('H1', 'Screened')
			            ->setCellValue('I1', 'Left Pre VA with Spectacles')
			            ->setCellValue('J1', 'Right Pre VA with Spectacles')
			            ->setCellValue('K1', 'Left Pre VA without Spectacles')
			            ->setCellValue('L1', 'Right Pre VA without Spectacles')
			            ->setCellValue('M1', 'Left Post VA with Spectacles')
			            ->setCellValue('N1', 'Right Post VA with Spectacles')
			            ->setCellValue('O1', 'Left Post VA without Spectacles')
			            ->setCellValue('P1', 'Right Post VA without Spectacles')
			            ->setCellValue('Q1', 'Visual Impairment')
			            ->setCellValue('R1', 'Impairment Cause')
			            ->setCellValue('S1', 'Right Eye Diagnosis')
			            ->setCellValue('T1', 'Left Eye Diagnosis')
			            ->setCellValue('U1', 'Procedure to do');
				    $i=2;
					while($dataline = $output->fetch_assoc()) { 
						$objPHPExcel->setActiveSheetIndex(0)
				            ->setCellValue('A'.$i, ''.$dataline["PAT_ID_NUM"])
				            ->setCellValue('B'.$i, ''.$dataline["PAT_FNAME"])	
				            ->setCellValue('C'.$i, ''.$dataline["PAT_LNAME"])
				            ->setCellValue('D'.$i, ''.$dataline["PAT_AGE"])
				            ->setCellValue('E'.$i, ''.$dataline["PAT_PH"])
				            ->setCellValue('F'.$i, ''.$dataline["PAT_SEX"])
				            ->setCellValue('G'.$i, ''.$dataline["FIRST_NAME"].$dataline["LAST_NAME"])
				            ->setCellValue('H'.$i, ''.$dataline["STAFF_FNAME"].$dataline["STAFF_LNAME"])
				            ->setCellValue('I'.$i, ''.$dataline["PRE_VA_WITH_SPECT_LEFT"])
				            ->setCellValue('J'.$i, ''.$dataline["PRE_VA_WITH_SPECT_RIGHT"])
				            ->setCellValue('K'.$i, ''.$dataline["PRE_VA_NO_SPECT_LEFT"])
				            ->setCellValue('L'.$i, ''.$dataline["PRE_VA_NO_SPECT_RIGHT"])
				            ->setCellValue('M'.$i, ''.$dataline["POST_VA_WITH_SPECT_LEFT"])
				            ->setCellValue('N'.$i, ''.$dataline["POST_VA_WITH_SPECT_RIGHT"])
				            ->setCellValue('O'.$i, ''.$dataline["POST_VA_NO_SPECT_LEFT"])
				            ->setCellValue('P'.$i, ''.$dataline["POST_VA_NO_SPECT_RIGHT"])
				            ->setCellValue('Q'.$i, ''.$dataline["VISUAL_DISABILITY"])
				            ->setCellValue('R'.$i, ''.$dataline["DISABILITY_CAUSE"])
				            ->setCellValue('S'.$i, ''.$dataline["RIGHT_DIAGNOSIS"])
				            ->setCellValue('T'.$i, ''.$dataline["LEFT_DIAGNOSIS"])
				            ->setCellValue('U'.$i, ''.$dataline["PROCEDURE_TO_DO"]);
			        		$i++;
					}


		}else if($_GET["table"]=="surgery"){
			$S_query = "SELECT * FROM SURGERY s, DOCTOR d, EYEPATIENT p WHERE s.SURG_LICENSE_NUM = d.DOC_LICENSE_NUM AND p.PAT_ID_NUM = s.PAT_ID_NUM ORDER by s.SURG_DATE desc";	

			$output = $mydatabase->query($S_query);


			$objPHPExcel->setActiveSheetIndex(0)
		            ->setCellValue('A1', 'Case Number')
		            ->setCellValue('B1', 'Surgeon 1 Name')
		            ->setCellValue('C1', 'Surgeon 2 Name')
		            ->setCellValue('D1', 'Surgeon 3 Name')
		            ->setCellValue('E1', 'Patient Name')
		            ->setCellValue('F1', 'Visual Impairment')
		            ->setCellValue('G1', 'Medical History')
		            ->setCellValue('H1', 'Right Eye Diagnosis')
		            ->setCellValue('I1', 'Left Eye Diagnosis')
		            ->setCellValue('J1', 'Surgery Anesthesia')
		            ->setCellValue('K1', 'Surgery Address')
		            ->setCellValue('L1', 'Surgery Date')
		            ->setCellValue('M1', 'Remarks')
		            ->setCellValue('N1', 'Internist 1 Name')
		            ->setCellValue('O1', 'Internist 2 Name')
		            ->setCellValue('P1', 'Internist 3 Name')
		            ->setCellValue('Q1', 'Anesthesiologist')
		            ->setCellValue('R1', 'IOL Power')
		            ->setCellValue('S1', 'PC IOL')
		            ->setCellValue('T1', 'PC LAB')
		            ->setCellValue('U1', 'PC PF')
		            ->setCellValue('V1', 'Sponsored IOL')
		            ->setCellValue('W1', 'Misc. Sponsored')
		            ->setCellValue('X1', 'CSF Hosp. Bill')
		            ->setCellValue('Y1', 'CSF Supplies')
		            ->setCellValue('Z1', 'CSF Laboratory')
		            ->setCellValue('AA1', 'NDDCH RA')
		            ->setCellValue('AB1', 'NDDCH Zeiss')
		            ->setCellValue('AC1', 'NDDCH Supplies')
		            ->setCellValue('AD1', 'LF Prof. Fee')
		            ->setCellValue('AE1', 'LF CPC');
		    $i=2;
			while($dataline = $output->fetch_assoc()) {
				$SU = $dataline["SURG_LICENSE_NUM"];
				$SU1 = $dataline["SURG_LICENSE_NUM1"];
				$SU2 = $dataline["SURG_LICENSE_NUM2"];
				// DOCTOR SECTION
				if(strlen($SU)==7){
					$SU_GET = $mydatabase->prepare("SELECT LAST_NAME, FIRST_NAME FROM DOCTOR WHERE DOC_LICENSE_NUM='$SU'");
					$SU_GET->execute();
					$SU_TAKE = $SU_GET->get_result();
					$SU_P = $SU_TAKE->fetch_assoc();
					$SUNAME = $SU_P["FIRST_NAME"]." ".$SU_P["LAST_NAME"];
				}else{
					$SUNAME = "n/a";
				}
				if(strlen($SU1)==7){
					$SU_GET1 = $mydatabase->prepare("SELECT LAST_NAME, FIRST_NAME FROM DOCTOR WHERE DOC_LICENSE_NUM='$SU1'");
					$SU_GET1->execute();
					$SU_TAKE1 = $SU_GET1->get_result();
					$SU_P1 = $SU_TAKE1->fetch_assoc();
					$SUNAME1 = $SU_P1["FIRST_NAME"]." ".$SU_P1["LAST_NAME"];
				}else{
					$SUNAME1 = "";
				}
				if(strlen($SU2)==7){
					$SU_GET2 = $mydatabase->prepare("SELECT LAST_NAME, FIRST_NAME FROM DOCTOR WHERE DOC_LICENSE_NUM='$SU2'");
					$SU_GET2->execute();
					$SU_TAKE2 = $SU_GET2->get_result();
					$SU_P2 = $SU_TAKE2->fetch_assoc();
					$SUNAME2 = $SU_P2["FIRST_NAME"]." ".$SU_P2["LAST_NAME"];
				}else{
					$SUNAME2 = "";
				}

				$IN = $dataline["INTERNIST"];
				$IN1 = $dataline["INTERNIST1"];
				$IN2 = $dataline["INTERNIST2"];

				if(strlen($IN)==7){
					$IN_GET = $mydatabase->prepare("SELECT LAST_NAME, FIRST_NAME FROM DOCTOR WHERE DOC_LICENSE_NUM='$IN'");
					$IN_GET->execute();
					$IN_TAKE = $IN_GET->get_result();
					$IN_P = $IN_TAKE->fetch_assoc();
					$INNAME = $IN_P["FIRST_NAME"]." ".$IN_P["LAST_NAME"];
				}else{
					$INNAME = "n/a";
				}
				if(strlen($IN1)==7){
					$IN_GET1 = $mydatabase->prepare("SELECT LAST_NAME, FIRST_NAME FROM DOCTOR WHERE DOC_LICENSE_NUM='$IN1'");
					$IN_GET1->execute();
					$IN_TAKE1 = $IN_GET1->get_result();
					$IN_P1 = $IN_TAKE1->fetch_assoc();
					$INNAME1 = $IN_P1["FIRST_NAME"]." ".$IN_P1["LAST_NAME"];
				}else{
					$INNAME1 = "";
				}
				if(strlen($IN2)==7){
					$IN_GET2 = $mydatabase->prepare("SELECT LAST_NAME, FIRST_NAME FROM DOCTOR WHERE DOC_LICENSE_NUM='$IN2'");
					$IN_GET2->execute();
					$IN_TAKE2 = $IN_GET2->get_result();
					$IN_P2 = $IN_TAKE2->fetch_assoc();
					$INNAME2 = $IN_P2["FIRST_NAME"]." ".$IN_P2["LAST_NAME"];
				}else{
					$INNAME2 = "";
				}

				$print_intern = $INNAME.$INNAME1.$INNAME2;

				$AN = $dataline["ANESTHESIOLOGIST"];
				if(strlen($IN2)==7){
					$AN_GET = $mydatabase->prepare("SELECT LAST_NAME, FIRST_NAME FROM DOCTOR WHERE DOC_LICENSE_NUM='$AN'");
					$AN_GET->execute();
					$AN_TAKE = $AN_GET->get_result();
					$AN_P = $AN_TAKE->fetch_assoc();
					$ANNAME = $AN_P["FIRST_NAME"]." ".$AN_P["LAST_NAME"];
				}else{
					$ANNAME = "";
				}

				// DOCTOR SECTION END

				$objPHPExcel->setActiveSheetIndex(0)
		            ->setCellValue('A'.$i, ''.$dataline["CASE_NUM"])
		            ->setCellValue('B'.$i, ''.$SUNAME)	
		            ->setCellValue('C'.$i, ''.$SUNAME1)
		            ->setCellValue('D'.$i, ''.$SUNAME2)
		            ->setCellValue('E'.$i, ''.$dataline["PAT_ID_NUM"])
		            ->setCellValue('F'.$i, ''.$dataline["VISUAL_IMPARITY"])
		            ->setCellValue('G'.$i, ''.$dataline["MED_HISTORY"])
		            ->setCellValue('H'.$i, ''.$dataline["RIGHT_DIAGNOSIS"])
		            ->setCellValue('I'.$i, ''.$dataline["LEFT_DIAGNOSIS"])
		            ->setCellValue('J'.$i, ''.$dataline["SURG_ANESTHESIA"])
		            ->setCellValue('K'.$i, ''.$dataline["SURG_ADDRESS"])
		            ->setCellValue('L'.$i, ''.$dataline["SURG_DATE"])
		            ->setCellValue('M'.$i, ''.$dataline["REMARKS"])
		            ->setCellValue('N'.$i, ''.$INNAME)
		            ->setCellValue('O'.$i, ''.$INNAME1)
		            ->setCellValue('P'.$i, ''.$INNAME2)
		            ->setCellValue('Q'.$i, ''.$ANNAME)
		            ->setCellValue('R'.$i, ''.$dataline["IOLPOWER"])
		            ->setCellValue('S'.$i, ''.number_format($dataline["PC_IOL"], "2"))
		            ->setCellValue('T'.$i, ''.number_format($dataline["PC_LAB"], "2"))
		            ->setCellValue('U'.$i, ''.number_format($dataline["PC_PF"], "2"))
		            ->setCellValue('V'.$i, ''.number_format($dataline["SPO_IOL"], "2"))
		            ->setCellValue('W'.$i, ''.number_format($dataline["SPO_OTHERS"], "2"))
		            ->setCellValue('X'.$i, ''.number_format($dataline["CSF_HBILL"], "2"))
		            ->setCellValue('Y'.$i, ''.number_format($dataline["CSF_SUPPLIES"], "2"))
		            ->setCellValue('Z'.$i, ''.number_format($dataline["CSF_LAB"], "2"))
		            ->setCellValue('AA'.$i, ''.number_format($dataline["NDDCH_RA"], "2"))
		            ->setCellValue('AB'.$i, ''.number_format($dataline["NDDCH_ZEISS"], "2"))
		            ->setCellValue('AC'.$i, ''.number_format($dataline["NDDCH_SUPPLIES"], "2"))
		            ->setCellValue('AD'.$i, ''.number_format($dataline["LF_PF"], "2"))
		            ->setCellValue('AE'.$i, ''.number_format($dataline["LF_CPC"], "2"));
	        		$i++;
	        	}									
		}else {
			$objPHPExcel->setActiveSheetIndex(0)
		            ->setCellValue('A1', "No records");
		}
	}
	
	$mydatabase->close();
// Rename worksheet
$objPHPExcel->getActiveSheet()->setTitle('Table');
// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);
// Redirect output to a client’s web browser (Excel5)
header('Content-Type: application/vnd.ms-excel');
if(isset($_GET["table"])){
	header('Content-Disposition: attachment;filename="'.$_GET["table"].'_'.date("Y_M_d").'.xls"');
}else{
	header('Content-Disposition: attachment;filename="'.$_GET["startdate"]."_".$_GET["enddate"].'_'.$fname.'.xls"');
}

header('Cache-Control: max-age=0');
// If you're serving to IE 9, then the following may be needed
header('Cache-Control: max-age=1');
// If you're serving to IE over SSL, then the following may be needed
header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
header ('Pragma: public'); // HTTP/1.0
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
$objWriter->save('php://output');
if(isset($_GET["table"])){
	if($_GET["table"]=="doctor"){
		header("doctors.php");
	}else if($_GET["table"]=="patient"){
		header("patient.php");
	}else if($_GET["table"]=="surgery"){
		header("surgery.php");
	}
}else{
	header("reportprev.php");
}

exit;
?>