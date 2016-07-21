<?php
ob_start();
require_once __DIR__ . '/access.php';
require_once '../classes/db.php';
if (!userIsLoggedIn())
{
    include __DIR__.'/login.php';
    exit();
}
$sql="SELECT * FROM product";
$products = $pdo->prepare($sql);
$products->execute();
$all = $products->fetchAll();
include __DIR__."/view/products.php";
//Удаление товара из БД
if (isset($_POST['action']) and $_POST['action']=='удалить'){
    try{
        $sql='DELETE FROM product WHERE id=:id';
        $s=$pdo->prepare($sql);
        $s->bindValue(':id',$_POST['id']);
        $s->execute();
    }
    catch(PDOException $e){
        $error='Ошибка при удалении';
        include $_SERVER['PHP_SELF'].'/view/error.php';
        exit();
    }
    header('Location: products.php');
    exit();
}