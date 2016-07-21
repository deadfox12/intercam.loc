<?php
require_once 'classes/db.php';
$sql='SELECT title,price,package_pl,package_ang FROM product';
$product=$pdo->prepare($sql);
$product->execute();
$all=$product->fetchAll();
?>

<!DOCTYPE html>
<html lang="ru" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Производство искусственного, декоративного и облицовочного камня</title>
    <link href="/bootstrap-3.3.6-dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../style.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>
        jQuery(document).ready(function($){
            /* чтобы не переделывать пхп(маразм) */
            $('.kamni-spisok option').each(function(){
                $(this).val($(this).attr('c0'));
            });



            /* поведение селекта */
            $('.kamni-spisok').change(function(){
                $('.kamni-spisok-c').html($(this).val()+' руб. ');
                calc();
            });
            /* поведение инпутов ШИРИНА и ВЫСОТА */
            $('.shirina, .visota').on('input',function(){
                var val_1=$(this).val(),
                    second=$(this).is('.shirina') ? 'visota' : 'shirina',
                    val_2=$('.'+second).val();
                if(val_1 && val_2){
                    $('.kvadratura').html((val_1*val_2)+'м<sup>2</sup>');
                    $('.kvadratura-tr').fadeOut(0,function(){$(this).fadeIn(900);});
                    calc();
                }
            });
            /* поведение инпута УГЛЫ */
            $('.ucet-uglov-input').on('input',function(){
                var val=$(this).val()*$('.kamni-spisok').val()+' руб.';
                if(val){
                    $('.cena-pm').html(val);
                    $('.cena-pm-tr').fadeOut(0,function(){$(this).fadeIn(900);});
                }
                calc();
            });
            /* поведение кнопки ИТОГО */
            $('.submit').click(calc);

            function calc(){

                var kamen=$('.kamni-spisok').val(),
                    shirina=$('.shirina').val(),
                    visota=$('.visota').val(),
                    ucet_uglov=$('.ucet-uglov-input').val(),
                    pack_pl=parseFloat($('.kamni-spisok option:selected').attr('p0')),
                    pack_ang=parseFloat($('.kamni-spisok option:selected').attr('p1')),
                    type=$('.kamni-spisok option:selected').attr('t'),
                    ugli=parseFloat($('.ucet-uglov-input').on('input').val()) || 0,
                    fields_ready=0;

                /* проверка полей */
                switch(true){
                    case !shirina  : $('.shirina').get(0).focus();  break;
                    case !visota   : $('.visota').get(0).focus();   break;
                    default        :  fields_ready=1;               break;
                }
                if(!fields_ready){return;}
                $('.itogo-pack-pl').html(Math.ceil(shirina*visota/pack_pl));
                $('#cena').val(kamen*shirina*visota+kamen*ucet_uglov);
                $('#type').val(type);
                $('#kvadratura_pl').val(shirina*visota);
                $('#kvadratura_ang').val(ugli);
                $('#pack_pl').val(Math.ceil(shirina*visota/pack_pl));
                $('#pack_ang').val(Math.ceil(ugli/pack_ang));
                $('.itogo-pack-ang').html(Math.ceil(ugli/pack_ang));
                $('.itogo-calc').html(kamen*shirina*visota+kamen*ucet_uglov+' руб.');
                $('.glue').html(Math.ceil(shirina*visota/8)+' шт.');

            }

            //блокирует поле "с учетом углов"
            $('.ucet-uglov').on('change',function (){
                var inp=$('.ucet-uglov-input');
                !$(this).is(':checked') ?
                    (inp.attr('disabled','disabled').val(''),$('.cena-pm-tr').fadeOut(0,function(){$('.cena-pm').html('');}))
                    : inp.removeAttr('disabled').get(0).focus();
                calc();
            });
            $('.kamni-spisok-c').html($('.kamni-spisok').val()+' руб.');
        });
    </script>
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
                    <li><a href="products.php">Каталог</a></li>
                    <li><a href="gallery.html">Галерея</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Информация<span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="articles.html">Статьи</a></li>
                            <li><a href="certificate.html">Сертификаты</a></li>
                            <li><a href="instructions.html">Инструкции</a></li>
                            <!--<li class="divider"></li>-->
                        </ul>
                    </li>
                    <li><a href="contacts.html">Контакты</a></li>
                    <li class="active"><a href="calc_stone.php">Калькулятор</a></li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div>
    </div>
</div>
<div class="container">
    <div class="alert alert-info">
        <b><p>Расчет стоимости декоративного камня</p></b>
        <p>Предлагаем воспользоваться on-line калькулятором для расчета стоимости декоративного камня. Параметры расчета Вы можете подобрать самостоятельно. Для получения уточненных данных Вам достаточно отправить результаты расчета на электронную почту менеджера отдела продаж.</p>
    </div>
<table align="center" style="background-image: url("")">
    <tr>
        <td>Выберите камень:</td>
        <td>
            <select class="kamni-spisok">
                <?php foreach ($all as $product): ?>
                    <option value="" p0="<?php echo $product['package_pl']?>"
                    p1="<?php echo $product['package_ang']?>"
                    c0="<?php echo $product['price']?>"
                    t="<?php echo $product['title']?>"><?php echo $product['title']?></option>
                <?php endforeach; ?>
            </select>
            <span class="kamni-spisok-c"></span><b>за 1 м<sup>2</sup></b>
        </td>
    </tr>
    <tr>
        <td>Введите ширину, м</td>
        <td><input type="number" min="0" placeholder="0" name="" class="shirina" /></td>
    </tr>
    <tr>
        <td>Введите высоту, м</td>
        <td><input type="number" min="0" placeholder="0" name="" class="visota" /></td>
    </tr>
    <tr class="kvadratura-tr" style="display:none">
        <td>Квадратура в*ш:</td>
        <td><strong class="kvadratura"></strong></td>
    </tr>
    <tr>
        <td><label><input type="checkbox" name="" class="ucet-uglov" />С учетом углов, п.м.</label></td>
        <td><input type="number" min="0" placeholder="0" name="" class="ucet-uglov-input" disabled c0="" /></td>
    </tr>
    <tr class="cena-pm-tr" style="display:none">
        <td>Итого цена за углы:</td>
        <td><strong class="cena-pm"></strong></td>
    </tr>
    <tr>
        <td>Итого упаковок плоскостных элементов: <span class="itogo-pack-pl"></span></td>
    </tr>
    <tr>
        <td>Итого упаковок угловых элементов: <span class="itogo-pack-ang"></span></td>
    </tr>
    <tr>
        <td>Итого: <span class="itogo-calc"></span></td>
    </tr>
    <tr>
        <td>Упаковок с клеем (25 кг.): <span class="glue"></span></td>
    </tr>
</table>
    <br>
    <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
            <!-- Контейнер, содержащий форму обратной связи -->
            <div class="panel panel-info">
                <!-- Заголовок контейнера -->
                <div class="panel-heading">
                    <h3 class="panel-title">Заказать товар</h3>
                </div>
                <!-- Содержимое контейнера -->
                <div class="panel-body">
                    <!-- Сообщение, отображаемое в случае успешной отправки данных -->
                    <div class="alert alert-success hidden" role="alert" id="msgSubmit">
                        <strong>Внимание!</strong> Сообщение отправлено.
                    </div>
                    <!-- Форма обратной связи -->
                    <form id="messageForm">
                        <div class="row">
                            <div class="col-sm-6">
                                <!-- Имя пользователя -->
                                <div class="form-group has-feedback">
                                    <label for="name" class="control-label">Введите Ваше имя:</label>
                                    <input type="text" id="name" name="name" class="form-control" required="required" value="" placeholder="Например, Петров Петр" minlength="2" maxlength="30">
                                    <span class="glyphicon form-control-feedback"></span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <!-- E-mail пользователя -->
                                <div class="form-group has-feedback">
                                    <label for="email" class="control-label">Введите email:</label>
                                    <input type="email" id="email" name="email" class="form-control" required="required"  value="" placeholder="Например, petrov@mail.ru" maxlength="30">
                                    <span class="glyphicon form-control-feedback"></span>
                                </div>
                            </div>
                        </div>
                        <!-- Сообщение пользователя -->
                        <div class="form-group has-feedback">
                            <label for="message" class="control-label">Введите сообщение:</label>
                            <textarea id="message" class="form-control" rows="3" placeholder="Введите сообщение, состоящее не более чем из 500 символов" minlength="0" maxlength="500" required="required"></textarea>
                            <input type="text" id="type" name="type" class="hidden" value="">
                            <input type="text" id="kvadratura_pl" name="kvadratura_pl" class="hidden" value="">
                            <input type="text" id="kvadratura_ang" name="kvadratura_ang" class="hidden" value="">
                            <input type="text" id="pack_pl" name="pack_pl" class="hidden" value="">
                            <input type="text" id="pack_ang" name="pack_ang" class="hidden" value="">
                            <input type="text" id="cena" name="cena" class="hidden" value="">
                        </div>
                        <hr>
                        <!--Изображение, содержащее код CAPTCHA-->
                        <img id="img-captcha" src="captcha.php">
                        <!--Элемент, запрашивающий новый код CAPTCHA-->
                        <div id="reload-captcha" class="btn btn-default"><i class="glyphicon glyphicon-refresh"></i> Обновить</div>
                        <!--Блок для ввода кода CAPTCHA-->
                        <div class="form-group has-feedback">
                            <label id="label-captcha" for="captcha" class="control-label">Пожалуйста, введите указанный на изображении код:</label>
                            <input id="text-captcha" name="captcha" type="text" class="form-control" required="required" value="" minlength="6" maxlength="6">
                            <span class="glyphicon form-control-feedback"></span>
                        </div>
                        <!-- Кнопка, отправляющая форму по технологии AJAX -->
                        <button type="submit" class="btn btn-primary pull-right">Заказать</button>
                    </form><!-- Конец формы -->
                </div>
            </div><!-- Конец контейнера -->
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="/bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>
    <script src="script.js"></script>
</div>
</body>

</html>