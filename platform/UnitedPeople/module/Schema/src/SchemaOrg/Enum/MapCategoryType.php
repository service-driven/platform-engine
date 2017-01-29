<?php

namespace Schema\SchemaOrg\Enum;


use Schema\Enum\Enum;

/**
 * An enumeration of several kinds of Map.
 *
 * @see http://schema.org/MapCategoryType Documentation on Schema.org
 */
class MapCategoryType extends Enum
{
    /**
     * @var string A parking map
     */
    const PARKING_MAP = 'http://schema.org/ParkingMap';
    /**
     * @var string A seating map
     */
    const SEATING_MAP = 'http://schema.org/SeatingMap';
    /**
     * @var string A venue map (e.g. for malls, auditoriums, museums, etc.)
     */
    const VENUE_MAP = 'http://schema.org/VenueMap';
    /**
     * @var string A transit map
     */
    const TRANSIT_MAP = 'http://schema.org/TransitMap';
}
