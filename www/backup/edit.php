<?php
/**
 * @var \MyProject\Models\Articles\Article $article
 */
include __DIR__ . '/../header.php';
?>
    <h1>Редактирование статьи</h1>
<?php if(!empty($error)): ?>
    <div style="color: red;"><?= $error ?></div>
<?php endif; ?>
    <form action="/articles/<?= $article->getId() ?>/edit" method="post">
        <div class="form-group">
            <label for="name">Название статьи</label>
            <input class="form-control" type="text" name="name" id="name" value="<?= $_POST['name'] ?? $article->getName() ?>" size="50">
        </div>
        <div class="form-group mb-3">
            <label for="exampleFormControlTextarea1">Example textarea</label>
            <textarea name="text" class="form-control" id="exampleFormControlTextarea1" rows="6"><?= $_POST['text'] ?? $article->getText() ?></textarea>
        </div>
        <input class="btn btn-primary" type="submit" value="Обновить">
    </form>
<?php include __DIR__ . '/../footer.php'; ?>