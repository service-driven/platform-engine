<?php

namespace Schema\SchemaOrg\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * A web page element, like a table or an image.
 *
 * @see http://schema.org/WebPageElement Documentation on Schema.org
 *
 * @ORM\MappedSuperclass
 */
abstract class WebPageElement extends CreativeWork
{
}
