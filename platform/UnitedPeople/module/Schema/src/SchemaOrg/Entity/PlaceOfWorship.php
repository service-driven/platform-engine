<?php

namespace Schema\SchemaOrg\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Place of worship, such as a church, synagogue, or mosque.
 *
 * @see http://schema.org/PlaceOfWorship Documentation on Schema.org
 *
 * @ORM\MappedSuperclass
 */
abstract class PlaceOfWorship extends CivicStructure
{
}
