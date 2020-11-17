<?= $this->extend('Admin/layouts/base') ?>

<?= $this->section('main') ?>

    <div class="container-fluid">
        <div class="row my-2">

            <div class="col">
                <h3 class="">Add a newsletter</h3>
            </div>

        </div>
    </div>

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

            New newsletter form here...

        </div>
    </div>

<?= $this->endSection(); ?>