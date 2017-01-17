<?php

namespace PlatformEngine\Barcode\Zed\Business;

use PlatformEngine\Engine\Zed\Business\AbstractFacade;

/**
 * Class PlatformFacade
 *
 * PHP Version 5
 *
 * @category  PHP
 * @package   PlatformEngine\Barcode\Zed\Business
 * @author    Simplicity Trade GmbH <it@simplicity.ag>
 * @copyright 2014-2017 Simplicity Trade GmbH
 * @license   Proprietary http://www.simplicity.ag
 */
class PlatformFacade extends AbstractFacade implements PlatformFacadeInterface
{
    public function install()
    {
        $this->getFactory();
    }
}