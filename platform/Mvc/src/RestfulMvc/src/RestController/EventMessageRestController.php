<?php

namespace OpenArchitecture\RestfulMvc\RestController;

use Zend\Mvc\Controller\AbstractRestfulController;
use Zend\View\Model\JsonModel;

/**
 * Class EventMessageRestController
 *
 * PHP Version 5
 *
 * @category  PHP
 * @package   OpenArchitecture\RestfulMvc\RestController
 * @author    Simplicity Trade GmbH <it@simplicity.ag>
 * @copyright 2014-2016 Simplicity Trade GmbH
 * @license   Proprietary http://www.simplicity.ag
 */
class EventMessageRestController extends AbstractRestfulController
{
    /** @var string */
    protected $identifierName = 'message_id';
    /** @var array */
    protected $items = array();

    /**
     * EventRestController constructor.
     */
    public function __construct()
    {
        $this->items = array(
            array(
                "body" => "This is my message 1.",
                "delay" => 0,
                "headers" => array(
                    "Authentication" => "token",
                ),
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
                'message' => array_key_exists($id, $this->items) ? $this->items[$id] : array(),
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
                'messages' => $this->items,
            )
        );
    }
}