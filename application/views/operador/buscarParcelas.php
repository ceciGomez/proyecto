  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
  

    <!-- Main content -->
    <section class="content">
    
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
         <h3 align="center">Buscar Parcelas</h3>
        <section >
         

               <!-- TO DO List -->
          <div class="box box-primary">
            <div class="box-header">

             

                 <label>Filtrar Parcelas por :</label>
                 
                  <div class="box-body" style="background-color: lightblue;">
                      
                    <div class="row">
                      <div class="col-md-3">
                          <label>Fecha Ingreso desde :</label><br>
                        <input type="text"   id="fechaIngresoDesde" data-provide="datepicker" placeholder="dd/mm/aaaa"   > 
                      </div>

                       <div class="col-md-3">
                          <label>Fecha Ingreso hasta :</label><br>
                        <input type="text"   id="fechaIngresoHasta" data-provide="datepicker" placeholder="dd/mm/aaaa" > 
                      </div>

                       <div class="col-md-3">
                         <label>Fecha Escritura :</label><br>
                        <input type="text" data-provide="datepicker"   id="fechaIngresoHasta" placeholder="dd/mm/aaaa"  class='filter' data-column-index='2'> 
                    </div>

                       <div class="col-md-3">
                        <label>Circunscripcion :</label><br>
                        <input type='text' id="circunscripcion"  class='filter' data-column-index='3'> 
                        
                      </div>
                       <div class="col-md-3">
                        <label>Sección :</label><br>
                        <input type='text' id="seccion"  class='filter' data-column-index='4'> 
                        
                      </div>
                      <div class="col-md-3">
                          <label>Chacra :</label><br>
                        <input type='text' id="chacra"  class='filter' data-column-index='5'> 
                        </div>
                      <div class="col-md-3">
                        <label>Quinta :</label><br>
                        <input type='text' id="quinta"  class='filter' data-column-index='6'> 
                        </div>

                       <div class="col-md-3">
                        <label>Fracción :</label><br>
                        <input type='text' id="fraccion"  class='filter' data-column-index='7'> 
                        </div>
                        <div class="col-md-3"> 
                         <label>Manzana :</label><br>
                        <input type='text' id="manzana"  class='filter' data-column-index='8'> 
                        </div>
                       <div class="col-md-3">
                        <label>Parcela :</label><br>
                        <input type='text' id="parcela"  class='filter' data-column-index='9'> 
                        </div>
                        <div class="col-md-3">
                        <label>Número Unidad Funcional:</label><br>
                        <input type='text' id="parcela"  class='filter' data-column-index='10'> 
                        </div>
                        <div class="col-md-3">
                        <label>Tipo Unidad Funcional :</label><br>
                        <input type='text' id="parcela"  class='filter' data-column-index='11'> 
                        </div>
                        <div class="col-md-3">
                        <label>Número de Plano :</label><br>
                        <input type='text' id="parcela"  class='filter' data-column-index='12'> 
                        </div>
                       <div class="col-md-3">
                        <label>Número de Matrícula :</label><br>
                        <input type='text' id="localidad"  class='filter' data-column-index='13'> 
                      </div>
                    </div>
                    <br>
                    <br>
                  

                        



                  
                  </div>
                  </div>
                  
               


                   <div class="box-body table-responsive no-padding">               
                         <table id="parcelas" class="table-bordered" style="display: none" >
                        <thead>
                          <tr> 
                          <th>Opciones</th>
                          <th>Fecha Ingreso</th>
                          <th>Fecha Escritura</th>
                          <th>Circunscripción</th>
                          <th>Sección</th>
                          <th>Chacra</th>
                          <th>Quinta</th>
                          <th>Fraccion</th>
                          <th>Manzana</th>
                          <th>Parcela</th>
                          <th>Nro Unidad Funcional</th>
                          <th>Tipo Unidad Funcional</th>
                          <th>Número de Plano</th>
                          <th>Número de Matrícula</th>
                          <th>Localidad</th>
                        
                          
                            
                          </tr>
                        </thead>

                        <tbody >
                       
                            <?php 
                            

                            foreach ($parcelas as $pa){ 

                               $date=new DateTime($pa->fechaIngresoSys);
                              $date_formated=$date->format('d/m/Y ');
                               $date2=new DateTime($pa->fechaEscritura);
                              $date_formated2=$date2->format('d/m/Y ');
                              $localidad=$this->db->get_where('localidad', array('idLocalidad'=>$pa->idLocalidad))->row();
                         ?>
                            <?php 
                         /*
                         $this->db->from('estadominuta');
                         $this->db->where('idMinuta', $mi->idMinuta); 
                         $this->db->order_by('idEstadoMinuta', 'DESC');
                         $estadoMinuta= $this->db->get()->row();
                         */
                             ?>

                          <tr>
                            <td>
                            <div>
                                 <a class="btn btn-sm " > <button  class="btn btn-warning"  data-toggle="modal" href="#detallesParcela" title="Detalles de Parcela" onclick="ventana_det(<?php echo $pa->idParcela ; ?>)"><i class="fa fa-book"></i></button></a>
            
                                   <form   style="display:inline; " action="<?php echo base_url()?>index.php/c_operador/buscar_min_id" method="post" >
                                      <input type="hidden" value='<?php echo $pa->idMinuta; ?>' id="idMinuta" name='idMinuta'>
                                       <a class="btn btn-sm " > <button  class="btn btn-info"  data-toggle="modal" title="Ver Minuta"  type='submit'><i class="glyphicon glyphicon-th-list"></i></button></a>
                                    </form>

                                    </div>
                           


                            

                                                         

                            </td>
                            <td>  <?php  echo $date_formated; ?></td>
                            <td>  <?php  echo $date_formated2; ?></td>
                            <td>   <?php  if($pa->circunscripcion==null) echo "";else   echo $pa->circunscripcion; ?> </td>
                            <td>   <?php  if($pa->seccion==null) echo "";else echo  $pa->seccion; ?> </td>
                            <td>   <?php  if( $pa->chacra==null) echo "";else echo   $pa->chacra; ?> </td>
                            <td>  <?php  if($pa->quinta==null) echo "";else echo   $pa->quinta; ?> </td>
                            <td>  <?php  if( $pa->fraccion==null) echo "";else echo  $pa->fraccion; ?> </td>
                            <td>   <?php  if($pa->manzana==null) echo "";else echo  $pa->manzana; ?> </td>
                            <td>   <?php  if($pa->parcela==null) echo "";else echo  $pa->parcela; ?> </td>
                            <td>   <?php  if($pa->nroUfUc==null) echo "";else echo  $pa->nroUfUc; ?> </td>
                            <td>   <?php  if($pa->tipoUfUc==null) echo "";else echo  $pa->tipoUfUc; ?> </td>
                            <td>   <?php  if($pa->planoAprobado==null) echo "";else echo  $pa->planoAprobado; ?> </td>
                            <td>   <?php  if($pa->nroMatriculaRPI==null) echo "";else echo  $pa->nroMatriculaRPI; ?> </td>
                            <td>   <?php  if( $localidad->nombre==null) echo "";else echo   $localidad->nombre; ?> </td>
                          

                          
                             
                            
                            


                          
                          
                           
                          </tr>

                          <?php
                        }
                        ?>
                       
                        </tbody>
                 </table>
                 </div>
                    <div class="modal" id="detallesParcela">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                         <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h3 class="modal-title" style="color:white" >Detalles Parcela</h3>
                         </div>
                         <div class="modal-body">
                          <div>
                              <table class="table" class="table-bordered"  >
                                         
                                               <tbody id="det_parcela" >
                                                  <tr>
                                                   
                                                  </tr>
                                              </tbody >
                                            </table >
                          </div>
                         </div>

                         <div class="modal-footer">
                          <a href="" class="btn btn-default" data-dismiss="modal">Cerrar</a>
                         </div>
                      </div>
                    </div>
                  </div>
                        

        
                         
                      
                  <script type="text/javascript">
            
                   

                   $(document).ready(function(){

                    //crea la tabla
                    var dtable=$('#parcelas').DataTable(
                        {
                           autoWidht:false,
                          "order": [[ 1, "desc" ]],

                             language: {
                                "sProcessing":     "Procesando...",
                            "sLengthMenu":     "Mostrar _MENU_ Parcelas",
                            "sZeroRecords":    "No se encontraron resultados",
                            "sEmptyTable":     "Ningúna Parcela encontrada",
                            "sInfo":           "Mostrando Parcelas del _START_ al _END_ de un total de _TOTAL_ registros",
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
                      //filtra por estados
                       $('#segunEstado').on('change', function()
                        {
                         
                             dtable.column("4").search(this.value).draw();

                          console.log(this.value);
                        });

                      //quitar el campo de busqueda por defecto
                      document.getElementById('parcelas_filter').style.display='none';
                      //oara  mostrar la tabla despues de que se carga

                       $( "#parcelas" ).show();

                       //filtrar por fechas desde y haste de ingreso
                        $.fn.dataTableExt.afnFiltering.push(
                            function( oSettings, aData, iDataIndex ) {
                                var iFini = document.getElementById('fechaIngresoDesde').value;
                                var iFfin = document.getElementById('fechaIngresoHasta').value;
                                var iStartDateCol = 1;
                                var iEndDateCol = 1;
                         
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
                                                                      
                                         } );

                          //

                      function ventana_det(idParcela){
                    $.post("<?=base_url()?>index.php/c_operador/detalles_parcela",{idParcela:idParcela}, function(data){
                      $("#det_parcela").html(data);
                        });
                              }
                                
                   


                  


                
                  
         </script>

           
          </div>
          <!-- /.box -->

       

        </section>
        <!-- /.Left col -->
      
      </div>
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->