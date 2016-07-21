<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <title>Добавить товар</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../../bootstrap-3.3.6-dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="admin.css" rel="stylesheet">
    <script src="../../ckeditor/ckeditor.js"></script>
</head>
<body>
<div class="container">
<form method="post" enctype="multipart/form-data" action="add_product.php">
    <p>Название товара</p>
    <input id="title" name="title"/>
    <p>Описание товара</p>
    <textarea id="description" name="description"></textarea>
    <script>
        CKEDITOR.replace('description');
    </script>
    <p>Цена</p>
    <input type="number" id="price" name="price"/>
    <p>Длина плоскостного элемента</p>
    <input id="length_pl" name="length_pl"/>
    <p>Ширина плоскостного элемента</p>
    <input id="width_pl" name="width_pl"/>
    <p>Толщина плоскостного элемента</p>
    <input id="depth_pl" name="depth_pl"/>
    <p>Длина углового элемента</p>
    <input id="length_ang" name="length_ang"/>
    <p>Ширина углового элемента</p>
    <input id="width_ang" name="width_ang"/>
    <p>Толщина углового элемента</p>
    <input id="depth_ang" name="depth_ang"/>
    <p>Вес упаковки плоскостных элементов</p>
    <input id="weight_pl" name="weight_pl"/>
    <p>Вес упаковки угловых элементов</p>
    <input id="weight_ang" name="weight_ang"/>
    <p>Добавить фото</p>
    <input type="file" name="file" /><br>
    <input class="btn-success" type="submit" name="upload" value="Добавить товар" />
</form>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="../../bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>
</body>
</html>