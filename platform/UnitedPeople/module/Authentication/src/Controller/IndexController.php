<?php

namespace Authentication\Controller;

use Exception;
use Hybrid_Auth;
use Hybrid_Endpoint;
use Zend\Mvc\Controller\AbstractActionController;

/**
 * Class IndexController
 *
 * PHP Version 5
 *
 * @category  PHP
 * @package   Authentication\Controller
 * @author    Simplicity Trade GmbH <it@simplicity.ag>
 * @copyright 2014-2016 Simplicity Trade GmbH
 * @license   Proprietary http://www.simplicity.ag
 */
class IndexController extends AbstractActionController
{
    public function indexAction()
    {
        $authenticationConfig = Hybrid_Auth::$config;
        $providers = $authenticationConfig['providers'];

        $providers = array_map(function ($providerId, $provider) {
            $provider['id'] = $providerId;

            if ($provider['enabled']) {
                $provider['isLoggedIn'] = Hybrid_Auth::isConnectedWith($providerId);
            } else {
                $provider['isLoggedIn'] = false;
            }

            return $provider;
        }, array_keys($providers), array_values($providers));


        return [
            'providers' => $providers,
        ];
    }


    public function processAction()
    {
        try {
            Hybrid_Endpoint::process();
        } catch (Exception $e) {
        }
    }
}
