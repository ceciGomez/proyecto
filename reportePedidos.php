<?php
require('fpdf.php');
require('conexionRepor.php');

while (ob_get_level())
ob_end_clean();
header("Content-Encoding: None", true);

        $fechaPedidoDesde=new DateTime();
        $fechaPedidoHasta=new DateTime();
        $fechaPedidoDesde= date_format($fechaPedidoDesde->createFromFormat('d/m/Y',$_GET['fechaPedidoDesde']), 'Y-m-d');
        $fechaPedidoHasta=date_format($fechaPedidoHasta->createFromFormat('d/m/Y',$_GET['fechaPedidoHasta']), 'Y-m-d');
      

//$fechaPedidoDesde= date_format(date_create($_GET['fechaPedidoDesde']),'Y-m-d');

//$fechaPedidoHasta= date_format(date_create($_GET['fechaPedidoHasta']),'Y-m-d');

$pedidos = mysqli_query($conexion,
    "SELECT p.idPedido, p.fechaPedido,p.fechaRta,p.descripcion,
    p.rtaPedido,p.estadoPedido,p.idEscribano, p.idUsuario  
    FROM pedidos p
    where p.fechaPedido 
    between '".$fechaPedidoDesde."' and '".$fechaPedidoHasta."'
   ");
if($pedidos === FALSE) { 
        die(mysqli_error($conexion)); // better error handling
    }

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo
    $this->Image('exito.png',10,8,33);
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
    $this->Ln(10);
    $this->Cell(45);
    //setea fuente de titulo
    $this->SetFont('Arial','B',15);
    $this->SetFont('','U');
    $this->Cell(100,10,'Lista de Pedidos desde: '.$this->sanitizarFechaF($_GET['fechaPedidoDesde']).' hasta: '.$this->sanitizarFechaF($_GET['fechaPedidoHasta']),0,0,'C');    $this->SetFont('','');
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
    $date =New DateTime();
   return   $fechaPedidoDesde= date_format($date->createFromFormat('d/m/Y',$fecha), 'Y-m-d');
}
    
public function sanitizarFechaF($fecha)
{
    //$date = date_create_from_format('d-m-Y', $fecha);
   $date =New DateTime();
   return   $fechaPedidoDesde= date_format($date->createFromFormat('d/m/Y',$fecha), 'Y-m-d');
    
}
}

// Creación del objeto de la clase heredada
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();

//cabecera de tabla
$pdf->SetFont('Times','B',8);

$pdf->Cell(10,8,'Pedido',1,0,'C');
$pdf->Cell(25,8,'F. Pedido',1,0,'C');

$pdf->Cell(25,8,'F. Respuesta',1,0,'C');
$pdf->Cell(17,8,'Estado',1,0,'C');
$pdf->Cell(40,8,'Descripcion',1,0,'C');
$pdf->Cell(40,8,'Rta Pedido',1,0,'C');

//$pdf->Cell(23,8,'Donaciones(Und.)',1,0,'C');
$pdf->Cell(25,8,'Escribano',1,0,'C');
$pdf->Cell(19,8,'Usuario',1,0,'C');
$pdf->Ln(8);
$pdf->SetFont('Times','',8);
//fin cabecera de tabla

while($fila = mysqli_fetch_array($pedidos)){
           //obtengo nombre del escribano
    if($fila['idEscribano']==null)
        {$escribano="";}
    else{
            $usuarioQuery = "select u.nomyap as nombre
                            from usuarioescribano u 
                            where u.idEscribano = '".$fila['idEscribano']."'
                            ";
            $usuario = mysqli_query($conexion,$usuarioQuery);
            if($usuario === FALSE) { 
                    die(mysqli_error($conexion)); // better error handling
                }
            $nomyap = mysqli_fetch_assoc($usuario);
            $escribano = $nomyap['nombre'];
}
    if($fila['idUsuario']==null)
        {$operador="";}
    else{
            //obtengo nombre del operador
             $usuarioQuery = "select u.nomyap as nombre
                            from usuariosys u 
                            where u.idUsuario = '".$fila['idUsuario']."'
                            ";
            $usuario = mysqli_query($conexion,$usuarioQuery);
            if($usuario === FALSE) { 
                    die(mysqli_error($conexion)); // better error handling
                }
            $nomyap = mysqli_fetch_assoc($usuario);
            $operador = $nomyap['nombre'];
}

   
    $pdf->Cell(10,8,$fila['idPedido'],1,0,'C');
    $pdf->Cell(25,8,$fila['fechaPedido'],1,0,'C');
    $pdf->Cell(25,8,$fila['fechaRta'],1,0, 'C');
    $pdf->Cell(17,8,$fila['estadoPedido'],1,0,'C');
    $pdf->Cell(40,8,$fila['descripcion'],1,0,'C');
    $pdf->Cell(40,8,$fila['rtaPedido'],1,0,'C');

    $pdf->Cell(25,8,$escribano,1,0,'C');
   
    $pdf->Cell(19,8,$operador,1,0,'C');
    $pdf->Ln(8);

}

$pdf->Output();
?>