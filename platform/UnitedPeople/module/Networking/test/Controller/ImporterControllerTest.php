<?php

namespace NetworkingTest\Controller;

use Networking\Controller\ClusterController;
use Zend\Test\PHPUnit\Controller\AbstractHttpControllerTestCase;

/**
 * Class ImporterControllerTest
 *
 * PHP Version 5
 *
 * @category  PHP
 * @package   NetworkingTest\Controller
 * @author    Simplicity Trade GmbH <it@simplicity.ag>
 * @copyright 2014-2016 Simplicity Trade GmbH
 * @license   Proprietary http://www.simplicity.ag
 */
class ImporterControllerTest extends AbstractHttpControllerTestCase
{
    protected $traceError = false;

    public function setUp()
    {
        $applicationConfig = include __DIR__ . '/../../../../config/application.config.php';
        $this->setApplicationConfig($applicationConfig);

        parent::setUp();
    }

    public function testIndexActionCanBeAccessed()
    {
        $this->dispatch('/networking/clusters');
        $this->assertResponseStatusCode(200);
        $this->assertModuleName('Networking');
        $this->assertControllerName(ClusterController::class);
        $this->assertControllerClass('ClusterController');
        $this->assertMatchedRouteName('clusters');
    }
}
