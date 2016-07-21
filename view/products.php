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
                    <li><a href="index.php">Главная страница</a></li>
                    <li><a href="news.php">Новости</a></li>
                    <li class="active"><a href="products.php">Каталог</a></li>
                    <li><a href="../gallery.html">Галерея</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Информация<span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="../articles.html">Статьи</a></li>
                            <li><a href="../certificate.html">Сертификаты</a></li>
                            <li><a href="../instructions.html">Инструкции</a></li>
                            <!--<li class="divider"></li>-->
                        </ul>
                    </li>
                    <li><a href="contacts.html">Контакты</a></li>
                    <li><a href="calc_stone.php">Калькулятор</a></li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div>
    </div>
</div>
<div class="alert alert-info">
    <p><a href="../oblic_kamen_27012016.doc"><b>Скачать прайс-лист</b></a>(все цены указаны c учетом НДС)</p>
</div>
<?php foreach ($all as $product): ?>
    <div id="prod" class="col-xs-12 col-md-3 col-lg-3">
        <img id="product" src="/../products_img/<?php echo $product['image']; ?>" class="thumbnail">
        <p align="center"><?php echo $product['title']; ?></p>
        <p align="center">Цена:<b><?php echo $product['price']; ?></b> за 1 кв. м.</p>
        <a href="../product.php?id=<?php echo $product['id']; ?>" class="btn btn-info">Подробнее</a>
        <a href="../calc_stone1.php?id=<?php echo $product['id']; ?>" class="btn btn-info">Рассчитать</a>
    </div>
<?php endforeach; ?>
<hr style="height: 2px;">
<div class="clearfix"></div>
<div class="container">
    <div style="border-bottom: 1px solid red; margin: 10px 0;"></div>
</div>

    <div id="prod" class="col-xs-12 col-md-4 col-lg-4">
        <img id="product" src="/products_img/glue.jpg" style="height: 200px" class="thumbnail">
        <p>Клей для декоративного камня</p>
        <a href="../glue.html" class="btn btn-info">Подробнее</a>
    </div>
<div class="clearfix"></div>
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
