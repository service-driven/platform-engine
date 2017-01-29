<?php

namespace Simplicity\MessageQueue\Subscriber;

/**
 * Interface SubscriberInterface
 *
 * PHP Version 5
 *
 * @category  PHP
 * @package   Simplicity\MessageQueue\Subscriber
 * @author    Simplicity Trade GmbH <it@simplicity.ag>
 * @copyright 2014-2016 Simplicity Trade GmbH
 * @license   Proprietary http://www.simplicity.ag
 */
interface SubscriberInterface
{
    /**
     * @param  [string] $queue
     */
    public function subscribe(array $channels);
    /**
     * @return [void]
     */
    public function consume();
}