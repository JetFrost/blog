<?php include __DIR__ . '/../header.php'; ?>
    <h1><?= $article->getName(); ?></h1>
    <p><?= $article->getText() ?></p>
    <p>Автор: <?= $author->getNickname()?></p>
    <?php if($user && $user->getRole() === 'admin'):?>
        <a href="/articles/<?=$article->getId()?>/edit">Редактировать</a>
    <?php endif;?>
<?php include __DIR__ . '/../footer.php'; ?>