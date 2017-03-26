<!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?=base_url()?>assets/dist/img/user.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $this->session->userdata('nomyap') ?></p>
          <p><?php echo $this->session->userdata('perfil') ?></p>
        </div>
      </div>
      
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">Menu Administrador</li>
        
              
        <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Administrar Usuarios</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?=base_url()?>index.php/c_administrador/gestionarOperadores"><i class="fa fa-circle-o"></i> Gesionar Operadores</a></li>
            <li><a href="<?=base_url()?>index.php/c_administrador/gestionarEscribanos"><i class="fa fa-circle-o"></i> Gestionar Escribanos</a></li>
            <li><a  href="<?=base_url()?>index.php/c_administrador/crearOperador"><i class="fa fa-circle-o"></i> Crear Operador</a></li>
          </ul>
        </li>

        <li class="treeview">
         
         
            <li><a href="<?=base_url()?>index.php/c_administrador/gestionarMinutas"><i class="fa fa-circle-o"></i> Gestionar Minutas</a></li>
            <li><a href="<?=base_url()?>index.php/c_administrador/buscarParcelas"><i class="fa fa-circle-o"></i> Buscar Parcelas</a></li>

           
            
         
        </li>

         <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Reportes</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-circle-o"></i> Reporte de Minutas</a></li>
            <li><a href="<?=base_url()?>index.php/c_administrador/reportesPedidos"><i class="fa fa-circle-o"></i> Reporte de Pedido</a></li>
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

