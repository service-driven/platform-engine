<?php

namespace Application\Controller;

use Zend\Console\Request;
use Zend\Mvc\Console\Controller\AbstractConsoleController;

/**
 * Class RouterConsoleController
 *
 * PHP Version 5
 *
 * @category  PHP
 * @package   Application\Controller
 * @author    Simplicity Trade GmbH <it@simplicity.ag>
 * @copyright 2014-2016 Simplicity Trade GmbH
 * @license   Proprietary http://www.simplicity.ag
 */
class RouterConsoleController extends AbstractConsoleController
{
    /** @var array */
    protected $config;

    /**
     * AnalyzeConsoleController constructor.
     *
     * @param array $config The global config.
     */
    public function __construct(array $config)
    {
        $this->config = $config;
    }

    /**
     * @return void
     */
    public function matchAction()
    {
        /** @var Request $request */
        $request = $this->getRequest();
        $routes = $this->config['router']['routes'];

        $path = $request->getParam('path');

        foreach ($routes as $routeId => $route) {
            if (strpos($route['options']['route'], $path) === 0) {
                $this->getConsole()->writeLine(sprintf("%s\t%s", $routeId, $route['options']['route']));
            }
        }
    }

    /**
     * @return void
     */
    public function routesAction()
    {
        /** @var Request $request */
        $request = $this->getRequest();
        $routes = $this->config['router']['routes'];

        $routeId = $request->getParam('routeId');
        if ($routeId) {
            if (array_key_exists($routeId, $routes)) {
                $route = $routes[$routeId];
                $this->getConsole()->writeLine(sprintf("%s\t%s", $routeId, $route['options']['route']));
            }
        } else {
            foreach ($routes as $routeId => $route) {
                $this->getConsole()->writeLine(sprintf("%s\t%s", $routeId, $route['options']['route']));
            }
        }
    }
}