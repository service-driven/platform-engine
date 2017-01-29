<?php

namespace Schema\SchemaOrg\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * A unique instance of a BroadcastService on a CableOrSatelliteService lineup.
 *
 * @see http://schema.org/BroadcastChannel Documentation on Schema.org
 *
 * @ORM\MappedSuperclass
 */
abstract class BroadcastChannel extends Intangible
{
}
