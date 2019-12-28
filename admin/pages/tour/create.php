<?php
  if (isset($_POST['name'])) {
    $result = $db->table('tours')->create([
      'name' => $_POST['name'],
      'time' => $_POST['time'],
      'start_at' => $_POST['start_at'],
      'end_at' => $_POST['end_at'],
      'price' => $_POST['price'],
      'seat' => $_POST['seat']
    ]);
    if ($result) {
      header('Location: index.php?page=tour');
    }
  }
?>

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Tour
      <small>Create</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Tour</a></li>
      <li class="active">Create</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Main row -->
    <div class="row">
      <div class="col-md-12">
        <div class="box box-info">
          <div class="box-header with-border">
            <h3 class="box-title">Tạo tour</h3>
          </div>
          <div class="box-body">
            <form action="" method="post" id="tour-form">
              <div class="form-group row">
                <label for="name" class="col-md-3 col-form-label">Tên nhà xe:</label>
                <div class="col-md-9">
                  <input type="text" name="name" class="form-control">
                </div>
              </div>
              <div class="form-group row">
                <label for="name" class="col-md-3 col-form-label">Thời gian:</label>
                <div class="col-md-9">
                  <input type="text" name="time" class="form-control" id="reservationtime">
                </div>
              </div>
              <div class="form-group row">
                <label for="name" class="col-md-3 col-form-label">Điểm đi:</label>
                <div class="col-md-9">
                  <input type="text" name="start_at" class="form-control">
                </div>
              </div>
              <div class="form-group row">
                <label for="name" class="col-md-3 col-form-label">Điểm đến:</label>
                <div class="col-md-9">
                  <input type="text" name="end_at" class="form-control">
                </div>
              </div>
              <div class="form-group row">
                <label for="name" class="col-md-3 col-form-label">Giá:</label>
                <div class="col-md-9">
                  <input type="text" name="price" class="form-control">
                </div>
              </div>
              <div class="form-group row">
                <label for="name" class="col-md-3 col-form-label">Chỗ ngồi:</label>
                <div class="col-md-9">
                  <input type="text" name="seat" class="form-control">
                </div>
              </div>
            </form>
          </div>
          <div class="box-footer">
            <button class="btn btn-primary" onclick="document.getElementById('tour-form').submit()">Lưu</button>
          </div>
        </div>
      </div>
    </div>
    <!-- /.row (main row) -->
  </section>
  <!-- /.content -->
</div>