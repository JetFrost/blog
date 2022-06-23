<?php

namespace MyProject\Controllers;

use MyProject\Exceptions\ForbiddenException;
use MyProject\Exceptions\UnauthorizedException;
use MyProject\Models\Articles\Article;
use MyProject\Models\Comments\Comment;
use MyProject\Models\Users\User;

class AdminController extends AbstractController {

    public function view(){

        if ($this->user === null){
            throw new UnauthorizedException();
        }
        if ($this->user->getRole() !== 'admin'){
            throw new ForbiddenException();
        }

        $this->view->renderHTML('admin/view.php');

    }

    public function viewArticles(){

        if ($this->user === null){
            throw new UnauthorizedException();
        }
        if ($this->user->getRole() !== 'admin'){
            throw new ForbiddenException();
        }

        $articles = Article::findAll();

        $this->view->renderHTML('admin/articles.php', ['articles' => $articles]);

    }

    public function viewUsers(){

        if ($this->user === null){
            throw new UnauthorizedException();
        }
        if ($this->user->getRole() !== 'admin'){
            throw new ForbiddenException();
        }

        $users = User::findAll();

        $this->view->renderHTML('admin/users.php', ['users' => $users]);

    }

    public function viewComments(){
        if ($this->user === null){
            throw new UnauthorizedException();
        }
        if ($this->user->getRole() !== 'admin'){
            throw new ForbiddenException();
        }

        $comments = Comment::findAll();

        $this->view->renderHTML('admin/comments.php', ['comments' => $comments]);

    }

}