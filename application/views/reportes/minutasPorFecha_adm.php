<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1 align="center">
         Reporte de Minutas por fecha
      </h1>
     
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
               <div class="box box-primary">
            <div class="box-header">

             

                 <label>Filtrar Minutas por :</label>
                   <form   style="display:inline; "  action="<?php echo base_url()?>index.php/c_administrador/imprimirMinutas"  method="GET" accept-charset="utf-8" >
                  <div class="box-body" style="background-color: lightblue;">
                  
                       <div class="row">
                      <div class="col-md-3">
                          <label>Fecha Ingreso desde :</label><br>
                        <input type="text"   id="fechaIngresoDesde" name="fechaIngresoDesde" data-provide="datepicker" placeholder="dd/mm/yyyy" required> 
                      </div>

                       <div class="col-md-3">
                          <label>Fecha Ingreso hasta :</label><br>
                        <input type="text"   id="fechaIngresoHasta" name="fechaIngresoHasta" data-provide="datepicker" placeholder="dd/mm/yyyy" required> 
                      </div>
              
                </div> 
                </div> 
                <br>
               <div align="center">
                <button type="submit" class="btn btn-primary">Imprimir Minutas</button>               
                      </div>
                </form>
                  
                        



                  
                  </div>
                  </div>
               <div class="box-body table-responsive no-padding">
                  <table id="minutas" class="table-bordered" style="display: none"> 
                     <thead>
                        <tr>
                         
                           <th>Fecha Ingreso</th>
                           <th>Nro de Minuta</th>
                           <th>Estado</th>
                           <th>Fecha Estado</th>
                           <th>Nro de Plano</th>
                           <th>Nomenclatura Catastral <br>
                           <th>Localidad</th>
                           <th>Matricula RPI</th>
                          
                        </tr>
                     </thead>
                     <tbody>
                        <?php foreach ($minutas as $value) :
                           //var_dump($value)
                           ?>
                        <tr>
                          <td colspan="" rowspan="" headers="" data-order="<?php echo$value->fechaIngresoSys;?>"><?php 
                           $date=new DateTime($value->fechaIngresoSys);
                              $date_formated=$date->format('d/m/Y ');
                          echo $date_formated;?></td>
                           <td colspan="" rowspan="" headers=""><?php echo $value->idMinuta;?></td>
                         
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
                          
                           <td colspan="" rowspan="" headers="" data-order="<?php echo$value->fechaEstado;?>"><?php 
                           $date=new DateTime($value->fechaEstado);
                              $date_formated=$date->format('d/m/Y ');
                          echo $date_formated;?></td></td>
                           
                            <td><?php echo $value->planoAprobado; ?></td>

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
      
      </div>
   <!-- /.row -->
   </section>
</div>
<!-- /.content-wrapper -->
  
                  <script type="text/javascript">
            
                   

                   $(document).ready(function(){

                    //crea la tabla
                    var dtable=$('#minutas').DataTable(
                        {
                           autoWidht:false,
                            "order": [[ 0, "desc" ]],
                           
                             language: {
                                "sProcessing":     "Procesando...",
                            "sLengthMenu":     "Mostrar _MENU_ Minutas",
                            "sZeroRecords":    "No se encontraron resultados",
                            "sEmptyTable":     "Ninguna MInuta encontrada",
                            "sInfo":           "Mostrando Minutas del _START_ al _END_ de un total de _TOTAL_ registros",
                            "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                            "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                            "sInfoPostFix":    "",
                            "sSearch":         "Buscar:",
                            "sUrl":            "",
                            "sInfoThousands":  ",",
                            "sLoadingRecords": "Cargando...",
                            "oPaginate": {
                                "sFirst":    "Primero",
                                "sLast":     "Último",
                                "sNext":     "Siguiente",
                                "sPrevious": "Anterior"
                              }},
                                } );
                           
                
                    //para el filtrado
                     $('.filter').on('keyup change', function () {
                          //clear global search values
                          dtable.search('');
                          dtable.column($(this).data('columnIndex')).search(String(this.value)).draw();

                      });
                      
                      $( ".dataTables_filter input" ).on( 'keyup change',function() {
                       //clear column search values
                          dtable.columns().search('');
                         //clear input values
                         $('.filter').val('');
                    }); 
                     
                      //quitar el campo de busqueda por defecto
                      document.getElementById('minutas_filter').style.display='none';

                       $( "#minutas" ).show();


               

                   $.fn.dataTableExt.afnFiltering.push(
                            function( oSettings, aData, iDataIndex ) {
                                var iFini = document.getElementById('fechaIngresoDesde').value;
                                var iFfin = document.getElementById('fechaIngresoHasta').value;
                                var iStartDateCol = 0;
                                var iEndDateCol = 0;
                         
                                iFini=iFini.substring(6,10) + iFini.substring(3,5)+ iFini.substring(0,2);
                                iFfin=iFfin.substring(6,10) + iFfin.substring(3,5)+ iFfin.substring(0,2);
                         
                                var datofini=aData[iStartDateCol].substring(6,10) + aData[iStartDateCol].substring(3,5)+ aData[iStartDateCol].substring(0,2);
                                var datoffin=aData[iEndDateCol].substring(6,10) + aData[iEndDateCol].substring(3,5)+ aData[iEndDateCol].substring(0,2);
                         
                                if ( iFini === "" && iFfin === "" )
                                {
                                    return true;
                                }
                                else if ( iFini <= datofini && iFfin === "")
                                {
                                    return true;
                                }
                                else if ( iFfin >= datoffin && iFini === "")
                                {
                                    return true;
                                }
                                else if (iFini <= datofini && iFfin >= datoffin)
                                {
                                    return true;
                                }
                                return false;
                            });

                             $('#fechaIngresoDesde').select( function() { dtable.draw(); } );
                              $('#fechaIngresoHasta').select( function() { dtable.draw(); } );
             
                })



                                                                      
                                      
                      $(function () {
            $('#fechaIngresoDesde').datepicker({format: 'dd/mm/yyyy'});
          });
       $(function () {
            $('#fechaIngresoHasta').datepicker({format: 'dd/mm/yyyy'});
            });

         </script>