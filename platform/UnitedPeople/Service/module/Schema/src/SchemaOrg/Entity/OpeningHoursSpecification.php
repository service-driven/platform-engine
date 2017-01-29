<?php

namespace Schema\SchemaOrg\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * A structured value providing information about the opening hours of a place or a certain service inside a place.\\n\\n The place is \_\_open\_\_ if the [[opens]] property is specified, and \_\_closed\_\_ otherwise.\\n\\nIf the value for the [[closes]] property is less than the value for the [[opens]] property then the hour range is assumed to span over the next day.
 *
 * @see http://schema.org/OpeningHoursSpecification Documentation on Schema.org
 *
 * @ORM\Entity
 */
class OpeningHoursSpecification extends StructuredValue
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
