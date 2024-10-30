<?php
require('./fpdf.php');
require_once '../MySQLConn.php';

class PDF extends FPDF {
    function Header() {
        // Centrar la imagen
        $this->Image('Toffy’s-Books.png', ($this->GetPageWidth() - 20) / 2, 10, 20);
        $this->SetFont('Arial', 'B', 19);
        $this->SetTextColor(0, 0, 0);
        $this->Ln(25); // Espacio adecuado después de la imagen

        // Centrando el título "Toffy's Books"
        $this->Cell(0, 10, utf8_decode("Toffy's Books"), 0, 1, 'C');
        $this->Ln(3);

        $this->SetTextColor(228, 100, 0);
        $this->SetFont('Arial', 'B', 15);

        // Centrando el subtítulo "REPORTE DE LIBROS"
        $this->Cell(0, 10, utf8_decode("REPORTE DE LIBROS"), 0, 1, 'C');
        $this->Ln(10); // Espacio adecuado antes de la tabla

        // Encabezado de la tabla
        $this->SetFillColor(228, 100, 0);
        $this->SetTextColor(255, 255, 255);
        $this->SetDrawColor(163, 163, 163);
        $this->SetFont('Arial', 'B', 11);
        $this->Cell(70, 10, utf8_decode('CÓDIGO'), 1, 0, 'C', 1);
        $this->Cell(70, 10, utf8_decode('TÍTULO'), 1, 0, 'C', 1);
        $this->Cell(70, 10, utf8_decode('AUTOR'), 1, 0, 'C', 1);
        $this->Cell(70, 10, utf8_decode('EJEMPLARES'), 1, 1, 'C', 1);
    }

    function Footer() {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, utf8_decode('Página ') . $this->PageNo() . '/{nb}', 0, 0, 'C');
        $hoy = date('d/m/Y');
        $this->Cell(-355, 10, utf8_decode($hoy), 0, 0, 'C');
    }
}

$conn = new MySQLConn("localhost", "root", "", "toffysbooks");
$db = $conn->Conectar();
$pdf = new PDF();
$pdf->AddPage('L'); // Cambiado a orientación horizontal (L)
$pdf->AliasNbPages();
$pdf->SetFont('Arial', '', 12);
$pdf->SetDrawColor(163, 163, 163);

$query = "SELECT codigo, titulo, autor, ejemplares FROM libros_hp";
$stmt = $db->prepare($query);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

$totalLibros = 0; // Variable para contar el total de libros

foreach ($result as $row) {
    $pdf->Cell(70, 10, $row['codigo'], 1, 0, 'C');
    $pdf->Cell(70, 10, utf8_decode($row['titulo']), 1, 0, 'C');
    $pdf->Cell(70, 10, utf8_decode($row['autor']), 1, 0, 'C');
    $pdf->Cell(70, 10, utf8_decode($row['ejemplares']), 1, 1, 'C');
    $totalLibros++; // Incrementa el contador de libros por cada registro
}

// Añadir el total de libros al final de la tabla
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(210, 10, utf8_decode('Total de libros registrados:'), 1, 0, 'C');
$pdf->Cell(70, 10, $totalLibros, 1, 1, 'C');

$pdf->Output('Reporte_Books.pdf', 'I');
?>