<?php

namespace Schema\SchemaOrg\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * The act of transferring/moving (abstract or concrete) animate or inanimate objects from one place to another.
 *
 * @see http://schema.org/TransferAction Documentation on Schema.org
 *
 * @ORM\MappedSuperclass
 */
abstract class TransferAction extends Action
{
}
