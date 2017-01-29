<?php

namespace OpenArchitecture\RestfulMvc\RestController;

use Zend\Http\PhpEnvironment\Request as HttpRequest;
use Zend\Http\PhpEnvironment\Response;
use Zend\Mvc\Controller\AbstractRestfulController;
use Zend\Mvc\Service\ServiceManagerConfig;
use Zend\ServiceManager\ServiceManager;
use Zend\View\Model\JsonModel;

/**
 * Class ApplicationRestController
 *
 * PHP Version 5
 *
 * @category  PHP
 * @package   OpenArchitecture\RestfulMvc\RestController
 * @author    Simplicity Trade GmbH <it@simplicity.ag>
 * @copyright 2014-2016 Simplicity Trade GmbH
 * @license   Proprietary http://www.simplicity.ag
 */
class ApplicationRestController extends AbstractRestfulController
{
    /** @var string */
    protected $identifierName = 'application_id';

    /**
     * NodeController constructor.
     */
    public function __construct()
    {
    }

    /**
     * Create a new resource
     *
     * @param array $applicationConfig
     *
     * @return mixed
     */
    public function create(array $applicationConfig)
    {
        $applicationDefaultConfig = array(
            'modules' => array(),
            'module_listener_options' => array(),
        );

        $configuration = array_merge($applicationDefaultConfig, $applicationConfig);

        $serviceManagerConfig = isset($configuration['service_manager']) ? $configuration['service_manager'] : array();
        $serviceManager = new ServiceManager(new ServiceManagerConfig($serviceManagerConfig));
        $serviceManager->setService('ApplicationConfig', $configuration);
        $serviceManager->setFactory(
            'Request',
            function () {
                $request = new HttpRequest();
                $request->setRequestUri('/de_de/opus/sale');

                return $request;
            }
        );
        $serviceManager->get('ModuleManager')->loadModules();

        $listenersFromAppConfig = isset($configuration['listeners']) ? $configuration['listeners'] : array();
        $config = $serviceManager->get('Config');
        $listenersFromConfigService = isset($config['listeners']) ? $config['listeners'] : array();

        $listeners = array_unique(array_merge($listenersFromConfigService, $listenersFromAppConfig));

        $serviceManager->get('Application')->bootstrap($listeners)->run();


        /** @var Response $response */
        $response = $this->response;
        $response->setStatusCode(202);
        $response->getHeaders()->addHeaderLine('Location', '/rest/api/mvc/application-queue/123123');

        // /rest/api/mvc/application-queue/123123
        $status = array(
            array(
                'status' => 'pending',
                'eta' => '10 minutes',
                'link' => array(
                    'cancel' => 'DELETE /rest/api/mvc/application-queue/123123',
                ),
            ),

            array(
                'status' => 'In progress',
                'eta' => '3 minutes, 25 seconds',
                'link' => array(
                    'cancel' => 'DELETE /rest/api/mvc/application-queue/123123',
                ),
            ),

            array(
                'header' => 'HTTP 1.1 303 Set other',
                'location' => '/blog/20010101-myblogarticle',
            ),
        );


        return $response;
    }

    /**
     * Return list of resources
     *
     * @return mixed
     */
    public function getList()
    {
        return new JsonModel(
            array(
                'content' => 'yo',
            )
        );
    }
}