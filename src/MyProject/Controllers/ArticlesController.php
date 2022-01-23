<?php

namespace MyProject\Controllers;

use MyProject\Exceptions\ForbiddenException;
use MyProject\Exceptions\InvalidArgumentException;
use MyProject\Exceptions\NotFoundException;
use MyProject\Exceptions\UnauthorizedException;
use MyProject\Models\Articles\Article;
use MyProject\Models\Users\User;

class ArticlesController extends AbstractController {

    public function view(int $articleId){
        $article = Article::getById($articleId);
        if ($article === null){
            throw new NotFoundException();
        }
        $reflection = new \ReflectionObject($article);
        $props = $reflection->getProperties();
        $propNames = [];
        foreach ($props as $prop) {
            $propNames[] = $prop->getName();
        }


        $author = $article->getAuthor();

        $this->view->renderHtml('articles/view.php', ['article' => $article, 'author' => $author]);
    }

    public function edit(int $articleId){

        $article = Article::getById($articleId);

        if ($article === null) {
            throw new NotFoundException();
        }
        if ($this->user === null) {
            throw new UnauthorizedException();
        }
        if ($this->user->getRole() !== 'admin'){
            throw new ForbiddenException();
        }

        if (!empty($_POST)){
            try {
                $article->updateFromArray($_POST);
            } catch (InvalidArgumentException $e) {
                $this->view->renderHtml('articles/edit.php', ['error' => $e->getMessage(), 'article' => $article]);
                return;
            }

            header('Location: /articles/'.$article->getId(), true, 302);
            exit();
        }

        $this->view->renderHTML('articles/edit.php', ['article' => $article]);

//        $article = Article::getById($articleId);
//
//        if ($article === null){
//            throw new NotFoundException();
//        }
//
//        $article->setName('newName');
//        $article->setText('newText');
//        $article->save();
    }

    public function add(){

        if ($this->user === null){
            throw new UnauthorizedException();
        }

        if ($this->user->getRole() !== 'admin') {
            throw new ForbiddenException();
        }

        if (!empty($_POST)){
            try {
                $article = Article::createFromArray($_POST, $this->user);
            }catch (InvalidArgumentException $e){
                $this->view->renderHtml('articles/add.php', ['error' => $e->getMessage()]);
                return;
            }

            header('Location: /articles/' . $article->getId(), true, 302);
            exit();

        }

        $this->view->renderHTML('articles/add.php');

    }

    public function delete($articleId){
        $article = Article::getById($articleId);

        if ($article === null){
            throw new NotFoundException();
        }

        $article->delete();
        var_dump($article);
    }

}