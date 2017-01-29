<?php

namespace Schema\SchemaOrg\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * A structured value indicating the quantity, unit of measurement, and business function of goods included in a bundle offer.
 *
 * @see http://schema.org/TypeAndQuantityNode Documentation on Schema.org
 *
 * @ORM\Entity
 */
class TypeAndQuantityNode extends StructuredValue
{
    /**
     * @var int
     *
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * Sets id.
     *
     * @param int $id
     *
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Gets id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
}
