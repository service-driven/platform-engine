<?php

namespace Schema\SchemaOrg\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * A contact point—for example, a Customer Complaints department.
 *
 * @see http://schema.org/ContactPoint Documentation on Schema.org
 *
 * @ORM\MappedSuperclass
 */
abstract class ContactPoint extends StructuredValue
{
}
