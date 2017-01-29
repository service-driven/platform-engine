<?php

namespace Schema\SchemaOrg\Enum;

use Schema\Enum\Enum;


/**
 * An enumeration of genders.
 *
 * @see http://schema.org/GenderType Documentation on Schema.org
 */
class GenderType extends Enum
{
    /**
     * @var string The female gender
     */
    const FEMALE = 'http://schema.org/Female';
    /**
     * @var string The male gender
     */
    const MALE = 'http://schema.org/Male';
}
