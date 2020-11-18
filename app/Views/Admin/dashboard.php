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

    <div class="card m-2 p-0 border-0">
        <div class="card-body m-2 p-2">

            <div class="row">

                <div class="col-2 card m-1 p-1">
                    <div class="card-body">
                        <h5 class="border-bottom">Metrics</h5>
                        <div class="row">
                            <div class="col">
                                <div class="row">
                                    <div class="col d-flex justify-content-between">
                                        <div>
                                            <a href="<?= base_url(); ?>/admin/newsletters">Total Newsletters</a>
                                        </div>
                                        <div>
                                            <span class="badge badge-pill badge-info">
                                            <?= count((new App\Models\NewsletterModel)->findAll()); ?>

                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col d-flex justify-content-between">
                                        <div>
                                            <a href="<?= base_url(); ?>/admin/subscribers">Total Subscribers</a>
                                        </div>
                                        <div>
                                            <span class="badge badge-pill badge-info">
                                            <?= count((new App\Models\SubscriberModel())->findAll()); ?>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-2 card m-1 p-1">
                    <div class="card-body">
                        <h5 class="border-bottom">Quick Links</h5>
                        <div class="row">
                            <div class="col">
                                <a href="<?= base_url() ?>/admin/addsubscriber" class="">
                                    Add a subscriber</a> 🞄
                                <a href="<?= base_url() ?>/admin/addnewsletter" class="">
                                    Add a newsletter
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col"></div>

                <div class="col-5 card m-1 p-1 border-danger">
                    <div class="card-body">
                        <h5 class="border-bottom">Debug</h5>
                        <div class="row my-1">
                            <div class="col">Reset Database</div>
                            <div class="col text-right">
                                <div class="btn-group btn-group-sm" role="group">
                                    <a type="button" class="btn btn-danger" href="<?= current_url() ?>/resetdb">
                                        All
                                    </a>
                                    <a type="button" class="btn btn-outline-danger"
                                       href="<?= current_url() ?>/resetdb/nws">Newsletters</a>
                                    <a type="button" class="btn btn-outline-danger"
                                       href="<?= current_url() ?>/resetdb/sbs">Subscribers</a>
                                </div>
                            </div>
                        </div>
                        <div class="row my-1">
                            <div class="col">Populate Database with fake data</div>
                            <div class="col text-right">
                                <div class="btn-group btn-group-sm" role="group">
                                    <a type="button" class="btn btn-danger">All</a>
                                    <a type="button" class="btn btn-outline-danger">Newsletters</a>
                                    <a type="button" class="btn btn-outline-danger">Subscribers</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>

<?= $this->endSection(); ?>