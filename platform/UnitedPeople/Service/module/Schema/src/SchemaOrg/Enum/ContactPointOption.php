<?php

namespace Schema\SchemaOrg\Enum;

use Schema\Enum\Enum;


/**
 * Enumerated options related to a ContactPoint.
 *
 * @see http://schema.org/ContactPointOption Documentation on Schema.org
 */
class ContactPointOption extends Enum
{
    /**
     * @var string Uses devices to support users with hearing impairments
     */
    const HEARING_IMPAIRED_SUPPORTED = 'http://schema.org/HearingImpairedSupported';
    /**
     * @var string The associated telephone number is toll free
     */
    const TOLL_FREE = 'http://schema.org/TollFree';
}
