<?php require base_path('views/sections/head.php'); ?>
<?php require base_path('views/sections/nav.php'); ?>

<main class="form-signin text-center">
    <div class="container overflow-hidden content-space-t-4">
        <div class="w-100 align-self-end pt-1 pt-md-4 pb-4">
            <h1 class="text-center text-xl-start"><?php echo $title; ?></h1>
            <form class="needs-validation mb-2" method="POST" action="/login">
                <div class="position-relative mb-4">
                    <?php if (isset($errors['login'])): ?>
                        <div class="alert alert-danger" role="alert">
                            <span><?php echo $errors['login']; ?></span>
                        </div>
                    <?php endif; ?>
                    <label for="login" class="form-label fs-base">Логинчик</label>
                    <input type="text"
                           id="login"
                           class="form-control form-control-lg"
                           name="login"
                           required
                    >
                </div>
                <div class="mb-4">
                    <?php if (isset($errors['login'])): ?>
                        <div class="alert alert-danger" role="alert">
                            <span><?php echo $errors['password']; ?></span>
                        </div>
                    <?php endif; ?>
                    <label for="password" class="form-label fs-base">Парольчик</label>
                    <div class="password-toggle">
                        <input type="password"
                               id="password"
                               class="form-control form-control-lg"
                               required
                               name="password"
                        >
                    </div>
                </div>
                <button type="submit" class="btn btn-primary shadow-primary btn-lg w-100">Войти</button>
            </form>
        </div>
    </div>
</main>

<?php require base_path('views/sections/footer.php'); ?>