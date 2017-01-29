<?php

namespace Schema\SchemaOrg\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * A performance group, such as a band, an orchestra, or a circus.
 *
 * @see http://schema.org/PerformingGroup Documentation on Schema.org
 *
 * @ORM\MappedSuperclass
 */
abstract class PerformingGroup extends Organization
{
}
