

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
         Crear Minuta
      </h1>
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
            <h3 class="box-title">Registrar Propietario</h3>
            <!-- /.box-header -->
            <div class="form-group">
                  <div class="radio">
                    <label>
                      <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" onclick="persona()" checked>
                      Persona
                    </label>
                  </div>
                  <div class="radio">
                    <label>
                      <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2" onclick="empresa()">
                      Empresa
                    </label>
                  </div>                 
                </div>
            <div class="box-body">
               <div class="row">
                  <div class="form-group">
                     <div class="col-md-3">
                        <label for="exampleInputEmail1">Apellido y Nombre</label>
                        <input type="text"  class="form-control" id="inputTextBox" placeholder="Apellido" name="nya" maxlength="100">
                        <!-- /.form-group -->
                     </div>
                     <div class="col-md-3">
                        <label for="exampleInputEmail1">Sexo</label>
                        <select id="sexo-combobox" class="form-control select2"  style="width: 100%;">
                           <option value="0" selected="selected">Seleccionar</option>
                           <option value="27" >Femenino</option>
                           <option value="20" >Masculino</option>
                        </select>
                     </div>
                     <div class="col-md-3">
                        <label for="exampleInputEmail1">DNI</label>
                        <input type="number" class="form-control" id="dni" placeholder="DNI" onkeypress="return isNumberKey(event)" onKeyDown="limitText(this,8);" onKeyUp="limitText(this,8);"/>
                     </div>
                     <div class="col-md-3"> <!-- debe ser generado automaticamente -->
                        <label for="exampleInputEmail1">CUIT</label>
                        <input type="text" class="form-control" id="cuit" placeholder="CUIT" disabled >
                     </div>
                     <div class="col-md-3"> <!-- debe ser generado automaticamente -->
                        <label for="exampleInputEmail1">CUIL</label>
                        <input type="text" class="form-control" id="cuil" placeholder="CUIL" disabled >
                     </div>
                  </div>
                  <div class="form-group">
                     <div class="col-md-3">
                        <label for="exampleInputEmail1">Conyuge</label>
                        <input type="text" class="form-control" id="conyuge" placeholder="Conyuge">
                     </div>
                     <div class="col-md-3">
                        <label for="exampleInputEmail1">Dirección</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Dirección">
                     </div>
                     <div class="col-md-3">
                        <label>Localidad</label>
                        <select class="form-control select2"  style="width: 100%;">
                           <option selected="selected">Laguna Blanca</option>
                           <option>Resistencia</option>
                           <option>Tres Isletas</option>
                           <option>Las Palmas</option>
                           <option>Taco Pozo</option>
                           <option>Saenz Peña</option>
                           <option>La Escondida</option>
                        </select>
                     </div>
                     <div class="col-md-3">
                        <label for="exampleInputEmail1">Fecha de Escritura</label>
                          <div class="input-group date">
                            <div class="input-group-addon">
                             <i class="fa fa-calendar"></i>
                         </div>
                          <input type="text" class="form-control pull-right" id="fecha-escritura" placeholder="Fecha de Escritura">
                     </div>
                     </div>
                  </div>
                  <div class="form-group">
                     <div class="col-md-3">
                        <label for="exampleInputEmail1">Porcentaje de Condominio</label>
                        <input type="text" step="any" name="porcentaje_condominio" class="form-control" id="porcentaje_condominio" placeholder="Porcentaje de Condominio">
                     </div>
                     <div class="col-md-3">
                        <label for="exampleInputEmail1">Numero de UC/UF</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Numero de UC/UF">
                     </div>
                     <div class="col-md-3">
                        <label for="exampleInputEmail1">Tipo UF/UC</label>
                        <select id="sexo-combobox" class="form-control select2"  style="width: 100%;">
                           <option selected="selected">Seleccionar</option>
                           <option >C</option>
                           <option >F</option>
                        </select>
                     </div>
                     <div class="col-md-3">
                        <label for="exampleInputEmail1">Plano Aprobado de la UF/UC</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Plano Aprobado de la UF/UC">
                     </div>
                    <div class="col-md-3">
                        <label for="exampleInputEmail1">Fecha de Plano de Aprobado</label>                     
                          <div class="input-group date">
                            <div class="input-group-addon">
                             <i class="fa fa-calendar"></i>
                         </div>
                          <input type="text" class="form-control pull-right" id="fecha-plano-aprobado" placeholder="Fecha Plano Aprobado">
                     </div>
                  </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->
                </div>
                   <div class="row">
                  <div class="form-group">
                     <div class="col-md-3">
                        <label for="exampleInputEmail1">Porcentaje de UF/UC</label>
                        <input type="text" step="any" class="form-control" name="porcentaje_uf" id="porcentaje_uf" placeholder="Porcentaje de UF/UC" onclick="commaOnly(input,'float')">
                     </div>
                     <div class="col-md-3">
                        <label for="exampleInputEmail1">Poligonos</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Poligonos">
                     </div>
                  </div>
                  </div>
                  <!-- /.form-group -->
               </div>
               <!-- /.col -->
               <!-- /.col -->
            </div>
            <div class="box-footer">
             <a class="btn btn-primary" href="<?=base_url().'index.php/c_escribano/registrarPropietario'?>" >Guardar y Registrar Otro Propietario</a>
              <a class="btn btn-primary" href="<?=base_url().'index.php/c_escribano/CrearMinuta'?>" >Guardar y Registrar Otra Parcela</a>
               <a class="btn btn-primary" href="<?=base_url().'index.php/c_escribano/registrarMinuta'?>" >Finalizar Minuta</a>
                 <a class="btn btn-primary" href="<?=base_url()?>index.php/c_loginescri" >Cancelar</a>
            </div>
            <!-- /.row -->
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
    <!--Toma el valor del combobox sexo y lo agrega al campo CUIT-->
    <script>
      $("#sexo-combobox").on("focusout", function () {
      	if($("#dni").val()!="" ){
        var business =$("#sexo-combobox").val().charAt(0)*5 + $("#sexo-combobox").val().charAt(1)*4 + $("#dni").val().charAt(0)*3 + $("#dni").val().charAt(1)*2 + $("#dni").val().charAt(2)*7 + $("#dni").val().charAt(3)*6
                        +$("#dni").val().charAt(4)*5 + $("#dni").val().charAt(5)*4 + $("#dni").val().charAt(6)*3 + $("#dni").val().charAt(7)*2 ;
        if((business%11)==0){
            $("#cuit").val( $("#sexo-combobox").val()+" "+$("#dni").val()+ " "+ 0);
       }else if((business%11)==1 && $("#sexo-combobox").val()==20){
      		$("#cuit").val(23+" "+$("#dni").val()+ " "+ 9);
       }else if((business%11)==1 && $("#sexo-combobox").val()==27){
      		$("#cuit").val(23+" "+$("#dni").val()+ " "+ 4);
       }
       else{
       		$("#cuit").val( $("#sexo-combobox").val()+" "+$("#dni").val()+ " "+ (11-(business%11)));
       }}
       // $("#cuit").val( $("#sexo-combobox").val()+" "+business);
         });

    </script>
    <!--Toma el valor del campo dni y lo agrega al campo CUIT-->
    <script>
      $("#dni").on("focusout", function () {
      	if($("#dni").val()!=""  && $("#sexo-combobox").val()!=0 ){
        var business =$("#sexo-combobox").val().charAt(0)*5 + $("#sexo-combobox").val().charAt(1)*4 + $("#dni").val().charAt(0)*3 + $("#dni").val().charAt(1)*2 + $("#dni").val().charAt(2)*7 + $("#dni").val().charAt(3)*6
                        +$("#dni").val().charAt(4)*5 + $("#dni").val().charAt(5)*4 + $("#dni").val().charAt(6)*3 + $("#dni").val().charAt(7)*2 ;
        if((business%11)==0){
            $("#cuit").val( $("#sexo-combobox").val()+" "+$("#dni").val()+ " "+ 0);
       }else if((business%11)==1 && $("#sexo-combobox").val()==20){
      		$("#cuit").val(23+" "+$("#dni").val()+ " "+ 9);
       }else if((business%11)==1 && $("#sexo-combobox").val()==27){
      		$("#cuit").val(23+" "+$("#dni").val()+ " "+ 4);
       }
       else{
       		$("#cuit").val( $("#sexo-combobox").val()+" "+$("#dni").val()+ " "+ (11-(business%11)));
       }} else {
       	$("#cuit").val("");
       }     
         });

    </script>
    <!--Limita campo dni a ingresar solo números-->
     <script>
    function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
    }
     </script>
     <!--Limita campo dni a 8 números-->
     <script language="javascript" type="text/javascript">
    function limitText(limitField, limitNum) {
    if (limitField.value.length > limitNum) {
        limitField.value = limitField.value.substring(0, limitNum);
      }
    }
   </script>
    <script>
        $(document).on('keypress', '#inputTextBox', function (event) {
         var regex = new RegExp("^[a-zA-Z ]+$");
          var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
            if (!regex.test(key)) {
           event.preventDefault();
           return false;
          }
       });
    </script>
    <!--Limita campo nombre y apellido a 10 caracteres-->
      <script language="javascript" type="text/javascript">
          $('input[name="nya"]').keypress(function() {
            if (this.value.length >= 10) {
            return false;
          }
         });
      </script>

      <!--Deshabilita campos sexo, dni y conyuge-->
      <script language="javascript"><!--

		function empresa() { 		 
  		  document.getElementById("sexo-combobox").disabled = true; 
  		   document.getElementById("dni").disabled = true; 
 		  document.getElementById("conyuge").disabled = true; 

          document.getElementById("cuil").disabled = false; 
		}
		</script>
		<!--Habilita campos sexo, dni y conyuge-->
		
		<script language="javascript">
<!--

		function persona() { 		 
  		  document.getElementById("sexo-combobox").disabled = false;  	
  		  document.getElementById("dni").disabled = false; 
 		  document.getElementById("conyuge").disabled = false; 	 

 	 	  document.getElementById("cuil").disabled = true; 
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
