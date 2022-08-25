<?php 
require("../NavBarAdmin.php");
require('fpdf.php');

class PDF extends FPDF {

    function BasicTable($header, $data)
    {
        $this->SetFont('Arial','B',9);
        foreach($header as $col){
            $this->Cell(24,6,$col,1);
        }
        $this->Ln();

        $this->SetFont('Arial','',8);

        foreach($data as $row)
        {
            foreach($row as $col)
                $this->Cell(24,6,$col,1);
            $this->Ln();
        }
    }
}

$db = new SQLite3('/Applications/XAMPP/xamppfiles/databases/BankDatabase.db');

$sql = "SELECT ApplicationID, FirstName, LastName, DateOfBirth, Postcode, Contact, Product, Status FROM Customer";
$stmt = $db->query($sql);

while($row=$stmt->fetchArray(SQLITE3_NUM)){

    $res [] = $row;

	ob_start();

	$pdf = new PDF();
	$pdf->SetFont('Arial','B',12);

	$pdf->AddPage();
	$pdf->Cell(60,25,'List of Customers');
	$pdf->Ln(25);
	$header = array("ApplicationID","FirstName","LastName","DateOfBirth","Postcode","Contact","Product","Status");
	$pdf->BasicTable($header,$res);
	$pdf->Output();

	ob_end_flush();

}

?>

	<div class="container bgColor">
        	<main role="main" class="pb-3">

				<h1></h1>

			</main>
	</div>

<?php require("../Footer.php");?>


