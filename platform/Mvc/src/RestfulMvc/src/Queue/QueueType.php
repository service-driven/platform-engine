<?php

namespace OpenArchitecture\RestfulMvc\Queue;

/**
 * Class QueueType
 *
 * PHP Version 5
 *
 * @category  PHP
 * @package   OpenArchitecture\RestfulMvc\Queue
 * @author    Simplicity Trade GmbH <it@simplicity.ag>
 * @copyright 2014-2016 Simplicity Trade GmbH
 * @license   Proprietary http://www.simplicity.ag
 */
class QueueType
{
    const PULL = 'pull';
    const UNICAST = 'unicast';
    const MULTICAST = 'multicast';
}