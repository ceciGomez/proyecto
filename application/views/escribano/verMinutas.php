

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
         Crear Minuta
      </h1>
      <small>Finalizar Minuta</small>
      <ol class="breadcrumb">
         <li><a href="<?=base_url()?>index.php/c_loginescri"><i class="fa fa-dashboard"></i> Home</a></li>
         <li><a href="<?=base_url().'index.php/c_escribano/CrearMinuta'?>"></i> Parcela</a></li>
         <li><a href="<?=base_url().'index.php/c_escribano/registrarPropietario'?>"></i> Propietario</a></li>
         <li class="active">Minuta</li>
      </ol>
   </section>
   <!-- Main content -->
   <section class="content-body">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Responsive Hover Table</h3>

              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>Nro de Minuta</th>
                  <th>Fecha</th>
                  <th>Estado</th>
                  <th>Observaciones</th>
                  <th>Ver Detalle</th>
                </tr>
                <tr>
                  <td>183</td>
                  <td>12-05-2016</td>
                  <td><span class="label label-success">Aprobado</span></td>
                  <td>Aprobado</td>
                  <td>Ver detalle de Minuta</td>
                </tr>
                <tr>
                  <td>219</td>
                  
                  <td>11-7-2014</td>
                  <td><span class="label label-warning">Pendiente</span></td>
                  <td>Observaciones</td>
                 <td>Falta cargar datos de propietario</td>
                </tr>
                <tr>
                  <td>657</td>
                  
                  <td>11-7-2014</td>
                  <td><span class="label label-primary">Aprobado</span></td>
                  <td>Aprobado</td>
                 <td>Ver detalle de Minuta</td>
                </tr>
                <tr>
                  <td>175</td>
                  
                  <td>11-9-2015</td>
                  <td><span class="label label-danger">Rechazado</span></td>
                  <td>Observaciones</td>
                  <td>No existe la parcela cargada</td>
                </tr>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>


     <div class="box-footer">
        <a class="btn btn-primary" href="<?=base_url().'index.php/c_escribano/registrarPropietario'?>" >Confirmar Minuta</a>
        <a class="btn btn-primary" href="<?=base_url()?>index.php/c_loginescri" >Cancelar</a>
     </div>
   </section>
</div>
<!-- /.content-wrapper -->

