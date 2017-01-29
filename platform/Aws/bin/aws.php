<?php
namespace Simplicity\AwsPlatform;

use Zend\Console\Console;
use ZF\Console\Application;
use ZF\Console\Dispatcher;

require_once __DIR__ . '/../vendor/autoload.php';

define('VERSION', '1.1.3');

$dispatcher = new Dispatcher();
$dispatcher->map('elasticache', new Command\ElastiCacheCommand());
$dispatcher->map('rds', new Command\RdsCommand());
$dispatcher->map('cloudwatch', new Command\CloudWatchCommand());

$application = new Application(
    'Builder',
    VERSION,
    array(),
    Console::getInstance(),
    $dispatcher
);
$exit = $application->run();
exit($exit);