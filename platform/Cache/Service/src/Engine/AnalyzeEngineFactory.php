<?php

namespace Simplicity\EventDrivenCache\Engine;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Class AnalyzeEngineFactory
 *
 * PHP Version 5
 *
 * @category  PHP
 * @package   Simplicity\EventDrivenCache\Engine
 * @author    Simplicity Trade GmbH <it@simplicity.ag>
 * @copyright 2014-2016 Simplicity Trade GmbH
 * @license   Proprietary http://www.simplicity.ag
 */
class AnalyzeEngineFactory implements FactoryInterface
{
    /**
     * Create service
     *
     * @param ServiceLocatorInterface $serviceLocator The service locator.
     *
     * @return AnalyzeEngineInterface
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        return new AnalyzeEngine();
    }
}