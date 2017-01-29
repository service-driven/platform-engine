<?php

namespace OpenArchitecture\RestfulMvcTest\RestController;

use Zend\Mvc\Router\SimpleRouteStack;
use Zend\Test\PHPUnit\Controller\AbstractHttpControllerTestCase;

/**
 * Class RestControllerTest
 *
 * PHP Version 5
 *
 * @category  PHP
 * @package   OpenArchitecture\RestfulMvc\RestController
 * @author    Simplicity Trade GmbH <it@simplicity.ag>
 * @copyright 2014-2016 Simplicity Trade GmbH
 * @license   Proprietary http://www.simplicity.ag
 */
class ApplicationRestControllerTest extends AbstractHttpControllerTestCase
{
    /**
     * @return void
     */
    public function setUp()
    {
        foreach ($_ENV as $key => $value) {
            define($key, $value);
        }

        $applicationConfig = include APPLICATION_CONFIG;
        $this->setApplicationConfig($applicationConfig);

        parent::setUp();
    }

    /**
     * @return void
     */
    public function testCreate()
    {
        $applicationData = array(
            'modules'         => array(
                'Salesfloor',
            ),
            'service_manager' => array(
            ),
        );
        $this->dispatch('/rest/api/mvc/applications', 'POST', $applicationData);
        $this->assertResponseStatusCode(200);
    }
}