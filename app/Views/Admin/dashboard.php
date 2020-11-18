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

            Total Newsletters <?= count((new App\Models\NewsletterModel)->findAll()); ?> <br>
            Total Subscribers <?= count((new App\Models\SubscriberModel())->findAll()); ?> <br>
            <a href="<?= base_url() ?>/admin/addsubscriber">Add a subscriber</a> <br>
            <a href="<?= base_url() ?>/admin/addnewsletter">Add a newsletter</a>
            <br> <br> <br>
            <div class="card bg-dark text-white">
                <div class="card-body">
                    <h5 class="border-bottom">Debug</h5>
                    <div class="row my-1">
                        <div class="col">Reset Database</div>
                        <div class="col text-right">
                            <div class="btn-group btn-group-sm" role="group">
                                <button type="button" class="btn btn-secondary">All</button>
                                <button type="button" class="btn btn-secondary">Newsletters</button>
                                <button type="button" class="btn btn-secondary">Subscribers</button>
                            </div>
                        </div>
                    </div>
                    <div class="row my-1">
                        <div class="col">Populate Database with fake data</div>
                        <div class="col text-right">
                            <div class="btn-group btn-group-sm" role="group">
                                <button type="button" class="btn btn-secondary">All</button>
                                <button type="button" class="btn btn-secondary">Newsletters</button>
                                <button type="button" class="btn btn-secondary">Subscribers</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

<?= $this->endSection(); ?>