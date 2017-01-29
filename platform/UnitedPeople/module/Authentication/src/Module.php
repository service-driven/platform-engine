<?php

namespace Authentication;

/**
 * Class Module
 *
 * PHP Version 5
 *
 * @category  PHP
 * @package   Authentication
 * @author    Simplicity Trade GmbH <it@simplicity.ag>
 * @copyright 2014-2016 Simplicity Trade GmbH
 * @license   Proprietary http://www.simplicity.ag
 */
class Module
{

    const VERSION = '3.0.2dev';

    public function getConfig()
    {
        return include __DIR__ . '/../config/module.config.php';
    }
}
