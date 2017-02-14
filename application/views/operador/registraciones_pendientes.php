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

               <form >
                    <h3>Filtrar lista</h3>
                    <br>
                     <div class="form-group">
                    
                        <label>Nombre y Apellido :</label>
                       <div><input type='text' value='' class='filter' data-column-index='0'> </div>
                       
                
                    <br>
                   
                        <label>Usuario :</label>
                       <div>  <input type='text' value='' class='filter' data-column-index='1'> </div>
                   
                    <br>
                     
                        <label>DNI :</label>
                        <div> <input type='text' value='' class='filter' data-column-index='2'> </div>
                    
                    <br>
                  
                        <label>Matricula :</label>
                        <div> <input type='text' value='' class='filter' data-column-index='3'> </div>
                  
                  </div>
                </form>



                  <table id="reg_pen"  >
                        <thead>
                          <tr>
                            <th>Nombre y Apellido</th>
                            <th>Usuario</th>
                            <th>DNI</th>
                            <th>Matricula</th>
                             <th>Operaciones</th>
                          </tr>
                        </thead>

                        <tbody >
                            <?php 
                            foreach ($esc_pen as $ep){ 
                         ?>
                      
                          <tr>
                            <td>  <?php  echo "$ep->nomyap"; ?></td>
                            <td>  <?php  echo "$ep->usuario"; ?></td>
                            <td>  <?php  echo "$ep->dni"; ?></td>
                            <td>  <?php  echo "$ep->matricula"; ?></td>

                            <td>
                            <button   type="button"   class="btn btn-warning" data-toggle="modal"  onclick="detalles(<?php echo "$ep->idEscribano"; ?>)" href="#Detalles" >Detalles </button> 

                            <button type="button"  class="btn btn-success"  data-toggle="modal" onclick="guardar_esc(<?php echo "$ep->idEscribano"; ?>)" href="#Aceptar"> Aceptar</button>
                            <button  type="button"  class="btn btn-danger" onclick="guardar_esc(<?php echo "$ep->idEscribano"; ?>)" data-toggle="modal" href="#Rechazar">Rechazar</button>
                            </td>
                           
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
                                  <h3 class="modal-title">Detalles</h3>
                                 </div>
                                 <div class="modal-body">
                                          <table class="table"  >
                                            <thead>
                                              <tr>
                                                <th>Nombre y Apellido</th>
                                                <th>Usuario</th>
                                                <th>DNI</th>
                                                <th>Matricula</th>
                                                 <th>Direccion</th>
                                                 <th>Email</th>
                                                 <th>Telefono</th>
                                                 <th>Estado de Aprobacion</th>
                                               </tr>
                                             </thead> 
                                               <tbody id="det_esc" >

                                              </tbody >
                                            </table >
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
                          <h3 class="modal-title">Aceptar/h3>
                         </div>
                         <div class="modal-body">
                          Confirmar aceptar solicitud de registracion del Escribano:

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
                          <h3 class="modal-title">Rechazar</h3>
                         </div>
                         <div class="modal-body">
                          Confirmar rechazar registración del Escribano
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
                    var dtable=$('#reg_pen').DataTable(
                        {
                           scrollY: 400,
                             language: {
                                "sProcessing":     "Procesando...",
                            "sLengthMenu":     "Mostrar _MENU_ Escribanos",
                            "sZeroRecords":    "No se encontraron resultados",
                            "sEmptyTable":     "Ningún escribano con solicitud pendiente de aprobación",
                            "sInfo":           "Mostrando Escribanos del _START_ al _END_ de un total de _TOTAL_ registros",
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
                      document.getElementById('reg_pen_filter').style.display='none';

                      $(document.body).animate({opacity: 0.3}, 400);
                      $("html, body").animate({ scrollTop: 0 }, 400);
                      $(document.body).animate({opacity: 1}, 400);   
                  
                    } );
                  idEscribano='';
                   function guardar_esc(idEscr){
                      idEscribano=idEscr;
                      console.log(idEscribano);
                   }

                  function detalles( idEscribano){
                    $.post("<?=base_url()?>index.php/c_loginop/detalles_esc",{idEscribano:idEscribano}, function(data){
                      $("#det_esc").html(data);
            });
                  }

                   function aceptar( ){
                    $.post("<?=base_url()?>index.php/c_loginop/aceptar_esc",{idEscribano:idEscribano}, function(data){
                     
            });
                      console.log(idEscribano);
                  }

                   function rechazar( ){
                       var motivoRechazo=document.getElementById('motivoRechazo').value;
                       
                    $.post("<?=base_url()?>index.php/c_loginop/rechazar_esc",{idEscribano:idEscribano,motivoRechazo:motivoRechazo}, function(data){
                      
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