<?php
  session_start();

  $user = include('../core/user.php');
  if ($_SESSION['username'] !== $user['username'] && $_SESSION['password'] !== $user['password']) {
    header('Location: session/login.php');
  }
  if (!isset($_SESSION['form-check'])) {
    $_SESSION['form-check'] = microtime();
  }
  
  require '../classes/Database.class.php';
  $config = include('../core/config.php');
  $db = new Database($config['db']['host'], $config['db']['username'], $config['db']['password'], $config['db']['db_name']);
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="resources/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="resources/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="resources/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="resources/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="resources/dist/css/skins/_all-skins.min.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="resources/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="resources/bower_components/bootstrap-daterangepicker/daterangepicker.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  <?php include('blocks/header.php') ?>

  <!-- Left side column. contains the logo and sidebar -->
  <?php include('blocks/aside.php') ?>

  <!-- Content Wrapper. Contains page content -->
  <?php
    if (isset($_GET['page']) && file_exists('pages/'.$_GET['page'].'.php')) {
      $page = $_GET['page'];
      if (isset($_GET['method']) && file_exists('pages/'.$page.'/'.$_GET['method'].'.php')) {
        include('pages/'.$page.'/'.$_GET['method'].'.php');
      } else {
        include('pages/'.$_GET['page'].'.php');
      }
    } else {
      include('pages/home.php');
    }
  ?>
  <!-- /.content-wrapper -->

  <?php include('blocks/footer.php') ?>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="resources/bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="resources/bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="resources/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- daterangepicker -->
<script src="resources/bower_components/moment/min/moment.min.js"></script>
<script src="resources/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="resources/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Slimscroll -->
<script src="resources/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="resources/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="resources/dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!-- <script src="resources/dist/js/pages/dashboard.js"></script> -->
<!-- AdminLTE for demo purposes -->
<script src="resources/dist/js/demo.js"></script>

<script>
  $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, locale: { format: 'MM/DD/YYYY hh:mm A' }})
</script>
</body>
</html>
