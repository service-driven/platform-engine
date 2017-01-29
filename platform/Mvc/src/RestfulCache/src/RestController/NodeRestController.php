<?php

namespace OpenArchitecture\RestfulCache\RestController;

use OpenArchitecture\Cache\Client\RedisClient;
use Zend\Mvc\Controller\AbstractRestfulController;
use Zend\View\Model\JsonModel;

/**
 * Class NodeRestController
 *
 * PHP Version 5
 *
 * @category  PHP
 * @package   OpenArchitecture\RestfulCache\RestController
 * @author    Simplicity Trade GmbH <it@simplicity.ag>
 * @copyright 2014-2016 Simplicity Trade GmbH
 * @license   Proprietary http://www.simplicity.ag
 */
class NodeRestController extends AbstractRestfulController
{
    /** @var string */
    protected $identifierName = 'node_id';

    /** @var RedisClient */
    protected $redisClient;

    /** @var array */
    protected $redisConfig;

    /**
     * @return JsonModel
     */
    public function getList()
    {
        return new JsonModel(
            array(
                "data" => $this->redisConfig,
            )
        );
    }

    /**
     * @param string $key The node id.
     *
     * @return JsonModel
     */
    public function get($key)
    {
        return new JsonModel(
            array(
                "data" => array_key_exists($key, $this->redisConfig) ? $this->redisConfig[$key] : array(),
            )
        );
    }

    /**
     * NodeController constructor.
     *
     * @param RedisClient $redisClient Redis client.
     * @param array       $redisConfig Redis config.
     */
    public function __construct(RedisClient $redisClient, array $redisConfig)
    {
        $this->redisClient = $redisClient;
        $this->redisConfig = $redisConfig;
    }

}