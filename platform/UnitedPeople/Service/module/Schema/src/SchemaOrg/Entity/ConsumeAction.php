<?php

namespace Schema\SchemaOrg\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * The act of ingesting information/resources/food.
 *
 * @see http://schema.org/ConsumeAction Documentation on Schema.org
 *
 * @ORM\MappedSuperclass
 */
abstract class ConsumeAction extends Action
{
}
