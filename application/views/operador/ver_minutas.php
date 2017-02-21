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
                    
                        <label>Fecha Ingreso :</label>
                      <input type='text' value='' class='filter' data-column-index='0'> 
                
                                      
                        <label>Fecha Edición :</label>
                        <input type='text' value='' class='filter' data-column-index='1'>
                   
                      
                        <label>ID Minuta :</label>
                         <input type='text' value='' class='filter' data-column-index='2'> 
                    
                    
                  
                        <label>DNI Escribano :</label>
                        <input type='text' value='' class='filter' data-column-index='4'> 

                        <label>Nombre y Apellido Escribano :</label>
                        <input type='text' value='' class='filter' data-column-index='4'>
                  
                  </div>
                </form>



                  <table id="min"  width="2000px" >
                        <thead>
                          <tr> 
                          <th>Fecha Ingreso al Sistema</th>
                          <th>Fecha de Edición</th>
                          <th>ID Minuta</th>
                          <th>Operaciones</th>
                          <th>DNI Escribano</th>
                          <th>Nombre y Apellido Escribano</th> 
                            
                            
                          </tr>
                        </thead>

                        <tbody >
                            <?php 
                            foreach ($minutas as $mi){ 
                         ?>
                            
                          <tr>
                            <td>  <?php  echo "$mi->fechaIngresoSys"; ?></td>
                            <td>  <?php  echo "$mi->fechaEdicion"; ?></td>
                            <td>  <?php  echo "$mi->idMinuta"; ?></td>

                            <td>
                             <button type="button"  class="btn btn-warning"  data-toggle="modal" onclick="ventana_det(<?php echo "$mi->idMinuta"; ?>)" href="#Detalles"> Detalles</button>
                            <button type="button"  class="btn btn-success"  data-toggle="modal" onclick="ventana_estados(<?php echo "$mi->idMinuta"; ?>)" href="#Estados"> Estados</button>
                             

                            </td>
                            
                            <td>  <?php  echo "$mi->dni"; ?></td>
                            <td>  <?php  echo "$mi->nomyap"; ?></td>
                            


                          
                          
                           
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

                         
                 <div class="modal" id="Estados">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                         <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h3 class="modal-title" style="color:white" >Aceptar Minuta</h3>
                         </div>
                         <div class="modal-body">
                         <label><h3>ID MINUTA :</label> <label id='minuta'></label></h3>
                               <br>
                               <br>
                               <table class="table"  >
                                            <thead>
                                              <tr>
                                                <th>ID Estado Minuta</th>
                                                <th>Estado</th>
                                                <th>Motivo de Rechazo</th>
                                                <th>Fecha de Estado</th>
                                                 <th> ID Operador</th>
                                                 <th>Operador</th>
                                                 
                                               </tr>
                                             </thead> 
                                               <tbody id="estados_min" >

                                              </tbody >
                                            </table >
                         </div>

                         <div class="modal-footer">
                          <a href="" class="btn btn-primary" onclick="aceptar()">Aceptar</a>
                         </div>
                      </div>
                    </div>
                  </div>


                      
                  <script type="text/javascript">
            
                   

                   $(document).ready(function(){

                    //crea la tabla
                    var dtable=$('#min').DataTable(
                        {
                           scrollY: 400,
                            'scrollX':true,

                             language: {
                                "sProcessing":     "Procesando...",
                            "sLengthMenu":     "Mostrar _MENU_ Minutas",
                            "sZeroRecords":    "No se encontraron resultados",
                            "sEmptyTable":     "Ningúna Minuta encontrada",
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
                      document.getElementById('min_filter').style.display='none';

                      $(document.body).animate({opacity: 0.3}, 400);
                      $("html, body").animate({ scrollTop: 0 }, 400);
                      $(document.body).animate({opacity: 1}, 400);   




                      var dtable=$('#estados_mim').DataTable(
                        {
                           scrollY: 400,
                            'scrollX':true,

                             language: {
                                "sProcessing":     "Procesando...",
                            "sLengthMenu":     "Mostrar _MENU_ Estados",
                            "sZeroRecords":    "No se encontraron resultados",
                            "sEmptyTable":     "Ningún Estado Encontrador",
                            "sInfo":           "Mostrando Estados del _START_ al _END_ de un total de _TOTAL_ registros",
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
                          document.getElementById('estados_min_filter').style.display='none';
                  
                    } );
                    
                    function ventana_det(idMinuta){
                    $.post("<?=base_url()?>index.php/c_operador/detalles_minuta",{idMinuta:idMinuta}, function(data){
                      $("#det").html(data);
            });
                  }
                    function ventana_estados(idMinuta){
                    $.post("<?=base_url()?>index.php/c_operador/ver_estados",{idMinuta:idMinuta}, function(data){
                      $("#estados_min").html(data);
                      $("#minuta").html(idMinuta);
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