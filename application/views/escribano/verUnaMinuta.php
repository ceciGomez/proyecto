

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
               <?php echo $key->porcentajeUfUc; echo '%' ; endif?></strong><br>

            <?php if ($key->conyuge != NULL):?>Asentimiento Conyugal: <strong> 
               <?php echo $key->conyuge ; endif?> </strong>
            <br>
            <?php  } ?>
            <?php  } ?>
         </p>
      </article>
      <div class="row col-sm-12">
         <a class="btn btn-primary" href="javascript:window.history.back();">Volver</a>
         <a class="btn btn-primary" href="<?=base_url()?>index.php/c_escribano/imprimirMinuta/<?php echo $value->idMinuta?>" >Imprimir</a>
         
      </div>
      <br>
   </section>
   <!-- /.content -->
</div>
<!-- /.content-wrapper -->

