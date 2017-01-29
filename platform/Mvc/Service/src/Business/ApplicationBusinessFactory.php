<?php

namespace ServiceDriven\MvcPlatform\Business;

use Zend\Mvc\Application;
use Zend\ServiceManager\ServiceManager;

/**
 * Class ApplicationBusinessFactory
 *
 * PHP Version 5
 *
 * @category  PHP
 * @package   ServiceDriven\MvcPlatform\Business
 * @author    Simplicity Trade GmbH <it@simplicity.ag>
 * @copyright 2014-2017 Simplicity Trade GmbH
 * @license   Proprietary http://www.simplicity.ag
 */
class ApplicationBusinessFactory
{
    public function createApplication()
    {
        return new Application($this->createServiceManager());
    }

    public function createServiceManager()
    {
        return new ServiceManager();
    }

}