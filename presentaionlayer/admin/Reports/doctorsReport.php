<?php
require('../fpdflibrary/mysql_table.php');

class PDF extends PDF_MySQL_Table
{
function Header()
{
    // Title
    $this->SetFont('Arial','',18);
    $this->Cell(0,6,'Doctors Report',0,1,'C');
    $this->Ln(10);
    // Ensure table header is printed
    parent::Header();
}
}

// Connect to database


$link = mysqli_connect("localhost","root","","arawelo");
$pdf = new PDF();
$pdf->AddPage();

// doctors table: specify the  columns
$pdf->AddCol('DoctorID',5,'ID');

$pdf->AddCol('DoctorName',40,'Name');
$pdf->AddCol('Address',40,'Address');
$pdf->AddCol('ContactNumber',40,'Number');
$pdf->AddCol('email',45,'Email');
$pdf->AddCol('Categorey',30,'Category');
$prop = array('HeaderColor'=>array(255,150,100),
            'color1'=>array(210,245,255),
            'color2'=>array(255,255,210),
            'padding'=>2,
            'margin'=>4);
$pdf->Table($link,'select  DoctorID, DoctorName, ContactNumber, email, Address,Categorey from doctor order by DoctorID');
$pdf->Output();
