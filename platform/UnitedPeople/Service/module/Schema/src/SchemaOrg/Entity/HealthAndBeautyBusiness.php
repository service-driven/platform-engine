<?php

namespace Schema\SchemaOrg\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Health and beauty.
 *
 * @see http://schema.org/HealthAndBeautyBusiness Documentation on Schema.org
 *
 * @ORM\MappedSuperclass
 */
abstract class HealthAndBeautyBusiness extends LocalBusiness
{
}
