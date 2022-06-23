<!DOCTYPE html>
<html lang="ua">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>blog</title>
    <!--        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />-->
    <link href="/css/styles.css" rel="stylesheet" />
</head>
<body>

<nav class="navbar navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand mb-0 h1" href="/">Бій блог</a>
    </div>
</nav>

<div class="container-fluid">
    <div class="row mt-5 align-items-center justify-content-center">
        <div class="col-lg-4 col-md-6 col-sm-10">
            <div class="card">
                <div class="card-header">
                    <div class="card-title text-center">
                        <h2>Вхід</h2>
                    </div>
                </div>
                <div class="card-body">
                    <?php if (!empty($error)): ?>
                        <div class="alert alert-danger" role="alert">
                            <?= $error ?>
                        </div>
                    <?php endif; ?>
                    <form action="/users/login" method="post">
                        <div class="form-group mt-4">
                            <label for="InputEmail1">Email:</label>
                            <input type="email" class="form-control" name="email" id="InputEmail1" placeholder="Ваш email" value="<?= $_POST['email'] ?? '' ?>">
                        </div>
                        <div class="form-group mt-4">
                            <label for="InputPassword1">Пароль:</label>
                            <input type="password" class="form-control" name="password" id="InputPassword1" placeholder="Ваш пароль" value="<?= $_POST['password'] ?? '' ?>">
                        </div>
                        <input type="submit" class="btn btn-primary mt-4" value="Увійти">
                        <p class="text-center small mt-3">У вас ще немає облікового запису? <a href="/users/register">Зареєструйтесь!</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="/js/scripts.js"></script>
</body>
</html>