<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <title>Добавить новость</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../../bootstrap-3.3.6-dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="admin.css" rel="stylesheet">
    <script src="../../ckeditor/ckeditor.js"></script>
</head>
<body>
<div class="container">
<form method="post" enctype="multipart/form-data" action="add_news.php">
    <p>Заголовок новости</p>
    <input id="title" name="title"/>
    <p>Текст новости</p>
    <textarea id="text" name="text"></textarea>
    <script>
        CKEDITOR.replace('text');
    </script>
    <p>Добавить фото</p>
    <input type="file" name="file" /><br>
    <input class="btn-success" type="submit" name="upload" value="Добавить новость" />
</form>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="../../bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>
</body>
</html>