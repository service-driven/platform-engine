<?php

namespace Schema\SchemaOrg\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * A food-related business.
 *
 * @see http://schema.org/FoodEstablishment Documentation on Schema.org
 *
 * @ORM\MappedSuperclass
 */
abstract class FoodEstablishment extends LocalBusiness
{
}
