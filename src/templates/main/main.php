<?php include __DIR__ . '/../header.php'; ?>
<?php foreach ($articles as $article): ?>
    <a href="/articles/<?= $article->getId() ?>" style="font-size: 30px"><?= $article->getName() ?></a>
    <p><?= $article->getText() ?></p>
    <hr>
<?php endforeach; ?>
<?php include __DIR__ . '/../footer.php'; ?>