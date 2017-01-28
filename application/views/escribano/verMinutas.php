

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
         Ver Minuta
      </h1>
      <small>Lista todas las  Minuta</small>
      <ol class="breadcrumb">
         <li><a href="<?=base_url()?>index.php/c_loginescri"><i class="fa fa-dashboard"></i> Home</a></li>
         <li class="active">Minuta</li>
      </ol>
   </section>
   <!-- Main content -->
   <section class="content-body">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">

              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control pull-right" placeholder="Buscar">
                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </div>
            </div> 
            <!-- /.box-header -->
        <div class="box-tools">
        <a class="btn btn-primary" href="<?=base_url().'index.php/c_escribano/CrearMinuta'?>" >Registrar Nueva Minuta</a>
     </div>
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
                  <td>Ver detalle de Minuta</td>
                  <td>
                  <div class="btn-group">
                      <a class="btn btn-sm " href="<?=base_url().'index.php/c_escribano/editarMinuta'?>"><button><i class="fa fa-pencil"></i></button></a> 
                    <a class="btn btn-sm " href="<?=base_url().'index.php/c_escribano/verUnaMinuta'?>">  <button><i class="fa fa-eye"></i></button></a> 
                    <a class="btn btn-sm " href="<?=base_url().'index.php/c_escribano/verPropietarios'?>">  <button><i class="fa fa-users"></i></button></a> 
                    <a class="btn btn-sm " href="<?=base_url().'index.php/c_escribano/imprimirMinuta'?>">  <button><i class="fa fa-print"></i></button></a> 
                      </div>  
                  </td>
                </tr>
                <tr>
                  <td>219</td>
                  
                  <td>11-7-2014</td>
                  <td><span class="label label-warning">Pendiente</span></td>
                 <td>Falta cargar datos de propietario</td>
                  <td>
                  <div class="btn-group">
                  <a class="btn btn-sm " href="<?=base_url().'index.php/c_escribano/editarMinuta'?>"><button><i class="fa fa-pencil"></i></button></a> 
                    <a class="btn btn-sm " href="<?=base_url().'index.php/c_escribano/verUnaMinuta'?>">  <button><i class="fa fa-eye"></i></button></a>
                    <a class="btn btn-sm " href="<?=base_url().'index.php/c_escribano/verPropietarios'?>">  <button><i class="fa fa-users"></i></button></a>
                    <a class="btn btn-sm " href="<?=base_url().'index.php/c_escribano/imprimirMinuta'?>">  <button><i class="fa fa-print"></i></button></a>
                      </div>
                  </td>
                </tr>
                <tr>
                  <td>657</td>
                  
                  <td>11-7-2014</td>
                  <td><span class="label label-success">Aprobado</span></td>
                 <td>Ver detalle de Minuta</td>
                  <td><div class="btn-group">
                      <a class="btn btn-sm " href="<?=base_url().'index.php/c_escribano/editarMinuta'?>"><button><i class="fa fa-pencil"></i></button></a> 
                     <a class="btn btn-sm " href="<?=base_url().'index.php/c_escribano/verUnaMinuta'?>"> <button><i class="fa fa-eye"></i></button></a>
                     <a class="btn btn-sm " href="<?=base_url().'index.php/c_escribano/verPropietarios'?>"> <button><i class="fa fa-users"></i></button></a>
                     <a class="btn btn-sm " href="<?=base_url().'index.php/c_escribano/imprimirMinuta'?>"> <button><i class="fa fa-print"></i></button></a>
                      </div>
                  </td>
                </tr>
                <tr>
                  <td>175</td>
                  
                  <td>11-9-2015</td>
                  <td><span class="label label-danger">Rechazado</span></td>
                  <td>No existe la parcela cargada</td>
                  <td>
                      <a class="btn btn-sm " href="<?=base_url().'index.php/c_escribano/editarMinuta'?>"><i class="fa fa-pencil"></i></a> 
                      <a class="btn btn-sm " href="<?=base_url().'index.php/c_escribano/verUnaMinuta'?>"><i class="fa fa-eye"></i></a>
                      <a class="btn btn-sm " href="<?=base_url().'index.php/c_escribano/verPropietarios'?>"><i class="fa fa-users"></i></a>
                      <a class="btn btn-sm " href="<?=base_url().'index.php/c_escribano/imprimirMinuta'?>"><i class="fa fa-print"></i></a>
                      
                  </td>
                </tr>
              </table>
            </div>
            <!-- /.box-body -->

          </div>
          <!-- /.box -->
        </div>
      </div>
</div>

   
   </section>
</div>
<!-- /.content-wrapper -->

