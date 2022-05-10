<?php
require('../fpdflibrary/mysql_table.php');

class PDF extends PDF_MySQL_Table
{
function Header()
{
    // Title
    $this->SetFont('Arial','',18);
    $this->Cell(0,6,'Patients Report',0,1,'C');
    $this->Ln(10);
    // Ensure table header is printed
    parent::Header();
}
}

// Connect to database


$link = mysqli_connect("localhost","root","","arawelo");
$pdf = new PDF();
$pdf->AddPage();

// patients table: specify the  columns
$pdf->AddCol('UserID',5,'ID');

$pdf->AddCol('Name',30,'Name');
$pdf->AddCol('Address',40,'Address');
$pdf->AddCol('ContactNumber',40,'Number');
$pdf->AddCol('Email',50,'Email');
$pdf->AddCol('Bloodtype',30,'BloodType','C');
$prop = array('HeaderColor'=>array(255,150,100),
            'color1'=>array(210,245,255),
            'color2'=>array(255,255,210),
            'padding'=>2,
            'margin'=>4);
            $pdf->Table($link,'select  Name, Address, ContactNumber, Email, Bloodtype , UserID from patients order by UserID');
            $pdf->Output();
?>