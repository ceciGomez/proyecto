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
   <section class="content-body">
         <!-- Main content -->
    <section class="invoice">
      <!-- title row -->     
        <div class="col-xs-12">
          <h2 class="page-header">
            <i class="fa fa-globe"></i> Datos de Minuta Nro: <?php echo $minuta[0]->idMinuta ?>
            <small class="pull-right"><u>Fecha:</u> <?php echo date("d/m/Y H:i:s") ?></small>
          </h2>
        </div>
        <!-- /.col -->
    
      <!-- info row -->
      <div class="row invoice-info">
        <div class="col-sm-12 invoice-col">
          <u>Datos Escribano: </u>
          <address>
            <strong><?php echo $unEscribano[0]->nomyap?></strong><br>
            <?php echo $unEscribano[0]->direccion?><br>
            <?php echo $unEscribano[0]->nombreLocalidad?> - Chaco<br>
            Telefono: <?php echo $unEscribano[0]->telefono?><br>
            Email: <?php echo $unEscribano[0]->email?>
          </address>
        </div>
        <!-- /.col -->
  
      </div>
      <?php foreach ($parcelas as $value) { ?>
      <div class="row invoice-info">
        <div class="col-sm-12 invoice-col">
          <u>Datos Parcela</u>: <?php echo $value->idParcela ?>
          </div>
          <div class="col-sm-4 invoice-col">
          <address>
            <strong>Nomenclatura Catastral</strong><br>
            Departamento: <?php echo $value->nombreDpto ?> <br>
            Circunscripcion:  <?php echo $value->circunscripcion ?> <br>
            Sección: <?php echo $value->seccion ?> <br>
            Chacra:  <?php echo $value->chacra ?>  <br>
            Quinta:   <?php echo $value->quinta ?>  <br>
            Fraccion:  <?php echo $value->fraccion ?>  <br>
            Manzana:  <?php echo $value->manzana ?>  <br>
            Parcela:  <?php echo $value->parcela ?>  <br>
             </address>
              </div>
            <div class="col-sm-4 invoice-col">
             <address>
            <strong>Superficie</strong><br>
            <?php echo $value->superficie ?> mts <br>
            <strong>Tipo Propiedad</strong><br>
            <?php echo $value->tipoPropiedad ?> <br>
            <strong>Plano</strong><br>
            Nro de Plano aprobado: <?php echo $value->planoAprobado ?> <br>
            Fecha: <?php echo $value->fechaPlanoAprobado ?> <br>

            <strong>Localidad</strong><br>
            <?php echo $value->nombreLocalidad ?> <br>
            </address>
             </div>
            <div class="col-sm-4 invoice-col">
             <address>
            <strong>Registro de Propiedad</strong><br>
            Matricula: <?php echo $value->nroMatriculaRPI ?> <br>
            Fecha: <?php echo $value->fechaMatriculaRPI ?> <br>
            Tomo: <?php echo $value->tomo ?> <br>
            Folio: <?php echo $value->folio ?> <br>
            Finca: <?php echo $value->finca ?> <br>
            Año: <?php echo $value->año ?> <br>

            </address>
        </div>
        <!-- /.col -->
    
       </div>
      <!-- /.row -->
      <?php $data["propietarios"] = $this->M_escribano->getPropietarios($value->idParcela);
      foreach ( $data["propietarios"] as $key) { ?>
      <!-- Table row -->
      <div class="row">
        <div class="col-xs-12 table-responsive">
          <table class="table table-striped">
            <thead>
            <tr>
              <th>Nro UF/UC</th>
              <th>Tipo UF/UC</th>
              <th>Apellido y Nombre</th>
              <th>CUIT</th>
              <th>Conyuge</th>
              <th>Porcentaje de Condominio</th>
            </tr>
            </thead>
            <tbody>
            <tr>
              <td><?php echo $key->nroUfUc ?></td>
              <td><?php echo $key->tipoUfUc ?></td>
              <td><?php echo $key->titular ?></td>
              <td><?php echo $key->cuitCuil ?></td>
              <td><?php echo $key->conyuge ?></td>
              <td><?php echo $key->porcentajeUfUc ?> %</td>
            </tr>
            <?php  } ?>
            </tbody>
          </table>
        </div>
        <!-- /.col -->
      </div>
       <?php  } ?>
      <!-- /.row -->
   
   


     <div class="box-footer">
        <a class="btn btn-primary" href="#" >Imprimir</a>
        <a class="btn btn-primary" href="<?=base_url()?>index.php/c_loginescri" >Cancelar</a>
     </div>
</div>
</section>
<!-- /.content-wrapper -->
<script>
   $( document ).ready(function() {
       $('#fechaM').datepicker();
   });
    $( document ).ready(function() {
       $('#fechaPA').datepicker();
   });
   
</script>

