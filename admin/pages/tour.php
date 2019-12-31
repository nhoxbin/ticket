<?php
  if (isset($_POST['_method']) && $_POST['_method'] == 'delete' && $_SESSION['form-check'] === $_POST['form-check']) {
    $_SESSION['form-check'] = microtime();
    $result = $db->table('tours')->where('id', $_POST['tour_id'])->delete();
    if ($result) {
      echo '<script>alert("Xóa tour thành công.")</script>';
    } else {
      echo '<script>alert("Không xóa được!")</script>';
    }
  }
?>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Tour
      <!-- <small>Control panel</small> -->
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
              <table id="tour-table" class="table table-bordered table-hover table-striped">
                <thead>
                  <tr>
                    <td>STT</td>
                    <td>Tên nhà xe</td>
                    <td>Thời gian</td>
                    <td>Điểm đi</td>
                    <td>Điểm đến</td>
                    <td>Giá</td>
                    <td>Số chỗ ngồi</td>
                    <td>Hành động</td>
                  </tr>
                </thead>
                <tbody>
                <?php
                  $tours = $db->table('tours')->get();
                  foreach ($tours as $key => $tour) {
                ?>
                  <tr>
                    <td><?php echo $key+1 ?></td>
                    <td><?php echo $tour['name'] ?></td>
                    <td><?php echo $tour['time'] ?></td>
                    <td><?php echo $tour['start_at'] ?></td>
                    <td><?php echo $tour['end_at'] ?></td>
                    <td><?php echo number_format($tour['price']) ?>đ</td>
                    <td><?php echo $tour['seat'] ?></td>
                    <td>
                      <div class="btn-group">
                        <a href="index.php?page=tour&method=edit&id=<?php echo $tour['id'] ?>" class="btn btn-info"><i class="fa fa-pencil"></i></a>
                        <button class="btn btn-danger" onclick="document.getElementById('delete-tour-form').submit()"><i class="fa fa-close"></i></button>
                      </div>
                      <form action="" id="delete-tour-form" method="post">
                        <input type="hidden" name="_method" value="delete">
                        <input type="hidden" name="form-check" value="<?php echo $_SESSION['form-check'] ?>">
                        <input type="hidden" name="tour_id" value="<?php echo $tour['id'] ?>">
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