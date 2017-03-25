

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
   <div class="box box-primary">
            <div class="box-header">          
               
                 <label>Buscar propietarios :</label>
               
                <div class="box-body" style="background-color: lightblue;">
                     
                         <div class="row">
                            <div class="col-md-3">
                               <label>Apellido y nombre:</label><br>
                              <input type='text' id="nombrePersona"  class='filter' data-column-index='0'>
                            </div>
                            <div class="col-md-3">
                               <label>DNI:</label><br>
                              <input type='text' id="dniPersona"  class='filter' data-column-index='1'>
                            </div> 
                          </div>                       
                                      
                  </div>
          </div>    
    </div>   

     

       <div class="box-body table-responsive no-padding">                   
                     <table id="personas" class="display" style="display: none" data-page-length="4">
                        <thead>
                          <tr>
                             <th>Selecc</th>
                            <th>Nombre y Apellido</th>
                              <th>Cuit/cuil</th>
                              <th>Dni</th>                
                              <th>Direccion</th>     
                              <th>Conyuge</th>  
                          </tr>
                        </thead>

                      <tbody >
                      <?php foreach ($personas as $c): ?>

                         <tr>
                         <td><button class="btn btn-success">Seleccionar</button></td>
                           <td><?php echo $c->apynom; ?></td>
                           <td><?php echo $c->dni; ?></td>       
                            <td><?php echo $c->cuitCuil; ?></td>    
                           <td><?php echo $c->direccion; ?></td>  
                            <td><?php echo $c->conyuge; ?></td>       
                        </tr>

             <?php endforeach; ?>
              </tbody>
                 </table>

                 </div>

   <section class="content-body">
      <div class="box box-default">
         <div class="box-header with-border">
            <div class="box-body">
               <div class="row">
                 <div class="form-group">
                   <div class="col-md-3">                   
                 <label >Tipo propietario</label>
                  <div class="radio">
                    <label>
                      <input type="radio" name="tipoPropietario" id="persona" value="option1" onclick="persona()" checked>
                      Persona
                    </label>
                  </div>
                  <div class="radio">
                    <label>
                      <input type="radio" name="tipoPropietario" id="empresa" value="option2" onclick="empresa()">
                      Empresa
                    </label>
                  </div>  
                  </div>
                  <div class="form-group">    
                   </div>            
                   <div class="col-md-3">                           
                 <label >Propietario</label>
                  <div class="radio">
                    <label>
                      <input type="radio" name="optionsRadios" id="radioAdquiriente" value="option1" >
                      Adquiriente
                    </label>
                  </div>
                  <div class="radio">
                    <label>
                      <input type="radio" name="optionsRadios" id="radioTransmitente" value="option2" >
                      Transmitente
                    </label>
                  </div>                 
                </div>
                   </div> 
                   </div>                
                </div>
            <div class="box-body">
               <div class="row">
                  <div class="form-group">
                  <div class="col-md-3">
                        <label for="exampleInputEmail1">Porcentaje de Condominio</label>
                        <input type="text" step="any" name="porcentaje_condominio" class="form-control" <?php echo "value='$porcentaje_condominio'" ?> id="porcentaje_condominio" placeholder="Porcentaje de Condominio">
                       <div style="color:red;" ><p><?=form_error('porcentaje_condominio')?></p></div>
                     </div>
                     </div>
                     </div>
                     <div class="row">
                     <div class="form-group">
                     <div class="col-md-3">
                        <label for="exampleInputEmail1">Apellido y Nombre</label>
                        <input type="text"  class="form-control" id="nombreyapellido" placeholder="Apellido" name="nombreyapellido" onkeyup="changeToUpperCase(this)"  maxlength="100">
                        <div style="color:red;" ><p><?=form_error('nombreyapellido')?></p></div>
                     </div>
                     <div class="col-md-3">
                        <label for="exampleInputEmail1">Sexo</label>
                        <select id="sexo_combobox" class="form-control select2"  style="width: 100%;">
                           <option value="0" selected="selected">Seleccionar</option>
                           <option value="27" >Femenino</option>
                           <option value="20" >Masculino</option>
                        </select>
                        <div style="color:red;" ><p><?=form_error('sexo_combobox')?></p></div>
                     </div>
                     <div class="col-md-3">
                        <label for="exampleInputEmail1">DNI</label>
                        <input type="number" class="form-control" id="dni" placeholder="DNI" onkeypress="return isNumberKey(event)" onKeyDown="limitText(this,8);" onKeyUp="limitText(this,8);"/>
                        <div style="color:red;" ><p><?=form_error('dni')?></p></div>
                     </div>
                     <div class="col-md-3"> <!-- debe ser generado automaticamente -->
                        <label for="exampleInputEmail1">CUIT</label>
                        <input type="text" class="form-control" id="cuit" placeholder="CUIT" disabled >
                        <div style="color:red;" ><p><?=form_error('cuit')?></p></div>
                     </div>
                     </div>
                     </div>
                     <div class="row">
                     <div class="form-group">
                     <div class="col-md-3"> <!-- debe ser generado automaticamente -->
                        <label for="exampleInputEmail1">CUIL</label>
                        <input type="text" class="form-control" id="cuil" placeholder="CUIL" disabled >
                        <div style="color:red;" ><p><?=form_error('cuil')?></p></div>
                     </div>
                                       
                     <div class="col-md-3">
                        <label for="exampleInputEmail1">Conyuge</label>
                        <input type="text" class="form-control" id="conyuge" placeholder="Conyuge">
                        <div style="color:red;" ><p><?=form_error('conyuge')?></p></div>
                     </div>
                     <div class="col-md-3">
                        <label for="exampleInputEmail1">Dirección</label>
                        <input type="text" class="form-control" id="direccion" placeholder="Dirección">
                        <div style="color:red;" ><p><?=form_error('direccion')?></p></div>
                     </div>
                     <div class="col-md-3">
                                    <label>Fecha de Nacimiento/Creación</label>
                                    <div class="input-group date">
                                       <div class="input-group-addon">
                                          <i class="fa fa-calendar"></i>
                                       </div>
                                       <input type="text" class="form-control pull-right" placeholder="dd/mm/aaaa" name="fecha_nacimiento" <?php echo "value='$fecha_nacimiento'" ?> id="fecha_nacimiento">
                                    </div>
                                    <div style="color:red;" ><p><?=form_error('fecha_nacimiento')?></p></div>
                        </div>
                        </div>
                        </div>
                        <div class="row">
                        <div class="form-group">
                     <div class="col-md-3">
                        <label>Localidad</label>
                        <select class="form-control select2"  style="width: 100%;">                          
                        </select>
                     </div>
                       <div class="col-md-3">
                        <label>Localidad</label>
                        <select class="form-control select2"  style="width: 100%;">                          
                        </select>
                     </div>
               </div>
            </div>
            <div class="box-footer">
             <a class="btn btn-primary" href="<?=base_url().'index.php/c_escribano/registrarPropietario'?>" >Guardar y Registrar Otro Propietario</a>
               <a class="btn btn-primary" href="<?=base_url().'index.php/c_escribano/registrarMinuta'?>" >Finalizar Minuta</a>
                 <a class="btn btn-primary" href="<?=base_url()?>index.php/c_escribano/verMinutas" >Cancelar</a>
            </div>
            <!-- /.row -->
         </div>
  </section>
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
      $("#sexo_combobox").on("focusout", function () {
      	if($("#dni").val()!="" ){
        var business =$("#sexo_combobox").val().charAt(0)*5 + $("#sexo_combobox").val().charAt(1)*4 + $("#dni").val().charAt(0)*3 + $("#dni").val().charAt(1)*2 + $("#dni").val().charAt(2)*7 + $("#dni").val().charAt(3)*6
                        +$("#dni").val().charAt(4)*5 + $("#dni").val().charAt(5)*4 + $("#dni").val().charAt(6)*3 + $("#dni").val().charAt(7)*2 ;
        if((business%11)==0){
            $("#cuit").val( $("#sexo_combobox").val()+" "+$("#dni").val()+ " "+ 0);
       }else if((business%11)==1 && $("#sexo_combobox").val()==20){
      		$("#cuit").val(23+" "+$("#dni").val()+ " "+ 9);
       }else if((business%11)==1 && $("#sexo_combobox").val()==27){
      		$("#cuit").val(23+" "+$("#dni").val()+ " "+ 4);
       }
       else{
       		$("#cuit").val( $("#sexo_combobox").val()+" "+$("#dni").val()+ " "+ (11-(business%11)));
       }}
         });

    </script>
    <!--Toma el valor del campo dni y lo agrega al campo CUIT-->
    <script>
      $("#dni").on("focusout", function () {
      	if($("#dni").val()!=""  && $("#sexo_combobox").val()!=0 ){
        var business =$("#sexo_combobox").val().charAt(0)*5 + $("#sexo_combobox").val().charAt(1)*4 + $("#dni").val().charAt(0)*3 + $("#dni").val().charAt(1)*2 + $("#dni").val().charAt(2)*7 + $("#dni").val().charAt(3)*6
                        +$("#dni").val().charAt(4)*5 + $("#dni").val().charAt(5)*4 + $("#dni").val().charAt(6)*3 + $("#dni").val().charAt(7)*2 ;
        if((business%11)==0){
            $("#cuit").val( $("#sexo_combobox").val()+" "+$("#dni").val()+ " "+ 0);
       }else if((business%11)==1 && $("#sexo_combobox").val()==20){
      		$("#cuit").val(23+" "+$("#dni").val()+ " "+ 9);
       }else if((business%11)==1 && $("#sexo_combobox").val()==27){
      		$("#cuit").val(23+" "+$("#dni").val()+ " "+ 4);
       }
       else{
       		$("#cuit").val( $("#sexo_combobox").val()+" "+$("#dni").val()+ " "+ (11-(business%11)));
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
          $('input[name="nombreyapellido"]').keypress(function() {
            if (this.value.length >= 100) {
            return false;
          }
         });
      </script>

      <!--Deshabilita campos sexo, dni y conyuge-->
      <script language="javascript"><!--

		function empresa() { 		 
  		  document.getElementById("sexo_combobox").disabled = true; 
  		   document.getElementById("dni").disabled = true; 
 		  document.getElementById("conyuge").disabled = true; 

          document.getElementById("cuil").disabled = false; 
		}
		</script>
		<!--Habilita campos sexo, dni y conyuge-->
		
		<script language="javascript">
<!--

		function persona() { 		 
  		  document.getElementById("sexo_combobox").disabled = false;  	
  		  document.getElementById("dni").disabled = false; 
 		  document.getElementById("conyuge").disabled = false; 	 

 	 	  document.getElementById("cuil").disabled = true; 
		}
		</script>
		<!--Valida el porcentaje-->

		

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
<!--     Filtra personas por nombre y apellido o dni -->
              <script type="text/javascript">
                   
                   $(document).ready(function(){
                    //crea la tabla
                    var dtable=$('#personas').DataTable(
                        {
                           autoWidht:false,
                             language: {
                              "columnDefs": [ {
                                     "targets": -1,
                                         "data": null,
                                           "defaultContent": "<button>Click!</button>"
                                                } ],
                                "sProcessing":     "Procesando...",
                            "sLengthMenu":     "Mostrar _MENU_ Escribanos",
                            "sZeroRecords":    "No se encontraron resultados",
                            "sEmptyTable":     "Ningúna persona encontrada",
                            "sInfo":           "Mostrando Escribanos del _START_ al 5 de un total de _TOTAL_ registros",
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
                  ;

                 
     
                       $('#personas tbody').on('click', 'tr', function () {
                      var data = $('#personas').DataTable().row( this ).data();
                     document.getElementById("nombreyapellido").value = data[0]; 
                     document.getElementById("dni").value = data[1];  
                     document.getElementById("cuit").value = data[2]; 
                     document.getElementById("direccion").value = data[3]; 
                    document.getElementById("conyuge").value = data[4]; 
                      } );

                     
                         //para el filtrado
                     $('.filter').on('keyup change', function () {
                          //clear global search values
                          dtable.search('');
                          dtable.column($(this).data('columnIndex')).search(this.value).draw();
                           if( $(this).val() ) {
                              $( "#personas" ).show(); }
                              else{
                                 $( "#personas" ).hide();
                              }

                      });
                      
                      $( ".dataTables_filter input" ).on( 'keyup change',function() {
                       //clear column search values
                          dtable.columns().search('');
                         //clear input values
                         $('.filter').val('');
                         if( $(this).val() ) {
                              $( "#personas" ).show(); }
                              else{
                                 $( "#personas" ).hide();
                              }
                          
                    }); 
                     
                    
                      //quitar el campo de busqueda por defecto
                                      
                      } );              
                  
         </script>
           <script >
           function changeToUpperCase(el)
           {
             el.value =el.value.trim().toUpperCase();
            }
          </script>