<?php include __DIR__.'/../header.php'; ?>

    <h1>Особистий кабінет</h1>
    <h2>Користувач: <?= $cabinetUser->getNickname()?></h2>
    <p>
        Права доступу: <b><?= $cabinetUser->getRole()?></b><br>
        Email: <b><?= $cabinetUser->getEmail()?></b><br>
        Дата реєстрації: <b><?= $cabinetUser->getCreatedAt()?></b>
    </p>
    <hr>
    <p>Коментарі користувача (<?= @count($comments) ?>):</p>

    <?php if (!empty($comments)):?>
        <?php foreach ($comments as $comment): ?>
            <p style="margin-bottom: 0px; font-size: 13px;">
                Автор: <?= $comment->getAuthorName();?>
                <span style="font-size: 11px; color: grey; margin-left: 15px;">
                        <?=str_replace('-','.',$comment->getDate());?>
                    </span>
            </p>
            <p><?=$comment->getText();?></p>
            <div style="margin-top: -15px;">
                <a href="/articles/comments/<?= $comment->getId() ?>/edit">Редагувати</a> |
                <a href="/articles/comments/<?= $comment->getArticleId() ?>/delete/<?= $comment->getId() ?>">Видалити</a> |
                <a href="/articles/<?= $comment->getArticleId() ?>">Переглянути статтю</a>
            </div>
            <hr>
        <?php endforeach;?>
    <?php else:?>
        <div class="alert alert-info" role="alert">
            Комментариев пока нет.
        </div>

    <?php endif;?>

<?php include __DIR__.'/../footer.php'; ?>