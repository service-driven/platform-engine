<?php

namespace Schema\SchemaOrg\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * The act of editing by adding an object to a collection.
 *
 * @see http://schema.org/AddAction Documentation on Schema.org
 *
 * @ORM\MappedSuperclass
 */
abstract class AddAction extends UpdateAction
{
}
