  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
       <h1>
        
        <small>Bienvenido Operador : <?php echo$this->session->userdata('username') ?></small>
      </h1>
      <ol class="breadcrumb">
        <li><a  href="<?=base_url()?>index.php/c_operador"><i class="fa fa-dashboard"></i> Home</a></li>
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
                <br>
                <br>
                 <label>Filtrar Escribanos por :</label>
                 <br>
                 <br>
                      <label>Fecha Registración :</label>
                      <input type='text' value='' class='filter' data-column-index='0'> 
                    
                        <label>Escribano :</label>
                      <input type='text' value='' class='filter' data-column-index='1'> 
                
                                      
                        <label>Usuario :</label>
                        <input type='text' value='' class='filter' data-column-index='2'>
                   
                      
                        <label>DNI :</label>
                         <input type='text' value='' class='filter' data-column-index='3'> 
                    
<br>
                        <div>
                 <br>
                        <label>Matricula :</label>
                        <input type='text' value='' class='filter' data-column-index='4'> 
                        </div>
                  
                  </div>
                </form>


                <div class="box-body table-responsive no-padding"> 
                  <table id="reg_pen" class="table-bordered" style="display: none"  >
                        <thead>
                          <tr>
                            <th>fechaReg</th>
                            <th>Escribano</th>
                            <th>Usuario</th>
                            <th>DNI</th>
                            <th>Matricula</th>
                             <th>Operaciones</th>
                          </tr>
                        </thead>

                        <tbody >
                            <?php 
                            foreach ($esc_pen as $ep){ 
                              $date=new DateTime($ep->fechaReg);
                              $date_formated=$date->format('d/m/Y ');
                         ?>
                      
                          <tr>
                             <td>  <?php  echo "$date_formated"; ?></td>
                            <td>  <?php  echo "$ep->nomyap"; ?></td>
                            <td>  <?php  echo "$ep->usuario"; ?></td>
                            <td>  <?php  echo "$ep->dni"; ?></td>
                            <td>  <?php  echo "$ep->matricula"; ?></td>


                           <td>
                            
                            <button   type="button"   class="btn btn-warning" data-toggle="modal"  onclick="ventana_det(<?php echo "$ep->idEscribano"; ?>)" href="#Detalles" >Detalles </button> 
 
                            <button type="button"  class="btn btn-success"  data-toggle="modal" onclick="ventana_acep(<?php echo "$ep->idEscribano"; ?>)" href="#Aceptar"> Aceptar</button>
                            
                            <button  type="button"  class="btn btn-danger" onclick="ventana_rech(<?php echo "$ep->idEscribano"; ?>)" data-toggle="modal" href="#Rechazar">Rechazar</button>
                            </td>
                           
                          </tr>

                          <?php
                        }
                        ?>
                       
                        </tbody>
                 </table>
                </div>
        
                         <div class="modal" id="Detalles">
                            <div class="modal-dialog modal-lg">
                              <div class="modal-content">
                                 <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                  <h3 class="modal-title" style="color:white" >Detalles</h3>
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
                          <h3 class="modal-title" style="color:white" >Aceptar Registración</h3>
                         </div>
                         <div class="modal-body">
                          <h3>Confirmar aceptar solicitud de registracion del Escribano:</h3>
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
                                               <tbody id="det_acep" >

                                              </tbody >
                                            </table >
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
                          <h3>Confirmar rechazar registración del Escribano</h3>
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
                                               <tbody id="det_rech" >

                                              </tbody >
                                            </table >
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
                             autoWidht:false,
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
                      $( "#reg_pen" ).show(); 
                  
                    } );
                  idEsc='';
                  function ventana_det( idEscribano){
                    $.post("<?=base_url()?>index.php/c_operador/detalles_esc",{idEscribano:idEscribano}, function(data){
                      $("#det_esc").html(data);
            });
                  }

                  function ventana_acep( idEscribano){
                    idEsc=idEscribano;
                    
                    $.post("<?=base_url()?>index.php/c_operador/detalles_esc",{idEscribano:idEscribano}, function(data){
                      $("#det_acep").html(data);
            });
                  }

                  function ventana_rech( idEscribano){
                    idEsc=idEscribano;
                    $.post("<?=base_url()?>index.php/c_operador/detalles_esc",{idEscribano:idEscribano}, function(data){
                      $("#det_rech").html(data);
            });
                  }

                   function aceptar( ){
                    $.post("<?=base_url()?>index.php/c_operador/aceptar_esc",{idEscribano:idEsc}, function(data){
                     
            });
                  }
                     

                   function rechazar( ){
                     var motivoRechazo=document.getElementById('motivoRechazo').value;
                    $.post("<?=base_url()?>index.php/c_operador/rechazar_esc",{idEscribano:idEsc,motivoRechazo:motivoRechazo}, function(data){
                      
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