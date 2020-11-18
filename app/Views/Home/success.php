<?= $this->extend('default') ?>

<?= $this->section('content') ?>

<?php $validation = \Config\Services::validation(); ?>

    <div class="container-fluid bg-info d-flex flex-column justify-content-center align-items-center"
         style="height: 100vh;">
        <div class="display-4">
            Congratulations <?= $name ?>!
        </div>
        <div class="lead ">You have successfully registered to the newsletter.</div>
        <p class="mt-4">
            Click <a href="<?= base_url() ?>/subscriber/user/<?= $id ?>" style="color: #1b1e21; text-decoration: underline;">here</a>
            to manage and read your subscriptions.
        </p>

    </div>

<?= $this->endSection(); ?>