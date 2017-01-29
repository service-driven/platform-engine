<?php

namespace Schema\SchemaOrg\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * A vehicle is a device that is designed or used to transport people or cargo over land, water, air, or through space.
 *
 * @see http://schema.org/Vehicle Documentation on Schema.org
 *
 * @ORM\MappedSuperclass
 */
abstract class Vehicle extends Product
{
}
