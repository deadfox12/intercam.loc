<?php
require_once 'classes/db.php';
//открывает сессию
session_start();
//получить имя, которое ввёл пользователь
$name = $_POST["name"];
//получить email, которое ввёл пользователь
$email = $_POST["email"];
//получить сообщение, которое ввёл пользователь
$message = $_POST["message"];
$cena = $_POST["cena"];
$type = $_POST["type"];
$kvadratura_pl = $_POST["kvadratura_pl"];
$kvadratura_ang = $_POST["kvadratura_ang"];
$pack_pl = $_POST["pack_pl"];
$pack_ang = $_POST["pack_ang"];
//Генерация номера заказа
$bytes = openssl_random_pseudo_bytes(3, $cstrong);
$hex = bin2hex($bytes);
//если пользователь правильно ввёл капчу
if ($_SESSION["code"] == $_POST["captcha"]) {
  //свой email (email, куда будут приходить сообщения)
  $email1To = "deadfox12@yandex.ru";
    $email2To = $email;
  //тема письма
  $subject = "Заказ товара";
  //формируем тело письма
  //1. Полоска
  $body = "--------------------------------------\n";
  //2. Дата, когда сообщение пришло на сервер
  $date_order=date("Y-m-d H:i:s");
  $body .= date("Y-m-d H:i")."\n";
  $body .= "Номер заказа: ".$hex."\n";
  //3. Текст (заголовок)
  $body .= "Содержимое заполненных пользователем полей:\n";
  //4. Имя пользователя
  $body .= "Имя: ".$name."\n";
  //5. Email пользователя
  $body .= "Email: ".$email."\n";
  //6. Сообщение пользователя
  $body .= "Сообщение: ".$message."\n";
  $body .= "Товар: ".$type."\n";
  $body .= "Квадратура плоск.: ".$kvadratura_pl." м.\n";
  $body .= "Квадратура угл.: ".$kvadratura_ang." м. кв.\n";
  $body .= "Количество плоск. уп.: ".$pack_pl." шт.\n";
  $body .= "Количество угл. уп.: ".$pack_ang." шт.\n";
  $body .= "Цена: ".$cena." руб.\n";
  //Формируем письмо клиенту
  $body1 .= "Благодарим за оформление заказа!\n";
  $body1 .= "Сведения о заказе\n";
  $body1 .= "Номер заказа: ".$hex."\n";
  $body1 .= "Дата заказа: ".date("d-m-Y H:i")."\n";
  $body1 .= "Товар: ".$type."\n";
  $body1 .= "Количество плоск. уп..: ".$pack_pl." шт.\n";
  $body1 .= "Количество угл. уп.: ".$pack_ang." шт.\n";
  $body1 .= "Заказ итого: ".$cena." руб.\n";
  $body1 = "--------------------------------------\n";
  $body = "С уважением ООО Интеркам \n";
  //7. Отправляем на почту
  $success1 = mail($email1To, $subject, $body, "From: myemail@mail.ru \r\n");
  $success2 = mail($email2To, $subject, $body1, "From: interkam@mail.ru \r\n");
  //7. Добавляем в конец файла message.txt 
  //$file = 'message.txt';
  //$success = file_put_contents($file, $body, FILE_APPEND | LOCK_EX);
  //8. Если действия были успешны, то отправляем "success"
  $query = "INSERT INTO orders(fio_klient,order_number,email,summ,product,date_order,pack_ang,pack_pl)
            VALUES('$name','$hex','$email','$cena','$type','$date_order','$pack_ang','$pack_pl')";
  $pdo->exec($query);
  if ($success1 and $success2) {
    echo "success";
  }
  //иначе отправляем "invalid"
  else {
    echo "invalid";
  }
}
else {
  //если пользователь ввёл неправильную капчу, то отправляем "invalidcaptcha"
  echo 'invalidcaptcha';
}