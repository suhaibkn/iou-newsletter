<?= $this->extend('Admin/layouts/base') ?>

<?= $this->section('main') ?>

    Subscribers
    <div class="card m-1 p-0">
        <div class="card-body m-0 p-0">
            <table class="table table-bordered table-sm">
                <thead>
                <th width="40px">Subscribed</th>
                <th width="250px">Name</th>
                <th>Email</th>
                <th width="200px">Subscribed on</th>
                </thead>
                <tbody>

                <?php foreach ($subscribers as $n) : ?>
                    <tr>
                        <td><?= $n->is_subscribed ?></td>
                        <td><?= $n->name ?></td>
                        <td><?= $n->email ?></td>
                        <td><?= $n->created_at ?></td>
                    </tr>

                <?php endforeach; ?>
                </tbody>
            </table>

            <?= $pager->links() ?>
        </div>
    </div>

<?= $this->endSection(); ?>