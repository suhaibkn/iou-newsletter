<?= $this->extend('default') ?>

<?= $this->section('content') ?>

<div class="container-fluid bg-info d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="col-md-6 bg-light rounded py-3">
            <form method="POST">
                <div class="form-group">
                    <label for="subscriber_email">Your registered Email address</label>
                    <input type="email" class="form-control" id="subscriber_email" required>
                </div>
                <div class="row pt-3">
                    <div class="col-md d-block d-flex justify-content-md-start justify-content-center">
                        <button type="submit" class="btn btn-success">View Newsletters</button>
                    </div>
                    <div class="col-md d-block d-flex justify-content-md-end justify-content-center mt-4 mt-md-0">
                        <a class="btn btn-outline-dark mr-1" href="<?=base_url() ?>">Subscribe Now!</a>
                    </div>
                </div>

            </form>
        </div>
</div>

<?= $this->endSection(); ?>