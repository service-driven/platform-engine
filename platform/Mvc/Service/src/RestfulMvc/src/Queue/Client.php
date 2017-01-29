<?php

namespace OpenArchitecture\RestfulMvc\Queue;

use OpenArchitecture\RestfulMvc\Entity\Message;
use OpenArchitecture\RestfulMvc\Entity\Queue;


/**
 * Class Client
 *
 * PHP Version 5
 *
 * @category  PHP
 * @package   OpenArchitecture\RestfulMvc\Queue
 * @author    Simplicity Trade GmbH <it@simplicity.ag>
 * @copyright 2014-2016 Simplicity Trade GmbH
 * @license   Proprietary http://www.simplicity.ag
 */
class Client
{
    public function createQueue($queueData)
    {
        return new Queue();
    }

    public function sendMessage($messageData)
    {
        return new Message();
    }

    public function receiveMessage($queryData)
    {
        return new Message();
    }
}