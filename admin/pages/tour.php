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
                    <td>Tên nhà xe</td>
                    <td>Thời gian</td>
                    <td>Điểm đi</td>
                    <td>Điểm đến</td>
                    <td>Giá</td>
                    <td>Số chỗ ngồi</td>
                  </tr>
                </thead>
                <tbody>
                <?php
                  $tours = $db->table('tour')->get();
                  foreach ($tours as $key => $tour) {
                ?>
                  <tr>
                    <td><?php echo $key ?></td>
                    <td><?php echo $tour->name ?></td>
                    <td><?php echo $tour->time ?></td>
                    <td><?php echo $tour->start_at ?></td>
                    <td><?php echo $tour->end_at ?></td>
                    <td><?php echo $tour->price ?></td>
                    <td><?php echo $tour->seat ?></td>
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