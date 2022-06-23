<?php include __DIR__ . '/../header.php'; ?>
<?php foreach ($articles as $article): ?>
    <div class="card mt-3">
        <div class="card-body">
            <div class="card-title">
<!--                <h2 href="/articles/--><?//= $article->getId() ?><!--" style="font-size: 30px">--><?//= $article->getName() ?><!--</h2>-->
                <h4><?= $article->getName() ?></h4>
            </div>
            <h6 class="card-subtitle mb-2 text-muted"><p><?= $article->getAbbreviatedText() ?>...</p></h6>
            <a href="/articles/<?= $article->getId() ?>" class="card-link">Читати</a>
        </div>
    </div>
<?php endforeach; ?>
<?php include __DIR__ . '/../footer.php'; ?>