<?php

namespace Schema\SchemaOrg\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Represents the collection of all sports organizations, including sports teams, governing bodies, and sports associations.
 *
 * @see http://schema.org/SportsOrganization Documentation on Schema.org
 *
 * @ORM\MappedSuperclass
 */
abstract class SportsOrganization extends Organization
{
}
