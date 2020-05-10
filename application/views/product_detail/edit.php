  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1> 
        Data Tables
        <small>advanced tables</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Data tables</li>
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
              <form role="form" method="POST" action="<?= base_url('admin/store_update_product_detail/'.$product_detail->id ) ?>">                              
                <div class="form-group">
                  <label>Kompoisi</label>
                  <select class="form-control" name="id_komposisi" required>
                    <option value="<?php echo $product_detail->id_komposisi ?>"><?php echo $product_detail->id_komposisi; ?></option>
                    <?php foreach ($komposisi as $key => $value) { ?>
                      <option value="<?= $value->id ?>"><?= $value->komposisi_name ?></option>
                    <?php } ?>                    
                  </select>
                </div>   
                <div class="form-group">
                  <label>Jumlah</label>
                  <input type="text" class="form-control" name="jumlah" value="<?php echo $product_detail->jumlah ?>" placeholder="Enter koma dengan titik" required>
                </div>                                                                                                                            
                <br>
                <button type="submit" class="btn btn-success">Save</button>
                <button type="button" class="btn btn-danger">Cancel</button>

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