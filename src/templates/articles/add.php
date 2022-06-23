<?php include __DIR__ . '/../header.php'; ?>
    <h1>Створення нової статті</h1>
<?php if(!empty($error)): ?>
    <div style="color: red;"><?= $error ?></div>
<?php endif; ?>
    <form action="/articles/add" method="post">
        <div class="form-group">
            <label for="name">Назва</label>
            <input class="form-control" type="text" name="name" id="name" size="50" placeholder="Стаття...">
        </div>
        <div class="form-group mb-3">
            <label for="exampleFormControlTextarea1">Текст статті</label>
            <textarea name="text" class="form-control" id="exampleFormControlTextarea1" rows="6" placeholder="Текст статті..."></textarea>
        </div>
        <input class="btn btn-primary" type="submit" value="Створити">
    </form>
<?php include __DIR__ . '/../footer.php'; ?>