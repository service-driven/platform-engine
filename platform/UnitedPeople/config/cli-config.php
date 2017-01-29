<?php

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Console\ConsoleRunner;
use Zend\Mvc\Application;
use Zend\Stdlib\ArrayUtils;

include __DIR__ . '/../vendor/autoload.php';

if (!class_exists(Application::class)) {
    throw new RuntimeException(
        "Unable to load application.\n"
        . "- Type `composer install` if you are developing locally.\n"
        . "- Type `vagrant ssh -c 'composer install'` if you are using Vagrant.\n"
        . "- Type `docker-compose run zf composer install` if you are using Docker.\n"
    );
}

// Retrieve configuration
$applicationConfig = require __DIR__ . '/application.config.php';
if (file_exists(__DIR__ . '/development.config.php')) {
    $applicationConfig = ArrayUtils::merge($applicationConfig, require __DIR__ . '/development.config.php');
}

// Run the application!
$application = Application::init($applicationConfig)->run();
$serviceManager = $application->getServiceManager();
$entityManager = $serviceManager->get(EntityManager::class);

return ConsoleRunner::createHelperSet($entityManager);
