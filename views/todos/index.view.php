<?php require base_path('views/sections/head.php'); ?>
<?php require base_path('views/sections/nav.php'); ?>

<div class="container overflow-hidden content-space-t-4">
    <h1 class="text-center mb-5">Todos 😊</h1>


    <?php foreach ($todos as $todo): ?>
        <div class="row justify-content-center">
            <div class="col-6">
                <div class="card mb-3">
                    <div class="card-header">
                        <span><?php echo $todo['email']; ?></span>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $todo['name']; ?></h5>
                        <p class="card-text"><?php echo $todo['description']; ?></p>
                        <!-- TODO: Ссылку в контроллере сделать -->
                        <a href="<?php echo 'todo?id='. $todo['id']; ?>" class="btn btn-primary">Редактировать</a>
                    </div>
                    <div class="card-footer">
                        <span><?php echo $todo['status']; ?></span>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach;?>

    <div>
        <div class="row justify-content-center">
            <div class="col-6">
                <?php require base_path('views/sections/pagination.php'); ?>
            </div>
        </div>
    </div>

</div>

<?php require base_path('views/sections/footer.php'); ?>