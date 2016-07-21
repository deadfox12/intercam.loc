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
<?php foreach ($all as $product): ?>

    <div class="container">
        <div class="row">
        <div class="col-lg-6">
            <img id="product" src="/../products_img/<?php echo $product['image']; ?>" class="thumbnail">
        </div>
        <div class="col-lg-6">
            <h3><p align="center"><?php echo $product['title']; ?></p></h3>
            <p align="left"><?php echo $product['description']; ?></p>
            <p align="left">Цена:<?php echo $product['price']; ?> руб. за кв. м.</p>
        </div>
            <table cellpadding="2" cellspacing="1" class="table" id="products">
                <thead>
                    <tr>
                        <th>&nbsp;</th>
                        <th>Плоскостной элемент</th>
                        <th>Угловой элемент</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Длина (см)</td>
                        <td><?php echo $product['length_pl']?></td>
                        <td><?php echo $product['length_ang']?></td>
                    </tr>
                    <tr>
                        <td>Ширина (см)</td>
                        <td><?php echo $product['width_pl']?></td>
                        <td><?php echo $product['weight_ang']?></td>
                    </tr>
                    <tr>
                        <td>Толщина (см)</td>
                        <td><?php echo $product['depth_pl']?></td>
                        <td><?php echo $product['depth_ang']?></td>
                    </tr>
                    <tr>
                        <td>Упаковка (г/ящик с прокладками)</td>
                        <td><?php echo $product['package_pl']?></td>
                        <td><?php echo $product['package_ang']?></td>
                    </tr>
                    <tr>
                        <td>Вес упаковки с продукцией (кг)</td>
                        <td><?php echo $product['weight_pl']?></td>
                        <td><?php echo $product['weight_ang']?></td>
                    </tr>
                </tbody>
            </table>
                <?php endforeach; ?>
        </div>
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