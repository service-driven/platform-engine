<?php

namespace Nodes\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Node
 *
 * PHP Version 5
 *
 * @category  PHP
 * @package   Nodes\Entity
 * @author    Simplicity Trade GmbH <it@simplicity.ag>
 * @copyright 2014-2016 Simplicity Trade GmbH
 * @license   Proprietary http://www.simplicity.ag
 *
 * @ORM\Entity
 * @ORM\Table(name="node")
 */
class Node
{
    /**
     * @var int
     *
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=250, nullable=true)
     */
    protected $name;

    /**
     * @var string
     *
     * @ORM\Column(name="uri", type="string", length=250, nullable=true)
     */
    protected $uri;

    /**
     * @var string
     *
     * @ORM\Column(name="port", type="string", length=5, nullable=true)
     */
    protected $port;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     *
     * @return void
     */
    public function setId(int $id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     *
     * @return void
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getUri(): string
    {
        return $this->uri;
    }

    /**
     * @param string $uri
     *
     * @return void
     */
    public function setUri(string $uri)
    {
        $this->uri = $uri;
    }

    /**
     * @return string
     */
    public function getPort(): string
    {
        return $this->port;
    }

    /**
     * @param string $port
     *
     * @return void
     */
    public function setPort(string $port)
    {
        $this->port = $port;
    }


}
