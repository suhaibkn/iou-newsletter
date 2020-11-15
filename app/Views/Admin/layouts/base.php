<?= $this->extend('default') ?>

<?= $this->section('content') ?>

    <div class="container-fluid p-0">
        <?= $this->include('Admin/layouts/navbar'); ?>

        <?= $this->renderSection('main'); ?>
    </div>


<?= $this->endSection(); ?>