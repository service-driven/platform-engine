<?php

namespace Schema\SchemaOrg\Enum;


use Schema\Enum\Enum;

/**
 * The kind of release which this album is: single, EP or album.
 *
 * @see http://schema.org/MusicAlbumReleaseType Documentation on Schema.org
 */
class MusicAlbumReleaseType extends Enum
{
    /**
     * @var string AlbumRelease
     */
    const ALBUM_RELEASE = 'http://schema.org/AlbumRelease';
    /**
     * @var string BroadcastRelease
     */
    const BROADCAST_RELEASE = 'http://schema.org/BroadcastRelease';
    /**
     * @var string EPRelease
     */
    const E_P_RELEASE = 'http://schema.org/EPRelease';
    /**
     * @var string SingleRelease
     */
    const SINGLE_RELEASE = 'http://schema.org/SingleRelease';
}
