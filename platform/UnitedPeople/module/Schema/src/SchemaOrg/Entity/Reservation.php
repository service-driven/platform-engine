<?php

namespace Schema\SchemaOrg\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Describes a reservation for travel, dining or an event. Some reservations require tickets. \\n\\nNote: This type is for information about actual reservations, e.g. in confirmation emails or HTML pages with individual confirmations of reservations. For offers of tickets, restaurant reservations, flights, or rental cars, use [[Offer]].
 *
 * @see http://schema.org/Reservation Documentation on Schema.org
 *
 * @ORM\MappedSuperclass
 */
abstract class Reservation extends Intangible
{
}
