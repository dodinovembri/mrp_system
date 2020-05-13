  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('admin/index') ?>"><i class="fa fa-dashboard"></i> Home</a></li>        
        <li><a href="<?php echo base_url('admin/user') ?>"> User</a></li>        
        <li class="active">Create User</li>
      </ol>
    </section>

    <section class="content">
      <div class="row">
        <!-- right column -->
        <div class="col-md-12">
          <!-- general form elements disabled -->
          <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">General Elements</h3><br><br>
              <?php if($this->session->flashdata('warning')){ ?>
                <div class="alert alert-warning alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <i class="icon fa fa-check"></i>  <?= $this->session->flashdata('warning'); ?>              
                </div>              
              <?php } ?>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form role="form" method="POST" action="<?= base_url('admin/store_update_user/'.$user->id ) ?>">                              
                <div class="form-group">
                  <label>Username</label>
                  <input type="text" class="form-control" name="username" value="<?php echo $user->username ?>" placeholder="Enter ..." required>
                </div>
                <div class="form-group">
                  <label>Role Akses</label>
                  <select class="form-control" name="role_akses" required>                    
                    <option value="<?php echo $user->id_role ?>"><?php echo $user->role_akses; ?></option>
                    <?php foreach ($role as $key => $value) { ?>
                      <option value="<?= $value->id ?>"><?= $value->role_akses ?></option>
                    <?php } ?>                    
                  </select>
                </div>                
                <div class="form-group">
                  <label>Password</label>
                  <input type="password" class="form-control" name="password" placeholder="Enter ..." required>
                </div> 
                <div class="form-group">
                  <label>Password Confirm</label>
                  <input type="password" class="form-control" name="password_confirm" placeholder="Enter ..." required>
                </div>                                                                                                                           
                <br>
                <button type="submit" class="btn btn-success">Save</button>
                <a href="<?php echo base_url('admin/user') ?>"><button type="button" class="btn btn-danger">Cancel</button></a>

              </form>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </section>
  </div>
  <!-- /.content-wrapper -->    