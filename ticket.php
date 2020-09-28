<?php
include 'connection.php';


session_start();
$email=$_SESSION["email_s"];
require_once 'FPDF/fpdf.php';



$rdate=$_SESSION["rdate"];
$fid= $_SESSION['fid'];
class PDF extends FPDF
{
// Page header
function Header()
{
	// Logo
	$this->Image('images/logo2.png',80,10,30);
	$this->SetFont('Times','I',10);
	$this->Cell(190,30,'fly with feel',0,0,'C');
	$this->Ln(35);
	// Arial bold 15
	$this->SetFont('Times','B',15);
	// Move to the right
	$this->Cell(80);
	// Title
	$this->Cell(40,10,'Flight Ticket',0,1,'C');
	
	// Line break
	$this->Ln(20);

}

// Page footer
function Footer()
{
	// Position at 2 cm from bottom
	$this->SetY(-20);
	// Arial italic 8
	$this->SetFont('Arial','I',8);
	// Page number
		$this->Cell(80);
	// Title
	$this->Cell(40,10,'Thanks for  book the Ticket',0,1,'C');
	$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

	$sql= "SELECT * from booked_flights  order by sl desc limit 1";
	$sql2="SELECT * from users where email='$email'";
	$sql3="SELECT * from flights where flightID='$fid'";
	$stmt = $conn->query($sql);
	$stmt2 = $conn->query($sql2);
	$stmt3 = $conn->query($sql3);
// Instanciation of inherited class


			$pdf = new PDF();
			$pdf->AliasNbPages();
			$pdf->Setfont('Times','b',15);
			$pdf->AddPage();


		while($row=mysqli_fetch_assoc($stmt2))
{				    
	
				$pdf->cell(25,10,'Name',0,0,'');
				$pdf->cell(20,10,':',0,0,'C');
				$pdf->cell(20,10,$row['fname'],0,0,'');
				$pdf->cell(25,10,$row['lname'],0,1,'');
				

}
		while($row=mysqli_fetch_assoc($stmt3))
		{
			$pdf->Setfont('Arial','',15);
			$pdf->cell(25,10,'Email',0,0,'');
			$pdf->cell(20,10,':',0,0,'C');
			$pdf->cell(90,10,$email,0,1,'');
			$pdf->Setfont('Arial','B',12);
			$pdf->cell(25,10,'Flight ID',0,0,'');
			$pdf->cell(20,10,':',0,0,'C');

			$pdf->cell(25,10,$row['flightID'],0,1,'');
			$pdf->Setfont('Arial','',15);
			$pdf->cell(25,10,'Flight',0,0,'');
			$pdf->cell(20,10,':',0,0,'C');

			$pdf->cell(20,10,$row['depart_place'],0,0,'');
			$pdf->cell(10,10,'to',0,0,'c');
			$pdf->cell(30,10,$row['arival_place'],0,1,'C');
			
			$pdf->cell(25,10,'Flying Date',0,0,'');
			$pdf->cell(20,10,':',0,0,'C');

			$pdf->cell(50,10,$row['fdate'],0,0,'');
			$pdf->cell(10,10,'Time 	:',0,0,'');
			$pdf->cell(40,10,$row['f_time'],0,1,'C');
			$pdf->cell(25,10,'Arival Time',0,0,'');
						$pdf->cell(20,10,':',0,0,'C');

			$pdf->cell(1,10,$row['arival_time'],0,1,'');

		
			if($rdate!=0)
			{
				$pdf->SetTextColor(0,0,134);
	
				$pdf->cell(25,10,'Return Flight',0,0,'');
				$pdf->cell(20,10,':',0,0,'C');

				$pdf->cell(30,10,$row['arival_place'],0,0,'');
				$pdf->cell(10,10,'to',0,0,'C');
				$pdf->cell(30,10,$row['depart_place'],0,1,'');
		
			
			$pdf->Setfont('Arial','',15);
				$pdf->cell(25,10,'Return Date',0,0,'');
				$pdf->cell(20,10,':',0,0,'C');

				$pdf->cell(40,10,$row['rf_date'],0,0,'');
				$pdf->cell(25,10,'Time 	:',0,0,'');
			$pdf->cell(25,10,$row['rf_time'],0,1,'');	
			$pdf->cell(25,10,'Arival Time',0,0,'');
						$pdf->cell(20,10,':',0,0,'C');

			$pdf->cell(10,10,$row['rf-arival'],20,1,'');
				$pdf->Ln();
			$pdf->Ln();
			$pdf->Setfont('Arial','B',12);
						$pdf->SetTextColor(0,0,0);

			$pdf->cell(180,2,'Contact With Us',0,1,'C');
			$pdf->Setfont('Arial','',12);
			$pdf->cell(180,10,'Phone: 01859420849,01720159515',0,1,'C');
			$pdf->cell(180,2,'Email: UKBairlines@gmail.com',0,1,'C');
					//$pdf->Image('http://localhost/test/barcode.php',88,225,30,20,'png');

			}
			else{


				
			$pdf->Ln();

				$pdf->Setfont('Arial','BU',12);

			$pdf->cell(180,10,'Contact With Us',0,1,'C');
			$pdf->Setfont('Arial','',12);
			$pdf->cell(180,10,'Phone: 01859420849,01720159515',0,1,'C');
			$pdf->cell(180,2,'Email: UKBairlines@gmail.com',0,1,'C');
					//$pdf->Image('http://localhost/test/barcode.php',80,160,30,20,'png');

		//}

		}
	}	
			

			$pdf->Output();

		
?>
