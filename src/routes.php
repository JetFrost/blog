<?php

return [
    '~^$~' => [\MyProject\Controllers\MainController::class, 'main'],
    '~^articles/(\d+)$~' => [\MyProject\Controllers\ArticlesController::class, 'view'],
    '~^articles/(\d+)/edit$~' => [\MyProject\Controllers\ArticlesController::class, 'edit'],
    '~^articles/add$~' => [\MyProject\Controllers\ArticlesController::class, 'add'],
    '~^articles/(\d+)/delete$~' => [\MyProject\Controllers\ArticlesController::class, 'delete'],
    '~^users/register$~' => [\MyProject\Controllers\UsersController::class, 'signUp'],
    '~^users/(\d+)/activate/(.+)$~' => [\MyProject\Controllers\UsersController::class, 'activate'],
    '~^users/login$~' => [\MyProject\Controllers\UsersController::class, 'login'],
    '~^users/log-out$~' => [\MyProject\Controllers\UsersController::class, 'logOut'],
    '~^articles/(\d+)/comments/add$~' => [\MyProject\Controllers\ArticlesController::class, 'addComment'],
    '~^articles/comments/(\d+)/edit$~' => [\MyProject\Controllers\CommentsController::class, 'edit'],
    '~^articles/comments/(\d+)/delete/(\d+)$~' => [\MyProject\Controllers\CommentsController::class, 'delete'],
    '~^users/(\d+)/cabinet$~' => [\MyProject\Controllers\UsersController::class, 'cabinet'],
    '~^admin$~' => [\MyProject\Controllers\AdminController::class, 'view'],
    '~^admin/articles$~' => [\MyProject\Controllers\AdminController::class, 'viewArticles'],
    '~^admin/users$~' => [\MyProject\Controllers\AdminController::class, 'viewUsers'],
    '~^admin/comments$~' => [\MyProject\Controllers\AdminController::class, 'viewComments']
];