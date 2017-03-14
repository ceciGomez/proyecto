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

               </div>
               <!-- /.box-header -->
               <div class="box-tools">Fecha Desde - Fecha Hasta
               </div>
               <div class="box-body table-responsive no-padding">
                  <table class="table table-hover">
                     <thead>
                        <tr>
                           <th>Nro de Minuta</th>
                           <th>Fecha</th>
                           <th>Estado</th>
                           <th>Motivo de Rechazo</th>
                          
                        </tr>
                     </thead>
                     <tbody>
                        <?php foreach ($minutas_por_fecha as $value) :
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
                                 }}?>
                           </td>
                           <td colspan="" rowspan="" headers=""><?php if($value->motivoRechazo == NULL){
                              echo "NO TIENE OBSERVACIONES";
                              } else{
                              echo $value->motivoRechazo;
                              } ?></td>
                          
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

