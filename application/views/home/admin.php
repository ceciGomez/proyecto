  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
   
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
          <th> Nombre y Apellido</th><td> <?php echo $admin->nomyap ?> </td>
        </tr>
        <tr>
          <th> Nombre de Usuario</th><td> <?php echo $admin->usuario ?></td>
        </tr>
        <tr>
          <th> Fecha de Registración</th><td> <?php echo $admin->fechaReg ?> </td>
        </tr>
        <tr>
          <th> DNI</th><td><?php echo $admin->dni ?> </td>
        </tr>
        <tr>
          <th> Teléfono</th><td> <?php echo $admin->telefono ?> </td>
        </tr>
       
        <tr>
          <th> Email</th><td> <?php echo $admin->email ?> </td>
        </tr>
        <tr>
         <tr>
          <th> Dirección</th><td> <?php echo $admin->direccion ?> </td>
        </tr>
          <th> Localidad</th><td> <?php 
           if($admin->idLocalidad==null){echo "";}else{
            $localidad=$this->db->get_where('localidad', array('idLocalidad'=>$admin->idLocalidad))->row(); echo $localidad->nombre;} ?></td>
        </tr>
        <tr>
          <th> Perfil</th><td> Administrador </td>
        </tr>
        </tbody>
            </table>
          </div>

          
         
          
        </div>
        <!-- /.col -->
    
        <!-- /.col -->
      </div>
      <!-- /.row -->
</section>
  </div>
  <!-- /.content-wrapper -->