<?php

namespace Schema\SchemaOrg\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * The act of applying an object to its intended purpose.
 *
 * @see http://schema.org/UseAction Documentation on Schema.org
 *
 * @ORM\MappedSuperclass
 */
abstract class UseAction extends ConsumeAction
{
}
