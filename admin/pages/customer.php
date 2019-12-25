<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Tour
      <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Tour</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Main row -->
    <div class="row">
      <div class="col-md-12">
        <div class="box box-info">
          <div class="box-header with-border">
            <h3 class="box-title">Danh sách tour</h3>
            <a href="?page=tour&method=create" class="btn btn-info pull-right">Thêm Tour</a>
          </div>
          <div class="box-body">
            <div class="table-reponsive">
              <table class="table table-bordered table-hover table-striped">
                <thead>
                  <tr>
                    <td>STT</td>
                    <td>Tên khách hàng</td>
                    <td>Địa chỉ</td>
                    <td>Email</td>
                    <td>Số điện thoại</td>
                    <td>Hành động</td>
                  </tr>
                </thead>
                <tbody>
                <?php
                  $customers = $db->table('customers')->get();
                  foreach ($customers as $key => $customer) {
                ?>
                  <tr>
                    <td><?php echo $key+1 ?></td>
                    <td><?php echo $customer['name'] ?></td>
                    <td><?php echo $customer['address'] ?></td>
                    <td><?php echo $customer['email'] ?></td>
                    <td><?php echo $customer['phone'] ?></td>
                    <td>
                      <div class="btn-group">
                        
                      </div>
                    </td>
                  </tr>
                <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- /.row (main row) -->

  </section>
  <!-- /.content -->
</div>