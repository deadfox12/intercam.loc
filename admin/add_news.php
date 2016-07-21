<?php
ob_start();
require_once __DIR__ . '/access.php';
if (!userIsLoggedIn())
{
    include __DIR__.'/login.php';
    exit();
}
include 'view/form_addnews.php';
//Добавление фото в базу данных
if(isset($_POST['upload'])) {
    if(empty($_FILES['file']['size']))  die('Вы не выбрали файл');
    if($_FILES['file']['size'] > (5 * 1024 * 1024)) die('Размер файла не должен превышать 5Мб');
    $imageinfo = getimagesize($_FILES['file']['tmp_name']);
    $arr = array('image/jpeg','image/gif','image/png');
    if(!in_array($imageinfo['mime'],$arr)) echo ('Картинка должна быть формата JPG, GIF или PNG');
    else {
        $upload_dir = __DIR__; //имя папки с картинками
        $name = basename($_FILES['file']['name']);
        $mov = move_uploaded_file($_FILES['file']['tmp_name'],"../news_img/$name");
        if($mov) {
//здесь коннект к БД
            require '../classes/db.php';
            $name = stripslashes(strip_tags(trim($name)));
//если mysql - здесь еще mysql_real_escape_string обработай, mysqli - mysqli_real_escape_string,PDO - quote
            $pdo->quote($name);
            if(empty($_POST['title']))  die('Вы не написали заголовок новости');
            if(empty($_POST['text']))  die('Вы не написали текст новости');
            $title=$_POST['title'];
            $text=$_POST['text'];
            $date=date("Y-m-d");
            $query = "INSERT INTO news(title,text,date_news,image) VALUES('$title','$text','$date','$name')";
            $pdo->exec($query);
//выполняешь запрос, если все ок - то выводишь "поздравления" если все плохо - выводишь ошибку
//здесь запрос

            $host  = $_SERVER['HTTP_HOST'];
            $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
            $extra = 'news.php';
            header("Location:http://$host$uri/$extra");
            exit;
        }
        else echo 'Произошла ошибка при загрузке';
    }
}
?>