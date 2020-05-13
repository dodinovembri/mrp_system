
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('kepala_gudang/index') ?>"><i class="fa fa-dashboard"></i> Home</a></li>        
        <li class="active">Stock Control</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Stock Control List</h3>
              <br><br><?php if($this->session->flashdata('success')){ ?>
                <div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <i class="icon fa fa-check"></i>  <?= $this->session->flashdata('success'); ?>              
                </div>              
              <?php } ?>               
            </div>
            <!-- /.box-header -->
            <div class="box-body" style="overflow-x: scroll;">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>                  
                  <th>Komposisi</th>
                  <th>Status</th>
                  <th>Stock</th>                  
                  <th>Biaya Pemesanan</th>                  
                  <th>Biaya Penyimpanan</th>                  
                  <th>EOQ</th>                  
                  <th>Frekuensi Pemesanan</th>                  
                  <th>ROP</th>                  
                  <th>SS</th>                                    
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php $no = 0; foreach ($stock as $key => $value) { $no++; ?>
                  <tr>
                    <td><?= $no ?></td>                    
                    <td><b><?= $value->komposisi_name ?></b></td>
                    <td>
                      <?php if ($value->status == 1) { ?>
                        <small class="label label-info"><i class="fa fa-clock-o"></i> In Order</small>  
                      <?php }elseif($value->status == 2){ ?>
                        <small class="label label-info"><i class="fa fa-clock-o"></i> Already ordered </small>                       
                      <?php }else{ ?>
                        <?php if ($value->stock <= $value->eoq) { ?>
                          <a data-toggle="modal" data-target="#modal-primary-<?php echo $value->id ?>" href="javascript::">
                          <small class="label label-danger"><i class="fa fa-clock-o"></i> Your's Stock Need to Order</small></a>
                        <?php } else{ ?>
                          <small class="label label-info"><i class="fa fa-clock-o"></i> Your's Stock is safe</small>
                        <?php } ?>
                      <?php } ?>                      
                    </td>
                    <td><?= $value->stock ?></td>                    
                    <td>Rp. <?= number_format($value->biaya_pemesanan, 2,',','.') ?></td>                    
                    <td>Rp. <?= number_format($value->biaya_penyimpanan, 2,',','.') ?></td>                    
                    <td><?= $value->eoq ?></td>                    
                    <td><?= $value->frekuensi_pemesanan ?></td>                    
                    <td><?= $value->rop ?></td>                    
                    <td><?= $value->ss ?></td>                                        
                    <td>                                            
                      <a href="<?php echo base_url('kepala_gudang/stock_define/'. $value->id) ?>"><i class="fa fa-edit"></i></a>
                    </td>                    
                  </tr>   
                  <div class="modal modal-primary fade" id="modal-primary-<?php echo $value->id ?>">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                          <h4 class="modal-title">Create New Order to Supplier</h4>
                        </div>
                        <div class="modal-body">
                          <form method="post" action="<?php echo base_url('kepala_gudang/store_supp_order/'. $value->id)  ?>">
                          <div class="form-group">
                            <label>Nama Supplier</label>
                            <input type="text" class="form-control" name="supplier_name" placeholder="Enter ..." required>
                          </div> 
                          <div class="form-group">
                            <label>Telp Supplier</label>
                            <input type="text" class="form-control" name="telp" placeholder="Enter ..." required>
                          </div>                                                  
                          <div class="form-group">
                            <label>Description</label>
                            <textarea class="form-control" rows="6" name="description"> </textarea>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-outline">Order Now</button>                          
                          </form>
                        </div>
                      </div>
                      <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                  </div> 
                <?php } ?>                               
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
