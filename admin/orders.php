<?php
ob_start();
require_once __DIR__ . '/access.php';
require_once '../classes/db.php';
if (!userIsLoggedIn())
{
    include __DIR__.'/login.php';
    exit();
}
$sql="SELECT * FROM orders";
$orders = $pdo->prepare($sql);
$orders->execute();
$all = $orders->fetchAll();
include __DIR__."/view/orders.php";
//Удаление товара из БД
if (isset($_POST['action']) and $_POST['action']=='удалить'){
    try{
        $sql='DELETE FROM orders WHERE id=:id';
        $s=$pdo->prepare($sql);
        $s->bindValue(':id',$_POST['id']);
        $s->execute();
    }
    catch(PDOException $e){
        $error='Ошибка при удалении';
        include $_SERVER['PHP_SELF'].'/view/error.php';
        exit();
    }
    header('Location: orders.php');
    exit();
}