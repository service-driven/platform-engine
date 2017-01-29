<?php

namespace Networking\Service;

use Google_Client;
use Google_Service_People;

/**
 * Class PeopleGoogleService
 *
 * PHP Version 5
 *
 * @category  PHP
 * @package   Networking\Service
 * @author    Simplicity Trade GmbH <it@simplicity.ag>
 * @copyright 2014-2016 Simplicity Trade GmbH
 * @license   Proprietary http://www.simplicity.ag
 */
class GooglePeopleService
{
    /**
     * @var Google_Service_People
     */
    protected $peopleService;

    /**
     * GoogleClientService constructor.
     * @param Google_Service_People $peopleService
     */
    public function __construct(Google_Service_People $peopleService)
    {
        $this->peopleService = $peopleService;
    }

    public function getConnections($resourceName = 'people/me')
    {
        return $this->peopleService->people_connections->listPeopleConnections($resourceName);
    }

    public function getPerson($resourceName = 'people/me')
    {
        return $this->peopleService->people->get($resourceName);
    }
}
