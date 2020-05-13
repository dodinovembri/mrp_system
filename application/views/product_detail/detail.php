  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>        
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('admin/index') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo base_url('admin/product') ?>">Product List</a></li>
        <li><a href="<?php echo base_url('admin/product_detail/'. $id_product) ?>">Product Komposisi</a></li>
        <li class="active">Create Product Komposisi</li>
      </ol>
    </section>

    <section class="content">
      <div class="row">
        <!-- right column -->
        <div class="col-md-12">
          <!-- general form elements disabled -->
          <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Product Komposisi Detail</h3><br><br>
              <?php if($this->session->flashdata('warning')){ ?>
                <div class="alert alert-warning alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <i class="icon fa fa-check"></i>  <?= $this->session->flashdata('warning'); ?>              
                </div>              
              <?php } ?>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form role="form" method="POST" action="">                              
                <div class="form-group">
                  <label>Nama Komposisi</label>
                  <input type="text" class="form-control" name="product_name" value="<?= $product_detail->id_komposisi ?>" placeholder="Enter ..." readonly>
                </div>   
                <div class="form-group">
                  <label>Jumlah</label>
                  <input type="text" class="form-control" name="jumlah" value="<?= $product_detail->jumlah ?>" placeholder="Enter koma dengan titik" readonly>
                </div> 
                <br>                                                                                                                         

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