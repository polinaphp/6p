<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>login</title>
    <style>
        input{
            margin: 5px 0;
        }

    </style>
</head>
<body>
<h1>Вход</h1>
<form action="/auth/login" method="post">
    <input type="text" name="login" placeholder="login">
    <br>
    <input type="text" name="password" placeholder="password">
    <br>
    <input type="submit">
    <p>Нет аккаунта? <a href="/auth/register">Зарегистрироваться</a></p>
</form>
</body>
</html>
