<?php

namespace ServiceDriven\MvcPlatform\Business;

/**
 * Class ApplicationFacade
 *
 * PHP Version 5
 *
 * @category  PHP
 * @package   ServiceDriven\MvcPlatform\Business
 * @author    Simplicity Trade GmbH <it@simplicity.ag>
 * @copyright 2014-2017 Simplicity Trade GmbH
 * @license   Proprietary http://www.simplicity.ag
 */
class ApplicationFacade
{
    public function createApplication()
    {
        return $this->getFactory()->createApplication();
    }

    public function createModule()
    {
        return $this->getFactory()->createModule();
    }

    public function createEndpoint($url, $callback)
    {
        return $this->getFactory()->createEndpoint($url, $callback);
    }

    public function createView()
    {
        return $this->getFactory()->createView();
    }

    public function getServiceManager()
    {
        if (!$this->getFactory()->hasServiceManager()) {

            return $this->getFactory()->createServiceManager();
        }

        return $this->getFactory()->getServiceManager();
    }
}