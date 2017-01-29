<?php

namespace Schema\SchemaOrg\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * A single message from a sender to one or more organizations or people.
 *
 * @see http://schema.org/Message Documentation on Schema.org
 *
 * @ORM\MappedSuperclass
 */
abstract class Message extends CreativeWork
{
}
