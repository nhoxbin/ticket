<?php
  if (isset($_POST['_method']) && $_POST['_method'] == 'delete' && $_SESSION['form-check'] === $_POST['form-check']) {
    $_SESSION['form-check'] = microtime();
    $result = $db->table('customers')->where('id', $_POST['customer_id'])->delete();
    if ($result) {
      $seat = $db->table('tours')->find($_POST['tour_id'])['seat'];
      $db->table('tours')->where('id', $_POST['tour_id'])->update([
          'seat' => $seat+1
      ]);
      echo '<script>alert("Xóa khách hàng thành công.")</script>';
    } else {
      echo '<script>alert("Không xóa được!")</script>';
    }
  }
?>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Khách hàng
      <!-- <small>Control panel</small> -->
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Customer</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Main row -->
    <div class="row">
      <div class="col-md-12">
        <div class="box box-info">
          <div class="box-header with-border">
            <h3 class="box-title">Danh sách khách hàng</h3>
          </div>
          <div class="box-body">
            <div class="table-reponsive">
              <table id="customer-table" class="table table-bordered table-hover table-striped">
                <thead>
                  <tr>
                    <td>STT</td>
                    <td>Tên khách hàng</td>
                    <td>Địa chỉ</td>
                    <td>Email</td>
                    <td>Số điện thoại</td>
                    <td>Tour</td>
                    <td>Giá</td>
                    <td>Hành động</td>
                  </tr>
                </thead>
                <tbody>
                <?php
                  $customers = $db->table('customers')->with('tours');
                  foreach ($customers as $key => $customer) {
                ?>
                  <tr>
                    <td><?php echo $key+1 ?></td>
                    <td><?php echo $customer['name'] ?></td>
                    <td><?php echo $customer['address'] ?></td>
                    <td><?php echo $customer['email'] ?></td>
                    <td><?php echo $customer['phone'] ?></td>
                    <td><?php echo $customer['start_at'] . ' - ' . $customer['end_at'] ?></td>
                    <td><?php echo number_format($customer['price']) ?>đ</td>
                    <td>
                      <button class="btn btn-danger" onclick="document.getElementById('delete-customer-form').submit()"><i class="fa fa-close"></i></button>
                      <form action="" method="post" id="delete-customer-form" style="display: none;">
                        <input type="hidden" name="_method" value="delete">
                        <input type="hidden" name="form-check" value="<?php echo $_SESSION['form-check'] ?>">
                        <input type="hidden" name="tour_id" value="<?php echo $customer['tour_id'] ?>">
                        <input type="hidden" name="customer_id" value="<?php echo $customer['id'] ?>">
                      </form>
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