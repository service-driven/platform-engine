<?php

namespace Schema\SchemaOrg\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * The most generic kind of creative work, including books, movies, photographs, software programs, etc.
 *
 * @see http://schema.org/CreativeWork Documentation on Schema.org
 *
 * @ORM\MappedSuperclass
 */
abstract class CreativeWork extends Thing
{
}
