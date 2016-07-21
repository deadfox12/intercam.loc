<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <title></title>
    <script src="../../ckeditor/ckeditor.js"></script>
</head>
<body>
<form method="post" enctype="multipart/form-data" action="edit_news.php">

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