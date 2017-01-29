<?php

namespace Networking\Service;

use Google_Client;
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
class GooglePeopleServiceFactory implements FactoryInterface
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

        $redirect_uri = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
        $client->setRedirectUri($redirect_uri);

        if (isset($_GET['oauth'])) {
            $authUrl = $client->createAuthUrl();
            header('Location: ' . filter_var($authUrl, FILTER_SANITIZE_URL));
        } else if (isset($_GET['code'])) {
            $client->authenticate($_GET['code']);
            $_SESSION['access_token'] = $client->getAccessToken();
            $redirect_uri = 'http://' . $_SERVER['HTTP_HOST'] . '/';

            header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));
        } else if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
            $client->setAccessToken($_SESSION['access_token']);
        } else {
            $redirect_uri = 'http://' . $_SERVER['HTTP_HOST'] . '/?oauth';
            header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));
        }

        $peopleService = new Google_Service_People($client);

        return new GooglePeopleService($peopleService);
    }
}
