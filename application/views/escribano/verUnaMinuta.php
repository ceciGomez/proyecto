

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
         Ver Minuta
      </h1>
      <ol class="breadcrumb">
         <li><a href="<?=base_url()?>index.php/c_loginescri"><i class="fa fa-dashboard"></i> Home</a></li>
         <li class="active">Minuta</li>
      </ol>
   </section>
   <!-- Main content -->
   <section class="content">
      <article>
         <!-- Titulo -->
         <small class="pull-right"><u>Fecha:</u> <?php echo date("d/m/Y H:i:s") ?></small>
         <h2 class="page-header" align="center"><i><b>Minuta de Inscripción de Titulo</b></i>
         </h2>
         <p align="justify">
            Departamento  <strong><?php echo $unEscribano[0]->nombreDpto?>.</strong>
            - Provincia de <strong><?php echo $unEscribano[0]->nombreProv?>.</strong><br>
            FUNCIONARIO AUTORIZANTE: Esc: <strong> <?php echo $unEscribano[0]->nomyap?>.</strong><br>
            <?php foreach ($parcelas as $value) { ?> <br>
            BIEN: <strong><?php echo $value->descripcion?></strong>.<br><br>
            <?php $data["propietarios"] = $this->M_escribano->getPropietarios($value->idParcela); ?>
            <?php foreach ( $data["propietarios"] as $key) { 
               $nroProp = 0;
               ?>
            <?php if ($key->tipoPropietario == 'A'): ?> ADQUIRIENTE: <br> <?php endif ?>
            <?php if  ($key->tipoPropietario == 'T'): ?> TRANSMITENTE: <br><?php endif ?>
            NRO UF/UC: <strong><?php if ($key->nroUfUc == NULL) echo '-------';  else echo $key->nroUfUc ?> - <?php echo $key->tipoUfUc ?></strong>
            Fecha de Escritura: <strong><?php if ($key->fechaEscritura == NULL) echo '-------';  else echo $key->fechaEscritura ?>.</strong>
            Nombre y Apellido: <strong><?php if ($key->titular == NULL) echo '-------';  else echo $key->titular ?>.</strong>
            Cuit - Cuil: <strong><?php if ($key->cuitCuil == NULL) echo '-------';  else echo $key->cuitCuil ?></strong>
            Direccion: <strong><?php if ($key->direccion == NULL) echo '-------';  else echo $key->direccion; ?>.</strong>
            Plano Aprobado: <strong><?php if ($key->planoAprobado == NULL) echo '-------';  else echo $key->planoAprobado ?>.</strong>
            Fecha de Plano Aprobado: <strong><?php if ($key->fechaPlanoAprobado == NULL) echo '-------';  else echo $key->fechaPlanoAprobado ?>.</strong>
            Poligonos: <strong><?php if ($key->poligonos == NULL) echo '-------';  else echo $key->poligonos ?>.</strong>
            Porcentaje de Uf/Uc: <strong><?php if ($key->porcentajeUfUc == NULL) echo '-------';  else echo $key->porcentajeUfUc ?> %.</strong><br>
            Asentimiento Conyugal: <strong><?php if ($key->conyuge == NULL) echo '-------';  else echo $key->conyuge ?> .</strong>
            <br>
            <?php  } ?>
            <?php  } ?>
         </p>
      </article>
      <div class="row col-sm-12">
         <a class="btn btn-primary" href="javascript:window.history.back();">Volver</a>
         <a class="btn btn-primary" href="#" >Imprimir</a>
         <a class="btn btn-primary" href="<?=base_url()?>index.php/c_loginescri" >Cancelar</a>
      </div>
      <br>
   </section>
   <!-- /.content -->
</div>
<!-- /.content-wrapper -->

