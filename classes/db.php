<?php
try
{
    $pdo = new PDO('mysql:host=localhost;dbname=base', 'root', '');
}
catch (PDOException $e)
{
    $output = 'Невозможно подключиться к серверу баз данных.';
    include __DIR__.'\..\view\error.php';
    exit();
}