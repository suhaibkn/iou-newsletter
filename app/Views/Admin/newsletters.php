<?= $this->extend('Admin/layouts/base') ?>

<?= $this->section('main') ?>

    Newsletters
    <table class="table table-bordered table-sm">
        <thead>
        <th>Title</th>
        <th>Author</th>
        <th>Created on</th>
        </thead>
        <tbody>

        <?php foreach ($newsletters as $n) : ?>
            <tr>
                <td><?= $n->title ?></td>
                <td><?= $n->author ?></td>
                <td><?= $n->created_at ?></td>
            </tr>


        <?php endforeach; ?>
        </tbody>
    </table>

<?= $pager->links() ?>

<?= $this->endSection(); ?>