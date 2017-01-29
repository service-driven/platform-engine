<?php

namespace Warehouse\Business;

/**
 * Class RestFacade
 *
 * PHP Version 5
 *
 * @category  PHP
 * @package   Warehouse\Business
 * @author    Simplicity Trade GmbH <it@simplicity.ag>
 * @copyright 2014-2017 Simplicity Trade GmbH
 * @license   Proprietary http://www.simplicity.ag
 */
class RestFacade extends AbstractFacade implements RestFacadeInterface
{
    public function getAnnotations($bundle)
    {
        return $this->getFactory()->createFacadeProxy($bundle)->getAnnotations();
    }
}
{

}