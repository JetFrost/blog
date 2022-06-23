<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Мой блог</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="/styles.css">
</head>
<body>

<nav class="navbar navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">Мой блог</a>
    </div>
</nav>

<div class="container mt-3">
    <div class="row">
        <div class="col-9"></div>
        <div class="col-3">
            <ul class="nav flex-column justify-content-center border-1 border-dark">
                <li class="nav-item">
                    <?php if (!empty($user)):?>
                        <?php if ($user->getRole() === 'admin'):?>
                            <?= '<span style="color: red;">' . $user->getNickname() . '</span> | ' ?>
                        <?php else:?>
                            <?= '' . $user->getNickname() . ' | <a class="btn btn-danger" href=href="/users/log-out">Выйти</a>' ?>
                        <?php endif;?>
                    <?php else:?>
                        <?= '<a href="/users/login">Войти</a> | <a href="/users/register">Зарегистрироваться</a>' ?>
                    <?php endif;?>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Главная</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Кабинет</a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-danger" href="/users/log-out">Выход</a>
                </li>
            </ul>
        </div>
    </div>

</div>



<table class="layout">
    <tr>
        <td colspan="2" style="text-align: right">
<!--            --><?//= !empty($user) ? 'Привет, ' . $user->getNickname() . ' | <a href="/users/log-out">Выйти</a>' : '<a href="/users/login">Войдите на сайт</a>' ?>
            <?php if (!empty($user)):?>
                <?php if ($user->getRole() === 'admin'):?>
                    <?= '<span style="color: red;">' . $user->getNickname() . '</span> | <a class="btn btn-danger" href=href="/users/log-out">Выйти</a>' ?>
                <?php else:?>
                    <?= '' . $user->getNickname() . ' | <a class="btn btn-danger" href=href="/users/log-out">Выйти</a>' ?>
                <?php endif;?>
            <?php else:?>
                <?= '<a href="/users/login">Войти</a> | <a href="/users/register">Зарегистрироваться</a>' ?>
            <?php endif;?>
        </td>
    </tr>
    <tr>
        <td>