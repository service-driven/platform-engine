<?php

namespace Networking\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class NetworkEntity
 *
 * PHP Version 5
 *
 * @category  PHP
 * @package   Networking\Entity
 * @author    Simplicity Trade GmbH <it@simplicity.ag>
 * @copyright 2014-2016 Simplicity Trade GmbH
 * @license   Proprietary http://www.simplicity.ag
 *
 * @ORM\Entity
 * @ORM\Table(name="network")
 */
class Network
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="indent_id_seq", allocationSize=1, initialValue=1)
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=50, nullable=true)
     */
    protected $name;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=500, nullable=true)
     */
    protected $description;

    /**
     * @return int
     */
    public function getId()
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
    public function getName()
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
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     *
     * @return void
     */
    public function setDescription(string $description)
    {
        $this->description = $description;
    }

//    /**
//     * @var IndentStatusEntity
//     *
//     * @ORM\ManyToOne(targetEntity="Indent\Entity\IndentStatusEntity", cascade={"persist"}, fetch="EAGER")
//     * @ORM\JoinColumn(name="indentstatus_id", referencedColumnName="id")
//     */
//    protected $indentStatus;


}
