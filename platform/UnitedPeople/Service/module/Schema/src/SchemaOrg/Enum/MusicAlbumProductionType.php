<?php

namespace Schema\SchemaOrg\Enum;

use Schema\Enum\Enum;


/**
 * Classification of the album by it's type of content: soundtrack, live album, studio album, etc.
 *
 * @see http://schema.org/MusicAlbumProductionType Documentation on Schema.org
 */
class MusicAlbumProductionType extends Enum
{
    /**
     * @var string CompilationAlbum
     */
    const COMPILATION_ALBUM = 'http://schema.org/CompilationAlbum';
    /**
     * @var string DemoAlbum
     */
    const DEMO_ALBUM = 'http://schema.org/DemoAlbum';
    /**
     * @var string DJMixAlbum
     */
    const D_J_MIX_ALBUM = 'http://schema.org/DJMixAlbum';
    /**
     * @var string LiveAlbum
     */
    const LIVE_ALBUM = 'http://schema.org/LiveAlbum';
    /**
     * @var string MixtapeAlbum
     */
    const MIXTAPE_ALBUM = 'http://schema.org/MixtapeAlbum';
    /**
     * @var string RemixAlbum
     */
    const REMIX_ALBUM = 'http://schema.org/RemixAlbum';
    /**
     * @var string SoundtrackAlbum
     */
    const SOUNDTRACK_ALBUM = 'http://schema.org/SoundtrackAlbum';
    /**
     * @var string SpokenWordAlbum
     */
    const SPOKEN_WORD_ALBUM = 'http://schema.org/SpokenWordAlbum';
    /**
     * @var string StudioAlbum
     */
    const STUDIO_ALBUM = 'http://schema.org/StudioAlbum';
}
