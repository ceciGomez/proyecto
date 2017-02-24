
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SIRMI - Imprimir Minuta</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body onload="window.print();">
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   
   <!-- Main content -->
   <section class="content">
      <article>
         <!-- Titulo -->
         <h4 class="pull-right"><u>Fecha:</u> <?php echo date("d/m/Y") ?></h4> <br> <br><br>
         <h2  align="center"><i><b>Minuta de Inscripción de Titulo</b></i> <br><br>
         </h2>
         <p align="justify">
            Departamento  <strong><?php echo $unEscribano[0]->nombreDpto?>.</strong>
            - Provincia de <strong><?php echo $unEscribano[0]->nombreProv?>.</strong><br> 
            <u>FUNCIONARIO AUTORIZANTE: </u> Esc: <strong> <?php echo $unEscribano[0]->nomyap?>.</strong><br><br>
            <?php foreach ($parcelas as $value) { ?> 
            <u>NOMENCLATURA CATASTRAL: </u>
            CIRCUNSCRIPCION: <strong><?php echo $value->circunscripcion ?></strong>
            SECCION: <strong><?php echo $value->seccion ?></strong>
            CHACRA: <strong><?php echo $value->chacra?></strong>
            MANZANA: <strong><?php echo $value->manzana ?></strong>
            PARCELA: <strong><?php echo $value->parcela ?></strong> <br>
            <br>

            <u>INSCRIPCION: </u>
            NRO MATRICULA: <strong> <?php echo $value->nroMatriculaRPI ?></strong>
            FECHA:  <strong> <?php echo $value->fechaMatriculaRPI ?></strong>
            TOMO:  <strong> <?php echo $value->tomo ?></strong>
            FOLIO:  <strong> <?php echo $value->folio ?></strong>
            FINCA:  <strong> <?php echo $value->finca ?></strong>
            AÑO:  <strong> <?php echo $value->año ?></strong>
            <br>

            <u>DESCRIPCION: </u><strong><?php echo $value->descripcion?></strong>.<br><br>
            <?php $data["propietarios"] = $this->M_escribano->getPropietarios($value->idParcela); ?>
            <?php foreach ( $data["propietarios"] as $key) { 
               $nroProp = 0;
               ?>
            <?php if ($key->tipoPropietario == 'A'): ?> <u> ADQUIRIENTE: </u><?php endif ?>
            <?php if ($key->tipoPropietario == 'T'): ?> <u>TRANSMITENTE: </u><?php endif ?>
            
            <?php if ($key->nroUfUc != NULL): ?>NRO UF/UC: <strong> 
               <?php echo $key->nroUfUc ?> - <?php echo $key->tipoUfUc; endif?></strong>

            <?php if ($key->fechaEscritura != NULL) : ?>  Fecha de Escritura: <strong> 
               <?php echo $key->fechaEscritura ; endif?></strong>

            <?php if ($key->titular != NULL): ?>Nombre y Apellido: <strong> 
               <?php echo $key->titular ; endif?>.</strong>

            <?php if ($key->porcentajeCondominio != NULL): ?>PORCENTAJE DE CONDOMINIO: <strong> 
               <?php echo $key->porcentajeCondominio; echo '%'; endif?></strong>
           
            <?php if ($key->cuitCuil != NULL): ?>Cuit - Cuil: <strong> 
               <?php echo $key->cuitCuil ; endif?></strong>

            <?php if ($key->direccion != NULL): ?>Direccion: <strong> 
               <?php echo $key->direccion; endif ?></strong>

            <?php if ($key->planoAprobado != NULL) :?> Plano Aprobado: <strong> 
               <?php echo $key->planoAprobado ; endif?>.</strong>

            <?php if ($key->fechaPlanoAprobado != NULL): ?>Fecha de Plano Aprobado: <strong>
               <?php echo $key->fechaPlanoAprobado ; endif?></strong>

            <?php if ($key->poligonos != NULL) : ?>Poligonos: <strong>
               <?php echo $key->poligonos ; endif?></strong>

            <?php if ($key->porcentajeUfUc != NULL):?>Porcentaje de Uf/Uc: <strong> 
               <?php echo $key->porcentajeUfUc; echo '%' ; endif?></strong>

            <?php if ($key->conyuge != NULL):?>Asentimiento Conyugal: <strong> 
               <?php echo $key->conyuge ; endif?> </strong> <br>
            <br>
            <?php  } ?>
            <?php  } ?>
         </p>
      </article>
     
      <br>
   </section>
   <!-- /.content -->
</div>
<!-- /.content-wrapper -->

</body>
</html>