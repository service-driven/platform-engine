<?php

namespace Simplicity\AwsPlatform\Service;

use Aws\ElastiCache\ElastiCacheClient;
use Aws\Sdk;

/**
 * Class ElastiCacheService
 *
 * PHP Version 5
 *
 * @category  PHP
 * @package   Simplicity\AwsPlatform\Service
 * @author    Simplicity Trade GmbH <development@simplicity.ag>
 * @copyright 2014-2016 Simplicity Trade GmbH
 * @license   Proprietary http://www.simplicity.ag
 */
class ElastiCacheService
{
    /** @var Sdk */
    protected $awsService;

    /** @var array */
    protected $awsConfig = array();

    /** @var ElastiCacheClient */
    protected $elastiCacheClient;

    /**
     * S3Service constructor.
     *
     * @param Sdk   $awsService The aws sdk service.
     * @param array $awsConfig  The aws config.
     */
    public function __construct(Sdk $awsService, array $awsConfig)
    {
        $this->awsService = $awsService;
        $this->awsConfig = $awsConfig;

        $config = array(
            'profile' => 'default',
            'region'  => 'eu-central-1',
            'debug'   => true,
        );
        $this->elastiCacheClient = $this->awsService->createElastiCache($config);
    }

    public function dump()
    {
        $cacheClusters = $this->elastiCacheClient->describeCacheClusters();

        $data = array();

        return $data;
    }
}