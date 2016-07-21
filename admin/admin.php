<?php
require_once __DIR__ . '/access.php';
if (!userIsLoggedIn())
{
    include __DIR__.'/login.php';
    exit();
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Панель администратора</title>
    <link href="/bootstrap-3.3.6-dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="admin.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="admin.php">Панель администратора</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a>
                        <span class="glyphicon glyphicon-user"></span>
                        <?php echo $_SESSION['email']?>
                    </a>
                </li>
                <li><a><form action="" method="post">
                    <div>
                        <input type="hidden" name="action" value="logout">
                        <input type="hidden" name="goto" value="../index.php">
                        <input class="btn btn-danger" type="submit" value="Выйти">
                    </div>
                </form></a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container-fluid">
    <div class="row">
        <div class="col-xs-4 col-sm-3 col-md-2 sidebar">
            <ul class="nav nav-sidebar">
                <li><a href="news.php">Список новостей</a></li>
                <li><a href="products.php">Список товаров</a></li>
                <li><a href="users.php">Пользователи</a></li>
                <li><a href="orders.php">Заказы</a></li>
            </ul>
        </div>
    </div>
</div>
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

</div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="/bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>
</body>
</html>