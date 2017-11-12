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
$S_query = "SELECT * FROM SURGERY s, DOCTOR d, EYEPATIENT p WHERE s.SURG_LICENSE_NUM = d.DOC_LICENSE_NUM AND p.PAT_ID_NUM = s.PAT_ID_NUM AND p.PAT_PH='Y' ORDER by s.SURG_DATE desc";
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
												            ->setCellValue('F1', 'Spons. IOL')
												            ->setCellValue('G1', 'Other Spons.')
												            ->setCellValue('H1', 'Hosp. Bill')
												            ->setCellValue('I1', 'Supplies')
												            ->setCellValue('J1', 'Lab');
												    $i=2;
													while($dataline = $output->fetch_assoc()) { 
														$objPHPExcel->setActiveSheetIndex(0)
												            ->setCellValue('A'.$i, ''.$dataline["CASE_NUM"])
												            ->setCellValue('B'.$i, ''.$dataline["PAT_FNAME"].' '.$dataline["PAT_LNAME"])	
												            ->setCellValue('C'.$i, ''.$dataline["PC_IOL"])
												            ->setCellValue('D'.$i, ''.$dataline["PC_LAB"])
												            ->setCellValue('E'.$i, ''.$dataline["PC_PF"])
												            ->setCellValue('F'.$i, ''.$dataline["SPO_IOL"])
												            ->setCellValue('G'.$i, 'Other Spons.')
												            ->setCellValue('H'.$i, ''.$dataline["CSF_HBILL"])
												            ->setCellValue('I'.$i, ''.$dataline["CSF_SUPPLIES"])
												            ->setCellValue('J'.$i, ''.$dataline["CSF_LAB"]);
												        $i++;
													}
												} else {
													echo "No Records.";
												}
												//MAIN PAGE END
													$mydatabase->close();
// Rename worksheet
$objPHPExcel->getActiveSheet()->setTitle('Simple');
// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);
// Redirect output to a client’s web browser (Excel5)
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="01simple.xls"');
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
exit;
?>