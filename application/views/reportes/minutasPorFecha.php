<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
         Reporte de Minutas por fecha
      </h1>
      <small>Lista todas las  Minuta dado un rango de fechas</small>
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
               <div class="row">
          <form action="<?php echo base_url()?>index.php/c_reportes_escribano/minutas_PorFecha" method="get" accept-charset="utf-8">
        <div class="form-group col-xs-3">
               <label>Indicar Fecha de Inicio</label>
               <div class="form-group">
                  <div class='input-group date' id='datetimepickerPa'>
                     <span class="input-group-addon">
                     <span class="fa fa-calendar"></span>
                     </span>
                     <input type="text" class="form-control" id="fdesde" 
                       data-inputmask="'alias': 'dd/mm/aaaa"
                        data-mask name="fdesde" placeholder="dd/mm/aaaa" required/>
                  </div>
               </div>
               <!-- /.input group -->
            </div>
             <div class="form-group col-xs-3">
               <label>Indicar Fecha de Fin</label>
               <div class="form-group">
                  <div class='input-group date' id='datetimepickerPe'>
                     <span class="input-group-addon">
                     <span class="fa fa-calendar"></span>
                     </span>
                     <input type="text" class="form-control" id="fhasta" 
                        data-inputmask="'alias': 'dd/mm/aaaa'"
                        data-mask name="fhasta" placeholder="dd/mm/aaaa " required/>
                  </div>
               </div>
               <!-- /.input group -->
            </div>
            <div class="form-group col-xs-3">
            <button class="btn btn-primary btn-md" type="submit">Buscar</button>
            </div>
      </form>
      </div>
               <div class="box-body table-responsive no-padding">
                  <table class="table table-hover">
                     <thead>
                        <tr>
                           <th>Nro de Minuta</th>
                           <th>Fecha Ingreso</th>
                           <th>Estado</th>
                           <th>Fecha Estado</th>
                           <th>Nro de Plano</th>
                           <th>Nomenclatura Catastral <br>
                           <th>Localidad</th>
                           <th>Matricula RPI</th>
                          
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
                           <td><?php echo $value->planoAprobado; ?></td>
                           <td colspan="" rowspan="" headers=""><?php echo $value->fechaEstado;?></td>
                           
                               <td>Circ. <?php echo $value->circunscripcion; ?> - 
                              Sec.<?php echo $value->seccion; ?> -
                              <?php if ($value->chacra !=NULL): 
                                echo "Ch." ; 
                                echo $value->chacra; ?> - 
                              <?php endif ?>
                              <?php if ( $value->quinta !=NULL): 
                                echo "Qta.";
                                echo $value->quinta; ?> -                       
                              <?php endif ?>
                              <?php if ($value->fraccion !=NULL): 
                                echo "Frac.";
                                echo $value->fraccion; ?> -    
                              <?php endif ?>
                              <?php if ( $value->manzana !=NULL):
                                echo "Mz.";
                                echo $value->manzana; ?> - 
                              <?php endif ?>
                              <?php if ($value->parcela !=NULL):                                 
                                echo "Pc.";
                                echo $value->parcela; ?> 
                              <?php endif ?></td>
                              <td><?php echo $value->localidad; ?></td>
                              <td><?php echo $value->nroMatriculaRPI; ?></td>                           
                        </tr>
                        <?php endforeach ?>
                     </tbody>
                  </table>
               </div>
               <!-- /.box-body -->
            </div>
         </div>
      <div class="row col-sm-12 pull-right">
<!--  <a href="http://localhost/proyecto/reporteMinutas_escri.php?fechaInicio=<?php echo $fechaInicio;?>&fechaFin=<?php echo $fechaFin;?>&idUsuario=<?php echo  $this->session->userdata('idEscribano')?>"; class= "btn btn-primary btn-sm" target="_blank" role="button">
<span>Imprimir Reporte</span></i></a>
 -->
 <a href="<?php echo base_url()?>reporteMinutas_escri.php?fechaInicio=<?php echo $fechaInicio;?>&fechaFin=<?php echo $fechaFin;?>&idUsuario=<?php echo  $this->session->userdata('idEscribano')?>"; class= "btn btn-primary btn-sm" target="_blank" role="button">
<span>Imprimir Reporte</span></i></a>

  </div>
      </div>
   <!-- /.row -->
   </section>
</div>
<!-- /.content-wrapper -->

 <script>
    $(function () {
            $('#datetimepickerPa').datepicker({format: 'yyyy-mm-dd'});
          });
       $(function () {
            $('#datetimepickerPe').datepicker({format: 'yyyy-mm-dd'});
            });
 $(function () {           
           $("[data-mask]").inputmask();
         });

         </script>
