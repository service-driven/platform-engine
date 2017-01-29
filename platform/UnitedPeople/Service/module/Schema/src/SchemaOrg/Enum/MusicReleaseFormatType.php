<?php

namespace Schema\SchemaOrg\Enum;

use Schema\Enum\Enum;


/**
 * Format of this release (the type of recording media used, ie. compact disc, digital media, LP, etc.).
 *
 * @see http://schema.org/MusicReleaseFormatType Documentation on Schema.org
 */
class MusicReleaseFormatType extends Enum
{
    /**
     * @var string CassetteFormat
     */
    const CASSETTE_FORMAT = 'http://schema.org/CassetteFormat';
    /**
     * @var string CDFormat
     */
    const C_D_FORMAT = 'http://schema.org/CDFormat';
    /**
     * @var string DVDFormat
     */
    const D_V_D_FORMAT = 'http://schema.org/DVDFormat';
    /**
     * @var string DigitalFormat
     */
    const DIGITAL_FORMAT = 'http://schema.org/DigitalFormat';
    /**
     * @var string DigitalAudioTapeFormat
     */
    const DIGITAL_AUDIO_TAPE_FORMAT = 'http://schema.org/DigitalAudioTapeFormat';
    /**
     * @var string LaserDiscFormat
     */
    const LASER_DISC_FORMAT = 'http://schema.org/LaserDiscFormat';
    /**
     * @var string VinylFormat
     */
    const VINYL_FORMAT = 'http://schema.org/VinylFormat';
}
