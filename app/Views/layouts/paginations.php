<nav>
    <ul class="pagination pagination-sm justify-content-center">
        <li class="page-item <?= ($pager->hasPreviousPage()) ? '' : 'disabled' ?>">
            <a href="<?= $pager->getFirst() ?>" class="page-link">
                <span aria-hidden="true">«</span>
            </a>
        </li>
        <li class="page-item <?= ($pager->hasPreviousPage()) ? '' : 'disabled' ?>">
            <a href="<?= $pager->getPreviousPage() ?>" class="page-link">
                <span aria-hidden="true">←</span>
            </a>
        </li>

        <?php foreach ($pager->links() as $link) : ?>
            <li class="page-item <?= $link['active'] ? 'active' : '' ?>">
                <a href="<?= $link['uri'] ?>" class="page-link"><?= $link['title'] ?></a>
            </li>
        <?php endforeach; ?>

        <li class="page-item <?= ($pager->hasNextPage()) ? '' : 'disabled' ?>">
            <a href="<?= $pager->getNextPage() ?>" class="page-link">
                <span aria-hidden="true">→</span>
            </a>
        </li>
        <li class="page-item <?= ($pager->hasNextPage()) ? '' : 'disabled' ?>">
            <a href="<?= $pager->getLast() ?>" class="page-link">
                <span aria-hidden="true">»</span>
            </a>
        </li>
    </ul>
</nav>