<?php require base_path('views/sections/head.php'); ?>
<?php require base_path('views/sections/nav.php'); ?>

<div class="container">

<h1><?php echo $title ?></h1>
    <form method="POST" action="/todos">
        <div class="mb-3">
            <?php if (isset($errors['name'])): ?>
                <div class="alert alert-danger" role="alert">
                    <span><?php echo $errors['name']; ?></span>
                </div>
            <?php endif; ?>
            <label for="name" class="form-label">Имя</label>
            <input type="text"
                   class="form-control"
                   id="name"
                   placeholder="Jon"
                   name="name"
                   required
                   value="<?php echo ($_POST['name'] ?? '') ?>"
            >
        </div>

        <div class="mb-3">
            <?php if (isset($errors['email'])): ?>
                <div class="alert alert-danger" role="alert">
                    <span><?php echo $errors['email']; ?></span>
                </div>
            <?php endif; ?>
            <label for="email" class="form-label">Email address</label>
            <input type="email"
                   class="form-control"
                   id="email"
                   placeholder="name@example.com"
                   name="email"
                   required
                   value="<?php echo ($_POST['email'] ?? '') ?>"
            >
        </div>

        <div class="mb-3">
            <?php if (isset($errors['description'])): ?>
                <div class="alert alert-danger" role="alert">
                    <span><?php echo $errors['description']; ?></span>
                </div>
            <?php endif; ?>
            <label for="description" class="form-label">Описание</label>
            <textarea class="form-control"
                      id="description"
                      rows="3"
                      name="description"
                      required
            ><?php echo ($_POST['description'] ?? '') ?></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Отправить</button>
    </form>
</div>

<?php require base_path('views/sections/footer.php'); ?>