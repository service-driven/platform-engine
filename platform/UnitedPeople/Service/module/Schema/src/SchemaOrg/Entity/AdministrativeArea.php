<?php

namespace Schema\SchemaOrg\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * A geographical region, typically under the jurisdiction of a particular government.
 *
 * @see http://schema.org/AdministrativeArea Documentation on Schema.org
 *
 * @ORM\MappedSuperclass
 */
abstract class AdministrativeArea extends Place
{
}
