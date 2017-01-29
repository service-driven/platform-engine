<?php

namespace Schema\SchemaOrg\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * A media episode (e.g. TV, radio, video game) which can be part of a series or season.
 *
 * @see http://schema.org/Episode Documentation on Schema.org
 *
 * @ORM\MappedSuperclass
 */
abstract class Episode extends CreativeWork
{
}
