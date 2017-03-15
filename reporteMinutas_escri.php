<?php
require('fpdf.php');
require('conexionRepor.php');

$usuarioQuery = "select u.nomyap as nombre
                from usuariosescribano u 
                where u.idEscribano = '".$_GET['idEscribano']."'
                ";
$usuario = mysqli_query($conexion,$usuarioQuery);
$nomyap = mysqli_fetch_assoc($usuario);
$nomyap = $nomyap['nombre'];
$GLOBALS['nomyap'] = $nomyap;

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo
    $this->Image('logo.png',10,8,33);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Movernos a la derecha
    $this->Cell(80);
    // Título
    //$this->Cell(30,10,'Title',1,0,'C');
    $this->Cell(70);
    $this->SetFont('Arial','',9);
    $this->Cell(50,10,'Fecha: '.date('d-m-Y').'',0);
    $this->Ln(5);
    $this->Cell(150);
    $this->Cell(50,10,'Operador: '.$GLOBALS['nomyap']);
    $this->Ln(10);
    $this->Cell(45);
    //setea fuente de titulo
    $this->SetFont('Arial','B',15);
    $this->SetFont('','U');
    $this->Cell(100,10,'Lista de Minutas desde: '.$this->sanitizarFechaF($_GET['fechaInicio']).' Fecha hasta: '.$this->sanitizarFechaF($_GET['fechaFin']),0,0,'C');
    $this->SetFont('','');
    // Salto de línea
    $this->Ln(15);
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,'Pagina '.$this->PageNo().'/{nb}',0,0,'C');
}

public function sanitizarFecha($fecha)
{
    //$date = date_create_from_format('d-m-Y', $fecha);
    $date = date_create($fecha);
    return date_format($date,'Y-m-d');
}
public function sanitizarFechaF($fecha)
{
    //$date = date_create_from_format('d-m-Y', $fecha);
    $date = date_create($fecha);
    return date_format($date,'d-m-Y');
}
}

// Creación del objeto de la clase heredada
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();

//cabecera de tabla
$pdf->SetFont('Times','B',8);
$pdf->Cell(17,8,'',0,0,'C');
$pdf->Cell(15,8,'Nro Minuta',1,0,'C');
$pdf->Cell(30,8,'Fecha Ingreso',1,0,'C');

$pdf->Cell(17,8,'Estado',1,0,'C');
$pdf->Cell(20,8,'Fecha Estado',1,0,'C');
$pdf->Cell(27,8,'Nro de Plano',1,0,'C');
//$pdf->Cell(23,8,'Donaciones(Und.)',1,0,'C');
$pdf->Cell(22,8,'Nomenclatura Catastral',1,0,'C');
$pdf->Cell(22,8,'Plano Aprobado',1,0,'C');
$pdf->Cell(22,8,'Localidad',1,0,'C');
$pdf->Ln(8);
$pdf->SetFont('Times','',8);
//fin cabecera de tabla


$consulta = mysqli_query($conexion,"
	(SELECT m.idMinuta as idMinuta, e.estadoMinuta as estadoMinuta,
	 e.motivoRechazo, ue.idEscribano,
	concat(substring(m.fechaIngresoSys, 6, 2), '/' ,substring(m.fechaIngresoSys, 9, 2) , '/', substring(m.fechaIngresoSys, 1, 4)) as fechaIngresoSys,
				
	concat(substring(e.fechaEstado, 6, 2), '/' ,substring(e.fechaEstado, 9, 2) , '/', substring(e.fechaEstado, 1, 4)) as fechaEstado,
				p.circunscripcion, p.seccion, p.chacra, p.quinta, p.fraccion, p.manzana, p.parcela as parcela, p.nroMatriculaRPI as nroMatriculaRPI, p.planoAprobado as planoAprobado,
				l.nombre as localidad
						
						from minuta m inner join estadominuta e on m.idMinuta = e.idMinuta
						inner join usuarioescribano ue on ue.idEscribano = m.idEscribano
						inner join parcela p on p.idMinuta = m.idMinuta
						inner join localidad l on l.idLocalidad = p.idLocalidad 
						where ue.idEscribano = '$idEscribano'
						and cast(m.fechaIngresoSys as DATE) between '$fechaDesde' and '$fechaHasta'                   
					    and e.fechaEstado = (SELECT MAX(ee.fechaEstado) 
					    						from estadominuta ee 
					    						where  m.idMinuta = ee.idMinuta )  
					ORDER BY `e`.`estadoMinuta` ASC, m.idMinuta ASC");



while($fila = mysqli_fetch_array($consulta)){
    $pdf->Cell(17,8,'',0,0,'C');
    $pdf->Cell(15,8,$fila['idMinuta'],1,0,'C');
    $pdf->Cell(17,8,$fila['fechaIngresoSys'],1,0,'C');
    $pdf->Cell(30,8,$fila['estadoMinuta'],1,0);
    
    $pdf->Cell(20,8,$fila['fechaEstado'],1,0,'C');
    $pdf->Cell(22,8,$fila['parcela'],1,0,'C');
    $pdf->Cell(22,8,$fila['planoAprobado'],1,0,'C');
    $pdf->Cell(22,8,$fila['nroMatriculaRPI'],1,0,'C');
    $pdf->Ln(8);
    
}


$pdf->Output();
?>