<?php

namespace Schema\SchemaOrg\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * A sports location, such as a playing field.
 *
 * @see http://schema.org/SportsActivityLocation Documentation on Schema.org
 *
 * @ORM\MappedSuperclass
 */
abstract class SportsActivityLocation extends LocalBusiness
{
}
