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
                               value="<?= $newsletter->id ?>"
                               disabled
                        >
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Title</label>
                    <div class="col-sm-10">
                        <input type="text" name="title"
                               class="form-control <?= ($validation->hasError('title')) ? 'is-invalid' : ''; ?>"
                               value="<?= old('title') ?: $newsletter->title ?>" aria-describedby="titleHelp"
                        >
                        <small id="nameHelp" class="form-text text-danger">
                            <?= $validation->getError('title') ?>
                        </small>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Content</label>
                    <div class="col-sm-10">
                        <textarea rows="10" name="content"
                                  class="form-control <?= ($validation->hasError('content')) ? 'is-invalid' : ''; ?>"
                                  aria-describedby="contentHelp"
                        ><?= old('content') ?: $newsletter->content ?></textarea>
                        <small id="nameHelp" class="form-text text-danger">
                            <?= $validation->getError('content') ?>
                        </small>
                    </div>
                </div>


            </form>
        </div>
    </div>

<?= $this->endSection(); ?>