  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
  

    <!-- Main content -->
    <section class="content">
    
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
         <h3 align="center">Gestionar Pedidos de Información</h3>
        <section >
         

               <!-- TO DO List -->
          <div class="box box-primary">
            <div class="box-header">

             

                 <label>Filtrar Solicitudes por :</label>
                 
                  <div class="box-body" style="background-color: lightblue;">
                      
                      <div class="row">
                      <div class="col-md-3">
                          
                          <label>Fecha Pedido :</label>
                        <input type="text" data-provide="datepicker"   id="fechaPedido" placeholder="dd/mm/aaaa"  class='filter' data-column-index='1'> 
                      </div>
                      <div class="col-md-3">
                        <label>Fecha Respuesta :</label>
                        
                        <input type='text' data-provide="datepicker"  id="fechaRespuesta"  placeholder="dd/mm/aaaa" class='filter' data-column-index='2'>
                      </div>
                      <div class="col-md-3">

                           <label>Número de Pedido :</label>
                        <input type='text' id="idPedido" value='<?php echo $this->session->flashdata('noti_si')["idPedido"]; ?>' class='filter' data-column-index='3'> 

                       </div>
                                        <div class="col-md-3">

                         <label> Escribano :</label><br>
                        <input type='text' id="idEscribano"  class='filter' data-column-index='4'> 
                  </div>
                      <div class="col-md-3">

                        <label>Estado :</label><br>
                        <input type="hidden" value= '<?php echo $this->session->flashdata('noti_si')["estadoPedido"]; ?>' id="estado"> 
                        <select id="estadoPedido">
                             <option value=""></option>
                            <option value="P">P</option>
                            <option value="C">C</option>
                 
                        </select>
                         </div>
                </div>   
                <br><br>
                  
                        



                  
                  </div>
                  </div>
                  
               


                   <div class="box-body table-responsive no-padding">               
                         <table id="pedidos" class="table-bordered" style="display: none" >
                        <thead>
                          <tr> 
                          <th>Operaciones</th>
                           <th>Fecha de Pedido</th>
                          <th>Fecha de Respuesta</th>
                         
                          <th>Numero de Pedido</th>
                          <th> Escribano</th>
                          <th>Estado</th>
                          <th>Operador</th>
                          <th>Decripcion</th>
                          <th>Respuesta Pedido</th>
                            
                          </tr>
                        </thead>

                        <tbody >
                       
                            <?php 
                            

                            foreach ($pedidos as $si){ 

                               $date2=new DateTime($si->fechaPedido);
                              $date_formated2=$date2->format('d/m/Y ');
                               $date=new DateTime($si->fechaRta);
                              $date_formated=$date->format('d/m/Y ');
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


                           

                              <?php  
                              
                                if($si->estadoPedido=="P"){

                                  ?>
                                    <a class="btn btn-sm " > <button class="btn btn-success" data-toggle="modal" href="#Contestar" title="Contestar Pedido" onclick="ventana_contestar(<?php echo $si->idPedido; ?>,<?php echo $this->session->userdata('id_usuario'); ?>)" ><i class="fa fa-check"></i></button></a>


                                  <?php  
                                };
                                ?>
                            </td>

                            <td>  <?php  echo "$date_formated"; ?></td>
                            <td>  <?php  echo "$date_formated2"; ?></td>
                            <td>  <?php  echo $si->idPedido; ?> </td>
                             <td><?php 
                              if($si->idEscribano==null) echo "";else {
                            $this->db->from('usuarioescribano');
                         $this->db->where('idEscribano', $si->idEscribano); 
                         $escribano= $this->db->get()->row();


                           echo "$escribano->nomyap";}
                            ?> </td>
                            <td>  <?php  echo $si->estadoPedido; ?> </td>
                             <td>  <?php  echo $si->nomyap; ?> </td>
                                  <td>  <?php  echo $si->descripcion; ?> </td>
                                    <td>  <?php  echo $si->rtaPedido; ?> </td>
                          
                             
                            
                            


                          
                          
                           
                          </tr>

                          <?php
                        }
                        ?>
                       
                        </tbody>
                 </table>
                 </div>

                 <div class="modal" id="Contestar">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                         <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h3 class="modal-title" style="color:white">Respuesta de Pedido de Información</h3>
                         </div>
                         <div class="modal-body">
                         
                           <div>
                              <label style="display: block;">Ingrese Respuesta de Pedido   :</label>
                                <textarea id="rtaPedido" rows="10" cols="100" ></textarea>
                          </div>
                           
                         </div>

                         <div class="modal-footer">
                          <a href="" class="btn btn-default" data-dismiss="modal">Cerrar</a>
                          <a href="" class="btn btn-primary" onclick="contestar()">Aceptar</a>
                         </div>
                      </div>
                    </div>
                  </div>
                      
                      
                  <script type="text/javascript">
            
                   

                   $(document).ready(function(){

                    //crea la tabla
                    var dtable=$('#pedidos').DataTable(
                        {
                           autoWidht:false,
                           "order": [[ 1, "desc" ]],
                             language: {
                                "sProcessing":     "Procesando...",
                            "sLengthMenu":     "Mostrar _MENU_ Pedidos",
                            "sZeroRecords":    "No se encontraron resultados",
                            "sEmptyTable":     "Ningún Pedidos encontrada",
                            "sInfo":           "Mostrando Pedidos del _START_ al _END_ de un total de _TOTAL_ registros",
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
                       $('#estadoPedido').on('change', function()
                        {
                         
                             dtable.column("5").search(this.value).draw();

                          console.log(this.value);
                        });

                      //quitar el campo de busqueda por defecto
                      document.getElementById('pedidos_filter').style.display='none';

                       $( "#pedidos" ).show();

                      //en caso de que haga click en alguna notificacion filtra por idminuta y estado                  
                        dtable.column('3').search(document.getElementById("idPedido").value).draw();

                      if (document.getElementById("estado").value=="P") {
                          $("#estadoPedido")
                            .find("option:contains(P)")
                            .prop("selected", true);
                            dtable.column('5').search(String('P')).draw();

                      };
                          


                      //visualizar el calendario en el input fecha
                         $( document ).ready(function() {
                            $('#fechaPedido').datepicker();
                        });
                                  
                   $( document ).ready(function() {
                            $('#fechRespuesta').datepicker();
                        });
                  
             
                })


                 idPed='';
                 idUsr='';
                   function ventana_contestar(idPedido,idUsuario){
                      idPed=idPedido;
                      idUsr=idUsuario;
                      console.log(idPedido);
                    console.log(idUsr);

                    }

                     function contestar(){
                   var rtaPedido=document.getElementById('rtaPedido').value;

                    $.post("<?=base_url()?>index.php/c_operador/contestar_pedido",{idPedido:idPed,rtaPedido:rtaPedido,idUsuario:idUsr}, function(data){
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