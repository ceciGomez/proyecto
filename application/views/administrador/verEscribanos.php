

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
       <h1>
        
        <small>Bienvenido Administrador: <?php echo$this->session->userdata('username') ?></small>
      </h1>
      <small>Lista todos los Escribanos</small>
      <ol class="breadcrumb">
         <li><a href="<?=base_url()?>index.php/c_loginadmin"><i class="fa fa-dashboard"></i> Home</a></li>
         <li class="active">Ver Escribanos</li>
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
                     <h3 class="box-title">Escribanos de SIRMI</h3>


                <div class="form-group">
                <br>
                <br>
                 <label>Filtrar Escribanos por :</label>
                 <br>
                 <br>
                      <label>Fecha Registración :</label>
                      <input type='text' value='' class='filter' data-column-index='0'> 
                    
                        <label>DNI :</label>
                      <input type='text' value='' class='filter' data-column-index='1'> 
                
                                      
                        <label>Escribano :</label>
                        <input type='text' value='' class='filter' data-column-index='2'>
                        
                         <label>Matricula :</label>
                         <input type='text' value='' class='filter' data-column-index='3'> 
                    <br>
                      <br>
                        <label>Usuario :</label>
                         <input type='text' value='' class='filter' data-column-index='4'> 
                    

                         <label>Estado :</label>
                         <input type='text' value='' class='filter' data-column-index='5'> 
                           <label>Email :</label>
                        <input type='text' value='' class='filter' data-column-index='6'>
                         <label>Telefono :</label>
                        <input type='text' value='' class='filter' data-column-index='7'> 
                    
                 <br>
                    <br>     
                       
                        <label>Dirección :</label>
                        <input type='text' value='' class='filter' data-column-index='8'> 
                         <label>Localidad :</label>
                        <input type='text' value='' class='filter' data-column-index='9'> 
                        
                        <br>



                  
                  </div>
                </form>
                <br>
                <br>
                  </div>
             
             
                  <div class="box-body table-responsive no-padding">                   
                     <table id="escribanos" class="table-bordered" style="display: none" >
                        <thead>
                          <tr>
                            <th>Fecha Registración</th>
                            <th>DNI</th>
                            <th>Escribano</th>
                            <th>Matricula</th>
                            <th>Usuario</th>
                            <th>Estado</th>
                            <th>Email</th>
                            <th>Teléfono</th>
                            <th>Dirección</th>
                           <th>Localidad</th>
                           <th>Operaciones</th>


                          </tr>
                        </thead>

                        <tbody >
                            <?php  foreach ($escribanos as $es){ 
                              $date=new DateTime($es->fechaReg);
                              $date_formated=$date->format('d/m/Y ');
                              $localidad=$this->db->get_where('localidad', array('idLocalidad'=>$es->idLocalidad))->row();

                         ?>
                      
                          <tr>
                              <td>  <?php  echo "$date_formated"; ?></td>
                            <td>  <?php  echo "$es->dni"; ?></td>
                            <td>  <?php  echo "$es->nomyap"; ?></td>
                            <td>  <?php  echo "$es->matricula"; ?></td>
                           <td>  <?php  echo "$es->usuario"; ?></td>
                           <td>  <?php  echo "$es->estadoAprobacion"; ?></td>
                             <td>  <?php  echo "$es->email"; ?></td>
                            <td>  <?php  echo "$es->telefono"; ?></td>
                          
                           <td>  <?php  echo "$es->direccion"; ?></td>
                           <td>  <?php  echo "$localidad->nombre"; ?></td>
                           
                           <td colspan="" rowspan="" headers="">
                              <div class="btn-group">
                                 <a class="btn btn-sm " href="<?=base_url()?>index.php/c_administrador/editarEscribano/<?php echo $es->idEscribano?>"><button><i class="fa fa-pencil" title="Editar datos del Operador"></i></button></a> 
                                  <a class="btn btn-sm " >  <button data-toggle="modal" href="#Eliminar"  onclick="ventana_eli(<?php echo "$es->idEscribano"; ?>)"><i class="fa fa-remove" title="Eliminar Escribano" href="#Eliminar" ></i></button></a>
                              </div>
                           </td>
                           
                          </tr>

                          <?php
                        }
                        ?>
                       
                        </tbody>
                 </table>


                        

                <div class="modal" id="Eliminar">
                      <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                         <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h3 class="modal-title" style="color:white"> Eliminar Escribano</h3>
                         </div>
                         <div class="modal-body">
                         <h3> Confirmar eliminar Escribano de la Base de Datos</h3>
                        

                         <div class="modal-footer">
                          <a href="" class="btn btn-default" data-dismiss="modal">Cancelar</a>
                          <a href="" class="btn btn-primary" onclick="eliminar()">Aceptar</a>
                         </div>
                      </div>
                    </div>
                  </div>


                  <script type="text/javascript">

                   
                   $(document).ready(function(){

                    //crea la tabla
                    var dtable=$('#escribanos').DataTable(
                        {
                           autoWidht:false,
                             language: {
                                "sProcessing":     "Procesando...",
                            "sLengthMenu":     "Mostrar _MENU_ Escribanos",
                            "sZeroRecords":    "No se encontraron resultados",
                            "sEmptyTable":     "Ningún Escribanp encontrado",
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
                      document.getElementById('escribanos_filter').style.display='none';
                      
                       $( "#escribanos" ).show();  
                    } );


                    idEsc='';
                   function ventana_eli (idEscribano){
                      idEsc=idEscribano;
                     
                   }
                   

                   
                  //eliminar escribano de la bd

                   function eliminar( ){
                    $.post("<?=base_url()?>index.php/c_administrador/eliminar_es",{idEscribano:idEsc}, function(data){
                     
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

 