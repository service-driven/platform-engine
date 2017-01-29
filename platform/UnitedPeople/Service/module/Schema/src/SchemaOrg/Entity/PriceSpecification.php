<?php

namespace Schema\SchemaOrg\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * A structured value representing a price or price range. Typically, only the subclasses of this type are used for markup. It is recommended to use [[MonetaryAmount]] to describe independent amounts of money such as a salary, credit card limits, etc.
 *
 * @see http://schema.org/PriceSpecification Documentation on Schema.org
 *
 * @ORM\MappedSuperclass
 */
abstract class PriceSpecification extends StructuredValue
{
}
