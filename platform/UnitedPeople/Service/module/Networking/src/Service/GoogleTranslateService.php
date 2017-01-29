<?php

namespace Networking\Service;

use Google_Service_Translate;

/**
 * Class GoogleTranslateService
 *
 * PHP Version 5
 *
 * @category  PHP
 * @package   Networking\Service
 * @author    Simplicity Trade GmbH <it@simplicity.ag>
 * @copyright 2014-2016 Simplicity Trade GmbH
 * @license   Proprietary http://www.simplicity.ag
 */
class GoogleTranslateService
{

    /**
     * GoogleTranslateService constructor.
     */
    public function __construct()
    {
        $service = new Google_Service_Translate();
    }
}
