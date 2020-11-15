<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>IOU Newsletter!</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" type="image/png" href="/favicon.ico"/>

	<!-- STYLES -->
    <link rel="stylesheet" href="<?= base_url(); ?>/libs/css/bootstrap.min.css">
</head>
<body>

<header>
    <?= $this->include('layouts/partials/header') ?>
</header>

<section>
<?= $this->renderSection('content') ?>
</section>

<footer>
    <?= $this->include('layouts/partials/footer') ?>
</footer>

<!--<script src="<?= base_url(); ?>/libs/js/bootstrap.min.js"></script>-->
</body>
</html>
