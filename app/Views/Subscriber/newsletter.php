<?= $this->extend('default') ?>

<?= $this->section('content') ?>

<?= $this->include('Subscriber/layouts/navbar') ?>

    <div class="container-fluid">
        <div class="row">
            <div class="col bg-light rounded py-3">
                <h3><?= $news->title ?></h3>
            </div>
        </div>
        <div class="row">
            <div class="col bg-light rounded pb-3">
                by <i><?= $news->author ?></i>,
                <?= CodeIgniter\I18n\Time::parse($news->created_at)->humanize() ?>
                (<?= CodeIgniter\I18n\Time::parse($news->created_at)->toLocalizedString('MMM d, yyyy') ?>) at
                <?= CodeIgniter\I18n\Time::parse($news->created_at)->toLocalizedString('h:mm a') ?>
            </div>
        </div>
        <div class="row">
            <div class="col p-3">
                <?= $news->content ?>
            </div>
        </div>
    </div>

<?= $this->endSection(); ?>