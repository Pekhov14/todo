<?php require base_path('views/sections/head.php'); ?>
<?php require base_path('views/sections/nav.php'); ?>

<div class="container">
    <h1><?php echo $title ?></h1>

    <div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">Имя: <?php echo $task['name']; ?></li>
            <li class="list-group-item">Email: <?php echo $task['email']; ?></li>
            <li class="list-group-item"></li>
        </ul>

        <form action="" method="POST">
            <div class="mb-3">
                <label for="Textarea" class="form-label">Описание</label>
                <textarea class="form-control"
                          id="Textarea"
                          rows="3"
                          name="description"
                ><?php echo $task['description']; ?></textarea>
            </div>

            <input type="hidden" name="_method" value="PATCH">
            <input type="hidden" name="id" value="<?php echo $task['id']; ?>">
            <div class="form-check">
                <input type="checkbox"
                       name="status"
                       class="form-check-input"
                       type="checkbox"
                       value=""
                       id="flexCheckDefault"
                    <?php echo ($task['status'] === 'done') ? 'checked' : ''; ?>
                >
                <label class="form-check-label" for="flexCheckDefault">
                    Выполнено
                </label>
            </div>

            <button class="btn btn-danger mt-4"
                    type="submit"
            >Сохранить</button>
        </form>
    </div>

</div>

<?php require base_path('views/sections/footer.php'); ?>