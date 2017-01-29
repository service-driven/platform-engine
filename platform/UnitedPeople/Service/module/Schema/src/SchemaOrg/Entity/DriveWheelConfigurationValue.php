<?php

namespace Schema\SchemaOrg\Entity;

use Doctrine\ORM\Mapping as ORM;
use Schema\SchemaOrg\Enum\QualitativeValue;

/**
 * A value indicating which roadwheels will receive torque.
 *
 * @see http://schema.org/DriveWheelConfigurationValue Documentation on Schema.org
 *
 * @ORM\Entity
 */
class DriveWheelConfigurationValue extends QualitativeValue
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
