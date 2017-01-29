<?php

namespace Application\Service;

use Application\Http\RestClient;
use Exception;
use InvalidArgumentException;
use UnexpectedValueException;
use Zend\Db\ResultSet\ResultSetInterface;
use Zend\Http\Response;

/**
 * Class RestService
 *
 * PHP Version 5
 *
 * @category  PHP
 * @package   Application\Service
 * @author    Simplicity Trade GmbH <it@simplicity.ag>
 * @copyright 2014-2016 Simplicity Trade GmbH
 * @license   Proprietary http://www.simplicity.ag
 */
class RestService
{
    /** @var string */
    protected $slug;
    /** @var RestClient */
    protected $client;
    /** @var ResultSetInterface */
    protected $objectPrototype;

    /**
     * RestGateway constructor.
     *
     * @param $slug
     * @param RestClient $client
     * @param ResultSetInterface $objectPrototype
     */
    public function __construct($slug, RestClient $client, ResultSetInterface $objectPrototype = null)
    {
        $this->slug = $slug;
        $this->client = $client;
        $this->objectPrototype = $objectPrototype;
    }

    /**
     * Create resource
     *
     * @param array $data Key => value array of data
     *
     * @return integer New resource ID
     * @throws Exception
     */
    public function create(array $data)
    {
        $response = $this->client->post($this->slug, array(), $data);

        if ($response->getStatusCode() !== 201) {
            throw new UnexpectedValueException('Unable to CREATE resource');
        }

        $location_split = explode('/', $response->getHeaders()->get('Location')->getUri());
        $id = array_pop($location_split);

        if (empty($id)) {
            throw new Exception('Unable to extract entity identifier from Location header in API response');
        }

        return $id;
    }

    /**
     * Fetch resource by ID
     *
     * @param integer $id Resource ID
     *
     * @return object Hydrated entity with reference back to gateway
     */
    public function fetch($id)
    {
        if (empty($id)) {
            throw new InvalidArgumentException('ID must not be empty');
        }

        $response = $this->client->get($this->slug . '/' . $id);

        if ($response->isOk() === false) {
            throw new UnexpectedValueException('Unable to GET resource');
        }

        $result = $response->getBody();
        if ($result) {
            $resultSet = clone $this->objectPrototype;
            $resultSet->initialize($result);

            return $resultSet;
        }

        return false;
    }

    /**
     * Fetch all resources
     *
     * @param array $params Params to fetch by
     *
     * @return array Hydrated entities
     */
    public function fetchAll(array $params = array())
    {
        $response = $this->client->get($this->slug, $params);

        if ($response->isOk() === false) {
            throw new UnexpectedValueException('Unable to GET resource');
        }
        // If HAL response
        if ($response->getHeaders()->get('ContentType')->match('application/hal+json')) {
            /**
             * @todo HAL response is not just simple array of objects, to be converted into array of "Entities"...
             * HAL response includes links, pagination, etc, so need a "Collection" that can handle this.
             */

        } else {
            $resultSet = clone $this->objectPrototype;

            $result = $response->getBody();
            $resultSet->initialize($result);

            return $resultSet;
        }
    }

    /**
     * Replace (put) a resource
     *
     * @param int $id Resource ID
     * @param array $data Key => value array of data
     *
     * @return boolean
     * @throws Exception
     */
    public function replace($id, array $data)
    {
        throw new Exception('Not yet implemented');
    }

    /**
     * Replace (put) a collection
     *
     * @param array $data Key => value array of data
     *
     * @return boolean
     * @throws Exception
     */
    public function replaceAll(array $data)
    {
        throw new Exception('Not yet implemented');
    }

    /**
     * Update (patch) a resource
     *
     * @param int $id Resource ID
     * @param array $data Key => value array of data
     * @param array $params
     *
     * @return Response
     */
    public function update($id, array $data, array $params = array())
    {
        $response = $this->client->patch($this->slug . '/' . $id, $params, $data);

        return $response;
    }

    /**
     * Update (patch) a collection
     *
     * @param array $data Key => value array of data
     * @param array $params Key => value array of conditions
     *
     * @return Response
     */
    public function updateAll(array $data, array $params = array())
    {
        $response = $this->client->patch($this->slug, $params, $data);

        return $response;
    }
}
