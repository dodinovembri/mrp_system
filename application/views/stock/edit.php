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
              <form role="form" method="POST" action="<?= base_url('kepala_gudang/store_update_stock/'.$stock->id ) ?>">                              
                <div class="form-group">
                  <label>Komposisi</label>
                  <input type="text" class="form-control" name="komposisi" value="<?php echo $stock->komposisi_name ?>" placeholder="Enter ..." readonly>
                </div>   
                <div class="form-group">
                  <label>Stock</label>
                  <input type="text" class="form-control" name="stock" value="<?php echo $stock->stock ?>" placeholder="Enter ..." readonly>
                </div>  
                <div class="form-group">
                  <label>Satuan</label>
                  <input type="text" class="form-control" name="satuan" value="<?php echo $stock->satuan ?>" placeholder="Enter ..." readonly>
                </div>  
                <div class="form-group">
                  <label>Jumlah</label>
                  <input type="text" class="form-control" name="jumlah" value="<?php echo $stock->jumlah ?>" placeholder="Enter ..." required>
                </div>                  
                <div class="form-group">
                  <label>Harga</label>
                  <input type="text" class="form-control" name="harga" value="<?php echo $stock->harga ?>" placeholder="Enter ..." required>
                </div>                                  
                <div class="form-group">
                  <label>Biaya Pemesanan</label>
                  <input type="text" class="form-control" name="biaya_pemesanan" value="<?php echo $stock->biaya_pemesanan ?>" placeholder="Enter ..." required>
                </div> 
                <div class="form-group">
                  <label>Biaya Penyimpanan</label>
                  <input type="text" class="form-control" name="biaya_penyimpanan" value="<?php echo $stock->biaya_penyimpanan ?>" placeholder="Enter ..." required>
                </div> 
                <div class="form-group">
                  <label>Lead Time</label>
                  <input type="number" min="1" class="form-control" name="lt" value="<?php echo $stock->lt ?>" placeholder="Enter ..." required>
                </div> 
                <div class="form-group">
                  <label>Service Level</label>
                  <input type="number" min="1" class="form-control" name="sl" value="<?php echo $stock->sl ?>" placeholder="Enter ..." required>
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