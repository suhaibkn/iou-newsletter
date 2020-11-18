<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="<?= base_url() ?>/subscriber/user/<?= $user->id ?>">Newsletters</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText"
            aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url(); ?>">Home</a>
            </li>
        </ul>
        <form class="form-inline" method="post">
            <input type="hidden" name="subscriber_id" value="<?= $user->id ?>">
            <?php if ($user->is_subscribed == true) { ?>
                <input class="btn btn-outline-danger btn-sm my-2 my-sm-0 mx-2" type="submit" name="action"
                       value="Unsubscribe">
            <?php } else { ?>
                <input class="btn btn-outline-success btn-sm my-2 my-sm-0 mx-2" type="submit" name="action"
                       value="Subscribe">
            <?php } ?>
        </form>
        <span class="navbar-text mx-2">
            <?= $user->name ?>
        </span>
    </div>
</nav>