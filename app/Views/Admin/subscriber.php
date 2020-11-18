<?php

use Config\Services;

?>
<?= $this->extend('Admin/layouts/base') ?>

<?= $this->section('main') ?>
<?php
$validation   = Services::validation();
$emailDuplErr = session()->getFlashdata('duplicate') == 1;
?>


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
            <form action="" method="POST">
                <?= csrf_field(); ?>

                <div class="form-group text-right">

                    <button type="submit" class="btn btn-primary mb-4" name="action" value="update">Update</button>

                    <button type="submit" class="btn btn-danger mb-4" name="action" value="delete">Delete</button>

                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">ID</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="id"
                               value="<?= $subscriber->id ?>"
                               disabled
                        >
                    </div>
                </div>

                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text" id="name" name="name" placeholder="Name"
                               class="form-control <?= ($validation->hasError('name')) ? 'is-invalid' : ''; ?>"
                               value="<?= old('name') ?: $subscriber->name ?>"
                               aria-describedby="nameHelp"
                        >
                        <small id="nameHelp" class="form-text text-danger">
                            <?= $validation->getError('name') ?>
                        </small>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">

                        <input type="text" id="email" name="email" placeholder="Email"
                               class="form-control <?= ($validation->hasError('email') || $emailDuplErr) ? 'is-invalid' : ''; ?>"
                               aria-describedby="emailHelp"
                               value="<?= old('email') ?: $subscriber->email ?>"
                        >
                        <?php if ($validation->hasError('email')): ?>
                            <small id="emailHelp" class="form-text text-danger">
                                <?= $validation->getError('email') ?>
                            </small>
                        <?php elseif ($emailDuplErr): ?>
                            <small id="emailHelp" class="form-text text-danger">
                                This email address is already registered. Please try with a different email address.
                            </small>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-2"></div>
                    <div class="col-10 form-check pl-5">
                        <input type="checkbox" class="form-check-input" id="subscribed" name="subscribed"
                            <?= ($subscriber->is_subscribed) ? 'checked' : '' ?>>
                        <label class="form-check-label" for="subscribed">Subscribed to Newsletter</label>
                    </div>
                </div>

            </form>

        </div>
    </div>

<?= $this->endSection(); ?>