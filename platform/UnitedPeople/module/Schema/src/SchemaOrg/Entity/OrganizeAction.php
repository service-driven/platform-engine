<?php

namespace Schema\SchemaOrg\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * The act of manipulating/administering/supervising/controlling one or more objects.
 *
 * @see http://schema.org/OrganizeAction Documentation on Schema.org
 *
 * @ORM\MappedSuperclass
 */
abstract class OrganizeAction extends Action
{
}
