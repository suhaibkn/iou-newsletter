<?= $this->extend('Admin/layouts/base') ?>

<?= $this->section('main') ?>


<?php if (session()->has('msg')) { ?>
    <div class="alert alert-secondary alert-dismissible fade show" role="alert">
        <?= session()->getFlashdata('msg') ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php } ?>

    <div class="container-fluid">
        <div class="row my-2">

            <div class="col">
                <h3 class="">Newsletters</h3>
            </div>

            <div class="col text-right">
                <a class="btn btn-outline-success" href="<?= base_url() ?>/admin/addnewsletter">Add a newsletter</a>
            </div>

        </div>
    </div>

    <div class="card m-1 p-0">
        <div class="card-body m-0 p-0">

            <table class="table table-hover table-sm">

                <?php foreach ($newsletters as $n) : ?>
                    <tr>
                        <td>
                            <a href="<?= current_url() ?>/<?= $n->id ?>"><?= $n->title ?></a>
                            <span class="mx-1">🞄</span> <span class="text-muted"><?= $n->author ?></span>
                        </td>
                        <td class="text-muted text-right">
                            <span class="small">
                                <?= CodeIgniter\I18n\Time::parse($n->created_at)->humanize() ?>
                                (<?= CodeIgniter\I18n\Time::parse($n->created_at)->toLocalizedString('MMM dd, YYYY') ?> at
                                <?= CodeIgniter\I18n\Time::parse($n->created_at)->toLocalizedString('h:mm a') ?>)
                            </span>
                        </td>
                    </tr>
                <?php endforeach; ?>

            </table>

            <?= $pager->links() ?>

        </div>
    </div>

<?= $this->endSection(); ?>