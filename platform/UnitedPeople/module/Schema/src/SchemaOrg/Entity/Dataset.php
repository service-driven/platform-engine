<?php

namespace Schema\SchemaOrg\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * A body of structured information describing some topic(s) of interest.
 *
 * @see http://schema.org/Dataset Documentation on Schema.org
 *
 * @ORM\MappedSuperclass
 */
abstract class Dataset extends CreativeWork
{
}
