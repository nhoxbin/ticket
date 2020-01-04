<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Vé Xe | Ứng Dụng Đặt Vé Xe Khách </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <script src="js/jquery-2.2.4.min.js" type="text/javascript"></script>
    <script src="js/bootstrap.min.js"></script>

    <?php
    session_start();

    if (!class_exists('lessc')) {
        include ('./libs/lessc.inc.php');
    }
    $less = new lessc;
    $less->compileFile('less/stylemain.less', 'css/style.css');
    
    if (!isset($_SESSION['form-check'])) {
        $_SESSION['form-check'] = microtime();
      }
    ?>
    <link href="css/style.css" rel="stylesheet" type="text/css" />
</head>

<body>
    <header>
        <?php include"MasterLayout/template-1.php"; ?>   
        <?php include"MasterLayout/template-2.php"; ?>   
    </header>
    <content>
        <?php include"MasterLayout/template-3.php"; ?> 
        <?php include"MasterLayout/template-4.php"; ?>
        <?php include"MasterLayout/template-5.php"; ?>
        <?php include"MasterLayout/template-6.php"; ?>
    </content>    
    <footer>
        <?php include"MasterLayout/template-7.php"; ?>  
        <?php include"MasterLayout/footer.php"; ?> 
    </footer>
</body>
</html>
