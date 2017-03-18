

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
    <?=form_open(base_url().'index.php/C_escribano/registro_ph')?>
       <form method="post">
      <h3 align="center">
         Crear Minuta
      </h3>
      <small>Registrar Propietario</small>
      <ol class="breadcrumb">
         <li><a href="<?=base_url()?>index.php/c_loginescri"><i class="fa fa-dashboard"></i> Home</a></li>
         <li><a href="<?=base_url().'index.php/c_escribano/CrearMinuta'?>"></i> Parcela</a></li>
         <li class="active">Propietario</li>
      </ol>
   </section>
   <!-- Main content -->
   <section class="content-body">
      <div class="box box-default">
         <div class="box-header with-border">
            <h3 class="box-title">Tipo de parcela</h3>
            <!-- /.box-header -->
             
             <form method="post">
            <div class="form-group">
                  <div class="radio">
                    <label>
                      <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" onclick="ph()" checked>
                      Es PH
                    </label>
                  </div>
                  <div class="radio">
                    <label>
                      <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2" onclick="noPh()">
                      No es PH
                    </label>
                  </div>                 
                </div>
            <div class="box-body">
               <div class="row">
                 <div class="form-group">                   
                   
                     <div class="col-md-3">
                        <label for="exampleInputEmail1">Fecha de Escritura</label>
                          <div class="input-group date">
                            <div class="input-group-addon">
                             <i class="fa fa-calendar"></i>
                             </div>
                          <input type="text" class="form-control pull-right" id="fecha_escritura" placeholder="Fecha de Escritura">
                          </div>
                         <div style="color:red;" ><p><?=form_error('porcentaje_condominio')?></p></div>
                     </div>
                  
                     <div class="col-md-3">
                        <label for="exampleInputEmail1">Porcentaje de Condominio</label>
                        <input type="text" step="any" name="porcentaje_condominio" class="form-control" <?php echo "value='$porcentaje_condominio'" ?> id="porcentaje_condominio" placeholder="Porcentaje de Condominio">
                       <div style="color:red;" ><p><?=form_error('porcentaje_condominio')?></p></div>
                     </div>
                     <div class="col-md-3">
                        <label for="exampleInputEmail1">Numero de UC/UF</label>
                        <input type="text" class="form-control" name="nro_ucuf" id="nro_ucuf" placeholder="Numero de UC/UF">
                        <div style="color:red;" ><p><?=form_error('porcentaje_condominio')?></p></div>
                     </div>
                     <div class="col-md-3">
                        <label for="exampleInputEmail1">Tipo UC/UF</label>
                        <select id="tip_oucuf" name="tipo_ucuf" class="form-control select2"  style="width: 100%;">
                           <option selected="selected">Seleccionar</option>
                           <option >C</option>
                           <option >F</option>
                        </select>
                        <div style="color:red;" ><p><?=form_error('porcentaje_condominio')?></p></div>
                     </div>
                     <div class="col-md-3">
                        <label for="exampleInputEmail1">Plano Aprobado de la UC/UF</label>
                        <input type="text" class="form-control" id="plano_aprobado" name="plano_aprobado" placeholder="Plano Aprobado de la UF/UC">
                        <div style="color:red;" ><p><?=form_error('porcentaje_condominio')?></p></div>
                     </div>
                    <div class="col-md-3">
                        <label for="exampleInputEmail1">Fecha de Plano de Aprobado</label>                     
                          <div class="input-group date">
                            <div class="input-group-addon">
                             <i class="fa fa-calendar"></i>
                         </div>
                          <input type="text" class="form-control pull-right" name="fecha_plano_aprobado" id="fecha_plano_aprobado" placeholder="Fecha Plano Aprobado">
                     </div>
                     <div style="color:red;" ><p><?=form_error('porcentaje_condominio')?></p></div>
                  </div>             
                     <div class="col-md-3">
                        <label for="exampleInputEmail1">Porcentaje de UC/UF</label>
                        <input type="text" step="any" class="form-control" name="porcentaje_ucuf" id="porcentaje_uf" placeholder="Porcentaje de UF/UC" onclick="commaOnly(input,'float')">
                        <div style="color:red;" ><p><?=form_error('porcentaje_condominio')?></p></div>
                     </div>
                     <div class="col-md-3">
                        <label for="exampleInputEmail1">Poligonos</label>
                        <input type="text" class="form-control" id="poligonos" name="poligonos" placeholder="Poligonos">
                        <div style="color:red;" ><p><?=form_error('porcentaje_condominio')?></p></div>
                     </div>
                  </div>
                  </div>
                  <!-- /.form-group -->
               </div>
               <!-- /.col -->
               <!-- /.col -->

            </div>
            <div class="box-footer">
             <button type="submit" class="btn btn-primary"  >Agregar propietario</button>            
                 <a class="btn btn-primary" href="<?=base_url()?>index.php/c_escribano/verMinutas" >Cancelar</a>
            </div>
              </form>
         </div>
  </div>
<!-- /.content-wrapper -->
     <!--Muestra el calendario para fecha de escritura-->
   <script>
        $( document ).ready(function() {
            $('#fecha-escritura').datepicker();
        });
    </script>
     <!--Muestra el calendario para fecha de plano aprobado-->
    <script>
        $( document ).ready(function() {
            $('#fecha-plano-aprobado').datepicker();
        });
    </script>
    
      <!--deshabilita campos si es ph-->
      <script language="javascript"><!--

		function noPh() { 		 
  		  document.getElementById("porcentaje_condominio").disabled = true; 
  		  document.getElementById("nro_ucuf").disabled = true; 
 		  document.getElementById("tipoucuf").disabled = true; 
          document.getElementById("plano_aprobado").disabled = true; 
          document.getElementById("fecha_plano_aprobado").disabled = true; 
          document.getElementById("porcentaje_uf").disabled = true; 
          document.getElementById("poligonos").disabled = true; 
		}
		</script>
		<!--habilita campos si no es ph-->		
		<script language="javascript"><!--

		function ph() { 		 
  		  document.getElementById("porcentaje_condominio").disabled = false;  	
  		  document.getElementById("nro_ucuf").disabled = false; 
 		  document.getElementById("tipoucuf").disabled = false; 	
 	 	  document.getElementById("plano_aprobado").disabled = false; 
 	 	  document.getElementById("fecha_plano_aprobado").disabled = false; 
 		  document.getElementById("porcentaje_uf").disabled = false; 	
 	 	  document.getElementById("poligonos").disabled = false; 
		}
		</script>
		<!--Valida el porcentaje-->

		
		</script>
		<!--Valida el porentaje-->

		<script language="javascript">
		$('#porcentaje_condominio').keyup(function (e) {
    	  commaOnly($(this),'float');
 		   });
		$('#porcentaje_uf').keyup(function (e) {
    	  commaOnly($(this),'float');
 		   });

 		 	  function commaOnly(input,format){         
       			 var value = input.val();
       			 var values = value.split("");
      		 	 var update = "";
      		 	 var transition = "";
      		 	 var expression=/(^\d+$)|(^\d+\.\d+$)|[,\.]/;
      		 	 var finalExpression=/^([1-9][0-9]*[,\.]?\d{0,2})$/;
           	
       		 for(id in values){           
       	  	   if (expression.test(values[id])==true && values[id]!=''){
       	  	       transition+=''+values[id].replace('.',',');
       	  	       if(finalExpression.test(transition)==true)
       	  	       {
       	 	            update+=''+values[id].replace('.',',');
      	 	         }
      	 	     }
     		   }
     		   input.val(update);
   			 }
		</script>
