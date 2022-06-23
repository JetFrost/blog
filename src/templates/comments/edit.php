<?php include __DIR__.'/../header.php'?>

<h1>Редагування коментаря</h1>
<p>Автор:  <?= $comment->getAuthorName()?></p>
<p>Дата публікації:  <?= $comment->getDate()?></p>

<?php if(!empty($error)): ?>
    <div style="color: red;"><?= $error ?></div>
<?php endif; ?>
<form action="/articles/comments/<?= $comment->getId() ?>/edit" method="post">
    <div class="form-group mb-3">
        <label for="exampleFormControlTextarea1">Текст коментаря:</label>
        <textarea name="text" class="form-control" id="exampleFormControlTextarea1" rows="6"><?= $comment->getText() ?></textarea>
    </div>
    <input class="btn btn-primary" type="submit" value="Оновити">
</form>

<?php include __DIR__.'/../footer.php';?>
