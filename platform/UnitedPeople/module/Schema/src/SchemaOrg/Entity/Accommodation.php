<?php

namespace Schema\SchemaOrg\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * An accommodation is a place that can accommodate human beings, e.g. a hotel room, a camping pitch, or a meeting room. Many accommodations are for overnight stays, but this is not a mandatory requirement. For more specific types of accommodations not defined in schema.org, one can use additionalType with external vocabularies.
 *
 *  See also the [dedicated document on the use of schema.org for marking up hotels and other forms of accommodations](/docs/hotels.html).
 *
 * @see http://schema.org/Accommodation Documentation on Schema.org
 *
 * @ORM\MappedSuperclass
 */
abstract class Accommodation extends Place
{
}
