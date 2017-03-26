  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
   

    <!-- Main content -->
    <section class="content">
   <!-- Main row -->
   
      <div class="row">
        <div class="col-md-12">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
               <h3 class="profile-username text-center">BIENVENIDO A SIRMI</h3>
              <img class="profile-user-img img-responsive img-circle" src="<?=base_url()?>assets/dist/img/<?php echo $this->session->userdata('foto'); ?>" alt="User profile picture">

              <h3 class="profile-username text-center"><?php echo $this->session->userdata('nomyap') ?></h3>

              <p class="text-muted text-center"><?php echo $this->session->userdata('perfil') ?></p>
              
            </div>
            <!-- /.box-body -->
            <table class="table" class="table-bordered" >
            <tbody>
              <tr>
          <th> Nombre y Apellido</th><td> <?php echo $operador->nomyap ?> </td>
        </tr>
        <tr>
          <th> Nombre de Usuario</th><td> <?php echo $operador->usuario ?></td>
        </tr>
        <tr>
          <th> Fecha de Registración</th><td> <?php echo $operador->fechaReg ?> </td>
        </tr>
        <tr>
          <th> DNI</th><td><?php echo $operador->dni ?> </td>
        </tr>
        <tr>
          <th> Teléfono</th><td> <?php echo $operador->telefono ?> </td>
        </tr>
       
        <tr>
          <th> Email</th><td> <?php echo $operador->email ?> </td>
        </tr>
        <tr>
         <tr>
          <th> Dirección</th><td> <?php echo $operador->direccion ?> </td>
        </tr>
          <th> Localidad</th><td> <?php
          if($operador->idLocalidad==null){echo "";}else{
           $localidad=$this->db->get_where('localidad', array('idLocalidad'=>$operador->idLocalidad))->row();
           echo $localidad->nombre; }?></td>
        </tr>
        <tr>
          <th> Perfil</th><td> Operador </td>
        </tr>
        </tbody>
            </table>
         
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

