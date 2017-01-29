<?php

namespace Networking\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Address
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
 * @ORM\Table(name="address")
 */
class Address
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
     * @ORM\Column(name="address_country", type="string", length=250, nullable=true)
     */
    protected $addressCountry;

    /**
     * @var string
     *
     * @ORM\Column(name="address_locality", type="string", length=250, nullable=true)
     */
    protected $addressLocality;

    /**
     * @var string
     *
     * @ORM\Column(name="address_region", type="string", length=250, nullable=true)
     */
    protected $addressRegion;

    /**
     * @var string
     *
     * @ORM\Column(name="post_office_box_number", type="string", length=50, nullable=true)
     */
    protected $postOfficeBoxNumber;

    /**
     * @var string
     *
     * @ORM\Column(name="postal_code", type="string", length=10, nullable=true)
     */
    protected $postalCode;

    /**
     * @var string
     *
     * @ORM\Column(name="street_address", type="string", length=250, nullable=true)
     */
    protected $streetAddress;
}
