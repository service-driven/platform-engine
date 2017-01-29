<?php

namespace Schema\SchemaOrg\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * An image file.
 *
 * @see http://schema.org/ImageObject Documentation on Schema.org
 *
 * @ORM\MappedSuperclass
 */
abstract class ImageObject extends MediaObject
{
}
