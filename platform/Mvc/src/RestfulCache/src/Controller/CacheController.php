<?php

namespace OpenArchitecture\RestfulCache\Controller;

use OpenArchitecture\Cache\Client\RedisClient;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\JsonModel;

/**
 * Class CacheController
 *
 * PHP Version 5
 *
 * @category  PHP
 * @package   OpenArchitecture\RestfulCache\Controller
 * @author    Simplicity Trade GmbH <it@simplicity.ag>
 * @copyright 2014-2016 Simplicity Trade GmbH
 * @license   Proprietary http://www.simplicity.ag
 */
class CacheController extends AbstractActionController
{
    /** @var RedisClient */
    protected $redisClient;

    /** @var array */
    protected $redisConfig;

    /**
     * @return array
     */
    protected function getRedisInfo()
    {
        $data = array();
        $availableOptions = array(
            "COMMANDSTATS",
            "SERVER",
            "CLIENTS",
            "MEMORY",
            "PERSISTENCE",
            "STATS",
            "REPLICATION",
            "CPU",
            "CLASTER",
            "KEYSPACE",
            "COMANDSTATS",
        );
        $option = $this->params()->fromRoute('option');

        if ($option && in_array(strtoupper($option), $availableOptions)) {
            $data = $this->redisClient->info($option);
        } else {
            foreach ($availableOptions as $availableOption) {
                $data[strtolower($availableOption)] = $this->redisClient->info($availableOption);
            }
        }

        return $data;
    }

    /**
     * @return array
     */
    protected function getSlowLog()
    {
        $rawItems = $this->redisClient->slowlog('get');

        return array_map(
            function ($rawItem) {
                return array(
                    'identifier' => $rawItem[0],
                    'timestamp'  => $rawItem[1],
                    'execution'  => $rawItem[2],
                    'arguments'  => $rawItem[3],
                );
            },
            $rawItems
        );
    }

    /**
     * CacheController constructor.
     *
     * @param RedisClient $redisClient Redis client.
     * @param array       $redisConfig Redis config.
     */
    public function __construct(RedisClient $redisClient, array $redisConfig)
    {
        $this->redisClient = $redisClient;
        $this->redisConfig = $redisConfig;
    }

    /**
     * @return JsonModel
     */
    public function debugAction()
    {
        $config = $this->redisClient->config("GET", "*max-*-entries*");
//        $config = $this->redisConfig;
        $clients = $this->redisClient->client('list');
        $dbSize = $this->redisClient->dbSize();

        return new JsonModel(
            array(
                'config'  => $config,
                'clients' => $clients,
                'dbSize'  => $dbSize,
                'slowLog' => $this->getSlowLog(),
                'info'    => $this->getRedisInfo(),
            )
        );
    }

    /**
     * @return JsonModel
     */
    public function indexAction()
    {
        return new JsonModel(array());
    }
}