<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Производство искусственного, декоративного и облицовочного камня</title>
    <link href="/bootstrap-3.3.6-dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../lightbox/css/lightbox.css" rel="stylesheet">
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
                    <li class="active"><a href="index.php">Главная страница</a></li>
                    <li><a href="news.php">Новости</a></li>
                    <li><a href="products.php">Каталог</a></li>
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
<!--Создание карусели-->
<div id="carousel" class="carousel slide">
    <!--Индикаторы-->
    <ol class="carousel-indicators">
        <li class="active" data-target="#carousel" data-slide-to="0"></li>
        <li data-target="#carousel" data-slide-to="1"></li>
        <li data-target="#carousel" data-slide-to="2"></li>
    </ol>
    <!--Слайды-->
    <div class="carousel-inner">
        <div class="item active">
            <img src="/img/6400 старая крепость бежевая.jpg">
            <div class="carousel-caption">

            </div>
        </div>
        <div class="item">
            <img src="/img/6400 старая крепость бежевая.jpg">
            <div class="carousel-caption">
                <H3>Слайд</H3>
                <p>Описание</p>
            </div>
        </div>
        <div class="item">
            <img src="/img/6400 старая крепость бежевая.jpg">
            <div class="carousel-caption">
                <H3>Слайд</H3>
                <p>Описание</p>
            </div>
        </div>
    </div>
    <a class="left carousel-control" href="#carousel" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
    </a>
    <a class="right carousel-control" href="#carousel" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
    </a>
</div>
    <?php foreach ($all as $news): ?>
        <div class="media">
            <hr>
            <div class="media-body">
                <h4 class="media-heading">
                    <?php echo $news['title'];?>
                </h4>
                <p><span class="date"><?php echo $news['date_news'];?></span></p>
                <p>
                    <?php echo $news['text'];?>
                </p>
            </div>
            <div class="media-right">
                <a  data-lightbox="news" class="media-object" href="/../news_img/<?php echo $news['image']; ?>"><img src="/../news_img/<?php echo $news['image']; ?>"></a>
            </div>
        </div>
    <?php endforeach; ?>
    <!--Подвал-->
    <div id="footer">
        <div class="row" class="navbar-fixed-bottom">
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
    <script src="/lightbox/js/lightbox.js"></script>
</body>
</html>