<?php require base_path('views/sections/head.php'); ?>
<?php require base_path('views/sections/nav.php'); ?>

<div class="container overflow-hidden content-space-t-4">
    <h1 class="text-center mb-5">Todos 😊</h1>

        <form action="/todos/sort" method="POST">
            <input type="hidden" value="<?php echo $currentPage; ?>" name="page">
            <div class="row">
                <div class="col-3"></div>
<!--                <div class="col-2">-->
<!--                    <lable>По имени</lable>-->
<!--                    <select class="form-select mb-3" aria-label="Default select example">-->
<!--                        <option value="1">One</option>-->
<!--                        <option value="2">Two</option>-->
<!--                    </select>-->
<!--                </div>-->
<!--                <div class="col-2">-->
<!--                    <lable>По email</lable>-->
<!--                    <select class="form-select mb-3" aria-label="Default select example">-->
<!--                        <option value="1">One</option>-->
<!--                        <option value="2">Two</option>-->
<!--                    </select>-->
<!--                </div>-->

                <div class="col-2">
                    <lable>По статусу</lable>
                    <select class="form-select mb-3"
                            aria-label="Default select example"
                            name="status"
                            onchange="this.form.submit()"
                    >
                        <?php foreach ($statuses as $status): ?>
                            <option value="<?php echo $status['value']; ?>"
                                    <?php echo ($chosenFilter['status'] === $status['value']) ? 'selected' : '' ; ?>
                            ><?php echo $status['key']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
        </form>

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
                        <?php echo $todo['edit']; ?>
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