<?php

namespace Tws\EventEngine\Service;

use Iterator;
use React\Datagram\Socket;

/**
 * Class ClientService
 *
 * PHP Version 5
 *
 * @category  PHP
 * @package   Tws\EventEngine\Service
 * @author    Simplicity Trade GmbH <it@simplicity.ag>
 * @copyright 2014-2016 Simplicity Trade GmbH
 * @license   Proprietary http://www.simplicity.ag
 */
class ClientService implements Iterator
{
    /** @var int */
    protected $position = 0;
    /** @var array */
    protected $clients = array();

    public function has($id)
    {
        return array_key_exists($id, $this->clients);
    }

    public function add($id, $client)
    {
        $this->clients[$id] = $client;
    }

    public function rewind()
    {
        reset($this->clients);
    }

    /**
     * @return Socket
     */
    public function current()
    {
        return current($this->clients);
    }

    public function key()
    {
        return key($this->clients);
    }

    public function next()
    {
        return next($this->clients);
    }

    public function valid()
    {
        return key($this->clients);
    }

    public function all()
    {
        return $this->clients;
    }
}