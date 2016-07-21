<?php
require_once 'classes/db.php';
$sql='SELECT title,price FROM product';
$product=$pdo->prepare($sql);
$product->execute();
$all=$product->fetchAll();
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Каталог искусственного, декоративного и облицовочного камня</title>
    <link href="/bootstrap-3.3.6-dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../style.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div id="header" class="row">
    <div id="logo" class="col-lg-6">
        <img src="/img/logo1.png">
    </div>
    <div id="header-text" class="col-lg-6">
        Производство искусственного камня<BR>
        Мы работаем по всей России<BR>
        Тел.: +7 (861) 992-44-04<BR>
    </div>
</div>
<div class="navbar navbar-inverse">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Открыть навигацию</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li><a href="#">Главная страница</a></li>
                    <li><a href="#">Новости</a></li>
                    <li class="active"><a href="#">Каталог</a></li>
                    <li><a href="#">Галерея</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Информация<span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="#">Статьи</a></li>
                            <li><a href="#">Сертификаты</a></li>
                            <li><a href="#">Инструкции</a></li>
                            <!--<li class="divider"></li>-->
                        </ul>
                    </li>
                    <li><a href="#">Контакты</a></li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div>
    </div>
</div>
<form>
    <select>
        <?php foreach ($all as $product): ?>
        <option value="<?php echo ++$i?>" data-price="<?php echo $product['price']?>"><?php echo $product['title']?></option>
        <?php endforeach; ?>
    </select>
    <input type="number" class="kvadratura">
</form>

<!--Подвал-->
<div id="footer" class="navbar-fixed-bottom">
    <div class="row">
        <div class="col-lg-6">
            <p>Copyright 2016, ООО “Интеркам”</p>
            <p><a href="tel:+78619924404" onclick="yaCounter28123782.reachGoal('push_phone'); ga('send', 'event', 'Телефон', 'Кнопка в Футере')">+7 (861) 992-44-04</a></p>
        </div>
        <div id="social" class="col-lg-6">
            <p>МЫ В СОЦИАЛЬНЫХ СЕТЯХ</p>
            <a href="#" class="tw"></a>
            <a href="#" class="fb"></a>
            <a href="#" class="vk"></a>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="/bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>
</body>
</html>