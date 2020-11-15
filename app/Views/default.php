<?= $this->extend('layouts/base') ?>

<?= $this->section('base') ?>

<header>
    <?= $this->include('layouts/partials/header') ?>
</header>

<section>
<?= $this->renderSection('content') ?>
</section>

<footer>
    <?= $this->include('layouts/partials/footer') ?>
</footer>

<?= $this->endSection() ?>