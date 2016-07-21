<?php

require_once __DIR__."/classes/db.php";
$sql="SELECT * FROM news ORDER BY date_news DESC";
try {
    $news = $pdo->prepare($sql);
    $news->execute();
    $all = $news->fetchAll();
}
catch (PDOException $e)
{
    $output = 'Ошибка при извлечении новостей.';
    include __DIR__.'\view\error.php';
    exit();
}
include __DIR__.'/view/news.php';