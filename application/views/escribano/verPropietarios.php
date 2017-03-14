<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
   <h1>
      Propietarios
   </h1>
  
   <ol class="breadcrumb">
      <li><a href="<?=base_url()?>index.php/c_loginescri"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Minuta</li><li class="active">Ver Minuta</li><li class="active">Ver Propietarios</li>
   </ol>
</section>
<!-- Main content -->
<section class="content-body">
<!-- Main row -->

<div class="box">
     <div class="box-header">
              <h3 class="box-title">Adquirientes</h3>
       </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table  table-hover">
                <thead>
                <tr>
                  <th>CUIT-CUIL</th>
                  <th>Nombre y Apellido</th>
                  <th>Direccion</th>
                  <th>Fecha Nacimiento</th>
                  <th>Conyuge</th>
                </tr>
                </thead>
                <?php foreach ($propietariosAd as  $value): ?>
                <tbody>
                <tr>
                  <td><?php echo $value->cuitCuil ?></td>
                 <td><?php echo $value->titular ?></td>
                 <td><?php echo $value->direccion ?></td>
                 <td><?php echo $value->fechaNac ?></td>
                 <td><?php echo $value->conyuge ?></td>
                 
                </tr>
                 </tbody>
  <?php endforeach ?>

              </table>
            </div>
            <!-- /.box-body -->
  

     <div class="box-header">
          <h3 class="box-title">Transmitentes</h3>
     </div>
            <!-- /.box-header -->
            <div class="box-body">
                   <table id="example2" class="table  table-hover">
                <thead>
                <tr>
                  <th>CUIT-CUIL</th>
                  <th>Nombre y Apellido</th>
                  <th>Direccion</th>
                  <th>Fecha Nacimiento</th>
                  <th>Conyuge</th>
                </tr>
                </thead>
                <?php foreach ($propietariosTr as  $value): ?>
                <tbody>
                <tr>
                  <td><?php echo $value->cuitCuil ?></td>
                 <td><?php echo $value->titular ?></td>
                 <td><?php echo $value->direccion ?></td>
                 <td><?php echo $value->fechaNac ?></td>
                 <td><?php echo $value->conyuge ?></td>
                 
                </tr>
                 </tbody>

<?php  endforeach?>
              </table>
            </div>
            <!-- /.box-body -->
           
          </div>
          <!-- /.box -->



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

