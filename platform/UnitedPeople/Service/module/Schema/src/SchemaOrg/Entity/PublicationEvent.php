<?php

namespace Schema\SchemaOrg\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * A PublicationEvent corresponds indifferently to the event of publication for a CreativeWork of any type e.g. a broadcast event, an on-demand event, a book/journal publication via a variety of delivery media.
 *
 * @see http://schema.org/PublicationEvent Documentation on Schema.org
 *
 * @ORM\MappedSuperclass
 */
abstract class PublicationEvent extends Event
{
}
