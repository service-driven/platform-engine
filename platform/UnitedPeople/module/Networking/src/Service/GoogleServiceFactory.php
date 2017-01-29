<?php

namespace Networking\Service;

use Google_Client;
use Google_Service_Analytics;
use Google_Service_Drive;
use Interop\Container\ContainerInterface;
use Interop\Container\Exception\ContainerException;
use Zend\ServiceManager\Exception\ServiceNotCreatedException;
use Zend\ServiceManager\Exception\ServiceNotFoundException;
use Zend\ServiceManager\Factory\FactoryInterface;

/**
 * Class GoogleClientServiceFactory
 *
 * PHP Version 5
 *
 * @category  PHP
 * @package   Networking\Service
 * @author    Simplicity Trade GmbH <it@simplicity.ag>
 * @copyright 2014-2016 Simplicity Trade GmbH
 * @license   Proprietary http://www.simplicity.ag
 */
class GoogleServiceFactory implements FactoryInterface
{
    /**
     * Create an object
     *
     * @param  ContainerInterface $container
     * @param  string $requestedName
     * @param  null|array $options
     * @return object
     * @throws ServiceNotFoundException if unable to resolve the service.
     * @throws ServiceNotCreatedException if an exception is raised when creating a service.
     * @throws ContainerException if any other error occurs
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $client = new Google_Client();
        $client->setApplicationName("Client_Library_Examples");
        $client->setDeveloperKey("YOUR_APP_KEY");
        $client->setAuthConfig('/path/to/client_credentials.json');

        $client->addScope(Google_Service_Analytics::ANALYTICS_READONLY);
        $client->addScope(Google_Service_Drive::DRIVE);
        $client->addScope('profile');
        $client->addScope('https://www.googleapis.com/auth/contacts.readonly');

        $redirect_uri = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
        $client->setRedirectUri($redirect_uri);

        if (isset($_GET['code'])) {
            $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
            $client->setAccessToken($token);
        }

        return new GoogleService($client);
    }
}
