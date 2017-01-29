<?php

namespace OpenArchitecture\RestfulMvc\RestController;

use Zend\Mvc\Controller\AbstractRestfulController;
use Zend\View\Model\JsonModel;

/**
 * Class EventSubscriberRestController
 *
 * PHP Version 5
 *
 * @category  PHP
 * @package   OpenArchitecture\RestfulMvc\RestController
 * @author    Simplicity Trade GmbH <it@simplicity.ag>
 * @copyright 2014-2016 Simplicity Trade GmbH
 * @license   Proprietary http://www.simplicity.ag
 */
class EventSubscriberRestController extends AbstractRestfulController
{
    /** @var string */
    protected $identifierName = 'subscriber_id';
    /** @var array */
    protected $items = array();

    /**
     * EventRestController constructor.
     */
    public function __construct()
    {
        $this->items = array(
            array(
                "name" => "first",
                "url" => "http://mysterious-brook-1807.herokuapp.com/ironmq_push_2",
                "headers" => array(
                    "Content-Type" => "application/json"
                )
            ),
            array(
                "name" => "webhook",
                "url" => "http://this.host.is/not/exist",
            ),
        );
    }

    /**
     * Return list of resources
     *
     * @return mixed
     */
    public function get($id)
    {
        return new JsonModel(
            array(
                'subscriber' => array_key_exists($id, $this->items) ? $this->items[$id] : array(),
            )
        );
    }

    /**
     * Return list of resources
     *
     * @return mixed
     */
    public function getList()
    {
        return new JsonModel(
            array(
                'subscribers' => $this->items,
            )
        );
    }
}