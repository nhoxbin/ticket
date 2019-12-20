<?php
    if (!isset($_GET['id'])) {
        header('location: index.php');
    }
    require 'classes/Database.class.php';
    $config = include('core/config.php');
    $db = new Database($config['db']['host'], $config['db']['username'], $config['db']['password'], $config['db']['db_name']);
    $tour = $db->table('tour')->find($_GET['id']);
    /*echo '<pre>';
    print_r($tour);
    echo '</pre>';
    die;*/
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Danh sách nhà xe | Ứng Dụng Đặt Vé Xe Khách </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <script src="js/jquery-2.2.4.min.js" type="text/javascript"></script>
    <script src="js/bootstrap.min.js"></script>

    <?php
    if (!class_exists('lessc')) {
        include ('./libs/lessc.inc.php');
    }
    $less = new lessc;
    $less->compileFile('less/style-form-thong-tin-dat-xe.less', 'css/style-form-thong-tin-dat-xe.css');
    ?>
    <link href="css/style.css" rel="stylesheet" type="text/css" />
    <link href="css/style-form-thong-tin-dat-xe.css" rel="stylesheet" type="text/css" />
</head>

<body>
    <header>
        <?php include"MasterLayout/template-1.php"; ?>   
        <div class="clearfix"></div>
        <?php include"MasterLayout/list-banner.php"; ?>   
        <div class="clearfix"></div>
    </header>
    <content>
        <?php include"MasterLayout/form-thong-tin.php"; ?> 
        <div class="clearfix"></div>
    </content>    
    <footer>
        <!-- <?php include"MasterLayout/template-6.php"; ?>   -->
        <div class="clearfix"></div>
        <?php include"MasterLayout/footer.php"; ?> 
    </footer>
</body>
</html>
