<?php

namespace Schema\SchemaOrg\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * A media season e.g. tv, radio, video game etc.
 *
 * @see http://schema.org/CreativeWorkSeason Documentation on Schema.org
 *
 * @ORM\MappedSuperclass
 */
abstract class CreativeWorkSeason extends CreativeWork
{
}
