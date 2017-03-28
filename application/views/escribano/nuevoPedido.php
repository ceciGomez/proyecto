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
               <form   style="display:inline; " action="<?php echo base_url()?>index.php/c_escribano/crearPedido" method="post" >
                    <div class="form-group">    
                       <input type="hidden" value='<?php echo $this->session->userdata('idEscribano');?>' id="idEscribano" name='idEscribano'>
                         <div class="row">
                         
                            <div class="col-md-3">
                                 <label style="display: block;">Ingrese pedido de Información:</label>
                                <textarea id="pedido" name="pedido" rows="10" cols="100" required></textarea>
                            </div>
                          </div>
                        
                            <div class="row"> 
                               <div class="col-md-3">
                                   <button  class="btn btn-success" style="text-decoration: none;"  type="submit"> Enviar</button>
                            </div>
                        </div>

                        </form>

                    
                  
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

