<?php

namespace Schema\SchemaOrg\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * An educational organization.
 *
 * @see http://schema.org/EducationalOrganization Documentation on Schema.org
 *
 * @ORM\MappedSuperclass
 */
abstract class EducationalOrganization extends Organization
{
}
