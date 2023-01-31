<nav aria-label="Page pagination's ">
    <ul class="pagination">
        <?php foreach($paginations as $page): ?>
            <li class="page-item <?php echo ($currentPage === $page['value']) ? 'active' : '' ; ?>">
                <a class="page-link"
                   href="<?php echo $page['url']; ?>"
                >
                    <?php echo $page['value']; ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
</nav>