<?php

namespace Schema\SchemaOrg\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * A subclass of Role used to describe roles within organizations.
 *
 * @see http://schema.org/OrganizationRole Documentation on Schema.org
 *
 * @ORM\MappedSuperclass
 */
abstract class OrganizationRole extends Role
{
}
