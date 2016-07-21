<!DOCTYPE html>
<html lang="ru" xmlns="http://www.w3.org/1999/html">
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
            <a class="navbar-brand" href="#">Панель администратора</a>
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
                <li><a href="news.php">Список новостей <span class="sr-only">(current)</span></a></li>
                <li><a href="products.php">Список товаров</a></li>
                <li><a href="users.php">Пользователи</a></li>
                <li class="active"><a href="orders.php">Заказы</a></li>
            </ul>
        </div>
    </div>
</div>
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <table class="table" id="products" width="100%">
        <tr>
            <td width="5%"><b>Номер заказа</b></td>
            <td width="10%"><b>ФИО клиента</b></td>
            <td width="80%"><b>email</b></td>
            <td width="5%"><b>Товар</b></td>
            <td width="10%"><b>Упаковок угловых элементов</b></td>
            <td width="15%"><b>Упаковок плоскостных элементов</b></td>
            <td width="15%"><b>Стоимость заказа</b></td>
            <td width="15%"><b>Дата заказа</b></td>
        </tr>
        <?php foreach ($all as $orders): ?>
            <tr>
                <td width="5%"><?php echo $orders['order_number']?></td>
                <td width="10%"><?php echo $orders['fio_klient']?></td>
                <td width="80%"><?php echo $orders['email']?></td>
                <td width="5%"><?php echo $orders['product']?></td>
                <td width="10%"><?php echo $orders['pack_ang']?></td>
                <td width="15%"><?php echo $orders['pack_pl']?></td>
                <td width="15%"><?php echo $orders['summ']?></td>
                <td width="15%"><?php echo $orders['date_order']?></td>
                <form action="" method="post"><input type="hidden" name="id" value="<?php echo $orders['id']?>"/>
                    <td width="5%"><input class="btn-danger" type="submit" name="action" value="удалить"></form> </td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="/bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>
</body>
</html>