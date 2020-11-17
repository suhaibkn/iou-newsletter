<?= $this->extend('Admin/layouts/base') ?>

<?= $this->section('main') ?>

    <h3 class="p-2">Subscribers</h3>

<?php if (session()->has('msg')) { ?>
    <div class="alert alert-secondary alert-dismissible fade show" role="alert">
        <?= session()->getFlashdata('msg') ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php } ?>

    <div class="card m-1 p-0">
        <div class="card-body m-0 p-0">

            <table class="table table-hover table-sm">

                <?php foreach ($subscribers as $n) : ?>
                    <tr>
                        <td>
                            <a href="<?= current_url() ?>/<?= $n->id ?>"><?= $n->name ?></a>
                            🞄 <span class="text-muted"><?= $n->email ?></span>
                        </td>
                        <td class="text-muted text-right">
                            <?= CodeIgniter\I18n\Time::parse($n->created_at)->humanize() ?>
                        </td>
                    </tr>
                <?php endforeach; ?>

            </table>

            <?= $pager->links() ?>

        </div>
    </div>

<?= $this->endSection(); ?>