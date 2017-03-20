<!-- Content Wrapper. Contains page content -->
<style type="text/css">
 
</style>
<div class="content-wrapper">
<!-- Content Header (Page header) -->


      <div class="row">
      <h3  align="center">Crear Pedido</h3>

        <!-- left column -->
        <div class="col-md-12" >
          <!-- general form elements -->
          <div class="box box-primary" >
          <div class="box-body" style="background-color: lightblue;">
                    <div class="form-group">    
                     
                         <div class="row">
                         
                            <div class="col-md-3">
                                 <label style="display: block;">Ingrese pedido de Información:</label>
                                <textarea id="pedido" rows="10" cols="100" ></textarea>
                            </div>
                          </div>
                          
                            <div class="row"> 
                               <div class="col-md-3">
                                   <a  class="btn btn-success" style="text-decoration: none;"  href="<?=base_url()?>index.php/c_escribano/verPedidos" onclick="pedido(<?php echo $this->session->userdata('idEscribano');?>)" > Enviar</a>
                            </div>
                        </div>

                    
                  
                       </div>
                  </div>      

          </div>
        </div>
      </div>
</section>
</div>

                   
<script type="text/javascript">
 
                   function pedido(idEscribano){
                     var pedido=document.getElementById('pedido').value;
                     console.log(idEscribano);
                    $.post("<?=base_url()?>index.php/c_escribano/crearPedido",{idEscribano:idEscribano,pedido:pedido}, function(data){
                      
            });
                  }
</script> 

