<?php

require_once ('../fpdf/fpdf.php');

class PDF extends FPDF
{
    function Header()
    {
        $this->Ln(20);
        $this->SetFont('Arial', 'B', 20);
        $this->Cell(60);

        $this->Cell(70, 10, 'Reporte de alumnos', 0, 0, 'C');
        $this->Ln(30);
        $this->SetFont('Arial', 'B', 10);
        $this->SetX(8);
        $this->Cell(25, 10, 'nombres', 1, 0, 'C', 0);
        $this->Cell(25, 10, 'apellidos', 1, 0, 'C', 0);
        $this->Cell(10, 10, 'edad', 1, 0, 'C', 0);
        $this->Cell(25, 10, 'sexo', 1, 0, 'C', 0);
        $this->Cell(20, 10, 'secdes', 1, 0, 'C', 0);
        $this->Cell(20, 10, 'curdes', 1, 0, 'C', 0);
        $this->Cell(10, 10, 'nota', 1, 0, 'C', 0);
        $this->Cell(20, 10, 'asistencia', 1, 0, 'C', 0);
        $this->Cell(40, 10, 'progreso', 1, 1, 'C', 0);
    }

    function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, utf8_decode('Página') . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }
}

function calcularDesempeno($nota, $asistencia)
{
    if ($nota === null || $asistencia === null) {
        return 'N/A';
    }
    if ($nota == 1 || $asistencia < 75) {
        return 'Fuera de camino';
    }else{
        if ($nota == 5 && $asistencia >= 90) {
            return 'Excelente progreso';
        }
        if ($nota == 5 && ($asistencia >=80 && $asistencia <90)){
            return 'Buen camino';
        }
        if ($nota == 5 && ($asistencia >=75 && $asistencia <80)){
            return 'En riesgo';
        }
        if ($nota == 4 && $asistencia >=90){
            return 'Excelente progreso';
        }
        if ($nota == 4 && ($asistencia >=80 && $asistencia <90)){
            return 'Buen camino';
        }
        if ($nota == 4 && ($asistencia >=75 && $asistencia <80)){
            return 'En riesgo';
        }
        if ($nota == 3 && $asistencia >=90){
            return 'Buen camino';
        }
        if ($nota == 3 && ($asistencia >=75 && $asistencia <90)){
            return 'En riesgo';
        }
        if ($nota == 2 && $asistencia >=90){
            return 'En riesgo';
        }
    }
}

$conexion = mysqli_connect("localhost", "root", "", "sdat");
$consulta = "SELECT estudiante.nombres, estudiante.apellidos, estudiante.edad, estudiante.sexo, seccion.descripcion secdes, cursos.descripcion curdes, registro_estudiante_curso.nota, registro_estudiante_curso.asistencia
FROM estudiante 
LEFT JOIN registro_estudiante_curso on registro_estudiante_curso.id_estudiante = estudiante.id_estudiante 
LEFT JOIN cursos ON cursos.id_curso = registro_estudiante_curso.id_curso 
LEFT JOIN seccion on seccion.id_seccion = registro_estudiante_curso.id_seccion";
$resultado = mysqli_query($conexion, $consulta);


$pdf = new PDF();

$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial', '', 10);

while ($row = $resultado->fetch_assoc()) {
    $pdf->SetX(8);
    $pdf->Cell(25, 10, $row['nombres'], 1, 0, 'C', 0);
    $pdf->Cell(25, 10, $row['apellidos'], 1, 0, 'C', 0);
    $pdf->Cell(10, 10, $row['edad'], 1, 0, 'C', 0);
    $pdf->Cell(25, 10, $row['sexo'], 1, 0, 'C', 0);
    $pdf->Cell(20, 10, $row['secdes'], 1, 0, 'C', 0);
    $pdf->Cell(20, 10, $row['curdes'], 1, 0, 'C', 0);
    $pdf->Cell(10, 10, $row['nota'], 1,0, 'C', 0);
    $pdf->Cell(20, 10, $row['asistencia'], 1, 0, 'C', 0);
    $desempeno = calcularDesempeno($row['nota'], $row['asistencia']);

    if ($desempeno == 'En riesgo') {
        $pdf->SetFillColor(255, 255, 0); 
        $pdf->SetTextColor(0); 
        $pdf->Cell(40, 10, $desempeno, 1, 1, 'C', 1);
    } 
    if ($desempeno == 'Fuera de camino') {
        $pdf->SetFillColor(255, 0, 0); 
        $pdf->SetTextColor(0); 
        $pdf->Cell(40, 10, $desempeno, 1, 1, 'C', 1);
    } 
    if ($desempeno == 'Buen camino') {
        $pdf->SetFillColor(144, 238, 144); 
        $pdf->SetTextColor(0); 
        $pdf->Cell(40, 10, $desempeno, 1, 1, 'C', 1);
    } 
    if ($desempeno == 'Excelente progreso') {
        $pdf->SetFillColor(0, 255, 0); 
        $pdf->SetTextColor(0); 
        $pdf->Cell(40, 10, $desempeno, 1, 1, 'C', 1);
    } 
    if ($desempeno == 'N/A') {
        $pdf->SetFillColor(255, 255, 255);
        $pdf->Cell(40, 10, $desempeno, 1, 1, 'C', 1);
    } 
    else {
        null;
    }
}

$pdf->Output();
?>
