<?php

namespace Schema\SchemaOrg\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * The place where a person lives.
 *
 * @see http://schema.org/Residence Documentation on Schema.org
 *
 * @ORM\MappedSuperclass
 */
abstract class Residence extends Place
{
}
