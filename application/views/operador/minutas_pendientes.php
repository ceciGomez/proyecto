  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Operador
        <small>Bienvenido</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Operador</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-12 connectedSortable">
         

          <!-- TO DO List -->
          <div class="box box-primary">
            <div class="box-header">

              <h3 class="box-title">Usuarios Pendientes de Aprobación</h3>

              
                <div class="form-group">
                    
                        <label>ID Minuta :</label>
                      <input type='text' value='' class='filter' data-column-index='0'> 
                
                                      
                        <label>ID Escribano :</label>
                        <input type='text' value='' class='filter' data-column-index='2'>
                   
                      
                        <label>Nombre y Apellido de Escribano :</label>
                         <input type='text' value='' class='filter' data-column-index='3'> 
                    
                    
                  
                        <label>Fecha Ingreso :</label>
                        <input type='text' value='' class='filter' data-column-index='4'> 
                  
                  </div>
                </form>



                  <table id="min_pen"  width="2000px" >
                        <thead>
                          <tr>
                            <th>ID Minuta</th>
                             <th>Operaciones</th>
                            <th> ID Escribano</th>
                            <th>Nombre y Apellido Escribano</th>
                            <th>Fecha Ingreso al Sistema</th>
                            <th>Fecha de Edición</th>
                            <th>Estado</th>
                            
                            
                          </tr>
                        </thead>

                        <tbody >
                            <?php 
                            foreach ($minutas as $mi){ 
                         ?>
                      
                          <tr>
                            <td>  <?php  echo "$mi->idMinuta"; ?></td>
                            <td>
                             <button type="button"  class="btn btn-warning"  data-toggle="modal" onclick="ventana_det(<?php echo "$mi->idMinuta"; ?>)" href="#Detalles"> Detalles</button>
                            <button type="button"  class="btn btn-success"  data-toggle="modal" onclick="ventana_acep(<?php echo "$mi->idMinuta"; ?>,<?php echo "$mi->idEstadoMinuta"; ?>)" href="#Aceptar"> Aceptar</button>
                             <button type="button"  class="btn btn-danger"  data-toggle="modal" onclick="ventana_rech(<?php echo "$mi->idMinuta"; ?>,<?php echo "$mi->idEstadoMinuta"; ?>)" href="#Rechazar"> Rechazar</button>

                            </td>
                            <td>  <?php  echo "$mi->idEscribano"; ?></td>
                            <td>  <?php  echo "$mi->nomyap"; ?></td>
                            <td>  <?php  echo "$mi->fechaIngresoSys"; ?></td>
                            <td>  <?php  echo "$mi->fechaEdicion"; ?></td>
                            <td>  <?php  echo "$mi->estadoMinuta"; ?></td>


                          
                          
                           
                          </tr>

                          <?php
                        }
                        ?>
                       
                        </tbody>
                 </table>

        
                         <div class="modal" id="Detalles">
                            <div class="modal-dialog modal-lg">
                              <div class="modal-content">
                                 <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                  <h3 class="modal-title" style="color:white" >Detalles de Minuta</h3>
                                 </div>
                                 <div class="modal-body" id="det" >
                                           
                                     </div>

                                 <div class="modal-footer">
                                  <a href="" class="btn btn-default" data-dismiss="modal">Cerrar</a>
                                 </div>
                              </div>
                            </div>
                          </div>

                         
                 <div class="modal" id="Aceptar">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                         <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h3 class="modal-title" style="color:white" >Aceptar Minuta</h3>
                         </div>
                         <div class="modal-body">
                          <h3>Confirmar aceptar la minuta</h3>
                              <div  id="acep_min" ">
                                
                              </div>
                         </div>

                         <div class="modal-footer">
                          <a href="" class="btn btn-default" data-dismiss="modal">Cancelar</a>
                          <a href="" class="btn btn-primary" onclick="aceptar()">Aceptar</a>
                         </div>
                      </div>
                    </div>
                  </div>


                 <div class="modal" id="Rechazar">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                         <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h3 class="modal-title" style="color:white">Rechazar Registración</h3>
                         </div>
                         <div class="modal-body">
                          <h3>Confirmar rechazar Minuta</h3>
                            <div  id="rech_min" >
                              

                            </div> 
                           <div>
                              <label style="display: block;">Ingrese motivo de rechazo :</label>
                                <textarea id="motivoRechazo" rows="10" cols="100" ></textarea>
                          </div>
                           
                         </div>

                         <div class="modal-footer">
                          <a href="" class="btn btn-default" data-dismiss="modal">Cerrar</a>
                          <a href="" class="btn btn-primary" onclick="rechazar()">Aceptar</a>
                         </div>
                      </div>
                    </div>
                  </div>
                      
                  <script type="text/javascript">
            
                   

                   $(document).ready(function(){

                    //crea la tabla
                    var dtable=$('#min_pen').DataTable(
                        {
                           scrollY: 400,
                            'scrollX':true,

                             language: {
                                "sProcessing":     "Procesando...",
                            "sLengthMenu":     "Mostrar _MENU_ Minutas",
                            "sZeroRecords":    "No se encontraron resultados",
                            "sEmptyTable":     "Ningúna minuta con solicitud pendiente de aprobación",
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
                          dtable.column($(this).data('columnIndex')).search(this.value).draw();
                      });
                      
                      $( ".dataTables_filter input" ).on( 'keyup change',function() {
                       //clear column search values
                          dtable.columns().search('');
                         //clear input values
                         $('.filter').val('');
                    }); 

                      //quitar el campo de busqueda por defecto
                      document.getElementById('min_pen_filter').style.display='none';

                      $(document.body).animate({opacity: 0.3}, 400);
                      $("html, body").animate({ scrollTop: 0 }, 400);
                      $(document.body).animate({opacity: 1}, 400);   
                  
                    } );
                    idEstMin=''
                    function ventana_det(idMinuta){
                    $.post("<?=base_url()?>index.php/c_operador/detalles_minuta",{idMinuta:idMinuta}, function(data){
                      $("#det").html(data);
            });
                  }
                   function ventana_acep(idMinuta,idEstadoMinuta){
                    idEstMin=idEstadoMinuta;
                    $.post("<?=base_url()?>index.php/c_operador/detalles_minuta",{idMinuta:idMinuta}, function(data){
                      $("#acep_min").html(data);
            });
                  }

             function ventana_rech(idMinuta,idEstadoMinuta){
                   idEstMin=idEstadoMinuta;
                    $.post("<?=base_url()?>index.php/c_operador/detalles_minuta",{idMinuta:idMinuta}, function(data){
                      $("#rech_min").html(data);
            });
                  }

               function aceptar( ){
                    $.post("<?=base_url()?>index.php/c_operador/aceptar_min",{idEstadoMinuta:idEstMin}, function(data){
                     
            });
                  }
                     

                   function rechazar( ){
                     var motivoRechazo=document.getElementById('motivoRechazo').value;
                    $.post("<?=base_url()?>index.php/c_operador/rechazar_min",{idEstadoMinuta:idEstMin,motivoRechazo:motivoRechazo}, function(data){
                      
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