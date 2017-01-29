<?php

namespace Schema\SchemaOrg\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * A short TV or radio program or a segment/part of a program.
 *
 * @see http://schema.org/Clip Documentation on Schema.org
 *
 * @ORM\MappedSuperclass
 */
abstract class Clip extends CreativeWork
{
}
