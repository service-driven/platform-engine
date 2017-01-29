<?php

namespace Simplicity\MessageQueue\Publisher;

use Redis;

/**
 * Class Publisher
 *
 * PHP Version 5
 *
 * @category  PHP
 * @package   Simplicity\MessageQueue\Publisher
 * @author    Simplicity Trade GmbH <it@simplicity.ag>
 * @copyright 2014-2016 Simplicity Trade GmbH
 * @license   Proprietary http://www.simplicity.ag
 */
class Publisher implements PublisherInterface
{
    /** @var Redis */
    protected $redis;

    /**
     * Publisher constructor.
     *
     * @param Redis $redis The redis client.
     */
    public function __construct(Redis $redis)
    {
        $this->redis = $redis;
    }

    /**
     * @param string $channel The subsribed channel.
     * @param string $message The message.
     *
     * @return void
     */
    public function publish($channel, $message)
    {
        $this->redis->publish($channel, $message);
    }

    /**
     * Close redis
     */
    function __destruct()
    {
        $this->redis->close();
    }
}