<!DOCTYPE html>
<html lang="ua">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>blog</title>
    <link href="/css/styles.css" rel="stylesheet" />
</head>
<body>
<div class="d-flex" id="wrapper">
    <!-- Sidebar-->
    <div class="border-end bg-white" id="sidebar-wrapper">
        <div class="sidebar-heading border-bottom bg-light">Мій блог</div>
        <div class="list-group list-group-flush">
            <a class="list-group-item list-group-item-action list-group-item-light p-3" href="/">Головна</a>
            <?php if ($user && $user->getRole() === 'admin'):?>
            <a class="list-group-item list-group-item-action list-group-item-light p-3" href="/articles/add">Додати статтю</a>
            <a class="list-group-item list-group-item-action list-group-item-light p-3" href="/admin">Адміністративна панель</a>
            <?php endif;?>
        </div>
    </div>
    <!-- Page content wrapper-->
    <div id="page-content-wrapper">
        <!-- Top navigation-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
            <div class="container-fluid">
                <button class="btn btn-primary" id="sidebarToggle">Меню</button>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <?php if (!empty($user)): ?>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?= $user->getNickname(); ?>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="/users/<?= $user->getId() ?>/cabinet">Особистий кабінет</a>
                                <a class="dropdown-item" href="/users/log-out">Вихід</a>
                            </div>
                        </li>
                    </ul>
                </div>
                <?php else:?>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                            <li class="nav-item"><a class="nav-link" href="/users/login">Вхід</a></li>
                            <li class="nav-item"><a class="nav-link" href="/users/register">Реєстрація</a></li>
                        </ul>
                    </div>
                <?php endif;?>
            </div>
        </nav>
        <!-- Page content-->
        <div class="container-fluid">
