<?php

namespace Networking\Importer;

use Application\ServiceManager\Plugin\ImporterInterface;
use Authentication\Service\AuthenticationService;
use Hybrid_Providers_XING;

/**
 * Class XingContactImporter
 *
 * PHP Version 5
 *
 * @category  PHP
 * @package   Networking\Importer
 * @author    Simplicity Trade GmbH <it@simplicity.ag>
 * @copyright 2014-2016 Simplicity Trade GmbH
 * @license   Proprietary http://www.simplicity.ag
 */
class XingImporter implements ImporterInterface
{
    /** @var string */
    protected $providerId;
    /** @var AuthenticationService  */
    protected $authenticationService;

    /**
     * XingContactImporter constructor.
     * @param AuthenticationService $authenticationService
     */
    public function __construct(AuthenticationService $authenticationService)
    {
        $this->authenticationService = $authenticationService;
        $this->providerId = 'XING';
    }

    public function import()
    {
        if (AuthenticationService::isConnectedWith($this->providerId)) {
            AuthenticationService::authenticate($this->providerId, ['hauth_return_to' => '/networking/importers']);
        }

        /** @var Hybrid_Providers_XING $provider */
        $provider = AuthenticationService::authenticate($this->providerId);
        $profile = $provider->getUserProfile();
        $contacts = $provider->getUserContacts();

        var_dump($contacts);

        return array();
    }
}
