<?php

namespace Schema\SchemaOrg\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * A lodging business, such as a motel, hotel, or inn.
 *
 * @see http://schema.org/LodgingBusiness Documentation on Schema.org
 *
 * @ORM\MappedSuperclass
 */
abstract class LodgingBusiness extends LocalBusiness
{
}
