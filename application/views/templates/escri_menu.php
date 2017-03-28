

<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
   <!-- sidebar: style can be found in sidebar.less -->
   <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
         <div class="pull-left image">
            <img src="<?=base_url()?>assets/dist/img/<?php echo $this->session->userdata('foto'); ?>" class="img-circle" alt="User Image">
         </div>
         <div class="pull-left info">
            <p><?php echo $this->session->userdata('nomyap') ?></p>
            <p><?php echo $this->session->userdata('perfil') ?></p>
         </div>
      </div>
      <!-- search form 
      <form action="#" method="get" class="sidebar-form">
         <div class="input-group">
            <input type="text" name="q" class="form-control" placeholder="Search...">
            <span class="input-group-btn">
            <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
            </button>
            </span>
         </div>
      </form>
      /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
         <li class="header">Menú Escribano</li>
         <li class="treeview">
            <a href="#">
            <i class="fa fa-edit"></i> <span>Gestionar Minutas</span>
            <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu">
               <!--  <li><a href="<?=base_url()?>index.php/c_escribano/index"><i class="fa fa-circle-o"></i> Cargar Minutas</a></li>
                  <li><a href="#"><i class="fa fa-circle-o"></i> Editar Minutas</a></li> -->
               <li><a href="<?=base_url()?>index.php/c_escribano/verMinutas"><i class="fa fa-circle-o"></i> Ver Minutas </a></li>
               <!--  <li><a href="#"><i class="fa fa-circle-o"></i> Ver Minutas Pendientes </a></li>
                  <li><a href="#"><i class="fa fa-circle-o"></i> Ver Minutas Rechazadas</a></li>
                  <li><a href="#"><i class="fa fa-circle-o"></i> Buscar Minutas</a></li> -->
               <li><a href="<?=base_url().'index.php/c_escribano/crearParcela'?>"><i class="fa fa-circle-o"></i>Registrar Nueva Minuta</a></li>
               <li><a href="<?=base_url().'index.php/c_escribano/buscarParcelas'?>"><i class="fa fa-circle-o"></i>Buscar Parcelas</a></li>
            </ul>

         </li>
          <li class="treeview">
            <a href="#">
            <i class="fa fa-edit"></i> <span>Gestionar Pedidos</span>
            <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu">
               <!--  <li><a href="<?=base_url()?>index.php/c_escribano/index"><i class="fa fa-circle-o"></i> Cargar Minutas</a></li>
                  <li><a href="#"><i class="fa fa-circle-o"></i> Editar Minutas</a></li> -->
               <li><a href="<?=base_url()?>index.php/c_escribano/verPedidos"><i class="fa fa-circle-o"></i> Ver Pedidos </a></li>
               
               <li><a href="<?=base_url().'index.php/c_escribano/nuevoPedido'?>"><i class="fa fa-circle-o"></i> Nuevo Pedido</a></li>

            </ul>

         </li>
         <li class="treeview">
            <a href="#">
            <i class="fa fa-edit"></i> <span>Reportes</span>
            <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu">
               <li><a href="<?=base_url()?>index.php/c_reportes_escribano/view/minutasPorFecha"><i class="fa fa-circle-o"></i> Ver Minutas por fechas </a></li>
             
            </ul>
            
         </li>
         <a href="#">
         <i class="fa fa-calendar"  id="calendario"  data-provide="datepicker"></i> <span>Calendario</span>
         </a>
         </li>
      </ul>
   </section>
   <!-- /.sidebar -->
</aside>

