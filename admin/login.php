<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Панель администратора</title>
    <link href="/bootstrap-3.3.6-dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../style.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div class="container">

    <form class="form-signin" action="" method="post">
        <h2>Вход в панель администратора</h2>
        <?php if (isset($loginError)): ?>
            <h4><?php echo $loginError; ?></h4>
        <?php endif; ?>
        <div class="form-group">
            <label for="email">Email: <input type="email" name="email" id="email" class="form-control"></label>
        </div>
        <div class="form-group">
            <label for="password">Пароль: <input type="password" name="password" id="password" class="form-control"></label>
        </div>
        <div>
            <input type="hidden" name="action" value="login">
            <input class="btn btn-success" type="submit" value="Войти">
        </div>
        <a href="../index.php">Вернуться на сайт</a>
    </form>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="/bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>
</div>
</body>
</html>
