

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
         Ver Operadores
      </h1>
      <small>Lista todos los Operadores</small>
      <ol class="breadcrumb">
         <li><a href="<?=base_url()?>index.php/c_loginadmin"><i class="fa fa-dashboard"></i> Home</a></li>
         <li class="active">Ver Operadores</li>
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
                <div class="box-header with-border">
                     <h3 class="box-title">Operadores de SIRMI</h3>
                  </div>
              <div class="form-group">
                <br>
                <br>
                 <label>Filtrar Operadores  por :</label>
                 <br>
                 <br>
                      <label>Nombre y Apellido :</label>
                      <input type='text' value='' class='filter' data-column-index='0'> 
                    
                        <label>Usuario :</label>
                      <input type='text' value='' class='filter' data-column-index='1'> 
                
                                      
                        <label>DNI :</label>
                        <input type='text' value='' class='filter' data-column-index='2'>
                   
                      
                        <label>Teléfono :</label>
                         <input type='text' value='' class='filter' data-column-index='3'> 
                    
<br>
                        <div>
                 <br>
                        <label>Dirección :</label>
                        <input type='text' value='' class='filter' data-column-index='4'> 
                        

                        <label>Email :</label>
                        <input type='text' value='' class='filter' data-column-index='5'> 
                        </div>
                  
                  </div>
                </form>
                <br>
                <br>
             
               <div class="box-body table-responsive no-padding">
                  <table  id="usuarios" class="table table-hover" class="table-bordered" style="display: none">
                     <thead>
                        <tr>
                           <th>Nombre y Apellido</th>
                           <th>Usuario</th>
                           <th>DNI</th>
                           <th>Teléfono</th>
                           <th>Dirección</th>
                           <th>e-mail</th>
                           <th>Localidad</th>
                           <th>Operaciones</th>
                        </tr>
                     </thead>
                     <tbody>
                       
                        <?php foreach ($operadores as $value) :
                        //var_dump($value) 
                        ?>
                        <tr>
                           <td colspan="" rowspan="" headers=""> <?php echo $value->nomyap;?> </td>
                           <td colspan="" rowspan="" headers=""><?php echo $value->usuario;?> </td>
                           <td colspan="" rowspan="" headers=""><?php echo $value->dni;?> </td>
                           <td colspan="" rowspan="" headers=""><?php if($value->telefono == NULL){
                              echo "-";
                            } else{
                            echo $value->telefono;
                              } ?></td>
                           <td colspan="" rowspan="" headers=""><?php if($value->direccion == NULL){
                              echo "-";
                            } else{
                            echo $value->direccion;
                              } ?></td>
                           <td colspan="" rowspan="" headers=""><?php if($value->email == NULL){
                              echo "-";
                            } else{
                            echo $value->email;
                              } ?></td>
                           <td colspan="" rowspan="" headers=""><?php echo $value->idLocalidad;?> </td>

                                                                           
                           <td colspan="" rowspan="" headers="">
                              <div class="btn-group">
                                 <a class="btn btn-sm " href="<?=base_url()?>index.php/c_administrador/editarOperador/<?php echo $value->idUsuario?>"><button><i class="fa fa-pencil" title="Editar datos del Operador"></i></button></a> 
                                 <a class="btn btn-sm "  data-toggle="modal" href="#Eliminar"  onclick="ventana_eli(<?php echo "$value->idUsuario"; ?>)"> <button><i class="fa fa-remove" title="Eliminar Operador" href="#Eliminar" ></i></button></a>
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

                        <div class="modal" id="Eliminar">
                            <div class="modal-dialog modal-lg">
                              <div class="modal-content">
                                 <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                  <h3 class="modal-title" style="color:white" >Eliminar Operador</h3>
                                 </div>
                                 <div class="modal-body">
                                           <div> <img src="<?=base_url().'images/error.png'?>" width='40px' height="40px" > <label><h3>Confirmar eliminar el operador de la Base de Datos.</h3></label></div>
                                     </div> 

                                 <div class="modal-footer">
                                   <a href="" class="btn btn-default" data-dismiss="modal">Cancelar</a>
                                    <a href="" class="btn btn-primary" onclick="eliminar_operador()">Aceptar</a>
                                 </div>
                              </div>
                            </div>
                          </div>
<script type="text/javascript">

                   
                   $(document).ready(function(){

                    //crea la tabla
                    var dtable=$('#usuarios').DataTable(
                        {
                           autoWidht:false,
                             language: {
                                "sProcessing":     "Procesando...",
                            "sLengthMenu":     "Mostrar _MENU_ usuarios",
                            "sZeroRecords":    "No se encontraron resultados",
                            "sEmptyTable":     "Ningún operador  encontrado",
                            "sInfo":           "Mostrando oeprador del _START_ al _END_ de un total de _TOTAL_ registros",
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
                      document.getElementById('usuarios_filter').style.display='none';
                      $( "#usuarios" ).show();  
                       
                    } );
                      idUsuario='';
                      function ventana_eli (idUsu){
                      idUsuario=idUsu;
                      };
                   
                    function eliminar_operador (){
                     console.log(idUsuario);
                      $.post("<?=base_url()?>index.php/c_administrador/eliminar_operador",{idUsuario:idUsuario}, function(data){
                     
                   }
                    )};

                  

         </script>
<!-- /.content-wrapper -->

