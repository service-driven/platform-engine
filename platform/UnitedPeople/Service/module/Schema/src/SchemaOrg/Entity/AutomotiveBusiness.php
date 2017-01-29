<?php

namespace Schema\SchemaOrg\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Car repair, sales, or parts.
 *
 * @see http://schema.org/AutomotiveBusiness Documentation on Schema.org
 *
 * @ORM\MappedSuperclass
 */
abstract class AutomotiveBusiness extends LocalBusiness
{
}
