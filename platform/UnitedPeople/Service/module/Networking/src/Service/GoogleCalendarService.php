<?php

namespace Networking\Service;

use Google_Client;
use Google_Service_Calendar;
use Google_Service_People;

/**
 * Class GoogleCalendarService
 *
 * PHP Version 5
 *
 * @category  PHP
 * @package   Networking\Service
 * @author    Simplicity Trade GmbH <it@simplicity.ag>
 * @copyright 2014-2016 Simplicity Trade GmbH
 * @license   Proprietary http://www.simplicity.ag
 */
class GoogleCalendarService
{
    /**
     * @var Google_Service_Calendar
     */
    protected $calendarService;

    /**
     * GoogleClientService constructor.
     * @param Google_Service_Calendar $calendarService
     */
    public function __construct(Google_Service_Calendar $calendarService)
    {
        $this->calendarService = $calendarService;
    }
}
