<?php
require('./fpdf.php'); // Carga la librería FPDF
require_once '../MySQLConn.php'; // Conexión a la base de datos

function utf8_decode_custom($text) {
    return iconv('UTF-8', 'windows-1252//IGNORE', $text);
}

class PDF extends FPDF {
    function Header() {
        $this->Image('Toffy’s-Books.png', ($this->GetPageWidth() - 20) / 2, 10, 20);
        $this->SetFont('Arial', 'B', 19);
        $this->SetTextColor(0, 0, 0);
        $this->Ln(25);
        $this->Cell(0, 10, utf8_decode_custom("Toffy's Books"), 0, 1, 'C');
        $this->Ln(3);
        $this->SetTextColor(228, 100, 0);
        $this->SetFont('Arial', 'B', 15);
        $this->Cell(0, 10, utf8_decode_custom("REPORTE DE PRESTAMOS"), 0, 1, 'C');
        $this->Ln(10);
        $this->SetFillColor(228, 100, 0);
        $this->SetTextColor(255, 255, 255);
        $this->SetDrawColor(163, 163, 163);
        $this->SetFont('Arial', 'B', 11);
        $this->Cell(40, 10, utf8_decode_custom('LIBRO'), 1, 0, 'C', 1);
        $this->Cell(40, 10, utf8_decode_custom('USUARIO'), 1, 0, 'C', 1);
        $this->Cell(40, 10, utf8_decode_custom('SOLICITUD'), 1, 0, 'C', 1);
        $this->Cell(70, 10, utf8_decode_custom('ENTREGA'), 1, 1, 'C', 1);
    }

    function Footer() {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, utf8_decode_custom('Página ') . $this->PageNo() . '/{nb}', 0, 0, 'C');
        $hoy = date('d/m/Y');
        $this->Cell(-355, 10, utf8_decode_custom($hoy), 0, 0, 'C');
    }
}

// Conectar a la base de datos
$conn = new MySQLConn("localhost", "root", "", "toffysbooks");
$db = $conn->Conectar();

$pdf = new PDF();
$pdf->AddPage();
$pdf->AliasNbPages();
$pdf->SetFont('Arial', '', 12);
$pdf->SetDrawColor(163, 163, 163);

// Especifica el ID del préstamo que deseas mostrar
$id_prestamo = 1; // Cambia este valor por el ID que deseas buscar

// Consulta para obtener datos de un solo préstamo
$query = "SELECT id, nombre_libro, nombrepersona, fecha_prestamo, fecha_devolucion FROM prestamos_hp WHERE id = :id";
$stmt = $db->prepare($query);
$stmt->bindParam(':id', $id_prestamo, PDO::PARAM_INT);
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);

// Verifica si se encontró el préstamo
if ($result) {
    $pdf->Cell(40, 10, utf8_decode_custom($result['nombre_libro']), 1, 0, 'C');
    $pdf->Cell(40, 10, utf8_decode_custom($result['nombrepersona']), 1, 0, 'C');
    $pdf->Cell(40, 10, utf8_decode_custom($result['fecha_prestamo']), 1, 0, 'C');
    $pdf->Cell(70, 10, utf8_decode_custom($result['fecha_devolucion']), 1, 1, 'C');
} else {
    // Si no se encuentra el préstamo, puedes manejar el caso aquí
    $pdf->Cell(0, 10, utf8_decode_custom('No se encontró el préstamo.'), 0, 1, 'C');
}

// Generar el PDF
$pdf->Output('Reporte_Prestamo.pdf', 'I');

?>
