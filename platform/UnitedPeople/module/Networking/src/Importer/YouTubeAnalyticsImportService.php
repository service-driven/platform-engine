<?php

namespace Networking\Importer;

use Google_Service_YouTubeAnalytics;

/**
 * Class YouTubeAnalyticsImportService
 *
 * PHP Version 5
 *
 * @category  PHP
 * @package   Networking\Importer
 * @author    Simplicity Trade GmbH <it@simplicity.ag>
 * @copyright 2014-2016 Simplicity Trade GmbH
 * @license   Proprietary http://www.simplicity.ag
 */
class YouTubeAnalyticsImportService
{
    public function import()
    {
        $service = new Google_Service_YouTubeAnalytics();
    }
}
