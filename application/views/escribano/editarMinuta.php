
<style type="text/css">
  table {
    border-collapse: collapse;
     width: 100%;
}

table, th, td {
    border: 1px solid black;
}
.propietario th {
    background-color: #3B4EC9;
    color: white;
    height: 50px;
}
.relacion th {
    background-color: #4CAF50;
    color: white;
    height: 50px;
}
.parcela  th {
    background-color: #04142B;
    color: white;
  width: 500px;
}
#motivoRechazo{
    border: 5px solid black;
    margin:20px;
    padding: 20px;
}

</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   
  <section class="content">
    
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
         <h3  align="center">Editar Minuta</h3>
        <section >
         

               <!-- TO DO List -->
          <div class="box box-primary">
            <div class="box-header">
                


                <h3>Motivo de Rechazo</h3>
                <div id="motivoRechazo">
                  <?php echo $motivoRechazo ?>
                </div>
                <br>
                <br>
                <h4>Fecha de Ingreso de la Minuta: <?php echo $fechaInscMinuta ;?></h4>
                <br>
                <br>
                
                <div class="box-body" >
             
                <br>

                  

                <?php 
                $nroParcela=0;
                foreach ($parcelas as $parcela){ 
                 $nroParcela=$nroParcela+1;
                              $date=new DateTime($parcela->fechaPlanoAprobado);
                      $date_formated=$date->format('d/m/Y ');
                $fecha_planoAprobado=$date_formated;

                $date2=new DateTime($parcela->fechaMatriculaRPI);
                      $date_formated2=$date2->format('d/m/Y ');
                      $fecha_matriculaRPI=$date_formated2;
                          
                 ?>              
                          <table class="table-bordered"  >
                             <caption ><h3 align="center" >Parcela N° <?php echo $nroParcela ?></h3></caption>            
                          <tr  class="parcela">
                            <th> Circunscripcion</th><td> <?php  echo $parcela->circunscripcion ?></td>
                          </tr>
                          <tr class="parcela">
                            <th> Sección</th><td><?php  echo $parcela->seccion ?></td>
                          </tr class="parcela">
                          <tr class="parcela">
                            <th> Chacra</th><td><?php  echo $parcela->chacra?> </td>
                          </tr>
                          <tr class="parcela">
                            <th> Quinta</th><td><?php  echo $parcela->quinta ?></td>
                          </tr>
                          <tr class="parcela">
                            <th> Fracción</th><td><?php  echo $parcela->fraccion?> </td>
                          </tr>
                          <tr class="parcela">
                            <th> Manzana</th><td><?php  echo $parcela->manzana?> </td>
                          </tr>
                          <tr class="parcela">
                            <th> Parcela</th><td><?php  echo $parcela->parcela ?></td>
                          </tr>
                          <tr class="parcela">
                            <th> Superficie</th><td><?php  echo $parcela->superficie ?></td>
                          </tr>
                          <tr class="parcela">
                            <th> Partida</th><td><?php  echo $parcela->partida?> </td>
                          </tr class="parcela">
                          <tr class="parcela">
                            <th> Tipo de Propiedad</th><td><?php  echo $parcela->tipoPropiedad?> </td>
                           </tr>
                            <tr class="parcela">
                            <th> Plano Aprobado</th><td><?php  echo $parcela->planoAprobado?></td>
                           </tr>     
                            <tr class="parcela">
                            <th> Fecha Plano Aprobado</th><td><?php  echo $fecha_planoAprobado?> </td>
                           </tr>  
                           <tr class="parcela">
                            <th> Descripción</th><td><?php  echo $parcela->descripcion?></td>
                           </tr>    
                           <tr class="parcela">
                            <th> Nro de Matrícula RPI</th><td><?php  echo $parcela->nroMatriculaRPI?></td>
                           </tr>    
                            <tr class="parcela">
                            <th> Fecha Matrícula RPI</th><td><?php  echo $fecha_matriculaRPI?></td>
                           </tr>   
                           <tr class="parcela">
                            <th> Tomo</th><td><?php  echo $parcela->tomo ?></td>
                           </tr>
                           <tr class="parcela">
                            <th> Folio</th><td><?php  echo $parcela->folio?></td>
                           </tr> 
                           <tr class="parcela">
                            <th>Finca</th><td><?php  echo $parcela->finca?></td>
                           </tr>
                           <tr class="parcela">
                            <th> Año</th><td><?php  echo $parcela->año?></td>
                           </tr>
                                        
                 </table>
                 <br>
                     <a  href="<?=base_url()?>index.php/c_escribano/editarParcela/<?php echo $parcela->idParcela?> " title="Editar  Parcela" ><button class="btn btn-success">Editar Parcela</button></a> 
                       <a class="btn btn-danger" href="<?=base_url()?>index.php/c_escribano/eliminarParcela/<?php echo  $parcela->idParcela ?>" >Eliminar Parcela</a>
                   
                 <br>
                 <br>
               
                  <br>
                    <?php 
                    $relaciones=$this->db->get_where('relacion', array('idParcela'=>$parcela->idParcela))->result();
                    $nroRelacion=0;
                     foreach ($relaciones as $relacion) {
                      $nroRelacion=$nroRelacion+1;
                        ?>
                        <table>
                        <caption ><h3 align="center" >PH N° <?php echo $nroRelacion ?> de la Parcela N°<?php echo $nroParcela ?></h3></caption>
                          <thead>
                          <tr class="relacion">
                             
                             <th>Fecha Escritura</th>
                               <?php if($relacion->poligonos!=null){ ?>
                             <th>Número Unidad Funcinal</th>
                             <th>Tipo Unidad Funcional</th>
                             <th>Plano Aprobado</th>
                             <th>Fecha Plano Aprobado</th>
                             <th>Porcentaje Unidad Funcional</th>
                             <th>Poligonos</th>
                            <?php } ?>

                          </tr>

                           
                          </thead>
                          <tbody>
                            <tr>

                              <td>
                                <?php if ($relacion->fechaEscritura==null) {

                                  echo "";
                                }else {
                                       $date=new DateTime($relacion->fechaEscritura);
                                        $fechaEscritura=$date->format('d/m/Y ');
                                        echo $fechaEscritura;
                                
                                }
                                 ?>
                              </td>
                              <?php if($relacion->poligonos!=null){ ?>
                              <td> <?php if ($relacion->nroUfUc==null) {

                                  echo "";
                                }else {
                                      
                                        echo $relacion->nroUfUc;
                                
                                }?>
                                  
                                </td>
                                <td><?php if ($relacion->tipoUfUc==null) {

                                  echo "";
                                }else {
                                      
                                        echo $relacion->tipoUfUc;
                                
                                }?>
                                  
                                </td>
                                <td>
                                  <?php if ($relacion->planoAprobado==null) {

                                  echo "";
                                }else {
                                      
                                        echo $relacion->planoAprobado;
                                
                                }?>
                                </td>
                                <td>
                                     <?php if ($relacion->fechaPlanoAprobado==null) {

                                  echo "";
                                }else {
                                       $date=new DateTime($relacion->fechaPlanoAprobado);
                                        $fechaPlanoAprobado=$date->format('d/m/Y ');
                                        echo $fechaPlanoAprobado;
                                
                                }?>
                                </td>
                              <td><?php if ($relacion->porcentajeUfUc==null) {

                                  echo "";
                                }else {
                                      
                                        echo $relacion->porcentajeUfUc;
                                
                                }?>
                                  
                                </td>
                               
                                  <td><?php if ($relacion->poligonos==null) {

                                  echo "";
                                }else {
                                      
                                        echo $relacion->poligonos;
                                
                                }?>
                                  
                                </td>
                               
                                <?php } ?>

                            </tr>

                          </tbody>

                        </table>
                         <br>
                    <a  href="<?=base_url()?>index.php/c_escribano/editarPH/<?php echo $relacion->idRelacion?> " title="Editar PH" ><button class="btn btn-success">Editar PH</button></a> 
                     <a class="btn btn-danger" href="<?=base_url()?>index.php/c_escribano/eliminarPH/<?php echo  $relacion->idRelacion ?>" >Eliminar PH</a>
                   <br>
                   <br>
                 
                        <br>
                        <br>
                     <?php 
                   $propietarios=$this->M_escribano->getPropietariosxidRelacion($relacion->idRelacion);
                   $nroPropietario=0;

                   foreach ($propietarios as $propietario) {
                    $nroPropietario=$nroPropietario+1;
                   
                     ?>
                     <table>
                        <caption ><h3 align="center" >Propietario N° <?php  echo $nroPropietario ?> del PH N° <?php echo $nroRelacion ?> de la Parcela N°<?php echo $nroParcela ?></h3></caption>
                     
                     <thead>
                       <tr class="propietario">
                         <th>Porcentaje de Condominio</th>
                         <th>Propietario</th>
                         <th>Tipo</th>
                         <th>Cuit/Cuil</th>
                         <th>Apellido y Nombre</th>
                         <th>DNI</th>
                         <th>Dirección</th>
                         <th>Localidad</th>
                         <th>Conyuge</th>
                         <th>Fecha de Nacimiento</th>
                       </tr>
                     </thead>
                     <tbody>
                       <tr>
                         <td> <?php if($propietario->porcentajeCondominio==null){
                            echo "";
                          } else {
                            echo $propietario->porcentajeCondominio;
                            }?>
                              
                            </td>

                            <td>
                             <?php if($propietario->tipoPropietario==null){
                            echo "";
                          } else {
                            echo $propietario->tipoPropietario;
                            }?>
                              
                            </td>
                               <td>
                             <?php if($propietario->empresa==null){
                            echo "";
                          } else {
                            echo $propietario->empresa;
                            }?>
                              
                            </td>
                               <td>
                             <?php if($propietario->cuitCuil==null){
                            echo "";
                          } else {
                            echo $propietario->cuitCuil;
                            }?>

                              
                            </td>

                               <td>
                             <?php if($propietario->apynom==null){
                            echo "";
                          } else {
                            echo $propietario->apynom;
                            }?>
                            
                              
                            </td>

                             <td>
                             <?php if($propietario->dni==null){
                            echo "";
                          } else {
                            echo $propietario->dni;
                            }?>
                            
                              
                            </td>
                             <td>
                             <?php if($propietario->direccion==null){
                            echo "";
                          } else {
                            echo $propietario->direccion;
                            }?>
                            
                              
                            </td>
                             <td>
                             <?php if($propietario->idLocalidad==null){
                            echo "";
                          } else {
                                $localidad=$this->db->get_where('localidad', array('idLocalidad'=>$propietario->idLocalidad))->row();
                            echo $localidad->nombre;
                            }?>
                            
                              
                            </td>
                             <td>
                             <?php if($propietario->conyuge==null){
                            echo "";
                          } else {
                            echo $propietario->conyuge;
                            }?>
                            
                              
                            </td>
                             <td>
                             <?php if($propietario->fechaNac==null){
                            echo "";
                          } else {
                             $date=new DateTime($propietario->fechaNac);
                            $fechaNac=$date->format('d/m/Y ');
                            echo $fechaNac;
                            }?>
                            
                              
                            </td>
                       </tr>
                     </tbody>
                       </table>
                       <br>
                          <a  href="<?=base_url()?>index.php/c_escribano/editarPropietario/<?php echo $propietario->id?> " title="Editar Propietario" ><button class="btn btn-success">Editar Propietario</button></a> 
                            <a class="btn btn-danger" href="<?=base_url()?>index.php/c_escribano/eliminarPropietario/<?php echo  $propietario->id ?>" >Eliminar Propietario</a>
                       <br>
                       <br>                 
                    <?php }
                    }
                    } ?>
                </div>
                <div align="center">
                    <a  href="<?=base_url()?>index.php/c_escribano/finalizarEdicion/<?php echo $idMinutaEditar ?> " title="Finalizar Edición Minuta" ><button class="btn btn-success">Finalizar Edición Minuta</button></a> 
                </div>
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

 <script type="text/javascript">
   

 </script>