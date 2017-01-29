<?php

namespace Schema\SchemaOrg\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * A construction business.\\n\\nA HomeAndConstructionBusiness is a [[LocalBusiness]] that provides services around homes and buildings.\\n\\nAs a [[LocalBusiness]] it can be described as a [[provider]] of one or more [[Service]]\\(s).
 *
 * @see http://schema.org/HomeAndConstructionBusiness Documentation on Schema.org
 *
 * @ORM\MappedSuperclass
 */
abstract class HomeAndConstructionBusiness extends LocalBusiness
{
}
