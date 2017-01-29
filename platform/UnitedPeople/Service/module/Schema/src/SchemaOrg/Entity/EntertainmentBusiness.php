<?php

namespace Schema\SchemaOrg\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * A business providing entertainment.
 *
 * @see http://schema.org/EntertainmentBusiness Documentation on Schema.org
 *
 * @ORM\MappedSuperclass
 */
abstract class EntertainmentBusiness extends LocalBusiness
{
}
