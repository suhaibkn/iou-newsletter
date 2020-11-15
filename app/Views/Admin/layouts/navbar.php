<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="<?= base_url() ?>">Newsletter Dashboard</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText"
            aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item <?= (explode('/', uri_string())[1] == 'newsletters') ? 'active' : '' ?>">
                <a class="nav-link" href="<?= base_url(); ?>/admin/newsletters">Newsletters</a>
            </li>
            <li class="nav-item <?= (explode('/', uri_string())[1] == 'subscribers') ? 'active' : '' ?>">
                <a class="nav-link" href="<?= base_url(); ?>/admin/subscribers">Subscribers</a>
            </li>
        </ul>
        <span class="navbar-text">
            Admin
        </span>
    </div>
</nav>