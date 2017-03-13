  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        
        <small>Bienvenido Administrador: <?php echo$this->session->userdata('username') ?></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?=base_url()?>index.php/c_administrador"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Operador</li>
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
             
    
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section >
         

          <!-- TO DO List -->
          <div class="box box-primary">
            <div class="box-header">

              <h3 align="center">Operadores</h3>

                <div class="form-group">
                <br>
                <br>
                 <label>Filtrar Operadores por :</label>
                 <br>
                 <br>
                  <div class="box-body" style="background-color: lightblue;">
                    <div class="form-group"> 
                     <div class="row">
                       <div class="col-md-3">   
                          <label> Registración :</label><br>
                          <input data-provide="datepicker" id="fechaRegistracion" placeholder="dd/mm/aaaa" class='filter'  data-column-index='1'> 
                        </div>
                 
                       <div class="col-md-3">   
                        <label>DNI :</label><br>
                        <input type='text' value='' class='filter' data-column-index='2'> 
                       </div>
                       
                          <div class="col-md-3">                 
                            <label>Operador :</label><br>
                            <input type='text' value='' class='filter' data-column-index='3'>
                           </div>
                      
                       <div class="col-md-3">   
                          <label>Usuario :</label><br>
                          <input type='text' value='' class='filter' data-column-index='4'> 
                         </div>
                   </div>
                      <div class="row">
                       <div class="col-md-3">      
                          <label>Telefono :</label><br>
                          <input type='text' value='' class='filter' data-column-index='5'> 
                        </div>
                      <div class="col-md-3">    
                        <label>Email :</label><br>
                        <input type='text' value='' class='filter' data-column-index='6'> 
                       </div>

                       <div class="col-md-3">   
                        <label>Dirección :</label><br>
                        <input type='text' value='' class='filter' data-column-index='7'>
                      </div>

                      <div class="col-md-3">     
                         <label>Localidad :</label><br>
                        <input type='text' value='' class='filter' data-column-index='8'> 
                     </div>
                </div>
                  
            </div>
          </div>
       </div>
                <br>
                <br>


                 <div class="box-body table-responsive no-padding">     
                  <table id="operadores" class="table-bordered" style="display: none" >
                        <thead>
                          <tr>
                            <th>Operaciones</th>
                            <th>Fecha Registración</th>
                            <th>DNI</th>
                            <th>Operador</th>
                            <th>Usuario</th>
                            <th>Teléfono</th>
                            <th>Email</th>
                            <th>Dirección</th>
                           <th>Localidad</th>
                           


                          </tr>
                        </thead>

                        <tbody >
                            <?php  foreach ($operadores as $op){ 
                              $date=new DateTime($op->fechaReg);
                              $date_formated=$date->format('d/m/Y ');
                              $localidad=$this->db->get_where('localidad', array('idLocalidad'=>$op->idLocalidad))->row();

                         ?>
                      
                          <tr>

                           <td colspan="" rowspan="" headers="">
                              <div class="btn-group">
                                 <a class="btn btn-sm " href="<?=base_url()?>index.php/c_administrador/editarOperador/<?php echo $op->idUsuario?>"><button  class="btn btn-warning" ><i class="fa fa-pencil" title="Editar datos del Operador"></i></button></a> 
                                  <a class="btn btn-sm " >  <button class="btn btn-danger"  data-toggle="modal" href="#Eliminar"  onclick="ventana_eli(<?php echo "$op->idUsuario"; ?>)"><i class="fa fa-remove" title="Eliminar Operador" href="#Eliminar" ></i></button></a>
                              </div>
                           </td>

                             <td>  <?php  echo "$date_formated"; ?></td>
                             <td>  <?php  echo "$op->dni"; ?></td>
                             <td>  <?php  echo "$op->nomyap"; ?></td>
                             <td>  <?php  echo "$op->usuario"; ?></td>
                             <td>  <?php  echo "$op->telefono"; ?></td>
                             <td>  <?php  echo "$op->email"; ?></td>
                             <td>  <?php  echo "$op->direccion"; ?></td>
                             <td>  <?php  echo "$localidad->nombre"; ?></td>
                          
                           
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
                                  <h3 class="modal-title" style="color:white" >Detalles Escribano</h3>
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

          

                <div class="modal" id="Eliminar">
                      <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                         <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h3 class="modal-title" style="color:white"> Eliminar escribano</h3>
                         </div>
                         <div class="modal-body">
                         <h3> Confirmar eliminar Operador de la Base de Datos</h3>
                        

                         <div class="modal-footer">
                          <a href="" class="btn btn-default" data-dismiss="modal">Cancelar</a>
                          <a href="" class="btn btn-primary" onclick="eliminar()">Aceptar</a>
                         </div>
                      </div>
                    </div>
                  </div>
                  </div>




                  <script type="text/javascript">

                   
                   $(document).ready(function(){

                    //crea la tabla
                    var dtable=$('#operadores').DataTable(
                        {
                           autoWidht:false,
                             language: {
                                "sProcessing":     "Procesando...",
                            "sLengthMenu":     "Mostrar _MENU_ Operadores",
                            "sZeroRecords":    "No se encontraron resultados",
                            "sEmptyTable":     "Ningún Operador encontrado ",
                            "sInfo":           "Mostrando Operadores del _START_ al _END_ de un total de _TOTAL_ registros",
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
                      document.getElementById('operadores_filter').style.display='none';
                      
                       $( "#operadores" ).show();  
                    } );


                    idUsr='';
                   function ventana_eli (idUsuario){
                      idUsr=idUsuario;
                     
                   }
                   

                    //Función de detalles
                      function ventana_det( idEscribano){
                    $.post("<?=base_url()?>index.php/c_operador/detalles_esc",{idEscribano:idEscribano}, function(data){
                      $("#det_esc").html(data);
            });
                        }
                  //eliminar escribano de la bd

                   function eliminar( ){
                    $.post("<?=base_url()?>index.php/c_administrador/eliminar_op",{idUsuario:idUsr}, function(data){
                     
            });
                  }


                 //visualizar el calendario en el input fecha
                     $( document ).ready(function() {
                       $('#fechaRegistracion').datepicker();
                        });


         </script>

           
          </div>
        </div>
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