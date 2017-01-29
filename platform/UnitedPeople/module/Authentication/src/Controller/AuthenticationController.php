<?php

namespace Authentication\Controller;

use Hybrid_Auth;
use Zend\Mvc\Controller\AbstractActionController;

/**
 * Class AuthenticationController
 *
 * PHP Version 5
 *
 * @category  PHP
 * @package   Authentication\Controller
 * @author    Simplicity Trade GmbH <it@simplicity.ag>
 * @copyright 2014-2016 Simplicity Trade GmbH
 * @license   Proprietary http://www.simplicity.ag
 */
class AuthenticationController extends AbstractActionController
{
    /** @var string */
    protected $providerId;

    /** @var Hybrid_Auth */
    protected $hybridAuth;

    /**
     * IndexController constructor.
     * @param Hybrid_Auth $hybridAuth
     * @param string $providerId
     */
    public function __construct(Hybrid_Auth $hybridAuth, $providerId)
    {
        $this->hybridAuth = $hybridAuth;
        $this->providerId = $providerId;
    }

    /**
     * @return array
     */
    public function indexAction()
    {
        return [
            'isLoggedIn' => Hybrid_Auth::isConnectedWith($this->providerId),
        ];
    }

    /**
     * @return void
     */
    public function loginAction()
    {
        Hybrid_Auth::authenticate($this->providerId, ['hauth_return_to' => '/auth']);
    }

    /**
     * @return \Zend\Http\Response
     */
    public function logoutAction()
    {
        session_destroy();
        Hybrid_Auth::logoutAllProviders();

        return $this->redirect()->toRoute('auth');
    }
}
