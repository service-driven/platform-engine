<?php

namespace Networking\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Organization
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
 * @ORM\Table(name="organization")
 */
class Organization
{
    /**
     * @ORM\Id
     * @ORM\Column(name="id", type="integer")
     * @ORM\GeneratedValue(strategy="IDENTITY")
     *
     * @var int
     */
    protected $id;

    /**
     * @var Address
     *
     * @ORM\OneToOne(targetEntity="Address")
     * @ORM\JoinColumn(name="address_id", referencedColumnName="id")
     */
    protected $address;
}
