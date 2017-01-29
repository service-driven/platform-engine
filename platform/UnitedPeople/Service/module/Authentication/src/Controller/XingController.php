<?php

namespace Authentication\Controller;

use Authentication\Service\AuthenticationService;
use Hybrid_Providers_XING;
use XingUserPicureSize;

/**
 * Class XingController
 *
 * PHP Version 5
 *
 * @category  PHP
 * @package   Authentication\Controller
 * @author    Simplicity Trade GmbH <it@simplicity.ag>
 * @copyright 2014-2016 Simplicity Trade GmbH
 * @license   Proprietary http://www.simplicity.ag
 */
class XingController extends AuthenticationController
{

    public function indexAction()
    {
        $isConnected = AuthenticationService::isConnectedWith($this->providerId);

        if ($isConnected) {
            /* @var $provider Hybrid_Providers_XING */
            $provider = AuthenticationService::authenticate($this->providerId);

            return [
                'isLoggedIn' => $isConnected,
                'profile' => $provider->getUserProfile(),
                'me' => [
                    'contacts' => $provider->getUserContacts(XingUserPicureSize::SIZE_64X64),
                    'groups' => $provider->getUserGroups(),
                    'birthdays' => $provider->getUpcomingBirthdays(),
                    'profile' => [
                        'messages' => $provider->getUserProfileMessage(),
                        'visits' => $provider->getUserProfileVisits(),
                    ],
//                'companies' => $provider->getUserCompanies(100, 0, 100),
                ],
                'recommendations' => [
//                'jobs' => $provider->getUserJobRecommendations(),
                    'events' => $provider->getUserEventRecommendations(),
                    'users' => $provider->getUserNetworkRecommendations(),
                    'companies' => $provider->getUserCompanyRecommendations(),
                ],
            ];
        }

        return [
            'isLoggedIn' => $isConnected,
        ];
    }
}
