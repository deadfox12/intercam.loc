<?php
require_once __DIR__."/classes/db.php";
$sql="SELECT * FROM product WHERE product.id=$_GET[id]";
try {
    $products = $pdo->prepare($sql);
    $products->execute();
    $all = $products->fetchAll();
}
catch (PDOException $e)
{
    $output = 'Ошибка при извлечении товаров.';
    include __DIR__.'/view/error.php';
    exit();
}
include __DIR__.'/view/product.php';