<?php
error_reporting(E_ALL); ini_set('display_errors', 'Off');
require_once('connection.php');
//connect to db
require_once('connection.php');
//set filename
$title.$filename="Voter.xls";
define('EOL',(PHP_SAPI == 'cli') ? PHP_EOL : '<br />');

/** Include PHPExcel */
require_once dirname(__FILE__) . '/Classes/PHPExcel.php';


// Create new PHPExcel object
echo date('H:i:s') , " Create new PHPExcel object" , EOL;
$objPHPExcel = new PHPExcel();

// Set document properties
echo date('H:i:s') , " Set document properties" , EOL;
$objPHPExcel->getProperties()->setCreator("ATC-SMS System")
							 ->setLastModifiedBy("ATC-SMS System")
							 ->setTitle("ATC-NACTE REPORT")
							 ->setSubject("ATC-NACTE REPORT")
							 ->setDescription("Test document for PHPExcel, generated using PHP classes.")
							 ->setKeywords("office PHPExcel php")
							 ->setCategory("Test result file");
//set font size for the whole document
//$objPHPExcel->getActiveSheet()->getStyle("F1:G1")->getFont()->setSize(16);//for some cells
$objPHPExcel->getDefaultStyle()->getFont()->setName('Arial')->setSize(10);
// Add some data
echo date('H:i:s') , " Add some data" , EOL;
$objPHPExcel->setActiveSheetIndex(0)
->setCellValue('A1', 'List of candidate result')
->setCellValue('A2', 'online volting system')
->setCellValue('A3','Sno')
->setCellValue('B3','Full Name')
->setCellValue('C3','Part')
->setCellValue('D3','Position')
->setCellValue('E3','Total Vote')
->setCellValue('F3','%')
->setCellValue('G3','Status');

//align right
 $style = array(
        'alignment' => array(
            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
        )
    );
$objPHPExcel->getActiveSheet()->getStyle("A1:G1")->applyFromArray($style);
//align center
$stylecenter = array(
        'alignment' => array(
            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
        )
    );
$objPHPExcel->getActiveSheet()->getStyle("A2:G2")->applyFromArray($style);
//bold
$objPHPExcel->getActiveSheet()->getStyle('A3:G3')->getFont()->setBold(true);
//look for results and display them
$sql="SELECT COUNT(result.kula) AS idadi,(COUNT(*)/$kura)*100 as aver,instution.image, result.candidate, result.kula, result.cand, result.eplace, result.part, result.position FROM result,instution WHERE result.candidate=instution.email GROUP BY result.cand";
	$result=mysqli_query($conn,$sql);
	$k=1;
	$dz=1;
	$row=4;
	while($array=mysqli_fetch_array($result))
	{
			//Data
            $cand=$array['cand'];
        $img = $array['image'];
        $part=$array['part'];
        $posi=$array['position'];
        $aver=$array['aver'];
        $kra=$array['idadi'];
        // if($aver>50){
        //     $mark = "Good";
        // }
        // else{
        //     $mark ="Average";
        // }
           
			$objPHPExcel->getActiveSheet()->SetCellValue('A'.$row, $k);
			$objPHPExcel->getActiveSheet()->SetCellValue('B'.$row, $cand);
			$objPHPExcel->getActiveSheet()->SetCellValue('C'.$row, $part);
			$objPHPExcel->getActiveSheet()->SetCellValue('D'.$row, $posi);
			$objPHPExcel->getActiveSheet()->SetCellValue('E'.$row, $kra);
            $objPHPExcel->getActiveSheet()->SetCellValue('F'.$row, $aver);
			$objPHPExcel->getActiveSheet()->SetCellValue('G'.$row, $mark);
            $k++;
			$row++;
			}
	//set auto width in cells
	foreach(range('A','G') as $columnID) {
    $objPHPExcel->getActiveSheet()->getColumnDimension($columnID)
        ->setAutoSize(true);
}
foreach(range('A3','G3') as $columnID) {
    $objPHPExcel->getActiveSheet()->getColumnDimension($columnID)
        ->setAutoSize(true);
}
//applyborders
$applyborders = array(
  'borders' => array(
    'allborders' => array(
      'style' => PHPExcel_Style_Border::BORDER_THIN
    )
  )
);
$objPHPExcel->getActiveSheet()->getStyle('A3:G3')->applyFromArray($applyborders);
//$objPHPExcel->getActiveSheet()->getStyle('A7:J7')->applyFromArray($applyborders);
//$objPHPExcel->getActiveSheet()->getStyle('A8:J8')->applyFromArray($applyborders);//
//unset($styleArray);
$objPHPExcel->getActiveSheet()->getStyle(
    'A4:' . 
    $objPHPExcel->getActiveSheet()->getHighestColumn() . 
    $objPHPExcel->getActiveSheet()->getHighestRow()
)->applyFromArray($applyborders);

//merge cells
$objPHPExcel->setActiveSheetIndex(0)->mergeCells('A1:G1');
$objPHPExcel->setActiveSheetIndex(0)->mergeCells('A2:G2');




// Rename worksheet
echo date('H:i:s') , " Rename worksheet" , EOL;
$objPHPExcel->getActiveSheet()->setTitle('Certificates');


// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);

ob_end_clean();
// Redirect output to a client’s web browser (Excel5)
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename='.$filename);
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
