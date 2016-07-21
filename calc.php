<?php
require_once 'classes/db.php';
$sql='SELECT title,price FROM product';
$product=$pdo->prepare($sql);
$product->execute();
$all=$product->fetchAll();
?>
<!DOCTYPE html>
<html lang="ru-RU">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
</head>
<body>

<table>
    <tr>
        <td>Выберите камень</td>
        <td>
            <select class="kamni-spisok">
                <?php foreach ($all as $product): ?>
                <option value="0" c0="<?php echo $product['price']?>"><?php echo $product['title']?></option>
                <?php endforeach; ?>
            </select><br />
            Цена за квадрат<br />
            <span class="kamni-spisok-c"></span>
        </td>
    </tr>
    <tr>
        <td>Введите ширину, м</td>
        <td><input type="number" min="0" value="0" name="" class="shirina"></td>
    </tr>
    <tr>
        <td>Введите высоту, м</td>
        <td><input type="number" min="0" value="0" name="" class="visota"></td>
    </tr>
    <tr  class="kvadratura-tr" style="display:none">
        <td>Квадратура в*ш</td>
        <td><strong class="kvadratura"></strong></td>
    </tr>
    <tr>
        <td><label><input type="checkbox" name="" class="ucet-uglov">С учетом углов, п.м.</label></td>
        <td><input type="number" min="0" value="0" name="" class="ucet-uglov-input" disabled cena0=""></td>
    </tr>
    <tr  class="cena-pm-tr" style="display:none">
        <td>Итого цена за углы</td>
        <td><strong class="cena-pm"></strong></td>
    </tr>
    <tr>
        <td><input type="button" value="итого" class="submit"></td>
        <td>Итого <span class="itogo-calc"></span></td>
    </tr>
</table>
    <script type='text/javascript' src='calc.js'></script></p>
</body>
</html>