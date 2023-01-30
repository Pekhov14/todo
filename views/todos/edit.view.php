<?php require base_path('views/sections/head.php'); ?>
<?php require base_path('views/sections/nav.php'); ?>

<div class="container">
    <h1><?php echo $title ?></h1>

<!--  todo добавить стили  -->
    <div>
        <form action="" method="post">
            <p>Имя: <?php echo $task['name']; ?></p>
            <p>Email: <?php echo $task['email']; ?></p>
            <span>Описание</span>
            <input type="hidden" name="id" value="<?php echo $task['id']; ?>">
            <textarea name="description"><?php echo $task['description']; ?></textarea>
            <spna>Выполнено</spna>
            <input type="checkbox"
                   name="status"
                   <?php echo ($task['status'] === 'done') ? 'checked' : ''; ?>
            >
            <button class="btn btn-dark" type="submit">Сохранить</button>
        </form>
    </div>

<!-- Только если авторизирован -->
<!--    <a href="todo/edit?id=--><?php //echo $task['id']; ?><!--"-->
<!--       class="btn-dark"-->
<!--    >Редактировать</a>-->
</div>

<?php require base_path('views/sections/footer.php'); ?>