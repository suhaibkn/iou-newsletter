<?= $this->extend('default') ?>

<?= $this->section('content') ?>

<?php $validation = \Config\Services::validation(); ?>

    <div class="container-fluid bg-info d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="col-md-6 bg-light rounded p-3">
            <form method="POST">
                <?= csrf_field(); ?>

                <div class="form-group">
                    <label for="subscriber_name">Name</label>
                    <input type="text"
                           class="form-control <?= ($validation->hasError('name')) ? 'is-invalid' : ''; ?>"
                           id="subscriber_name" name="name" value="<?= old('name'); ?>"
                           aria-describedby="nameHelp">
                    <small id="nameHelp" class="form-text text-danger">
                        <?= $validation->getError('name') ?>
                    </small>
                </div>

                <div class="form-group">
                    <label for="subscriber_email">Email address</label>
                    <input type="text"
                           class="form-control <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?>"
                           id="subscriber_email" name="email" value="<?= old('email'); ?>"
                           aria-describedby="emailHelp">
                    <?php if ($validation->hasError('email')): ?>
                        <small id="emailHelp" class="form-text text-danger">
                            <?= $validation->getError('email') ?>
                        </small>
                    <?php else: ?>
                        <small id="emailHelp" class="form-text text-muted">
                            We'll never share your email with anyone else.
                        </small>
                    <?php endif; ?>
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