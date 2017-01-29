<?php

namespace OpenArchitecture\RestfulMvc\Controller;

use Zend\Http\PhpEnvironment\Request;
use Zend\Http\PhpEnvironment\Response;
use Zend\Mvc\Application;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\Mvc\MvcEvent;
use Zend\Stdlib\CallbackHandler;
use Zend\View\Model\JsonModel;

/**
 * Class ApplicationController
 *
 * PHP Version 5
 *
 * @category  PHP
 * @package   OpenArchitecture\RestfulMvc\Controller
 * @author    Simplicity Trade GmbH <it@simplicity.ag>
 * @copyright 2014-2016 Simplicity Trade GmbH
 * @license   Proprietary http://www.simplicity.ag
 */
class ApplicationController extends AbstractActionController
{
    /** @var Application */
    protected $application;

    /**
     * ApplicationController constructor.
     *
     * @param Application $application The application.
     */
    public function __construct(Application $application)
    {
        $this->application = $application;
    }

    /**
     * @return JsonModel
     */
    public function indexAction()
    {
        return new JsonModel(
            array()
        );
    }

    /**
     * @return JsonModel
     */
    public function configAction()
    {
        return new JsonModel($this->application->getConfig());
    }

    /**
     * @return JsonModel
     */
//    public function requestAction()
//    {
//        /** @var Request $request */
//        $request = $this->application->getRequest();
//
//        return new JsonModel(
//            array(
//                'content'    => $request->getContent(),
//                'requestUri' => $request->getRequestUri(),
//                'baseUrl'    => $request->getBaseUrl(),
//                'basePath'   => $request->getBasePath(),
//                'env'        => $request->getEnv(),
//            )
//        );
//    }

    /**
     * @return JsonModel
     */
    public function serverAction()
    {
        /** @var Request $request */
        $request = $this->application->getRequest();

        return new JsonModel($request->getServer());
    }

    /**
     * @return JsonModel
     */
//    public function responseAction()
//    {
//        /** @var Response $response */
//        $response = $this->application->getResponse();
//
//        return new JsonModel($response);
//    }

    /**
     * @return JsonModel
     */
//    public function mvcEventAction()
//    {
//        /** @var MvcEvent $mvcEvent */
//        $mvcEvent = $this->application->getMvcEvent();
//
//        return new JsonModel($mvcEvent);
//    }

    /**
     * @return JsonModel
     */
    public function eventManagerAction()
    {
        $eventManager = $this->application->getEventManager();
        $sharedManager = $eventManager->getSharedManager();

        $keys = array(
            'Zend\Mvc\Application',
            'LandingPage',
            'Zend\Stdlib\DispatchableInterface',
            'Opus\Table\Table',
            'Opus\Controller\TableCacheController',
            '*',
            'Customer\Service\Authentication',
            'profiler',
        );
        $values = array_map(
            function ($identifier) use ($sharedManager) {
                $events = array_map(
                    function ($eventName) use ($identifier, $sharedManager) {
                        $listeners = $sharedManager->getListeners($identifier, $eventName);

                        $eventListeners = array_map(
                            function (CallbackHandler $listener) {
                                $listenerMetadata = $listener->getMetadata();
                                $listenerCallback = $listener->getCallback();

                                if (is_array($listenerCallback)) {
                                    $listenerCallback = array(
                                        'class'  => get_class($listenerCallback[0]),
                                        'method' => $listenerCallback[1],
                                    );
                                }

                                return array(
                                    'metadata' => $listenerMetadata,
                                    'callback' => $listenerCallback,
                                );
                            },
                            $listeners->toArray()
                        );

                        return array(
                            'name'      => $eventName,
                            'listeners' => $eventListeners,
                        );
                    },
                    $sharedManager->getEvents($identifier)
                );

                return array(
                    'events' => $events,
                );
            }, $keys
        );

        $identifiers = array_combine($keys, $values);

        return new JsonModel(
            array(
                'events' => $identifiers,
            )
        );
    }
}