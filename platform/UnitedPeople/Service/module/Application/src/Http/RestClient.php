<?php

namespace Application\Http;

use Application\Exception\AccessException;
use Application\Exception\ClientException;
use Application\Exception\ResourceException;
use Application\Exception\ResponseException;
use Application\Exception\ServerException;
use Zend\EventManager\EventManagerAwareInterface;
use Zend\EventManager\EventManagerInterface;
use Zend\Http\Client;
use Zend\Http\Client as HttpClient;
use Zend\Http\Request;
use Zend\Http\Response as HttpResponse;
use Zend\Http\Response;

/**
 * Class RestClient
 *
 * PHP Version 5
 *
 * @category  PHP
 * @package   Application\Http
 * @author    Simplicity Trade GmbH <it@simplicity.ag>
 * @copyright 2014-2016 Simplicity Trade GmbH
 * @license   Proprietary http://www.simplicity.ag
 */
class RestClient implements EventManagerAwareInterface
{
    /** @var array */
    protected $config;
    /** @var Client */
    protected $client;

    /**
     * RestClient constructor.
     *
     * @param HttpClient $client
     * @param array $config
     */
    public function __construct(HttpClient $client, array $config = array())
    {
        $this->client = $client;
        $this->config = $config;
    }

    /**
     * Send GET request
     *
     * @param string $url API stub URL
     * @param array $params Request params
     *
     * @return Response
     */
    public function get($url, array $params = array())
    {
        return $this->send(Request::METHOD_GET, $url, $params);
    }

    /**
     * Send POST request
     *
     * @param string $url API stub URL
     * @param array $params Request params
     * @param array $data Request payload (data)
     *
     * @return Response
     */
    public function post($url, array $params = array(), array $data = array())
    {
        return $this->send(Request::METHOD_POST, $url, $params, $data);
    }

    /**
     * Send PUT request
     *
     * @param string $url API stub URL
     * @param array $params Request params
     * @param array $data Request payload (data)
     *
     * @return Response
     */
    public function put($url, array $params = array(), array $data = array())
    {
        return $this->send(Request::METHOD_PUT, $url, $params, $data);
    }

    /**
     * Send PATCH request
     *
     * @param string $url API stub URL
     * @param array $params Request params
     * @param array $data Request payload (data)
     *
     * @return Response
     */
    public function patch($url, array $params = array(), array $data = array())
    {
        return $this->send(Request::METHOD_PATCH, $url, $params, $data);
    }

    /**
     * Send DELETE request
     *
     * @param string $url API stub URL
     * @param array $params Request params
     *
     * @return Response
     */
    public function delete($url, array $params = array())
    {
        return $this->send(Request::METHOD_DELETE, $url, $params);
    }

    /**
     * @param $method
     * @param $url
     * @param array $params
     * @param array $data
     *
     * @return Response
     *
     * @throws AccessException
     * @throws ClientException
     * @throws ResourceException
     * @throws ResponseException
     * @throws ServerException
     */
    public function send($method, $url, array $params = array(), array $data = array())
    {
        $this->client
            ->resetParameters()
            ->setMethod($method)
            ->setUri($this->config['base_url'] . $url);

        switch ($method) {
            case Request::METHOD_POST:
            case Request::METHOD_PATCH:
                $this->client
                    ->setEncType('application/json')
                    ->setRawBody(json_encode($data));
                break;
            case Request::METHOD_GET:
                $this->client
                    ->setParameterGet($params);
                break;
        }


        $this->getEventManager()->trigger('send.pre', $this);

        $this->client->getRequest()->getHeaders()->addHeaderLine('Accept', 'application/json');
        $response = $this->client->send();

        $this->getEventManager()->trigger('send.post', $this);


        // Access Forbidden
        if ($response->isForbidden()) {
            throw new AccessException(
                $response->getStatusCode(),
                $this->getApiProblemFromResponse($response)
            );
        } // Not Found
        elseif ($response->isNotFound()) {
            throw new ResourceException(
                $response->getStatusCode(),
                $this->getApiProblemFromResponse($response)
            );
        } // Client Error
        elseif ($response->isClientError()) {
            throw new ClientException(
                $response->getStatusCode(),
                $this->getApiProblemFromResponse($response)
            );
        } // Server Error
        elseif ($response->isServerError()) {
            throw new ServerException(
                $response->getStatusCode(),
                $this->getApiProblemFromResponse($response)
            );
        } // Created
        elseif ($response->getStatusCode() === 201) {
            // Check for "Location" header
            if ($response->getHeaders()->has('Location') === false) {
                throw new ResponseException(500, 'Response from server missing "Location" header');
            }
        }

        return $response;

        if ($response->getHeaders()->get('ContentType')->match(array(
            'application/*+json',
            'application/json',
        ))
        ) {
            return json_decode($response->getBody());
        } else {
            return $response->getBody();
        }
    }

    /**
     * Inject an EventManager instance
     *
     * @param  EventManagerInterface $eventManager
     * @return void
     */
    public function setEventManager(EventManagerInterface $eventManager)
    {
        // TODO: Implement setEventManager() method.
    }

    /**
     * Retrieve the event manager
     *
     * Lazy-loads an EventManager instance if none registered.
     *
     * @return EventManagerInterface
     */
    public function getEventManager()
    {
        // TODO: Implement getEventManager() method.
    }

    /**
     * @param HttpResponse $response
     *
     * @return mixed|object
     */
    protected function getApiProblemFromResponse(HttpResponse $response)
    {
        if ($response->getHeaders()->get('ContentType')->match('application/problem+json')) {
            return json_decode($response->getBody());
        }
        else {
            return (object)[
                'title'  => $response->getReasonPhrase(),
                'detail' => $response->getBody(),
            ];
        }
    }
}
