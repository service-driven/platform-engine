<?php

namespace Schema\SchemaOrg\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * An electronic file or document.
 *
 * @see http://schema.org/DigitalDocument Documentation on Schema.org
 *
 * @ORM\MappedSuperclass
 */
abstract class DigitalDocument extends CreativeWork
{
}
