<?= $this->extend('default') ?>

<?= $this->section('content') ?>

    <div class="container-fluid bg-info d-flex flex-column justify-content-center align-items-center"
         style="height: 100vh;">
        <div class="display-4">
            You are not yet registered!
        </div>
        <p class="mt-4">
            Click <a href="<?= base_url() ?>" style="color: #1c7430; text-decoration: underline;">here</a>
            to get subscribed now!
            Or click <a href="<?= previous_url() ?>" style="color: #1b1e21; text-decoration: underline;">here</a>
            to go back and try again.
        </p>

    </div>

<?= $this->endSection(); ?>