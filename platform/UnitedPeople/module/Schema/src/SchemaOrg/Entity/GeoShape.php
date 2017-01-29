<?php

namespace Schema\SchemaOrg\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * The geographic shape of a place. A GeoShape can be described using several properties whose values are based on latitude/longitude pairs. Either whitespace or commas can be used to separate latitude and longitude; whitespace should be used when writing a list of several such points.
 *
 * @see http://schema.org/GeoShape Documentation on Schema.org
 *
 * @ORM\MappedSuperclass
 */
abstract class GeoShape extends StructuredValue
{
}
