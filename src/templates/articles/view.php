<?php include __DIR__ . '/../header.php'; ?>
    <h1><?= $article->getName(); ?></h1>
    <p><?= $article->getText() ?></p>
    <hr>
    <span style="padding-right: 10px;">Автор: <?= $author->getNickname()?></span>
    <?php if($user && $user->getRole() === 'admin'):?>
        <a href="/articles/<?=$article->getId()?>/edit">Редактировать</a>
    <?php endif;?>
    <hr>
    <p>Комментарии:</p>
    <?php if (!empty($user)):?>
    <form action="/articles/<?=$article->getId()?>/comments/add" method="post">
        <input type="text" name="text" id="text" value="<?= $_POST['text'] ?? '' ?>" placeholder="Введите текст комментария...">
        <br><input type="submit" value="Оставить комментарий">
    </form>
    <?php else:?>
    <p>
        Комментарии могут оставлять только авторизованные пользователи.
        <a href="/users/login">Войдите</a> или <a href="/users/register">зарегистрируйтесь</a>
    </p>
    <?php endif;?>
    <hr>
    <?php if (!empty($comments)):?>
        <?php foreach ($comments as $comment): ?>
            <p style="margin-bottom: -10px; font-size: 13px;">
                Автор: <?echo $comment->getAuthorName();?>
                <span style="font-size: 11px; color: grey; margin-left: 15px;">
                    <?=str_replace('-','.',$comment->getDate());?>
                </span>
            </p>
            <p><?=$comment->getText();?></p>
            <hr>
        <?php endforeach;?>
    <?php else:?>
        <p>Комментариев к этой статье пока нет.</p>
    <?php endif;?>
<?php include __DIR__ . '/../footer.php'; ?>