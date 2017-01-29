<?php

namespace Schema\SchemaOrg\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * A public structure, such as a town hall or concert hall.
 *
 * @see http://schema.org/CivicStructure Documentation on Schema.org
 *
 * @ORM\MappedSuperclass
 */
abstract class CivicStructure extends Place
{
}
