<?php

namespace Schema\SchemaOrg\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * A collection of music tracks in playlist form.
 *
 * @see http://schema.org/MusicPlaylist Documentation on Schema.org
 *
 * @ORM\MappedSuperclass
 */
abstract class MusicPlaylist extends CreativeWork
{
}
