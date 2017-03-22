

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   
  <section class="content">
    
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
         <h3  align="center">Gestión de Escribanos</h3>
        <section >
         

               <!-- TO DO List -->
          <div class="box box-primary">
            <div class="box-header">
                


               
                 <label>Filtrar Escribanos por :</label>
               
                <div class="box-body" style="background-color: lightblue;">
                     
                         <div class="row">
                            <div class="col-md-3">
                              <label>Registración :</label><br>
                              <input data-provide="datepicker" id="fechaRegistracion" placeholder="dd/mm/aaaa" class='filter' data-column-index='1'> 
                            </div>
                            <div class="col-md-3">
                               <label>DNI:</label><br>
                              <input type='text' id="dniEscribano" value='<?php echo $this->session->flashdata('noti_esc')["dniEscribano"]; ?>' class='filter' data-column-index='2'>
                            </div>

                            <div class="col-md-3">
                               <label>Escribano :</label><br>
                              <input type='text' value='' class='filter' data-column-index='3'>
                            </div>
                             <div class="col-md-3">
                               <label>Matricula :</label><br>
                                 <input type='text' value='' class='filter' data-column-index='4'> 
                            </div>
                          </div>
                         
                         <div class="row">
                         
                          <div class="col-md-3">
                             <label>Usuario :</label><br>
                               <input type='text' value='' class='filter' data-column-index='5'> 
                          </div>

                          <div class="col-md-3">
                           <label>Estado :</label><br>
                            <input type="hidden" value= '<?php echo $this->session->flashdata('noti_esc')["estado"]; ?>' id="estado"> 
                            <select id="segunEstado">
                                 <option value=""></option>
                                <option value="P">P</option>
                                <option value="A">A</option>
                                <option value="R">R</option>
                               
                            </select>
                          </div>
                          <div class="col-md-3">
                              <label>Email :</label><br>
                              <input type='text' value='' class='filter' data-column-index='7'>
                          </div>
                          <div class="col-md-3">
                            <label>Telefono :</label><br>
                              <input type='text' value='' class='filter' data-column-index='8'> 
                          </div>
                        
                        </div>
                       
                         <div class="row">
                          
                          <div class="col-md-3">
                              <label>Dirección :</label><br>
                              <input type='text' value='' class='filter' data-column-index='8'> 
                          </div>
                          <div class="col-md-3">
                              <label>Localidad :</label><br>
                              <input type='text' value='' class='filter' data-column-index='9'> 
                          </div>
                        </div>
                    
                  
                       </div>
                  </div>    
                </div>   

              
             
             
                  <div class="box-body table-responsive no-padding">                   
                     <table id="escribanos" class="table-bordered" style="display: none" >
                        <thead>
                          <tr>
                            <th>Operaciones</th>
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
                            <th>Operador</th>
                          


                          </tr>
                        </thead>

                        <tbody >
                            <?php  foreach ($escribanos as $es){ 
                              $date=new DateTime($es->fechaReg);
                              $date_formated=$date->format('d/m/Y ');
                              
                              $localidad=$this->db->get_where('localidad', array('idLocalidad'=>$es->idLocalidad))->row();            
                         ?>
                          <tr>
                             <td >

                              <?php  
                                if($es ->estadoAprobacion=='P'){
                                  ?>
                                    <a class="btn btn-sm " > <button class="btn btn-success" data-toggle="modal" href="#Aceptar" onclick="ventana_acep(<?php echo $es->idEscribano?>,<?php echo $this->session->userdata('id_usuario'); ?>)" ><i  class="fa fa-check" title="Aceptar Escribano " ></i></button></a>

                                    <a class="btn btn-sm " > <button class="btn btn-danger" data-toggle="modal" href="#Rechazar" title="Rechazar Escribano" onclick="ventana_rech(<?php echo $es->idEscribano; ?>,<?php echo $this->session->userdata('id_usuario'); ?>)" ><i class="fa fa-times"></i></button></a>

                                  <?php  
                                };
                              ?>
                                 <a class="btn btn-sm "  href="<?=base_url()?>index.php/c_operador/editarEscribano/<?php echo $es->idEscribano?>"><button  class="btn btn-warning"  data-toggle="modal"><i class="fa fa-pencil" title="Editar datos del Escribano"></i></button></a> 

                                  <a class="btn btn-sm " >  <button class="btn btn-info" data-toggle="modal"  href="#Eliminar"  onclick="ventana_eli(<?php echo $es->idEscribano; ?>)"><i class="fa fa-remove" title="Eliminar Escribano" href="#Eliminar" ></i></button></a>
                              
                           </td>
                            <td style=<?php if ($es->baja=='1') echo "'color:red;'";else echo"' '" ;?> >  <?php  echo "$date_formated"; ?></td>
                            <td style=<?php if ($es->baja=='1') echo "'color:red;'";else echo"' '" ;?> >  <?php   if($es->dni==null) echo "";else echo "$es->dni"; ?></td>
                            <td style=<?php if ($es->baja=='1') echo "'color:red;'";else echo"' '" ;?>>  <?php   if($es->nomyap==null) echo "";else echo "$es->nomyap"; ?></td>
                            <td style=<?php if ($es->baja=='1') echo "'color:red;'";else echo"' '" ;?> >  <?php   if($es->matricula==null) echo "";else  echo "$es->matricula"; ?></td>
                            <td style=<?php if ($es->baja=='1') echo "'color:red;'";else echo"' '" ;?> >  <?php   if($es->usuario==null) echo ""; else echo "$es->usuario"; ?></td>
                            <td style=<?php if ($es->baja=='1') echo "'color:red;'";else echo"' '" ;?>>  <?php   if($es->estadoAprobacion==null) echo "";else {
                              echo "$es->estadoAprobacion";
                              if ($es->estadoAprobacion=="R"){
                                      ?> 
                                          <a class="btn btn-sm " >  <button class="btn btn-info" data-toggle="modal"  href="#motRechazo"  onclick="ventana_motivoRechazo(<?php echo $es->idEscribano ?>)"><i  title="Motivo Rechazo del Escribano" href="#motRechazo" >Motivo</i></button></a>
                                      <?php
                              }
                          } 
                            ?></td>
                            <td style=<?php if ($es->baja=='1') echo "'color:red;'";else echo"' '" ;?> >  <?php   if($es->email==null) echo ""; else echo "$es->email"; ?></td>
                            <td style=<?php if ($es->baja=='1') echo "'color:red;'";else echo"' '" ;?> >  <?php   if($es->telefono==null) echo ""; else echo "$es->telefono"; ?></td>
                          
                           <td style=<?php if ($es->baja=='1') echo "'color:red;'";else echo"' '" ;?> >  <?php   if($es->direccion==null) echo ""; else echo "$es->direccion"; ?></td>
                           <td style=<?php if ($es->baja=='1') echo "'color:red;'";else echo"' '" ;?> >  <?php  if($localidad==null) echo "";else echo "$localidad->nombre"; ?></td>
                           
                           <td style=<?php if ($es->baja=='1') echo "'color:red;'";else echo"' '" ;?> >  <?php  if($es->idUsuario==null) echo "";else {
                            $this->db->from('usuariosys');
                         $this->db->where('idUsuario', $es->idUsuario); 
                         $usuario= $this->db->get()->row();

                           echo "$usuario->nomyap";} ?></td>
                           
                          </tr>

                          <?php
                        }
                        ?>
                       
                        </tbody>

                 </table>

                 </div>

                <div class="modal" id="motRechazo">
                      <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                         <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h3 class="modal-title" style="color:white"> Motivo de Rechazo Escribano</h3>
                         </div>
                         <div class="modal-body">
                         <br>
                         <br>
                         <div style="border-radius: 5px; border-color: " id="mr"></div>
                        <br>
                        <br>

                         <div class="modal-footer">
                          <a href="" class="btn btn-default" data-dismiss="modal">Cerrar</a>
                         </div>
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
                      

                <div class="modal" id="Eliminar">
                      <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                         <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h3 class="modal-title" style="color:white"> Eliminar Escribano</h3>
                         </div>
                         <div class="modal-body">
                         <h3> Confirmar dar de baja al Escribano</h3>
                        

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

                                } )
                   
                    //filtrado por defecto por dni de escribano y estado P, o solo por los estados P        
                      dtable.column('2').search(document.getElementById("dniEscribano").value).draw();

                        if (document.getElementById("estado").value=="P") {
                          $("#segunEstado")
                            .find("option:contains(P)")
                            .prop("selected", true);
                            dtable.column('6').search(String('P')).draw();
                      //
                    };
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

                          //filtra por estados
                       $('#segunEstado').on('change', function()
                        {
                         
                             dtable.column("6").search(this.value).draw();

                          console.log(this.value);
                        });


                      //quitar el campo de busqueda por defecto
                      document.getElementById('escribanos_filter').style.display='none';

                         $( "#escribanos" ).show();  
                       
                       

                    
                    } );

                     //filtra por estados
                      
                         //en caso de que haga click en alguna notificacion filtra por idminuta y estado pendiente                  
                     
                     

                    idEsc='';
                    idUsr='';
                         function ventana_acep( idEscribano,idUsuario){
                    idEsc=idEscribano;
                    idUsr=idUsuario;
                    $.post("<?=base_url()?>index.php/c_operador/detalles_esc",{idEscribano:idEscribano}, function(data){
                      $("#det_acep").html(data);
            });
                  }

                  function ventana_rech( idEscribano,idUsuario){
                    idEsc=idEscribano;
                     idUsr=idUsuario;
                    $.post("<?=base_url()?>index.php/c_operador/detalles_esc",{idEscribano:idEscribano}, function(data){
                      $("#det_rech").html(data);
            });
                  }

                   function ventana_motivoRechazo(idEscribano){
                 $.post("<?=base_url()?>index.php/c_operador/motivoRechazo",{idEscribano:idEscribano}, function(data){
                        $("#mr").html(data);
            });           
           
                  }

                   function aceptar( ){
                    $.post("<?=base_url()?>index.php/c_operador/aceptar_esc",{idEscribano:idEsc,idUsuario:idUsr}, function(data){
                     
            });
                  }
                     

                   function rechazar( ){
                     var motivoRechazo=document.getElementById('motivoRechazo').value;
                    
                    $.post("<?=base_url()?>index.php/c_operador/rechazar_esc",{idEscribano:idEsc,motivoRechazo:motivoRechazo,idUsuario:idUsr}, function(data){
                      
            });
                  }

                   function ventana_eli (idEscribano){
                      idEsc=idEscribano;
                     
                   }
                   

                   
                  //eliminar escribano de la bd

                   function eliminar( ){
                    $.post("<?=base_url()?>index.php/c_operador/eliminar_esc",{idEscribano:idEsc}, function(data){
                     
            });
                  }





                     //visualizar el calendario en el input fecha
                         $( document ).ready(function() {
                            $('#fechaRegistracion').datepicker();
                        });



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

 