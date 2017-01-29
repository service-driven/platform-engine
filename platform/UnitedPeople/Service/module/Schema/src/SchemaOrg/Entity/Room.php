<?php

namespace Schema\SchemaOrg\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * A room is a distinguishable space within a structure, usually separated from other spaces by interior walls. (Source: Wikipedia, the free encyclopedia, see <http://en.wikipedia.org/wiki/Room>).
 *
 *  See also the [dedicated document on the use of schema.org for marking up hotels and other forms of accommodations](/docs/hotels.html).
 *
 * @see http://schema.org/Room Documentation on Schema.org
 *
 * @ORM\MappedSuperclass
 */
abstract class Room extends Accommodation
{
}
