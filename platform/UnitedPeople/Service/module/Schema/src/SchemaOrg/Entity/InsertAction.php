<?php

namespace Schema\SchemaOrg\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * The act of adding at a specific location in an ordered collection.
 *
 * @see http://schema.org/InsertAction Documentation on Schema.org
 *
 * @ORM\MappedSuperclass
 */
abstract class InsertAction extends AddAction
{
}
