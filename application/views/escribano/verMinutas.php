<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h3 align="center">
         Ver Minutas
      </h3>
    
   </section>
   <!-- Main content -->
   <section class="content">
      <div class="row">
         <div class="col-xs-12">
          
               <div class="box box-primary">
            <div class="box-header">
             
                 <label>Filtrar Minutas por :</label>
                 
                  <div class="box-body" style="background-color: lightblue;">
                      
                       <label>Minuta :</label>
                        <input type='text' id="nroMinuta" value='<?php echo $this->session->flashdata('noti_min')["idMinuta"]; ?>'  class='filter' data-column-index='0'> 
                  
                          <label>Fecha Ingreso :</label>
                        <input type="text" data-provide="datepicker"   id="fechaIngreso" placeholder="dd/mm/aaaa"  class='filter' data-column-index='1'> 
      

                        <label>Estado :</label>
                         <input type="hidden" value= '<?php echo $this->session->flashdata('noti_min')["estado"]; ?>' id="estado"> 
                        <select id="segunEstado">
                             <option value=""></option>
                            <option value="Pendiente">Pendiente</option>
                            <option value="Aprobado">Aprobado</option>
                            <option value="Rechazado">Rechazado</option>
                           
                        </select>
                  
       
                  </div>
                  </div>
               <!-- /.box-header -->
               <div align="right" class="box-tools">
                  <a class="btn btn-primary" href="<?=base_url().'index.php/c_escribano/crearParcela'?>" >Registrar Nueva Minuta</a>
               </div>
               <div class="box-body table-responsive no-padding">
                  <table id="min"  class="table-bordered" style="display: none">
                     <thead>
                        <tr>
                           <th>Nro de Minuta</th>
                           <th>Fecha</th>
                           <th>Estado</th>
                           <th>Motivo de Rechazo</th>
                           <th>Ver Detalle</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php foreach ($minutas as $value) :
                        $date=new DateTime($value->fechaIngresoSys);
                        $date_formated=$date->format('d/m/Y ');
                        ?>
                        <tr>
                           <td colspan="" rowspan="" headers=""><?php echo $value->idMinuta;?></td>
                           <td colspan="" rowspan="" headers="" data-order="<?php echo  $value->fechaIngresoSys;?>"><?php echo  $date_formated ;?></td>
                           <td colspan="" rowspan="" headers="">
                           <?php if ($value->estadoMinuta == 'A')  {?>
                             <span class="label label-success">Aprobado</span>
                          <?php } 
                          else {
                            if ($value->estadoMinuta == 'R')  {?>
                             <span class="label label-danger">Rechazado</span>
                          <?php } 
                          else {
                            if ($value->estadoMinuta == 'P')  {?>
                            <span class="label label-warning">Pendiente</span>
                           <?php  }
                           else { ?>
                             <span class="label label-danger">NO TIENE ESTADO</span>
                           <?php }
                                                         
                           }}?></td>
                           <td colspan="" rowspan="" headers=""><?php if($value->motivoRechazo == NULL){
                              echo "NO TIENE OBSERVACIONES";
                            } else{
                            echo $value->motivoRechazo;
                              } ?></td>
                           <td colspan="" rowspan="" headers="">
                              <div class="btn-group">
                              <?php if ($value->estadoMinuta == 'A' or $value->estadoMinuta == 'P'): ?>
                                <a class="btn btn-sm " href="#" disabled="" title="Editar Minuta"><button><i class="fa fa-pencil"></i></button></a> 
                              <?php endif ?> 
                              <?php if ($value->estadoMinuta == 'R'): ?>
                                <a class="btn btn-sm " href="<?=base_url()?>index.php/c_escribano/editarMinuta/<?php echo $value->idMinuta?> " title="Editar Minuta" ><button><i class="fa fa-pencil" ></i></button></a> 
                              <?php endif ?>

                                 <a class="btn btn-sm " href="<?=base_url()?>index.php/c_escribano/verUnaMinuta/<?php echo $value->idMinuta?>" title="Ver Detalle de minuta" > <button><i class="fa fa-eye"></i></button></a>

                                 <a class="btn btn-sm "  href="<?=base_url()?>index.php/c_escribano/verPropietarios/<?php echo $value->idMinuta?>" title="Ver Propietarios"> <button><i class="fa fa-users"></i></button></a>
                                 <a class="btn btn-sm " href="<?=base_url()?>index.php/c_escribano/imprimirMinuta/<?php echo $value->idMinuta?>" title="Imprimir" target="_blank"> <button><i class="fa fa-print"></i></button></a>
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
<!-- /.content-wrapper -->
<script type="text/javascript">
  
                   $(document).ready(function(){

                    //crea la tabla
                    var dtable=$('#min').DataTable(
                        {
                           autoWidht:false,
                           "order": [[ 1, "desc" ]],
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
                         
                             dtable.column("2").search(this.value).draw();

                          console.log(this.value);
                        });

                      //quitar el campo de busqueda por defecto
                      document.getElementById('min_filter').style.display='none';

                       $( "#min" ).show();

                        dtable.column('0').search(document.getElementById("nroMinuta").value).draw();

                      if (document.getElementById("estado").value=="A") {
                          $("#segunEstado")
                            .find("option:contains(Aprobado)")
                            .prop("selected", true);
                            dtable.column('2').search(String('Aprobado')).draw();

                      };
                        if (document.getElementById("estado").value=="R") {
                          $("#segunEstado")
                            .find("option:contains(Rechazado)")
                            .prop("selected", true);
                            dtable.column('2').search(String('Rechazado')).draw();

                      };
                         
                          
                  });
                           

                    
</script>