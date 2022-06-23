<?php include __DIR__.'/../header.php'?>

    <h1 class="my-3">Адміністративна панель</h1>
    <h3>Статті</h3>

    <?php  foreach ($articles as $article):?>
    <div class="card mb-3">
        <div class="card-header">
            <h3><?= $article->getName() ?></h3>
        </div>
        <div class="card-body">
            Id: <?= $article->getId() ?><br>
            Автор: <?= $article->getAuthor()->getNickname(); ?><br>
            Дата публікації: <?= $article->getCreatedAt(); ?><br>
            Кількість коментарів: <?= @count(\MyProject\Models\Comments\Comment::getCommentByArticleId($article->getId())); ?>
        </div>
        <div class="card-footer">
            <a href="/articles/<?= $article->getId() ?>/edit">Редагувти</a> |
            <a href="/articles/<?= $article->getId() ?>/delete">Видалити</a> |
            <a href="/articles/<?= $article->getId() ?>">Переглянути статтю</a>
        </div>
    </div>
    <?php endforeach;?>

<?php include __DIR__.'/../footer.php'?>