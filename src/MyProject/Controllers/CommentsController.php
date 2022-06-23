<?php

namespace MyProject\Controllers;

use MyProject\Exceptions\InvalidArgumentException;
use MyProject\Exceptions\NotFoundException;
use MyProject\Models\Comments\Comment;

class CommentsController extends AbstractController {

    public static function add(array $data, $articleId, $user){

        if ($data['text'] !== ''){
            Comment::createComment($data, $articleId, $user);
        }

    }

    public function edit($commentId) {

        $comment = Comment::getById($commentId);

        if (!empty($_POST)){
            try {
                $comment->updateFromArray($_POST);
            } catch (InvalidArgumentException $e) {
                $this->view->renderHtml('comments/edit.php', ['error' => $e->getMessage(), 'comment' => $comment]);
                return;
            }

            header('Location: /articles/'.$comment->getArticleId(), true, 302);
            exit();

        }

        $this->view->renderHTML('comments/edit.php', ['comment' => $comment]);

    }

    public function delete($articleId,$commentId){
        $comment = Comment::getById($commentId);

        if ($comment === null){
            throw new NotFoundException();
        }

        $comment->delete();
        header('Location: /articles/'.$articleId);
        var_dump($articleId);
        var_dump($commentId);
        var_dump($comment);
    }

}