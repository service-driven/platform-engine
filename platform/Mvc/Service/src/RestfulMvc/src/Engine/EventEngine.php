<?php

namespace OpenArchitecture\RestfulMvc\Engine;

use Traversable;
use Zend\EventManager\EventManager;
use Zend\EventManager\EventManagerInterface;
use Zend\ModuleManager\ModuleEvent;

/**
 * Class EventEngine
 *
 * PHP Version 5
 *
 * @category  PHP
 * @package   OpenArchitecture\RestfulMvc\Engine
 * @author    Simplicity Trade GmbH <it@simplicity.ag>
 * @copyright 2014-2016 Simplicity Trade GmbH
 * @license   Proprietary http://www.simplicity.ag
 */
class EventEngine
{
    protected $event;
    protected $events;
    /**
     * @var array
     */
    protected $modules = array();

    /**
     * @var array
     */
    protected $callbacks = array();

    /**
     * Constructor
     *
     * @param  array|Traversable $modules
     * @param  EventManagerInterface $eventManager
     */
    public function __construct($modules, EventManagerInterface $eventManager = null)
    {
//        $this->setModules($modules);
        if ($eventManager instanceof EventManagerInterface) {
            $this->setEventManager($eventManager);
        }
    }


    /**
     * Get the module event
     *
     * @return ModuleEvent
     */
    public function getEvent()
    {
        if (!$this->event instanceof ModuleEvent) {
            $this->setEvent(new ModuleEvent);
        }
        return $this->event;
    }

    /**
     * Set the module event
     *
     * @param  ModuleEvent $event
     * @return EventEngine
     */
    public function setEvent(ModuleEvent $event)
    {
        $this->event = $event;

        return $this;
    }

    /**
     * Set the event manager instance used by this module manager.
     *
     * @param  EventManagerInterface $events
     * @return EventEngine
     */
    public function setEventManager(EventManagerInterface $events)
    {
        $events->setIdentifiers(array(
            __CLASS__,
            get_class($this),
            'module_manager',
        ));
        $this->events = $events;
        $this->attachDefaultListeners();

        return $this;
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
        if (!$this->events instanceof EventManagerInterface) {
            $this->setEventManager(new EventManager());
        }
        return $this->events;
    }

}