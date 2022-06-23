<?php include __DIR__ . '/../header.php'; ?>
    <h2 class="mt-4 mb-2"><?= $article->getName(); ?></h2>
    <div class="row">
        <div class="col-8 text">
            <p><?= $article->getText() ?></p>
        </div>
    </div>
    <?php if($user && $user->getRole() === 'admin'):?>
        <a href="/articles/<?=$article->getId()?>/edit">Редагувати</a> | <a href="/articles/<?= $article->getId() ?>/delete">Видалити статтю</a>
    <?php endif;?>
    <hr>
    <?php if (!empty($user)):?>
    <form class="row g-3" action="/articles/<?= $article->getId() ?>/comments/add" method="post">
        <div class="form-group">
            <label for="exampleFormControlInput1" class="form-label">Написати коментар:</label>
            <textarea class="form-control" id="exampleFormControlInput1" placeholder="Коментар..." name="text"></textarea>
            <input type="submit" class="btn btn-primary mt-2" value="Додати">
        </div>
    </form>
    <?php else:?>
    <div class="alert alert-warning" role="alert">
        Коментарі можуть залишати тільки авторизовані користувачі.
        <a href="/users/login">Увійдіть</a> або <a href="/users/register">зареєструйтеся.</a>
    </div>
    <?php endif;?>
    <hr>
    <?php if (!empty($comments)):?>
        <?php foreach ($comments as $comment): ?>
            <p style="margin-bottom: 0px; font-size: 13px;">
                Автор: <?echo $comment->getAuthorName();?>
                <span style="font-size: 11px; color: grey; margin-left: 15px;">
                    <?=str_replace('-','.',$comment->getDate());?>
                </span>
            </p>
            <p><?=$comment->getText();?></p>
            <?php if ($user && ($user->getId() == $comment->getUserId() || $user->getRole() === 'admin')): ?>
                <div style="margin-top: -15px;">
                    <a href="/articles/comments/<?= $comment->getId() ?>/edit">Редагувати</a> | <a href="/articles/comments/<?= $article->getId() ?>/delete/<?= $comment->getId() ?>">Видалити</a>
                </div>
            <?php endif;?>
            <hr>
        <?php endforeach;?>
    <?php else:?>
        <div class="alert alert-info" role="alert">
            Коментарів до цієї статті поки немає.
        </div>

    <?php endif;?>
<?php include __DIR__ . '/../footer.php'; ?>