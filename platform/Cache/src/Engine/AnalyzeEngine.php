<?php

namespace Simplicity\EventDrivenCache\Engine;

use Simplicity\Cache\Event\CacheEvent;
use Simplicity\Cache\Event\CacheEventInterface;
use Zend\EventManager\EventManagerAwareInterface;
use Zend\EventManager\EventManagerAwareTrait;
use Zend\Json\Json;

/**
 * Class AnalyzeEngine
 *
 * PHP Version 5
 *
 * @category  PHP
 * @package   Simplicity\EventDrivenCache\Engine
 * @author    Simplicity Trade GmbH <it@simplicity.ag>
 * @copyright 2014-2016 Simplicity Trade GmbH
 * @license   Proprietary http://www.simplicity.ag
 */
class AnalyzeEngine implements AnalyzeEngineInterface, EventManagerAwareInterface
{
    use EventManagerAwareTrait;

    /**
     * AnalyzeEngine constructor.
     */
    public function __construct()
    {
    }

    /**
     * @param CacheEventInterface $event The event.
     *
     * @return void
     */
    public function triggerEvent(CacheEventInterface $event)
    {
        $eventData = array(
            'className'  => $event->getTarget()->getClassName(),
            'methodName' => $event->getTarget()->getMethodName(),
            'type'       => $event->getType(),
            'key'        => $event->getCacheItem()->getKey(),
            'arguments'  => Json::encode($event->getParams()),
            'isHit'      => intval($event->getCacheItem()->isHit()),
        );

        if ($event->getName() === CacheEvent::EVENT_CACHE_ITEM_CREATE) {
            $eventData['tags'] = implode(', ', $event->getCacheItem()->getTags());
            $eventData['op'] = 'create';
        }

        if ($event->getName() === CacheEvent::EVENT_CACHE_ITEM_DELETE) {
            $eventData['tags'] = implode(', ', $event->getCacheItem()->getTags());
            $eventData['op'] = 'delete';
        }

        $event->setData($eventData);

        $this->getEventManager()->trigger($event);
    }
}