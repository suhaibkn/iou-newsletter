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

    <div class="card m-2 p-0">
        <div class="card-body m-2 p-2">

            Total Newsletters <?= (new App\Models\NewsletterModel)->countAll(); ?> <br>
            Total Subscribers <?= (new App\Models\SubscriberModel())->countAll(); ?> <br>
            Add a subscriber <br>
            Add a newsletter

        </div>
    </div>

<?= $this->endSection(); ?>