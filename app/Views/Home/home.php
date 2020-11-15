<?= $this->extend('default') ?>

<?= $this->section('content') ?>

    <div class="container-fluid bg-info d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="col-md-6 bg-light rounded py-3">
            <form method="POST">
                <div class="form-group">
                    <label for="subscriber_name">Name</label>
                    <input type="text" class="form-control" id="subscriber_name" required>
                </div>
                <div class="form-group">
                    <label for="subscriber_email">Email address</label>
                    <input type="email" class="form-control" id="subscriber_email" aria-describedby="emailHelp"
                           required>
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
                        else.</small>
                </div>
                <div class="row pt-3">
                    <div class="col-md d-block d-flex justify-content-md-start justify-content-center">
                        <button type="submit" class="btn btn-success">Subscribe</button>
                    </div>
                    <div class="col-md d-block d-flex justify-content-md-end justify-content-center mt-4 mt-md-0">
                        <a class="btn btn-outline-dark mr-1" href="<?= base_url(); ?>/subscriber">Already
                            Subscribed?</a>
                        <a class="btn btn-outline-dark" href="<?= base_url(); ?>/admin">Admin</a>
                    </div>
                </div>

            </form>
        </div>
    </div>

<?= $this->endSection(); ?>