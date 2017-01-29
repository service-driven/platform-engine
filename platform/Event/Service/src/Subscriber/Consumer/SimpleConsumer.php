<?php

namespace Subscriber\Consumer;

use Simplicity\MessageQueue\Subscriber\Consumer\ConsumerInterface;

/**
 * Class Consumer
 *
 * PHP Version 5
 *
 * @category  PHP
 * @package   Subscriber\Consumer
 * @author    Simplicity Trade GmbH <it@simplicity.ag>
 * @copyright 2014-2016 Simplicity Trade GmbH
 * @license   Proprietary http://www.simplicity.ag
 */
class SimpleConsumer implements ConsumerInterface
{
    /**
     * @return [string]
     */
    public function getTag()
    {
        // TODO: Implement getTag() method.
    }

    /**
     * @param  [string] $message
     *
     * @return [void]
     */
    public function work($message)
    {
        // TODO: Implement work() method.
    }
}