<?php

namespace Schema\SchemaOrg\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * The act of managing by changing/editing the state of the object.
 *
 * @see http://schema.org/UpdateAction Documentation on Schema.org
 *
 * @ORM\MappedSuperclass
 */
abstract class UpdateAction extends Action
{
}
