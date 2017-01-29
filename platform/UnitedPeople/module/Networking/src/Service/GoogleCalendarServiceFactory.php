<?php

namespace Networking\Service;

use Google_Client;
use Google_Service_Calendar;
use Google_Service_People;
use Interop\Container\ContainerInterface;
use Interop\Container\Exception\ContainerException;
use Zend\ServiceManager\Exception\ServiceNotCreatedException;
use Zend\ServiceManager\Exception\ServiceNotFoundException;
use Zend\ServiceManager\Factory\FactoryInterface;

/**
 * Class PeopleGoogleServiceFactory
 *
 * PHP Version 5
 *
 * @category  PHP
 * @package   Networking\Service
 * @author    Simplicity Trade GmbH <it@simplicity.ag>
 * @copyright 2014-2016 Simplicity Trade GmbH
 * @license   Proprietary http://www.simplicity.ag
 */
class GoogleCalendarServiceFactory implements FactoryInterface
{

    /**
     * Create an object
     *
     * @param  ContainerInterface $container
     * @param  string $requestedName
     * @param  null|array $options
     * @return object
     * @throws ServiceNotFoundException if unable to resolve the service.
     * @throws ServiceNotCreatedException if an exception is raised when
     *     creating a service.
     * @throws ContainerException if any other error occurs
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $client = new Google_Client();
        $client->setClientId('YOUR_CLIENT_ID');
        $client->setClientSecret('YOUR_CLIENT_SECRET');
        $client->setDeveloperKey("YOUR_APP_KEY");
        $client->setAuthConfig('/path/to/client_credentials.json');

        $client->addScope('profile');
        $client->addScope('https://www.googleapis.com/auth/contacts.readonly');


        $calendarService = new Google_Service_Calendar($client);

        return new GoogleCalendarService($calendarService);
    }
}
