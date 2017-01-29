<?php

namespace Simplicity\EventDrivenCache\Service;

use ArrayObject;
use Zend\EventManager\EventInterface;
use Zend\EventManager\EventManager;
use Zend\EventManager\EventManagerInterface;

/**
 * Class CacheService
 *
 * PHP Version 5
 *
 * @category  PHP
 * @package   Simplicity\EventDrivenCache\Service
 * @author    Simplicity Trade GmbH <it@simplicity.ag>
 * @copyright 2014-2016 Simplicity Trade GmbH
 * @license   Proprietary http://www.simplicity.ag
 */
class CacheService
{
    /** @var EventManagerInterface */
    protected $events;

    /**
     * @return string
     */
    protected function generateKey()
    {
        return spl_object_hash($this);
    }

    /**
     * @param EventManagerInterface $events The event manager.
     *
     * @return void
     */
    public function setEventManager(EventManagerInterface $events)
    {
        $this->events = $events;
    }

    /**
     * @return EventManagerInterface
     */
    public function events()
    {
        if (!$this->events) {
            $this->setEventManager(new EventManager(array(__CLASS__, get_called_class())));
        }

        return $this->events;
    }

    /**
     * @return mixed
     */
    public function find()
    {
        $arguments = func_get_args();
        $results = $this->events()->trigger(
            'cache.find',
            $this,
            $arguments,
            function ($result) {
                return $result instanceof ArrayObject;
            }
        );

        if ($results->stopped()) {
            return $results->last();
        }

        $cacheItem = array('data' => '...');

        $this->events()->trigger(
            'cache.save',
            $this,
            $cacheItem,
            function () {
                return 'from cache';
            }
        );

        return $cacheItem;
    }

    public function run()
    {
        $this->events()->attach(
            'cache.find',
            function (EventInterface $event) {
                $event->stopPropagation();

                return new ArrayObject();
            }
        );
    }
}