<?php

namespace Schema\SchemaOrg\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * A utility class that serves as the umbrella for a number of 'intangible' things such as quantities, structured values, etc.
 *
 * @see http://schema.org/Intangible Documentation on Schema.org
 *
 * @ORM\MappedSuperclass
 */
abstract class Intangible extends Thing
{
}
