<?php

namespace Simplicity\StackEngine\Engine;

use Clue\StreamFilter\CallbackFilter;
use Simplicity\StackEngine\Command\AnalyzePhpCommand;
use Zend\Console\Adapter\AdapterInterface;
use Zend\Console\ColorInterface;
use Zend\Console\Console;
use ZF\Console\Application;
use ZF\Console\Dispatcher;
use ZF\Console\Route;

/**
 * Class StackEngine
 *
 * PHP Version 5
 *
 * @category  PHP
 * @package   Simplicity\StackEngine\Engine
 * @author    Simplicity Trade GmbH <it@simplicity.ag>
 * @copyright 2014-2016 Simplicity Trade GmbH
 * @license   Proprietary http://www.simplicity.ag
 */
class StackEngine
{
    /**  */
    const VERSION = '1.1.3';

    /** @var  Application */
    protected static $application;

    /**
     * @return Application
     */
    public static function getApplication()
    {
        if (null === self::$application) {
            $stackEngine = self::createEngine();
            self::$application = $stackEngine->createApplication();
        }

        return self::$application;
    }

    /**
     * @return AdapterInterface
     */
    protected function getConsole()
    {
        return Console::getInstance();
    }

    /**
     * @return StackEngine
     */
    public static function createEngine()
    {
        if (file_exists($autoLoader = __DIR__ . '/../../../autoload.php')) {
            require $autoLoader;
        } elseif (file_exists($autoLoader = __DIR__ . '/../vendor/autoload.php')) {
            require $autoLoader;
        } else {
            fwrite(STDERR, 'Cannot locate autoloader; please run "composer install"' . PHP_EOL);
            exit(1);
        }

        return new StackEngine();
    }

    /**
     * @return Application
     */
    public function createApplication()
    {
        $commands = $this->registerCommands();
        $routes = $this->registerRoutes();

        $application = new Application('StackEngine', self::VERSION, $routes, $this->getConsole(), $commands);
        $application->setBanner('Some ASCI art for a banner!'); // string
        $application->setBanner(
            function (AdapterInterface $console) {           // callable
                $console->writeLine(
                    $console->colorize('Builder', ColorInterface::BLUE)
                    . ' - for building deployment packages'
                );
                $console->writeLine('');
                $console->writeLine('Usage:', ColorInterface::GREEN);
                $console->writeLine(' ' . basename(__FILE__) . ' command [options]');
                $console->writeLine('');
            }
        );

        return $application;
    }

    /**
     * @return Dispatcher
     */
    public function registerCommands()
    {
        $dispatcher = new Dispatcher();
        $dispatcher->map('analyze-php', new AnalyzePhpCommand());
        $dispatcher->map(
            'build',
            function (Route $route, AdapterInterface $console) {
                $console->writeLine('Executing some-command!');
            }
        );

        return $dispatcher;
    }

    /**
     * @return array
     */
    public function registerRoutes()
    {
        return array(
            array(
                'name'                 => 'analyze-php',
                'route'                => '<path>',
                'description'          => 'analyze a package',
                'short_description'    => 'analyze',
                'options_descriptions' => array(
                    '<path>' => 'Package filename to build',
                ),
                'defaults'             => array(
                    'target' => getcwd(),
                ),
                'filters'              => array(
                    'exclude' => new CallbackFilter(
                        function ($value) {
                            if (!is_string($value)) {
                                return $value;
                            }
                            $exclude = explode(',', $value);
                            array_walk($exclude, 'trim');

                            return $exclude;
                        }
                    ),
                ),
            ),
        );
    }
}