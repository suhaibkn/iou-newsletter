<?= $this->extend('Admin/layouts/base') ?>

<?= $this->section('main') ?>
<?php $validation = \Config\Services::validation(); ?>

<?php if (session()->has('msg')) { ?>
    <div class="alert alert-secondary alert-dismissible fade show" role="alert">
        <?= session()->getFlashdata('msg') ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php } ?>

    <div class="container-fluid">
        <div class="row my-2">

            <div class="col">
                <h3 class="">Add a subscriber</h3>
            </div>

        </div>
    </div>

    <div class="card m-2 p-0">
        <div class="card-body m-2 p-2">
            <form action="" method="POST">
                <?= csrf_field(); ?>

                <div class="form-group text-right">

                    <button type="submit" class="btn btn-outline-success mb-4" name="action" value="add">Add</button>

                </div>

                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text" id="name" name="name" placeholder="Name"
                               class="form-control <?= ($validation->hasError('name')) ? 'is-invalid' : ''; ?>"
                               value="<?= old('name') ?>"
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
                               class="form-control <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?>"
                               aria-describedby="emailHelp"
                               value="<?= old('email') ?>"
                        >
                        <small id="emailHelp" class="form-text text-danger">
                            <?= $validation->getError('email') ?>
                        </small>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-2"></div>
                    <div class="col-10 form-check pl-5">
                        <input type="checkbox" class="form-check-input" id="subscribed" name="subscribed" checked>
                        <label class="form-check-label" for="subscribed">Subscribed to Newsletter</label>
                    </div>
                </div>

            </form>

        </div>
    </div>


<?= $this->endSection(); ?>