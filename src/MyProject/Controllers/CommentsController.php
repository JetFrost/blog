<?php

namespace MyProject\Controllers;

class CommentsController extends AbstractController {

    public function add($articleId){
        var_dump($articleId);
        var_dump($this->user->getId());
        if (!empty($_POST)){
            var_dump($_POST);
        }else{
            echo 'no :(';
        }

    }

}