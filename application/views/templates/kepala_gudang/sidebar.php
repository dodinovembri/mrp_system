  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="<?php if($this->uri->segment(2) == 'index') {echo 'active';} ?>">
          <a href="<?php echo base_url('kepala_gudang/index') ?>">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        <li class="<?php if($this->uri->segment(2) == 'supp_order') {echo 'active';} ?>">
          <a href="<?php echo base_url('kepala_gudang/supp_order') ?>">
            <i class="fa fa-files-o"></i>
            <span>Order List</span>            
          </a>         
        </li> 
        <li class="header">STOCK</li>      
        <li class="<?php if($this->uri->segment(2) == 'stock') {echo 'active';} ?>">
          <a href="<?php echo base_url('kepala_gudang/stock') ?>">
            <i class="fa fa-pie-chart"></i>
            <span>Stock Control</span>        
          </a>
        </li>    
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
