<?php

namespace MyProject\Models\Articles;

//use http\Exception\InvalidArgumentException;
use MyProject\Exceptions\InvalidArgumentException;
use MyProject\Models\ActiveRecordEntity;
use MyProject\Models\Users\User;

class Article extends ActiveRecordEntity {

    /** @var string */
    protected $name;

    /** @var string */
    protected $text;

    /** @var int */
    protected $authorId;

    /** @var string */
    protected $createdAt;

    public function getText():string{return $this->text;}
    public function getName():string{return $this->name;}
    public function getAuthorId():int{return (int) $this->authorId;}
    public function getCreatedAt():string{return $this->createdAt;}
    public function getAuthor():User {return User::getById($this->authorId);}

    public function setName($name) {$this->name = $name;}
    public function setText($text) {$this->text = $text;}
    public function setAuthor(User $author){
        $this->authorId = $author->getId();
    }

    public static function createFromArray(array $fields, User $author): Article {
        if (empty($fields['name'])){
            throw new InvalidArgumentException('Не передано название статьи');
        }
        if (empty($fields['text'])){
            throw new InvalidArgumentException('Не передан текст статьи');
        }

        $article = new Article();

        $article->setAuthor($author);
        $article->setName($fields['name']);
        $article->setText($fields['text']);

        $article->save();

        return $article;

    }

    public function updateFromArray(array $fields):Article {

        if (empty($_POST['name'])){
            throw new InvalidArgumentException('Не передано название статьи.');
        }
        if (empty($_POST['text'])){
            throw new InvalidArgumentException('Не передан текст статьи.');
        }

        $this->setName($fields['name']);
        $this->setText($fields['text']);

        $this->save();

        return $this;

    }

    protected static function getTableName():string {
        return 'articles';
    }

}