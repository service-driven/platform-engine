<?php

namespace Schema\SchemaOrg\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Intended audience for an item, i.e. the group for whom the item was created.
 *
 * @see http://schema.org/Audience Documentation on Schema.org
 *
 * @ORM\MappedSuperclass
 */
abstract class Audience extends Intangible
{
}
