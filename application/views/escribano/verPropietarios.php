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
<?php foreach ($propietarios as  $value): 
  if ($value->tipoPropietario == 'A'){ ?>
     <div class="box-header">
              <h3 class="box-title">Adquirientes</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Rendering engine</th>
                  <th>Browser</th>
                  <th>Platform(s)</th>
                  <th>Engine version</th>
                  <th>CSS grade</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                  <td>Trident</td>
                  <td>Internet
                    Explorer 4.0
                  </td>
                  <td>Win 95+</td>
                  <td> 4</td>
                  <td>X</td>
                </tr>
                

              </table>
            </div>
            <!-- /.box-body -->
  <?php  } else { ?>
     <div class="box-header">
              <h3 class="box-title">Transmitente</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Rendering engine</th>
                  <th>Browser</th>
                  <th>Platform(s)</th>
                  <th>Engine version</th>
                  <th>CSS grade</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                  <td>Trident</td>
                  <td>Internet
                    Explorer 4.0
                  </td>
                  <td>Win 95+</td>
                  <td> 4</td>
                  <td>X</td>
                </tr>
                

              </table>
            </div>
            <!-- /.box-body -->
<?php   } ?>
<?php  endforeach?>
           
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

