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
               <!-- /.box-header -->
               <div class="box-tools">
                  <a class="btn btn-primary" href="<?=base_url().'index.php/c_escribano/CrearMinuta'?>" >Registrar Nueva Minuta</a>
               </div>
               <div class="box-body table-responsive no-padding">
                  <table class="table table-hover">
                     <thead>
                        <tr>
                           <th>Nro de Minuta</th>
                           <th>Fecha</th>
                           <th>Estado</th>
                           <th>Motivo de Rechazo</th>
                           <th>Ver Detalle</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php foreach ($minutas as $value) :
                        //var_dump($value)
                        ?>
                        <tr>
                           <td colspan="" rowspan="" headers=""><?php echo $value->idMinuta;?></td>
                           <td colspan="" rowspan="" headers=""><?php echo $value->fechaIngresoSys;?></td>
                           <td colspan="" rowspan="" headers="">
                           <?php if ($value->estadoMinuta == 'A')  {?>
                             <span class="label label-success">Aprobado</span>
                          <?php } 
                          else {
                            if ($value->estadoMinuta == 'R')  {?>
                             <span class="label label-danger">Rechazado</span>
                          <?php } 
                          else {
                            if ($value->estadoMinuta == 'P')  {?>
                            <span class="label label-warning">Pendiente</span>
                           <?php  }
                           else { ?>
                             <span class="label label-danger">NO TIENE ESTADO</span>
                           <?php }
                                                         
                           }}?></td>
                           <td colspan="" rowspan="" headers=""><?php if($value->motivoRechazo == NULL){
                              echo "NO TIENE OBSERVACIONES";
                            } else{
                            echo $value->motivoRechazo;
                              } ?></td>
                           <td colspan="" rowspan="" headers="">
                              <div class="btn-group">
                              <?php if ($value->estadoMinuta == 'A'): ?>
                                <a class="btn btn-sm " href="#" disabled="" title="Editar Minuta"><button><i class="fa fa-pencil"></i></button></a> 
                              <?php endif ?> <?php if ($value->estadoMinuta != 'A'): ?>
                                <a class="btn btn-sm " href="<?=base_url()?>index.php/c_escribano/editarMinuta/"<?php echo $value->idMinuta?> title="Editar Minuta" ><button><i class="fa fa-pencil" ></i></button></a> 
                              <?php endif ?>

                                 <a class="btn btn-sm " href="<?=base_url()?>index.php/c_escribano/verUnaMinuta/<?php echo $value->idMinuta?>" title="Ver Detalle de minuta"> <button><i class="fa fa-eye"></i></button></a>

                                 <a class="btn btn-sm "  href="<?=base_url()?>index.php/c_escribano/verPropietarios/<?php echo $value->idMinuta?>" title="Ver Propietarios"> <button><i class="fa fa-users"></i></button></a>
                                 <a class="btn btn-sm " href="<?=base_url()?>index.php/c_escribano/imprimirMinuta/<?php echo $value->idMinuta?>" title="Imprimir"> <button><i class="fa fa-print"></i></button></a>
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

