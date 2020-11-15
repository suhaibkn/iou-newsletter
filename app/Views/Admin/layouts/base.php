<?= $this->extend('default') ?>

<?= $this->section('content') ?>

<div class="container-fluid p-0">
        <?= $this->include('Admin/layouts/navbar'); ?>
</div>

<?= $this->renderSection('main'); ?>

<?= $this->endSection(); ?>