<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Blog Overview - SB Admin Pro</title>
    <link href="/sb-ui-kit-pro/css/styles.css" rel="stylesheet" />
<!--    <link rel="icon" type="image/x-icon" href="assets/img/favicon.png" />-->
    <script data-search-pseudo-elements defer src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.24.1/feather.min.js" crossorigin="anonymous"></script>

    <?= $this->renderSection('styles') ?>

</head>
<body>
<div id="layoutDefault">
    <div id="layoutDefault_content">
        <main>

            <?= $this->include('templates/public/navbar') ?>

            <?= $this->renderSection('content') ?>

        </main>

        <?= $this->include('templates/portfolio/footer') ?>

    </div>
</div>

<?= $this->renderSection('scripts') ?>

</body>
</html>
