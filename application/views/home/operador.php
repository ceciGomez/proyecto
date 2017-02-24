  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        
        <small>Bienvenido Operador : <?php echo$this->session->userdata('username') ?></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?=base_url()?>index.php/c_operador"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Operador</li>
      </ol>
    </section>

    <!-- Main content -->
     <section class="col-lg-12 connectedSortable">
         <!-- TO DO List -->
         <div class="box box-primary">
            
            <!-- /.box-header -->
            <div class="box-body">
             <div class="info-box bg-teal">
                  <span class="info-box-icon"><i class="glyphicon glyphicon-search"></i></span>
                  <div class="info-box-content">
                     <span class="info-box-number">Registraciones Pendientes</span>
                     <a class="btn btn-app bg-teal" href="<?=base_url()?>index.php/c_operador/reg_pen"> 
                     <i class="fa fa-play"></i>
                     </a>
                  </div>
               </div>
               <div class="info-box bg-teal">
                  <span class="info-box-icon"><i class="glyphicon glyphicon-search"></i></span>
                  <div class="info-box-content">
                     <span class="info-box-number">Registraciones Aprobadas</span>
                     <a class="btn btn-app bg-teal" href="<?=base_url()?>index.php/c_operador/reg_apro"> 
                     <i class="fa fa-play"></i>
                     </a>
                  </div>
               </div>
               <div class="info-box bg-teal">
                  <span class="info-box-icon"><i class="glyphicon glyphicon-search"></i></span>
                  <div class="info-box-content">
                     <span class="info-box-number">Registraciones Rechazadas</span>
                     <a class="btn btn-app bg-teal" href="<?=base_url()?>index.php/c_operador/reg_rech"> 
                     <i class="fa fa-play"></i>
                     </a>
                  </div>
               </div>
               <div class="info-box bg-teal">
                  <span class="info-box-icon"><i class="glyphicon glyphicon-search"></i></span>
                  <div class="info-box-content">
                     <span class="info-box-number">Ver Minutas</span>
                     <a class="btn btn-app bg-teal" href="<?=base_url()?>index.php/c_operador/ver_Minutas"> 
                     <i class="fa fa-play"></i>
                     </a>
                  </div>
               </div>
               <div class="info-box bg-teal">
                  <span class="info-box-icon"><i class="glyphicon glyphicon-search"></i></span>
                  <div class="info-box-content">
                     <span class="info-box-number">Minutas Pendientes</span>
                     <a class="btn btn-app bg-teal" href="<?=base_url()?>index.php/c_operador/ver_MinutasPendientes"> 
                     <i class="fa fa-play"></i>
                     </a>
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