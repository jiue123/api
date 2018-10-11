<?php
    session_start();
    require ('connection/connection.php');

    if ($_GET['page'] == 'register' && !isset($_SESSION['email'])) {
        $page = $_GET['page'];
    } else if (!isset($_SESSION['email'])) {
        $page = 'login';
    } else {
        $page = $_GET['page'];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $page; ?></title>

    <link href="asset/bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">Api Website</a>
            </div>
            <ul class="nav navbar-nav">
                <?php
                    if (isset($_SESSION['email'])) {
                ?>
                    <li <?php if ($page == 'home') { ?>class="active"<?php } ?>><a href="index.php?page=home">Home</a></li>
                    <li><a href="process/logout_process.php">Logout</a></li>
                <?php
                    } else {
                ?>
                <li <?php if($page == 'login') { ?>class="active"<?php } ?>><a href="index.php?page=login">Login</a></li>
                <?php
                    }
                ?>
            </ul>
        </div>
    </nav>
    <div class="container">
        <div class="row">
            <?php
                if (isset($_SESSION['error']) || isset($_SESSION['success']))
                    require ("alert.php");
            ?>
        </div>
        <?php
            switch ($page) {
                case 'login':
                    require ('login.php');
                    break;
                case 'home':
                    require ('home.php');
                    break;
                case 'register':
                    require ('register.php');
                    break;
            }
        ?>
    </div>
    <link href="asset/css/style.css" rel="stylesheet">
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="asset/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
</body>
</html>