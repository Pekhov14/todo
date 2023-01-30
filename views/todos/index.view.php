<?php require base_path('views/sections/head.php'); ?>
<?php require base_path('views/sections/nav.php'); ?>

<div class="container overflow-hidden content-space-t-4">
    <h1>Todos 😊</h1>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">Имя пользователя</th>
            <th scope="col">е-mail</th>
            <th scope="col">Описание</th>
            <th scope="col">Статус</th>
            <!--  для админа -->
            <th scope="col">Действие</th>
        </tr>
        </thead>
        <tbody>
        <?php
            foreach ($todos as $todo): ?>
                <tr>
                    <th scope="row"><?php echo htmlspecialchars($todo['name']); ?></th>
                    <td><?php echo htmlspecialchars($todo['email']); ?></td>
                    <td><?php echo htmlspecialchars($todo['description']); ?></td>
                    <td><?php echo htmlspecialchars($todo['status']); ?> 🆕✅</td>
                    <td>
                        <!--  для админа -->
                        <a href="<?php echo 'todo?id='. $todo['id']; ?>">
                            Редактировать
                        </a>
                    </td>
                </tr>
        <?php endforeach;?>

        </tbody>
    </table>
</div>

<?php require base_path('views/sections/footer.php'); ?>