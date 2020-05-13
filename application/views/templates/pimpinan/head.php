<div class="wrapper">

  <header class="main-header">

    <!-- Logo -->
    <a href="<?= base_url('pimpinan') ?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>M</b>RP</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>MRP</b>System</span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">              
              <i  class="fa fa-user"></i>
              <span class="hidden-xs"><?php echo $this->session->userdata('nama'); ?></span>
            </a>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="<?php echo base_url('admin/logout'); ?>"><i  class="fa fa-sign-out"></i></a>
          </li>
        </ul>
      </div>

    </nav>
  </header>