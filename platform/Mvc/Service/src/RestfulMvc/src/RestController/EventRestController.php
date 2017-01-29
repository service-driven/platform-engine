<?php

namespace OpenArchitecture\RestfulMvc\RestController;

use OpenArchitecture\RestfulMvc\Queue\QueueType;
use Zend\Mvc\Controller\AbstractRestfulController;
use Zend\Mvc\MvcEvent;
use Zend\View\Model\JsonModel;

/**
 * Class EventRestController
 *
 * PHP Version 5
 *
 * @category  PHP
 * @package   OpenArchitecture\RestfulMvc\RestController
 * @author    Simplicity Trade GmbH <it@simplicity.ag>
 * @copyright 2014-2016 Simplicity Trade GmbH
 * @license   Proprietary http://www.simplicity.ag
 */
class EventRestController extends AbstractRestfulController
{
    /** @var string */
    protected $identifierName = 'event_id';
    /** @var array */
    protected $items = array();

    /**
     * EventRestController constructor.
     */
    public function __construct()
    {
        $this->items = array(
//            'ModuleEvent:EVENT_LOAD_MODULE_RESOLVE' => array(
//                'name' => ModuleEvent::EVENT_LOAD_MODULE_RESOLVE,
//                'eventClass' => 'ModuleEvent',
//                'identifiers' => array(),
//                'subscribers' => array(),
//                'messages' => array(),
//            ),
//            ModuleEvent::EVENT_LOAD_MODULES => array(
//                'name' => '', 'identifiers' => array(), 'subscribers' => array(), 'messages' => array()
//            ),
//            ModuleEvent::EVENT_LOAD_MODULE => array(
//                'name' => '', 'identifiers' => array(), 'subscribers' => array(), 'messages' => array()
//            ),
//            ModuleEvent::EVENT_MERGE_CONFIG => array(
//                'name' => '', 'identifiers' => array(), 'subscribers' => array(), 'messages' => array()
//            ),
//            ModuleEvent::EVENT_LOAD_MODULES_POST => array(
//                'name' => '', 'identifiers' => array(), 'subscribers' => array(), 'messages' => array()
//            ),

            'MvcEvent::EVENT_BOOTSTRAP' => array(
                'name' => MvcEvent::EVENT_BOOTSTRAP,
                'type' => QueueType::PULL,
                'messages' => array(
                    'timeout' => 60,
                    'expiration' => 604800,
                    'items' => array(),
                    'count' => 0,
                ),
                'eventClass' => MvcEvent::class,
                'identifiers' => array(
                    MvcEvent::class,
                ),
                'subscribers' => array(
                    array(
                        "name" => "subscriber_name",
                        "url" => "http://mysterious-brook-1807.herokuapp.com/ironmq_push_1",
                        "headers" => array(
                            "Content-Type" => "application/json",
                        ),
                    ),
                ),
            ),



            'MvcEvent::EVENT_DISPATCH' => array(
                'name' => MvcEvent::EVENT_DISPATCH,
                'eventClass' => MvcEvent::class,
                'identifiers' => array(),
                'subscribers' => array(),
                'messages' => array()
            ),
            'MvcEvent::EVENT_DISPATCH_ERROR' => array(
                'name' => MvcEvent::EVENT_DISPATCH_ERROR,
                'eventClass' => MvcEvent::class,
                'identifiers' => array(),
                'subscribers' => array(),
                'messages' => array()
            ),
            'MvcEvent::EVENT_FINISH' => array(
                'name' => MvcEvent::EVENT_FINISH,
                'eventClass' => MvcEvent::class,
                'identifiers' => array(),
                'subscribers' => array(),
                'messages' => array()
            ),
            'MvcEvent::EVENT_RENDER' => array(
                'name' => MvcEvent::EVENT_RENDER,
                'eventClass' => MvcEvent::class,
                'identifiers' => array(),
                'subscribers' => array(),
                'messages' => array()
            ),
            'MvcEvent::EVENT_RENDER_ERROR' => array(
                'name' => MvcEvent::EVENT_RENDER_ERROR,
                'eventClass' => MvcEvent::class,
                'identifiers' => array(),
                'subscribers' => array(),
                'messages' => array()
            ),
            'MvcEvent::EVENT_ROUTE' => array(
                'name' => MvcEvent::EVENT_ROUTE,
                'eventClass' => MvcEvent::class,
                'identifiers' => array(),
                'subscribers' => array(),
                'messages' => array()
            ),

//            SendResponseEvent::EVENT_SEND_RESPONSE => array(
//                'name' => '', 'identifiers' => array(), 'subscribers' => array(), 'messages' => array()
//            ),
//
//            Translator::EVENT_MISSING_TRANSLATION => array(
//                'name' => '', 'identifiers' => array(), 'subscribers' => array(), 'messages' => array()
//            ),
//            Translator::EVENT_NO_MESSAGES_LOADED => array(
//                'name' => '', 'identifiers' => array(), 'subscribers' => array(), 'messages' => array()
//            ),
//
//            EventFeature::EVENT_PRE_INITIALIZE => array(
//                'name' => '', 'identifiers' => array(), 'subscribers' => array(), 'messages' => array()
//            ),
//            EventFeature::EVENT_POST_INITIALIZE => array(
//
//                'name' => '', 'identifiers' => array(), 'subscribers' => array(), 'messages' => array()
//            ),
//            EventFeature::EVENT_PRE_SELECT => array(
//                'name' => '', 'identifiers' => array(), 'subscribers' => array(), 'messages' => array()
//            ),
//            EventFeature::EVENT_POST_SELECT => array(
//                'name' => '', 'identifiers' => array(), 'subscribers' => array(), 'messages' => array()
//            ),
//            EventFeature::EVENT_PRE_INSERT => array(
//                'name' => '', 'identifiers' => array(), 'subscribers' => array(), 'messages' => array()
//            ),
//            EventFeature::EVENT_POST_INSERT => array(
//                'name' => '', 'identifiers' => array(), 'subscribers' => array(), 'messages' => array()
//            ),
//            EventFeature::EVENT_PRE_DELETE => array(
//                'name' => '', 'identifiers' => array(), 'subscribers' => array(), 'messages' => array()
//            ),
//            EventFeature::EVENT_POST_DELETE => array(
//                'name' => '', 'identifiers' => array(), 'subscribers' => array(), 'messages' => array()
//            ),
//            EventFeature::EVENT_PRE_UPDATE => array(
//                'name' => '', 'identifiers' => array(), 'subscribers' => array(), 'messages' => array()
//            ),
//            EventFeature::EVENT_POST_UPDATE => array(
//                'name' => '', 'identifiers' => array(), 'subscribers' => array(), 'messages' => array()
//            ),
//
//            ViewEvent::EVENT_RENDERER => array(
//                'name' => '', 'identifiers' => array(), 'subscribers' => array(), 'messages' => array()
//            ),
//            ViewEvent::EVENT_RENDERER_POST => array(
//                'name' => '', 'identifiers' => array(), 'subscribers' => array(), 'messages' => array()
//            ),
//            ViewEvent::EVENT_RESPONSE => array(
//                'name' => '', 'identifiers' => array(), 'subscribers' => array(), 'messages' => array()
//            ),
//
//            ProfilerEvent::EVENT_COLLECTED => array(
//                'name' => '', 'identifiers' => array(), 'subscribers' => array(), 'messages' => array()
//            ),
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
                'event' => array_key_exists($id, $this->items) ? $this->items[$id] : array(),
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
                'events' => $this->items,
            )
        );
    }
}