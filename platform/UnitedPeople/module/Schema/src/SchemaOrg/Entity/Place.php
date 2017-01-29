<?php

namespace Schema\SchemaOrg\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Entities that have a somewhat fixed, physical extension.
 *
 * @see http://schema.org/Place Documentation on Schema.org
 *
 * @ORM\MappedSuperclass
 */
abstract class Place extends Thing
{
}
