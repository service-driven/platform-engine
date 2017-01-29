<?php

namespace Simplicity\EventDrivenCache\Collector;

use Simplicity\Cache\Event\CacheEventInterface;
use Zend\Mvc\MvcEvent;
use ZendDeveloperTools\Collector\AbstractCollector;

/**
 * Class EventCollector
 *
 * PHP Version 5
 *
 * @category  PHP
 * @package   Simplicity\EventDrivenCache\Collector
 * @author    Simplicity Trade GmbH <it@simplicity.ag>
 * @copyright 2014-2016 Simplicity Trade GmbH
 * @license   Proprietary http://www.simplicity.ag
 */
class EventCollector extends AbstractCollector
{
    /**
     * @return array
     */
    public function getEventGroups()
    {

        return $this->data;
    }

    /**
     * @return array
     */
    public function getEvents()
    {
        return $this->data;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'events';
    }

    /**
     * @return mixed
     */
    public function getNumberOfEvents()
    {
        return array_map(
            function ($events) {
                return count($events);
            },
            $this->data
        );
    }

    /**
     * @return integer
     */
    public function getPriority()
    {
        return 100;
    }

    /**
     * @return mixed
     */
    public function getTotalNumberOfEvents()
    {
        return array_reduce(
            $this->data,
            function ($totalNumberOfEvents, $events) {
                $totalNumberOfEvents += count($events);

                return $totalNumberOfEvents;
            }
        );
    }

    /**
     * @param CacheEventInterface $event The event.
     *
     * @return void
     */
    public function addCustomEvent(CacheEventInterface $event)
    {
        if (!isset($this->data)) {
            $this->data = array();
        }

        $eventName = $event->getName();
        if (!isset($this->data[$eventName])) {
            $this->data[$eventName] = array();
        }

        $this->data[$eventName][] = $event->getData();
    }

    /**
     * @param MvcEvent $mvcEvent The mvc event.
     *
     * @return void
     */
    public function collect(MvcEvent $mvcEvent)
    {
        if (!isset($this->data)) {
            $this->data = array();
        }
    }

    /**
     * @return boolean
     */
    public function hasEvents()
    {
        return $this->getTotalNumberOfEvents() > 0;
    }
}