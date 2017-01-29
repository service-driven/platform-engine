<?php

namespace Schema\SchemaOrg\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * The act of interacting with another person or organization.
 *
 * @see http://schema.org/InteractAction Documentation on Schema.org
 *
 * @ORM\MappedSuperclass
 */
abstract class InteractAction extends Action
{
}
