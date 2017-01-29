<?php

namespace Simplicity\MessageQueue\Subscriber\Consumer;

/**
 * Interface ConsumerInterface
 *
 * PHP Version 5
 *
 * @category  PHP
 * @package   Simplicity\MessageQueue\Subscriber\Consumer
 * @author    Simplicity Trade GmbH <it@simplicity.ag>
 * @copyright 2014-2016 Simplicity Trade GmbH
 * @license   Proprietary http://www.simplicity.ag
 */
interface ConsumerInterface
{
    /**
     * @return [string]
     */
    public function getTag();

    /**
     * @param  [string] $message
     * @return [void]
     */
    public function work($message);
}