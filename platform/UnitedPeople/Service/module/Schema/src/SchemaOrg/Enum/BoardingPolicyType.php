<?php

namespace Schema\SchemaOrg\Enum;


use Schema\Enum\Enum;


/**
 * A type of boarding policy used by an airline.
 *
 * @see http://schema.org/BoardingPolicyType Documentation on Schema.org
 */
class BoardingPolicyType extends Enum
{
    /**
     * @var string The airline boards by zones of the plane
     */
    const ZONE_BOARDING_POLICY = 'http://schema.org/ZoneBoardingPolicy';
    /**
     * @var string The airline boards by groups based on check-in time, priority, etc
     */
    const GROUP_BOARDING_POLICY = 'http://schema.org/GroupBoardingPolicy';
}
