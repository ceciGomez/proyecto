<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <!-- Main content -->
   <section class="content">
      <!-- Main row -->
      <div class="row">
         <!-- Left col -->
         <h3 align="center">Gestionar Minutas</h3>
         <section >
            <!-- TO DO List -->
            <div class="box box-primary">
               <div class="box-header">
                  <label>Filtrar Minutas por :</label>
                  <div class="box-body" style="background-color: lightblue;">
                     <label>Fecha Ingreso :</label>
                     <input type="text" data-provide="datepicker"   id="fechaIngreso" placeholder="dd/mm/aaaa"  class='filter' data-column-index='1'> 
                     <label>Fecha Edición :</label>
                     <input type='text' data-provide="datepicker" id="fechaEdicion"  placeholder="dd/mm/aaaa" class='filter' data-column-index='2'>
                     <label>Minuta :</label>
                     <input type='text' id="nroMinuta" value='<?php echo $this->session->flashdata('noti_min')["idMinuta"]; ?>' class='filter' data-column-index='3'> 
                     <label>Estado :</label>
                     <input type="hidden" value= '<?php echo $this->session->flashdata('noti_min')["estado"]; ?>' id="estado"> 
                     <select id="segunEstado">
                        <option value=""></option>
                        <option value="Pendiente">Pendiente</option>
                        <option value="Aprobada">Aprobada</option>
                        <option value="Rechazada">Rechazada</option>
                     </select>
                  </div>
               </div>
               <div class="box-body table-responsive no-padding">
                  <table id="min" class="table-bordered" style="display: none" >
                     <thead>
                        <tr>
                           <th>Operaciones</th>
                           <th>Fecha Ingreso al Sistema</th>
                           <th>Fecha de Edición</th>
                           <th>Número de Minuta</th>
                           <th>Ultimo Estado</th>
                        </tr>
                     </thead>
                     <tbody >
                        <?php 
                           foreach ($minutas as $mi){ 
                                 $date=str_replace('/','-',$mi["fechaIngresoSys"]);
                                 $date=new DateTime($date);
                               $date_formated=$date->format('Y-m-d ');

                                
                            if($mi["fechaEdicion"]!=null){
                               $date2=str_replace('/','-',$mi["fechaEdicion"]);
                              $date2=new DateTime($date2);
                             $date_formated2=$date2->format('Y-m-d ');
                           }else {
                            $date_formated2="";}
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
                              <a class="btn btn-sm " > <button  class="btn btn-warning"  data-toggle="modal" href="#Detalles" title="Detalles" onclick="ventana_det(<?php echo $mi ["idMinuta"] ; ?>,<?php echo $mi ["idEscribano"] ; ?>)"><i class="fa fa-book"></i></button></a>
                              <?php  
                                 if(($mi['estadoMinuta'])=="P"){
                                 
                                   ?>
                              <a class="btn btn-sm " > <button class="btn btn-success" data-toggle="modal" href="#Aceptar" title="Aceptar" onclick="ventana_rech(<?php echo $mi ['idMinuta']; ?>,<?php echo $mi ['idEstadoMinuta']; ?>,<?php echo $this->session->userdata('id_usuario'); ?>)" ><i class="fa fa-check"></i></button></a>
                              <a class="btn btn-sm " > <button class="btn btn-danger" data-toggle="modal" href="#Rechazar" title="Rechazar" onclick="ventana_rech(<?php echo $mi ['idMinuta']; ?>,<?php echo $mi ['idEstadoMinuta']; ?>,<?php echo $this->session->userdata('id_usuario'); ?>)" ><i class="fa fa-times"></i></button></a>
                              <?php  
                                 };
                                 ?>
                              <a class="btn btn-sm " > <button class="btn btn-success" data-toggle="modal" href="#Estados" title="Estados" onclick="ventana_estados(<?php echo $mi ['idMinuta']; ?>)"  ><i class="fa fa-th-list"></i></button></a>                                                        
                           </td>
                           <td data-order="<?php echo "$date_formated"; ?>">  <?php  echo  $mi["fechaIngresoSys"]; ?></td>
                           <td data-oder="<?php echo "$date_formated2"; ?>">  <?php  echo  $mi["fechaEdicion"]; ?></td>
                           <td>  <?php  echo $mi ['idMinuta']; ?> </td>
                           <td
                            <?php 
                            switch  ($mi['descEstadoMinuta']){
                              case "Aprobada":echo "data-order='1'";
                              break;
                              case "Rechazada":echo "data-order='2'";
                              break;
                              case "Pendiente":echo "data-order='3'"; 
                              break;
                            }
                              ?>
                           >  <?php  echo $mi['descEstadoMinuta']; ?> </td>
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
                           <h3 class="modal-title" style="color:white" >Detalles de Minuta</h3>
                        </div>
                        <label>
                           <h3 align="center">Escribano
                        </label>
                        </h3>
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
                        <div class="modal-body" id="det" >
                        </div>
                        <div class="modal-footer">
                          
                        <form style="display:inline; "  action="<?php echo base_url()?>index.php/c_operador/imprimirMinuta"  method="post" accept-charset="utf-8"  >
                         <input type="hidden"  id="resg_idMinuta" name="resg_idMinuta"> 
                        <button    type="submit" class="btn btn-primary">Imprimir</button> 

                          </form>              
                     
                      
                           <a href="" class="btn btn-default" data-dismiss="modal">Cerrar</a>
                            </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="modal" id="Estados">
                  <div class="modal-dialog modal-lg">
                     <div class="modal-content">
                        <div class="modal-header">
                           <button type="button" class="close" data-dismiss="modal">&times;</button>
                           <h3 class="modal-title" style="color:white" >Estados de la  Minuta</h3>
                        </div>
                        <div class="modal-body">
                           <label>
                              <h3>Estados de la Minuta
                           </label>
                           </h3>
                           <br>
                           <br>
                           <table class="table"  >
                              <thead>
                                 <tr>
                                    <th>Fecha de Estado</th>
                                    <th>Estado</th>
                                    <th>Motivo de Rechazo</th>
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
               <div class="modal" id="Aceptar">
                  <div class="modal-dialog modal-lg">
                     <div class="modal-content">
                        <div class="modal-header">
                           <button type="button" class="close" data-dismiss="modal">&times;</button>
                           <h3 class="modal-title" style="color:white" >Aceptar Minuta</h3>
                        </div>
                        <div class="modal-body">
                           <h3>Confirmar aceptar la minuta</h3>
                           <div  id="acep_min" >
                           </div>
                        </div>
                        <div class="modal-footer">
                           <a href="" class="btn btn-default" data-dismiss="modal">Cancelar</a>
                           <a  href="<?=base_url()?>index.php/c_operador/gestionarMinutas " class="btn btn-primary" onclick="aceptar()">Aceptar</a>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="modal" id="Rechazar">
                  <div class="modal-dialog modal-lg">
                     <div class="modal-content">
                        <div class="modal-header">
                           <button type="button" class="close" data-dismiss="modal">&times;</button>
                           <h3 class="modal-title" style="color:white">Rechazar Minuta</h3>
                        </div>
                        <div class="modal-body">
                           <h3>Confirmar rechazar Minuta</h3>
                           <div  id="rech_min" >
                           </div>
                           <div>
                              <label style="display: block;">Ingrese motivo de rechazo :</label>
                              <textarea id="motivoRechazo" rows="10" cols="100" placeholder="Ingrese Motivo de Rechazo" required></textarea>
                           </div>
                        </div>
                        <div class="modal-footer">
                           <a href="" class="btn btn-default" data-dismiss="modal">Cerrar</a>
                           <a  class="btn btn-primary" onclick="rechazar()" >Aceptar</a>
                        </div>
                     </div>
                  </div>
               </div>
               <script type="text/javascript">
                  $(document).ready(function(){
                  
                   //crea la tabla
                   var dtable=$('#min').DataTable(
                       {
                          autoWidht:false,
                         "order": [[ 4, "des" ],[ 1, "desc" ]],

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
                     document.getElementById('min_filter').style.display='none';
                  
                      $( "#min" ).show();
                  
                     //en caso de que haga click en alguna notificacion filtra por idminuta y estado                  
                       dtable.column('3').search(document.getElementById("nroMinuta").value).draw();
                  
                     if (document.getElementById("estado").value=="P") {
                         $("#segunEstado")
                           .find("option:contains(P)")
                           .prop("selected", true);
                           dtable.column('4').search(String('P')).draw();
                     };
                         
                  
                     var dtable2=$('#estados_mim').DataTable(
                       {
                          autoWidht:false,
                  
                            language: {
                               "sProcessing":     "Procesando...",
                           "sLengthMenu":     "Mostrar _MENU_ Estados",
                           "sZeroRecords":    "No se encontraron resultados",
                           "sEmptyTable":     "Ningún Estado Encontrado",
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
                                  
                  
                   function ventana_det(idMinuta,idEscribano){
                document.getElementById('resg_idMinuta').value=idMinuta;
                   $.post("<?=base_url()?>index.php/c_operador/detalles_minuta",{idMinuta:idMinuta}, function(data){
                     $("#det").html(data);
                  
                  });
                    $.post("<?=base_url()?>index.php/c_operador/detalles_esc",{idEscribano:idEscribano}, function(data){
                     $("#det_esc").html(data);
                  });
                  }
                  
                  
                   function ventana_estados(idMinuta){
                   $.post("<?=base_url()?>index.php/c_operador/ver_estados",{idMinuta:idMinuta}, function(data){
                     $("#estados_min").html(data);
                     $("#minuta").html(idMinuta);
                  });
                  }
                  
                    idEstMin='';
                  
                    idUsr='',
                           function ventana_acep(idMinuta,idEstadoMinuta,idUsuario){
                             idUsr=idUsuario;
                   idEstMin=idEstadoMinuta;
                   $.post("<?=base_url()?>index.php/c_operador/detalles_minuta",{idMinuta:idMinuta}, function(data){
                     $("#acep_min").html(data);
                  });
                  }
                  
                  function ventana_rech(idMinuta,idEstadoMinuta,idUsuario){
                  idUsr=idUsuario;
                  idEstMin=idEstadoMinuta;
                   $.post("<?=base_url()?>index.php/c_operador/detalles_minuta",{idMinuta:idMinuta}, function(data){
                     $("#rech_min").html(data);
                  });
                  }
                  
                  function aceptar( ){
                   $.post("<?=base_url()?>index.php/c_operador/aceptarMin",{idEstadoMinuta:idEstMin,idUsuario:idUsr}, function(data){
                    
                  });
                  }
                    
                  
                  function rechazar( ){
                    var motivoRechazo=document.getElementById('motivoRechazo').value;
                   
                    if (motivoRechazo =="") {alert ("Falta ingresar Motivo");}
                    else{ 
                   $.post("<?=base_url()?>index.php/c_operador/rechazarMin",{idEstadoMinuta:idEstMin,motivoRechazo:motivoRechazo,idUsuario:idUsr}, function(data){
                     });
                  window.location.reload();}
                   }
                  
          
                  
                     //visualizar el calendario en el input fecha
                    $( document ).ready(function() {
                           $('#fechaEdicion').datepicker({
                             autoclose: true
                           });
                       });             
                        $( document ).ready(function() {
                           $('#fechaIngreso').datepicker({
                             autoclose: true
                           });
                       });                 
                  
               </script>
            </div>
            <!-- /.box -->
         </section>
         <!-- /.Left col -->
      </div>
      <!-- /.row (main row) -->
