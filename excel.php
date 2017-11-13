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
	$server = "localhost";  //own database server name
	$username = "root"; //own database username
	$password = "";  //own database password
	$database = "lukedb";  //own database name

	//CONNECT TO SERVER
	$mydatabase = new mysqli($server, $username, $password, $database);
	//IF CONNECTION FAILED
	if (!$mydatabase) {
		die( '<div style="color: #ffffff; font-size: 12pt; text-align:center;">'.'Error: Unable to connect to database.'.'</div');
	}//END
	if(isset($_GET["gen"])){
		if($_GET["gen"]=="y"){
			$S_query = "SELECT * FROM SURGERY s, DOCTOR d, EYEPATIENT p WHERE s.SURG_LICENSE_NUM = d.DOC_LICENSE_NUM AND p.PAT_ID_NUM = s.PAT_ID_NUM AND s.SURG_ANESTHESIA='General' ORDER by s.SURG_DATE desc";
			$fname = "General";
		}else if($_GET["gen"]=="n"){
			$S_query = "SELECT * FROM SURGERY s, DOCTOR d, EYEPATIENT p WHERE s.SURG_LICENSE_NUM = d.DOC_LICENSE_NUM AND p.PAT_ID_NUM = s.PAT_ID_NUM AND s.SURG_ANESTHESIA='Local' ORDER by s.SURG_DATE desc";
			$fname = "Local";		}
	}else if(isset($_GET["ph"])){
		if($_GET["ph"]=="y"){
			$S_query = "SELECT * FROM SURGERY s, DOCTOR d, EYEPATIENT p WHERE s.SURG_LICENSE_NUM = d.DOC_LICENSE_NUM AND p.PAT_ID_NUM = s.PAT_ID_NUM AND p.PAT_PH='Y' ORDER by s.SURG_DATE desc";
			$fname = "WPhilHealth";
		}else if($_GET["ph"]=="n"){
			$S_query = "SELECT * FROM SURGERY s, DOCTOR d, EYEPATIENT p WHERE s.SURG_LICENSE_NUM = d.DOC_LICENSE_NUM AND p.PAT_ID_NUM = s.PAT_ID_NUM AND p.PAT_PH='N' ORDER by s.SURG_DATE desc";
			$fname = "WOPhilHealth";
		}
	}
	


											$output = $mydatabase->query($S_query);
											//MYSQL SECTION END
        
												//FILTER END
												//MAIN PAGE
												if ($output->num_rows>0) {
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
												            ->setCellValue('C'.$i, ''.$dataline["PC_IOL"])
												            ->setCellValue('D'.$i, ''.$dataline["PC_LAB"])
												            ->setCellValue('E'.$i, ''.$dataline["PC_PF"])
												            ->setCellValue('F'.$i, ''.$PC_SUM)
												            ->setCellValue('G'.$i, ''.$dataline["SPO_IOL"])
												            ->setCellValue('H'.$i, ''.$dataline["SPO_OTHERS"])
												            ->setCellValue('I'.$i, ''.$SPO_SUM)
												            ->setCellValue('J'.$i, ''.$dataline["CSF_HBILL"])
												            ->setCellValue('K'.$i, ''.$dataline["CSF_SUPPLIES"])
												            ->setCellValue('L'.$i, ''.$dataline["CSF_LAB"])
												            ->setCellValue('M'.$i, ''.$CSF_SUM)
												            ->setCellValue('N'.$i, ''.$dataline["NDDCH_RA"])
												            ->setCellValue('O'.$i, ''.$dataline["NDDCH_ZEISS"])
												            ->setCellValue('P'.$i, ''.$NDDCH_SUM)
												            ->setCellValue('Q'.$i, ''.$ROW_SUM);
												        $i++;
													}
													$objPHPExcel->setActiveSheetIndex(0)
												            ->setCellValue('F'.$i, ''.$PC_COL_SUM)
												            ->setCellValue('I'.$i, ''.$SPO_COL_SUM)
												            ->setCellValue('M'.$i, ''.$CSF_COL_SUM)
												            ->setCellValue('P'.$i, ''.$NDDCH_COL_SUM)
												            ->setCellValue('Q'.$i, ''.$ROW_COL_SUM);
												} else {
													$objPHPExcel->setActiveSheetIndex(0)
												            ->setCellValue('A1', "No records");
												}
												$mydatabase->close();
// Rename worksheet
$objPHPExcel->getActiveSheet()->setTitle('Table');
// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);
// Redirect output to a client’s web browser (Excel5)
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="'.$_GET["curryear"]."_".$_GET["currmonth"].'_'.$fname.'.xls"');
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
header("reportprev.php");
exit;
?>