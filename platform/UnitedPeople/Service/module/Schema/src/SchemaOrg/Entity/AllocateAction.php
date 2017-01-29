<?php

namespace Schema\SchemaOrg\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * The act of organizing tasks/objects/events by associating resources to it.
 *
 * @see http://schema.org/AllocateAction Documentation on Schema.org
 *
 * @ORM\MappedSuperclass
 */
abstract class AllocateAction extends OrganizeAction
{
}
