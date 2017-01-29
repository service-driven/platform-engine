<?php

namespace Simplicity\AwsPlatform\Controller;

use Aws\ElastiCache\ElastiCacheClient;
use Simplicity\AwsPlatform\Service\ElastiCacheService;
use Zend\Mvc\Controller\AbstractConsoleController;

/**
 * Class CacheController
 *
 * PHP Version 5
 *
 * @category  PHP
 * @package   Simplicity\AwsPlatform\Controller
 * @author    Simplicity Trade GmbH <development@simplicity.ag>
 * @copyright 2014-2016 Simplicity Trade GmbH
 * @license   Proprietary http://www.simplicity.ag
 */
class CacheController extends AbstractConsoleController
{
    /** @var  ElastiCacheService */
    protected $elastiCacheService;

    /**
     * CacheController constructor.
     *
     * @param ElastiCacheService $elastiCacheService The aws elasti cache client.
     */
    public function __construct(ElastiCacheService $elastiCacheService)
    {
        $this->elastiCacheService = $elastiCacheService;
    }

    /**
     * @return void
     */
    public function indexAction()
    {
        $filePath = __DIR__ . '/../../data/rest/api/elasticache/cache-clusters.json';
        $cacheClusters = json_decode(file_get_contents($filePath));

        var_dump($cacheClusters);
    }
}

