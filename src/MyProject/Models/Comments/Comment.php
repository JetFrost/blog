<?php

namespace MyProject\Models\Comments;

use MyProject\Models\ActiveRecordEntity;
use MyProject\Models\Users\User;
use MyProject\Services\Db;

class Comment extends ActiveRecordEntity {

    protected $userId;
    protected $articleId;
    protected $text;
    protected $date;

    public function setUserId($userId) {$this->userId = $userId;}
    public function setArticleId($articleId) {$this->articleId = $articleId;}
    public function setText($text) {$this->text = $text;}

    public function getUserId() {return $this->userId;}
    public function getArticleId() {return $this->articleId;}
    public function getText() {return $this->text;}
    public function getDate() {return $this->date;}

    public static function getCommentByArticleId($articleId):?array{
        $db = Db::getInstance();
        $sql = 'SELECT * FROM `comments` WHERE article_id = :articleId ORDER BY date DESC;';
        $entities = $db->query($sql, ['articleId' => $articleId], static::class);
        return $entities ? $entities : null;
    }
    public function getAuthorName() {
        $author = User::getById($this->userId);
        return $author->getNickname();
    }

    protected static function getTableName():string {
        return 'comments';
    }

}