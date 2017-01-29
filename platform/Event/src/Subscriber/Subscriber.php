<?php

namespace Simplicity\MessageQueue\Subscriber;

use Redis;

/**
 * Class Subscriber
 *
 * PHP Version 5
 *
 * @category  PHP
 * @package   Simplicity\MessageQueue\Subscriber
 * @author    Simplicity Trade GmbH <it@simplicity.ag>
 * @copyright 2014-2016 Simplicity Trade GmbH
 * @license   Proprietary http://www.simplicity.ag
 */
class Subscriber implements SubscriberInterface
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

        $loop = Factory::create();
    }

    /**
     * @param array $channels The channels to subsribe.
     *
     * @return $this
     */
    public function subscribe(array $channels)
    {
        $this->redis->subscribe(
            $channels,
            function (Redis $redis, $channel, $message) {
                switch ($channel) {
                    case 'ag.simplicity.b2c.indent.create':
                        var_dump($message);
                        break;
                    default:
                        var_dump($message);
                        break;
                }
            }
        );
    }

    /**
     * @return void
     */
    public function consume()
    {
    }
}