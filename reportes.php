<?php
session_start();

// Verificar si la sesión está vacía o si el usuario no es admin
if (empty($_SESSION['uid']) || empty($_SESSION['username']) || empty($_SESSION['user_level']) || $_SESSION['user_level'] != "admin") {
    header('Location: login.php');
    exit();
}

// Asegurarse de que la ruta de FPDF es correcta
require '../Rmaster/fpdf186/fpdf.php'; // Ajusta la ruta según tu estructura de archivos

// Incluir archivo de configuración para las credenciales de la base de datos
require '../Rmaster/config.php'; // Ajusta la ruta según tu estructura de archivos

// Conexión a la base de datos
$conexion = new mysqli($servername, $username, $password, $database);

// Verificar la conexión
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

// Crear un nuevo documento PDF
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 12);

// Título
$pdf->Cell(0, 10, 'Reporte General', 0, 1, 'C');
$pdf->Ln(10);

// Añadir las columnas de la tabla
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(30, 10, 'ID Reporte', 1);
$pdf->Cell(30, 10, 'Fecha', 1);
$pdf->Cell(80, 10, 'Descripción', 1);
$pdf->Cell(30, 10, 'Monto', 1);
$pdf->Ln();

// Obtener los datos de la base de datos
$sql = $conexion->query("SELECT * FROM tbl_reports");

if (!$sql) {
    die("Error en la consulta: " . $conexion->error);
}

// Rellenar la tabla con los datos obtenidos
$pdf->SetFont('Arial', '', 10);
while ($datos = $sql->fetch_object()) {
    $pdf->Cell(30, 10, $datos->report_id, 1);
    $pdf->Cell(30, 10, $datos->date, 1);
    $pdf->Cell(80, 10, $datos->description, 1);
    $pdf->Cell(30, 10, $datos->amount, 1);
    $pdf->Ln();
}

// Guardar el PDF temporalmente en el servidor
$pdfFilePath = 'reporte_general.pdf';
$pdf->Output('F', $pdfFilePath);

// Descargar el archivo PDF
if (file_exists($pdfFilePath)) {
    header('Content-Type: application/pdf');
    header('Content-Disposition: attachment; filename="' . basename($pdfFilePath) . '"');
    header('Content-Length: ' . filesize($pdfFilePath));
    readfile($pdfFilePath);

    // Eliminar el archivo temporal del servidor después de la descarga
    unlink($pdfFilePath);
} else {
    die("Error: No se pudo crear el archivo PDF.");
}

// Cerrar conexión a la base de datos
$conexion->close();
?>
