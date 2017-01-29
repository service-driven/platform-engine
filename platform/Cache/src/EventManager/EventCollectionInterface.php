<?php

namespace Simplicity\EventDrivenCache\EventManager;

use Zend\EventManager\ResponseCollection;
use Zend\Stdlib\CallbackHandler;

/**
 * Interface EventCollectionInterface
 *
 * PHP Version 5
 *
 * @category  PHP
 * @package   Simplicity\EventDrivenCache\EventManager
 * @author    Simplicity Trade GmbH <it@simplicity.ag>
 * @copyright 2014-2016 Simplicity Trade GmbH
 * @license   Proprietary http://www.simplicity.ag
 */
interface EventCollectionInterface
{
    /**
     * Trigger an event
     *
     * Should allow handling the following scenarios:
     * - Passing Event object only
     * - Passing event name and Event object only
     * - Passing event name, target, and Event object
     * - Passing event name, target, and array|ArrayAccess of arguments
     *
     * Can emulate triggerUntil() if the last argument provided is a callback.
     *
     * @param  string        $event
     * @param  object|string $target
     * @param  array|object  $argv
     * @param  null|callback $callback
     *
     * @return ResponseCollection
     */
    public function trigger($event, $target = null, $argv = array(), $callback = null);

    /**
     * Trigger an event until the given callback returns a boolean false
     *
     * Should allow handling the following scenarios:
     * - Passing Event object and callback only
     * - Passing event name, Event object, and callback only
     * - Passing event name, target, Event object, and callback
     * - Passing event name, target, array|ArrayAccess of arguments, and callback
     *
     * @param  string        $event
     * @param  object|string $target
     * @param  array|object  $argv
     * @param  callback      $callback
     *
     * @return ResponseCollection
     */
    public function triggerUntil($event, $target, $argv = null, $callback = null);

    /**
     * Attach a listener to an event
     *
     * @param  string   $event
     * @param  callback $callback
     * @param  int      $priority Priority at which to register listener
     *
     * @return CallbackHandler
     */
    public function attach($event, $callback, $priority = 1);

    /**
     * Detach an event listener
     *
     * @param  CallbackHandler $listener
     *
     * @return void
     */
    public function detach(CallbackHandler $listener);

    /**
     * Get a list of events for which this collection has listeners
     *
     * @return array
     */
    public function getEvents();

    /**
     * Retrieve a list of listeners registered to a given event
     *
     * @param  string $event
     *
     * @return array|object
     */
    public function getListeners($event);

    /**
     * Clear all listeners for a given event
     *
     * @param  string $event
     *
     * @return void
     */
    public function clearListeners($event);
}