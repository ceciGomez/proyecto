

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
         <li><a href="<?=base_url()?>index.php/c_escribano/CrearMinuta"> Parcela</a></li>
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
                              <input type='text' id="nombrePersona"  class='filter' data-column-index='1'>
                            </div>
                            <div class="col-md-3">
                               <label>DNI:</label><br>
                              <input type='text' id="dniPersona"  class='filter' data-column-index='2'>
                            </div> 
                            
                             <input type="hidden" value= '<?php echo $localidades  ?>' id="localidadPost">
                              <input type="hidden" value= '<?php echo $departamentos ?>' id="departamentoPost">
                          </div>                       
                                      
                  </div>
          </div>    
    </div>   

     
      <h3 align="center">Propietarios Registrados en el Sistema</h3>
       <div class="box-body table-responsive no-padding">                   
                     <table id="personas" class="display" style="display: none" data-page-length="4">
                        <thead>
                          <tr>
                             <th>Seleccionar</th>
                              <th>Nombre y Apellido</th>
                              <th>Dni</th>
                              <th>Cuit/cuil</th>                
                              <th>Direccion</th>     
                              <th>Conyuge</th>  
                              <th style="display: none">Tipo</th> 
                              <th style="display: none">localidad</th> 
                              <th style="display: none">fechaNac</th> 
                              <th style="display: none">idPersonaSelect</th> 
                          </tr>
                        </thead>

                      <tbody >
                      <?php foreach ($personas as $c): ?>

                         <tr>
                         <td><button class="btn btn-success">Seleccionar</button></td>
                           <td><?php echo $c->apynom; ?></td>
                           <td><?php echo $c->dni ;?></td>       
                            <td><?php echo $c->cuitCuil;?></td>    
                           <td><?php echo $c->direccion; ?></td>  
                            <td><?php echo $c->conyuge ;  ?></td>       
                            <td style="display: none"><?php echo $c->empresa; ?></td>  
                           <td style="display: none"><?php echo $c->idLocalidad; ?></td>    
                              <td style="display: none"><?php 
                                $date=new DateTime($c->fechaNac);
                                $date_formated=$date->format('d/m/Y ');?></td>   
                              <td style="display: none"><?php echo $c->idPersona; ?></td>     
                        </tr>

            <?php endforeach; ?>
           </tbody>
          </table>
          <?php 
      
          if((!$this->session->userdata('propietario')=="") &&($this->session->userdata('propietario'))){?>
        </div>
        <br>
        <h3 align="center">Propietarios Adquirientes o Tramitientes de la minuta Actual</h3>
           <div class="box-body table-responsive no-padding">                   
                     <table id="propietarios_subidos" class="display" style="display: none" data-page-length="4">
                        <thead>
                          <tr>
                             <th>Eliminar</th>
                            <th>Nombre y Apellido</th>
                              <th>Dni</th>
                              <th>Cuit/cuil</th>                
                              <th>Tipo de Propietario</th>     
                              <th>Porcentaje de Codominio</th>  
                               <th>Dirección</th> 
                               <th>Localidad</th> 
                               <th>Fecha de Nacimiento</th>
                               <th>Sexo</th>
                              <th>Conyuge</th>
                              
                          </tr>
                        </thead>

                      <tbody >
                      <?php
                      $posicion=0;
                       foreach ($this->session->userdata('propietario') as $c):
                        echo $c['localidad'];
                        $localidad=$this->db->get_where('localidad', array('idLocalidad'=> $c['localidad']))->row();        ?>

                         <tr>
                         <td><button class="btn btn-danger" data-toggle="modal"  href="#Eliminar"  onclick="ventanaEliminarProp(<?php echo $posicion ?>)">Eliminar</button></td>
                           <td><?php echo $c['nombreyapellido']; ?></td>
                           <td><?php echo $c['dni'] ;?></td>       
                            <td><?php echo $c['cuit_cuil']; ?></td>  
                            <td><?php echo $c['tipo_propietario' ];  ?></td>  
                            <td><?php echo $c['porcentaje_condominio' ];  ?></td>   
                            <td><?php echo $c['direccion' ];  ?></td>
                            <td><?php echo $localidad->nombre;  ?></td>  
                            <td ><?php echo $c['fecha_nacimiento'];?></td>   
                            <td><?php echo $c['sexo_combobox']; ?></td>  
                            <td><?php echo $c['conyuge' ];  ?></td>                                    
                        </tr>

            <?php
            $posicion=$posicion+1;    
               endforeach; } ?>
               </tbody>
              </table>
              </div>
           
                <div class="modal" id="Eliminar">
                      <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                         <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h3 class="modal-title" style="color:white"> Eliminar Propietario</h3>
                         </div>
                         <div class="modal-body">
                         <h3> Confirmar Eliminar Propietario</h3>                       
                         <div class="modal-footer">
                          <a href="" class="btn btn-default" data-dismiss="modal">Cancelar</a>
                          <a href="" class="btn btn-primary"  onclick="eliminarProp()">Aceptar</a>
                         </div>
                      </div>
                    </div>
                  </div>
                 </div>

   <section class="content">
      <div class="box box-default">
         <div class="box-header with-border">
           <?=form_open(base_url().'index.php/C_escribano/registrarPropietario')?>
            <form method="post">
            <div class="box-body">
               <div class="row">
                 <div class="form-group">
                   <div class="col-md-3">                   
                 <label >Propietario</label>
                  <div class="radio">
                    <label>
                      <input type="radio" name="propietario" id="persona" value="P"  onclick="funcionpersona(); reseteapersona();" <?php if ($propietario == 'P') echo 'checked'; ?>  checked>
                      Persona
                    </label>
                  </div>
                  <div class="radio">
                    <label>
                      <input type="radio" name="propietario" id="empresa" value="O"  onclick="funcionempresa(); reseteaempresa();" <?php if ($propietario == 'O') echo 'checked'; ?>  >
                      Empresa u Otros
                    </label>
                  </div>  
                  </div>                               
                   <div class="col-md-3">                           
                 <label >Tipo Propietario</label>
                  <div class="radio">
                    <label>
                      <input type="radio" name="tipo_propietario" id="adquiriente" <?php echo set_radio('tipo_propietario', 'A', TRUE); ?>   value="A" >
                      Adquiriente
                    </label>
                  </div>
                  <div class="radio">
                    <label>
                      <input type="radio" name="tipo_propietario" id="transmitente" <?php echo set_radio('tipo_propietario', 'T', TRUE); ?>  value="T" >
                      Transmitente
                    </label>
                  </div>      
                  <div style="color:red;" ><p><?=form_error('tipo_propietario')?></p></div>           
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
                        <input type="text"  class="form-control" id="nombreyapellido" placeholder="Nombre y Apellido" <?php echo "value='$nombreyapellido'" ?>  name="nombreyapellido" onkeydown="upperCaseF(this)" maxlength="100">
                        <div style="color:red;" ><p><?=form_error('nombreyapellido')?></p></div>
                     </div>
                     <div class="col-md-3">
                        <label for="exampleInputEmail1">Sexo</label>
                        <select id="sexo_combobox" class="form-control select2" name="sexo_combobox" style="width: 100%;">
                           <option value="" selected="selected">Seleccionar</option>
                           <option value="27" <?php if ($sexo_combobox=="27") echo 'selected="selected"';?>>Femenino</option>
                           <option value="20" <?php if ($sexo_combobox=="20") echo 'selected="selected"';?>>Masculino</option>
                        </select>
                        <div style="color:red;" ><p><?=form_error('sexo_combobox')?></p></div>
                     </div>
                     <div class="col-md-3">
                        <label for="exampleInputEmail1">DNI</label>
                        <input type="number" class="form-control" id="dni" name="dni" placeholder="DNI" <?php echo "value='$dni'" ?>  onkeypress="return isNumberKey(event)" onKeyDown="limitText(this,8);" onKeyUp="limitText(this,8);"/>
                        <div style="color:red;" ><p><?=form_error('dni')?></p></div>
                     </div>
                     <div class="col-md-3"> <!-- debe ser generado automaticamente -->
                        <label for="exampleInputEmail1">CUIL</label>
                        <input type="text" class="form-control" id="cuil" name="cuil" placeholder="CUIL" disabled >                        
                     </div>
                     </div>
                     </div>
                     <div class="row">
                     <div class="form-group">
                     <div class="col-md-3"> <!-- debe ser generado automaticamente -->
                        <label for="exampleInputEmail1">CUIT</label>
                        <input type="text" class="form-control" id="cuit" name="cuit" <?php echo "value='$cuit'" ?>   placeholder="CUIT"  >
                        <div style="color:red;" ><p><?=form_error('cuit')?></p></div>
                     </div>
                                       
                     <div class="col-md-3">
                        <label for="exampleInputEmail1">Conyuge</label>
                        <input type="text" class="form-control" id="conyuge" name="conyuge" <?php echo "value='$conyuge'" ?>  placeholder="Conyuge">
                        <div style="color:red;" ><p><?=form_error('conyuge')?></p></div>
                     </div>
                     <div class="col-md-3">
                        <label for="exampleInputEmail1">Dirección</label>
                        <input type="text" class="form-control" id="direccion" name="direccion" <?php echo "value='$direccion'" ?>  placeholder="Dirección">
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
                      </div>
                      <input type="hidden" name="idPersonaSelect" id="idPersonaSelect" />

                        </div>
                        </div>
                        <div class="row">
                        <div class="form-group">
                       <div class="col-md-3">
                           <label>Departamento</label>
                              <select class="form-control select2 departamentos" id="departamentos"  name="departamentos" style="width: 100%;">
                                  <option value="" selected="">Selecciona departamento</option>
                                 <?php foreach($arraydepartamentos as $each){ ?>
                                    <option value="<?php echo $each->idDepartamento; ?>"<?php if($departamentos==$each->nombre) echo 'selected="selected"'; ?>><?php echo $each->nombre; ?></option>
                                    <?php } ?>
                            </select>
                        <div style="color:red;" ><p><?=form_error('departamentos')?></p></div>                                  
                        </div>                      
                         <div class="col-md-3">
                                 <label>Localidad</label>
                               <select class="form-control select2 localidades" id="localidades" name="localidades" style="width: 100%;">   
                                  <option value="">Seleccione localidad</option>  
                                  </select>
                             <div style="color:red;" ><p><?=form_error('localidades')?></p></div>
                         </div>
               </div>
            </div>
            <div class="box-footer">
              <button type="submit" class="btn btn-primary" name="minuta" value="agregar">Agregar Adquiriente/Transmitente</button>
              <button type="submit" class="btn btn-primary" name="minuta" value="guardar">Guardar Minuta</button>
              <a class="btn btn-primary" href="<?=base_url()?>index.php/c_escribano/verMinutas" >Cancelar</a>
            </div>

            <!-- /.row -->
         </div>
         </form>
         </div>
         </div>
  </section>
  </div>

  <script>
      $( document ).ready(function() {
            $('#fecha_nacimiento').datepicker({
      autoclose: true
    });
        });   
    </script>
    <!--Toma el valor del combobox sexo y lo agrega al campo CUIT-->
    <script>
      $("#sexo_combobox").on("focusout", function () {
      	if($("#dni").val()!="" ){
        var business =$("#sexo_combobox").val().charAt(0)*5 + $("#sexo_combobox").val().charAt(1)*4 + $("#dni").val().charAt(0)*3 + $("#dni").val().charAt(1)*2 + $("#dni").val().charAt(2)*7 + $("#dni").val().charAt(3)*6
                        +$("#dni").val().charAt(4)*5 + $("#dni").val().charAt(5)*4 + $("#dni").val().charAt(6)*3 + $("#dni").val().charAt(7)*2 ;
        if((business%11)==0){
            $("#cuil").val( $("#sexo_combobox").val()+" "+$("#dni").val()+ " "+ 0);
       }else if((business%11)==1 && $("#sexo_combobox").val()==20){
      		$("#cuil").val(23+" "+$("#dni").val()+ " "+ 9);
       }else if((business%11)==1 && $("#sexo_combobox").val()==27){
      		$("#cuil").val(23+" "+$("#dni").val()+ " "+ 4);
       }
       else{
       		$("#cuil").val( $("#sexo_combobox").val()+" "+$("#dni").val()+ " "+ (11-(business%11)));
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
            $("#cuil").val( $("#sexo_combobox").val()+" "+$("#dni").val()+ " "+ 0);
       }else if((business%11)==1 && $("#sexo_combobox").val()==20){
      		$("#cuil").val(23+" "+$("#dni").val()+ " "+ 9);
       }else if((business%11)==1 && $("#sexo_combobox").val()==27){
      		$("#cuil").val(23+" "+$("#dni").val()+ " "+ 4);
       }
       else{
       		$("#cuil").val( $("#sexo_combobox").val()+" "+$("#dni").val()+ " "+ (11-(business%11)));
       }} else {
       	$("#cuil").val("");
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
    <!--Limita campo nombre y apellido a 100 caracteres-->
      <script language="javascript" type="text/javascript">
          $('input[name="nombreyapellido"]').keypress(function() {
            if (this.value.length >= 100) {
            return false;
          }
         });
      </script>

      <!--Deshabilita campos sexo, dni y conyuge-->
      <script language="javascript"><!--   
       $(document).ready(function(){
   if ($("input[name='propietario']:checked").val() == 'O'){
     funcionempresa();
  }
    });
  		function funcionempresa() { 		 
  		document.getElementById("sexo_combobox").disabled = true; 
  		document.getElementById("dni").disabled = true; 
 		  document.getElementById("conyuge").disabled = true; 
      document.getElementById("cuil").disabled = true;
      document.getElementById("cuit").disabled = false; }
      /*Limpia los campos deshabilitados*/
      function reseteaempresa() {   
        document.getElementById("porcentaje_condominio").value=''; 
      document.getElementById("sexo_combobox").value='';
      document.getElementById("dni").value='';
      document.getElementById("conyuge").value='';
      document.getElementById("cuil").value='';
		}
		</script>
		<!--Habilita campos sexo, dni y conyuge-->
		
		<script language="javascript"><!--
    $(document).ready(function(){
   if ($("input[name='propietario']:checked").val() == 'P'){
     funcionpersona();
  }
    });
      function reseteapersona() {      
      document.getElementById("sexo_combobox").disabled = false;    
      document.getElementById("dni").disabled = false; 
      document.getElementById("conyuge").disabled = false;   
      document.getElementById("cuit").disabled = true; 
      document.getElementById("cuil").disabled = true; 
    }
		function funcionpersona() { 		 
  		document.getElementById("sexo_combobox").disabled = false;  	
  		document.getElementById("dni").disabled = false; 
 		  document.getElementById("conyuge").disabled = false; 	 
 	 	  document.getElementById("cuit").disabled = true; 
      document.getElementById("cuil").disabled = true; 
		}
		</script>
		<!--Valida el porcentaje-->

		

		<!--Valida el porcentaje-->

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
                            "sLengthMenu":     "Mostrar _MENU_ Personas",
                            "sZeroRecords":    "No se encontraron resultados",
                            "sEmptyTable":     "Ningúna persona encontrada",
                            "sInfo":           "Mostrando personas del _START_ al 5 de un total de _TOTAL_ registros",
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

                    //en caso de que venga de un post rellena los campos departamento y localidad
                
                       $('#personas tbody').on('click', 'tr', function () {
                         var data = $('#personas').DataTable().row( this ).data();
                         document.getElementById("nombreyapellido").value = data[1]; 
                         document.getElementById("dni").value = data[2];  
                         if ($('input:radio[name=propietario]:checked').val()=='O') {
                             document.getElementById("cuit").value = data[3]; 
                         }else {
                          document.getElementById("cuil").value = data[3]; };
                          document.getElementById("direccion").value = data[4]; 
                          document.getElementById("conyuge").value = data[5];                            
                          document.getElementById("fecha_nacimiento").value=data[8]; 
                          document.getElementById("idPersonaSelect").value=data[9]; 
                         //para mostrar la localidad y departemento
                         idLocalidad=data[7];
                         $.post("<?=base_url()?>index.php/c_escribano/obtenerDepartamento_x_idLoc",{idLocalidad:idLocalidad}, function(data){
                           //seleccciona la provincia de la localidad
                         document.getElementById("departamentos").selectedIndex=data;
                         //cargo todas las localidades
                          midepartamento=$('#departamentos').val();
                         console.log(midepartamento);
                         $.post("<?=base_url()?>index.php/c_escribano/mostrarLocalidad", { midepartamento: midepartamento}, function(data){
                         $("#localidades").html(data);

                           //selecciono la localidad del escribano
                        $("#localidades option[value="+ idLocalidad +"]").attr("selected",true);          
                          });
                        });     
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
                        
                         $('.filter').val('');
                         if( $(this).val() ) {
                              $( "#personas" ).show(); }
                              else{
                                 $( "#personas" ).hide();
                              }
                          
                    }); 

                      //filtras por personas u organizaciones
                       dtable.column('6').search('P').draw();

                      $("input[name='propietario']").change(function(){
                        //vaciar todos los campos
                     document.getElementById("nombreyapellido").value = ""; 
                     document.getElementById("dni").value = "";  
                     document.getElementById("cuit").value =""; 
                     document.getElementById("cuil").value = "";
                     document.getElementById("direccion").value = ""; 
                    document.getElementById("conyuge").value ="";               
                    document.getElementById("fecha_nacimiento").value=""; 
                   $("#localidades option[value="+ 0 +"]").attr("selected",true);
                    $("#departamentos option[value="+ 0 +"]").attr("selected",true);
                    //para que solo busque por personas u organizaciones
               dtable.column('6').search($('input:radio[name=propietario]:checked').val()).draw();
                      });
         
                 
                    var dtable2=$('#propietarios_subidos').DataTable(
                        {
                           autoWidht:false,
                             language: {
                            "sProcessing":     "Procesando...",
                            "sLengthMenu":     "Mostrar _MENU_ Personas",
                            "sZeroRecords":    "No se encontraron resultados",
                            "sEmptyTable":     "Ningúna persona encontrada",
                            "sInfo":           "Mostrando Personas del _START_ al 5 de un total de _TOTAL_ registros",
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
                                } ) ;
                                $( "#propietarios_subidos" ).show();              
                
                      //cargar las localidades y departamentos del post
                       localidadPost=document.getElementById("localidadPost").value ;
              
                        departamentoPost=document.getElementById("departamentoPost").value;
            
                         $("#departamentos option[value="+ departamentoPost +"]").attr("selected",true);

                       $("#localidades option[value="+localidadPost +"]").attr("selected",true);

                      

                      
                       } );   
                  pos="";     
                function ventanaEliminarProp(posicion){
                    pos=posicion;
                   
                  
                  }
                  function eliminarProp(){
                     $.post("<?=base_url()?>index.php/c_escribano/sacarPropietario",{posicion:pos}, function(data){
                     
            });
                  }     

                  
         </script>
        <script >
          function upperCaseF(a){
         setTimeout(function(){
            a.value = a.value.toUpperCase();
           }, 1);
            }
          </script>

          <script>
           $(document).ready(function(){          
        if($('#departamentos').val()!=""){
          localidadOnReady($('#departamentos').val());}
          });
        $("#departamentos").on("change",function(){
           localidad($('#departamentos').val());
         })
              function localidad(iddepartamento) {
             console.log($('#departamentos').val());  
          $.ajax({
         type:'POST',
         datatype:'json',
         data:{id_departamento: iddepartamento},
         url:"<?php echo base_url('index.php/C_escribano/cargarLocalidades');?>",
         success:function(response){  
             $("#localidades").empty();
             $("#localidades").append("<option>Seleccione localidad</option>");
            var json = $.parseJSON(response);
              $(json).each(function(i,val){             
                 $("#localidades").append("<option value='"+val.idLocalidad+"'>"+val.nombre+"</option");  
             });           
             }
             })
            }
             function localidadOnReady(iddepartamento) { 
               $.ajax({
              type:'POST',
               datatype:'json',
               data:{id_departamento: iddepartamento},
               url:"<?php echo base_url('index.php/C_escribano/cargarLocalidades');?>",
              success:function(response){  
              console.log( <?php echo json_encode($localidades); ?>); 
              $("#localidades").empty();
              $("#localidades").append("<option>Seleccione localidad</option>");
             var json = $.parseJSON(response);
              $(json).each(function(i,val){             
                 $("#localidades").append("<option value='"+val.idLocalidad+"'>"+val.nombre+"</option>");  
             });  
              $("#localidades").val( <?php echo json_encode($localidades); ?>);                 
           
         }
        })
      }
   
   </script>
      <!-- controla el ingreso de numero flotante -->
   <script type="text/javascript">
     function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode == 46){
        var inputValue = $("#superficie").val();
        var count = (inputValue.match(/'.'/g) || []).length;
        if(count<1){
            if (inputValue.indexOf('.') < 1){
                return true;
            }
            return false;
        }else{
            return false;
        }
    }
    if (charCode != 46 && charCode > 31 && (charCode < 48 || charCode > 57)){
        return false;
    }
    return true;
   }
   </script>
   <script>
    function isNumber(evt){
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
    }

      </script>
     

    
     



