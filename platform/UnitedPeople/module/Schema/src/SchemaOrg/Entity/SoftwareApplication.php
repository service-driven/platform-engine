<?php

namespace Schema\SchemaOrg\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * A software application.
 *
 * @see http://schema.org/SoftwareApplication Documentation on Schema.org
 *
 * @ORM\MappedSuperclass
 */
abstract class SoftwareApplication extends CreativeWork
{
}
