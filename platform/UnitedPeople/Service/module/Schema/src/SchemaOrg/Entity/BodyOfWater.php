<?php

namespace Schema\SchemaOrg\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * A body of water, such as a sea, ocean, or lake.
 *
 * @see http://schema.org/BodyOfWater Documentation on Schema.org
 *
 * @ORM\MappedSuperclass
 */
abstract class BodyOfWater extends Landform
{
}
