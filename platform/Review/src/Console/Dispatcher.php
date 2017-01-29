<?php

namespace Simplicity\ReviewPlatform\Dispatcher;

use Simplicity\ReviewPlatform\Container\ContainerAwareInterface;
use Zend\Console\Adapter\AdapterInterface as ConsoleAdapter;
use ZF\Console\Dispatcher as ZendDispatcher;
use ZF\Console\Route;

/**
 * Class Dispatcher
 *
 * PHP Version 5
 *
 * @category  PHP
 * @package   Simplicity\ReviewPlatform\Dispatcher
 * @author    Simplicity Trade GmbH <it@simplicity.ag>
 * @copyright 2014-2016 Simplicity Trade GmbH
 * @license   Proprietary http://www.simplicity.ag
 */
class Dispatcher extends ZendDispatcher
{
    public function dispatch(Route $route, ConsoleAdapter $console)
    {
        $result = parent::dispatch($route, $console);

        if ($result instanceof ContainerAwareInterface) {
            $result->setContainer($this->container);
        }

        return $result;
    }
}