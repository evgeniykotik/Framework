<html>
<head>
    <?php

    use Fw\Core\Application;
    use Fw\Core\Multiton;

    $application = Multiton::get(Application::class);
    $application->getPager()->showHead(); ?>

    <title><?php $application->getPager()->showProperty('title') ?></title>
</head>
<body>
<header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
    <a href="index.php" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
        <svg class="bi me-2" width="40" height="32">
            <use xlink:href="#bootstrap"></use>
        </svg>
        <span class="fs-4">DARK <?php $application->getPager()->showProperty('header') ?></span>
    </a>
</header>