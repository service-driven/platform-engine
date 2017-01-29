<?php

namespace Warehouse\Business;

use Warehouse\Business\Model\RestEntry;

/**
 * Class ApiBusinessFactory
 *
 * PHP Version 5
 *
 * @category  PHP
 * @package   Warehouse\Business
 * @author    Simplicity Trade GmbH <it@simplicity.ag>
 * @copyright 2014-2017 Simplicity Trade GmbH
 * @license   Proprietary http://www.simplicity.ag
 */
class RestBusinessFactory extends AbstractBusinessFactory
{
    // Here we will dynamically create facades of bundles based on a bundle name.
    protected function getBundleFacade($bundle)
    {
        $locator = $this->createContainer()->getLocator();
        return $locator->$bundle()->facade();
    }
    // This instantiates our business model and passes the facade inside it.
    public function createFacadeProxy($bundle)
    {
        return new RestEntry(
            $this->getBundleFacade($bundle)
        );
    }
}
