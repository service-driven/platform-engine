<?php

namespace Schema\SchemaOrg\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * A retail good store.
 *
 * @see http://schema.org/Store Documentation on Schema.org
 *
 * @ORM\MappedSuperclass
 */
abstract class Store extends LocalBusiness
{
}
