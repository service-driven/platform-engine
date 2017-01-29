<?php

namespace Schema\SchemaOrg\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * A rating is an evaluation on a numeric scale, such as 1 to 5 stars.
 *
 * @see http://schema.org/Rating Documentation on Schema.org
 *
 * @ORM\MappedSuperclass
 */
abstract class Rating extends Intangible
{
}
