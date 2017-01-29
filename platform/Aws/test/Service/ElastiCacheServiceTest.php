<?php

namespace Simplicity\AwsPlatformTest\Service;

use Aws\ElastiCache\ElastiCacheClient;
use Aws\Sdk;
use PHPUnit_Framework_MockObject_MockObject;
use Simplicity\AwsPlatform\Service\ElastiCacheService;
use Test\TestCase\TestCase;

/**
 * Class ElastiCacheServiceTest
 *
 * PHP Version 5
 *
 * @category  PHP
 * @package   Simplicity\AwsPlatformTest\Service
 * @author    Simplicity Trade GmbH <it@simplicity.ag>
 * @copyright 2014-2016 Simplicity Trade GmbH
 * @license   Proprietary http://www.simplicity.ag
 */
class ElastiCacheServiceTest extends TestCase
{
    /** @var ElastiCacheService */
    protected $elastiCacheService;

    /** @var ElastiCacheClient|PHPUnit_Framework_MockObject_MockObject */
    protected $elastiCacheClient;

    /** @var  Sdk|PHPUnit_Framework_MockObject_MockObject */
    protected $awsService;

    /** @var  array */
    protected $awsConfig;

    public function setUp()
    {
        $this->elastiCacheClient = $this->getMock(ElastiCacheClient::class);

        $this->awsService = $this->getMock(Sdk::class);
        $this->awsService->method('createElastiCache')->willReturn($this->elastiCacheClient);

        $this->awsConfig = $awsConfig = array();

        $this->elastiCacheService = new ElastiCacheService($this->awsService, $awsConfig);
    }

    public function test()
    {
        $this->elastiCacheClient->method('describeCacheClusters')->willReturn();

        $this->elastiCacheService->dump();
    }
}