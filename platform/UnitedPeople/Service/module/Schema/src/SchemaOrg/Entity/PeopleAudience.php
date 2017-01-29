<?php

namespace Schema\SchemaOrg\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * A set of characteristics belonging to people, e.g. who compose an item's target audience.
 *
 * @see http://schema.org/PeopleAudience Documentation on Schema.org
 *
 * @ORM\MappedSuperclass
 */
abstract class PeopleAudience extends Audience
{
}
