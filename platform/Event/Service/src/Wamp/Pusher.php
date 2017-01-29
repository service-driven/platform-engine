<?php

namespace Tws\EventEngine\Wamp;

use Exception;
use Ratchet\ConnectionInterface;
use Ratchet\Wamp\Topic;
use Ratchet\Wamp\WampServerInterface;
use SplObjectStorage;

/**
 * Class Pusher
 *
 * PHP Version 5
 *
 * @category  PHP
 * @package   Tws\EventEngine\Wamp
 * @author    Simplicity Trade GmbH <it@simplicity.ag>
 * @copyright 2014-2016 Simplicity Trade GmbH
 * @license   Proprietary http://www.simplicity.ag
 */
class Pusher implements WampServerInterface
{
    /**
     * A lookup of all the topics clients have subscribed to
     */
    protected $subscribedTopics = array();
    /**
     * @var SplObjectStorage
     */
    protected $connections;

    /**
     * Pusher constructor.
     */
    public function __construct()
    {
        $this->connections = new SplObjectStorage();
    }


    public function onSubscribe(ConnectionInterface $connection, $topic)
    {
        var_dump('onSubscribe');

        $this->subscribedTopics[$topic->getId()] = $topic;
    }

    /**
     * A request to unsubscribe from a topic has been made
     * @param \Ratchet\ConnectionInterface $connection
     * @param string|Topic $topic The topic to unsubscribe from
     */
    function onUnSubscribe(ConnectionInterface $connection, $topic)
    {
//        delete $this->subscribedTopics[$topic->getId()];
    }

    /**
     * When a new connection is opened it will be passed to this method
     * @param  ConnectionInterface $connection The socket/connection that just connected to your application
     * @throws Exception
     */
    function onOpen(ConnectionInterface $connection)
    {
        $this->connections->attach($connection);
    }

    /**
     * This is called before or after a socket is closed (depends on how it's closed).  SendMessage to $conn will not result in an error if it has already been closed.
     * @param  ConnectionInterface $connection The socket/connection that is closing/closed
     * @throws Exception
     */
    function onClose(ConnectionInterface $connection)
    {
        $this->connections->detach($connection);
    }

    /**
     * If there is an error with one of the sockets, or somewhere in the application where an Exception is thrown,
     * the Exception is sent back down the stack, handled by the Server and bubbled back up the application through this method
     * @param  ConnectionInterface $connection
     * @param  Exception $e
     * @throws Exception
     */
    function onError(ConnectionInterface $connection, Exception $e)
    {
        // TODO: Implement onError() method.
    }

    /**
     * An RPC call has been received
     * @param \Ratchet\ConnectionInterface $connection
     * @param string $id The unique ID of the RPC, required to respond to
     * @param string|Topic $topic The topic to execute the call against
     * @param array $params Call parameters received from the client
     */
    function onCall(ConnectionInterface $connection, $id, $topic, array $params)
    {
        $connection->callError($id, $topic, 'You are not allowed to make calls')->close();
    }

    /**
     * A client is attempting to publish content to a subscribed connections on a URI
     * @param \Ratchet\ConnectionInterface $connection
     * @param string|Topic $topic The topic the user has attempted to publish to
     * @param string $event Payload of the publish
     * @param array $exclude A list of session IDs the message should be excluded from (blacklist)
     * @param array $eligible A list of session Ids the message should be send to (whitelist)
     */
    function onPublish(ConnectionInterface $connection, $topic, $event, array $exclude, array $eligible)
    {
        var_dump('onPublish');
        var_dump($topic);
        var_dump($event);
    }
}