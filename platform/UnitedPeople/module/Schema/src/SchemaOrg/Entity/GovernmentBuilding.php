<?php

namespace Schema\SchemaOrg\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * A government building.
 *
 * @see http://schema.org/GovernmentBuilding Documentation on Schema.org
 *
 * @ORM\MappedSuperclass
 */
abstract class GovernmentBuilding extends CivicStructure
{
}
