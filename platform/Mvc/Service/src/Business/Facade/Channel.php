<?php

/**
 * Class Channel
 *
 * PHP Version 5
 *
 * @category  PHP
 * @package   ${NAMESPACE}
 * @author    Simplicity Trade GmbH <it@simplicity.ag>
 * @copyright 2014-2017 Simplicity Trade GmbH
 * @license   Proprietary http://www.simplicity.ag
 */
class Channel
{
    protected $exchangeType;
    protected $queues;

    /**
     * Channel constructor.
     */
    public function __construct()
    {
    }


    public function publishMessage(MessageTransfer $messageTransfer)
    {

    }

    public function consume($queueName)
    {

    }

    public function createQueue()
    {
        return new Queue();
    }
}