<?php

namespace Schema\SchemaOrg\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Structured values are used when the value of a property has a more complex structure than simply being a textual value or a reference to another thing.
 *
 * @see http://schema.org/StructuredValue Documentation on Schema.org
 *
 * @ORM\MappedSuperclass
 */
abstract class StructuredValue extends Intangible
{
}
