<?php
ob_start();
require_once __DIR__ . '/access.php';
if (!userIsLoggedIn())
{
    include __DIR__.'/login.php';
    exit();
}
require __DIR__ . "/../classes/db.php";
//Добавление фото в базу данных
if (isset($_GET['action']) and $_GET['action'] == 'редактировать') {
    $sql = 'SELECT * FROM news WHERE id=:id';
    $s = $pdo->prepare($sql);
    $s->bindValue(':id', $_GET['id']);
    $s->execute();
    $row = $s->fetch();
    //include 'view/form_editnews.php';
    if (isset($_POST['upload'])) {
        if (empty($_FILES['file']['size'])) die('Вы не выбрали файл');
        if ($_FILES['file']['size'] > (5 * 1024 * 1024)) die('Размер файла не должен превышать 5Мб');
        $imageinfo = getimagesize($_FILES['file']['tmp_name']);
        $arr = array('image/jpeg', 'image/gif', 'image/png');
        if (!in_array($imageinfo['mime'], $arr)) echo('Картинка должна быть формата JPG, GIF или PNG');
        else {
            $upload_dir = __DIR__; //имя папки с картинками
            $name = basename($_FILES['file']['name']);
            $mov = move_uploaded_file($_FILES['file']['tmp_name'], "../news_img/$name");
            if ($mov) {
                $name = stripslashes(strip_tags(trim($name)));
//если mysql - здесь еще mysql_real_escape_string обработай, mysqli - mysqli_real_escape_string,PDO - quote
                $pdo->quote($name);
                if (empty($_POST['title'])) die('Вы не написали заголовок новости');
                if (empty($_POST['text'])) die('Вы не написали текст новости');
                $id = $_GET['id'];
                $title = $_POST['title'];
                $text = $_POST['text'];
                $date = date("Y-m-d");
                $query = "UPDATE news SET title='$title', text='$text', date_news='$date', image='$name'
                      WHERE id=$id";
                $pdo->query($query);
                $host  = $_SERVER['HTTP_HOST'];
                $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
                $extra = 'news.php';
                header("Location:http://$host$uri/$extra");
                exit;
            }
            else echo 'Произошла ошибка при загрузке';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <title></title>
    <script src="../ckeditor/ckeditor.js"></script>
</head>
<body>
<form method="post" enctype="multipart/form-data" action="">

    <p>Заголовок новости</p>
    <input id="title" name="title" value="<?php echo $row['title']?>"/>
    <p>Текст новости</p>
    <textarea id="text" name="text"><?php echo $row['text']?></textarea>
    <script>
        CKEDITOR.replace('text');
    </script>
    <p>Изменить фото</p>
    <input type="file" name="file"/><?php echo $row['image']?><br>
    <input type="submit" name="upload" value="Добавить новость" />

</form>
</body>
</html>