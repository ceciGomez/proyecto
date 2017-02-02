

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
         Ver Operadores
      </h1>
      <small>Lista todos los Operadores</small>
      <ol class="breadcrumb">
         <li><a href="<?=base_url()?>index.php/c_loginadmin"><i class="fa fa-dashboard"></i> Home</a></li>
         <li class="active">Ver Operadores</li>
      </ol>
   </section>
   <!-- Main content -->
   <section class="content">
      <div class="row">
         <div class="col-xs-12">
            <div class="box">
               <div class="box-header">
                  <!-- <div class="box-tools">
                     <div class="input-group input-group-sm" ;">
                        <input type="text" name="table_search" class="form-control pull-right" placeholder="Buscar">
                        <div class="input-group-btn">
                           <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                        </div>
                     </div>
                  </div> -->
               </div>
                <div class="box-header with-border">
                     <h3 class="box-title">Operadores de SIRMI</h3>
                  </div>
             
             
               <div class="box-body table-responsive no-padding">
                  <table class="table table-hover">
                     <thead>
                        <tr>
                           <th>Nombre y Apellido</th>
                           <th>Usuario</th>
                           <th>DNI</th>
                           <th>Teléfono</th>
                           <th>Dirección</th>
                           <th>e-mail</th>
                           <th>Localidad</th>
                        </tr>
                     </thead>
                     <tbody>
                       
                        <?php foreach ($operadores as $value) :
                        //var_dump($value) 
                        ?>
                        <tr>
                           <td colspan="" rowspan="" headers=""> <?php echo $value->nomyap;?> </td>
                           <td colspan="" rowspan="" headers=""><?php echo $value->usuario;?> </td>
                           <td colspan="" rowspan="" headers=""><?php echo $value->dni;?> </td>
                           <td colspan="" rowspan="" headers=""><?php if($value->telefono == NULL){
                              echo "-";
                            } else{
                            echo $value->telefono;
                              } ?></td>
                           <td colspan="" rowspan="" headers=""><?php if($value->direccion == NULL){
                              echo "-";
                            } else{
                            echo $value->direccion;
                              } ?></td>
                           <td colspan="" rowspan="" headers=""><?php if($value->email == NULL){
                              echo "-";
                            } else{
                            echo $value->email;
                              } ?></td>
                           <td colspan="" rowspan="" headers=""><?php echo $value->idLocalidad;?> </td>

                                                                           
                           <td colspan="" rowspan="" headers="">
                              <div class="btn-group">
                                 <a class="btn btn-sm " href="#"><button><i class="fa fa-pencil"></i></button></a> 
                                 <a class="btn btn-sm " href="#"> <button><i class="fa fa-remove"></i></button></a>
                              </div>
                           </td>
                        </tr>
                        <?php endforeach ?>
                     
                     </tbody>
                  </table>
               </div>
               <!-- /.box-body -->
            </div>
         </div>
      </div>
   </section>
</div>
<!-- /.content-wrapper -->

