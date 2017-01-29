<?php

namespace OpenArchitecture\RestfulCache\RestController;

use OpenArchitecture\Cache\Client\RedisClient;
use Zend\Mvc\Controller\AbstractRestfulController;
use Zend\View\Model\JsonModel;

/**
 * Class ItemRestController
 *
 * PHP Version 5
 *
 * @category  PHP
 * @package   OpenArchitecture\RestfulCache\RestController
 * @author    Simplicity Trade GmbH <it@simplicity.ag>
 * @copyright 2014-2016 Simplicity Trade GmbH
 * @license   Proprietary http://www.simplicity.ag
 */
class ItemRestController extends AbstractRestfulController
{
    /** @var string */
    protected $identifierName = 'item_id';

    /** @var RedisClient */
    protected $redisClient;

    /** @var array */
    protected $redisConfig;

    /**
     * @param integer $key The item id.
     *
     * @return JsonModel
     */
    public function get($key)
    {
        $keys = $this->redisClient->keys('*');
        $values = $this->redisClient->getMultiple($keys);
        $items = array_combine($keys, $values);

        if (!in_array($key, $keys)) {
            $this->response->setStatusCode(404);

            return new JsonModel(
                array(
                    "content" => "key not found",
                )
            );
        }

        $value = $this->prepareValue($items[$key]);

        return new JsonModel(
            array(
                "data" => $value,
            )
        );
    }

    /**
     * @return JsonModel
     */
    public function getList()
    {
        $keys = $this->redisClient->keys('*');
        $values = $this->prepareValues($this->redisClient->getMultiple($keys));
        $items = array_combine($keys, $values);

        return new JsonModel(
            array(
                "count" => count($items),
                "data"  => $items,
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

    /**
     * Create a new resource
     *
     * @param  mixed $data
     * @return mixed
     */
    public function create($data)
    {
        $this->redisClient->set($data['key'], $data['value'], $data['timeout']);

        return array(
        );
    }

    /**
     * Delete an existing resource
     *
     * @param  mixed $id
     * @return mixed
     */
    public function delete($id)
    {
        $this->response->setStatusCode(405);

        return array(
            'content' => 'Method Not Allowed'
        );
    }

    /**
     * Delete the entire resource collection
     *
     * Not marked as abstract, as that would introduce a BC break
     * (introduced in 2.1.0); instead, raises an exception if not implemented.
     *
     * @return mixed
     */
    public function deleteList($data)
    {
//        $this->redisClient->flushDB();
//        $this->redisClient->flushAll();
//        $this->redisClient->del(array());
//        $this->redisClient->delete(array());

        return array(
            'content' => 'Method Not Allowed'
        );
    }

    /**
     * <Description, starting with capital letter>
     *
     *
     * @param $value
     *
     * @return bool
     */
    protected function isSerialized($value)
    {
        return $value == @serialize(false) || @unserialize($value) !== false;
    }

    /**
     * <Description, starting with capital letter>
     *
     *
     * @param $value
     *
     * @return mixed
     */
    protected function prepareValue($value)
    {
//        if ($this->isSerialized($value)) {
//            $value = unserialize($value);
//        }

        return $value;
    }

    /**
     * <Description, starting with capital letter>
     *
     *
     * @param array $values
     *
     * @return array
     */
    protected function prepareValues(array $values)
    {
        return array_map(array($this, 'prepareValue'), $values);
    }
}