<?php
    session_start();

    require 'classes/Database.class.php';
    $config = include('core/config.php');
    $db = new Database($config['db']['host'], $config['db']['username'], $config['db']['password'], $config['db']['db_name']);

    if (!isset($_GET['id'])) {
        header('location: index.php');
    } else {
        $tour = $db->table('tours')->find($_GET['id']);
        if (empty($tour) || $tour['seat'] == 0) {
            echo '<script>alert("Chuyến đi này đã hết chỗ hoặc ko tồn tại! Vui lòng chọn chuyến khác."); location.href="list.php"</script>';
        }
    }

    $error;
    if (isset($_POST['form-check']) && $_POST['form-check'] === $_SESSION['form-check']) {
        $_SESSION['form-check'] = microtime();

        if (!empty($_POST['name']) && !empty($_POST['address']) && !empty($_POST['email']) && !empty($_POST['phone'])) {
            $error = false;
            $result = $db->table('customers')->create([
                'name' => $_POST['name'],
                'address' => $_POST['address'],
                'email' => $_POST['email'],
                'phone' => $_POST['phone'],
                'tour_id' => $_POST['tour_id']
            ]);

            if ($result) {
                $seat = $tour['seat'];
                $db->table('tours')->where('id', $_GET['id'])->update([
                    'seat' => $seat-1
                ]);
                echo '<script>alert("Đặt Tour thành công."); location.href="list.php";</script>';
            } else {
                echo '<script>alert("Có lỗi xảy ra!"); location.reload();</script>';
            }
        } else {
            $error = true;
        }
    }
    $tour = $db->table('tours')->find($_GET['id']);
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
    <link href="css/book.css" rel="stylesheet" type="text/css" />
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
