<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="resources/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p><?php echo $_SESSION['username']; ?></p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">CHỨC NĂNG</li>
      <li class="active"><a href="index.php"><i class="fa fa-dashboard"></i> <span>Trang chủ</span></a></li>
      <li><a href="index.php?page=tour"><i class="fa fa-th"></i> <span>Tour</span></a></li>
      <li><a href="index.php?page=customer"><i class="fa fa-th"></i> <span>Khách hàng</span></a></li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>