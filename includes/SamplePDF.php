<?php
require_once('dbconnect.php');

define('FPDF_FONTPATH','font/');
require("pdf/fpdf/fpdf.php");
class PDF extends FPDF
{
//Page header
function Header()
{
    //Logo
    $this->Image('picha/MANYARA SACCOS.png',5,5,35,35);
	 //Logo
    $this->Image('picha/MANYARA SACCOS.png',170,5,35,35);
    //Arial bold 15
    $this->SetFont('Arial','B',6);
    // Move to the right
    $this->Cell(80);

    //Line break
    $this->Ln(20);
}
//Page footer
function Footer()
{
    //Position at 1.5 cm from bottom
    $this->SetY(-15);

	$this->SetFont('Arial','I',7);
    $this->Cell(25,10,'Saccos Management System',0,0,'C');


    //Arial italic 8
  $this->SetFont('Arial','I',7);
    //Page number
    $this->Cell(0,10,'Page '.$this->PageNo().' / {nb}',0,0,'C');

	$this->SetFont('Arial','I',7);
	$this->Cell(-30,10, 'Saccos Management System',0,0,'C');
}
}
//HEADING, PAGE AND PAGE SIZE
$y=5;
$x=5;
$max=250;
$newy=8;

$pdf=new PDF();
$pdf->AliasNbPages();
$pdf->AddPage('L','A4');

//HEADIING
$pdf->SetFont('Arial','B',11);
$pdf->SetY($y);
$pdf->SetX($x);
$pdf->MultiCell(200,5,"TESTING IF PDF IS WORKING",1,'L');

//COLUMS
$y=$y+5;
$x = 5;
$pdf->SetY($y);
$pdf->SetX($x);
$pdf->Cell(200, 5, 'LIST OF MEMBERS REGISTERD IN TCCIA SACCOS ', 0, 0, 'C');
$y = $y + 7;

$x = 5;
$pdf->SetY($y);
$pdf->SetX($x);
$pdf->Cell(20, 5, 'S/N ', 1, 0, 'C');

$x =$x+20;
$pdf->SetY($y);
$pdf->SetX($x);
$pdf->Cell(35, 5, 'NAMES ', 1, 0, 'C');

$x = $x + 35;
$pdf->SetX($x);
$pdf->Cell(80, 5, 'EMAIL ', 1, 0, 'C');

$x = $x + 80;
$pdf->SetX($x);
$pdf->Cell(40, 5, 'BIRTH DATE ', 1, 0, 'C');

$x = $x + 40;
$pdf->SetX($x);
$pdf->Cell(35, 5, 'ADDRESS ', 1, 0, 'C');


$x = $x + 35;
$pdf->SetX($x);
$pdf->Cell(35, 5, 'PHONE NUMBER ', 1, 0, 'C');


// $x = $x + 35;
// $pdf->SetX($x);
// $pdf->Cell(35, 5, 'GENDER', 1, 0, 'C');



// $x = $x + 35;
// $pdf->SetX($x);
// $pdf->Cell(35, 5, '', 1, 0, 'C');

// $x = $x + 35;
// $pdf->SetY($y);
// $pdf->SetX($x);
// $pdf->Cell(35, 5, 'MARITAL STATUS ', 1, 0, 'C');
// $x = $x + 35;


// $pdf->SetY($y);
// $pdf->SetX($x);
// $pdf->Cell(35, 5, '', 1, 0, 'C');
$x = 5;
$y = $y + 5;

//ROWS
require_once("dbconnect.php");
$st = "SELECT * FROM usajili";
$qr = mysqli_query($cn, $st);
$sn = 1;
while ($rw = (mysqli_fetch_array($qr))) {
    $name1 = $rw['fname'];
    $name2 = $rw['mname'];
    $name3 = $rw['sname'];
    $email = $rw['email'];
    $birthdate = $rw['birth_date'];
    $address = $rw['addres'];
    $phone_number = $rw['phone_no'];
    $nida = $rw['national_id'];
    $gender = $rw['gender'];
    $marital = $rw['marital'];
    $kiingilio = $rw['admission_fee'];
    $hisa = $rw['share'];
    $saving = $rw['saving'];

    $pdf->SetY($y);
    $pdf->SetX($x);
    $pdf->Cell(20, 5, $sn, 1, 0, 'L');

    $x = $x + 20;
    $pdf->SetY($y);
    $pdf->SetX($x);
    $pdf->Cell(35, 5, $name1,1, 0, 'L');
    


//     $x = $x + 35;
//     $pdf->SetY($y);
//     $pdf->SetX($x);
//     $pdf->Cell(35, 5,  1, 0, 'L');

    $x = $x + 35;
    $pdf->SetY($y);
    $pdf->SetX($x);
    $pdf->Cell(80, 5, $email, 1, 0, 'L');

    $x = $x + 80;
    $pdf->SetY($y);
    $pdf->SetX($x);
    $pdf->Cell(40, 5, $birthdate, 1, 0, 'L');


    $x = $x + 40;
    $pdf->SetY($y);
    $pdf->SetX($x);
    $pdf->Cell(35, 5, $address, 1, 0, 'L');

    $x = $x + 35;
    $pdf->SetY($y);
    $pdf->SetX($x);
    $pdf->Cell(35, 5, $phone_number,1, 0, 'L');
    $x=5;

    $y = $y + 5;
$sn++;
}
$pdf->Output();




// $y=$y+8;
// $pdf->SetY($y);
// $pdf->SetX($x);
// $pdf->Cell(200,5,''.$prog,0,0,'C');
// $y=$y+8;

// $acyr=$_SESSION['acyr'];
// $pdf->SetY($y);
// $pdf->SetX($x);
// $pdf->Cell(200,5,"SEMESTER ".$sem." -".$acyr,0,0,'C');
// $y=$y+10;

// $pdf->SetY($y);
// $pdf->SetX($x);
// $pdf->Cell(200,5,"CONTINUOUS ASSESSMENT RESULTS FOR ".$sub,0,0,'C');
// $y=$y+10;
// $y=$y+15;
// $dateb=date('D d M Y h:i:s A');
// $xv=15;
// $pdf->SetFont('Arial','',7);
// $pdf->SetY($y);
// $pdf->SetX($xv);
// $pdf->Cell(200,5,'Print Time :'.$dateb,0,0,'L');
// $y=$y+15;
// $x=5;
// $pdf->SetFillColor(204,205,127);
// $pdf->SetFont('Arial','B',10);
// $pdf->SetY($y);
// $pdf->SetX($x);
// $pdf->Cell(10,7,'Sno',1,0,'L','1');
// $x=$x+10;
// $pdf->SetY($y);
// $pdf->SetX($x);
// $pdf->Cell(60,7,'Fullname',1,0,'L','1');
// $x=$x+60;
// $pdf->SetY($y);
// $pdf->SetX($x);
// $pdf->Cell(40,7,'Email',1,0,'L','0');
// $x=$x+40;
// $pdf->SetY($y);
// $pdf->SetX($x);
// $pdf->Cell(60,7,'Phone',1,0,'L','1');
// $k=1;
// $pdf->SetFont('Arial','',10);
