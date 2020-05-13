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
              <h3 class="box-title">Form Create Komposisi</h3><br><br>
              <?php if($this->session->flashdata('warning')){ ?>
                <div class="alert alert-warning alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <i class="icon fa fa-check"></i>  <?= $this->session->flashdata('warning'); ?>              
                </div>              
              <?php } ?>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form role="form" method="POST" action="<?= base_url('admin/store_product_detail/'. $id_product) ?>">                              
                <div class="form-group">
                  <label>Kompoisi</label>
                  <select class="form-control" name="id_komposisi" required>
                    <option>Select</option>
                    <?php foreach ($komposisi as $key => $value) { ?>
                      <option value="<?= $value->id ?>"><?= $value->komposisi_name ?></option>
                    <?php } ?>                    
                  </select>
                </div>  
                <div class="form-group">
                  <label>Jumlah</label>
                  <input type="text" class="form-control" name="jumlah" placeholder="Enter koma dengan titik" required>
                </div>                                                                                                                                                       
                <br>
                <button type="submit" class="btn btn-success">Save</button>
                <a href="<?php echo base_url('admin/product_detail/'. $id_product) ?>"><button type="button" class="btn btn-danger">Cancel</button></a>

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