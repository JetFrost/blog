<?php include __DIR__.'/../header.php'?>

    <h1 class="my-3">Адміністративна панель</h1>
    <h3>Коментарі до статей:</h3>

<?php  foreach ($comments as $comment):?>
    <div class="card mb-3">
        <div class="card-header">
            <h5><?= $comment->getText() ?></h5>
        </div>
        <div class="card-body">
            Id: <?= $comment->getId()?><br>
            Автор: <?= $comment->getAuthorName() ?><br>
            Назва статті: <?= $comment->getArticleName() ?><br>
            Дата публікації: <?= $comment->getDate()?> <br>
        </div>
        <div class="card-footer">
            <a href="/articles/comments/<?= $comment->getId() ?>/edit">Редагувати</a> |
            <a href="/articles/comments/<?= $comment->getArticleId() ?>/delete/<?= $comment->getId() ?>">Видалити</a> |
            <a href="/articles/<?= $comment->getArticleId() ?>">Переглянути статтю</a>
        </div>
    </div>
<?php endforeach;?>

<?php include __DIR__.'/../footer.php'?>