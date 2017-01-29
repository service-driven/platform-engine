<?php

namespace Networking\Service;

use Google_Client;
use Google_Service_Analytics;
use Google_Service_Calendar;
use Google_Service_Classroom;
use Google_Service_Customsearch;
use Google_Service_Drive;
use Google_Service_Fitness;
use Google_Service_Gmail;
use Google_Service_IdentityToolkit;
use Google_Service_Pagespeedonline;
use Google_Service_People;

/**
 * Class GoogleClientService
 *
 * PHP Version 5
 *
 * @category  PHP
 * @package   Networking\Service
 * @author    Simplicity Trade GmbH <it@simplicity.ag>
 * @copyright 2014-2016 Simplicity Trade GmbH
 * @license   Proprietary http://www.simplicity.ag
 */
class GoogleService
{
    /**
     * @var Google_Client
     */
    protected $client;

    /**
     * GoogleClientService constructor.
     * @param Google_Client $client
     */
    public function __construct(Google_Client $client)
    {
        $this->client = $client;
    }

    public function createAnalyticsService()
    {
        return new Google_Service_Analytics($this->client);
    }

    public function createCalendarService()
    {
        return new Google_Service_Calendar($this->client);
    }

    public function createClassroomService()
    {
        return new Google_Service_Classroom($this->client);
    }

    public function createCustomSearchService()
    {
        return new Google_Service_Customsearch($this->client);
    }

    public function createDriveService()
    {
        return new Google_Service_Drive($this->client);
    }

    public function createFitnessService()
    {
        return new Google_Service_Fitness($this->client);
    }

    public function createMailService()
    {
        return new Google_Service_Gmail($this->client);
    }

    public function createIdentityToolkitService()
    {
        return new Google_Service_IdentityToolkit($this->client);
    }

    public function createPageSpeedService()
    {
        return new Google_Service_Pagespeedonline($this->client);
    }

    public function createPeopleService()
    {
        return new Google_Service_People($this->client);
    }
}
