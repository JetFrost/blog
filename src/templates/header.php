<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Мой блог</title>
    <link rel="stylesheet" href="/styles.css">
</head>
<body>

<table class="layout">
    <tr>
        <td colspan="2" class="header">
            Мой блог
        </td>
    </tr>
    <tr>
        <td colspan="2" style="text-align: right">
<!--            --><?//= !empty($user) ? 'Привет, ' . $user->getNickname() . ' | <a href="/users/log-out">Выйти</a>' : '<a href="/users/login">Войдите на сайт</a>' ?>
            <?php if (!empty($user)):?>
                <?= 'Привет, ' . $user->getNickname() . ' | <a href="/users/log-out">Выйти</a>' ?>
            <?php else:?>
                <?= '<a href="/users/login">Войти</a> | <a href="/users/register">Зарегистрироваться</a>' ?>
            <?php endif;?>
        </td>
    </tr>
    <tr>
        <td>