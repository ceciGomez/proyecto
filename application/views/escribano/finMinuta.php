  <!-- Content Wrapper. Contains page content -->
  <style>
table {
    border-collapse: collapse;
    width: 100%;
}

th, td {
    padding: 8px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

tr:hover{background-color:#f5f5f5;
}
</style>

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->   

    <!-- Main content -->
    <section class="content">
   <!-- Main row -->
   <h3 align="center">
         Minuta reciente
      </h3>
      <div class="row">
        <div class="col-md-12">

          <!-- Profile Image -->
          <div class="box box-primary">
         <?=form_open(base_url().'index.php/C_escribano/checkPost')?>
          <form method="post" >
                <!-- Tabla para mostrar datos de parcela -->
             <table class="table" class="table-bordered" style="tr:hover {background-color: #f5f5f5}" >
             <p class="bg-primary">Parcela</p>          
            <tbody>           
          <tr>
          <th> Tipo propiedad</th><td> <?php echo $this->session->userdata('tipoPropiedad'); ?> </td>
          <th> Departamento</th><td> <?php echo $this->session->userdata('departamentos'); ?> </td>
          <th> Localidad</th><td> <?php echo $this->session->userdata('localidades'); ?> </td>
        </tr>
        </tbody>
       </table>
             <!-- Tabla para mostrar ph -->
            <table class="table" class="table-bordered" style="tr:hover {background-color: #f5f5f5}" >
             <p class="bg-primary">Ph</p>
            <thead>
            <tr>
              <th>Fecha de escritura</th>
              <th>Plano</th>
             </tr>
            </thead>
            <tbody>            
       
            <?php 
              $datosph = $this->session->userdata('datos_ph');             
              foreach ($datosph as $val) :?>
               <tr class="item_row">
               <td><?php echo $val['fecha_escritura'];  ?></td>
                 <td> <?php echo $val['fecha_plano_aprobado'];  ?></td>       
               </tr>
             <?php endforeach;?>
        </tbody>
       </table>
       <!-- Tabla para mostrar propietarios -->
            <table class="table" class="table-bordered" style="tr:hover {background-color: #f5f5f5}" >
            <p class="bg-primary">Propietarios</p>
            <thead>
            <tr>
              <th>Apellido y Nombre</th>
              <th>Tipo propietario</th>
               <th>Porcentaje condominio</th>
             </tr>
            </thead>
            <tbody>            
       
            <?php 
              $propietarios = $this->session->userdata('propietario');
              foreach ($propietarios as $value) :?>
               <tr class="item_row">
               <td><?php echo $value['nombreyapellido']; ?></td>
                 <td> <?php echo $value['tipo_propietario']; ?></td>    
                <td> <?php echo $value['porcentaje_condominio']; ?></td>      
               </tr>
             <?php endforeach;?>
        </tbody>
       </table>
       <div class="box-footer">
        <button type="submit" class="btn btn-primary" name="finminuta" value="agregarph">Agregar Ph</button>  
        <button type="submit" class="btn btn-primary" name="finminuta" value="agregarparcela" >Agregar Parcela</button> 
        <a  class="btn btn-primary" name="finminuta" href="<?=base_url()?>index.php/c_escribano/verMinutas" >Ver Minutas</a>                         
       </div>
       </form>
       </div>
          <!-- /.box -->        
        
       </div>
        <!-- /.col -->    
        <!-- /.col -->
      </div>
      <!-- /.row -->
</section>
  </div>
  <!-- /.content-wrapper -->
  <script type="text/javascript">
 function agregarPh( ){
    $.post("<?=base_url()?>index.php/c_escribano/crearRelacion",
      {finminuta:'agregarph'}, function(data){               
           });
            }
</script>