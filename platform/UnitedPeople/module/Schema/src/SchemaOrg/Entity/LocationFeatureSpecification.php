<?php

namespace Schema\SchemaOrg\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Specifies a location feature by providing a structured value representing a feature of an accommodation as a property-value pair of varying degrees of formality.
 *
 * @see http://schema.org/LocationFeatureSpecification Documentation on Schema.org
 *
 * @ORM\Entity
 */
class LocationFeatureSpecification extends PropertyValue
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
