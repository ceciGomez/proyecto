  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
  

    <!-- Main content -->
    <section class="content">
    
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
         <h3 align="center">Reportes de Pedidos de Información</h3>
        <section >
         

               <!-- TO DO List -->
          <div class="box box-primary">
            <div class="box-header">

             

                 <label>Filtrar Pedidos por :</label>
                   <form   style="display:inline; "  action="<?php echo base_url()?>index.php/c_operador/imprimirPedidos"  method="get" accept-charset="utf-8" >
                  <div class="box-body" style="background-color: lightblue;">
                  
                       <div class="row">
                      <div class="col-md-3">
                          <label>Fecha Pedido desde :</label><br>
                        <input type="text"   id="fechaPedidoDesde" name="fechaPedidoDesde" data-provide="datepicker" placeholder="dd/mm/aaaa"   '> 
                      </div>

                       <div class="col-md-3">
                          <label>Fecha Pedido hasta :</label><br>
                        <input type="text"   id="fechaPedidoHasta" name="fechaPedidoHasta" data-provide="datepicker" placeholder="dd/mm/aaaa" > 
                      </div>
              
                </div> 
                </div> 
                <br>
               <div align="center">
                <button type="submit" class="btn btn-primary">Imprimir Pedidos</button>               
                      </div>
                </form>
                  
                        



                  
                  </div>
                  </div>
                  
               


                   <div class="box-body table-responsive no-padding">               
                         <table id="pedidos" class="table-bordered" style="display: none" >
                        <thead>
                          <tr> 
                          <th>Fecha de Pedido</th>
                          <th>Fecha de Respuesta</th>
                          
                          <th>Numero de Pedido</th>
                          <th>Escribano</th>
                          <th>Estado</th>
                          <th>Operador</th>
                          <th>Decripcion</th>
                          <th>Respuesta Pedido</th>
                            
                          </tr>
                        </thead>

                        <tbody >
                       
                            <?php 
                            

                            foreach ($pedidos as $si){ 

                               $date=new DateTime($si->fechaPedido);
                              $date_formated=$date->format('d/m/Y ');
                               $date2=new DateTime($si->fechaRta);
                              $date_formated2=$date2->format('d/m/Y ');
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
                          

                            <td>  <?php  echo "$date_formated"; ?></td>
                            <td>  <?php  echo "$date_formated2"; ?></td>
                            <td>  <?php  echo $si->idPedido; ?> </td>
                             <td>  <?php 
                                      if ($si->idEscribano==null) {
                                          echo '';
                                      }else{
                                        $this->db->from('usuarioescribano');
                                      
                                     $this->db->where('idEscribano', $si->idEscribano); 
                                     $escribano= $this->db->get()->row();
                                     echo $escribano->nomyap;
            }
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
                            "order": [[ 0, "desc" ]],
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
                     
                      //quitar el campo de busqueda por defecto
                      document.getElementById('pedidos_filter').style.display='none';

                       $( "#pedidos" ).show();


                      //visualizar el calendario en el input fecha
                         $( document ).ready(function() {
                            $('#fechaPedidoDesde').datepicker();
                        });
                                  
                   $( document ).ready(function() {
                            $('#fechaPedidoHasta').datepicker();
                        });
                  

                   $.fn.dataTableExt.afnFiltering.push(
                            function( oSettings, aData, iDataIndex ) {
                                var iFini = document.getElementById('fechaPedidoDesde').value;
                                var iFfin = document.getElementById('fechaPedidoHasta').value;
                                var iStartDateCol = 0;
                                var iEndDateCol = 0;
                         
                                iFini=iFini.substring(6,10) + iFini.substring(3,5)+ iFini.substring(0,2);
                                iFfin=iFfin.substring(6,10) + iFfin.substring(3,5)+ iFfin.substring(0,2);
                         
                                var datofini=aData[iStartDateCol].substring(6,10) + aData[iStartDateCol].substring(3,5)+ aData[iStartDateCol].substring(0,2);
                                var datoffin=aData[iEndDateCol].substring(6,10) + aData[iEndDateCol].substring(3,5)+ aData[iEndDateCol].substring(0,2);
                         
                                if ( iFini === "" && iFfin === "" )
                                {
                                    return true;
                                }
                                else if ( iFini <= datofini && iFfin === "")
                                {
                                    return true;
                                }
                                else if ( iFfin >= datoffin && iFini === "")
                                {
                                    return true;
                                }
                                else if (iFini <= datofini && iFfin >= datoffin)
                                {
                                    return true;
                                }
                                return false;
                            });

                             $('#fechaPedidoDesde').select( function() { dtable.draw(); } );
                              $('#fechaPedidoHasta').select( function() { dtable.draw(); } );
             
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

                                                                      
                                      
                      $(function () {
            $('#fechaPedidoDesde').datepicker({format: 'yyyy-mm-dd'});
          });
       $(function () {
            $('#fechaPedidoHasta').datepicker({format: 'yyyy-mm-dd'});
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