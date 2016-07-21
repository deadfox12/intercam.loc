<?php
ob_start();
require_once __DIR__ . '/access.php';
if (!userIsLoggedIn())
{
    include __DIR__.'/login.php';
    exit();
}
include 'view/form_addproduct.php';
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
        $mov = move_uploaded_file($_FILES['file']['tmp_name'],"../products_img/$name");
        if($mov) {
//здесь коннект к БД
            require_once __DIR__."/../classes/db.php";
            $name = stripslashes(strip_tags(trim($name)));
//если mysql - здесь еще mysql_real_escape_string обработай, mysqli - mysqli_real_escape_string,PDO - quote
            $pdo->quote($name);
            if(empty($_POST['title']))  die('Вы не написали название товара');
            if(empty($_POST['price']))  die('Вы не написали описание товара');
            $title=$_POST['title'];
            $description=$_POST['description'];
            $price=$_POST['price'];
            $length_pl=$_POST['length_pl'];
            $width_pl=$_POST['width_pl'];
            $depth_pl=$_POST['depth_pl'];
            $length_ang=$_POST['length_ang'];
            $width_ang=$_POST['width_ang'];
            $depth_ang=$_POST['depth_ang'];
            $weight_pl=$_POST['weight_pl'];
            $weight_ang=$_POST['weight_ang'];
            $query = "INSERT INTO product(title,description,price,image,length_pl,width_pl,depth_pl,length_ang,width_ang,depth_ang,weight_pl,weight_ang)
            VALUES('$title','$description','$price','$name','$length_pl','$width_pl','$depth_pl','$length_ang','$width_ang','$depth_ang','$weight_pl','$weight_ang')";
            $pdo->exec($query);
            $lastid=$pdo->lastInsertId();
            $host  = $_SERVER['HTTP_HOST'];
            $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
            $extra = 'products.php';
            header("Location:http://$host$uri/$extra");
            exit;
        }
        else echo 'Произошла ошибка при загрузке';
    }
}
?>