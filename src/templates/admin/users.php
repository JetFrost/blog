<?php include __DIR__.'/../header.php'?>

    <h1 class="my-3">Адміністративна панель</h1>
    <h3>Користувачі</h3>

<?php  foreach ($users as $user):?>
    <div class="card mb-3">
        <div class="card-header">
            <h3><?= $user->getNickname() ?></h3>
        </div>
        <div class="card-body">
            Id: <?= $user->getId() ?><br>
            Email: <?= $user->getEmail() ?><br>
            Права користувача: <?= $user->getRole()?><br>
            Дата реєстрації: <?= $user->getCreatedAt(); ?><br>
            Кількість коментарів користувача: <?= @count(\MyProject\Models\Comments\Comment::getCommentsByUserId($user->getId())); ?>
        </div>
        <div class="card-footer">
            <a href="/users/<?= $user->getId() ?>/cabinet">Особистий кабінет користувача</a>
        </div>
    </div>
<?php endforeach;?>

<?php include __DIR__.'/../footer.php'?>