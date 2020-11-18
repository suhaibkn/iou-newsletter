<?= $this->extend('default') ?>

<?= $this->section('content') ?>

<?= $this->include('Subscriber/layouts/navbar') ?>

<?php if (session()->has('msg')) { ?>
    <div class="alert alert-secondary alert-dismissible fade show" role="alert">
        <?= session()->getFlashdata('msg') ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php } ?>

    <div class="container-fluid">
        <div class="row">
            <div class="col bg-light rounded py-3">

                <?php if ($user->is_subscribed == false) { ?>
                    <div class="row justify-content-center">
                        <div class="col-9">
                            <div class="jumbotron jumbotron-fluid">
                                <div class="container">
                                    <h1 class="display-4">:(</h1>
                                    <p class="lead">Unfortunately you are not subscribed to our newsletter. Please
                                        subscribe
                                        first and try again later.</p>
                                </div>
                            </div>
                        </div>

                    </div>

                <?php } else { ?>
                    <table class="table table-sm table-borderless table-hover">
                        <?php foreach ($news as $n): ?>
                            <tr>
                                <td>
                                    <a href="<?= base_url() ?>/subscriber/news/<?= $n->id ?>"><?= $n->title ?></a>
                                    <span class="mx-1">🞄</span> <span class="text-muted"><?= $n->author ?></span>
                                </td>
                                <td class="text-muted text-right">
                                    <?= CodeIgniter\I18n\Time::parse($n->created_at)->humanize() ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </table>

                    <?= $pager->links(); ?>
                <?php } ?>

            </div>
        </div>
    </div>

<?= $this->endSection(); ?>